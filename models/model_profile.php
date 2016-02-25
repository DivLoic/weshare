<?php
	require('models/bdd_connexion.php');
	
	function informations_user($pseudo)
	{
		global $bdd;
		
		$req = $bdd->prepare('SELECT pseudo, email, code_postal, nom, prenom, date_de_naissance, adresse, tel, url_profile_image, ma_description AS description FROM utilisateur WHERE pseudo = ?');
		$req->execute(array($pseudo));
		$informations_user = $req->fetch();
		
		return $informations_user;
	}
?>