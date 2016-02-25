<?php
	require ('models/model_maintenance_action.php');
	
	if(ISSET($_POST['actions']))
	{
		update_maintenance($_POST['actions']);
	}
	
	include ('controllers/controller_index.php');
?>