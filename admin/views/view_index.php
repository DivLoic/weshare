<?php
    $title = 'Accueil';
    $style = 'dashboard';
    $menu = 'dashboard';
    ob_start();
?>

<div class="window_simple_dashboard">
	<div class="content_window_dashboard" style="font-family: 'Biko Bold'; font-size: 1.3em;">
		Bonjour <span style="color:#34b1bc;"><?php if(ISSET($_SESSION['admin'])){ echo $_SESSION['admin']; }?></span>, nous sommes le <span style="color:#34b1bc;"><?php echo $date; ?></span>.
	</div>
</div>


<div class="window_simple_dashboard visit">
	<div class="content_window_dashboard">
		<div class="infos_dash">VISITES<br /><span style="color: #34b1bc"><?php echo $nb_visits; ?></span></div>
	</div>

</div><div class="window_simple_dashboard members">
	<div class="content_window_dashboard">
		<div class="infos_dash">INSCRITS<br /><span style="color: #34b1bc"><?php echo $nb_users; ?></span></div>
	</div>

</div><div class="window_simple_dashboard annonces">
	<div class="content_window_dashboard">
		<div class="infos_dash">ANNONCES<br /><span style="color: #34b1bc"><?php echo $nb_items; ?></span></div>
	</div>
</div>

<div class="window_dashboard">
	<div class="header_window_dashboard"><h2>Mettre le site en maintenance</h2></div>
	
	<div class="content_window_dashboard">
		<div class="maintenance_titre">Site en maintenance : </div>
		<div class="maintenance_action">
		<form action="index.php?target=maintenance_action" method="POST">
			<select name="actions">
				<option value="1" <?php if($maintenance==1){ echo 'selected="selected"'; }?> >Oui</option>
				<option value="0" <?php if($maintenance==0){ echo 'selected="selected"'; }?> >Non</option>
			</select>
			<input type="submit" />
		</form>
		</div>
	</div>
</div>

<div class="window_dashboard">
	<div class="header_window_dashboard"><h2>E-mail du support</h2></div>
	
	<div class="content_window_dashboard">
		<div class="maintenance_titre">Changer l'e-mail du support : </div>
		<form action="index.php?target=email_support_action" method="post" style="display: inline-block;">
			<input class="input_email" type="text" name="email" value="<?php echo $admin_email; ?>" /><input class="input_email_submit" type="submit" value="Modifier" />
		</form>
	</div>
</div>

<div class="window_dashboard">
	<div class="header_window_dashboard"><h2>Dashboard - weshare</h2></div>
	
	<div class="content_window_dashboard">
		Bienvenue sur le Back-office de weshare. C'est à partir de ce panneau de configuration que vous allez pouvoir administrer l'une des plus grandes plateformes d'échange en France !
	</div>
</div>

<script type="text/javascript" src="components/js/index.js"></script>


<?php
    $content = ob_get_clean();
    include ('template.php');
?>