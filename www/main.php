<!DOCTYPE html>
<html>
<head>
	<title>Résultats_sport_stfamille/main</title>
	<link rel="stylesheet" type="text/css" href="/main.css">

</head>
<body>
	<center><b><h1>Résultat Sport StFamille</h1>
	<button onclick="window.location.href = 'https://lyceesaintefamille.com';">Accueil</button>
	<button onclick="window.location.href = 'https://lyceesaintefamille.com/vie-de-etablissement/les-activites-menees-et-a-venir/';">Actualité</button>
	<button onclick="window.location.href = 'https://lyceesaintefamille.com/contact/';">Contact</button></b>
	<p>Compétition du moment</p></center>

	
<center><p><?php  
		include 'database.php'; 
		global $db; 
		$q =$db->query("SELECT * FROM resultat_competition 
		where id_competition = 1");	
		while ($var_output = $q->fetch()){
			echo "<u>" . $var_output['nom_competition'] . "</u>" . "<br/>";
			echo "". "<br/>";

			$q =$db->prepare("SELECT * FROM equipe
		where id_equipe = :varout");
		$q -> execute([
		        'varout' => $var_output['premiere_place']
		]);
		while ($var_output_2 = $q->fetch()){
			echo 'Premiere place : ' ."<a href='page_id/page_id4.php'>" . $var_output_2['nom_equipe'] .  "</a>" . "<br/>";
	}
			$q =$db->prepare("SELECT * FROM equipe
		where id_equipe = :varout");
		$q -> execute([
		        'varout' => $var_output['seconde_place']
        ]);
		while ($var_output_2 = $q->fetch()){
			echo 'Seconde place : ' ."<a href='page_id/page_id3.php'>" . $var_output_2['nom_equipe'] .  "</a>" . "<br/>";

	}
			$q =$db->prepare("SELECT * FROM equipe
		where id_equipe = :varout");
		$q -> execute([
		        'varout' => $var_output['troisieme_place']
        ]);
		while ($var_output_2 = $q->fetch()){
			echo 'Troisieme place : ' ."<a href='page_id/page_id2.php'>" . $var_output_2['nom_equipe'] .  "</a>" ."<br/>";
	}
}
?></p></center>

<center><p><?php  


		$q =$db->query("SELECT * FROM resultat_competition 
		where id_competition = 2");	
		while ($var_output = $q->fetch()){
			echo "<u>" . $var_output['nom_competition'] . "</u>" . "<br/>";
			echo "". "<br/>";

			$q =$db->prepare("SELECT * FROM equipe
		where id_equipe = :varout");
		$q -> execute([
		        'varout' => $var_output['premiere_place']
		]);
		while ($var_output_2 = $q->fetch()){
			echo 'Premiere place : ' ."<a href='page_id/page_id1.php'>" . $var_output_2['nom_equipe'] .  "</a>" . "<br/>";
	}
			$q =$db->prepare("SELECT * FROM equipe
		where id_equipe = :varout");
		$q -> execute([
		        'varout' => $var_output['seconde_place']
        ]);
		while ($var_output_2 = $q->fetch()){
			echo 'Seconde place : ' ."<a href='page_id/page_id5.php'>" . $var_output_2['nom_equipe'] .  "</a>" . "<br/>";

	}
			$q =$db->prepare("SELECT * FROM equipe
		where id_equipe = :varout");
		$q -> execute([
		        'varout' => $var_output['troisieme_place']
        ]);
		while ($var_output_2 = $q->fetch()){
			echo 'Troisieme place : ' ."<a href='page_id/page_id6.php'>" . $var_output_2['nom_equipe'] .  "</a>" ."<br/>";
	}
}
?></p></center>
<center><img class="logo" src="/stfamille.jpg"></center>
</body>
</html>