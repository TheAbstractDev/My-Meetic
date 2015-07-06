<?php
session_start();

require '../class/pdo_connect.php';
include ('../class/user_class.php');
include ('../class/info-user_class.php');

$infoUserProfil = new infoUser();
$infoUserProfil->afficheImg($connect);

$userProfil = new Users();
$profil = $userProfil->viewProfil($connect);

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
       <?php foreach ($profil as $info): ?>
         <h2>Votre Profil de <?= $info['login']; ?></h2>
         <ul>
             <li>Nom: <span><?= $info['login']; ?></span></li>
           <li>Prenom: <span><?= $info['prenom']; ?></span></li>
           <li>Pseudo: <span><?= $info['nom']; ?></span></li>
           <li>Email: <span><?= $info['email']; ?></span></li>
           <li>Ville: <span><?= $info['ville']; ?></span></li>
           <li>Date de naissance: <span><?= $info['date_naissance']; ?></span></li>
         <?php endforeach ?>
         </ul>
         <a href="chat.php" id="send">Envoyer un message <i class="fa fa-pencil"></i></a>
       </div>

       <div id="photo">
        <img src="<?= $info['name']; ?>" id="userpic">

     </div>
   </div>
 </div>

 <script src="//ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
 <script type="text/javascript" src="../src/javascript/main.js"></script>
</body>
</html>