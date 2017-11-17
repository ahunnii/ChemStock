<?php

$db = new mysqli('localhost', 'chemstock', 'PASSHOLDER', 'chemstock');

if($db->connect_error)
{
	die('unable to connect to db');
}


?>