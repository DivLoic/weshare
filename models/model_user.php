<?php
	require('models/bdd_connexion.php');
	
	//affichage
	
		function remember_id()
	{
		global $bdd;
		$var= $_GET['profil'];
		return $var;
	}
	
	function test_user($id_profil)
	{
		global $bdd;
		
		$test_query=$bdd->prepare('SELECT COUNT(*) FROM utilisateur WHERE id=? AND confirmation = \'confirmation\'');
		$test_query->execute(array($id_profil));
		$test=$test_query->fetch();
		
		return $test['COUNT(*)'];
	}
	
	
	
	function test_com_content($id_profil)
	{
		global $bdd;
		
		$nbr_query=$bdd->prepare('SELECT COUNT(commentaire_utilisateur.id) AS com FROM commentaire_utilisateur INNER JOIN utilisateur ON commentaire_utilisateur.id_utilisateur = utilisateur.id WHERE commentaire_utilisateur.id_profil=? AND utilisateur.confirmation= confirmation');
		$nbr_query->execute(array($id_profil));
		$nbr=$nbr_query->fetch();
		
		return $nbr['com'];
	}
	
	function test_item_content($id_profil)
	{
		global $bdd;
		
		$nbr_query=$bdd->prepare('SELECT COUNT(annonce.id) AS item FROM annonce WHERE id_utilisateur= ? AND visible= 0');
		$nbr_query->execute(array($id_profil));
		$nbr=$nbr_query->fetch();
		
		return $nbr['item'];
	}
	
	function user_content($id_profil)
	{
		global $bdd;
		
		$user_data_query=$bdd->prepare('SELECT id, pseudo, score, url_profile_image,DATE_FORMAT(date_inscription, \'%d/%m/%Y\') AS date, code_postal, ma_description  FROM utilisateur  WHERE utilisateur.id= ? ');
		$user_data_query->execute(array($id_profil));
		$user_data=$user_data_query->fetch();
		
		return $user_data;
	
	}
	
	function mark($id_profil)
	{
		global $bdd;
		
		$mark_query=$bdd->prepare('SELECT COUNT(*), CAST(AVG(note) AS DECIMAL(10,1)) AS moyenne FROM note WHERE id_note=? ');
		$mark_query->execute(array($id_profil));
		$mark=$mark_query->fetch();
		
		return $mark;	
	}
	
	function my_rate($id_user,$id_profil)
	{
		global $bdd;
		
		$rate_query=$bdd->prepare(' SELECT COUNT(*), note from note WHERE (id_noteur=? AND id_note= ?) ');
		$rate_query->execute(array($id_user,$id_profil));
		$rate=$rate_query->fetch();
		
		return $rate;
	}
	
	function comment($id_profil)
	{
		global $bdd;
		
		$user_comment_query=$bdd->prepare('SELECT commentaire_utilisateur.id_utilisateur AS link_id, commentaire_utilisateur.contenu AS contenu, DATE_FORMAT(commentaire_utilisateur.date, \'%d/%m/%Y %H:%i\') AS date , utilisateur.url_profile_image AS avatar, utilisateur.pseudo AS pseudo FROM commentaire_utilisateur INNER JOIN utilisateur ON commentaire_utilisateur.id_utilisateur=utilisateur.id WHERE (commentaire_utilisateur.id_profil= ? AND utilisateur.confirmation= confirmation) ORDER BY commentaire_utilisateur.date DESC');
		$user_comment_query->execute(array($id_profil));
		
		
		return $user_comment_query;
	}
	
	function item($id_profil)
	{
		global $bdd;
		
		$user_item_query=$bdd->prepare('SELECT annonce.id AS id,annonce.url_image, annonce.vu, annonce.titre, DATE_FORMAT(annonce.date, \'%d/%m/%Y\') AS date, rubrique.nom AS rub FROM annonce LEFT JOIN rubrique ON annonce.id_rubrique= rubrique.id WHERE (id_utilisateur=? AND visible=0) ORDER BY annonce.date DESC');
		$user_item_query->execute(array($id_profil));
	
		return $user_item_query;
	}

	//publication
	
	function my_pic($id_user)
	{
		global $bdd;
		$avatar_query=$bdd->prepare('SELECT url_profile_image AS avatar FROM utilisateur WHERE id= ?');
		$avatar_query->execute(array($id_user));
		$url_avatar=$avatar_query->fetch();
		return $url_avatar['avatar'];
	}
	
	function send_comment($var0,$var1,$var2)
	{
		global $bdd;
		$send_query=$bdd->prepare('INSERT INTO commentaire_utilisateur (id_utilisateur, id_profil, contenu, date) VALUES (?, ?, ?, NOW())');
		$send_query->execute(array($var0,$var1,$var2,));
		
	}

	function send_mark($var0,$var1,$var2)
	{
		global $bdd;
		$send_query=$bdd->prepare('INSERT INTO note (id_noteur, id_note, note, date) VALUES (?, ?, ?, NOW())');
		$send_query->execute(array($var0,$var1,$var2,));
		
	}

?>