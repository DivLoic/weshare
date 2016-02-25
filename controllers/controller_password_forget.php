<?php
	require('models/model_password_forget.php');
	
	function random_password($numchar)  
	{  
		$word = "a,b,c,d,e,f,g,h,i,j,k,l,m,1,2,3,4,5,6,7,8,9,0";  
		$array=explode(",",$word);  
		shuffle($array);  
		$newstring = implode($array,"");  
		return substr($newstring, 0, $numchar);  
	}
	
	$result = 0;
	
	if(ISSET($_POST['email']))
	{
		$user = get_user($_POST['email']);
		
		if($user['nb'] == 1)
		{
			$password = random_password(10);
			reset_password($_POST['email'], $password);
			mail($_POST['email'], 'weshare - Nouveau mot de passe', 'Bonjour '.$user['pseudo'].', votre nouveau mot de passe est : '.$password);
			include ('views/view_password_forget_success.php');
		}
		else
		{
			$result = 1;
			include ('views/view_password_forget.php');
		}
	}
	else
	{
		include ('views/view_password_forget.php');
	}
?>