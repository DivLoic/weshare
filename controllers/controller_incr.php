<?php

	require ('models/model_incr.php');
	$test_item=test();

	if($test_item != 1 || !ISSET($_GET['item_id']))/*l'annonce existe-elle?*/
	{
	
	
	}
	else
	{
		
		view_increment($_GET['item_id']);
	
		echo '<script type="text/javascript">window.location.href = \'index.php?target=item&item_id='.$_GET['item_id'].'\';</script>';
	}
?>