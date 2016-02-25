<?php

	include('connexion.php');
	
	$req1 = $bdd->prepare('DELETE FROM sous_categorie WHERE id_categorie = ?');
	$req1->exec(array($_POST['id_cat']));
	$req2 = $bdd->prepare('DELETE FROM categorie WHERE id = ?');
	$req2->exec(array($_POST['id_cat']));
	header('Location: index.php');
	
?>