<?php
    require('../models/bdd_connexion.php');
    
	function check_user($pseudo,$password)
	{
		global $bdd;
		
		$req = $bdd->prepare('SELECT count(*) AS nb FROM admin WHERE pseudo = ? AND mot_de_passe = ?');
		$req->execute(array($pseudo,sha1($password)));
		$check_user = $req->fetch();
		
		return $check_user['nb'];
	}
	
	function get_user($pseudo)
	{
		global $bdd;
		
		$req = $bdd->prepare('SELECT pseudo FROM admin WHERE pseudo = ?');
		$req->execute(array($pseudo));
		$get_user = $req->fetch();
		
		return $get_user['pseudo'];
	}
?>
