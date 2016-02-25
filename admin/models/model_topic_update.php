<?php
    require('../models/bdd_connexion.php');
    
    function delete_topic($id_comment_user)
    {
    	global $bdd;
    	 
    	$req = $bdd->prepare('DELETE FROM topic WHERE id = ?');
    	$req->execute(array($id_comment_user));
    	
    	$req = $bdd->prepare('DELETE FROM message WHERE id_topic = ?');
    	$req->execute(array($id_comment_user));
    	
    }
    
    
    function check_all_topic()
    {
    	global $bdd;
    	
    	$req = $bdd->query('SELECT id FROM topic');
    	
    	return $req;
    }
?>
