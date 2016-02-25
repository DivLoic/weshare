<?php
	require('models/model_my_items.php');
	
	if(ISSET($_SESSION['pseudo']))
	{
		$nb_items = count_my_items($_SESSION['pseudo']);
		$req_my_items = my_items($_SESSION['pseudo']);
		$selector_rub = selector_rub();
	}

	include ('views/view_my_items.php');
?>