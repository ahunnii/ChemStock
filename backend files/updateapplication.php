<?php
header('Access-Control-Allow-Origin: *');
require_once("conn.php");
if(!$_POST)
{
	die("No data");
}

if($_POST['id'] && $_POST['status'])
{
	$updateStmt = $db->prepare("UPDATE applications SET status = ? WHERE id = ?");
	$updateStmt->bind_param('s',$newStatus);
	$updateStmt->bind_param('i',$appID);

	$appID = $db->real_escape_string($_POST['id']);
	$newStatus = $db->real_escape_string($_POST['status']);

	if(!($updateStmt->execute())
	{
		die('An error has occurred');
	}
	$updateStmt->close();

	if($newStatus == "ACCEPTED")
	{
		$insertStmt = $db->prepare("INSERT INTO employees (firstName, lastName, email, phoneNumber) VALUES (?, ?, ?, ?)");
		$insertStmt->bind_param('s', $firstName);
		$insertStmt->bind_param('s', $lastName);
		$insertStmt->bind_param('s', $email);
		$insertStmt->bind_param('s', $phone);
		
		$firstName = $db->real_escape_string($_POST['firstName']);
		$lastName = $db->real_escape_string($_POST['lastName']);
		$email = $db->real_escape_string($_POST['email']);
		$phone = $db->real_escape_string($_POST['phone']);
		
		if(!($insertStmt->execute())
		{
			die('An error has occurred');
		}
		$insertStmt->close();
	}
}

$db->close()
?>