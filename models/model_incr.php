<?php

	require('models/bdd_connexion.php');
	
	function test()
	{
		global $bdd;
		$test_query=$bdd-> prepare('SELECT COUNT(id) AS nbr FROM annonce WHERE id=?');
		$test_query->execute(array($_GET['item_id']));
		$test=$test_query->fetch();
		return $test['nbr'];
		
	}

	function view_increment($id)
	{
		global $bdd;
		$test_view=$bdd->query('SELECT vu FROM annonce WHERE id ='.$id.'');
		$old_vu=$test_view->fetch();
		$new_vu= $old_vu['vu'] +1;
		$update_view=$bdd->exec('UPDATE annonce SET vu = '.$new_vu.' WHERE id='.$id.'');
		
		
	}

?>