<?php
class Users
{
	private $_sexe;
	private $_login;
	private $_nom;
	private $_prenom;
	private $_date;
	private $_ville;
	private $_email;
	private $_pwd;
	private $_token;
	private $_active = 0;
	private $_img = 0;
	private $_id;

	public function getSexe()
	{
		return $this->_sexe;
	}

	public function setSexe($sexe)
	{
		$this->_sexe = $sexe;
	}



	public function getLogin()
	{
		return $this->_login;
	}

	public function setLogin($login)
	{
		$this->_login = $login;
	}



	public function getNom()
	{
		return $this->_nom;
	}

	public function setNom($nom)
	{
		$this->_nom = $nom;
	}



	public function getPrenom()
	{
		return $this->_prenom;
	}

	public function setPrenom($prenom)
	{
		$this->_prenom = $prenom;
	}



	public function getDate()
	{
		return $this->_date;
	}

	public function setDate($date)
	{
		$this->_date = $date;
	}



	public function getVille()
	{
		return $this->_ville;
	}

	public function setVille($ville)
	{
		$this->_ville = $ville;
	}



	public function getEmail()
	{
		return $this->_email;
	}

	public function setEmail($email)
	{
		$this->_email = $email;
	}



	public function getPwd()
	{
		return $this->_pwd;
	}

	public function setPwd($pwd)
	{
		$this->_pwd = $pwd;
	}



	public function getToken()
	{
		return $this->_token;
	}

	public function setToken($token)
	{
		$this->_token = $token;
	}

	public function getActive()
	{
		return $this->_active;
	}

	public function setActive($active)
	{
		$this->_active = $active;
	}

	public function getImg()
	{
		return $this->_img;
	}

	public function setImg($img)
	{
		$this->_img = $img;
	}

	public function getId()
	{
		return $this->_id;
	}

	public function setId($id)
	{
		$this->_id = $id;
	}




	public function inscription($connect)
	{

		$exist = "SELECT login FROM users";
		$reqExist = $connect->prepare($exist);
		$reqExist->execute();
		$dataExist = $reqExist->fetchAll();

		foreach ($dataExist as $value)
		{
			$login = $value['login'];
		}
		

		if (isset($_POST['sexe']) && isset($_POST['login']) && isset($_POST['nom']) && isset($_POST['prenom']) && isset($_POST['date_naissance']) && isset($_POST['ville']) && isset($_POST['email']) && isset($_POST['pwd'])) 
		{
			
			$this->_nom = $_POST['nom'];
			$this->_prenom = $_POST['prenom'];
			$this->_date = $_POST['date_naissance'];
			$this->_login = $_POST['login'];
			$this->_pwd = sha1($_POST['pwd']);
			$this->_sexe = $_POST['sexe'];
			$this->_email = $_POST['email'];
			$this->_ville = $_POST['ville'];

			$this->_token = uniqid();

			$annee = date('Y');

			list($Y, $M, $D) = explode('-', $this->_date);

			$Yi = intval($Y);

			$age = $annee - $Yi;


			if ($age >= 18)
			{

				$insertAccount = "INSERT INTO users VALUES ('', :nom, :prenom, :date_naissance, :login, :pwd, :sexe, :email, :ville, :token, :active, :img)";
				$register = $connect->prepare($insertAccount);
				$register->execute(array(
					':nom' => $this->_nom,
					':prenom' => $this->_prenom,
					':date_naissance' => $this->_date,
					':login' => $this->_login,
					':pwd' => $this->_pwd,
					':sexe' => $this->_sexe,
					':email' => $this->_email,
					':ville' => $this->_ville,
					':token' => $this->_token,
					':active' => 0,
					':img' => 0));

				$link = "http://localhost:8080/PHP_my_meetic/confirm.php?token=" . $this->_token;

				$message = "Cliquez sur ce lien pour valider votre inscription: " . $link;

				$obj = "Confirmation d'inscription";

				mail($this->_email, $obj, $message);


			}

			else if($age < 18)
			{
				die('trop jeune');
			}

		}

		else
		{
			die("pb");
			exit();
		}
	}

