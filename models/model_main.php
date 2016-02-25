<?php
	require('models/bdd_connexion.php');
	
	function get_notification($id_user)
	{
		global $bdd;
		
		$req = $bdd->prepare('SELECT notification FROM utilisateur WHERE id = ?');
		$req->execute(array($id_user));
		$data = $req->fetch();
		return $data['notification'];
	}
	
	function get_visit()
	{
		global $bdd;
		
		$req = $bdd->query('SELECT valeur FROM site_information WHERE type = \'nb_visite\' ');
		$data = $req->fetch();
		return $data['valeur'];
	}
	
	function get_maintenance()
	{
		global $bdd;
		
		$req = $bdd->query('SELECT valeur FROM site_information WHERE type = \'maintenance\' ');
		$data = $req->fetch();
		return $data['valeur'];
	}
	
	function update_visit($nb_visit)
	{
		global $bdd;
		
		$req = $bdd->prepare('UPDATE site_information SET valeur = ? WHERE type = \'nb_visite\'');
		$req->execute(array($nb_visit));
	}
	
	function check_user($id_user)
	{
		global $bdd;
		
		$req = $bdd->prepare('SELECT COUNT(*) AS nb FROM utilisateur WHERE id = ? AND confirmation = \'confirmation\'');
		$req->execute(array($id_user));
		
		$data = $req->fetch();
		
		return $data['nb'];
	}
	
	
	function test_real_box()
	{
		global $bdd;
		
		foreach($_SESSION['my_box'] as $key => $id_item)
		{
			$test_query=$bdd->prepare('SELECT COUNT(id) FROM annonce WHERE (id= ?) AND (visible= 0) AND (id_acquereur=0)');
			$test_query->execute(array($_SESSION['my_box'][$key]));
			$test=$test_query->fetch();
			if ($test['COUNT(id)'] == 1)
			{
				// $items_my_box = get_items_box($_SESSION['my_box'][$key]);
				// affichage des annonces dans le carton 
			}
			else
			{
				unset($_SESSION['my_box'][$key]);
			}
			
			
		}
		
		if(ISSET($_GET['nb_box']))
		{
			if($_GET['nb_box'] != count($_SESSION['my_box']))
			{
				$_SESSION['result_transaction'] = 1;
			}
		}
		
		
		if(count($_SESSION['my_box']) == 0)
		{
			unset($_SESSION['my_box']);
		}
		

		
		
	}
?>