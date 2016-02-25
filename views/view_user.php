<?php
    $title = 'Utilisateur';
    $style = 'user';
    ob_start();
?>

<div id="content">
    <div class="container">
			<div class="user_card">
						<div class="user_info">
							<div class="user_info_left">
								<h4 class="user_name"><?php echo $profil['pseudo']; ?></h4>
								<div class="score">Score : <?php echo $profil['score']; ?> pts</div>
							</div>
							<div class="user_info_right">
								<p class="user_details"><span style="color: rgba(255,255,255,0.6);">Inscrit le : </span><?php echo $profil['date']; if($profil['code_postal'] != NULL){echo'<br /> <span style="color: rgba(255,255,255,0.6);">Code postal: </span>'.$profil['code_postal'].'';}?> </p>
							</div>
						</div>
				<?php if ($mark['COUNT(*)'] !=0){echo'<span id="mark" >'.$mark['moyenne'].'</span>';}?>
				<img src="<?php echo $profil['url_profile_image']?>" alt="Utilisateyr weshare" />
			</div>
			<nav id="user_description" <?php if($after_comment==1){echo'class="after_comment"';} else if(isset($_GET['itemof'])){echo'class="itemof"';} else {echo'class="of_null"';}?>>
            <ul>
                <li><button id="navone" class="active">À propos</button><button id="navtwo">Livre d'or</button></li><li><button id="navtree">Ses annonces</button></li>
            </ul>
			</nav>
            <div id="self_comment_items">
				<div id="self">
						<?php
						if($profil['ma_description'] == NULL)
						{
							echo'<div class="my_item_empty">Aucune description.</div>';
						}
						else
						{
							echo'<div class="self_in"><p>'.$profil['ma_description'].'</p></div>';
						}
						?>
				</div>
				<div id="comment">
					<div class="add_mark">
						<?php 
							if (isset($_SESSION['id']))
							{
								if($_SESSION['id'] == $_GET['profil'])
								{
									echo'<p> Vous avez été noté par '.$mark['COUNT(*)'].' personne(s)</P>';
								}
								elseif($rate['COUNT(*)'] == 0)
								{
									if($mark['COUNT(*)']==0)
									{
										echo'<p> Prêtez, échangez, partagez, <br/> et soyez le premier à noter '.$profil['pseudo'].'</p>
										<form action="index.php?target=user&amp;profil='.$idp.'" method="post">
											<select name="note">
												<option value="1">1</option>
												<option value="2">2</option>
												<option value="3">3</option>
												<option value="4">4</option>
												<option value="5">5</option>
											</select>
											<input type="submit" value="Noter" />
										</form>';
									
									}
									else
									{
										echo'<p>'.$profil['pseudo'].' a une note de '.$mark['moyenne'].'/5 pour '.$mark['COUNT(*)'].' avis <br/>Vous aussi, notez '.$profil['pseudo'].'</p>
										<form action="index.php?target=user&amp;profil='.$idp.'" method="post">
											<select name="note">
												<option value="1">1</option>
												<option value="2">2</option>
												<option value="3">3</option>
												<option value="4">4</option>
												<option value="5">5</option>
											</select>
											<input type="submit" value="Noter" />
										</form>';
									}
								}
								else 
								{
								echo '<p> Vous avez donné à '.$profil['pseudo'].' '.$rate['note'].'/5<br/> il est noté par '.$mark['COUNT(*)'].' personne(s).</p>';
								}
							}
							else
							{
								if ($mark['COUNT(*)'] !=0){echo'<p>'.$profil['pseudo'].' a une note de <span style="font-family:\'Biko Bold\'; color:#34b1bc;">'.$mark['moyenne'].' / 5</span> pour '.$mark['COUNT(*)'].' avis <br/>Vous aussi, <a href="#" onclick="launch_modal_window(); return false;">inscrivez-vous</a> ou <a href="#">connectez-vous</a> pour le noter.</p>';}
								else{echo'<p>'.$profil['pseudo'].' n\'a pas encore de note <br/> <a href="#" onclick="launch_modal_window(); return false;">inscrivez-vous</a> ou <a href="#">connectez-vous</a> pour le noter.</p>';}
							}
					?>
					</div>
					<div <?php if(ISSET($_SESSION['pseudo'])){echo'id="connected"';} else{echo'id="not_connected"';}?>  class="add_comment "><button id="add_comment_button" type="button" class="button_basis button_add">Ajouter un commentaire</button><p id="alert_message"><a href="" onclick="launch_modal_window(); return false;">Inscrivez-vous</a> ou <a href="#">connectez-vous</a>.</p></div>
					<div id="input_comment">
					<div  id="add_comment_zone" class="comment_in">
						 
						 <?php
						if(ISSET($_SESSION['pseudo']))
						{ 
							echo'<img src="'.$my_pic.'" alt="votre_photo" />';
						}
						else
						{ 
							echo'<img src="#" alt="photo" />';
						}
						?>
						
						<form action="index.php?target=user&amp;profil=<?php echo $idp; ?>" method="post">	
							<textarea  rows="4" name="commentaire" placeholder="Exprimez-vous."></textarea>
							<input type="submit" id="send_comment_submit" value="Valider"/>
						</form>
					</div>
					</div>
					<div class="mark_comment"><?php
						$testcom=test_com_content($_GET['profil']);
						if ( $testcom == 0)
						{
							echo'<div class="my_item_empty">Pas de commentaire.</div>';
						}
						else
						{
							while($com=$comment->fetch())
							{
							echo'<div class="comment_in"><a href="index.php?target=user&profil='.$com['link_id'].'"><img src="'.$com['avatar'].'" alt="utilisateur weshare" /></a><div class="autor_comment"><a href="index.php?target=user&profil='.$com['link_id'].'">'.$com['pseudo'].'</a></div><div class="text_comment">'.$com['contenu'].'</div><div class="date_comment">'.$com['date'].'</div></div>';
							}
												
						}
						?>
					</div>
				</div>
				<div id="items">
					<?php
					$testit=test_item_content($_GET['profil']);
					if($testit == 0)
					{
						echo'<div class="my_item_empty">Aucune annonce.</div>';
					}
					else
					{
						while($it=$item->fetch())
						{
						echo'<div class="item_in"><a href="index.php?target=item&amp;item_id='.$it['id'].'"><img src="'.$it['url_image'].'" alt="annonce" /></a><div class="where_item">'.$it['vu'].' vues<br />'.$it['rub'].'</div><div class="title_item"><a href="index.php?target=item&amp;item_id='.$it['id'].'">'.$it['titre'].'</a></div><div class="date_item">'.$it['date'].'</div><div class="delete_update_item"></div></div>';
						}
					}
					?>

				</div>
			</div>
			

    </div>
</div>

<script type="text/javascript" src="components/js/user.js"></script>

<?php
    $content = ob_get_clean();
    include ('template.php');
?>