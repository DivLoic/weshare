<?php
    require('../models/bdd_connexion.php');
    
    function get_nb_users()
    {
    	global $bdd;
    	
		$req = $bdd->query('SELECT COUNT(*) AS nb FROM utilisateur');
		$data = $req->fetch();
		return $data['nb'];
	}
	
    function get_nb_items()
    {
    	global $bdd;
    	
		$req = $bdd->query('SELECT COUNT(*) AS nb FROM annonce');
		$data = $req->fetch();
		return $data['nb'];
	}
	
    function get_nb_visits()
    {
    	global $bdd;
    	
		$req = $bdd->query('SELECT valeur AS nb FROM site_information WHERE type = \'nb_visite\' ');
		$data = $req->fetch();
		return $data['nb'];
	}
	
    function get_maintenance()
    {
    	global $bdd;
    	
		$req = $bdd->query('SELECT valeur AS nb FROM site_information WHERE type = \'maintenance\' ');
		$data = $req->fetch();
		return $data['nb'];
	}
	
    function get_email_support()
    {
    	global $bdd;
    	
		$req = $bdd->query('SELECT valeur AS nb FROM site_information WHERE type = \'email\' ');
		$data = $req->fetch();
		return $data['nb'];
	}
	
?>
