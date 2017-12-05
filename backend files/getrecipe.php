<?php
header('Access-Control-Allow-Origin: *');
require_once('conn.php');

if(isset($_GET['id']))
{
	$stmt = $db->prepare("SELECT id, name, prepQuantity, prepType, experiment, requiredChemicals, formula, prepProcedure FROM recipes WHERE id=?");
	$stmt->bind_param('i', $id);
	
	$id = $db->real_escape_string($_GET['id']);
	
	if(!($stmt->execute()))
	{
		die('query failed to execute');
	}
	
	$stmt->bind_result($id, $name, $prepQuantity, $prepType, $experiment, $requiredChemicals, $formula, $prepProcedure);
	$stmt->fetch();
	
	$recipe = array();
	$recipe['id'] = $id;
	$recipe['name'] = $name;
	$recipe['prepQuantity'] = $prepQuantity;
	$recipe['prepType'] = $prepType;
	$recipe['experiment'] = $experiment;
	$recipe['requiredChemicals'] = $requiredChemicals;
	$recipe['formula'] = $formula;
	$recipe['prepProcedure'] = $prepProcedure;
	
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