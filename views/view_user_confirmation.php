<?php
	$title = 'Confirmation';
	ob_start();
?>

<div id="content">
	<div class="container">
		
		<?php
			if($result == 1)
			{
				echo '<div class="success">Votre compte a été confirmé ! Vous pouvez dès à présent vous connecter.</div>';
			}
			else
			{
				echo '<div class="failure">Échec. Impossible de confirmer votre compte.</div>';
			}
		?>
		
	</div>	
</div>

<?php
	$content = ob_get_clean();
	include ('template.php');
?>