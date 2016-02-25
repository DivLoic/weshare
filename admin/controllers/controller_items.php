<?php
	require ('models/model_items.php');
	
	if(ISSET($_POST['search']))
	{
		$items = get_search_items($_POST['search']);
	}
	else
	{
		$items = get_item();
	}
	
	
	function check_status($item)
	{
		if($item == 0)
		{
			$result[0] = 'on';
			$result[1] = 'on';
		}
		elseif($item == 1)
		{
			$result[0] = 'off';
			$result[1] = 'off';
		}
		else
		{
			$result[0] = 'ban';
			$result[1] = 'off';
		}
		
		return $result;
	}
	
	
	include ('views/view_items.php');
?>