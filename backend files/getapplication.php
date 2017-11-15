<?php
header("Access-Control-Allow-Origin: *");
require_once("conn.php");

$sql = "SELECT * FROM applications ORDER BY timestmp DESC";
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