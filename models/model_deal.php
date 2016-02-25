<?php 

	include('bdd_connexion.php');
	
	function in_test()
	{
		global $bdd;
		
		$in_test_query= $bdd-> prepare('SELECT COUNT(*) from annonce WHERE id_acquereur=?');
		$in_test_query-> execute(array($_SESSION['id']));
		$in_test_data= $in_test_query->fetch();
		
		return $in_test_data;
		
	}
	
	function out_test()
	{
		global $bdd;
		
		$out_test_query= $bdd-> prepare('SELECT COUNT(*) from annonce WHERE id_utilisateur=? AND id_acquereur!= 0 ');
		$out_test_query-> execute(array($_SESSION['id']));
		$out_test_data= $out_test_query->fetch();
		
		return $out_test_data;
		
	}
	
	function in_deal()
	{
		global $bdd;
		
		$in_deal_query= $bdd-> prepare('SELECT annonce.id, annonce.url_image,DATE_FORMAT(annonce.date_acquisition, \'%d/%m/%Y\') AS date, annonce.titre AS description , utilisateur.pseudo, utilisateur.id AS idu FROM annonce INNER JOIN utilisateur ON annonce.id_utilisateur= utilisateur.id WHERE annonce.id_acquereur=? ORDER BY annonce.date_acquisition ASC ');
		$in_deal_query->execute(array($_SESSION['id']));

		
		return $in_deal_query;
		
	}
	
	function out_deal()
	{
		global $bdd;
				
		$out_deal_query= $bdd-> prepare('SELECT annonce.id, annonce.url_image,DATE_FORMAT(annonce.date_acquisition, \'%d/%m/%Y\') AS date, annonce.titre AS description, utilisateur.pseudo, utilisateur.id AS idu FROM annonce INNER JOIN utilisateur ON annonce.id_acquereur= utilisateur.id WHERE annonce.id_utilisateur=? AND annonce.id_acquereur !=0 ORDER BY annonce.date_acquisition ASC ');
		$out_deal_query->execute(array($_SESSION['id']));

		
		return $out_deal_query;
	}

		function reset_notif($id)
	{
		global $bdd;
		
		$reset_query= $bdd->prepare('UPDATE utilisateur SET notification = 0 WHERE id= ?');
		$reset_query->execute(array($id));
	}

?>