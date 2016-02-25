<?php

	include('connexion.php');
	
	$req = $bdd->prepare('UPDATE sous_categorie SET nom = ? WHERE id = ?');
	$req->exec(array($_POST['nom'], $_POST['id_sous_cat']));
	header('Location: index.php');
	
?>