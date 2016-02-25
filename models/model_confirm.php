<?php

	include('bdd_connexion.php');
	
	function test($id)
	{
		global $bdd;
		$test_query=$bdd-> prepare('SELECT COUNT(id) AS nbr FROM annonce WHERE id=?');
		$test_query->execute(array($id));
		$test=$test_query->fetch();
		return $test['nbr'];
		
	}

	function inform($item)
	{
		global $bdd;
		$inform_query=$bdd->prepare('SELECT id_utilisateur, id_acquereur FROM annonce WHERE id= ?');
		$inform_query->execute(array($item));
		$inform=$inform_query->fetch();
		
		return $inform;
	}
	
	function cancel_deal($item)
	{
		global $bdd;
		$clean_client=$bdd->prepare('UPDATE annonce SET id_acquereur = 0, date_acquisition = 0 , visible= 0, confirmation_utilisateur = \'\', confirmation_acquereur = \'\' WHERE id = ?');
		$clean_client->execute(array($item));
		$clean=$clean_client->fetch();
		
	
	}
	
	function confirm_deal($item,$place)
	{
		global $bdd;
		$confirm_query=$bdd->prepare('UPDATE annonce SET confirmation_'.$place.'= "confirmation" WHERE id = ?');
		$confirm_query->execute(array($item));
		$confirm=$confirm_query->fetch();
	}
	
	function deal_conclusion($item)
	{
		global $bdd;
		$conclusion_query=$bdd->prepare('SELECT confirmation_utilisateur, confirmation_acquereur FROM annonce WHERE id=?');
		$conclusion_query->execute(array($item));
		$conclution=$conclusion_query->fetch();
		
		return $conclution; 
	}
	
	function good_mail($user, $item)
	{
		global $bdd;
		$data_queryone=$bdd->prepare('SELECT email, pseudo FROM utilisateur WHERE id = ? ');
		$data_queryone->execute(array($user));
		$datamail1=$data_queryone->fetch();
		
		$data_querytwo=$bdd->prepare('SELECT titre FROM annonce WHERE id = ? ');
		$data_querytwo->execute(array($item));
		$datamail2=$data_querytwo->fetch();
		
		mail($datamail1['email'], 'weshare - Transaction validée', 'Bonjour '.$datamail1['pseudo'].', votre contact a validé la transaction de l\'annonce:'.$datamail2['titre'].'. Si elle a effectivement bien eu lieu veuillez la valider au plus vite. N\'oubliez pas que dans le cas d\'un emprunt il faut attendre la remise de l\'objet pour valider la transaction. Cordialement, l\'équipe weshare.');
	}
	
	function bad_mail($user, $item)
	{
		global $bdd;
		$data_queryone=$bdd->prepare('SELECT email, pseudo FROM utilisateur WHERE id = ? ');
		$data_queryone->execute(array($user));
		$datamail1=$data_queryone->fetch();
		
		$data_querytwo=$bdd->prepare('SELECT titre FROM annonce WHERE id = ? ');
		$data_querytwo->execute(array($item));
		$datamail2=$data_querytwo->fetch();
		
		mail($datamail1['email'], 'weshare - Transaction annulée', 'Bonjour '.$datamail1['pseudo'].', votre transaction pour l\'annonce:'.$datamail2['titre'].', a malheureusement été annulée. Elle ne figurera plus dans vos transactions et sera de nouveau visible dans la galerie. Cordialement, l\'équipe weshare.');
	}
	
	function delete_items($id_item)
    {
    	global $bdd;
    	
        
        $req = $bdd->prepare('SELECT url_image FROM annonce WHERE id = ?');
        $req->execute(array($id_item));
        $url_item = $req->fetch();
        if(ISSET($url_item['url_image'])){unlink($url_item['url_image']);}
        
		$req = $bdd->prepare('DELETE FROM commentaire WHERE id_annonce IN (SELECT id FROM annonce WHERE id = ?)');
    	$req->execute(array($id_item));        
        
    	$req = $bdd->prepare('DELETE FROM annonce WHERE id = ?');
    	$req->execute(array($id_item));
		
		$req = $bdd->prepare('DELETE FROM chat WHERE id_annonce = ?');
    	$req->execute(array($id_item));
    	
		$req = $bdd->prepare('DELETE FROM chat_ecriture WHERE id_annonce = ?');
    	$req->execute(array($id_item));
    	
    }
	
	function reset_chat($id_item)
	{
		global $bdd;
		$req = $bdd->prepare('DELETE FROM chat WHERE id_annonce = ?');
    	$req->execute(array($id_item));
	}
	
	
	function rub($item_id)
	{
		global $bdd;
		$rub_query=$bdd->prepare('SELECT id_rubrique from annonce WHERE id= ? ');
		$rub_query->execute(array($item_id));
		$rub=$rub_query->fetch();
		
		return $rub['id_rubrique'];
	
	}
	
	function scoring($id,$a,$b)
	{
		global $bdd;
		
		$req1=$bdd->prepare('SELECT annonce.id_utilisateur AS id, utilisateur.score AS score_1 FROM annonce INNER JOIN utilisateur ON annonce.id_utilisateur= utilisateur.id WHERE annonce.id= ?');
		$req2=$bdd->prepare('SELECT annonce.id_acquereur AS id, utilisateur.score AS score_2 FROM annonce INNER JOIN utilisateur ON annonce.id_acquereur= utilisateur.id WHERE annonce.id= ?');
		$req1->execute(array($id));
		$req2->execute(array($id));
		
		$data1=$req1->fetch();
		$data2=$req2->fetch();
		
		$new_score_1= $data1['score_1'] + $a;
		$new_score_2= $data2['score_2'] + $b;
		
		$scroring_query1=$bdd->prepare('UPDATE utilisateur SET score= ? WHERE id= ?');
		$scroring_query2=$bdd->prepare('UPDATE utilisateur SET score= ? WHERE id= ?');
		
		$scroring_query1-> execute(array($new_score_1,$data1['id']));
		$scroring_query2-> execute(array($new_score_2,$data2['id']));
		
	
	}
	
	
	
	
	function get_both_users($id_annonce)
	{
		global $bdd;
		$req = $bdd->prepare('SELECT id_utilisateur, id_acquereur FROM annonce WHERE id = ?');
		$req->execute(array($id_annonce));
		$data = $req->fetch();
		return $data;
	}
	
	
?>