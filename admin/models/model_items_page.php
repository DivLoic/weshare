<?php
    require('../models/bdd_connexion.php');
    
    function get_item($id_item)
    {
    	global $bdd;
    	
    	$req = $bdd->prepare('SELECT DATEDIFF(NOW(),date_acquisition) AS date_acquisition, annonce.visible AS visible, us.pseudo AS pseudo_aq, rubrique.nom AS rubrique, categorie.nom AS categorie, sous_categorie.nom AS sous_categorie, annonce.id AS id_annonce, annonce.url_image AS image, utilisateur.pseudo AS pseudo, annonce.description AS description, annonce.titre AS titre, annonce.vu AS vu, DATE_FORMAT(date, \'%d/%m/%Y\') AS date, annonce.id_acquereur AS id_acquereur FROM annonce INNER JOIN utilisateur ON utilisateur.id = annonce.id_utilisateur LEFT JOIN utilisateur AS us ON us.id = annonce.id_acquereur LEFT JOIN rubrique ON annonce.id_rubrique = rubrique.id LEFT JOIN categorie ON annonce.id_categorie = categorie.id LEFT JOIN sous_categorie ON sous_categorie.id = annonce.id_sous_categorie WHERE annonce.id = ?');
    	$req->execute(array($id_item));
    	$data = $req->fetch();
    	
    	return $data;
    }
?>
