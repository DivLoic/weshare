<header>
	<nav id="main_menu">
			<div class="container">
				<ul id="main_menu_left">
					<li><a href="index.php">Accueil</a></li><li><a href="index.php?target=forum">Forum</a></li><li><a href="index.php?target=help">Aide</a></li><li><a href="index.php?target=about_us">Qui sommes-nous ?</a></li>
				</ul>
				<ul id="main_menu_right">
					<li><a href="index.php?target=my_box">Mon carton<?php if(ISSET($_SESSION['my_box'])){ echo ' ('.count($_SESSION['my_box']).')'; } ?></a></li><li><a href="" id="click_inscription">S'inscrire</a></li>
				</ul>
			</div>
			<div class="arrow"></div>
			<div class="arrow_banner"></div>
	</nav>
	
	<div id="banner">
		<div class="container">
			<h1 id="titre_logo">weshare</h1>
			<img src="components/img/logo3hover.svg" alt="logo preload" style="display: none;"/>
			<div id="logo"><a href="index.php"></a></div>
			<form action="index.php?target=sign_in" method="post">
				<div id="connexion">
					<div class="arrow_connexion"></div>
					<input type="text" name="email" class="input_basis input_user" spellcheck="false" placeholder="adresse e-mail" />
					<input type="password" name="mot_de_passe" class="input_basis input_password" placeholder="mot de passe" />
					<?php if(ISSET($_GET['target'])){ echo '<input type="hidden" name="previous_link" value="'.str_replace('&','&amp;',basename($_SERVER['REQUEST_URI'])).'" />'; } ?>
					<p>Veuillez compléter les champs.</p>
					<p>e-mail ou mot de passe incorrect.</p>
					<input type="submit" value="Connexion" class="button_basis button_connexion" />
					<div id="connexion_plus"><a href="index.php?target=password_forget">Mot de passe oublié ?</a></div>
				</div>
			</form>
		</div>
	</div>
</header>