<?php
	require ('models/model_comments_user_update.php');
	
	if(ISSET($_POST['actions']))
	{
		$comments_user = check_all_comments_user();
		
		if($_POST['actions'] == 'Supprimer')
		{
			while($comment_user = $comments_user->fetch())
			{
				if(ISSET($_POST[$comment_user['id']]))
				{
					delete_comments_user($comment_user['id']);
				}
			}
		}
	}
	
	include ('controllers/controller_comments_user.php');
?>