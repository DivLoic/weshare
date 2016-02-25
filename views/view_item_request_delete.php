<?php
	$title = 'Suppression d\'une demande';
	ob_start();
?>

<div id="content">
	<div class="container">
		
		<?php
			if(ISSET($result))
			{
				if($result == 1)
				{
					echo '<div class="success">Votre demande a bien été supprimée !</div>';
				}
				else
				{
					echo '<div class="failure">Impossible de supprimez votre demande</div>';
				}
			}
		?>
		
	</div>	
</div>

<?php
	$content = ob_get_clean();
	include ('template.php');
?>