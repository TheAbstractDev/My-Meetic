<?php 

require 'class/pdo_connect.php';
include ('class/user_class.php');

$account = new Users();
$account->inscription($connect);

?>

<!DOCTYPE html>
<html lang="fr">
<head>
  <link rel="icon" type="image/png" href="src/img/logo.png" />
  <meta name="description" content="verification d'email" />
  <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300,600' rel='stylesheet' type='text/css'>
  <title>Verifiez votre email</title>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
  <meta charset="utf-8">
  <link rel="stylesheet/less" type="text/css" href="src/css/style.less" />
  <script src="src/less/less.js" type="text/javascript"></script>
</head>
<body>
<header id="verifH">
	<h1><a href="index.php"><img src="src/img/logo.png"><span>My Meetic</span></a></h1>
</header>
<div id="verifiez">
	<h2>Bonjour, <?php echo $account->getLogin(); ?>. <br> Un mail à <span><?php echo $account->getEMail(); ?></span> à été envoyé. <br> Verifiez votre boite mail pour confirmer votre inscription !</h2>
</div>
</body>
</html>