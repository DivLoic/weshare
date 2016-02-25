<?php
	$title = 'Inscription';
	ob_start();
?>

<div id="content">
	<div class="container">
		
		<?php
			if($result == 1)
			{
				echo '<div class="success">Félicitation, vous êtes bien inscrit !<br />Un mail de confirmation vous a été envoyé.</div>';
			}
			else
			{
				echo '<div class="failure">Désolé. Une erreur s\'est produite, veuillez <a href="" onclick="launch_modal_window(); return false;">réessayer</a>.</div>';
			}
		?>
		
	</div>	
</div>

<?php
	$content = ob_get_clean();
	include ('template.php');
?>