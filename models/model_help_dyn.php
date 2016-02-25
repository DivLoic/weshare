<?php
    require('bdd_connexion.php');
    
    function select_FAQ($id)
    {
        global $bdd;
        
        $reponse = $bdd->prepare('SELECT question,reponse FROM question_reponse WHERE id_parent = ? ');
      	$reponse->execute(array($id));
      	
      	
        return $reponse;
    } 
    
    
    
    
