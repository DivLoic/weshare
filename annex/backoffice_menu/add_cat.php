<?php

	include('connexion.php');
	
	$req = $bdd->prepare('INSERT INTO categorie(id_rubrique, nom) VALUES(?, ?)');
	$req->exec(array($_POST['id_rub'], $_POST['nom']));
	header('Location: index.php');
	
?>