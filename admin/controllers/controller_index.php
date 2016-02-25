<?php
	require ('models/model_index.php');
	
	$nb_users = get_nb_users();
	$nb_items = get_nb_items();
	$nb_visits = get_nb_visits();
	$maintenance = get_maintenance();
	$admin_email = get_email_support();

	setlocale (LC_TIME, 'fr_FR'); 
	$date = strftime('%A %d %B %Y');
	$date = strtolower($date);

	include ('views/view_index.php');
?>