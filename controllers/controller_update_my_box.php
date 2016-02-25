<?php
	require('models/model_update_my_box.php');
	
	if(ISSET($_GET['id_item']))
	{
		if(check_item_box($_GET['id_item']))
		{
			if(ISSET($_SESSION['my_box']))
			{
				if(!is_int(array_search($_GET['id_item'],$_SESSION['my_box'])))
				{
					if(ISSET($_SESSION['id']))
					{
						if(!check_item_user($_GET['id_item'],$_SESSION['id']))
						{
							if(already_trans($_GET['id_item'],$_SESSION['id']))
							{
								$total_box = count($_SESSION['my_box']);
								$_SESSION['my_box'][$total_box] = $_GET['id_item'];
								test_real_box();
							}
							else
							{
								$update_result = 2;
							}
						}
						else
						{
							$update_result = 1;
						}
					}
					else
					{
						$total_box = count($_SESSION['my_box']);
						$_SESSION['my_box'][$total_box] = $_GET['id_item'];
					}
				}
			}
			else
			{
				if(ISSET($_SESSION['id']))
				{
					if(!check_item_user($_GET['id_item'],$_SESSION['id']))
					{
						if(already_trans($_GET['id_item'],$_SESSION['id']))
						{
							$_SESSION['my_box'][0] = $_GET['id_item'];
							test_real_box();
						}
						else
						{
							$update_result = 2;
						}
						
					}
					else
					{
						$update_result = 1;
					}
				}
				else
				{
					$_SESSION['my_box'][0] = $_GET['id_item'];
				}
			}
		}
		else
		{
			$update_result = 3;
		}
	}
	
	if(ISSET($_GET['delete_item']))
	{
		if(is_int(array_search($_GET['delete_item'],$_SESSION['my_box'])))
		{
			$nb_item = array_search($_GET['delete_item'],$_SESSION['my_box']);
			if(count($_SESSION['my_box'])==1)
			{
				unset($_SESSION['my_box']);
			}
			else
			{
				unset($_SESSION['my_box'][$nb_item]);
			}
		}
	}
	
	if(ISSET($_GET['delete_my_box']))
	{
		if(ISSET($_SESSION['my_box']))
		{
			unset($_SESSION['my_box']);
		}
	}

	include ('controllers/controller_my_box.php');
?>