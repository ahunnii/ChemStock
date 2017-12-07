<?php
header("Access-Control-Allow-Origin: *");
require_once('conn.php');
if(isset($_GET['experimentId']))
{
	$stmt = $db->prepare("SELECT id, experimentId, amount, amountType FROM experimentPrep WHERE experimentId = ?");
	$stmt->bind_param('i', $expId);	

	$expId = $db->real_escape_string ($_GET['experimentId']);
	if (!$stmt->execute ())
	{
		die ('could not get chemicals');
	}

	$stmt->bind_result($id, $experimentId, $amount, $amountType);

	$output = array();
	while($stmt->fetch())
	{
		$row = array();
		$row['id'] = $id;
		$row['experimentId'] = $experimentId;
		$row['amount'] = $amount;
		$row['amountType'] = $amountType;
		
		$output[] = $row;
	}
	
	$stmt->close();
	
	echo json_encode($output);
}
$db->close();

?>