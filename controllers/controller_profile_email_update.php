<?php
	require('models/model_profile_email_update.php');
	
	
	if(ISSET($_POST['pass']) AND ISSET($_POST['email']))
	{
		if(preg_match("#^[a-z][a-z0-9._-]*@[a-z][a-z0-9._-]+\.[a-z]{2,}$#i",$_POST['email']))
		{
			if(check_password(sha1($_POST['pass']),$_SESSION['id']) > 0)
			{
				if(check_email($_POST['email']) == 0)
				{
					update_email($_POST['email'],$_SESSION['id']);
				
					$update_result = 11;
					include('controllers/controller_profile.php');
				}
				else
				{
					include ('controllers/controller_profile_email.php');
				}
			}
			else
			{
				$result = 1;
				include('controllers/controller_profile_email.php');
			}
		}
		else
		{
			include ('controllers/controller_profile_email.php');
		}
	}
	else
	{
		include ('controllers/controller_profile_email.php');
	}
?>