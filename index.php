<?php session_start(); ?>

<?php require('controllers/controller_main.php'); //main model ?> 

<?php // DISPATCHER
	if($maintenance == 0)
	{
		if(ISSET($_GET['target']))
		{
			if($_GET['target'] == 'profile' AND ISSET($_SESSION['pseudo']))
				include('controllers/controller_profile.php');
		
			elseif($_GET['target'] == 'about_us')
				include('controllers/controller_about_us.php');
		
			elseif($_GET['target'] == 'registration')
				include('controllers/controller_registration.php');
		
			elseif($_GET['target'] == 'user_confirmation')
				include('controllers/controller_user_confirmation.php');
		
			elseif($_GET['target'] == 'sign_in')
				include('controllers/controller_sign_in.php');
			
			elseif($_GET['target'] == 'disconnect' AND ISSET($_SESSION['pseudo']))
				include('controllers/controller_disconnect.php');
			
			elseif($_GET['target'] == 'terms_of_use')
				include('controllers/controller_terms_of_use.php');
			
			elseif($_GET['target'] == 'update_profile' AND ISSET($_SESSION['pseudo']))
				include('controllers/controller_update_profile.php');

			elseif($_GET['target'] == 'my_items' AND ISSET($_SESSION['pseudo']))
				include('controllers/controller_my_items.php');
			
			elseif($_GET['target'] == 'add_item' AND ISSET($_SESSION['pseudo']))
				include('controllers/controller_add_item.php');
			
			elseif($_GET['target'] == 'delete_my_items' AND ISSET($_SESSION['pseudo']))
				include('controllers/controller_delete_my_items.php');

			elseif($_GET['target'] == 'item')
				include('controllers/controller_item.php');
			
			elseif($_GET['target'] == 'incr' && isset($_GET['item_id']))
				include('controllers/controller_incr.php');

			elseif($_GET['target'] == 'my_box')
				include('controllers/controller_my_box.php');
			
			elseif($_GET['target'] == 'update_my_box')
				include('controllers/controller_update_my_box.php');
			
			elseif($_GET['target'] == 'help')
				include('controllers/controller_help_dyn.php');
			
			elseif($_GET['target'] == 'password_forget')
				include('controllers/controller_password_forget.php');
		
			elseif($_GET['target'] == 'deal' AND ISSET($_SESSION['pseudo']))
				include('controllers/controller_deal.php');
			
			elseif($_GET['target'] == 'add_deal' AND ISSET($_SESSION['pseudo']))
				include('controllers/controller_add_deal.php');
			
			elseif($_GET['target'] == 'chat' AND ISSET($_SESSION['pseudo']) AND ISSET($_GET['chat_id']))
				include('controllers/controller_chat.php');	
		
			elseif($_GET['target'] == 'confirm' AND ISSET($_SESSION['id']) AND ISSET($_GET['do']))
				include('controllers/controller_confirm.php');
			
			elseif($_GET['target'] == 'profile_password' AND ISSET($_SESSION['pseudo']))
				include('controllers/controller_profile_password.php');	
			
			elseif($_GET['target'] == 'profile_password_update' AND ISSET($_SESSION['pseudo']))
				include('controllers/controller_profile_password_update.php');
			
			elseif($_GET['target'] == 'profile_email' AND ISSET($_SESSION['pseudo']))
				include('controllers/controller_profile_email.php');	
			
			elseif($_GET['target'] == 'profile_email_update' AND ISSET($_SESSION['pseudo']))
				include('controllers/controller_profile_email_update.php');
			
			elseif($_GET['target'] == 'forum')
				include('controllers/controller_forum.php');
			
			elseif($_GET['target'] == 'forum_message')
				include('controllers/controller_forum_message.php');
			
			elseif($_GET['target'] == 'add_message' AND ISSET($_SESSION['pseudo']))
				include('controllers/controller_add_message.php');
			
			elseif($_GET['target'] == 'add_topic' AND ISSET($_SESSION['pseudo']))
				include('controllers/controller_add_topic.php');
			
			elseif($_GET['target'] == 'add_topic_action' AND ISSET($_SESSION['pseudo']))
				include('controllers/controller_add_topic_action.php');
			
			elseif($_GET['target'] == 'item_request' AND ISSET($_SESSION['pseudo']))
				include('controllers/controller_item_request.php');
			
			elseif($_GET['target'] == 'item_request_action' AND ISSET($_SESSION['pseudo']))
				include('controllers/controller_item_request_action.php');
			
			elseif($_GET['target'] == 'item_request_delete')
				include('controllers/controller_item_request_delete.php');	
				
			elseif($_GET['target'] == 'contact')
				include('controllers/controller_contact.php');				
			
			elseif($_GET['target'] == 'search_advanced')
				include('controllers/controller_search_advanced.php');
			
			elseif($_GET['target'] == 'search_advanced_selector')
				include('controllers/controller_search_advanced_selector.php');
			
			elseif($_GET['target'] == 'user' AND ISSET($_GET['profil']))
				include('controllers/controller_user.php');
				
			elseif($_GET['target'] == 'deal_failure_uncontrolled' AND ISSET($_SESSION['pseudo']))
				include('controllers/controller_deal_failure_uncontrolled.php');
				
			else
				include('views/view_error_404.php');
		}
		else
		{
			include('controllers/controller_index.php');
		}
	}
	else
	{
		echo '<h1>Le site weshare est actuellement en maintenance.</h1>';
	}
?>