	public function connexion($connect)
	{
		$id;
		$login = "";
		$pwd = "";

		if (isset($_POST['login']) && isset($_POST['pwd']))
		{
			$this->_login = $_POST['login'];
			$this->_pwd = sha1($_POST['pwd']);

			$connecting = "SELECT id_user, login, pwd, active FROM users WHERE login = :login AND pwd = :pwd";
			$reqCo = $connect->prepare($connecting);
			$reqCo->execute(array(
				':login' => $this->_login,
				':pwd' => $this->_pwd));
			$dataCo = $reqCo->fetch();


			$id = $dataCo['id_user'];
			$login = $dataCo['login'];
			$pwd = $dataCo['pwd'];
			$this->_active = $dataCo['active'];

			if($login == $this->_login && $pwd == $this->_pwd && $this->_active == 1)
			{
				$_SESSION['id'] = $id;
				$_SESSION['login'] = $this->_login;

				$basic = "../src/img/no_user.jpg";


				if ($this->_img == 0)
				{
					$insertImg = "INSERT INTO img VALUES ('', :id_user , :basic)";
					$reqImg = $connect->prepare($insertImg);
					$test = $reqImg->execute(array(
						':id_user' => $_SESSION['id'],
						':basic' => $basic));

					$updtImgInt = "UPDATE users SET img = 1 WHERE id_user = :id";
					$reqUpdtImgInt = $connect->prepare($updtImgInt);
					$reqUpdtImgInt->execute(array(
						':id' => $_SESSION['id']));

					$_SESSION['img'] = $basic;

					$this->_img = 1;
				}

				header("Location: ../Main/accueil.php");
				exit();
			}

			elseif ($this->_active === 0)
			{
				die("Votre compte n'est pas active");
			}

			else
			{
				header("Location: ../connect.php");
				exit();
			}
		}
		
		else
		{
			die("error");
			// header("Location: connect.php");
		}

	}

	public function deconnexion()
	{
		session_start();
		session_unset();
		session_destroy();
		header('Location: ../index.php');
		exit();
	}

	public function desact($connect)
	{
		$updt = "UPDATE users SET active = 0 WHERE id_user = :id";
		$reqUpdt = $connect->prepare($updt);
		$reqUpdt->execute(array(
						 ':id_user' => $_SESSION['id']));

		$confirm->setActive(0);

		header("Location: ../index.php");
	}

	public function showUsersInfo($connect)
	{
		$show = "SELECT users.id_user, users.login, users.ville, img.name FROM users LEFT JOIN img ON users.id_user = img.id_user WHERE active = 1 AND users.id_user != :currentUser GROUP BY users.login";
		$reqShow = $connect->prepare($show);
		$reqShow->execute(array(
			':currentUser' => $_SESSION['id']));
		$dataShow = $reqShow->fetchAll();

		return $dataShow;

	}

	public function viewProfil($connect)
	{
		$view = "SELECT users.id_user, users.login, users.nom, users.prenom, users.ville, users.date_naissance, users.email, img.name FROM users LEFT JOIN img ON users.id_user = img.id_user WHERE users.id_user = :get LIMIT 1";
		$reqView = $connect->prepare($view);
		$reqView->execute(array(
			':get' => $_GET['id']));
		$dataView = $reqView->fetchAll();

		return $dataView;

	}

	public function pagin($connect)
	{
		$count = "SELECT COUNT(*) FROM users WHERE active = 1 AND users.id_user != :currentUser GROUP BY users.login";
		$reqCount = $connect->prepare($count);
		$reqCount->execute(array(
			':currentUser' => $_SESSION['id']));
		$dataCount = $reqCount->fetchAll();

		$UserParPage = 6;

		$nbPage = ceil($dataCount[0][0] / $UserParPage);



		$firstPage = 1;

		if (isset($_GET['page']) AND !empty($_GET['page']))
		{
			$firstPage = intval($_GET['page']);

			if($firstPage > $nbPage)
			{
				$firstPage = $nbPage;
			}
		}

		$calcul = $firstPage * $UserParPage - $UserParPage;

		echo "Page: ";

		for ($i=1; $i <=$nbPage ; $i++) 
		{ 
			if ($i == $firstPage) 
			{
				echo "[" . $i . "]";
			}

			else
			{
				?>
				<a name="id" href="?page=<?php echo  $i ?>"><?php echo $i . " " ?></a>
				<?php
			}
		}

	}
}


















