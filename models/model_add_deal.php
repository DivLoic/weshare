<?php 

	include('bdd_connexion.php');

	function open_deal($from_box)
	{
		global $bdd;
		$open_deal_query= $bdd-> prepare('UPDATE annonce SET id_acquereur = ?, date_acquisition= NOW() WHERE id = ?');
		$open_deal_query->execute(array($_SESSION['id'],$from_box));
		$deal_update=$open_deal_query->fetch();
		
		
		return $deal_update;
		
	}
	
	function lauch_mails($from_box)
	{
		global $bdd;
		$collectmail= $bdd-> prepare('SELECT utilisateur.email, utilisateur.pseudo, annonce.titre FROM annonce INNER JOIN utilisateur ON annonce.id_utilisateur = utilisateur.id WHERE annonce.id= ? ');
		$collectmail-> execute(array($from_box));
		while($datamail= $collectmail->fetch())
		{
			mail($datamail['email'], 'weshare - Votre annonce a été récupérée', 'Bonjour '.$datamail['pseudo'].', un utilisateur du site Weshare est intéressé par votre annonce: '.$datamail['titre'].' et aimerait vous contacter.');
		}
	}
	
	function hide_item($item_id)
	{
		global $bdd;
		$hide_query= $bdd->prepare('UPDATE annonce SET visible = 1 WHERE id = ?');
		$hide_query->execute(array($item_id));
		$hide=$hide_query->fetch();
		
		return $hide;
	}
	
	
	
	
	function lauch_chat_deal($from_box)
	{
		global $bdd;
		
		$req = $bdd->prepare('SELECT COUNT(*) AS nb FROM chat_ecriture WHERE id_annonce = ? AND pseudo = ?');
		$req->execute(array($from_box,$_SESSION['pseudo']));
		$data = $req->fetch();
		
		if($data['nb'] == 0)
		{
			$req = $bdd->prepare('INSERT INTO chat_ecriture(pseudo,id_annonce) VALUES(?,?)');
			$req->execute(array($_SESSION['pseudo'],$from_box));
		}
	}
	
	function update_notif($item_id)
	{
		global $bdd;
		
		$user_query=$bdd->prepare('SELECT annonce.id_utilisateur AS id, utilisateur.notification AS notif FROM annonce INNER JOIN utilisateur ON annonce.id_utilisateur= utilisateur.id WHERE annonce.id= ?');
		$user_query->execute(array($item_id));
		$user=$user_query->fetch();
		

		$a=1;
		$not= $user['notif'] + $a;
		
		
		$update_query=$bdd->prepare('UPDATE utilisateur SET notification= ? WHERE id= ?');
		$update_query->execute(array($not,$user['id']));
	}
?>