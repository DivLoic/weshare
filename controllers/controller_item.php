<?php

require ('models/model_item.php');

if(ISSET($_GET['item_id']))
{
	$test_item=test();

	if($test_item != 1)/*l'annonce existe-elle?*/
	{
	
		include ('views/view_error_404.php'); /*message d'erreur*/
	}
	else
	{
		if(ISSET($_GET['item_id']))
		{
			if(isset($_SESSION['visited']))
			{
				$nbr = count($_SESSION['visited']);
				if($nbr <= 9)
				{
					foreach ($_SESSION['visited'] as $key => $id_item)
					{
						if($_SESSION['visited'][$key] == $_GET['item_id'])
						{
							unset($_SESSION['visited'][$key]);
							
						}
					}
					array_unshift($_SESSION['visited'],$_GET['item_id']);
				}
				else
				{
				 unset($_SESSION['visited'][8]);
				 array_unshift($_SESSION['visited'],$_GET['item_id']);
				}
				
			}
			else
			{
				$_SESSION['visited'][0]= $_GET['item_id'];
			}
		}
		
			if(ISSET($_SESSION['pseudo'])AND ISSET($_POST['commentaire']) AND ISSET($_GET['item_id'])) /*si un commentaire est envoyé*/
		{	
			if(preg_match("#^\s*$#",$_POST['commentaire']))
			{
				$after_comment= 0;
				include ('views/view_item.php');
			}
			else
			{
				send_comment($_SESSION['id'],$_GET['item_id'],$_POST['commentaire']);/*on le traite*/
				$after_comment= 1;
				include ('views/view_item.php');/*puis on réaffiche l'anonce*/
				unset($_POST['commentaire']);
			}
		}
		else
		{
			include ('views/view_item.php');/*si il n'y a pas de commentaire on l'anonce*/
		}
	}
}
else
{
	include ('views/view_error_404.php');
}
?>