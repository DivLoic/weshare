<?php
	require('models/model_about_us.php');
	
	$id = rand (1, 6);
	$edito = get_edito($id);
	
	include ('views/view_about_us.php');
?>