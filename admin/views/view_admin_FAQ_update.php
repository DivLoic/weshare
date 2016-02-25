<?php
    $title = 'FAQ - modifier';
    $style = 'FAQ_update';
    $menu = 'faq';
    ob_start();
?>

<?php
	if(ISSET($result))
	{
		if($result == 'update')
		{
			echo '<div class="success" style="margin: 0; margin-bottom: 20px;">Modification effectuée avec succès !</div>';
		}
	}
?>

<div class="window_dashboard">
	<div class="header_window_dashboard"><h2>Modifier une question/réponse</h2></div>
	
	<div class="content_window_dashboard">
			<form action="index.php?target=FAQ_action" method="post">
				<table style="table-layout:fixed;">
					<?php
						while($reponse = $reponses->fetch())
						{
							echo '<tr><td style="width: 5%; text-align: center;"><input class="coche" type="radio" name="id_question" value="'.$reponse['id'].'" /></td><td style="width: 13%; text-align: center; font-family:\'Biko Bold\';">'.$reponse['id_parent'].'</td><td style="width: 35%; font-size: 1.1em; text-align: justify; padding: 10px; color: #34b1bc">'.$reponse['question'].'</td><td style="width: 47%; font-size: 1.1em; text-align: justify; padding: 10px; color: #34b1bc">'.print_first_words($reponse['reponse']).'</td></tr>';
						}
					?>
				</table>
				
				<div class="user_action">	
					<select name="actions">
						<option value="">Actions à effectuer</option>
						<option value="Modifier">Modifier</option>
					</select>
					<input type="text" name="question" placeholder="Question ?" class="Q_R" style="margin-top: 20px;"/>
					<textarea name="reponse" placeholder="Réponse..." class="Q_R" style="height: 100px; resize: vertical;"></textarea>
					<div style="text-align: right;"><input type="submit" value="Effectuer" class="update_FAQ_submit" /></div>
				</div>
				<input style="display: none;" class="coche" type="radio" name="id_question" value="0" />
			</form>
	</div>
</div>

<script type="text/javascript" src="components/js/FAQ_update.js"></script>

<?php
    $content = ob_get_clean();
    include ('template.php');
?>