<?php
    require('bdd_connexion.php');

        function selector_rub()
    {
        global $bdd;
         
        $reponse = $bdd->query('SELECT id AS id_rubrique, nom FROM rubrique');
     
        return $reponse;
    } 
    
    	
    	
?>
