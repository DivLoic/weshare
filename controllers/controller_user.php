<?php

	require('models/model_user.php');
	
	if(isset($_GET['profil']))
	{
		$test=test_user($_GET['profil']);
		
		if($test != 1)
		{
			include('views/view_error_404.php');
		}
		else
		{
			$idp=remember_id();
			if(isset($_SESSION['id']) AND (isset($_POST['commentaire']) OR isset($_POST['note'])))
			{
				$profil=user_content($_GET['profil']);
				$item=item($_GET['profil']);
				$my_pic=my_pic($_SESSION['id']);
				$mark=mark($_GET['profil']);
				$comment=comment($_GET['profil']);
				$rate=my_rate($_SESSION['id'],$_GET['profil']);
						
				if(isset($_POST['commentaire']))
				{
					if(preg_match("#^\s*$#",$_POST['commentaire']))
					{
						$after_comment= 0;
						$comment=comment($_GET['profil']);
						include ('views/view_user.php');

					}
					else
					{
						send_comment($_SESSION['id'],$_GET['profil'],$_POST['commentaire']);/*on le traite*/
						$after_comment= 1;
						$comment=comment($_GET['profil']);
						include ('views/view_user.php');
					}
				
				}
				else if( ($_POST['note'] > 0 AND $_POST['note']< 6) AND $rate['COUNT(*)']== 0)
				{
					send_mark($_SESSION['id'],$_GET['profil'],$_POST['note']);
					$after_comment= 1;
					$mark=mark($_GET['profil']);
					$rate=my_rate($_SESSION['id'],$_GET['profil']);
					
					include ('views/view_user.php');
				}
				else
				{
					$after_comment= 1;
					include ('views/view_user.php');
				}
			}
			else
			{
				$profil=user_content($_GET['profil']);
				$mark=mark($_GET['profil']);
				$comment=comment($_GET['profil']);
				$item=item($_GET['profil']);
				
				 if(isset($_SESSION['id']))
				{
					$rate=my_rate($_SESSION['id'],$_GET['profil']);
					$my_pic=my_pic($_SESSION['id']);
				}
				$after_comment= 0;
				include ('views/view_user.php');
			}
			
			
		}
	}
	else
	{
	include('views/view_error_404.php');
	}
	

?>