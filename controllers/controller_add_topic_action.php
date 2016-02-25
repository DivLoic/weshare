<?php

	require('models/model_add_topic_action.php');
	
	if(ISSET($_SESSION['id']) AND ISSET($_POST['titre']) AND ISSET($_POST['contenu']) AND ISSET($_POST['id_type']))
	{
		if(!(preg_match("#^ *$#i",$_POST['titre']) OR preg_match("#^( |\n|\s|\r)*$#i",$_POST['contenu'])) AND $_POST['id_type']!=0)
		{
			add_topic($_SESSION['id'],$_POST['titre'],$_POST['contenu'],$_POST['id_type']);
		}
	}
	
	include('controllers/controller_forum.php');
	
?>