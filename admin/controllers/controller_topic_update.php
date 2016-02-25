<?php
	require ('models/model_topic_update.php');
	
	if(ISSET($_POST['actions']))
	{
		$topics = check_all_topic();
		
		if($_POST['actions'] == 'Supprimer')
		{
			while($topic = $topics->fetch())
			{
				if(ISSET($_POST[$topic['id']]))
				{
					delete_topic($topic['id']);
				}
			}
		}
	}
	
	include ('controllers/controller_topic.php');
?>