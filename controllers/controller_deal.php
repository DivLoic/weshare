<?php
	require('models/model_deal.php');
	
	reset_notif($_SESSION['id']);
	
	$notification = get_notification($_SESSION['id']);
	
	include ('views/view_deal.php');
?>