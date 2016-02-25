<?php
	require('models/bdd_connexion.php');
	
	function get_edito($id)
	{
		global $bdd;
		
		$req = $bdd->prepare('SELECT prenom, nom, edito, photo FROM edito_fondateur WHERE id = ?');
		$req->execute(array($id));
		$edito = $req->fetch();
		
		return $edito;
	}
?>