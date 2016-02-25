<?php
	require('models/model_item_request_delete.php');
	
	if(ISSET($_GET['id_request']) AND ISSET($_GET['id_user']) AND ISSET($_GET['key']))
	{
		if(check_request_user($_GET['id_user'], $_GET['key'], $_GET['id_request']) > 0)
		{
			delete_request_user($_GET['id_user'], $_GET['key'], $_GET['id_request']);
			$result = 1;
		}
		else
		{
			$result = 0;
		}
	}
	
	include('views/view_item_request_delete.php');
?>