<?php session_start(); ?>

<?php
	if(ISSET($_GET['target']))
	{
		if($_GET['target'] == 'sign_in')
		{
			if(ISSET($_SESSION['pseudo']))
			{
				include('controllers/controller_chat.php');
			}
			else
			{
				include('controllers/controller_sign_in.php');
			}
		}
		
		elseif($_GET['target'] == 'chat' AND ISSET($_SESSION['pseudo']))
			include('controllers/controller_chat.php');
			
		elseif($_GET['target'] == 'disconnect')
			include('controllers/controller_disconnect.php');
	}
	else
	{
		if(ISSET($_SESSION['pseudo']))
		{
			include('controllers/controller_chat.php');
		}
		else
		{
			include('controllers/controller_sign_in.php');
		}
	}
?>