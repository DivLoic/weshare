<?php
    require('../models/bdd_connexion.php');
	
	function add_cat($id_parent, $nom)
	{
		global $bdd;
		
		$req = $bdd->prepare('INSERT INTO categorie(id_rubrique, nom) VALUES(?, ?)');
		$req->execute(array($id_parent, htmlspecialchars($nom)));
	}
	
	function add_sous_cat($id_parent, $nom)
	{
		global $bdd;
		
		$req = $bdd->prepare('INSERT INTO sous_categorie(id_categorie, nom) VALUES(?, ?)');
		$req->execute(array($id_parent, htmlspecialchars($nom)));
	}
	
	
	function update_cat($nom, $id_cat)
	{
		global $bdd;
		
		$req = $bdd->prepare('UPDATE categorie SET nom = ? WHERE id = ?');
		$req->execute(array(htmlspecialchars($nom), $id_cat));
	}
	
	function update_sous_cat($nom, $id_sous_cat)
	{
		global $bdd;
		
		$req = $bdd->prepare('UPDATE sous_categorie SET nom = ? WHERE id = ?');
		$req->execute(array(htmlspecialchars($nom), $id_sous_cat));
	}
	
	
	function delete_cat($id_cat)
	{
		global $bdd;
		
		$req1 = $bdd->prepare('DELETE FROM sous_categorie WHERE id_categorie = ?');
		$req1->execute(array($id_cat));
		
		$req2 = $bdd->prepare('DELETE FROM categorie WHERE id = ?');
		$req2->execute(array($id_cat));
		
		$req3 = $bdd->prepare('DELETE FROM commentaire WHERE id_annonce IN (SELECT id FROM annonce WHERE id_categorie = ?)');
		$req3->execute(array($id_cat));
		
		$req4 = $bdd->prepare('DELETE FROM chat WHERE id_annonce IN (SELECT id FROM annonce WHERE id_categorie = ?)');
		$req4->execute(array($id_cat));
		
		$req4 = $bdd->prepare('DELETE FROM chat_ecriture WHERE id_annonce IN (SELECT id FROM annonce WHERE id_categorie = ?)');
		$req4->execute(array($id_cat));
		
        $req = $bdd->prepare('SELECT url_image FROM annonce WHERE id_categorie = ?');
        $req->execute(array($id_cat));
        $url = $req->fetch();
        if(ISSET($url['url_image'])){unlink('../'.$url['url_image']);}
		
		$req4 = $bdd->prepare('DELETE FROM annonce WHERE id_categorie = ?');
		$req4->execute(array($id_cat));
	}
	
	function delete_sous_cat($id_sous_cat)
	{
		global $bdd;
		
		$req1 = $bdd->prepare('DELETE FROM sous_categorie WHERE id = ?');
		$req1->execute(array($id_sous_cat));
		
        $req = $bdd->prepare('SELECT url_image FROM annonce WHERE id_sous_categorie = ?');
        $req->execute(array($id_sous_cat));
        $url = $req->fetch();
        if(ISSET($url['url_image'])){unlink('../'.$url['url_image']);}
		
		$req2 = $bdd->prepare('DELETE FROM commentaire WHERE id_annonce IN (SELECT id FROM annonce WHERE id_sous_categorie = ?)');
		$req2->execute(array($id_sous_cat));
		
		$req4 = $bdd->prepare('DELETE FROM chat WHERE id_annonce IN (SELECT id FROM annonce WHERE id_sous_categorie = ?)');
		$req4->execute(array($id_sous_cat));
		
		$req4 = $bdd->prepare('DELETE FROM chat_ecriture WHERE id_annonce IN (SELECT id FROM annonce WHERE id_sous_categorie = ?)');
		$req4->execute(array($id_sous_cat));
		
		$req3 = $bdd->prepare('DELETE FROM annonce WHERE id_sous_categorie = ?');
		$req3->execute(array($id_sous_cat));
	}
	
	
?>