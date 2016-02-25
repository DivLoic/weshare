<?php
	require('models/model_forum.php');	

	if(ISSET($_POST['search']))
	{
		$get_topic = get_search_topic($_POST['search']);
		$nb_topic = nb_search_topic($_POST['search']);
		
	}
	else
	{
		$get_topic = get_topic();
		$nb_topic = nb_topic();
	}
	
	include ('views/view_forum.php');
?>