<?php
    $title = 'Menu weshare - Supprimer';
    $style = 'menu_weshare_delete';
    $menu = 'menu_weshare';
    ob_start();
?>

<nav id="items_menu">
	<ul id="items_menu_content">
		<?php menu_auto(); ?>
	</ul>
</nav>

<?php
	if(ISSET($result))
	{
		if($result == 'delete')
		{
			echo '<div class="success">Suppression effectuée avec succès !</div>';
		}
	}
?>

<div class="window_dashboard">
	<div class="header_window_dashboard"><h2>Supprimer une catégorie</h2></div>
	
	<div class="content_window_dashboard">
		<form action="index.php?target=menu_weshare_action" method="post">
			<select id="id_rubrique_c" name="id_rubrique_c" >
				<option value="0">Rubriques</option>
				<?php
				while ($rub = $selector_rub->fetch())
				{
				?>
					<option value="<?php echo $rub['id_rubrique']; ?>"><?php echo $rub['nom']; ?></option>
				<?php
				}
				?>
			</select>
			
			<select id="id_categorie_c" name="id_categorie_c" >
				<option value="0">Catégories</option>
			</select>
			
			<input type="hidden"  name="delete"  value="on">
			
			<div style="display: inline-block;"><input class="add_sous_cat_submit" type="submit" value="Supprimer" /></div>
		</form>
	</div>
</div>

<div class="window_dashboard" style="margin-top:20px;">
	<div class="header_window_dashboard"><h2>Supprimer une sous-catégorie</h2></div>
	
	<div class="content_window_dashboard">
		<form action="index.php?target=menu_weshare_action" method="post">
			<select id="id_rubrique_s" name="id_rubrique_s" >
				<option value="0">Rubriques</option>
				<?php
				while ($rub = $selector_rub_s->fetch())
				{
				?>
					<option value="<?php echo $rub['id_rubrique']; ?>"><?php echo $rub['nom']; ?></option>
				<?php
				}
				?>
			</select>
		
			<select id="id_categorie_s" name="id_categorie_s" >
				<option value="0">Catégories</option>
			</select>
			
			<select id="id_sous_categorie_s" name="id_sous_categorie_s" >
				<option value="0">Sous-catégories</option>
			</select>
			
			<input type="hidden"  name="delete"  value="on">
			
			<div style="display: inline-block;"><input class="add_sous_cat_submit" type="submit" value="Supprimer" /></div>
		</form>
	</div>
</div>

<script type="text/javascript" src="components/js/menu_weshare_delete.js"></script>

<?php
    $content = ob_get_clean();
    include ('template.php');
?>