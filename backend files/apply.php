<?php
header("Access-Control-Allow-Origin: *");
require_once("conn.php");
if(!$_POST)
{
	die("No data");
}

$eID = $db->real_escape_string($_POST["eID"]);
$email = $db->real_escape_string($_POST["email"]);
$firstName = $db->real_escape_string($_POST["firstName"]);
$middleInitial = $db->real_escape_string($_POST["middleInitial"]);
$lastName = $db->real_escape_string($_POST["lastName"]);
$dateOfBirth = $db->real_escape_string($_POST["dateOfBirth"]);
$localAddress = $db->real_escape_string($_POST["localAddress"]);
$localCity = $db->real_escape_string($_POST["localCity"]);
$localState = $db->real_escape_string($_POST["localState"]);
$localZip = $db->real_escape_string($_POST["localZip"]);
$cellPhone = $db->real_escape_string($_POST["cellPhone"]);
$homeAddress = $db->real_escape_string($_POST["homeAddress"]);
$homeCity = $db->real_escape_string($_POST["homeCity"]);
$homeState = $db->real_escape_string($_POST["homeState"]);
$homeZip = $db->real_escape_string($_POST["homeZip"]);
$homePhone = $db->real_escape_string($_POST["homePhone"]);
$referral  = $db->real_escape_string($_POST["referred"]);
$weeklyHours = $db->real_escape_string($_POST["weeklyHours"]);
$workStudyApproved = $db->real_escape_string($_POST["workStudyApproved"]);
$workStudyHours = $db->real_escape_string($_POST["hoursWorkStudy"]);
$classStanding = $db->real_escape_string($_POST["classStanding"]);
$major = $db->real_escape_string($_POST["major"]);
$minor = $db->real_escape_string($_POST["minor"]);
$graduationDate = $db->real_escape_string($_POST["graduationDate"]."-01");
$highschoolGPA = $db->real_escape_string($_POST["highschoolGPA"]);
$collegeGPA = $db->real_escape_string($_POST["collegeGPA"]);
$courseHistory = json_decode($_POST["courseHistory"],true);
$workHistory = json_decode($_POST["workHistory"],true);

$applicationSQL = "INSERT INTO applications (studentID, email, firstName, middleInitial, lastName, dateOfBirth, localAddress, localCity, localState, localZip, cellPhone, homeAddress, homeCity, homeState, homeZip, homePhone, referral, preferredWeeklyHours, workStudyApproved, workStudyHours, classStanding, major, minor, graduationDate, highschoolGPA, collegeGPA, weeklySchedule, timestamp) VALUES ('$eID', '$email','$firstName', '$middleInitial', '$lastName', '$dateOfBirth', '$localAddress', '$localCity', '$localState', '$localZip', '$cellPhone', '$homeAddress', '$homeCity', '$homeState', '$homeZip', '$homePhone', '$referral', '$weeklyHours', '$workStudyApproved', '$workStudyHours', '$classStanding', '$major', '$minor', '$graduationDate', '$highschoolGPA', '$collegeGPA' ,'', NOW())";

if($db->query($applicationSQL) !== true)
{
	die($db->error);
}

$appID = $db->insert_id();

if($appID == 0)
{
	$getAppIDSQL = "SELECT id FROM applications WHERE studentID = '$eID' ORDER BY timestamp DESC LMIIT 1";
	$result = $db->query($getAppIDSQL);
	if($result->num_rows > 0)
	{
		$row = $result->fetch_assoc();
		$appID = $row["id"];
	}
	else
	{
		die("Error finding application ID");
	}
}

if($courseHistory[0])
{
	foreach($courseHistory as $row)
	{
		if($row['courseTitle'])
		{
			$courseTitle = $db->real_escape_string($row['courseTitle']);
			$finalGrade = $db->real_escape_string($row['finalGrade']);
			$semester = $db->real_escape_string($row['semester']);
			$year = $db->real_escape_string($row['year']);
			$instructor = $db->real_escape_string($row['instructor']);
			
			$courseSQL = "INSERT INTO applicantCourseHistory (applicationID, courseTitle, finalGrade, semester, year, instructor) values ($appID, '$courseTitle', '$finalGrade', '$semester', '$year', '$instructor')";
			
			if($db->query($courseSQL) !== true)
			{
				die($db->error);
			}
		}
	}
}

if($workHistory[0])
{
	foreach($workHistory as $row)
	{
		if($row['employer'])
		{
			$employer = $db->real_escape_string($row['employer']);
			$dutiesResponsibilities = $db->real_escape_string($row['dutiesResponsibilities']);
			$startDate = $db->real_escape_string($row['startDate']);
			$endDate = $db->real_escape_string($row['endDate']);
			
			$workSQL = "INSERT INTO applicantWorkHistory (applicationID, employer, dutiesResponsibilities, startDate, endDate) VALUES ($appID, '$employer', '$dutiesResponsibilities', '$startDate', '$endDate')";
			
			if($db->query($workSQL) !== true)
			{
				die($db->error);
			}
		}
	}
}

if($_FILES['resume'])
{
	if($_FILES['resume']['error'] > 0)
	{
		die('Error while uploading, code: ' + $_FILES['file']['error']);
	}
	$fileType = mime_content_type($_FILES['resume']['tmp_name']);
	$fileSize = $_FILES['resume']['size'];
	if($fileSize > 5242880)
	{
		die('File uploaded exceeds maximum upload size.');
	}

	$fileName = $db->real_escape_string(preg_replace("/[^a-z0-9.\-]/i",'',$_FILES['resume']['name']));
	
	// if($fileType !== "application/pdf" || $fileType !== "application/msword")
	// {
		// die('Only PDF and Microsoft Word Document are Allowed.');
	// }

	$content = $db->real_escape_string(file_get_contents($_FILES['resume']['tmp_name']));
	
	$fileSQL= "insert into resumes (applicationID, fileName, fileType, timestamp, fileData) values ($appID, '$fileName', '$filetype', NOW(), '$content')";

	if($db->query($fileSQL) !== true)
	{
		die($db->error);
	}
}

$db->close();*/
?>
