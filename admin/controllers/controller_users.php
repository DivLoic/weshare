<?php
	require ('models/model_users.php');
	
	if(ISSET($_POST['search']))
	{
		$users = get_search_users($_POST['search']);
	}
	else
	{
		$users = get_users();
	}
	
	function check_status($users)
	{
		if($users['status'] == 'confirmation')
		{
			$users['status'] = 'Actif';
		}
		elseif($users['status'] == 'banni')
		{
			$users['status'] = 'Banni';
		}
		else
		{
			$users['status'] = 'Inactif';
		}
		
		return $users['status'];
	}
	
	include ('views/view_users.php');
?>