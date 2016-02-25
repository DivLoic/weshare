<?php

	require('models/model_main.php');
	
	function nb_visit()
	{
		if(!ISSET($_SESSION['visit']))
		{
			$nb_visit = get_visit();
			update_visit($nb_visit+1);
			$_SESSION['visit'] = $nb_visit+1;
		}
	}
	
	function valid_user()
	{
		if(ISSET($_SESSION['id']))
		{
			if(check_user($_SESSION['id']) == 0)
			{
				unset($_SESSION['id']);
				unset($_SESSION['pseudo']);
			}
		}
	}
	
	nb_visit();
	
	valid_user();
	
	if(ISSET($_SESSION['my_box'])){ test_real_box(); }
	
	$maintenance = get_maintenance();
	
	if(ISSET($_SESSION['id'])){$notification = get_notification($_SESSION['id']);}
	
	
	

?>