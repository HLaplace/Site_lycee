<!DOCTYPE html>
<html>
<head>
	<title>Résultats_sport_stfamille/Mot_de_passe_oublie</title>
	<link rel="stylesheet" type="text/css" href="/register.css">
</head>
	<center><b><p>Mot de passe oublié</p></b></center>
<center><form method="post">
	<input type="email" name="email" id ="email" placeholder="email compte" required><br/>
	<input type="TEXT" name="code" id ="code" placeholder="code email" required><br/>
	<input type="password" name="password" id ="password" placeholder="mot de passe" required><br/>
	<input type="password" name="cpassword" id ="cpassword" placeholder="comfirmez votre mdp" required><br/>
	<input type="submit" name="formsend" id="formsend" value="Modififez mdp"><br/>
</form></center>

<?php 

	if(isset($_POST['formsend'])) {

		extract($_POST);

		if (!empty($password) && !empty($cpassword) && !empty($email) ){
			$options = ['cost' => 12,];

			if ($password == $cpassword){

				include 'resetmdp.php';
				$haspass = password_hash($password, PASSWORD_BCRYPT, $options);

				if(updateMdp($email, $code, $haspass, $db)){
 					header('Location: main.php');
 				}else{
 					$retour = "Le code n'est pas bon";
					echo '<script type="text/javascript">window.alert("'.$retour.'");</script>';
 				}
			}
			else{
				$retour = "mdp different";
				echo '<script type="text/javascript">window.alert("'.$retour.'");</script>';
			}
		}
	}
?>
</html>