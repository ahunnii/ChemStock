<?php
header("Access-Control-Allow-Origin: *");

if($_FILES['resume'])
{
	if($_FILES['resume']['error'] > 0)
	{
		die('Error while uploading, code: ' + $_FILES['file']['error']);
	}

	if($_FILES['resume']['size'] > 16777216)
	{
		die('File uploaded exceeds maximum upload size.');
	}

	require_once("conn.php");
	$fileName = $db->real_escape_string(preg_replace("/[^a-z0-9.\-]/i",'',$_FILES['resume']['name']));
	/*$fileType = $_FILES['resume']['type'];*/
	$fileType = mime_content_type($_FILES['resume']['tmp_name']);
	/*$fileType = pathinfo($_FILES['resume']['name'], PATHINFO_EXTENSION);*/
	$fileSize = $_FILES['resume']['size'];
	$content = $db->real_escape_string(file_get_contents($_FILES['resume']['tmp_name']));
	$sql = "insert into resumes (name, type, timestamp, data) values ('$fileName', '$fileType', NOW(), '$content')";

	if($db->query($sql) !== true)
	{
		die($db->error);
	}
	$db->close();
}
else
{
	http_response_code(400);
	die('400 Bad Request');
}
?>
