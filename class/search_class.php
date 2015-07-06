<?php 

class Search extends Users
{
	private $_filtreAge;

	public function getAge()
	{
		return $this->_filtreAge;
	}

	public function setAge($filtreAge)
	{
		$this->_filtreAge = $filtreAge;
	}

	public function searchUser($connect)
	{
		if (isset($_GET['search']))
		{

			if(isset($_GET['genre'] == "none" && isset($_GET['age']) == "none")
			{

				$findUser = "SELECT users.id_user, users.login, users.ville, img.name FROM users LEFT JOIN img ON users.id_user = img.id_user WHERE users.login LIKE '%:user%' active = 1 AND users.id_user != :currentUser GROUP BY users.login";
				$reqFindUser = $connect->prepare($findUser);
				$reqFindUser->execute(array(
					':user' => $_GET['searchBar'],
					':currentUser' => $_SESSION['id']));
				$dataFindUser = $reqFindUser->fetchAll();

				die(var_dump($dataFindUser));
				return $dataFindUser;
			}
		}
	}
}