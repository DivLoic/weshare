<?php
	require ('models/model_users_profile.php');
	
	if(ISSET($_GET['id_user'])){ $user = get_user($_GET['id_user']); }
	
	include ('views/view_users_profile.php');
?>