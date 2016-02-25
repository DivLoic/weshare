<?php
	$title = 'Contact';
	ob_start();
?>

<div id="content">
	<div class="container">
		
		
		<?php
			if(ISSET($result))
			{
				if($result == 1)
				{
					echo '<div class="success">Le message a été envoyé avec succès ! Le support tâchera de vous répondre au plus vite sur votre adresse e-mail.</div>';
				}
				else
				{
					echo '<div class="failure">Échec de l\'envoi du message..</div>';
				}
			}
		?>
		
	</div>	
</div>

<?php
	$content = ob_get_clean();
	include ('template.php');
?>