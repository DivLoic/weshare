<?php
	require('models/model_profile_password_update.php');
	
	
	if(ISSET($_POST['old_pass']) AND ISSET($_POST['new_pass']))
	{
		if(preg_match("#[a-z].*[0-9]|[0-9].*[a-z]#i",$_POST['new_pass']) AND preg_match("#.{6,}#i",$_POST['new_pass']))
		{
			if(check_password(sha1($_POST['old_pass']),$_SESSION['id']) > 0)
			{
				update_password(sha1($_POST['new_pass']),$_SESSION['id']);
				
				$update_result = 10;
				include('controllers/controller_profile.php');
			}
			else
			{
				$result = 1;
				include('controllers/controller_profile_password.php');
			}
		}
		else
		{
			include ('controllers/controller_profile_password.php');
		}
	}
	else
	{
		include ('controllers/controller_profile_password.php');
	}
?>