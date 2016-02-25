<?php

require ('../models/bdd_connexion.php');

function get_question_reponse()
    {
    	global $bdd;
    	
    	$req = $bdd->query('SELECT * FROM question_reponse ORDER BY id_parent ASC LIMIT 0 , 30');
    	
    	return $req;
    }

?>