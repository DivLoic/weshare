<?php
	require ('models/model_sign_in.php');
	
	$error_sign_in = 0;
		
	if(ISSET($_POST['pseudo']) AND ISSET($_POST['password']))
	{
		$check_user = check_user($_POST['pseudo'],$_POST['password']);
		
		if($check_user == 1)
		{
			$_SESSION['admin'] = get_user($_POST['pseudo']);
			include('controllers/controller_index.php');
		}
		else
		{
			$error_sign_in = 1;
			include('views/view_sign_in.php');
		}
	}
	else
	{
		include('views/view_sign_in.php');
	}
	
?>