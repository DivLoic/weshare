<?php
	require('models/bdd_connexion.php');
	
	function get_user($id_user)
	{
		global $bdd;
		
		$req = $bdd->prepare('SELECT id, pseudo, email FROM utilisateur WHERE id = ?');
		$req->execute(array($id_user));
		$data = $req->fetch();
		return $data;
	}
	
	function get_mail()
	{
		global $bdd;
		
		$req = $bdd->query('SELECT valeur AS email FROM site_information WHERE type = \'email\'');
		$data = $req->fetch();
		return $data['email'];
	}
	
?>