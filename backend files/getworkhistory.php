<?php
header("Access-Control-Allow-Origin: *");
require_once("conn.php");

if($_GET)
{
	if($_GET['id'])
	{
		$stmt = $db->prepare("SELECT * FROM applicantWorkHistory WHERE applicationID = ?");
		$stmt->bind_param('i', $appID);
		$appID = $db->real_escape_string($_GET['id']);
		
		if(!($stmt->execute()))
		{
			die('Failed to excute query');
		}
		$output = array();
		$stmt->bind_result($id, $applicationID, $employer, $dutiesResponsibilities, $startDate, $endDate);
		while($stmt->fetch())
		{
			$row = array();
			
			$row['id'] = $id;
			$row['applicationID'] = $applicationID;
			$row['employer'] = $employer;
			$row['dutiesResponsibilities'] = $dutiesResponsibilities;
			$row['startDate'] = $startDate;
			$row['endDate'] = $endDate;
			
			$output[] = $row;
		}
		$stmt->close();
		echo json_encode($output);
	}
}

$db->close();
?>