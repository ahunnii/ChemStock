<?php
header('Access-Control-Allow-Origin: *');
require_once("conn.php");
if(!$_POST)
{
	die("No data");
}

if(isset($_POST['id']) && isset($_POST['applicationStatus']))
{
	$updateStmt = $db->prepare("UPDATE applications SET applicationStatus = ? WHERE id = ?");
	$updateStmt->bind_param('si',$newStatus, $appID);

	$appID = $db->real_escape_string($_POST['id']);
	$newStatus = $db->real_escape_string($_POST['applicationStatus']);

	if(!($updateStmt->execute()))
	{
		die($db->error);
	}
	$updateStmt->close();

	if($newStatus == "ACCEPTED")
	{
		if(isset($_POST['firstName']) && isset($_POST['lastName']) && isset($_POST['email']) && isset($_POST['phone']))
		{
			$insertStmt = $db->prepare("INSERT INTO employees (applicationID, firstName, lastName, email, phoneNumber) VALUES (?, ?, ?, ?, ?)");
			$insertStmt->bind_param('issss', $appID, $firstName,$lastName,$email,$phone);
			
			$firstName = $db->real_escape_string($_POST['firstName']);
			$lastName = $db->real_escape_string($_POST['lastName']);
			$email = $db->real_escape_string($_POST['email']);
			$phone = $db->real_escape_string($_POST['phone']);
			
			if(!($insertStmt->execute()))
			{
				die($db->error);
			}
			$insertStmt->close();
		}
		else
		{
			die('Could not insert user into employee table');
		}
	}
}

$db->close()
?>
