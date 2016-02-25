<?php
    $title = 'FAQ - Supprimer';
    $style = 'FAQ_delete';
    $menu = 'faq';
    ob_start();
?>

<?php
	if(ISSET($result))
	{
		if($result == 'delete')
		{
			echo '<div class="success" style="margin: 0; margin-bottom: 20px;">Suppression effectuée avec succès !</div>';
		}
	}
?>

<div class="window_dashboard">
	<div class="header_window_dashboard"><h2>Supprimer une question/réponse</h2></div>
	
	<div class="content_window_dashboard">
		<div class="select_all"><input type="checkbox" /></div><div class="all_selected">Tout sélectionner/déselectionner</div>
			<form action="index.php?target=FAQ_action" method="post">
				<table style="table-layout:fixed;">
					<?php
						while($reponse = $reponses->fetch())
						{
							echo '<tr><td style="width: 5%; text-align: center;"><input type="checkbox" name="'.$reponse['id'].'" /></td><td style="width: 13%; text-align: center; font-family:\'Biko Bold\';">'.$reponse['id_parent'].'</td><td style="width: 35%; font-size: 1.1em; text-align: justify; padding: 10px; color: #34b1bc">'.$reponse['question'].'</td><td style="width: 47%; font-size: 1.1em; text-align: justify; padding: 10px; color: #34b1bc">'.print_first_words($reponse['reponse']).'</td></tr>';
						}
					?>
				</table>
				
				<div class="user_action">
					<select name="actions">
						<option value="">Actions à effectuer</option>
						<option value="Supprimer">Supprimer</option>
					</select>
					<input type="submit" value="Effectuer" />
				</div>
				
			</form>
	</div>
</div>

<script type="text/javascript" src="components/js/FAQ_delete.js"></script>

<?php
    $content = ob_get_clean();
    include ('template.php');
?>