<?php
    require('../models/bdd_connexion.php');
    
    function get_message()
    {
    	global $bdd;
    	
    	$req = $bdd->query('SELECT message.id AS id, message.contenu AS message, DATE_FORMAT(message.date, \'%d/%m/%Y<br />%H:%i\') AS date, message.date AS real_date, utilisateur.pseudo AS pseudo FROM message INNER JOIN utilisateur ON message.id_utilisateur = utilisateur.id ORDER BY real_date DESC, message.id DESC');
    	
    	return $req;
    }
    
    function get_search_message($titre)
    {
    	global $bdd;
    	
    	$req = $bdd->prepare('SELECT message.id AS id, message.contenu AS message, DATE_FORMAT(message.date, \'%d/%m/%Y<br />%H:%i\') AS date, message.date AS real_date, utilisateur.pseudo AS pseudo FROM message INNER JOIN utilisateur ON message.id_utilisateur = utilisateur.id WHERE message.contenu LIKE ? OR utilisateur.pseudo LIKE ? ORDER BY real_date DESC, message.id DESC');
    	$req->execute(array('%'.$titre.'%','%'.$titre.'%'));
    	return $req;
    }
    
    function get_search_message_titre($titre)
    {
    	global $bdd;
    	
    	$req = $bdd->prepare('SELECT message.id AS id, message.contenu AS message, DATE_FORMAT(message.date, \'%d/%m/%Y<br />%H:%i\') AS date, message.date AS real_date, utilisateur.pseudo AS pseudo FROM message INNER JOIN utilisateur ON message.id_utilisateur = utilisateur.id INNER JOIN topic ON topic.id = message.id_topic WHERE topic.titre LIKE ? ORDER BY real_date DESC, message.id DESC');
    	$req->execute(array('%'.$titre.'%'));
    	return $req;
    }
    
    function get_search_message_id($id)
    {
    	global $bdd;
    	
    	$req = $bdd->prepare('SELECT message.id AS id, message.contenu AS message, DATE_FORMAT(message.date, \'%d/%m/%Y<br />%H:%i\') AS date, message.date AS real_date, utilisateur.pseudo AS pseudo FROM message INNER JOIN utilisateur ON message.id_utilisateur = utilisateur.id WHERE message.id_topic = ? ORDER BY real_date DESC, message.id DESC');
    	$req->execute(array($id));
    	return $req;
    }
	
?>
