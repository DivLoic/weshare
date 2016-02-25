<?php
    require('../models/bdd_connexion.php');
    
    function get_users()
    {
    	global $bdd;
    	
    	$req = $bdd->query('SELECT id, url_profile_image, pseudo, DATE_FORMAT(date_inscription, \'%d/%m/%Y\') AS date_inscription, date_inscription AS real_date, confirmation AS status FROM utilisateur ORDER BY real_date DESC, id DESC');
    	
    	return $req;
    }
    
    function get_search_users($pseudo)
    {
    	global $bdd;
    	
    	$req = $bdd->prepare('SELECT id, url_profile_image, pseudo, DATE_FORMAT(date_inscription, \'%d/%m/%Y\') AS date_inscription, date_inscription AS real_date, confirmation AS status FROM utilisateur WHERE pseudo LIKE ? ORDER BY real_date DESC, id DESC');
    	$req->execute(array('%'.$pseudo.'%'));
    	return $req;
    }
	
?>
