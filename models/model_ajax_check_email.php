<?php
	include('bdd_connexion.php');
	
	if(ISSET($_GET['email']))
	{
		$reply = $bdd->prepare('SELECT COUNT(email) AS nb FROM utilisateur WHERE email = ?');
		$reply->execute(array($_GET['email']));
	
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