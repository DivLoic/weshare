<?php
	require('models/bdd_connexion.php');
	
	function get_topic($id_topic)
	{
		global $bdd;
		
		$req = $bdd->prepare('SELECT topic.id AS id, rubrique.nom AS type, topic.titre AS titre, utilisateur.pseudo AS pseudo, utilisateur.id AS id_user, DATE_FORMAT(date, \'Le %d/%m/%Y à %Hh%i\') AS date, DATE_FORMAT(date, \'%e/%m | %kh%i\') AS date_small, utilisateur.url_profile_image AS image, topic.contenu AS contenu FROM topic LEFT JOIN rubrique ON topic.type = rubrique.id LEFT JOIN utilisateur ON utilisateur.id = topic.id_utilisateur WHERE topic.id = ?');
		$req->execute(array($id_topic));
		$data = $req->fetch();
		return $data;
	}
	
	function get_message($id_topic)
	{
		global $bdd;
		
		$req = $bdd->prepare('SELECT utilisateur.pseudo AS pseudo, utilisateur.id AS id_user, DATE_FORMAT(date, \'%e/%m | %kh%i\') AS date, utilisateur.url_profile_image AS image, message.contenu AS contenu FROM message LEFT JOIN utilisateur ON utilisateur.id = message.id_utilisateur WHERE message.id_topic = ? ORDER BY date');
		$req->execute(array($id_topic));
		return $req;
	}
	
	function get_nb_message($pseudo)
	{
		global $bdd;
		
		$req = $bdd->prepare('SELECT COUNT(*) AS nb FROM message INNER JOIN utilisateur ON message.id_utilisateur = utilisateur.id WHERE utilisateur.pseudo = ?');
		$req->execute(array($pseudo));
		$data = $req->fetch();
		return $data['nb'];
	}
	
	function topic_exist($id_topic)
	{
		global $bdd;
		
		$req = $bdd->prepare('SELECT COUNT(*) AS nb FROM topic WHERE id = ?');
		$req->execute(array($id_topic));
		$data = $req->fetch();
		return $data['nb'];
	}
	
?>