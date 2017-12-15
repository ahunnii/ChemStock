<?php
header("Access-Control-Allow-Origin: *");
require_once("conn.php");
if(isset($_GET['labID']))
{
	$stmt = $db->prepare("SELECT labs.id as labID, labs.labName, exp.id as experimentID, exp.experimentName FROM labs INNER JOIN experiments AS exp ON labs.id = exp.labID WHERE labs.id = ? ORDER BY exp.id ASC");
	$stmt->bind_param('i', $labID);
	$labID = $db->real_escape_string($_GET['labID']);
	
	if(!($stmt->execute()))
	{
		die('query failed to execute');
	}
	
	$output = array();
	$stmt->bind_result($retLabID, $labName, $expID, $expName);
	while($stmt->fetch())
	{
		$row = array();
		$row['labID'] = $retLabID;
		$row['labName'] = $labName;
		$row['experimentID'] = $expID;
		$row['experimentName'] = $expName;
		
		$output[] = $row;
	}
	$stmt->close();
	echo json_encode($output);
}
else
{
	$sql = "labs.id as labID, labs.labName, exp.id as experimentID, exp.experimentName FROM labs INNER JOIN experiments AS exp ON labs.id = exp.labID ORDER BY exp.id ASC";
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