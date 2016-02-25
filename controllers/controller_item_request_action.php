<?php
	require('models/model_item_request_action.php');
	
	if(ISSET($_SESSION['id']) AND ISSET($_POST['request']))
	{
		if(check_request($_POST['request'],$_SESSION['id']) == 0)
		{
			$key = sha1(microtime(TRUE)*100000);
			insert_request($_SESSION['id'],$_POST['request'],$key);
			$result = 1;
		}
		else
		{
			$result = 0;
		}
	}
	
	include('views/view_item_request_action.php');
?>