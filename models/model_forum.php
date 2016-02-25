<?php
	require('models/bdd_connexion.php');
	
	function get_topic()
	{
		global $bdd;
		
		$req = $bdd->query('SELECT topic.id AS id, rubrique.nom AS type, topic.titre AS titre, utilisateur.pseudo AS pseudo, utilisateur.id AS id_user, DATE_FORMAT(last_date, \'%e/%m | %kh%i\') AS last_date_print FROM topic LEFT JOIN rubrique ON topic.type = rubrique.id LEFT JOIN utilisateur ON utilisateur.id = topic.id_utilisateur ORDER BY last_date DESC');
		
		return $req;
	}
	
	function nb_topic()
	{
		global $bdd;
		
		$req = $bdd->query('SELECT COUNT(*) AS nb FROM topic LEFT JOIN rubrique ON topic.type = rubrique.id LEFT JOIN utilisateur ON utilisateur.id = topic.id_utilisateur ORDER BY last_date DESC');
		$data = $req->fetch();
		return $data['nb'];
	}
	
	function get_search_topic($search)
	{
		global $bdd;
		
		$req = $bdd->prepare('SELECT DISTINCT topic.id AS id, rubrique.nom AS type, topic.titre AS titre, utilisateur.pseudo AS pseudo, utilisateur.id AS id_user, DATE_FORMAT(last_date, \'%e/%m | %kh%i\') AS last_date_print FROM topic LEFT JOIN rubrique ON topic.type = rubrique.id LEFT JOIN utilisateur ON utilisateur.id = topic.id_utilisateur LEFT JOIN message ON topic.id = message.id_topic WHERE topic.contenu LIKE ? OR topic.titre LIKE ? OR topic.id IN (SELECT id_topic FROM message WHERE contenu LIKE ?) ORDER BY last_date DESC');
		$req->execute(array('%'.$search.'%','%'.$search.'%','%'.$search.'%'));
		return $req;
	}
	
	function nb_search_topic($search)
	{
		global $bdd;
		
		$req = $bdd->prepare('SELECT DISTINCT COUNT(*) AS nb FROM topic LEFT JOIN rubrique ON topic.type = rubrique.id LEFT JOIN utilisateur ON utilisateur.id = topic.id_utilisateur LEFT JOIN message ON topic.id = message.id_topic WHERE topic.contenu LIKE ? OR topic.titre LIKE ? OR topic.id IN (SELECT id_topic FROM message WHERE contenu LIKE ?) ORDER BY last_date DESC');
		$req->execute(array('%'.$search.'%','%'.$search.'%','%'.$search.'%'));
		$data = $req->fetch();
		return $data['nb'];
	}

	
	function get_nb_message_topic($id_topic)
	{
		global $bdd;
		
		$req = $bdd->prepare('SELECT COUNT(*) AS nb FROM message WHERE id_topic = ?');
		$req->execute(array($id_topic));
		$data = $req->fetch();
		
		return $data['nb'];
	}
	
	
	function print_first_words($var)
	{
		$nb_words = 20;
		$tab= explode(' ', $var, $nb_words+1);
		if(count($tab) <= $nb_words) {$end = '';}else{$end = ' [...]';}
		unset($tab[$nb_words]);
		return implode(' ', $tab).$end;
	}
	
?>