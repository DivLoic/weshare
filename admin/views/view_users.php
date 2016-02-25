<?php
    $title = 'Utilisateurs';
    $style = 'users';
    $menu = 'users';
    ob_start();
?>

<div class="window_dashboard">
	<div class="header_window_dashboard"><h2>Utilisateurs</h2></div>
	
	<div class="content_window_dashboard">
		<div class="select_all"><input type="checkbox" /></div><div class="all_selected">Tout sélectionner/désélectionner</div><div class="search_users"><form action="index.php?target=users" method="post"><input type="text" placeholder="Recherche par pseudo" name="search"/></form></div>
			<form action="index.php?target=users_update" method="post">
				<table style="table-layout:fixed;">
					<?php
						while($user = $users->fetch())
						{
							echo '<tr><td style="width: 5%; text-align: center;"><input type="checkbox" name="'.$user['id'].'" /></td><td style="width: 10%; text-align: center;"><img style="width: 50px; height: 50px; border-radius: 50px;" alt="img_profile" src="../'.$user['url_profile_image'].'" /></td><td style="width: 45%; font-size: 1.3em; text-indent: 1.5em; font-family: \'Biko Bold\';"><a href="index.php?target=users_profile&amp;id_user='.$user['id'].'">'.$user['pseudo'].'</a></td><td style="width: 20%; text-align: center;">'.$user['date_inscription'].'</td><td style="width: 20%; text-align: center;"><div class="'.check_status($user).'">'.check_status($user).'</div></td></tr>';
						}
					?>
				</table>
				
				<div class="user_action">
					<select name="actions">
						<option value="">Actions à effectuer</option>
						<option value="Supprimer">Supprimer</option>
						<option value="Bannir">Bannir</option>
						<option value="Activer">Activer</option>
					</select>
					<input type="submit" value="Supprimer" />
				</div>
				
			</form>
	</div>
</div>

<script type="text/javascript" src="components/js/users.js"></script>

<?php
    $content = ob_get_clean();
    include ('template.php');
?>