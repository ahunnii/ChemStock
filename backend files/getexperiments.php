<?php
header("Access-Control-Allow-Origin: *");
require_once("conn.php");

$sql = "SELECT * FROM labs INNER JOIN experiments On labs.id = experiments.labID ORDER BY experiments.id ASC";
$output = array();
if($result = $db->query($sql))
{
	while($row = $result->fetch_assoc())
	{
		$output[] = $row;
	}
	echo json_encode($output);
	$result->free();
}
else
{
	die($db->error);
}
$db->close();
?>