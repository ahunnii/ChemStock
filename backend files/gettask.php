<?php
header('Access-Control-Allow-Origin: *');
require_once("conn.php");

if(isset($_GET['taskID']))
{
	$stmt = $db->prepare("SELECT taskID, creatorID, employeeID, taskName, taskDate, taskContent FROM tasks WHERE taskID = ? AND taskComplete = 0 ORDER BY taskID ASC");
	$stmt->bind_param('i', $task);
	
	$task = $db->real_escape_string($_GET['taskID']);
	
	if(!$stmt->execute())
	{
		die('Could not get TaskID: '.$task);
	}
	
	$stmt->bind_result($taskID, $creatorID, $employeeID, $taskName, $taskDate, $taskContent);
	
	$output = array();
	$stmt->fetch();
	
	$output['taskID'] = $taskID;
	$output['creatorID'] = $creatorID;
	$output['employeeID'] = $employeeID;
	$output['taskName'] = $taskName;
	$output['taskDate'] = $taskDate;
	$output['taskContent'] = $taskContent;
	
	$stmt->close();
	echo json_encode($output);
}
else if(isset($_GET['employeeID']))
{
	$stmt = $db->prepare("SELECT taskID, creatorID, employeeID, taskName, taskDate, taskContent FROM tasks WHERE employeeID = ? AND taskComplete = 0 ORDER BY taskID ASC");
	$stmt->bind_param('i', $employeeID);
	
	$employeeID = $db->real_escape_string($_GET['employeeID']);
	
	if(!$stmt->execute())
	{
		die('Could not get Tasks for employeeID: '.$employeeID);
	}
	
	$output = array();
	
	$stmt->bind_result($taskID, $creatorID, $employee, $taskName, $taskDate, $taskContent);
	
	while($stmt->fetch())
	{
		$row = array();
	
		$row['taskID'] = $taskID;
		$row['creatorID'] = $creatorID;
		$row['employeeID'] = $employee;
		$row['taskName'] = $taskName;
		$row['taskDate'] = $taskDate;
		$row['taskContent'] = $taskContent;
		
		$output[] = $row;
	}
	$stmt->close();
	echo json_encode($output);
	
}
$db->close();
?>