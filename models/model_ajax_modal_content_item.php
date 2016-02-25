<?php
	include('bdd_connexion.php');
	
	function informations_item($id)
	{
		global $bdd;
		
		$req = $bdd->prepare('SELECT annonce.id AS id_annonce, rubrique.id AS id_rub, categorie.id AS id_cat, sous_categorie.id AS id_sous_cat, rubrique.nom AS rubrique, categorie.nom AS categorie, sous_categorie.nom AS sous_categorie, pseudo, titre, description, DATEDIFF(NOW(),date) AS date, url_image, id_utilisateur FROM annonce LEFT JOIN utilisateur ON annonce.id_utilisateur = utilisateur.id LEFT JOIN rubrique ON rubrique.id = annonce.id_rubrique LEFT JOIN categorie ON categorie.id = annonce.id_categorie LEFT JOIN sous_categorie ON sous_categorie.id = annonce.id_sous_categorie WHERE annonce.id = ?');
		$req->execute(array($id));
		$informations_item = $req->fetch();
		
		return $informations_item;
	}
	
	function item_exist($id)
	{
		global $bdd;
		
		$req = $bdd->prepare('SELECT COUNT(*) AS nb FROM annonce WHERE annonce.id = ? AND visible = 0');
		$req->execute(array($id));
		$nb = $req->fetch();
		
		return $nb['nb'];
	}
	
	if(ISSET($_GET['item_id']))
	{
		$item = informations_item($_GET['item_id']);
		$nb = item_exist($_GET['item_id']);
	}
?>

<?php echo $item['titre']; ?>%££%
<img src="<?php echo $item['url_image']; ?>" />
<div id="item_information">
	<p><a href="<?php echo 'index.php?rubrique='.$item['id_rub']; ?>"><?php echo $item['rubrique']; ?></a> <?php if($item['categorie']!=NULL){ echo '/'; } ?> <a href="<?php echo 'index.php?categorie='.$item['id_cat']; ?>"><?php echo $item['categorie']; ?></a> <?php if($item['sous_categorie']!=NULL){ echo '/ <a href="index.php?sous_categorie='.$item['id_sous_cat'].'">'.$item['sous_categorie'].'</a>';} ?></p>
	<p>Postée par : <a href="index.php?target=user&profil=<?php echo $item['id_utilisateur']; ?>"><?php echo $item['pseudo']; ?></a></p>
	<p>En ligne depuis : <?php if($item['date']==1){echo '<em>'.$item['date'].'</em> jour';}elseif($item['date']>1){echo '<em>'.$item['date'].'</em> jours';}else{ echo '<em>aujourd\'hui</em>';} ?></em></p>
	<p><h3>Description</h3><p class="item_modal_description"><?php echo $item['description']; ?></p></p>
</div>%££%
<?php echo 'index.php?target=incr&item_id='.$item['id_annonce']; ?>%££%
<?php echo $nb; ?>