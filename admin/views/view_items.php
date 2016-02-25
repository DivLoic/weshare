<?php
    $title = 'Annonces';
    $style = 'items';
    $menu = 'items';
    ob_start();
?>

<div class="window_dashboard">
	<div class="header_window_dashboard"><h2>Annonces</h2></div>
	
	<div class="content_window_dashboard">
		<div class="select_all"><input type="checkbox" /></div><div class="all_selected">Tout sélectionner/désélectionner</div><div class="search_users"><form action="index.php?target=items" method="post"><input type="text" placeholder="Recherche par titre ou pseudo" name="search"/></form></div>
			<form action="index.php?target=items_update" method="post">
				<table style="table-layout:fixed;">
					<?php
						while($item = $items->fetch())
						{
							$visible = check_status($item['visible']);
							echo '<tr><td style="width: 5%; text-align: center;"><input type="checkbox" name="'.$item['id'].'" /></td><td style="width: 10%; text-align: center;"><img style="width: 50px; height: 50px; border-radius: 8px;" alt="img_profile" src="../'.$item['url_image'].'" /></td><td style="width: 45%; font-size: 1.3em; text-indent: 1.5em; font-family: \'Biko Bold\';"><a href="index.php?target=items_page&amp;id_item='.$item['id'].'">'.$item['titre'].'</a></td><td style="width: 18%; text-align: center; font-family:\'Biko Bold\';">'.$item['pseudo'].'</td><td style="width: 17%; text-align: center;">'.$item['date'].'</td><td style="width: 5%; text-align: center;"><div class="'.$visible[0].'">'.$visible[1].'</div></td></tr>';
						}
					?>
				</table>
				
				<div class="user_action">
					<select name="actions">
						<option value="">Actions à effectuer</option>
						<option value="Supprimer">Supprimer</option>
					</select>
					<input type="submit" value="Supprimer" />
				</div>
				
			</form>
	</div>
</div>

<script type="text/javascript" src="components/js/items.js"></script>

<?php
    $content = ob_get_clean();
    include ('template.php');
?>