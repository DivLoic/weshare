<?php
	require ('models/model_users_update.php');
	
	if(ISSET($_POST['actions']))
	{
		$users = check_all_users();
		
		if($_POST['actions'] == 'Activer')
		{
			while($user = $users->fetch())
			{
				if(ISSET($_POST[$user['id']]))
				{
					active_users($user['id']);
				}
			}
		}
		elseif($_POST['actions'] == 'Bannir')
		{
			while($user = $users->fetch())
			{
				if(ISSET($_POST[$user['id']]))
				{
					banish_users($user['id']);
				}
			}
		}
		elseif($_POST['actions'] == 'Supprimer')
		{
			while($user = $users->fetch())
			{
				if(ISSET($_POST[$user['id']]))
				{
					delete_users($user['id']);
				}
			}
		}
	}
	
	include ('controllers/controller_users.php');
?>