<?php
    $title = 'Topics';
    $style = 'topic';
    $menu = 'forum';
    ob_start();
?>

<div class="window_dashboard">
	<div class="header_window_dashboard"><h2>Topics</h2></div>
	
	<div class="content_window_dashboard">
		<div class="select_all"><input type="checkbox" /></div><div class="all_selected">Tout sélectionner/désélectionner</div><div class="search_users"><form action="index.php?target=topic" method="post"><input type="text" placeholder="ID" name="search_id" style="width: 30px; margin-right: 15px;"/></form><form action="index.php?target=topic" method="post"><input type="text" placeholder="Recherche par titre" name="search_titre" style="width: 140px; margin-right: 15px;"/></form><form action="index.php?target=topic" method="post"><input type="text" placeholder="Recherche par contenu ou pseudo" name="search"/></form></div>
			<form action="index.php?target=topic_update" method="post">
				<table style="table-layout:fixed;">
					<?php
						while($topic = $topics->fetch())
						{
							echo '<tr><td style="width: 5%; text-align: center;"><input type="checkbox" name="'.$topic['id'].'" /></td><td style="width: 13%; text-align: center; font-family:\'Biko Bold\';">'.$topic['pseudo'].'</td><td style="width: 65%; font-size: 1.1em; text-align: justify; padding: 10px; color: #34b1bc">'.print_first_words($topic['titre']).'</td><td style="width: 17%; text-align: center;">'.$topic['date'].'</td></tr>';
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

<script type="text/javascript" src="components/js/topic.js"></script>

<?php
    $content = ob_get_clean();
    include ('template.php');
?>