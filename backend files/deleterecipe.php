<?php
require_once("conn.php");
if(isset($_GET['id']))
{
	$id = $db->real_escape_string($_GET['id']);
	$statement = $db->prepare("DELETE FROM recipes WHERE id=?");
	
	$statement->bind_param('i', $id);
	
	if(!($statement->execute()))
	{
		die('query failed to execute');
	}
	$statement->close();
}
$db->close();
?>