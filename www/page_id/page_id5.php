<!DOCTYPE html>
<html>
<?php 
	$var_equipe = 5;
 ?>
<head>
	<title>Résultats_sport_stfamille/info_equipe/<?php echo $var_equipe; ?></title>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="page_id.css" />
</head>

<body>
	<center><h1>
		<p>Résultats de la compétition de natation </p>
		<button onclick="window.location.href = 'https://lyceesaintefamille.com';">Accueil</button>
		<button onclick="window.location.href = 'https://lyceesaintefamille.com/vie-de-etablissement/les-activites-menees-et-a-venir/';">Actualité</button>
		<button onclick="window.location.href = 'https://lyceesaintefamille.com/contact/';">Contact</button>
		<button onclick="window.location.href = '../main.php ?>';">Page precedente</button>
	</h1></center>

<center><h2><?php  	
		
		include '../database.php'; 
		global $db; 
		$q =$db->query("SELECT * FROM equipe 
		where id_equipe = $var_equipe");	
		while ($var_output = $q->fetch()){
			echo $var_output['nom_equipe'] . "<br/>";
		}
?></h2>

<h3><?php  
		$q =$db->query("SELECT * FROM compte 
		where id_equipe = $var_equipe");	
		while ($var_output = $q->fetch()){
			echo $var_output['nom'] . " ". "<br/>";
		}
?></h3>

<h4><?php  
		$q =$db->query("SELECT * FROM compte 
		where id_equipe = $var_equipe");	
		while ($var_output = $q->fetch()){
			echo $var_output['prenom'] . "<br/>";
		}
?></h4></center>
</body>
</html>