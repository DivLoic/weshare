<?php session_start(); ?>

<?php
	require('bdd_connexion.php');
	
	function get_messages($id_annonce)
	{
		global $bdd;
		$req = $bdd->prepare('SELECT chat.message AS message, DATE_FORMAT(chat.date, \'%e/%c/%y\') AS date, DATE_FORMAT(chat.date, \'%Y%m%D\') AS date_calcul, DATE_FORMAT(chat.date, \'%H:%i\') AS temps, utilisateur.pseudo AS pseudo, utilisateur.url_profile_image AS photo FROM chat LEFT JOIN utilisateur ON utilisateur.pseudo = chat.pseudo WHERE id_annonce = ? ORDER BY date');
		$req->execute(array($id_annonce));
		return $req;
	}
	
	function send_message($pseudo,$message,$id_annonce)
	{
		global $bdd;
		$req = $bdd->prepare('INSERT INTO chat(pseudo, message, date, id_annonce) VALUES(?, ?, NOW(),?)');
		$req->execute(array($pseudo,htmlspecialchars($message),$id_annonce));
	}
	
	
	function user_write($pseudo,$id_annonce)
	{
		global $bdd;
		
		$req = $bdd->prepare('UPDATE chat_ecriture SET ecriture = 1 WHERE pseudo = ? AND id_annonce = ?');
		$req->execute(array($pseudo,$id_annonce));
	}
	
	function user_no_write($pseudo,$id_annonce)
	{
		global $bdd;
		
		$req = $bdd->prepare('UPDATE chat_ecriture SET ecriture = 0 WHERE pseudo = ? AND id_annonce = ?');
		$req->execute(array($pseudo,$id_annonce));
	}
	
	function check_users_write($pseudo,$id_annonce)
	{
		global $bdd;
		
		$req = $bdd->prepare('SELECT utilisateur.url_profile_image AS photo FROM chat_ecriture INNER JOIN utilisateur ON chat_ecriture.pseudo = utilisateur.pseudo WHERE chat_ecriture.ecriture = 1 AND chat_ecriture.pseudo != ? AND chat_ecriture.id_annonce = ?');
		$req->execute(array($pseudo,$id_annonce));
		
		return $req;
	}
?>



	
<?php
	
	if(ISSET($_GET['check_write']) AND ISSET($_SESSION['pseudo']))
	{
		if($_GET['check_write'] == 1)
		{
			user_write($_SESSION['pseudo'],$_GET['id_annonce']);
		}
		else
		{
			user_no_write($_SESSION['pseudo'],$_GET['id_annonce']);
		}
	}
	
	
	
	$check_users_write = check_users_write($_SESSION['pseudo'],$_GET['id_annonce']);
	
	
	
	if(ISSET($_SESSION['pseudo']) AND ISSET($_POST['message']) AND ISSET($_POST['id_annonce']))
	{
		send_message($_SESSION['pseudo'],$_POST['message'],$_POST['id_annonce']);
	}
	
	$get_messages = get_messages($_GET['id_annonce']);
	
	function print_date($date_message,$date)
	{
		$result = $date_message-date('Ymd');
		
		if($result == 0)
		{
			echo 'aujourd\'hui';
		}
		elseif($result == -1)
		{
			echo 'hier';
		}
		elseif($result == -2)
		{
			echo 'avant-hier';
		}
		else
		{
			echo $date;
		}
	}
?>

	
	

<?php
	while($messages = $get_messages->fetch())
	{
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
	
	if(ISSET($check_users_write))
	{
		while($messages = $check_users_write->fetch())
		{
		?>
			<div class="message">
				<img src="<?php echo $messages['photo']; ?>" alt="photo_profil" />
				<div class="bubble_message">. . .</div>
			</div>
		<?php
		}
	}
?>