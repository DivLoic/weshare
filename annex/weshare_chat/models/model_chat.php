<?php
	require('models/bdd_connexion.php');
	
	function get_messages()
	{
		global $bdd;
		$req = $bdd->query('SELECT chat.message AS message, DATE_FORMAT(chat.date, \'%e/%c/%y\') AS date, DATE_FORMAT(chat.date, \'%Y%m%D\') AS date_calcul, DATE_FORMAT(chat.date, \'%H:%i\') AS temps, utilisateur.pseudo AS pseudo, utilisateur.photo AS photo FROM chat LEFT JOIN utilisateur ON utilisateur.pseudo = chat.pseudo ORDER BY date');
		return $req;
	}
?>