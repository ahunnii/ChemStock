<?php
header('Access-Control-Allow-Origin: *');
require_once("conn.php");

$sql = "SELECT id, firstName, lastName, email, phoneNumber, assignedTo FROM employees";

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
$db->close();
?>