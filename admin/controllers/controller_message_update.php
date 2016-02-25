<?php
	require ('models/model_message_update.php');
	
	if(ISSET($_POST['actions']))
	{
		$messages = check_all_message();
		
		if($_POST['actions'] == 'Supprimer')
		{
			while($message = $messages->fetch())
			{
				if(ISSET($_POST[$message['id']]))
				{
					delete_message($message['id']);
				}
			}
		}
	}
	
	include ('controllers/controller_message.php');
?>