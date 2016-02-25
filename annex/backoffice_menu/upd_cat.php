<?php

	include('connexion.php');
	
	$req = $bdd->prepare('UPDATE categorie SET nom = ? WHERE id = ?');
	$req->exec(array($_POST['nom'], $_POST['id_cat']));
	header('Location: index.php');
	
?>