<?php
    include('bdd_connexion.php');
 
    function count_my_items($pseudo)
    {
        global $bdd;
         
        $req = $bdd->prepare('SELECT COUNT(*) AS nb FROM annonce INNER JOIN utilisateur ON annonce.id_utilisateur = utilisateur.id WHERE utilisateur.pseudo = ?');
        $req->execute(array($pseudo));
        $nb_items = $req->fetch();
         
        return $nb_items['nb'];
    }
 
    function my_items($pseudo)
    {
        global $bdd;
         
        $req = $bdd->prepare('SELECT annonce.id AS id_item, rubrique.id AS id_rub, categorie.id AS id_cat, sous_categorie.id AS id_sous_cat, rubrique.nom AS rubrique, categorie.nom AS categorie, sous_categorie.nom AS sous_categorie, titre, DATE_FORMAT(date, \'%d/%m/%Y\') AS date_ajout, url_image FROM annonce LEFT JOIN utilisateur ON annonce.id_utilisateur = utilisateur.id LEFT JOIN rubrique ON rubrique.id = annonce.id_rubrique LEFT JOIN categorie ON categorie.id = annonce.id_categorie LEFT JOIN sous_categorie ON sous_categorie.id = annonce.id_sous_categorie WHERE (utilisateur.pseudo = ? AND annonce.visible= 0) ORDER BY date DESC');
        $req->execute(array($pseudo));
         
        return $req;
    }

    function selector_rub()
    {
    	global $bdd;
    	
    	$reponse = $bdd->query('SELECT id AS id_rubrique, nom FROM rubrique');
	
		return $reponse;
    }

	function selector_cat()
    {
    	global $bdd;
    	
    	$reponse = $bdd->query('SELECT categorie.id_rubrique AS id_parent, categorie.nom AS nom, categorie.id AS id_categorie FROM categorie INNER JOIN rubrique ON categorie.id_rubrique=rubrique.id');
	
		return $reponse;
    }

    function selector_sous_cat()
    {
    	global $bdd;
    	
		$reponse = $bdd->query('SELECT sous_categorie.id_categorie AS id_parent, sous_categorie.nom AS nom, sous_categorie.id AS id_sous_categorie FROM sous_categorie INNER JOIN categorie ON sous_categorie.id_categorie=categorie.id');
	
		return $reponse;
	
    }	   

?>

