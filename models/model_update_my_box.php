<?php
    include('bdd_connexion.php');
    
    function check_item_box($item)
    {
     	global $bdd;
     	$req = $bdd->prepare('SELECT COUNT(*) AS nb FROM annonce WHERE id = ? AND visible = 0');
     	$req->execute(array($item));
     	$nb_item = $req->fetch();
     	
     	return $nb_item['nb'];
    }
    
    function check_item_user($item,$id_user)
    {
     	global $bdd;
     	$req = $bdd->prepare('SELECT COUNT(*) AS nb FROM annonce WHERE id = ? AND id_utilisateur = ?');
     	$req->execute(array($item,$id_user));
     	$nb_item = $req->fetch();
     	
     	return $nb_item['nb'];
    }
	
	 function already_trans($id_item,$id_user)
    {
     	global $bdd;
     	$trans = $bdd->prepare('SELECT id_acquereur FROM annonce WHERE annonce.id=  ?');
     	$trans->execute(array($id_item));
     	$statu = $trans->fetch();
		
		if($statu['id_acquereur'] != $id_user)
		{
		return true;
		}
     	else
		{
		return false;
		}
     	
    }
?>

