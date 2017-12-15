<?php
header('Access-Control-Allow-Origin: *');
date_default_timezone_set("America/Detroit");
require_once("conn.php");

if(isset($_POST['creatorID']) && isset($_POST['employeeID']) && isset($_POST['taskName']) && isset($_POST['taskContent']))
{
	$stmt = $db->prepare("INSERT INTO tasks (creatorID, employeeID, taskName, taskDate, taskContent) VALUES (?,?,?,?,?)");
	$stmt->bind_param('iisss', $creatorID, $employeeID, $taskName, $taskDate, $taskContent);
	
	$creatorID = $db->real_escape_string($_POST['creatorID']);
	$employeeID = $db->real_escape_string($_POST['employeeID']);
	$taskName = $db->real_escape_string($_POST['taskName']);
	$taskDate = date('Y-m-d H:i:s', time());
	$taskContent = $db->real_escape_string($_POST['taskContent']);
	
	if(!$stmt->execute())
	{
		die("Could not insert task into database");
	}
	$stmt->close();
}
else
{
	echo('No data');
}
$db->close();
?>