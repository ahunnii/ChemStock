<?php

$db = new mysqli('localhost', 'root', 'PASSHOLDER', 'chemstock');

if($db->connect_error)
{
	die('unable to connect to db');
}


?>