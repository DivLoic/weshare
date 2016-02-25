<?php
	include('bdd_connexion.php');
	
	if(ISSET($_POST['email']) AND ISSET($_POST['password']))
	{
		$reply = $bdd->prepare('SELECT COUNT(*) AS nb FROM utilisateur WHERE email = ? AND mot_de_passe = ?');
		$reply->execute(array($_POST['email'],sha1($_POST['password'])));
	
		$data = $reply->fetch();
		
		if($data['nb'] == 0)
		{
			echo '0';
		}
		else
		{
			echo '1';
		}
	}
?>