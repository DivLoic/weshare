<?php
	require('models/bdd_connexion.php');
	
	function check_request_user($id_user, $key, $id)
	{
		global $bdd;
		
		$reply = $bdd->prepare('SELECT COUNT(*) AS nb FROM demande WHERE id_utilisateur = ? AND cle = ? AND id = ?');
		$reply->execute(array($id_user, $key, $id));
	
		$data = $reply->fetch();
		return $data['nb'];
	}
	
	function delete_request_user($id_user, $key, $id)
	{
		global $bdd;
		
		$req = $bdd->prepare('DELETE FROM demande WHERE id_utilisateur = ? AND cle = ? AND id = ?');
		$req->execute(array($id_user, $key, $id));
	}
?>