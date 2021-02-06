<!DOCTYPE html>
<html>
<head>
	<title>Résultats_sport_stfamille/connexion</title><center>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="/connexion.css">
</head>
<body>
	<center><b><h1>Résultat Sport StFamille</h1></center>
	<center><p>Connexion à votre compte</p></center>

		<button onclick="window.location.href = 'https://lyceesaintefamille.com';">Accueil</button>
		<button onclick="window.location.href = 'https://lyceesaintefamille.com/vie-de-etablissement/les-activites-menees-et-a-venir/';">Actualité</button>
		<button onclick="window.location.href = 'https://lyceesaintefamille.com/contact/';">Contact</button></b>

	<center><form method="post">
		<input type="email" name="email" id ="email" placeholder="Indiquez votre email" required><br/>
		<input type="password" name="password" id ="password" placeholder="mot de passe" required><br/>
		<input type="submit" name="formsend" id="formsend" value="Connexion"><br/>
		</form></center>

	<p><button onclick="window.location.href = 'register.php';">Créer un compte</button>
	<button onclick="window.location.href = 'askemail.php';">mot de passe oublier</button></p>

<?php

	if(isset($_POST['formsend'])) {

		extract($_POST);

		include 'database.php'; 
		global $db;

		$q =$db->prepare("SELECT * FROM account_user
			where mail = :email");

		$q -> execute([
			'email' => $email
		]);

		$var_output = $q->fetch();

			if (password_verify($password, $var_output['PASSWORD'])) {
		    	header('Location: main.php');
			} 

			else {
		    	$retour = "Le mot de passe ou l'adresse email est invalide";
				echo '<script type="text/javascript">window.alert("'.$retour.'");</script>';
			}			
	}
?>

</body>
</html>