<?php
header("Access-Control-Allow-Origin: *");
require_once("conn.php");

if(isset($_GET['email']))
{
	$stmt = $db->prepare("SELECT assignedTo FROM employees WHERE email = ? LIMIT 1");
	$stmt->bind_param('s', $email);
	
	$email = $db->real_escape_string($_GET['email']);
	
	if(!$stmt->execute())
	{
		die('Could not execute query');
	}
	
	$stmt->bind_result($labID);
	if(!$stmt->fetch())
	{
		die('could not fetch result');
	}
	
	$getLab = $db->prepare("SELECT id, labName FROM labs WHERE id = ?");
	$getLab->bind_param('i', $labID);
	
	if(!$getLab->execute())
	{
		die('Could not get lab info');
	}
	$getLab->bind_result($id, $name);
	if(!$getLab->fetch())
	{
		die('failed to fetch lab info');
	}
	$output = array();
	$output['id'] = $id;
	$output['labName'] = $name;
	
	$stmt->close();
	$getLab->close();
	
	echo json_encode($output);
}
$db->close();
?>