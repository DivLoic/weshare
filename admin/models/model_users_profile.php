<?php
    require('../models/bdd_connexion.php');
    
    function get_user($id_pseudo)
    {
    	global $bdd;
    	
    	$req = $bdd->prepare('SELECT id, url_profile_image AS image, pseudo, DATE_FORMAT(date_inscription, \'%d/%m/%Y\') AS date_inscription, email, prenom, nom, adresse, tel, DATE_FORMAT(date_de_naissance, \'%d/%m/%Y\') AS date_naissance, code_postal FROM utilisateur WHERE id = ?');
    	$req->execute(array($id_pseudo));
    	$data = $req->fetch();
    	
    	return $data;
    }
?>
