<?php
header("Access-Control-Allow-Origin: *");
require_once('conn.php');
if(isset($_GET['experimentID']))
{
	$stmt = $db->prepare("SELECT id, experimentID, chemicalName, amount, amountType FROM experimentPrep WHERE experimentID = ?");
	$stmt->bind_param('i', $expId);	

	$expId = $db->real_escape_string ($_GET['experimentID']);
	if (!$stmt->execute ())
	{
		die ('could not get chemicals');
	}

	$stmt->bind_result($id, $experimentId, $chemicalName, $amount, $amountType);

	$output = array();
	while($stmt->fetch())
	{
		$row = array();
		$row['id'] = $id;
		$row['experimentID'] = $experimentId;
		$row['chemicalName'] = $chemicalName;
		$row['amount'] = $amount;
		$row['amountType'] = $amountType;
		
		$output[] = $row;
	}
	
	$stmt->close();
	
	echo json_encode($output);
}
$db->close();

?>