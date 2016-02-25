<?php
	$title = 'Demande d\'objets ou de services';
	ob_start();
?>

<div id="content">
	<div class="container">
		
		<?php
			if(ISSET($result))
			{
				if($result == 1)
				{
					echo '<div class="success">Votre demande pour « <span style="color:#666666;">'.$_POST['request'].'</span> » a été prise en compte.<br />Un e-mail vous sera envoyé lorsqu\'une annonce correspondra à votre demande.</div>';
				}
				else
				{
					echo '<div class="failure">Vous avez déjà fait cette demande.</div>';
				}
			}
		?>
		
	</div>	
</div>

<?php
	$content = ob_get_clean();
	include ('template.php');
?>