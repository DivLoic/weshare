<?php
    $title = 'Discussions';
    $style = 'chat';
    ob_start();
?>
 
<div id="content">
    <div class="container">
        <nav id="profile_menu">
            <ul>
                <li><a href="index.php?target=profile">Mon profil</a></li><li><a href="index.php?target=my_items" >Mes annonces</a></li><li><a href="index.php?target=deal" id="active">Transactions en cours</a></li>
            </ul>
        </nav>

        <div id="my_items" <?php echo'class="'.$_GET['chat_id'].'"'; ?>>
					

			<h2 style="margin-top: 20px;">Étape 1</h2>
			
			<div id="users_transaction">
			
				<?php $item= item_all($_GET['chat_id']); $seller = character($user['id_utilisateur']); $receiver = character($user['id_acquereur']); ?>
			
				<div class="life_bar">
					<div class="seller_bar"><img src="<?php echo $seller['url_profile_image'];?>" class="profile_photo" alt="votre photo de profil" /><div class="seller_bar_info_line"></div><div class="seller_bar_info"><a href="index.php?target=user&amp;profil=<?php echo $seller['id']; ?>"><?php echo $seller['pseudo'];?></a><br /><div class="score">score: <?php echo $seller['score'];?> pts</div></div></div>
					<div class="line_vertical"></div>
				</div>
			
				
			
				<div class="item_in">
						<img src="<?php echo $item['url_image'];?>" alt=""/>
					<div class="view_item"><?php echo $item['nomr'].'<br />'.$item['nomc'].'<br />'.$item['nomsc'];?>
					</div>
					<div class="title_item"><?php echo $item['titre'];?></div>
					<div class="date_item">
					<span style="color:#808080;">Début de la transaction</span><br />
					<?php echo $item['date_acquisition'];?>
					</div>
				</div>
			
				
			
				<div class="life_bar_receiver">
					<div class="line_vertical_receiver"></div>
					<div class="receiver_bar"><div class="receiver_bar_info"><a href="<?php echo'index.php?target=user&amp;profil='.$receiver['id'].'';?>"><?php echo $receiver['pseudo'];?></a><br /><div class="score">score: <?php echo $receiver['score'];?> pts</div></div><div class="receiver_bar_info_line"></div><img src="<?php echo $receiver['url_profile_image'];?>" class="profile_photo" alt="votre photo de profil" /></div>
				</div>
			
			</div>
			
			<h2>Étape 2</h2>
			
			<div class="all_chat">
				<div class="container_chat">
			
					<div id="chat">
						<div id="header_chat"><div id="titre_header_chat"><?php echo $him['pseudo'] ?></div></div>

						<div id="frame_chat">
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
							?>
						</div>

						<div id="footer_chat">
							<form action="#" method="post" id="form_chat"><input type="text" id="input_chat" placeholder="Votre message"/><input type="submit" id="submit_chat" value="Envoyer" /></form>
						</div>
					</div>
			
				</div>
			</div>
			
			
			<h2>Étape 3</h2>
			
			<div class="valid_cancel">					
				<div class="cancel"><a onclick="var check = confirm ('Voulez-vous vraiment annuler cette transaction ?'); if(!check){return false;}" href="index.php?target=confirm&amp;item_id=<?php echo ''.$_GET['chat_id'].''?>&amp;do=0">Annuler la transaction</a></div>
				<?php if($button_validation == 1) { ?><div class="valid"><a onclick="var check = confirm ('Attention, ne confirmez cette annonce que si elle a bien été effectuée.\n\nRappel : pour un échange vous devez attendre la remise au propriétaire.'); if(!check){return false;}" href="index.php?target=confirm&amp;item_id=<?php echo ''.$_GET['chat_id'].''?>&amp;do=1">Confirmer</a></div> <?php } ?>
				<?php if($button_validation == 0) { echo '<div class="block_confirmation"><a onclick="return false;" href="#">Confirmer</a></div>'; } ?>
			</div>
			
				
		</div>
                
    </div>
</div>


<script type="text/javascript" src="components/js/chat.js"></script>

 
<?php
    $content = ob_get_clean();
    include ('template.php');
?>
    
    		
