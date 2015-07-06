<?php
session_start();
require '../class/pdo_connect.php';
include ('../class/user_class.php');

$co = new Users();
$co->connexion($connect);

?>