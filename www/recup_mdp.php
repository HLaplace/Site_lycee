<?php

$header="MIME-Version: 1.0\r\n";
$header.='From:"noreply@mail.com"<recueration_mdp_stfamille@mail.com>'."\n";
$header.='Content-Type:text/html; charset="UTF-8"'."\n";
$header.='Content-Transfer-Encoding: 8bit';

$message='
<html>
	<body>
		<div align="center">
			Bonjour cher utilisateur,
			Veuillez trouvez ci-joint votre mot de passe pour acceder au résultat sportif du lycee
			<br />
			<img src="https://th.bing.com/th/id/OIP.sru5sqPVlwmY8FLPDpdx4gHaCO?w=323&h=105&c=7&o=5&pid=1.7"/>
		</div>
	</body>
</html>
';

mail("hugolaplace33@gmail.com", "Votre demande de rédupération de mot de passe", $message, $header);
?>
