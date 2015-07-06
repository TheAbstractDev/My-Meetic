<header id="header">
	<h1><a href="accueil.php"><img src="../src/img/logo.gif" alt="logo" /><span>My Meetic</span></a></h1>
</header>
<nav class="mynavbar accueil">
 <div class="content">
 	<ul id="ul">
 		<li><a href="accueil.php" class="btn">Accueil</a></li>
 		<li>
 		<li><a href="search.php" class="btn">Recherche</a></li>
 		<li>
 		<a href="chat.php" class="btn">Messagerie</a>
 		</li>
 		<li>
 			<a href="#" class="btn">
 				<img src="<?= $_SESSION['img']; ?>" class="link" />
 			</a>
 			<ul id="ulSlide">
 				<li><a href="settings.php">Parametres&nbsp;&nbsp;<i class="fa fa-cog"></i></a></li>
 				<li><a href="profil.php">Mon Profil&nbsp;&nbsp;&nbsp;&nbsp;<i class="fa fa-user"></i></a></li>
 				<li><a href="../PHP/deco.php">Deconnexion<i class="fa fa-sign-out"></i></a></li>
			</ul>
 		</li>
 	</ul>
 </div>
 		<span id="loginSession" class="link"><?= $_SESSION['login']; ?></span>
</nav>