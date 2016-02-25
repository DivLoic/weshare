<?php
	$title = 'Profil - Changer son e-mail';
	$style = 'profile_email';
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
				<div class="header_window_dashboard"><h2>Changer son email</h2></div>
	
				<div class="content_window_dashboard">
					

						<p class="enter_password">Votre mot de passe</p>
						<form action="index.php?target=profile_email_update" method="post">
							<input type="password" name="pass" class="password_input<?php if($result == 1){ echo ' input_error';} ?>" id="old_password" />
						<p class="message_error_first" <?php if($result == 1){ echo 'style="display: block;"';} ?> >mot de passe incorrect</p>
						<p class="message_error_bis">mot de passe obligatoire</p>
						<p class="enter_password">Votre nouvel e-mail</p>
							<input type="text" name="email" class="password_input"  spellcheck="false" id="password_input" />
							<p class="message_error">adresse e-mail invalide</p>
							<p class="message_error_third">adresse e-mail déjà utilisée</p>

						
					
						<div><input type="reset" class="cancel_password" value="Annuler" /><input type="submit" class="submit_password" value="Confirmer" /></div>

						</form>
				</div>
			</div>

		</div>
	</div>
</div>

<script type="text/javascript" src="components/js/profile_email.js"></script>

<?php
	$content = ob_get_clean();
	include ('template.php');
?>