<?php
header("Access-Control-Allow-Origin: *");
require_once("conn.php");
if($_GET)
{
if($_GET['id'])
{
	$stmt = $db->prepare("SELECT * FROM applications WHERE id = ?");
	$stmt->bind_param('i', $id);
	$id = $db->real_escape_string($_GET['id']);
	if(!($stmt->execute()))
	{
		die('query failed to execute');
	}
	
	$stmt->bind_result($appID, $studentID, $email, $firstName, $middleInitial, $lastName, $dateOfBirth, $localAddress, $localCity, $localState, $localZip, $cellPhone, $homeAddress, $homeCity, $homeState, $homeZip, $homePhone, $referral, $preferredWeeklyHours, $workStudyApproved, $workStudyAmount, $classStanding, $major, $minor, $graduationDate, $highschoolGPA, $collegeGPA, $weeklySchedule, $applicationStatus, $timestmp);
	$stmt->fetch();

	$row = array();
	$row['id'] = $appID;
	$row['studentID'] = $studentID;
	$row['email'] = $email;
	$row['firstName'] = $firstName;
	$row['middleInitial'] = $middleInitial;
	$row['lastName'] = $lastName;
	$row['dateOfBirth'] = $dateOfBirth;
	$row['localAddress'] = $localAddress;
	$row['localCity'] = $localCity;
	$row['localState'] = $localState;
	$row['localZip'] = $localZip;
	$row['cellPhone'] = $cellPhone;
	$row['homeAddress'] = $homeAddress;
	$row['homeCity'] = $homeCity;
	$row['homeState'] = $homeState;
	$row['homeZip'] = $homeZip;
	$row['homePhone'] = $homePhone;
	$row['referral'] = $referral;
	$row['preferredWeeklyHours'] = $preferredWeeklyHours;
	$row['workStudyApproved'] = $workStudyApproved;
	$row['workStudyAmount'] = $workStudyAmount;
	$row['classStanding'] = $classStanding;
	$row['major'] = $major;
	$row['minor'] = $minor;
	$row['graduationDate'] = $graduationDate;
	$row['highschoolGPA'] = $highschoolGPA;
	$row['collegeGPA'] = $collegeGPA;
	$row['weeklySchedule'] = $weeklySchedule;
	$row['applicationStatus'] = $applicationStatus;
	$row['timestmp'] = $timestmp;
	
	$stmt->close();
	echo json_encode($row);
}
}
else
{
	$sql = "SELECT id, studentID, firstName, lastName, email, cellPhone, homePhone, applicationStatus, timestmp FROM applications ORDER BY timestmp DESC";
	$output = array();
	if($result = $db->query($sql))
	{
		while($row = $result->fetch_assoc())
		{
			$output[] = $row;
		}
		$result->free();
		echo json_encode($output);
	}
	else
	{
		die($db->error);
	}
}

$db->close();
?>