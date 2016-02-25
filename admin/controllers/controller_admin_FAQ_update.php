<?php
	require ('models/model_admin_FAQ_update.php');
	
	$reponses = get_question_reponse();
	
	function print_first_words($var)
	{
		$nb_words = 20;
		$tab= explode(' ', $var, $nb_words+1);
		if(count($tab) <= $nb_words) {$end = '';}else{$end = ' [...]';}
		unset($tab[$nb_words]);
		return implode(' ', $tab).$end;
	}
	
	include ('views/view_admin_FAQ_update.php');
	
?>