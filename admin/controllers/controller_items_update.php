<?php
	require ('models/model_items_update.php');
	
	if(ISSET($_POST['actions']))
	{
		$items = check_all_items();
		
		if($_POST['actions'] == 'Supprimer')
		{
			while($item = $items->fetch())
			{
				if(ISSET($_POST[$item['id']]))
				{
					delete_items($item['id']);
				}
			}
		}
	}
	
	include ('controllers/controller_items.php');
?>