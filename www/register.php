<!DOCTYPE html>
<html>
<head>
	<title>Résultats_sport_stfamille/creation_compte</title>
	<link rel="stylesheet" type="text/css" href="/register.css">

</head>
<body>
	<center><h1>Résultat Sport Stfamille</h1>
	<center><b><p>Ajout d'un utilisateur</p></b></center>
	<button onclick="window.location.href = 'https://lyceesaintefamille.com';">Accueil</button>
	<button onclick="window.location.href = 'https://lyceesaintefamille.com/vie-de-etablissement/les-activites-menees-et-a-venir/';">Actualité</button>
	<button onclick="window.location.href = 'https://lyceesaintefamille.com/contact/';">Contact</button></center>

	<center><form method="post">
		<input type="nom" name="nom" id ="nom" placeholder="Nom" required><br/>
		<input type="prenom" name="prenom" id ="prenom" placeholder="Prenom" required><br/>
		<input type="email" name="email" id ="email" placeholder="Indiquez votre email" required><br/>
		<input type="password" name="password" id ="password" placeholder="mot de passe" required><br/>
		<input type="password" name="cpassword" id ="cpassword" placeholder="comfirmez votre mdp" required><br/>
		<input type="submit" name="formsend" id="formsend" value="créer"><br/>
	</form></center>

<?php
	
	if(isset($_POST['formsend'])) {

		extract($_POST);

		if (!empty($nom) &&!empty($prenom) &&!empty($password) && !empty($cpassword) && !empty($email) ){
			$options = ['cost' => 12,];

			$haspass = password_hash($password, PASSWORD_BCRYPT, $options);

			include 'database.php';
			global $db;

			if ($password == $cpassword){

				$q = $db-> prepare("INSERT INTO account_user (nom,prenom,mail,PASSWORD)
					VALUES (:nom,:prenom,:email,:password)");
				$q->execute([
					'nom' => $nom,
					'prenom' => $prenom,
					'email' => $email,
					'password' => $haspass
				]);
 				header('Location: main.php');
			}

			else{
				$retour = "erreur : verifiez que les mdp soient identiques";
				echo '<script type="text/javascript">window.alert("'.$retour.'");</script>';
			}
		}
	}
?>
</body>
</html>