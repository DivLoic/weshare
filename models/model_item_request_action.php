<?php
	require('models/bdd_connexion.php');
	
	function check_request($request,$id_user)
	{
		global $bdd;
		
		$req = $bdd->prepare('SELECT COUNT(*) AS nb FROM demande WHERE demande = ? AND id_utilisateur = ?');
		$req->execute(array($request,$id_user));
		$data = $req->fetch();
		
		return $data['nb'];
	}
	
	function insert_request($id_user,$request,$key)
	{
		global $bdd;
		
		$req = $bdd->prepare('INSERT INTO demande (id_utilisateur, demande, cle, date) VALUES(?,?,?,NOW())');
		$req->execute(array($id_user,htmlspecialchars($request),$key));
	}
		
?>	

