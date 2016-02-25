<?php
	$title = 'Mot de passe réinitialisé !';
	ob_start();
?>

<div id="content">
	<div class="container">
		
		<div class="success">Un nouveau mot de passe vous a été envoyé par email !</div>
		
	</div>	
</div>

<?php
	$content = ob_get_clean();
	include ('template.php');
?>