<?php
	require ('models/model_email_support_action.php');
	
	if(ISSET($_POST['email']))
	{
		update_email($_POST['email']);
	}
	
	include ('controllers/controller_index.php');
?>