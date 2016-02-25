<?php

	require('models/model_add_message.php');
	
	if(ISSET($_SESSION['id']) AND ISSET($_POST['id_topic']) AND ISSET($_POST['contenu']))
	{
		if(!preg_match("#^( |\n|\s|\r)*$#i",$_POST['contenu']))
		{
			post_message($_SESSION['id'],$_POST['id_topic'],$_POST['contenu']);
			topic_last_date($_POST['id_topic']);
		}
	}
	
	echo '<script type="text/javascript">window.location = "index.php?target=forum_message&id_topic='.$_POST['id_topic'].'";</script>';
?>