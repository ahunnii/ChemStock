<?php
header('Access-Control-Allow-Origin: *');
require_once('conn.php');

if(isset($_POST['id']) && isset($_POST['name']) && isset($_POST['prepQuantity']) && isset($_POST['prepType']) && isset($_POST['experiment']) && isset($_POST['requiredChemicals']) && isset($_POST['formula']) && isset($_POST['prepProcedure']))
{
	$stmt = $db->prepare("UPDATE recipes SET name = ?, prepQuantity = ?, prepType = ?, experiment = ?, requiredChemicals = ?, formula = ?, prepProcedure = ? WHERE id = ?");
	
	$id = $db->real_escape_string($_POST['id']);
	$name = $db->real_escape_string($_POST['name']);
	$prepQuantity = $db->real_escape_string($_POST['prepQuantity']);
	$prepType = $db->real_escape_string($_POST['prepType']);
	$experiment = $db->real_escape_string($_POST['experiment']);
	$requiredChemicals = $db->real_escape_string($_POST['requiredChemicals']);
	$formula = $db->real_escape_string($_POST['formula']);
	$recipeProcedure = $db->real_escape_string($_POST['recipeProcedure']);
	
	$stmt->bind_param('s',$name);
	$stmt->bind_param('d',$prepQuantity);
	$stmt->bind_param('s',$prepType);
	$stmt->bind_param('s',$experiment);
	$stmt->bind_param('s',$requiredChemicals);
	$stmt->bind_param('s',$formula);
	$stmt->bind_param('s',$recipeProcedure);
	$stmt->bind_param('i',$id);
	
	if(!$stmt->execute())
	{
		die('Could not execute update');
	}
	$stmt->close();
}
$db->close();

?>