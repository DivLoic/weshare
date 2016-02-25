<?php
	require ('models/model_topic.php');
	
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
		$topics = get_search_topic($_POST['search']);
	}
	elseif(ISSET($_POST['search_titre']))
	{
		$topics = get_search_topic_titre($_POST['search_titre']);		
	}
	elseif(ISSET($_POST['search_id']))
	{
		$topics = get_search_topic_id($_POST['search_id']);		
	}
	else
	{
		$topics = get_topic();
	}

	
	

	
	
	include ('views/view_topic.php');
?>