<?php
	include('bdd_connexion.php');
	
	if(ISSET($_GET['pseudo']))
	{
		$reply = $bdd->prepare('SELECT COUNT(pseudo) AS nb FROM utilisateur WHERE pseudo = ?');
		$reply->execute(array($_GET['pseudo']));
	
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