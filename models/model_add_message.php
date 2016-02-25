<?php
    include('bdd_connexion.php');
 

    function post_message($id_user,$id_topic,$content)
    {
    	global $bdd;
    	
    	$req = $bdd->prepare('INSERT INTO message (id_utilisateur, id_topic, contenu, date) VALUES(?,?,?,NOW())');
    	$req->execute(array($id_user,$id_topic,htmlspecialchars($content)));

    }
    
    function topic_last_date($id_topic)
    {
    	global $bdd;
    	
    	$req = $bdd->prepare('UPDATE topic SET last_date = NOW() WHERE id = ?');
    	$req->execute(array($id_topic));

    }

?>

