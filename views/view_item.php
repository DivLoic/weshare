<?php
    $title = 'Annonce';
    $style = 'item';
    ob_start();
?>
 
<div id="content">
	<div class="container">
		<?php $item = catch_item();?>
		<div id="item_profil">
			<div class="pic"><a href="<?php echo''.$item['image'].'';?>" target="blank"><img src="<?php echo''.$item['image'].'';?>" alt="objet" /></a></div><div id="item_card">
				<div id="item_title"><p class="title"><?php echo''.$item['annonce'].'';?></p></div>
				<div id="contain_tab">
					<table id="item_tab">
						<tr>
							<td class="firt_col">Posté le :</td>
							<td ><?php echo''.$item['date_a'].'';?></td>
						</tr>
						<tr>
							<td class="firt_col">Vue(s) :</td>
							<td><?php echo''.$item['vu'].'';?></td>
						</tr>
						<tr>
							<td class="firt_col">Lieu :</td>
							<td><?php echo''.$item['adr'].'';?></td>
						</tr>
						<tr>
							<td class="firt_col">Rubrique :</td>
							<td><?php echo''.$item['rubrique'].'';?></td>
						</tr>
						<tr>
							<td class="firt_col">Catégorie :</td>
							<td><?php echo''.$item['categorie'].'';?></td>
						</tr>
						<?php if ( $item['sous_categorie'] != NULL)
						{ echo'
						<tr>
							<td class="firt_col">Sous-catégorie :</td>
							<td>'.$item['sous_categorie'].'</td>
						</tr>';
						}
						?>
					</table>
					<div id="action">
						<div id="add"><a href="<?php echo'index.php?target=update_my_box&amp;id_item='.$item['id_annonce'].'';?>">Ajouter au carton</a></div>
					</div>	
				</div>
				<div id="item_user">
					<img src="<?php echo''.$item['avatar'].'';?>" alt="utilisateur"/>
					<div id="arrow"></div>
					<div id="bubble_user">
						<ul>
							<li>Posté par <a href="index.php?target=user&amp;profil=<?php echo $item['id_user'];?>"><?php echo''.$item['speudo'].'';?></a></li>
							<li><a href="index.php?target=user&amp;profil=<?php echo $item['id_user'];?>&amp;itemof#navtree">Ses annonces</a></li>
						</ul>
						<div class="score">Score : <?php echo''.$item['score'].'';?> pts</div>
					</div>
				</div>
			</div>
		</div>
		<nav id="desc_comment">
			<ul>
				<li><a href="#" id="active">Description</a></li>
				<li><a href="#" id="inactive">Commentaires</a></li>
			</ul>
		</nav>
		<div id="comment_description">
			<div id="description">
				<div class="description_in "><?php catch_description ();?></div>
			</div>
			<div id="comment" class="<?php if(isset($after_comment)){if($after_comment== 1){echo'after_comment';}}?>" >
				<div <?php if(ISSET($_SESSION['pseudo'])){echo'id="connected"';} else{echo'id="not_connected"';}?>  class="add_comment "><button id="add_comment_button" type="button" class="button_basis button_add">Ajouter un commentaire</button><p id="alert_message"><a href="" onclick="launch_modal_window(); return false;">Inscrivez-vous</a> ou <a href="#">connectez-vous</a> pour ajouter un commentaire.</p></div>
				<div  id="add_comment_zone" class="comment_in">
					<a href="#">
						<?php if(ISSET($_SESSION['pseudo'])) {$avatar= catch_avatar(); 
						echo'<img id="my_comment_img" src="'.$avatar.'" alt="photo" />';} else { echo'<img src="#" alt="photo" />';}
						?>
					</a>
					<form action="index.php?target=item&amp;item_id=<?php $nid=remember_id();echo''.$nid.'';?>" method="post">	
							<textarea  rows="4" name="commentaire" placeholder="Exprimez-vous."></textarea>
							<input type="submit" id="send_comment_submit" value="Valider"/>
					</form>
					<?php unset($_POST['commentaire']); ?>
				</div>
				<div>
					<?php
					$testcom=test_com_content($_GET['item_id']);
					if ( $testcom == 0)
					{
						echo'<div class="my_item_empty">Pas de commentaire.</div>';
					}
					else
					{
						$comment=catch_comment();
						while($cmt=$comment->fetch())
						{
							echo'<div class="comment_in"><a href="index.php?target=user&amp;profil='.$cmt['id'].'"><img src="'.$cmt['avatar'].'" alt="Utilisateur weshare" /></a><div class="autor_comment"><a href="index.php?target=user&amp;profil='.$cmt['id'].'">'.$cmt['commenteur'].'</a></div><div class="text_comment">'.nl2br($cmt['com']).'</div><div class="date_comment">'.$cmt['date_c'].'</div></div>';
						}
					
					}
					?>
				</div>
			</div>
		</div>
	</div>
</div>

<script type="text/javascript" src="components/js/item.js"></script>

 
<?php
    $content = ob_get_clean();
    include ('template.php');
?>