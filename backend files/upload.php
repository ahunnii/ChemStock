<?php
header("Access-Control-Allow-Origin: *");
require_once("conn.php");

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
$graduationDate = $db->real_escape_string($_POST["graduationDate"]);
$highschoolGPA = $db->real_escape_string($_POST["highschoolGPA"]);
$collegeGPA = $db->real_escape_string($_POST["collegeGPA"]);

$applicationSQL = "INSERT INTO applications (studentID, email, firstName, middleInitial, lastName, dateOfBirth, localAddress, localCity, localState, localZip, cellPhone, homeAddress, homeCity, homeState, homeZip, homePhone, referral, preferredWeeklyHours, workStudyApproved, workStudyHours, classStanding, major, minor, graduationDate, highschoolGPA, collegeGPA, weeklySchedule)
 VALUES ($eID, '$email','$firstName', '$middleInitial', '$lastName', '$dateOfBirth', '$localAddress', '$localCity', '$localState', '$localZip', '$cellPhone', '$homeAddress', '$homeCity', '$homeState', '$homeZip', '$homePhone', '$referral', '$weeklyHours', '$workStudyApproved', '$workStudyHours', '$classStanding', '$major', '$minor', '$graduationDate', '$highschoolGPA', '$collegeGPA' ,'')";

if($db->query($sql !== true)
{
	die($db->error);
}

if($_FILES['resume'])
{
	if($_FILES['resume']['error'] > 0)
	{
		die('Error while uploading, code: ' + $_FILES['file']['error']);
	}

	$fileSize = $_FILES['resume']['size'];
	if($fileSize > 5242880)
	{
		die('File uploaded exceeds maximum upload size.');
	}

	$fileName = $db->real_escape_string(preg_replace("/[^a-z0-9.\-]/i",'',$_FILES['resume']['name']));
	$fileType = mime_content_type($_FILES['resume']['tmp_name']);
	if($fileType !== "application/pdf" || $fileType !== "application/msword")
	{
		die('Only PDF and Microsoft Word Document are Allowed.');
	}

	$content = $db->real_escape_string(file_get_contents($_FILES['resume']['tmp_name']));
	$sql = "SELECT id FROM applications WHERE studentID = $eID LIMIT 1";
	$result = $db->query($sql);
	$appID = 0;
	if($result->num_rows > 0)
	{
		$row = $result->fetch_assoc();
		$appID = $row["studentID"];
	}
	
	if($appID == 0)
	{
		die("Error finding application ID");
	}
	
	$fileSQL= "insert into resumes (applicationID, fileName, fileType, TIMESTAMP, fileData) values ($appID, '$fileName', '$filetype', NOW(), '$content')";

	if(($db->query($applicationSQL) !== true) || ($db->query($fileSQL) !== true))
	{
		die($db->error);
	}
}
else
{
	if($db->query($applicationSQL) !== true)
	{
		die($db->error);
	}
}
$db->close();
?>
