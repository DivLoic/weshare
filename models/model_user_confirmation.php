<?php
	require('models/bdd_connexion.php');
	
	function check_user_key($pseudo, $key)
	{
		global $bdd;
		
		$reply = $bdd->prepare('SELECT COUNT(*) AS nb FROM utilisateur WHERE pseudo = ? AND confirmation = ?');
		$reply->execute(array($pseudo, $key));
	
		$data = $reply->fetch();
		return $data['nb'];
	}
	
	function confirm_user($pseudo)
	{
		global $bdd;
		
		$req = $bdd->prepare('UPDATE utilisateur SET confirmation = \'confirmation\' WHERE pseudo = ? AND confirmation != \'banni\' ');
		$req->execute(array($pseudo));
	}
?>