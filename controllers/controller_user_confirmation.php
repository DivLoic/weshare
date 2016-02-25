<?php
	require('models/model_user_confirmation.php');
		
	if (isset($_GET['pseudo']) AND isset($_GET['cle_confirmation']))
	{
		if(check_user_key($_GET['pseudo'], $_GET['cle_confirmation']) > 0)
		{
				confirm_user($_GET['pseudo']);
				if($_GET['cle_confirmation']!='banni'){$result = 1;}else{$result = 0;}
		}
		else
		{
			$result = 0;
		}
	}
	else
	{
		$result = 0;
	}
	
	include ('views/view_user_confirmation.php');
?>