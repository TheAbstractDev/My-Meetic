<?php
session_start();

if (!isset($_SESSION['id']))
{
  header("Location: ../index.php");
}

require '../class/pdo_connect.php';
include ('../class/user_class.php');
include ('../class/info-user_class.php');
$search = new InfoUser();
$search->recupInfo($connect);
$search->afficheImg($connect);
$opt = new InfoUser();

?>

<!DOCTYPE html>
<html lang="fr">
<head>
 <link rel="icon" type="image/png" href="src/img/logo.png" />
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
  <div id="main">
   <div id="overlay">
    <div id="search">
      <h2>Recherchez des personnes selon leur pseudonymes, leur localisation, leur age ou leur genres.</h2>
      <form action="result.php" method="GET" >
        <input type="text" id="searchBar" name="searchBar" placeholder="Recherche" />
        <button type="submit" id="searchButton" name="search">
          <i class="fa fa-search"></i>
        </button>

        <div id="selectGroup">
          <select name="genre" class="select">
          foreach
            <option value="-1">Aucun Genre</option>
           <?php foreach ($opt->genre($connect) as $value): ?>
            <option value="<?= $value['id_genre']; ?>"> <?= $value['nom']; ?></option> 
           <?php endforeach ?>
          </select>

          <select name="age" class="select">
            <option value="-1">Age</option>
             <?php foreach ($opt->age($connect) as $value): ?>
            <option value="<?= $value['id_age']; ?>"> <?= $value['age']; ?></option> 
           <?php endforeach ?>
          </select>
        </div>
      </form>
    </div>
  </div>
</div>

<script src="//ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<script type="text/javascript" src="../src/javascript/main.js"></script>
</body>
</html>