<?php
    include('bdd_connexion.php');
    
    function get_items_box($my_box)
    {
     	global $bdd;
     	$req = $bdd->prepare('SELECT COUNT(*) AS nb, annonce.id AS id_item, rubrique.id AS id_rub, categorie.id AS id_cat, sous_categorie.id AS id_sous_cat, rubrique.nom AS rubrique, categorie.nom AS categorie, sous_categorie.nom AS sous_categorie, titre, utilisateur.pseudo AS pseudo, utilisateur.id AS idu, url_image FROM annonce LEFT JOIN utilisateur ON annonce.id_utilisateur = utilisateur.id LEFT JOIN rubrique ON rubrique.id = annonce.id_rubrique LEFT JOIN categorie ON categorie.id = annonce.id_categorie LEFT JOIN sous_categorie ON sous_categorie.id = annonce.id_sous_categorie WHERE annonce.id = ?');
     	$req->execute(array($my_box));
     	$items_box = $req->fetch();
     	
     	return $items_box;
    }
?>

