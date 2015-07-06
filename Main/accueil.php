<?php
session_start();

if (!isset($_SESSION['id']))
{
	header("Location: ../index.php");
}

require '../class/pdo_connect.php';
include ('../class/user_class.php');
include ('../class/info-user_class.php');
$user = new InfoUser();
$user->recupInfo($connect);
$user->afficheImg($connect);
$view = new Users();

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
     <div id="viewUsers">

       <div id="show">
         <h2>Liste des membres</h2>

         <?php foreach ($view->showUsersInfo($connect) as $info): ?>
          <div class="user">
           <h3><?= $info['login']; ?></h3>
           <span><?= $info['ville']; ?></span>
           <img src="<?= $info['name']; ?>" class="userpic" alt="user picture" />
           <a href="profil-user.php?id=<?= $info['id_user']; ?>">Voir le profil</a>
         </div>
       <?php endforeach ?>
       <div id="pagin">
         <?php $view->pagin($connect); ?>
       </div>
     </div>
   </div>
 </div>
</div>

<script src="//ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<script type="text/javascript" src="../src/javascript/main.js"></script>
</body>
</html>