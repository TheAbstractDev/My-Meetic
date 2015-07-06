<?php 
session_start();
require '../class/pdo_connect.php';
include ('../class/user_class.php');
include ('../class/info-user_class.php');
$upload = new InfoUser();
$upload->uploadImg($connect);
header("Location: profil.php");
exit();
?>