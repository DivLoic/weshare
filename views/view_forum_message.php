<?php
    $title = 'Forum';
    $style = 'forum_message';
    ob_start();
?>
 
<div id="content">
    <div class="container">
    	
    	<div id="forum">
    	
     		<div id="block_button">
     			<a href="<?php if(ISSET($_SESSION['id'])) { echo '#answer'; } else { echo '#'; }?>" class="button_add">Répondre</a>
     			<div id="topic_connexion"><a href="" onclick="launch_modal_window(); return false;">Inscrivez-vous</a> ou <a href="#">connectez-vous</a>.</div>
     		</div>
    		
			<div class="topic_header">Topic n° <?php echo $topic['id']; ?></div>
			<div class="go_back"><a href="index.php?target=forum">Retour au forum</a></div>
			<div class="topic_title">
				<?php echo $topic['titre']; ?><br />
				<span class="topic_date"><?php echo $topic['date'].' | '.$topic['type']; ?></span>
			</div>

			<table>
				<tr>
					<td class="author">
						<img src="<?php echo $topic['image']; ?>" alt="image_profil" />
						<div class="author_information">
							<span class="pseudo"><a href="index.php?target=user&amp;profil=<?php echo $topic['id_user']; ?>"><?php echo $topic['pseudo']; ?></a></span><br />
							<?php echo get_nb_message($topic['pseudo']);?> message<?php if(get_nb_message($topic['pseudo']) > 1) { echo 's';} ?>
						</div>
					</td>
					
					<td class="message">
						<div class="bubble_message">
							
							<div class="date_message"><?php echo $topic['date_small']; ?> :</div>
							
							<div class="contenu_message"><?php echo nl2br($topic['contenu']); ?></div>
							
						</div>
					</td>
				</tr>
				
				<?php
				while($message = $messages->fetch())
				{
				?>
				<tr>
					<td class="author">
						<img src="<?php echo $message['image']; ?>" alt="image_profil" />
						<div class="author_information">
							<span class="pseudo"><a href="index.php?target=user&amp;profil=<?php echo $message['id_user']; ?>"><?php echo $message['pseudo']; ?></a></span><br />
							<?php echo get_nb_message($message['pseudo']);?> message<?php if(get_nb_message($message['pseudo']) > 1) { echo 's';} ?>
						</div>
					</td>
					
					<td class="message_user">
						<div class="bubble_message_user">
						
							<div class="date_message"><?php echo $message['date']; ?> :</div>
							
							<div class="contenu_message">
								<?php echo nl2br($message['contenu']); ?>
							</div>

						</div>
					</td>
				</tr>
				<?php
				}
				?>
			</table>

		
			<div class="window_dashboard" id="answer">
				<div class="header_window_dashboard"><h2>Répondre au topic</h2></div>
	
				<div class="content_window_dashboard">
					<form action="index.php?target=add_message" method="post">
						<textarea class="message_topic" name="contenu"></textarea>
						<input type="hidden" value="<?php echo $_GET['id_topic']; ?>" name="id_topic" />
						<input type="reset" class="cancel" value="Annuler" /><input type="submit" class="valid" value="Répondre" />
					</form>
				</div>
			</div>
    	
    	</div>
    	
    </div>
</div>

<script type="text/javascript" src="components/js/message.js"></script>
 
<?php
    $content = ob_get_clean();
    include ('template.php');
?>
    
    		
