<?php session_start(); ?>

<?php
	require('bdd_connexion.php');
	
	function get_both_users($id_annonce)
	{
		global $bdd;
		$req = $bdd->prepare('SELECT id_utilisateur, id_acquereur FROM annonce WHERE id = ?');
		$req->execute(array($id_annonce));
		$data = $req->fetch();
		return $data;
	}
	
	function check_user($id_user)
	{
		global $bdd;
		
		$req = $bdd->prepare('SELECT COUNT(*) AS nb FROM utilisateur WHERE id = ? AND confirmation = \'confirmation\'');
		$req->execute(array($id_user));
		
		$data = $req->fetch();
		
		return $data['nb'];
	}
	
	function check_item($id_annonce)
	{
		global $bdd;
		
		$req = $bdd->prepare('SELECT COUNT(*) AS nb FROM annonce WHERE id = ?');
		$req->execute(array($id_annonce));
		
		$data = $req->fetch();
		
		return $data['nb'];
	}
?>

<?php
	
	$both_user = get_both_users($_GET['id_annonce']);
	
	$id_utilisateur_check = check_user($both_user['id_utilisateur']);
	$id_acquereur_check = check_user($both_user['id_acquereur']);
	$id_item_check = check_item($_GET['id_annonce']);
	
?>

<?php
	


	if($id_item_check == 0)
	{
		echo '2';
	}
	elseif($id_utilisateur_check == 0 OR $id_acquereur_check == 0)
	{
		echo '1';
	}
	else
	{
		echo '0';
	}
	
?>