<?php
    require('../models/bdd_connexion.php');
    
	
    function update_maintenance($value_maintenance)
    {
    	global $bdd;
    	
		$req = $bdd->prepare('UPDATE site_information SET valeur = ? WHERE type = \'maintenance\' ');
		$req->execute(array($value_maintenance));
	}
	
?>
