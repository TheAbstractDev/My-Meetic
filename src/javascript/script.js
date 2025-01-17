$(document).ready(function()
{
	
	function verifRegister(e)
	{
		var login = $("#login");
		var nom = $("#nom");
		var prenom = $("#prenom");
		var date = $("#date");
		var ville = $("#ville");
		var email = $("#email");
		var pwd = $("#pwd");
		var regex = /^[a-zA-Z0-9._-]+@[a-z0-9._-]{2,}\.[a-z]{2,4}$/;

		if(login.val() == 0 && nom.val() == 0 && prenom.val() == 0 && date.val() == 0 && ville.val() == 0 && email.val() == 0 && pwd.val() == 0)
		{
			alert("Veuillez remplir tous les champs");
		}

		else if (login.val() == 0)
		{
			login.css(
			{
				"border" : "1px solid #D42020"
			});

			e.preventDefault();
		}

		else if (nom.val() == 0)
		{
			nom.css(
			{
				"border" : "1px solid #D42020"
			});

			e.preventDefault();
		}

		else if (prenom.val() == 0)
		{
			prenom.css(
			{
				"border" : "1px solid #D42020"
			});
			e.preventDefault();
		}

		else if (date.val() == 0)
		{
			date.css(
			{
				"border" : "1px solid #D42020"
			});

			e.preventDefault();
		}

		else if (ville.val() == 0)
		{
			ville.css(
			{
				"border" : "1px solid #D42020"
			});

			e.preventDefault();
		}


		else if (pwd.val() == 0)
		{
			pwd.css(
			{
				"border" : "1px solid #D42020"
			});

			e.preventDefault();
		}


		// else if (!regex.test(email.html()))
		// {
		// 	email.css(
		// 	{
		// 		"border" : "1px solid #D42020"
		// 	});

		// 	alert("Votre email est invalide !");
		// 	e.preventDefault();
		// }

		else if (email.val() == 0)
		{
			email.css(
			{
				"border" : "1px solid #D42020"
			});

			e.preventDefault();
		}
	}

	$("#inscrButton").click(verifRegister);
	
	function verifConnexion(e)
	{

		var login = $("#login");
		var pwd = $("#pwd");

		if (login.val() == 0)
		{
			login.css(
			{
				"border" : "2px solid #D42020"
			});

			e.preventDefault();
		}

		if (pwd.val() == 0)
		{
			pwd.css(
			{
				"border" : "2px solid #D42020"
			});

			e.preventDefault();
		}
	}

	$("#connectButton").click(verifConnexion);

	$("#next").click(function(e)
	{
		e.preventDefault();
		$("#setup-content").css({"visibility" : "hidden"});
		$("#setup-content-img").css({"visibility" : "visible"});
	});

});