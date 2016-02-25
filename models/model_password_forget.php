<?php
    include('bdd_connexion.php');
    
    function get_user($email)
    {
     	global $bdd;
     	
     	$req = $bdd->prepare('SELECT COUNT(*) AS nb, pseudo FROM utilisateur WHERE email = ?');
     	$req->execute(array($email));
     	$data = $req->fetch();
     	
     	return $data;
    }
    
    function reset_password($email, $password)
    {
     	global $bdd;
     	
     	$req = $bdd->prepare('UPDATE utilisateur SET mot_de_passe = ? WHERE email = ?');
     	$req->execute(array(sha1($password),$email));
	}
?>

