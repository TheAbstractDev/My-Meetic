<?php

try
{
	$connect = new PDO('mysql:host=localhost;dbname=meetic', 'root', 'root');
}

catch(PDOException $e)
{
	die($e->getMessage());
}

?>