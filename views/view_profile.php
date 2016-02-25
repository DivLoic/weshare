<?php
	$title = 'Profil';
	$style = 'profile';
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
			<div id="account">
				<div id="photo">
					<img src="<?php echo $informations_user['url_profile_image']; ?>" class="profile_photo" alt="votre photo de profil" />
					<div id="change_photo"><div id="launch_img">Modifier</div></div>
					<form action="index.php?target=update_profile" method="post" enctype="multipart/form-data">
						<input type="file" name="image" onchange="this.form.submit();" id="input_img_profile" />
					</form>
				</div>
				
				<div class="line"></div>
				
				<div id="account_information">
					<p><a class="link" href="index.php?target=user&amp;profil=<?php echo ''.$_SESSION['id'].'';?>"><?php echo $informations_user['pseudo']; ?></a></p>
					<p><?php echo $informations_user['email']; ?><a class="pen" href="index.php?target=profile_email"></a></p>
					<p>•••••••••••••••••<a class="pen" href="index.php?target=profile_password"></a></p>
				</div>
			</div>
			
			<?php
				if(ISSET($update_result))
				{
					if($update_result == 1)
					{
						echo '<div class="success" style="margin: 0 50px; background-color: #ffffff;">Profil mis à jour avec succès !</div>';
					}
					elseif($update_result == 0)
					{
						echo '<div class="failure" style="margin: 0 50px; background-color: #ffffff;">Code postal obligatoire.</div>';
					}
					elseif($update_result == 22)
					{
						echo '<div class="failure" style="margin: 0 50px; background-color: #ffffff;">Date de naissance invalide.</div>';
					}
					elseif($update_result == 2)
					{
						echo '<div class="success" style="margin: 0 50px; background-color: #ffffff;">Photo mise à jour avec succès !</div>';
					}
					elseif($update_result == 3)
					{
						echo '<div class="failure" style="margin: 0 50px; background-color: #ffffff;">Le format de l\'image n\'est pas autorisé.</div>';
					}
					elseif($update_result == 4)
					{
						echo '<div class="failure" style="margin: 0 50px; background-color: #ffffff;">L\'image dépasse le poids de 3 mo autorisé !</div>';
					}
					elseif($update_result == 10)
					{
						echo '<div class="success" style="margin: 0 50px; background-color: #ffffff;">Mot de passe mis à jour avec succès !</div>';
					}
					elseif($update_result == 11)
					{
						echo '<div class="success" style="margin: 0 50px; background-color: #ffffff;">E-mail mis à jour avec succès !</div>';
					}
					else
					{
						echo '<div class="failure" style="margin: 0 50px; background-color: #ffffff;">Impossible de changer votre photo.</div>';
					}
				}
			?>
			
			<?php if(ISSET($_GET['first_connexion'])){ if($_GET['first_connexion'] == 1){ echo '<div class="success" id="first_connexion" style="margin: 0 50px; background-color: #ffffff;">Veuillez compléter votre profil.</div>'; } } ?>
			
			<div id="personal_information">
				<h2>Informations personnelles</h2><div><button type="button" class="button_basis button_modify">Modifier</button></div>
				<div id="content_personal_information">
					<form action="index.php?target=update_profile" method="post" <?php if(ISSET($_GET['first_connexion'])){ if($_GET['first_connexion'] == 1){ echo 'id="first_connexion_form"'; } } ?> >
						<div id="personal_information_input">
							<label>Prénom :</label><input type="text" name="prenom" class="input_profile" spellcheck="false" value="<?php echo $informations_user['prenom']; ?>" readonly="readonly" /><br />
							<label>Nom :</label><input type="text" name="nom" class="input_profile" spellcheck="false" value="<?php echo $informations_user['nom']; ?>" readonly="readonly" /><br />
							<label>Date de naissance :</label><input type="text" name="jour" class="input_profile input_first_small" spellcheck="false" maxlength=2 style="width: 26px;" value="<?php echo $date_de_naissance[2]; ?>" readonly="readonly" />/<input type="text" name="mois" class="input_profile input_small" spellcheck="false" maxlength=2 style="width: 26px;" value="<?php echo $date_de_naissance[1]; ?>" readonly="readonly" />/<input type="text" name="annee" class="input_profile input_small" spellcheck="false" maxlength=4 style="width: 80px;" value="<?php echo $date_de_naissance[0]; ?>" readonly="readonly" /><br />
							<label>Adresse :</label><input type="text" name="adresse" class="input_profile" spellcheck="false" style="width: 530px" value="<?php echo $informations_user['adresse']; ?>" readonly="readonly" /><br />
							<label>Ville :</label><input type="text" name="ville" class="input_profile" spellcheck="false" style="width: 60px" value="Paris" readonly="readonly" /><br />
							<label>Code postal :</label><input type="text" name="code_postal" class="input_profile" spellcheck="false" maxlength=5 style="width: 70px;" value="<?php echo $informations_user['code_postal']; ?>" readonly="readonly" /><br />
							<label>Téléphone :</label><input type="text" name="tel" class="input_profile" style="letter-spacing:2px; width: 150px;" spellcheck="false" maxlength=10 value="<?php echo $informations_user['tel']; ?>" readonly="readonly" /><br />
							<label style="margin-top:13px;">Description :</label><textarea name="description" class="input_description" readonly="readonly"><?php echo $informations_user['description']; ?></textarea>
						</div>
						
						<div id="personal_information_validation">
							<input type="reset" class="button_basis button_validation" value="Annuler" /><input type="submit" class="button_basis button_validation" value="Enregistrer" />
						</div>
						
					</form>
					
				</div>
			</div>
		</div>
	</div>
</div>

<script type="text/javascript" src="components/js/profile.js"></script>

<?php
	$content = ob_get_clean();
	include ('template.php');
?>