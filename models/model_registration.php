<?php
	require('models/bdd_connexion.php');
	
	function check_pseudo_email($email, $pseudo)
	{
		global $bdd;
		
		$req = $bdd->prepare('SELECT COUNT(*) AS nb FROM utilisateur WHERE email = ? OR pseudo = ?');
		$req->execute(array($email, $pseudo));
		$inscrit = $req->fetch();
		
		return $inscrit['nb'];
	}
	
	function insert_user($email, $mot_de_passe, $pseudo, $code_postal)
	{
		global $bdd;
		
		$site_root = dirname($_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI']);
		$img_default = 'content_files/pics/profile/default.png';
		
		$cle_confirmation = sha1(microtime(TRUE)*100000);
		$req = $bdd->prepare('INSERT INTO utilisateur(email,mot_de_passe,pseudo,code_postal,confirmation, date_inscription, url_profile_image) VALUES (?,?,?,?,?,NOW(),?)');
		$req->execute(array(htmlspecialchars($email), $mot_de_passe, htmlspecialchars($pseudo), htmlspecialchars($code_postal), $cle_confirmation,$img_default));
		
		$req->closeCursor();
		
		mail($email, 'weshare - Confirmation de votre compte', 'Bonjour et bienvenue '.$pseudo.', veuillez confirmez votre compte en cliquant sur ce lien de confirmation : http://'.$site_root.'/index.php?target=user_confirmation&pseudo='.$pseudo.'&cle_confirmation='.$cle_confirmation);
	}
?>