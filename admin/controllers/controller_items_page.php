<?php
	require ('models/model_items_page.php');
	
	if(ISSET($_GET['id_item'])){
		$item = get_item($_GET['id_item']);
	}
	
	function status_item($id_aq,$pseudo_aq,$visibility)
	{
		if($id_aq == 0 AND $visibility == 2)
		{
			$result = 'Utilisateur banni';
		}
		elseif($id_aq == 0)
		{
			$result = 'En ligne';
		}
		else
		{
			global $item;
			$result = 'En transaction (avec '.$pseudo_aq.') depuis '.$item['date_acquisition'].' jour(s).';
		}
		
		return $result;
	}
	

	
	
	
	include ('views/view_items_page.php');
?>