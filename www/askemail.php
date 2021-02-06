<!DOCTYPE html>
<html>
<head>
	<title>Résultats_sport_stfamille/Mot_de_passe_oublie</title>
	<link rel="stylesheet" type="text/css" href="/register.css">

</head>
<body>
	<center><b><p>Mot de passe oublié</p></b></center>
	<center><form method="post">
		<input type="email" name="email" id ="email" placeholder="Indiquez votre email" required><br/>
		<input type="submit" id ="formsend" name="formsend" value="reinitialiser mdp">
	</form></center>
</body>
</html>
<?php

	if(isset($_POST['formsend'])) {

		extract($_POST);

		if (!empty($email)){

			include 'resetmdp.php';
			if(recupMdp($email, $db)){
				header('Location: askcode.php');
			}else{
				$retour = "Il semble qu'aucun compte existe avec le mail: ".$email;
				echo '<script type="text/javascript">window.alert("'.$retour.'");</script>';
			}

		}
	}
?>