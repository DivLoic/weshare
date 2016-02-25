<?php
	require('models/bdd_connexion.php');
	
	function check_user($pseudo,$password)
	{
		global $bdd;
		
		$req = $bdd->prepare('SELECT count(*) AS nb FROM utilisateur WHERE pseudo = ? AND mot_de_passe = ?');
		$req->execute(array($pseudo,$password));
		$check_user = $req->fetch();
		
		return $check_user['nb'];
	}
	
	function get_user($pseudo)
	{
		global $bdd;
		
		$req = $bdd->prepare('SELECT pseudo FROM utilisateur WHERE pseudo = ?');
		$req->execute(array($pseudo));
		$get_user = $req->fetch();
		
		return $get_user['pseudo'];
	}
?>