<?php
	require('models/bdd_connexion.php');
	
	function update_user($pseudo, $date_de_naissance)
	{
		global $bdd;
		
		$req = $bdd->prepare('UPDATE utilisateur SET code_postal = ?, nom = ?, prenom = ?, date_de_naissance = ?, adresse = ?, tel = ?, ma_description = ? WHERE pseudo = ?');
		$req->execute(array(htmlspecialchars($_POST['code_postal']),htmlspecialchars($_POST['nom']),htmlspecialchars($_POST['prenom']),htmlspecialchars($date_de_naissance),htmlspecialchars($_POST['adresse']),htmlspecialchars($_POST['tel']),htmlspecialchars($_POST['description']),$pseudo));
		$informations_user = $req->fetch();
		
		return $informations_user;
	}
	
    function update_pic_profile($url)
    {
    	global $bdd;
    	
		$req = $bdd->prepare('SELECT url_profile_image FROM utilisateur WHERE pseudo = ?');
		$req->execute(array($_SESSION['pseudo']));
		$delete = $req->fetch();
		if(ISSET($delete['url_profile_image']) AND $delete['url_profile_image']!='content_files/pics/profile/default.png'){unlink($delete['url_profile_image']);}
    	
		$req = $bdd->prepare('UPDATE utilisateur SET url_profile_image = ? WHERE pseudo = ?');
		$req->execute(array(htmlspecialchars($url),$_SESSION['pseudo']));
	}
?>