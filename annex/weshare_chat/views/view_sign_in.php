<?php
	$title = 'weshare - chat - connexion';
	$style = 'sign_in';
	ob_start();
?>

<div id="sign_in">
	<div id="header_sign_in">Connexion</div>

	<div id="frame_sign_in">
	
		<form action="index.php?target=sign_in" method="post">
			<p><input type="text" name="pseudo" class="input_text_password<?php if($error_sign_in == 1){ echo ' input_error';} ?>" placeholder="pseudo" /></p>
			<p><input type="password" name="password" class="input_text_password<?php if($error_sign_in == 1){ echo ' input_error';} ?>" placeholder="mot de passe" /></p>
			<?php if($error_sign_in == 1){ echo '<p class="sign_in_error">Accès refusé</p>';} ?>
			<p><input type="submit" class="input_submit" value="Se connecter" /></p>
		</form>
		
	</div>
</div>

<?php
	$content = ob_get_clean();
	include ('template.php');
?>