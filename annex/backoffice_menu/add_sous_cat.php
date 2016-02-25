<?php

	include('connexion.php');
	
	$req = $bdd->prepare('INSERT INTO sous_categorie(id_categorie, nom) VALUES(?, ?)');
	$req->exec(array($_POST['id_cat'], $_POST['nom']));
	header('Location: index.php');
	
?>