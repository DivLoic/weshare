<?php
    $title = 'Annonce n° '.$item['id_annonce'];
    $style = 'items_page';
    $menu = 'items';
    ob_start();
?>

<div class="window_dashboard">
	<div class="header_window_dashboard"><h2><?php echo $item['titre']; ?></h2></div>
	
	<div class="content_window_dashboard">

		<div id="account">
			<div id="photo">
				<img src="../<?php echo $item['image']; ?>" class="profile_photo" alt="votre photo de profil" />
			</div>
			
			<div id="account_information">
				<p><?php echo $item['titre']; ?></p>
				<p><?php echo $item['pseudo']; ?></p>
				<p><?php echo $item['date']; ?></p>
			</div>
		</div>

		<div id="personal_information">
			<div class="information_user">Description :</div><div class="value_info" style="display:inline-block; vertical-align:top; margin-bottom: 20px; width: 70%;"><?php echo $item['description']; ?></div><br />
			<div class="information_user">Rubrique :</div><span class="value_info"><?php echo $item['rubrique']; ?></span><br />
			<div class="information_user">Catégorie :</div><span class="value_info"><?php echo $item['categorie']; ?></span><br />
			<?php if($item['sous_categorie']!=''){?><div class="information_user">Sous-catégorie :</div><span class="value_info"><?php echo $item['sous_categorie']; ?></span><br /><?php } ?>
			<div class="information_user">Vue(s) :</div><span class="value_info"><?php echo $item['vu']; ?></span><br />
			<div class="information_user">Statut :</div><span class="value_info"><?php echo status_item($item['id_acquereur'], $item['pseudo_aq'],$item['visible']); ?></span><br />
		</div>

	</div>
</div>


<?php
    $content = ob_get_clean();
    include ('template.php');
?>