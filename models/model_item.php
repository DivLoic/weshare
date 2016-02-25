<?php
	require('models/bdd_connexion.php');
	
	function remember_id()
	{
		global $bdd;
		$var= $_GET['item_id'];
		return $var;
	}
	
	function test()
	{
		global $bdd;
		$test_query=$bdd-> prepare('SELECT COUNT(id) AS nbr FROM annonce WHERE id=? AND visible = 0');
		$test_query->execute(array($_GET['item_id']));
		$test=$test_query->fetch();
		return $test['nbr'];
		
	}
	
	
	function catch_item()
	{
		global $bdd;
		$item_query= $bdd->prepare('SELECT annonce.id AS id_annonce,annonce.titre AS annonce, DATE_FORMAT(annonce.date, \'%d/%m/%Y\') AS date_a,annonce.url_image AS image, annonce.vu AS vu, utilisateur.id AS id_user,utilisateur.pseudo AS speudo,utilisateur.url_profile_image AS avatar, utilisateur.code_postal AS adr, utilisateur.score AS score, rubrique.nom AS rubrique, categorie.nom AS categorie, sous_categorie.nom AS sous_categorie FROM annonce LEFT JOIN utilisateur ON annonce.id_utilisateur = utilisateur.id LEFT JOIN rubrique ON annonce.id_rubrique = rubrique.id LEFT JOIN categorie ON annonce.id_categorie = categorie.id LEFT JOIN sous_categorie ON annonce.id_sous_categorie = sous_categorie.id WHERE annonce.id=?');
		$item_query->execute(array($_GET['item_id']));
		$item_array = $item_query->fetch();
		return $item_array;
	}
	
	
	function catch_comment()
	{
		global $bdd;
		$comment_query=$bdd->prepare('SELECT commentaire.contenu AS com, DATE_FORMAT(commentaire.date, \'%d/%m/%Y %H:%i\') AS date_c ,utilisateur.pseudo AS commenteur, utilisateur.url_profile_image AS avatar, utilisateur.id AS id FROM commentaire LEFT JOIN utilisateur ON commentaire.id_utilisateur = utilisateur.id WHERE commentaire.id_annonce=? ORDER BY date DESC');
		$comment_query->execute(array($_GET['item_id']));
		
		return $comment_query;
				
	}
	
	
	function catch_description ()
	{
		global $bdd;
		$description_query=$bdd->prepare('SELECT description FROM annonce WHERE id=?');
		$description_query->execute(array($_GET['item_id']));
		$description = $description_query-> fetch();
		echo'<div class="text_description"><p>'.$description['description'].'</p></div>';
	}
	
	function catch_avatar()
	{
		global $bdd;
		$avatar_query=$bdd->prepare('SELECT url_profile_image AS avatar FROM utilisateur WHERE id= ?');
		$avatar_query->execute(array($_SESSION['id']));
		$url_avatar=$avatar_query->fetch();
		return $url_avatar['avatar'];
	}
	
	function send_comment($var0,$var1,$var2)
	{
		global $bdd;
		$send_query=$bdd->prepare('INSERT INTO commentaire (id_utilisateur, id_annonce, contenu, date) VALUES (?, ?, ?, NOW())');
		$send_query->execute(array($var0,$var1,htmlspecialchars($var2),));
		
	}
	
	function test_com_content($id_profil)
	{
		global $bdd;
		
		$nbr_query=$bdd->prepare('SELECT COUNT(commentaire.id) AS com FROM commentaire INNER JOIN annonce ON commentaire.id_annonce = annonce.id INNER JOIN utilisateur ON commentaire.id_utilisateur = utilisateur.id WHERE commentaire.id_annonce=? AND utilisateur.confirmation= confirmation');
		$nbr_query->execute(array($id_profil));
		$nbr=$nbr_query->fetch();
		
		return $nbr['com'];
	}
		
?>	

