<?php
session_start();

require '../class/pdo_connect.php';
include ('../class/user_class.php');
include ('../class/info-user_class.php');
include ('../class/message_class.php');

$img = new InfoUser();
$img->afficheImg($connect);

?>
<!DOCTYPE html>
<html lang="fr">
<head>
 <link rel="icon" type="image/png" href="../src/img/logo.png" />
 <meta name="description" content="Messagerie" /> 
 <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300,600' rel='stylesheet' type='text/css'>
 <title>Messagerie</title>
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
     <div id="message">
       <div id="create">
       <h2>Envoyer un message</h2>
        <form action="chat-fetch.php" method="POST">
         <input type="text" id="msgLog" name="login" placeholder="A:" />
         <input type="text" id="msg" name="content" placeholder="Saisir un message.." />
         <button type="submit" id="submitMessage"><i class="fa fa-paper-plane"></i></button>
       </form>
     </div>

     <div id="viewButton">
       <h2>Voir les messages</h2>

       <a href="msg-view.php">Cliquez ici</a>

     </div> 

   </div>
 </div>

 <script src="//ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
 <script type="text/javascript" src="../src/javascript/main.js"></script>
</body>
</html>