<?php
session_start();

require '../class/pdo_connect.php';
include ('../class/user_class.php');
include ('../class/info-user_class.php');
include ('../class/search_class.php');

$img = new InfoUser();
$img->afficheImg($connect);

$find = new Search();
$result = $find->searchUser($connect);


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
    <?php foreach ($result as $value): ?>
        <div class="user">
           <h3><?= $value['login']; ?></h3>
           <span><?= $value['ville']; ?></span>
           <img src="<?= $value['name']; ?>" id="userpic">
           <a href="profil-user.php?id=<?= $value['id_user']; ?>">Voir le profil</a>
         </div>
       <?php endforeach ?>
       <div id="pagin">
         <?php $find->pagin($connect); ?>
       </div>
   </div>
 </div>

 <script src="//ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
 <script type="text/javascript" src="../src/javascript/main.js"></script>
</body>
</html>