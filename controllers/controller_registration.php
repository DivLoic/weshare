<?php
	require('models/model_registration.php');
	
	if (isset($_POST['email']) AND isset($_POST['mot_de_passe']) AND isset($_POST['pseudo']) AND isset($_POST['code_postal']))
	{
		if(
			!empty($_POST['email'])
		AND !empty($_POST['mot_de_passe'])
		AND !empty($_POST['pseudo'])
		AND !empty($_POST['code_postal'])
		AND preg_match("#^[a-z][a-z0-9._-]*@[a-z][a-z0-9._-]+\.[a-z]{2,}$#i",$_POST['email'])
		AND preg_match("#[a-z].*[0-9]|[0-9].*[a-z]#i",$_POST['mot_de_passe']) AND preg_match("#.{6,}#i",$_POST['mot_de_passe'])
		AND preg_match("#^[a-z][a-z0-9_-]{2,18}#i",$_POST['pseudo'])
		AND preg_match("#^750([0-1][1-9]|20)$#",$_POST['code_postal']))
		{
			if (check_pseudo_email($_POST['email'], $_POST['pseudo']) == 0)
			{
				insert_user($_POST['email'], sha1($_POST['mot_de_passe']), $_POST['pseudo'], $_POST['code_postal']);
				$result = 1;
			}
			else
			{
				$result = 0;
			}
	
		}
		else
		{
			$result = 0;
		}
	}
	else
	{
		$result = 0;
	}
	
	include ('views/view_registration.php');
?>