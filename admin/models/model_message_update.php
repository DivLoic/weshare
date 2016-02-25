<?php
    require('../models/bdd_connexion.php');
    
    function delete_message($id_comment_user)
    {
    	global $bdd;
    	 
    	$req = $bdd->prepare('DELETE FROM message WHERE id = ?');
    	$req->execute(array($id_comment_user));
    	
    }
    
    
    function check_all_message()
    {
    	global $bdd;
    	
    	$req = $bdd->query('SELECT id FROM message');
    	
    	return $req;
    }
?>
