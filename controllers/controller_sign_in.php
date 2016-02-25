<?php
	require('models/model_sign_in.php');
	
	if(isset($_POST['email']) AND isset($_POST['mot_de_passe']))
	{
		if(!empty($_POST['email']) AND !empty($_POST['mot_de_passe']))
		{
			if(check_account($_POST['email'], $_POST['mot_de_passe']) > 0)
			{
				$data_sign_in = get_pseudo_id($_POST['email']);
				$_SESSION['pseudo'] = $data_sign_in['pseudo'];
				$_SESSION['id'] = $data_sign_in['id'];
				$nb_connexion = nb_connexion($_POST['email']);
				$notification = get_notification($_SESSION['id']);
			}
		}
	}
	
	if(ISSET($_SESSION['my_box']) AND ISSET($_SESSION['id'])) // lien direct avec controller_my_box
	{
		foreach($_SESSION['my_box'] as $key => $id_items)
		{
			if(check_item_user_signin($id_items,$_SESSION['id']))
			{
				unset($_SESSION['my_box'][$key]);
			}
		}
	}
	
	if(!ISSET($_POST['previous_link']))
	{
		$url = 'index.php';
	}
	elseif(preg_match("#(target=sign_in|target=disconnect)#i",$_POST['previous_link']))
	{
		$url = 'index.php';
	}
	else
	{
		$url = $_POST['previous_link'];
	}
	
	
	if(isset($nb_connexion))
	{
		if($nb_connexion == 0)
		{
			echo '<script type="text/javascript">window.location = "index.php?target=profile&first_connexion=1#first_connexion";</script>';
		}
		else
		{
			echo '<script type="text/javascript">window.location = "'.$url.'";</script>';
		}
	}
	else
	{
		echo '<script type="text/javascript">window.location = "'.$url.'";</script>';
	}
?>