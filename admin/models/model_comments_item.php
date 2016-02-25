<?php
    require('../models/bdd_connexion.php');
    
    function get_comment()
    {
    	global $bdd;
    	
    	$req = $bdd->query('SELECT commentaire.id AS id, commentaire.contenu AS contenu, DATE_FORMAT(commentaire.date, \'%d/%m/%Y<br />%H:%i\') AS date, commentaire.date AS real_date, utilisateur.pseudo AS pseudo FROM commentaire INNER JOIN utilisateur ON commentaire.id_utilisateur = utilisateur.id ORDER BY real_date DESC, commentaire.id DESC');
    	
    	return $req;
    }
    
    function get_search_comment($titre)
    {
    	global $bdd;
    	
    	$req = $bdd->prepare('SELECT commentaire.id AS id, commentaire.contenu AS contenu, DATE_FORMAT(commentaire.date, \'%d/%m/%Y<br />%H:%i\') AS date, commentaire.date AS real_date, utilisateur.pseudo AS pseudo FROM commentaire INNER JOIN utilisateur ON commentaire.id_utilisateur = utilisateur.id WHERE commentaire.contenu LIKE ? OR utilisateur.pseudo LIKE ? ORDER BY real_date DESC, commentaire.id DESC');
    	$req->execute(array('%'.$titre.'%','%'.$titre.'%'));
    	return $req;
    }
    
    function get_search_comment_item($titre)
    {
    	global $bdd;
    	
    	$req = $bdd->prepare('SELECT commentaire.id AS id, commentaire.contenu AS contenu, DATE_FORMAT(commentaire.date, \'%d/%m/%Y<br />%H:%i\') AS date, commentaire.date AS real_date, utilisateur.pseudo AS pseudo FROM commentaire INNER JOIN utilisateur ON commentaire.id_utilisateur = utilisateur.id INNER JOIN annonce ON annonce.id = commentaire.id_annonce WHERE annonce.titre LIKE ? ORDER BY real_date DESC, commentaire.id DESC');
    	$req->execute(array('%'.$titre.'%'));
    	return $req;
    }
	
?>
