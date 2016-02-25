<?php
    require('../models/bdd_connexion.php');
    
    function delete_users($id_pseudo)
    {
    	global $bdd;
    	
    	$req = $bdd->prepare('UPDATE annonce SET visible = 0, id_acquereur = 0 WHERE id_acquereur = ?');
    	$req->execute(array($id_pseudo));
    	
        $req = $bdd->prepare('SELECT url_profile_image AS url_image FROM utilisateur WHERE id = ?');
        $req->execute(array($id_pseudo));
        $url = $req->fetch();
        if(ISSET($url['url_image']) AND $url['url_image']!='content_files/pics/profile/default.png'){unlink('../'.$url['url_image']);}
        
        $req = $bdd->prepare('SELECT url_image FROM annonce WHERE id_utilisateur = ?');
        $req->execute(array($id_pseudo));
        $url_item = $req->fetch();
        if(ISSET($url_item['url_image'])){unlink('../'.$url_item['url_image']);}
        
        $req = $bdd->prepare('DELETE FROM chat_ecriture WHERE pseudo = (SELECT pseudo FROM utilisateur WHERE id = ?)');
    	$req->execute(array($id_pseudo));
    	
        $req = $bdd->prepare('DELETE FROM chat WHERE pseudo = (SELECT pseudo FROM utilisateur WHERE id = ?)');
    	$req->execute(array($id_pseudo));
    	
        $req = $bdd->prepare('DELETE FROM chat WHERE id_annonce IN (SELECT id FROM annonce WHERE id_utilisateur = ?)');
    	$req->execute(array($id_pseudo));
        
        $req = $bdd->prepare('DELETE FROM commentaire WHERE id_utilisateur = ?');
    	$req->execute(array($id_pseudo));
    	
		$req3 = $bdd->prepare('DELETE FROM commentaire WHERE id_annonce IN (SELECT id FROM annonce WHERE id_utilisateur = ?)');
		$req3->execute(array($id_pseudo));
		
        $req = $bdd->prepare('DELETE FROM message WHERE id_utilisateur = ?');
    	$req->execute(array($id_pseudo));
    	
        $req = $bdd->prepare('DELETE FROM message WHERE id_topic = IN (SELECT id FROM topic WHERE id_utilisateur = ?)');
    	$req->execute(array($id_pseudo));
    	
        $req = $bdd->prepare('DELETE FROM topic WHERE id_utilisateur = ?');
    	$req->execute(array($id_pseudo));
		
        
    	$req = $bdd->prepare('DELETE FROM annonce WHERE id_utilisateur = ?');
    	$req->execute(array($id_pseudo));        
    	
    	$req = $bdd->prepare('DELETE FROM utilisateur WHERE id = ?');
    	$req->execute(array($id_pseudo));
    }
    
    function banish_users($id_pseudo)
    {
    	global $bdd;
    	
    	$req = $bdd->prepare('UPDATE utilisateur SET confirmation = \'banni\' WHERE id = ?');
    	$req->execute(array($id_pseudo));
    	
    	$req = $bdd->prepare('UPDATE annonce SET visible = 2, id_acquereur = 0 WHERE id_utilisateur = ?');
    	$req->execute(array($id_pseudo));
    	
    	$req = $bdd->prepare('UPDATE annonce SET visible = 0, id_acquereur = 0 WHERE id_acquereur = ?');
    	$req->execute(array($id_pseudo));
    }
    
    function active_users($id_pseudo)
    {
    	global $bdd;
    	
    	$req = $bdd->prepare('UPDATE utilisateur SET confirmation = \'confirmation\' WHERE id = ?');
    	$req->execute(array($id_pseudo));
    	
    	$req = $bdd->prepare('UPDATE annonce SET visible = 0 WHERE id_utilisateur = ?');
    	$req->execute(array($id_pseudo));
    }
    
    function check_all_users()
    {
    	global $bdd;
    	
    	$req = $bdd->query('SELECT id FROM utilisateur');
    	
    	return $req;
    }
?>
