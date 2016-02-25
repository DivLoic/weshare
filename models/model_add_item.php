<?php
    include('bdd_connexion.php');
    
    function add_item($url)
    {
    	global $bdd;
    	
		$req = $bdd->prepare('INSERT INTO annonce(titre, id_rubrique, id_categorie, id_sous_categorie, description, date, url_image, id_utilisateur) VALUES(?, ?, ?, ?, ?, NOW(),?,?)');
		$req->execute(array(htmlspecialchars($_POST['titre']), $_POST['id_rubrique'], $_POST['id_categorie'], $_POST['id_sous_categorie'], nl2br(htmlspecialchars($_POST['description'])), $url, $_SESSION['id']));
		
		
		$req = $bdd->exec('INSERT INTO chat_ecriture(pseudo,id_annonce) VALUES ((SELECT pseudo FROM utilisateur WHERE id = '.$_SESSION['id'].'),(SELECT id FROM annonce WHERE id_utilisateur = '.$_SESSION['id'].' ORDER BY id DESC LIMIT 1))');
	}
	
	function get_this_item()
	{
	    global $bdd;
	
		$req = $bdd->prepare('SELECT id AS id FROM annonce WHERE id_utilisateur = ? ORDER BY id DESC LIMIT 1');
		$req->execute(array($_SESSION['id']));
		
		$data = $req->fetch();
		
		return $data['id'];
	}
	
	function get_all_user_request()
	{
    	global $bdd;
    	
		$req = $bdd->query('SELECT demande.id AS id, demande.id_utilisateur AS id_utilisateur, utilisateur.pseudo AS pseudo, utilisateur.email AS email, demande.demande AS demande, demande.cle AS cle FROM demande INNER JOIN utilisateur ON utilisateur.id = demande.id_utilisateur');
		
		return $req;
	}
	
	function find_request($demande,$demande,$id_demandeur,$id)
	{
    	global $bdd;
    	
		$req = $bdd->prepare('SELECT COUNT(*) AS nb, id FROM annonce WHERE id_utilisateur = ? AND (titre LIKE ? OR description LIKE ?) AND id_utilisateur != ? AND id = ?  ORDER BY id DESC LIMIT 1');
		$req->execute(array($_SESSION['id'],'%'.$demande.'%','%'.$demande.'%',$id_demandeur,$id));
		
		$data = $req->fetch();
		return $data;
	}
?>
