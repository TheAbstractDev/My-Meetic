<?php

class InfoUser extends Users
{
	private $_desc;
	private $_picture;
	private $_prefSex;
	private $_genre;
	private $_age;

	public function getDesc()
	{
		return $this->_sexe;
	}

	public function setDesc($desc)
	{
		$this->_desc = $desc;
	}



	public function getPicture()
	{
		return $this->_picture;
	}

	public function setPicture($picture)
	{
		$this->_picture = $picture;
	}



	public function getPrefSex()
	{
		return $this->_prefSex;
	}

	public function setPrefSex($prefSex)
	{
		$this->_prefSex = $prefSex;
	}



	public function getGenre()
	{
		return $this->_genre;
	}

	public function setGenre($genre)
	{
		$this->_genre = $genre;
	}



	public function getAge()
	{
		return $this->_age;
	}

	public function setAge($age)
	{
		$this->_age = $age;
	}



	public function genre($connect)
	{
		$getGenre = "SELECT * FROM genre";
		$reqGenre = $connect->prepare($getGenre);
		$reqGenre->execute();
		$dataGenre = $reqGenre->fetchAll();

		return $dataGenre;
	}

	public function age($connect)
	{
		$getAge = "SELECT * FROM age";
		$reqAge = $connect->prepare($getAge);
		$reqAge->execute();
		$dataAge = $reqAge->fetchAll();

		return $dataAge;
	}

	public function recupInfo($connect)
	{
		$recup = "SELECT * FROM users WHERE id_user = :id";
		$reqRecup = $connect->prepare($recup);
		$reqRecup->execute(array(
			':id' => $_SESSION['id']));
		$dataRecup = $reqRecup->fetch();

		if ($dataRecup['sexe'] == 0)
		{
			$dataRecup['sexe'] = "Homme";
		}

		else if ($dataRecup['sexe'] == 1)
		{
			$dataRecup['sexe'] = "Femme";
		}



		return $dataRecup;
	}

	public function editProfil($connect)
	{
		$data = $this->recupInfo($connect);
		
		$this->_nom = $data['nom'];
		$this->_prenom = $data['prenom'];
		$this->_date = $data['date_naissance'];
		$this->_login = $data['login'];
		$this->_sexe = $data['sexe'];
		$this->_email = $data['email'];
		$this->_ville = $data['ville'];

		if (isset($_POST['edit-nom']) && !empty($_POST['edit-nom']))
		{	
			$this->_nom = $_POST['edit-nom'];
		}

		if (isset($_POST['edit-prenom']) && !empty($_POST['edit-prenom']))
		{	
			$this->_prenom = $_POST['edit-prenom'];
		}

		if (isset($_POST['edit-age']) && !empty($_POST['edit-age']))
		{	
			$this->_age = $_POST['edit-age'];
		}

		if (isset($_POST['edit-login']) && !empty($_POST['edit-login']))
		{	
			$this->_login = $_POST['edit-login'];
		}

		if (isset($_POST['edit-sexe']) && !empty($_POST['edit-sexe']))
		{	
			$this->_sexe = $_POST['edit-sexe'];
		}

		if (isset($_POST['edit-email']) && !empty($_POST['edit-email']))
		{	
			$this->_email = $_POST['edit-email'];
		}

		if (isset($_POST['edit-ville']) && !empty($_POST['edit-ville']))
		{	
			$this->_ville = $_POST['edit-ville'];
		}

		if ($this->_sexe == "Homme")
		{
			$this->_sexe = 0;
		}

		else if ($this->_sexe == "Femme")
		{
			$this->_sexe = 1;
		}

		$updtInfo = "UPDATE users SET nom = :nom, prenom = :prenom, login = :login, sexe = :sexe, email = :email, ville = :ville, date_naissance = :daten WHERE id_user = :id";
		$reqUpdtInfo = $connect->prepare($updtInfo);
		$reqUpdtInfo->execute(array(
			':nom' => $this->_nom,
			':prenom' => $this->_prenom,
			':login' => $this->_login,
			':sexe' => $this->_sexe,
			':email' => $this->_email,
			':ville' => $this->_ville,
			':daten' => $this->_date,
			':id' => $_SESSION['id']));
		$_SESSION['login'] = $this->_login;		
	}

	public function editPassword($connect)
	{
		$recupPwd = "SELECT pwd FROM users WHERE id_user = :id";
		$recupPwd = $connect->prepare($recupPwd);
		$recupPwd->execute(array(
			':id' => $_SESSION['id']));
		$dataPwd = $recupPwd->fetch();

		$this->_pwd = $dataPwd['pwd'];

		if (isset($_POST['edit-password']) && !empty($_POST['edit-password']) && isset($_POST['edit-password-confirm']) && !empty($_POST['edit-password-confirm']))
		{
			$pwd = $_POST['edit-password'];

			$confirm = $_POST['edit-password-confirm'];

			if($pwd == $confirm)
			{
				$this->_pwd = sha1($_POST['edit-password']);

				$updtPwd = "UPDATE users SET pwd = :pwd WHERE id_user = :id";
				$reqUpdtPwd = $connect->prepare($updtPwd);
				$reqUpdtPwd->execute(array(
					':pwd' => $this->_pwd,
					':id' => $_SESSION['id']));

				header("Location: accueil.php");
				exit();
			}
		}

		else
		{
			header("Location: settings.php");
			exit();
		}
	}

	public function uploadImg($connect)
	{
		$goodExt = array( 'jpg' , 'jpeg' , 'gif' , 'png' );

		$_FILES['pic']['name'];
		$_FILES['pic']['type'];
		$_FILES['pic']['size'];
		$_FILES['pic']['tmp_name'];
		$_FILES['pic']['error'];

		if ($_FILES['pic']['error'] == 2 || $_FILES['pic']['error'] == 1)
		{
			die("Desole, la taille de l'image est trop grande");
		}

		else if ($_FILES['pic']['error'] == 3)
		{
			die("Une erreur est survenue lors de l'upload de l'image");
		}

		else if ($_FILES['pic']['error'] == 4)
		{
			die("Aucun fichier n'a été téléchargé");
		}

		else
		{

			$uploadExt = strtolower(substr(strrchr($_FILES['pic']['name'], '.'),1));

			if (in_array($uploadExt,$goodExt))
			{
				$filesName = "../src/avatar/" . $_SESSION['id'] . "." . $uploadExt;

				$result = move_uploaded_file($_FILES['pic']['tmp_name'], $filesName);

				if ($result)
				{
					$up = "UPDATE img SET name = :name WHERE id_user = :id_user";
					$upReq = $connect->prepare($up);
					$upReq->execute(array(
						':name' => $filesName,
						':id_user' => $_SESSION['id']));
				}

			}
		}
	}

	public function afficheImg($connect)
	{
		$affImg = "SELECT name FROM img WHERE id_user = :id";
		$affReq = $connect->prepare($affImg);
		$affReq->execute(array(
			':id' => $_SESSION['id']));
		$dataImg = $affReq->fetch();

		$_SESSION['img'] = $dataImg['name'];
		
		return $dataImg;

	}

	public function deletePic($connect)
	{
		$basic = "../src/img/no_user.jpg";

		if (isset($_POST['del']))
		{
			$updPic = "UPDATE img set name = :basic WHERE id_user = :id";
			$reqDelPic = $connect->prepare($updPic);
			$toto = $reqDelPic->execute(array(
				':basic' => $basic,
				':id' => $_SESSION['id']));

			$_SESSION['img'] = $basic;
		}
	}
}