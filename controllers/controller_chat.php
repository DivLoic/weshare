<?php

	require('models/model_chat.php');
	
	
	
	
	$get_messages = get_messages();
	
	function print_date($date_message,$date)
	{
		$result = $date_message-date('Ymd');
		
		if($result == 0)
		{
			echo 'aujourd\'hui';
		}
		elseif($result == -1)
		{
			echo 'hier';
		}
		elseif($result == -2)
		{
			echo 'avant-hier';
		}
		else
		{
			echo $date;
		}
	}
	
	
	if(check_validation_user($_GET['chat_id'],$_SESSION['id']) == 1 OR check_validation_acqueror($_GET['chat_id'],$_SESSION['id']) == 1)
	{
		$button_validation = 0;
	}
	else
	{
		$button_validation = 1;
	}
	
	
	
	$user= speaker($_GET['chat_id']);
	if(ISSET($_SESSION['id']) && $user['id_acquereur'])
	{
		if($_SESSION['id']== $user['id_utilisateur'] || $_SESSION['id']== $user['id_acquereur'])
		{
			if($_SESSION['id'] == $user['id_utilisateur'])
			{
				$him = character($user['id_acquereur']);
			}
			else if($_SESSION['id'] == $user['id_acquereur'])
			{
				$him = character($user['id_utilisateur']);
			}
			include('views/view_chat.php');
		}
		else
		{
			include('controllers/controller_deal.php');
		}
		
	}
	else
	{
		include('controllers/controller_deal.php');
	}

?>