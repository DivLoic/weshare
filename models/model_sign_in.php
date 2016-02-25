<?php
	require('models/bdd_connexion.php');
	
	function check_account($email, $password)
	{
		global $bdd;
		
		$req = $bdd->prepare('SELECT COUNT(*) AS nb FROM utilisateur WHERE email = ? AND mot_de_passe = ? AND confirmation = \'confirmation\'');
		$req->execute(array($email, sha1($password)));
		$inscrit = $req->fetch();
		
		return $inscrit['nb'];
	}
	
	function get_pseudo_id($email)
	{
		global $bdd;
		
		$req = $bdd->prepare('SELECT id, pseudo FROM utilisateur WHERE email = ?');
		$req->execute(array($email));
		$data = $req->fetch();
		
		return $data;
	}
	
	function nb_connexion($email)
	{
		global $bdd;
		
		$req = $bdd->prepare('SELECT nb_connexion FROM utilisateur WHERE email = ?');
		$req->execute(array($email));
		$data = $req->fetch();
		
		$req = $bdd->prepare('UPDATE utilisateur SET nb_connexion = ? WHERE email = ?');
		$req->execute(array($data['nb_connexion']+1,$email));		
		
		return $data['nb_connexion'];
	}
	
    function check_item_user_signin($item,$id_user)
    {
     	global $bdd;
     	$req = $bdd->prepare('SELECT COUNT(*) AS nb FROM annonce WHERE id = ? AND id_utilisateur = ?');
     	$req->execute(array($item,$id_user));
     	$nb_item = $req->fetch();
     	
     	return $nb_item['nb'];
    }
?>