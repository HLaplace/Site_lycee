<?php

include 'database.php';

function genererChaineAleatoire($longueur = 10)
{
 return substr(str_shuffle(str_repeat($x='0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ', ceil($longueur/strlen($x)) )),1,$longueur);
}

function recupMdp($email, $dataBase){
	if(isset($email)){
		$q = $dataBase -> prepare("SELECT * FROM account_user WHERE mail = :mail");
		$q -> execute([
			'mail' => $email
		]);

		$list = $q -> fetch();

		if($list != false){

			$codec = genererChaineAleatoire();
			$q = $dataBase -> prepare("SELECT * FROM codereset WHERE email = :mail");
			$q -> execute([
				'mail' => $email
			]);

			if($q -> fetch() != false){
				$q = $dataBase -> prepare("UPDATE codereset SET code = :code WHERE email = :mail");
				$q -> execute([
				'mail' => $email,
				'code' => $codec
				]);
			}else{
				$q = $dataBase -> prepare("INSERT INTO codereset(email, code) VALUES(:mail,:code)");
				$q -> execute([
				'mail' => $email,
				'code' => $codec
				]);
			}

			$header = "MIME-Version: 1.0\r\n";
			$header.='From:"noreply@mail.com"<recuperation_mdp_stfamille@mail.com>'."\n";
			$header.='Content-Type:text/html; charset="UTF-8"'."\n";
			$header.='Content-Transfer-Encoding: 8bit';

			$message='
			<html>
				<body>
					<div align="center">
						<p span style="font-size:150%;">Bonjour '.$list['prenom'].',<br></p>
						<p span style="font-size:150%;">Veuillez trouvez ci-joint votre code de reinitialisation de mot de passe:
						<u>'.$codec.'<br></u></p>
						<br />
						<img src="https://th.bing.com/th/id/OIP.sru5sqPVlwmY8FLPDpdx4gHaCO?w=323&h=105&c=7&o=5&pid=1.7"/>
					</div>
				</body>
			</html>
			';

			mail($email, "Votre demande de récupération de mot de passe", $message, $header);
			return true;
		}
	}
	return false;
}
function checkCode($email, $resetcode, $db){
	if(isset($resetcode)){
		$q = $db -> prepare("SELECT * FROM codereset WHERE email = :mail");
		$q -> execute([
			'mail' => $email
		]);
		if($tabl = $q -> fetch()){

			if(isset($tabl['code'])){
				return $resetcode == $tabl['code'];
			}else{
				return false;
			}

		}else{
			return false;
		}
	}else{
		return false;
	}
}

function updateMdp($mail, $code, $mdp, $dataBase){
	if(checkCode($mail, $code, $dataBase)){
		$q = $dataBase -> prepare("UPDATE account_user SET PASSWORD = :mdp WHERE mail = :mail");
		$q -> execute([
			'mail' => $mail,
			'mdp' => $mdp
		]);

		$q = $dataBase -> prepare("DELETE FROM `codereset` WHERE email = :mail");
		$q -> execute([
			'mail' => $mail
		]);
		return true;
	}else{
		return false;
	}
}