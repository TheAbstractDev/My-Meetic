<?php
session_start();

require '../class/pdo_connect.php';
include ('../class/user_class.php');
include ('../class/info-user_class.php');
$userPwd = new InfoUser();

$noImg = "../src/img/no_user.jpg";

if(empty($_SESSION['img']))
{
  $_SESSION['img'] = $noImg;
}

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
     <div id="blockSettings">
       <div id="pwd">
         <h2>Modifiez votre mot de passe</h2>
         <div class="content">
           <form action="fetch-settings.php" method="POST">
             <input type="password" class="pwdi" name="edit-password" placeholder="Nouveau mot de passe" />
             <input type="password" class="pwdi" name="edit-password-confirm" placeholder="Confirmez votre de passe" />
             <button type="submit" id="pwd-edit">Modifier <i class="fa fa-unlock-alt"></i></button>
           </form>
         </div>
       </div>

       <div id="delete">
        <h2>Reglages</h2>
         <div class="content">
           <form action="desact.php" method="POST">
             <button type="submit" id="desact">Desactiver mon compte <i class="fa fa-power-off"></i></button>
           </form>

         </div>
       </div>
     </div>
 </div>
</div>
</div>

<script src="//ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<script type="text/javascript" src="../src/javascript/main.js"></script>
</body>
</html>