<?php
	$host = 'localhost';
	$db_name = 'wesharechat';
	$db_user = 'root';
	$db_password = 'root';
	
	try
	{
		$bdd = new PDO('mysql:host='.$host.';dbname='.$db_name, $db_user, $db_password);
		$bdd->exec("SET CHARACTER SET utf8");
	}
	catch (Exception $e)
	{
			die('Erreur : ' . $e->getMessage());
	}
?>