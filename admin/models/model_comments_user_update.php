<?php
    require('../models/bdd_connexion.php');
    
    function delete_comments_user($id_comment_user)
    {
    	global $bdd;
    	 
    	$req = $bdd->prepare('DELETE FROM commentaire_utilisateur WHERE id = ?');
    	$req->execute(array($id_comment_user));
    	
    }
    
    
    function check_all_comments_user()
    {
    	global $bdd;
    	
    	$req = $bdd->query('SELECT id FROM commentaire_utilisateur');
    	
    	return $req;
    }
?>
