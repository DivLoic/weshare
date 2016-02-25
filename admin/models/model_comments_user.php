<?php
    require('../models/bdd_connexion.php');
    
    function get_comment()
    {
    	global $bdd;
    	
    	$req = $bdd->query('SELECT commentaire_utilisateur.id AS id, commentaire_utilisateur.contenu AS contenu, DATE_FORMAT(commentaire_utilisateur.date, \'%d/%m/%Y<br />%H:%i\') AS date, commentaire_utilisateur.date AS real_date, utilisateur.pseudo AS pseudo FROM commentaire_utilisateur INNER JOIN utilisateur ON commentaire_utilisateur.id_utilisateur = utilisateur.id ORDER BY real_date DESC, commentaire_utilisateur.id DESC');
    	
    	return $req;
    }
    
    function get_search_comment($titre)
    {
    	global $bdd;
    	
    	$req = $bdd->prepare('SELECT commentaire_utilisateur.id AS id, commentaire_utilisateur.contenu AS contenu, DATE_FORMAT(commentaire_utilisateur.date, \'%d/%m/%Y<br />%H:%i\') AS date, commentaire_utilisateur.date AS real_date, utilisateur.pseudo AS pseudo FROM commentaire_utilisateur INNER JOIN utilisateur ON commentaire_utilisateur.id_utilisateur = utilisateur.id WHERE commentaire_utilisateur.contenu LIKE ? OR utilisateur.pseudo LIKE ? ORDER BY real_date DESC, commentaire_utilisateur.id DESC');
    	$req->execute(array('%'.$titre.'%','%'.$titre.'%'));
    	return $req;
    }
    
    function get_search_comment_user($titre)
    {
    	global $bdd;
    	
    	$req = $bdd->prepare('SELECT commentaire_utilisateur.id AS id, commentaire_utilisateur.contenu AS contenu, DATE_FORMAT(commentaire_utilisateur.date, \'%d/%m/%Y<br />%H:%i\') AS date, commentaire_utilisateur.date AS real_date, utilisateur.pseudo AS pseudo FROM commentaire_utilisateur INNER JOIN utilisateur ON commentaire_utilisateur.id_utilisateur = utilisateur.id INNER JOIN utilisateur AS profil ON profil.id = commentaire_utilisateur.id_profil WHERE profil.pseudo LIKE ? ORDER BY real_date DESC, commentaire_utilisateur.id DESC');
    	$req->execute(array('%'.$titre.'%'));
    	return $req;
    }
	
?>
