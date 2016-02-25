<?php
	require ('models/model_comments_item_update.php');
	
	if(ISSET($_POST['actions']))
	{
		$comments_item = check_all_comments_item();
		
		if($_POST['actions'] == 'Supprimer')
		{
			while($comment_item = $comments_item->fetch())
			{
				if(ISSET($_POST[$comment_item['id']]))
				{
					delete_comments_item($comment_item['id']);
				}
			}
		}
	}
	
	include ('controllers/controller_comments_item.php');
?>