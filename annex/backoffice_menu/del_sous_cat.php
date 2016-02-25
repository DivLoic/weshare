<?php

	include('connexion.php');
	
	$req = $bdd->prepare('DELETE FROM sous_categorie WHERE id = ?');
	$req->exec(array($_POST['id_sous_cat']));
	header('Location: index.php');
	
?>