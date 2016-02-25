<?php
	$title = 'Mot de passe oublié ?';
	$style = 'password_forget';
	ob_start();
?>

<div id="content">
	<div class="container">
		
		<div class="window_dashboard">
			<div class="header_window_dashboard"><h2>Mot de passe oublié</h2></div>
	
			<div class="content_window_dashboard">
				
				<p class="enter_forget">Veuillez entrer votre adresse e-mail</p>
				<form action="index.php?target=password_forget" method="post">
					<input type="text" name="email" class="forget_input<?php if($result == 1){echo ' input_error';} ?>" /><input type="submit" class="forget_submit" />
				</form>
				<?php
					if($result == 1)
					{
						echo '<p class="sign_in_error">Aucun compte n\'a été trouvé</p>';
					}
				?>
				
			</div>
		</div>	
		
	</div>	
</div>

<?php
	$content = ob_get_clean();
	include ('template.php');
?>