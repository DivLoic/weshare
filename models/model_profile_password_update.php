<?php
    include('bdd_connexion.php');
    
    function check_password($password,$id)
    {
    	global $bdd;
    	
		$req = $bdd->prepare('SELECT COUNT(*) AS nb FROM utilisateur WHERE mot_de_passe = ? AND id = ?');
		$req->execute(array($password,$id));
		$data = $req->fetch();
		
		return $data['nb'];
	}
	
	function update_password($password,$id)
    {
    	global $bdd;
    	
		$req = $bdd->prepare('UPDATE utilisateur SET mot_de_passe = ? WHERE id = ?');
		$req->execute(array($password,$id));

	}
	
?>
