<?php
require_once("conn.php");
if(isset($_POST['name']) && isset($_POST['prepQuantity']) && isset($_POST['experiment']) && isset($_POST['requiredChemicals'] && isset($_POST{'formula']) && isset($_POST['procedure']))
{
	$name = $db->real_escape_string($_POST['name']);
	$prepQuantity = $db->real_escape_string($_POST['prepQuantity']);
	$experiment = $db->real_escape_string($_POST['experiment']);
	$requiredChemicals = $db->real_escape_string($_POST['requiredChemicals']);
	$formula = $db->real_escape_string($_POST['formula']);
	$procedure = $db->real_escape_string($_POST['procedure']);
	
	$stmt = $db->prepare("INSERT INTO recipes (name, prepQuantity, experiment, requiredChemicals, formula, recipeProcedure) VALUES (?,?,?,?,?,?)";
	$stmt->bind_param('s', $name);
	$stmt->bind_param('d', $prepQuantity);
	$stmt->bind_param('s', $experiment);
	$stmt->bind_param('s', $requiredChemicals);
	$stmt->bind_param('s', $formula);
	$stmt->bind_param('s', $procedure);
	
	if(!$stmt->execute())
	{
		die('could not insert recipe');
	}
	$stmt->close();
}
$db->close();

?>