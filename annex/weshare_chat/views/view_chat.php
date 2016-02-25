<?php
	$title = 'weshare - chat';
	$style = 'chat';
	ob_start();
?>

<div id="chat">
	<div id="header_chat"><div id="titre_header_chat">weshare - chat</div><div id="disconnect_chat"><a href="index.php?target=disconnect">Déconnexion</a></div></div>

	<div id="frame_chat">
		<?php
			while($messages = $get_messages->fetch())
			{
				$messages['message'] = htmlspecialchars($messages['message']);
				$messages['message'] = preg_replace('#http://[a-z0-9\!._/-]+#i', '<a href="$0" target="_blank">$0</a>', $messages['message']);
				
				if($messages['pseudo'] == $_SESSION['pseudo'])
				{
				?>
					<div class="my_message">
						<div class="informations_my_message"><?php print_date($messages['date_calcul'],$messages['date']); ?> | <?php echo $messages['temps']; ?></div>							
						<div class="bubble_my_message"><?php echo $messages['message']; ?></div>
						<img src="<?php echo $messages['photo']; ?>" alt="photo_profil" />
					</div>
				<?php
				}
				else
				{
				?>
				<div class="message">
					<img src="<?php echo $messages['photo']; ?>" alt="photo_profil" />
					<div class="bubble_message"><?php echo $messages['message']; ?></div>
					<div class="informations_message"><?php echo $messages['temps']; ?> | <?php print_date($messages['date_calcul'],$messages['date']); ?></div>
				</div>
				<?php
				}
			}
		?>
	</div>

	<div id="footer_chat">
		<form action="#" method="post" id="form_chat"><input type="text" id="input_chat" placeholder="Votre message"/><input type="submit" id="submit_chat" value="Envoyer" /></form>
	</div>
</div>

<script type="text/javascript" src="components/js/chat.js"></script>

<?php
	$content = ob_get_clean();
	include ('template.php');
?>