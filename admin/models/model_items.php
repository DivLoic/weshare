<?php
    require('../models/bdd_connexion.php');
    
    function get_item()
    {
    	global $bdd;
    	
    	$req = $bdd->query('SELECT annonce.id AS id, annonce.titre AS titre, annonce.url_image AS url_image, utilisateur.pseudo AS pseudo, DATE_FORMAT(annonce.date, \'%d/%m/%Y\') AS date, annonce.date AS real_date, visible FROM annonce INNER JOIN utilisateur ON annonce.id_utilisateur = utilisateur.id ORDER BY real_date DESC, annonce.id DESC');
    	
    	return $req;
    }
    
    function get_search_items($titre)
    {
    	global $bdd;
    	
    	$req = $bdd->prepare('SELECT annonce.id AS id, annonce.titre AS titre, annonce.url_image AS url_image, utilisateur.pseudo AS pseudo, DATE_FORMAT(annonce.date, \'%d/%m/%Y\') AS date, annonce.date AS real_date, visible FROM annonce INNER JOIN utilisateur ON annonce.id_utilisateur = utilisateur.id WHERE annonce.titre LIKE ? OR utilisateur.pseudo LIKE ? ORDER BY real_date DESC, annonce.id DESC');
    	$req->execute(array('%'.$titre.'%','%'.$titre.'%'));
    	return $req;
    }
	
?>
