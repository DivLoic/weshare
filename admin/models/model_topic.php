<?php
    require('../models/bdd_connexion.php');
    
    function get_topic()
    {
    	global $bdd;
    	
    	$req = $bdd->query('SELECT topic.id AS id, topic.titre AS titre, DATE_FORMAT(topic.date, \'%d/%m/%Y<br />%H:%i\') AS date, topic.date AS real_date, utilisateur.pseudo AS pseudo FROM topic INNER JOIN utilisateur ON topic.id_utilisateur = utilisateur.id ORDER BY real_date DESC, topic.id DESC');
    	
    	return $req;
    }
    
    function get_search_topic($titre)
    {
    	global $bdd;
    	
    	$req = $bdd->prepare('SELECT topic.id AS id, topic.titre AS titre, DATE_FORMAT(topic.date, \'%d/%m/%Y<br />%H:%i\') AS date, topic.date AS real_date, utilisateur.pseudo AS pseudo FROM topic INNER JOIN utilisateur ON topic.id_utilisateur = utilisateur.id WHERE topic.contenu LIKE ? OR utilisateur.pseudo LIKE ? ORDER BY real_date DESC, topic.id DESC');
    	$req->execute(array('%'.$titre.'%','%'.$titre.'%'));
    	return $req;
    }
    
    function get_search_topic_titre($titre)
    {
    	global $bdd;
    	
    	$req = $bdd->prepare('SELECT topic.id AS id, topic.titre AS titre, DATE_FORMAT(topic.date, \'%d/%m/%Y<br />%H:%i\') AS date, topic.date AS real_date, utilisateur.pseudo AS pseudo FROM topic INNER JOIN utilisateur ON topic.id_utilisateur = utilisateur.id WHERE topic.titre LIKE ? ORDER BY real_date DESC, topic.id DESC');
    	$req->execute(array('%'.$titre.'%'));
    	return $req;
    }
    
    function get_search_topic_id($id)
    {
    	global $bdd;
    	
    	$req = $bdd->prepare('SELECT topic.id AS id, topic.titre AS titre, DATE_FORMAT(topic.date, \'%d/%m/%Y<br />%H:%i\') AS date, topic.date AS real_date, utilisateur.pseudo AS pseudo FROM topic INNER JOIN utilisateur ON topic.id_utilisateur = utilisateur.id WHERE topic.id = ? ORDER BY real_date DESC, topic.id DESC');
    	$req->execute(array($id));
    	return $req;
    }
	
?>
