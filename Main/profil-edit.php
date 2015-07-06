<?php
session_start();

require '../class/pdo_connect.php';
include ('../class/user_class.php');
include ('../class/info-user_class.php');
$infoEdit = new InfoUser();

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
     <div id="blockInfo">
       <div id="info">
         <form action="profil-fetch.php" method="POST">
           <h2>Votre Profil</h2>
           <ul>
             <li>Nom: <input type="text" class="edit" name="edit-nom" placeholder="Nom" /></li>
             <li>Prenom: <input type="text" class="edit" name="edit-prenom" placeholder="Prenom" /></li>
             <li>Pseudo: <input type="text" class="edit" name="edit-login" placeholder="Pseudo" /></li>
             <li>Email: <input type="text" class="edit" name="edit-email" placeholder="Email" /></li>
             <li>Ville: <input type="text" class="edit" name="edit-ville" placeholder="Ville" /></li>
             <li>Sexe: <input type="text" class="edit" name="edit-sexe" placeholder="Sexe" /></li>
             <li>Date de naissance: <input type="date" class="edit" name="edit-age" placeholder="Date de naissance" /></li>
           </ul>
           <button type="submit" id="validate-edit">Valider <i class="fa fa-check"></i></button>
           <a href="profil.php" id="cancel-edit">Annuler <i class="fa fa-times"></i></a>
         </form>


       </div>
       <div id="photo">
        <img src="<?= $_SESSION['img']; ?>" />
        <form action="img-upload.php" method="POST" enctype="multipart/form-data">
         <input type="hidden" name="MAX_FILE_SIZE" value="100000" />      
         <input type="file" id="pic" name="pic" />
         <button type="submit" id="upload">Envoyer <i class="fa fa-cloud-upload"></i></button>
       </form>

       <form action="delpic.php" method="POST">
         <button type="submit" name="del" id="delupload">Supprimer la photo</button>
       </form>
     </div>
   </div>

 </div>
</div>
</div>

<script src="//ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<script type="text/javascript" src="../src/javascript/main.js"></script>
</body>
</html>