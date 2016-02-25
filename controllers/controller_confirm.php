<?php

	require('models/model_confirm.php');
	
	if( ISSET($_SESSION['id']) AND ISSET($_GET['item_id']) AND ISSET($_GET['do']))
	{
		$test_item=test($_GET['item_id']);
		
		$both_user = get_both_users($_GET['item_id']);
	
		$id_utilisateur_check = check_user($both_user['id_utilisateur']);
		$id_acquereur_check = check_user($both_user['id_acquereur']);


		if($test_item != 1)/*l'annonce existe-elle?*/
		{
			include('views/view_deal_failure_uncontrolled.php');
		}
		elseif($both_user['id_acquereur'] == 0 AND $_GET['do'] == 1)
		{
			include('views/view_deal_failure_uncontrolled.php');
		}
		elseif($id_utilisateur_check == 0 OR $id_acquereur_check == 0 AND $_GET['do'] == 1)
		{
			include('views/view_deal_failure_uncontrolled.php');
		}
		else
		{
			$users=inform($_GET['item_id']);
			
			if($_GET['do'] == 1)
			{
				if ($_SESSION['id'] == $users['id_utilisateur'])
				{
					$place='utilisateur';
					confirm_deal($_GET['item_id'],$place);
					$data=deal_conclusion($_GET['item_id']);
					if($data['confirmation_utilisateur'] =='confirmation' && $data['confirmation_acquereur']=='confirmation')
					{
						$rubrique=rub($_GET['item_id']);
						
						if($rubrique == 1)
						{
							$a=90;
							$b=15;
							scoring($_GET['item_id'],$a,$b);
						}
						else if ($rubrique == 2)
						{
							$a=50;
							$b=50;
							scoring($_GET['item_id'],$a,$b);
						}
						else if ($rubrique == 3)
						{
							$a=75;
							$b=30;
							scoring($_GET['item_id'],$a,$b);
						}
						else if ($rubrique == 4)
						{
							$a=90;
							$b=15;
							scoring($_GET['item_id'],$a,$b);
						}
						
						delete_items($_GET['item_id']);
						$step=2;
						include('views/view_deal_success.php');
						
					}
					else
					{
						good_mail($users['id_acquereur'],$_GET['item_id']);
						$step=1;
						include('views/view_deal_success.php');
					}
				}
				else if ($_SESSION['id'] == $users['id_acquereur'])
				{
					$place='acquereur';
					confirm_deal($_GET['item_id'],$place);
					$data=deal_conclusion($_GET['item_id']);
					if($data['confirmation_utilisateur'] =='confirmation' && $data['confirmation_acquereur']=='confirmation')
					{
						$rubrique=rub($_GET['item_id']);
						
						if($rubrique == 1)
						{
							$a=90;
							$b=15;
							scoring($_GET['item_id'],$a,$b);
						}
						else if ($rubrique == 2)
						{
							$a=50;
							$b=50;
							scoring($_GET['item_id'],$a,$b);
						}
						else if ($rubrique == 3)
						{
							$a=75;
							$b=30;
							scoring($_GET['item_id'],$a,$b);
						}
						else if ($rubrique == 4)
						{
							$a=90;
							$b=15;
							scoring($_GET['item_id'],$a,$b);
						}
						
						
						delete_items($_GET['item_id']);
						$step=2;
						include('views/view_deal_success.php');
					}
					else
					{
						good_mail($users['id_utilisateur'],$_GET['item_id']);
						$step=1;
						include('views/view_deal_success.php');
					}
				}
			}
			else if ($_GET['do'] == 0)
			{
				if ($_SESSION['id'] == $users['id_utilisateur'] || $_SESSION['id'] == $users['id_acquereur'])
				{
					cancel_deal($_GET['item_id']);
					reset_chat($_GET['item_id']);
					bad_mail($users['id_acquereur'],$_GET['item_id']);
					bad_mail($users['id_utilisateur'],$_GET['item_id']);
					include('views/view_deal_failure.php');
				}
				else
				{	if($users['id_acquereur']== 0)
					{
					include('views/view_deal_failure.php');
					}
					else
					{
					include('views/view_view_error_404.php');
					}
				}
			
			}
			else
			{
				include('views/view_error_404.php');
			}
		
			
		}
	}
	else 
	{
		include('views/view_error_404.php');

	}
?>