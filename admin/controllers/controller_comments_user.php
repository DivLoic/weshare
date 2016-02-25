<?php
	require ('models/model_comments_user.php');
	
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
		$comments = get_search_comment($_POST['search']);
	}
	elseif(ISSET($_POST['search_annonce']))
	{
		$comments = get_search_comment_user($_POST['search_annonce']);		
	}
	else
	{
		$comments = get_comment();
	}

	
	

	
	
	include ('views/view_comments_user.php');
?>