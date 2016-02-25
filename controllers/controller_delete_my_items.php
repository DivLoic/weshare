<?php
	require('models/model_delete_my_items.php');
	
	if(ISSET($_GET['id_item']))
	{
		delete_item($_GET['id_item']);
	}

	include ('controllers/controller_my_items.php');
?>