<?php
session_start();

require '../class/pdo_connect.php';
include ('../class/user_class.php');
include ('../class/info-user_class.php');

$userInfo = new InfoUser();
$img = $userInfo->afficheImg($connect);


?>
<!DOCTYPE html>
<html lang="fr">
<head>
 <link rel="icon" type="image/png" href="../src/img/logo.png" />
 <meta name="description" content="Page d'accueil de My Meetic" /> 
 <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300,600' rel='stylesheet' type='text/css'>
 <title>Page d'accueuil</title>
 <link rel="stylesheet/less" type="text/css" href="../src/css/style.less" />
 <script src="../src/less/less.js" type="text/javascript"></script>
 <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
 <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
 <meta charset="utf-8">
</head>
<body>
  <?php include("../includes/menu_accueil.php"); ?>
  <div id="profil">
   <div id="overlay">
     <div id="blockInfo">
       <div id="info">
         <h2>Votre Profil</h2>
         <ul>
           <?php $info = $userInfo->recupInfo($connect); ?>
           
           <li>Nom: <span><?= $info['nom']; ?></span></li>
           <li>Prenom: <span><?= $info['prenom']; ?></span></li>
           <li>Pseudo: <span><?= $info['login']; ?></span></li>
           <li>Email: <span><?= $info['email']; ?></span></li>
           <li>Ville: <span><?= $info['ville']; ?></span></li>
           <li>Sexe: <span><?= $info['sexe']; ?></span></li>
           <li>Date de naissance: <span><?= $info['date_naissance']; ?></span></li>
         </ul>
         <a href="profil-edit.php" id="edit">Modifier mes informations <i class="fa fa-pencil"></i></a>
       </div>

       <div id="photo">
         <img src="<?= $_SESSION['img']; ?>" />

     </div>
   </div>
 </div>

 <script src="//ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
 <script type="text/javascript" src="../src/javascript/main.js"></script>
</body>
</html>