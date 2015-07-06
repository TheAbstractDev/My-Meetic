<?php

require 'class/pdo_connect.php';
include ('class/user_class.php');

$confirm = new Users();


$reqToken= "SELECT email, token FROM users";
$req = $connect->prepare($reqToken);
$req->execute();
$dataToken = $req->fetchAll();

$token = "";

foreach ($dataToken as $value)
{
	$token = $value['token'];
	$email = $value['email'];
}


$tokenGet = $_GET['token'];

if($token == $tokenGet)
{
	$updt = "UPDATE users SET active = 1 WHERE email = :email";
	$reqUpdt = $connect->prepare($updt);
	$reqUpdt->execute(array(
		':email' => $email));

	$confirm->setActive(1);

	header("Location: index.php");
}
else
{
	echo "Error";
}

?>