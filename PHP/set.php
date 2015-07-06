<?php
require '../class/pdo_connect.php';
include ('../class/info-user_class.php');

$set = new InfoUser();
$set->setUp($connect);

?>

Hello ! votre id est <?php $_SESSION['id']; ?>