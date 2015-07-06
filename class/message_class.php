<?php 

class Message extends Users
{

	private $_receiver;

	public function getLogin()
	{
		return $this->_receiver;
	}

	public function setLogin($receiverLogin)
	{
		$this->_receiver = $receiverLogin;
	}

	public function createMessage($connect)
	{

		if (isset($_POST['login']) && !empty($_POST['login']) && isset($_POST['content']) && !empty($_POST['content']))
		{
			$select = "SELECT id_user, login FROM users WHERE login = :login";
			$reqSelect = $connect->prepare($select);
			$reqSelect->execute(array(
				':login' => $_POST['login']));
			$dataSelect = $reqSelect->fetch();

			$this->_receiver = $dataSelect['id_user'];

			$createM = "INSERT INTO inbox VALUES ('', :sender, :receiver, :content, NOW())";
				$reqMessage = $connect->prepare($createM);
				$test = $reqMessage->execute(array(
					':sender' => $_SESSION['id'],
					':receiver' => $this->_receiver,
					':content' => $_POST['content']));

			}

			elseif(empty($_POST['login']))
			{
				die("Veuillez preciser un destinataire");
			}

			elseif(empty($_POST['content']))
			{
				die("Vous ne pouvez pas envoyer de messages vide");
			}
		}

		public function showMessage($connect)
		{

			$selectShow = "SELECT inbox.content, inbox.id_to_user, inbox.date, users.login FROM inbox LEFT JOIN users ON users.id_user = inbox.id_from_user WHERE users.id_user = :id";
			$reqShow = $connect->prepare($selectShow);
			$reqShow->execute(array(
				':id' => $_SESSION['id']));
			$dataShow = $reqShow->fetchAll();

			return $dataShow;
		}

		public function deleteMessage($connect)
		{

		}	
	}
