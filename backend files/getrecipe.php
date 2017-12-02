<?php
require_once('conn.php');

if(isset($_GET['id']))
{
	$stmt = $db->prepare("SELECT id, name, prepQuantity, experiment, requiredChemicals, formula, recipeProcedure FROM recipes WHERE id=?");
	$stmt->bind_param('i', $id);
	
	$id = $db->real_escape_string($_GET['id']);
	
	if(!($stmt->execute()))
	{
		die('query failed to execute');
	}
	
	$stmt->bind_result($id, $name, $prepQuantity, $experiment, $requiredChemicals, $formula, $recipeProcedure);
	$stmt->fetch();
	
	$recipe = array();
	$recipe['id'] = $id;
	$recipe['name'] = $name;
	$recipe['prepQuantity'] = $prepQuantity;
	$recipe['experiment'] = $experiment;
	$recipe['requiredChemicals'] = $requiredChemicals;
	$recipe['formula'] = $formula;
	$recipe['recipeProcedure'] = $recipeProcedure;
	
	$stmt->close();
	echo json_encode($recipe);
}
else
{
	$sql = "SELECT id, name FROM recipes";
	
	$output = array();
	if($result = $db->query($sql))
	{
		while($row = $result->fetch_assoc())
		{
			$output[] = $row;
		}
		$result->free();
		echo json_encode($output);
	}
}
$db->close();
?>