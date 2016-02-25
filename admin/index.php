<?php session_start(); ?>

<?php // DISPATCHER
	if(ISSET($_SESSION['admin']))
	{
		if(ISSET($_GET['target']))
		{
			if($_GET['target'] == 'index')
				include('controllers/controller_index.php');
			
			elseif($_GET['target'] == 'users')
				include('controllers/controller_users.php');
			
			elseif($_GET['target'] == 'users_update')
				include('controllers/controller_users_update.php');
			
			elseif($_GET['target'] == 'users_profile')
				include('controllers/controller_users_profile.php');
			
			elseif($_GET['target'] == 'menu_weshare_add')
				include('controllers/controller_menu_weshare_add.php');
			
			elseif($_GET['target'] == 'menu_weshare_action')
				include('controllers/controller_menu_weshare_action.php');
			
			elseif($_GET['target'] == 'menu_weshare_update')
				include('controllers/controller_menu_weshare_update.php');
			
			elseif($_GET['target'] == 'menu_weshare_delete')
				include('controllers/controller_menu_weshare_delete.php');
				
			elseif($_GET['target'] == 'FAQ_add')
				include('controllers/controller_admin_FAQ_add.php');
			
			elseif($_GET['target'] == 'FAQ_action')
				include('controllers/controller_admin_FAQ_action.php');
			
			elseif($_GET['target'] == 'FAQ_update')
				include('controllers/controller_admin_FAQ_update.php');
			
			elseif($_GET['target'] == 'FAQ_delete')
				include('controllers/controller_admin_FAQ_delete.php');
				
			elseif($_GET['target'] == 'items')
				include('controllers/controller_items.php');
				
			elseif($_GET['target'] == 'items_page')
				include('controllers/controller_items_page.php');
				
			elseif($_GET['target'] == 'items_update')
				include('controllers/controller_items_update.php');
				
			elseif($_GET['target'] == 'comments_item')
				include('controllers/controller_comments_item.php');
				
			elseif($_GET['target'] == 'comments_item_update')
				include('controllers/controller_comments_item_update.php');
				
			elseif($_GET['target'] == 'comments_user')
				include('controllers/controller_comments_user.php');
				
			elseif($_GET['target'] == 'comments_user_update')
				include('controllers/controller_comments_user_update.php');
				
			elseif($_GET['target'] == 'topic')
				include('controllers/controller_topic.php');
				
			elseif($_GET['target'] == 'topic_update')
				include('controllers/controller_topic_update.php');
				
			elseif($_GET['target'] == 'message')
				include('controllers/controller_message.php');
				
			elseif($_GET['target'] == 'message_update')
				include('controllers/controller_message_update.php');
				
			elseif($_GET['target'] == 'maintenance_action')
				include('controllers/controller_maintenance_action.php');
				
			elseif($_GET['target'] == 'email_support_action')
				include('controllers/controller_email_support_action.php');
				
			elseif($_GET['target'] == 'disconnect')
				include('controllers/controller_disconnect.php');
		
			else
				include('controllers/controller_index.php');
		}
		else
		{
			include('controllers/controller_index.php');
		}
	}
	else
	{
		include('controllers/controller_sign_in.php');
	}
?>