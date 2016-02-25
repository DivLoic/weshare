<?php
    require('../models/bdd_connexion.php');
    
    function delete_items($id_item)
    {
    	global $bdd;
    	
        
        $req = $bdd->prepare('SELECT url_image FROM annonce WHERE id = ?');
        $req->execute(array($id_item));
        $url_item = $req->fetch();
        if(ISSET($url_item['url_image'])){unlink('../'.$url_item['url_image']);}
        
		$req = $bdd->prepare('DELETE FROM commentaire WHERE id_annonce IN (SELECT id FROM annonce WHERE id = ?)');
    	$req->execute(array($id_item));
    	
		$req = $bdd->prepare('DELETE FROM chat WHERE id_annonce = ?');
    	$req->execute(array($id_item));
    	
		$req = $bdd->prepare('DELETE FROM chat_ecriture WHERE id_annonce = ?');
    	$req->execute(array($id_item));                      
        
    	$req = $bdd->prepare('DELETE FROM annonce WHERE id = ?');
    	$req->execute(array($id_item));
    	
    }
    
    
    function check_all_items()
    {
    	global $bdd;
    	
    	$req = $bdd->query('SELECT id FROM annonce');
    	
    	return $req;
    }
?>
