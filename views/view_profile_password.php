<?php
	$title = 'Profil - Changer son mot de passe';
	$style = 'profile_password';
	ob_start();
?>

<div id="content">
	<div class="container">
		<nav id="profile_menu">
			<ul>
				<li><a href="index.php?target=profile" id="active">Mon profil</a></li><li><a href="index.php?target=my_items">Mes annonces</a></li><li><a href="index.php?target=deal">Transactions en cours</a></li>
			</ul>
		</nav>
		
		<div id="my_profile">
		
			<div class="window_dashboard">
				<div class="header_window_dashboard"><h2>Changer son mot de passe</h2></div>
	
				<div class="content_window_dashboard">
					

						<p class="enter_password">Votre ancien mot de passe</p>
						<form action="index.php?target=profile_password_update" method="post">
							<input type="password" name="old_pass" class="password_input<?php if($result == 1){ echo ' input_error';} ?>" id="old_password" />
						<p class="message_error_first" <?php if($result == 1){ echo 'style="display: block;"';} ?> >mot de passe incorrect</p>
						<p class="message_error_bis">ancien mot de passe obligatoire</p>
						<p class="enter_password">Votre nouveau mot de passe</p>
							<div id="input_password_padlock">
								<button type="button" id="padlock_lock"></button>
								<input type="password" name="new_pass" class="password_input" id="password_input" />
							</div>
							<p class="message_error">au moins 6 caractères, un chiffre et une lettre</p>
						
					
						<div><input type="reset" class="cancel_password" value="Annuler" /><input type="submit" class="submit_password" value="Confirmer" /></div>

						</form>
				</div>
			</div>

		</div>
	</div>
</div>

<script type="text/javascript" src="components/js/profile_password.js"></script>

<?php
	$content = ob_get_clean();
	include ('template.php');
?>