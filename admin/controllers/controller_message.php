<?php
	require ('models/model_message.php');
	
	function print_first_words($var)
	{
		$nb_words = 20;
		$tab= explode(' ', $var, $nb_words+1);
		if(count($tab) <= $nb_words) {$end = '';}else{$end = ' [...]';}
		unset($tab[$nb_words]);
		return implode(' ', $tab).$end;
	}
	
	if(ISSET($_POST['search']))
	{
		$messages = get_search_message($_POST['search']);
	}
	elseif(ISSET($_POST['search_titre']))
	{
		$messages = get_search_message_titre($_POST['search_titre']);		
	}
	elseif(ISSET($_POST['search_id']))
	{
		$messages = get_search_message_id($_POST['search_id']);		
	}
	else
	{
		$messages = get_message();
	}

	
	

	
	
	include ('views/view_message.php');
?>