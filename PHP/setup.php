<?php 
require '../class/pdo_connect.php';
include ('../class/info-user_class.php');

$user = new InfoUser();

?>

<!DOCTYPE html>
<html lang="fr">
<head>
   <link rel="icon" type="image/png" href="src/img/logo.png" />
  <meta name="description" content="Site de rencontre" />
  <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
  <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300,600' rel='stylesheet' type='text/css'>
  <title>My Meetic</title>
  <link rel="stylesheet/less" type="text/css" href="src/css/style.less" />
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <script src="src/less/less.js" type="text/javascript"></script>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
</head>
<body>
<header id="verifH">
	<h1><a href="index.php"><img src="src/img/logo.png"><span>My Meetic</span></a></h1>
</header>
<div id="setup">
	<div id="setup-content">
		 <h2>Merci d'avoir confirmé votre inscription.</h2>
		 <p>Veuillez nous en dire un peu plus sur vous...</p>

		 <form action="set.php" method="post">
		 <p>Vous recherchez:</p>
		 <div id="sexu">
		 	<input type="radio" name="sexe" value="0" class="sexe" id="hsexe">
			<label for="hsexe">Un homme</label>

			<input type="radio" name="sexe" value="1" class="sexe" id="fsexe">
			<label for="fsexe">Une femme</label>

			<input type="radio" name="sexe" value="2" class="sexe" id="dsexe">
			<label for="dsexe">Les deux</label>
		</div>
		 	<textarea name="desc" placeholder"Décrivez vous en quelques lignes" rows="10" cols="45"></textarea> <br>
		 	<a href="#" id="next">Passer à l'étape suivane <i class="fa fa-angle-right"></i></a>
	</div>

		<div id="setup-content-img">
		 <h2>Maintenant, ajoutez une image a votre profil</h2>
		 			<img src="src/img/no_user.jpg">
		 				
		 			<input type="file" class="file" id="file" name="file"/>
		 			<input type="submit" name="sub" id="submit" value="Valider" />
		 				
		 	</form>

		</div>

</div>
	
</div>
<script src="//ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<script type="text/javascript" src="Javascript/script.js"></script>
</body>
</html>