<?php
    include('bdd_connexion.php');
 

    function add_topic($id_user,$titre,$contenu,$type)
    {
    	global $bdd;
    	
		$req = $bdd->prepare('INSERT INTO topic (id_utilisateur, titre, contenu, type, date, last_date) VALUES (?,?,?,?,NOW(),NOW())');
		$req->execute(array($id_user, htmlspecialchars($titre), htmlspecialchars($contenu), $type));
		
    }   

?>

