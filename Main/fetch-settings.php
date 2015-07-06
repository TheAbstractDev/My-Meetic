<?php 
session_start();
require '../class/pdo_connect.php';
include ('../class/user_class.php');
include ('../class/info-user_class.php');
$pwdFetch = new InfoUser();
$pwdFetch->editPassword($connect);
?>