<?php  

	define('HOST','localhost');
	define('DB_NAME','site_bdd');
	define('USER', 'root');
	define('PASS','');

	try {
		$db = new PDO("mysql:host=" . HOST . ";dbname=" . DB_NAME, USER, PASS);
		$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		//echo "Conexion OK". "<br/>";
	} catch (PDOExcepion $e) {
		echo $e;		
	}
?>