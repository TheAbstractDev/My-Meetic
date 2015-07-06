<?php 
session_start();
require '../class/pdo_connect.php';
include ('../class/user_class.php');
include ('../class/message_class.php');
$sendMessage = new Message();
$sendMessage->createMessage($connect);
header("Location: accueil.php");
exit();
?>