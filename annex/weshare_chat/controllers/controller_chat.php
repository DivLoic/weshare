<?php
	include('models/model_chat.php');
	
	$get_messages = get_messages();
	
	function print_date($date_message,$date)
	{
		$result = $date_message-date('Ymd');
		
		if($result == 0)
		{
			echo 'aujourd\'hui';
		}
		elseif($result == -1)
		{
			echo 'hier';
		}
		elseif($result == -2)
		{
			echo 'avant-hier';
		}
		else
		{
			echo $date;
		}
	}
	
	include('views/view_chat.php');
?>