<?php

	include('bdd_connexion.php');
	
	
	
	function speaker($user_id)
	{
	global $bdd;
	$get_user= $bdd-> prepare('SELECT id_utilisateur, id_acquereur FROM annonce WHERE id= ?');
	$get_user->execute(array($user_id));
	$users= $get_user-> fetch();
	
	return $users;
	}
	
	function character ($the_id)
	{
	global $bdd;
	$get_character= $bdd-> prepare('SELECT id, pseudo, url_profile_image, score FROM utilisateur WHERE id=? ');
	$get_character-> execute(array($the_id));
	$perso=$get_character->fetch();
	
	return $perso;
	}
	
	
	function item_all ($item_id)
	{
	global $bdd;
	$get_item= $bdd-> prepare('SELECT annonce.titre AS titre, annonce.vu AS vu, DATE_FORMAT(annonce.date_acquisition, \'%d/%m/%Y\') AS date_acquisition, annonce.url_image AS url_image, rubrique.nom AS nomr, categorie.nom AS nomc, sous_categorie.nom AS nomsc FROM annonce LEFT JOIN rubrique ON annonce.id_rubrique= rubrique.id LEFT JOIN categorie ON annonce.id_categorie = categorie.id LEFT JOIN sous_categorie ON annonce.id_sous_categorie = sous_categorie.id WHERE annonce.id=? ');
	$get_item-> execute(array($item_id));
	$item=$get_item->fetch();
	
	return $item;
	}



	function get_messages()
	{
		global $bdd;
		$req = $bdd->prepare('SELECT chat.message AS message, DATE_FORMAT(chat.date, \'%e/%c/%y\') AS date, DATE_FORMAT(chat.date, \'%Y%m%D\') AS date_calcul, DATE_FORMAT(chat.date, \'%H:%i\') AS temps, utilisateur.pseudo AS pseudo, utilisateur.url_profile_image AS photo FROM chat LEFT JOIN utilisateur ON utilisateur.pseudo = chat.pseudo WHERE id_annonce = ? ORDER BY date');
		$req->execute(array($_GET['chat_id']));
		return $req;
	}
	
	
	function check_validation_user($id_item,$id_user)
	{
		global $bdd;
		$req = $bdd->prepare('SELECT COUNT(*) AS nb FROM annonce WHERE id = ? AND id_utilisateur = ? AND confirmation_utilisateur = \'confirmation\'');
		$req->execute(array($id_item,$id_user));
		$data = $req->fetch();
		return $data['nb'];
	}
	
	function check_validation_acqueror($id_item,$id_user)
	{
		global $bdd;
		$req = $bdd->prepare('SELECT COUNT(*) AS nb FROM annonce WHERE id = ? AND id_acquereur = ? AND confirmation_acquereur = \'confirmation\'');
		$req->execute(array($id_item,$id_user));
		$data = $req->fetch();
		return $data['nb'];
	}
		

?>