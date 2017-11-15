<?php
header('Access-Control-Allow-Origin: *');
require_once("conn.php");

if(!$_POST)
{
	die('no data');
}
else
{
	if($_POST['employeeID'])
	{
		if($_POST['labID'])
		{
			$employeeID = $db->real_escape_string($_POST['employeeID']);
			$labID = $db->real_escape_string($_POST['labID']);
			
			$stmt = $db->prepare("UPDATE employees SET assignedTo = ? WHERE id = ?");
			$stmt->bind_param('i',$labID);
			$stmt->bind_param('i',$employeeID);
			if(!$stmt->execute())
			{
				die('failed to execute query');
			}
		}
	}
}
?>