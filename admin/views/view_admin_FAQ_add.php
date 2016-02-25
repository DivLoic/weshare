<?php
    $title = 'FAQ - Ajouter';
    $style = 'FAQ_add';
    $menu = 'faq';
    ob_start();
?>

<?php
	if(ISSET($result))
	{
		if($result == 'add')
		{
			echo '<div class="success" style="margin: 0;">Ajout effectué avec succès !</div>';
		}
	}
?>

<div class="window_dashboard" style="margin-top:20px;">
	<div class="header_window_dashboard"><h2>Ajouter une question</h2></div>
	
	<div class="content_window_dashboard">
		<form action="index.php?target=FAQ_action" method="post">
			<select id="id_titre_FAQ" name="id_titre_FAQ" >
				<option value="0">Titre FAQ</option>
				<option value="1">I. Mon compte</option>
				<option value="2">II. Les annonces</option>
				<option value="3">III. Mon carton et mes transactions</option>
				<option value="4">IV. Le forum</option>
			</select>
			<div style="margin-top: 20px; text-align: right;"><input class="add_FAQ_input" type="text" name="add_question_input" placeholder="Question ?" /><textarea class="add_FAQ_input" name="add_reponse_input" placeholder="Réponse..." style="height: 150px; resize: vertical;"></textarea>
			<input class="add_FAQ_submit" type="submit" value="Ajouter" /></div>
		</form>
	</div>
</div>

<script type="text/javascript" src="components/js/FAQ_add.js"></script>

<?php
    $content = ob_get_clean();
    include ('template.php');
?>