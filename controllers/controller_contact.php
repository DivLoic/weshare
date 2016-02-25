<?php
	require('models/model_contact.php');	

	$admin_mail = get_mail();
	
	if(ISSET($_SESSION['id']))
	{
		if(ISSET($_POST['content']))
		{
			if(!preg_match("#^( |\n|\s|\r)*$#i",$_POST['content']))
			{
				$user = get_user($_SESSION['id']);
				
$titre = 'Question de '.$user['pseudo'];
$contenu = 'Pseudo : '.$user['pseudo'].'
E-mail : '.$user['email'].'

Contenu du message :

'.$_POST['content'];

				mail($admin_mail,$titre,$contenu);

				$result = 1;

			}
		}
			
			
			
			
	}
	else
	{
		if(ISSET($_POST['content']) AND ISSET($_POST['email']))
		{
			if(!preg_match("#^( |\n|\s|\r)*$#i",$_POST['content']) AND preg_match("#^[a-z][a-z0-9._-]*@[a-z][a-z0-9._-]+\.[a-z]{2,}$#i",$_POST['email']))
			{
$titre = 'Question d\'un visiteur';
$contenu = 'E-mail : '.$_POST['email'].'

Contenu du message :

'.$_POST['content'];


			mail($admin_mail,$titre,$contenu);
			
			$result = 1;
			}
		}
	}

	
	include ('views/view_contact.php');
?>