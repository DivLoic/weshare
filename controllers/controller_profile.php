<?php
	require('models/model_profile.php');	

	$informations_user = informations_user($_SESSION['pseudo']);

	$date_de_naissance = explode('-', $informations_user['date_de_naissance']);

	if(preg_match("#^[0-9]{4}-[0-9]{2}-[0-9]{2}$#",$informations_user['date_de_naissance']))
	{
		$date_de_naissance = explode('-', $informations_user['date_de_naissance']);
	}
	else
	{
		$date_de_naissance[0] = '';
		$date_de_naissance[1] = '';
		$date_de_naissance[2] = '';
	}
	
	include ('views/view_profile.php');
?>