<?php
header('Access-Control-Allow-Origin: *');
require_once('conn.php');

if(isset($_POST['id']) && isset($_POST['name']) && isset($_POST['prepQuantity']) && isset($_POST['prepType']) && isset($_POST['experiment']) && isset($_POST['requiredChemicals']) && isset($_POST['formula']) && isset($_POST['prepProcedure']))
{
	if($stmt = $db->prepare("UPDATE recipes SET name = ?, prepQuantity = ?, prepType = ?, experiment = ?, requiredChemicals = ?, formula = ?, prepProcedure = ? WHERE id = ?"))
	{
	
	$id = $db->real_escape_string($_POST['id']);
	$name = $db->real_escape_string($_POST['name']);
	$prepQuantity = $db->real_escape_string($_POST['prepQuantity']);
	$prepType = $db->real_escape_string($_POST['prepType']);
	$experiment = $db->real_escape_string($_POST['experiment']);
	$requiredChemicals = $db->real_escape_string($_POST['requiredChemicals']);
	$formula = $db->real_escape_string($_POST['formula']);
	$recipeProcedure = $db->real_escape_string($_POST['prepProcedure']);
	
	$stmt->bind_param('sdsssssi',$name,$prepQuantity,$prepType,$experiment,$requiredChemicals,$formula,$recipeProcedure,$id);
	
	if(!$stmt->execute())
	{
		die('Could not execute update');
	}
	$stmt->close();
	}
	else
	{
		die($db->error);
	}
	
}
$db->close();

?>