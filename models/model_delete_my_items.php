<?php
    include('bdd_connexion.php');
 
    function delete_item($id_item)
    {
        global $bdd;

        $req = $bdd->prepare('SELECT url_image FROM annonce WHERE id = ?');
        $req->execute(array($id_item));
        $url = $req->fetch();
        if(ISSET($url['url_image'])){unlink($url['url_image']);}
        
        $req = $bdd->prepare('DELETE FROM chat WHERE id_annonce = ?');
        $req->execute(array($id_item));
        
		$req = $bdd->prepare('DELETE FROM chat_ecriture WHERE id_annonce = ?');
    	$req->execute(array($id_item));       
        
        $req = $bdd->prepare('DELETE FROM annonce WHERE id = ?');
        $req->execute(array($id_item));
        
        $req = $bdd->prepare('DELETE FROM commentaire WHERE id_annonce = ?');
        $req->execute(array($id_item));
    }
?>

