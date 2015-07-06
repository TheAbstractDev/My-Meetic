<!DOCTYPE html>
<html lang="fr">
<head>
	<link rel="icon" type="image/png" href="src/img/logo.png" />
	<meta name="description" content="Page de connection a My Meetic" />
	<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300,600' rel='stylesheet' type='text/css'>
	<title>Connexion a My Meetic</title>
	<link rel="stylesheet/less" type="text/css" href="src/css/style.less" />
	<script src="src/less/less.js" type="text/javascript"></script>
	<link href="//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
	<meta charset="utf-8">
</head>
<body>

	<?php include('includes/menu_index.php'); ?>

	<div id="connectContent">
		<div id="opacity">	
			<div class="center">

				<form action="PHP/fetch.php" id="connectbg" method="POST">

					<div id="connectForm">

						<h2>Connexion</h2>
						<input type="text" id="login" class="connectinput" name="login" placeholder="Login" />
						<input type="password" id="pwd" class="connectinput" name="pwd" placeholder="Mot de passe" />
						<input type="submit" id="connectButton" name="connect" value="Connexion" />
					</div>

				</form>
			</div>
		</div>
	</div>

	<script src="//ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
	<script type="text/javascript" src="../javascript/script.js"></script>
</body>
</html>