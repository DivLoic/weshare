<?php
    $title = 'Profil de '.$user['pseudo'];
    $style = 'users_profile';
    $menu = 'users';
    ob_start();
?>

<div class="window_dashboard">
	<div class="header_window_dashboard"><h2>Profil de <?php echo $user['pseudo']; ?></h2></div>
	
	<div class="content_window_dashboard">

		<div id="account">
			<div id="photo">
				<img src="../<?php echo $user['image']; ?>" class="profile_photo" alt="votre photo de profil" />
			</div>
			
			<div id="account_information">
				<p><?php echo $user['pseudo']; ?></p>
				<p><?php echo $user['email']; ?></p>
				<p><?php echo $user['date_inscription']; ?><span style="color:#666666; opacity: 0.5;"> (Inscription)</span></p>
			</div>
		</div>

		<div id="personal_information">
			<div class="information_user">Prénom :</div><span class="value_info"><?php echo $user['prenom']; ?></span><br />
			<div class="information_user">Nom :</div><span class="value_info"><?php echo $user['nom']; ?></span><br />
			<div class="information_user">Date de naissance :</div><span class="value_info"><?php echo $user['date_naissance']; ?></span><br />
			<div class="information_user">Adresse :</div><span class="value_info"><?php echo $user['adresse']; ?></span><br />
			<div class="information_user">Ville :</div><span class="value_info">Paris</span><br />
			<div class="information_user">Code postal :</div><span class="value_info"><?php echo $user['code_postal']; ?></span><br />
			<div class="information_user">Téléphone :</div><span class="value_info"><?php echo $user['tel']; ?></span>
		</div>

	</div>
</div>


<?php
    $content = ob_get_clean();
    include ('template.php');
?>