<header>
	<nav id="main_menu">
			<div class="container">
				<ul id="main_menu_left">
					<li><a href="index.php">Accueil</a></li><li><a href="index.php?target=forum">Forum</a></li><li><a href="index.php?target=help">Aide</a></li><li><a href="index.php?target=about_us">Qui sommes-nous ?</a></li>
				</ul>
				<ul id="main_menu_right">
					<li><a href="index.php?target=item_request">Demande</a></li><li><a href="index.php?target=my_box">Mon carton<?php if(ISSET($_SESSION['my_box'])){ echo ' ('.count($_SESSION['my_box']).')'; } ?></a></li><li id="click_profil" style="position: relative;"><?php if($notification > 0){ echo '<div class="notification">'.$notification.'</div>'; } ?><a href="index.php?target=profile" id="click_profil_link"><?php echo $_SESSION['pseudo']; ?></a><ul><li><a href="index.php?target=profile">Mon profil</a></li><li><a href="index.php?target=my_items">Mes annonces</a></li><li style="position:relative;"><?php if($notification > 0){ echo '<div class="notification_bis">'.$notification.'</div>'; } ?><a href="index.php?target=deal">Transactions en cours</a></li><li><a href="index.php?target=disconnect">Se déconnecter</a></li></ul></li>
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
		</div>
	</div>
</header>