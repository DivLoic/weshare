<?php
	require('models/model_forum_message.php');	
	
	if(ISSET($_GET['id_topic']))
	{
		$topic = get_topic($_GET['id_topic']);
		$messages = get_message($_GET['id_topic']);
		
		if($topic['type'] == '')
		{
			$topic['type'] = 'Divers';
		}
	
		if(topic_exist($_GET['id_topic']) > 0)
		{
			include ('views/view_forum_message.php');
		}
		else
		{
			include ('views/view_error_404.php');
		}
	}
	else
	{
		include ('views/view_error_404.php');
	}
?>