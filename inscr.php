<!DOCTYPE html>
<html lang="fr">
<head>
  <link rel="icon" type="image/png" href="src/img/logo.png" />
  <meta name="description" content="Page d'inscription a My Meetic" />
  <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300,600' rel='stylesheet' type='text/css'>
  <title>Inscription a My Meetic</title>
   <link rel="stylesheet/less" type="text/css" href="src/css/style.less" />
  <script src="src/less/less.js" type="text/javascript"></script>
  <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
  <meta charset="utf-8">
</head>
<body>

<?php include('includes/menu_index.php'); ?>

<div id="inscrContent">
	<div id="opacity">	
		<div class="center">

			<form action="PHP/fetch-suscribe.php" id="inscr" method="POST">

				<div id="inscrForm">

				<h2>Inscription</h2>

				<div id="sexe">
					
					<span>Sexe :</span>
					<div id="radio">	
						<input type="radio" name="sexe" value="0" class="sexe" id="lsexe">
						<label for="lsexe">Homme</label>

						<input type="radio" name="sexe" value="1" class="sexe" id="fsexe">
						<label for="fsexe">Femme</label>
					</div>
				</div>

					<input type="text" class="input" id="prenom" name="prenom" placeholder="Prenom" />
					<input type="text" class="input" id="nom" name="nom" placeholder="Nom" />
					<input type="text" class="input" id="login" name="login" placeholder="Pseudonyme" />
					<input type="date" class="input" id="date" name="date_naissance" />
					<input type="text" class="input" id="ville" name="ville" placeholder="Ville" />
					<input type="email" class="input" id="email" name="email" placeholder="Email" />
					<input type="password" class="input" id="pwd" name="pwd" placeholder="Mot de passe" />
					<input type="submit" id="inscrButton" name="inscr" value="Inscription" />
				</div>

			</form>
		</div>
	</div>
</div>
<script src="//ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<script type="text/javascript" src="../javascript/script.js"></script>
</body>
</html>