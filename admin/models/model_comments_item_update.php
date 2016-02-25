<?php
    require('../models/bdd_connexion.php');
    
    function delete_comments_item($id_comment_item)
    {
    	global $bdd;
    	 
    	$req = $bdd->prepare('DELETE FROM commentaire WHERE id = ?');
    	$req->execute(array($id_comment_item));
    	
    }
    
    
    function check_all_comments_item()
    {
    	global $bdd;
    	
    	$req = $bdd->query('SELECT id FROM commentaire');
    	
    	return $req;
    }
?>
