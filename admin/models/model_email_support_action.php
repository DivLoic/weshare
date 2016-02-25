<?php
    require('../models/bdd_connexion.php');
    
	
    function update_email($value)
    {
    	global $bdd;
    	
		$req = $bdd->prepare('UPDATE site_information SET valeur = ? WHERE type = \'email\' ');
		$req->execute(array($value));
	}
	
?>
