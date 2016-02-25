<?php
    $title = 'Mon carton';
    $style = 'my_box';
    ob_start();
?>
 
<div id="content">
    <div class="container">
    
        <nav id="profile_menu">
            <ul>
                <li><a href="index.php?target=my_box" id="active">Mon carton</a></li>
            </ul>
        </nav>
         
        <div id="my_items" <?php if(isset($_SESSION['id'])){echo'class="ready"';}else{echo'class="not_ready"';}?>>
            <div class="add_item"><?php if(ISSET($_SESSION['my_box'])){ echo '<h2 id="titre_onglet">Mon carton</h2><a href="index.php?target=update_my_box&amp;delete_my_box=on" id="click_add_item" class="button_basis button_add" onclick="var check = confirm (\'Voulez-vous vraiment vider tout votre carton ?\'); if(!check){return false;}" >Vider mon carton</a></div>'; } ?>
            <?php
            	if(ISSET($update_result))
				{
					if($update_result == 1)
					{
						echo '<div class="failure" style="margin: 0 0 20px 0; background-color: #ffffff; text-align: left;">Vous ne pouvez pas ajouter vos propres annonces !</div>';
					}
					else if ($update_result == 2)
					{
						echo '<div class="failure" style="margin: 0 0 20px 0; background-color: #ffffff; text-align: left;">Attention, cette annonce fait déjà partie de vos transactions.</div>';
					}
					else if ($update_result == 3)
					{
						echo '<div class="failure" style="margin: 0 0 20px 0; background-color: #ffffff; text-align: left;">L\'annonce n\'est malheureusement plus présente dans la galerie.</div>';
					}
				}
            
                if(ISSET($_SESSION['my_box']))
                {
                	foreach($_SESSION['my_box'] as $key => $id_item)
                	{
                		$items_my_box = get_items_box($_SESSION['my_box'][$key]);
                    	?>
                        	<div class="item_in"><a href="<?php echo 'index.php?target=item&amp;item_id='.$items_my_box['id_item']; ?>"><img src="<?php echo $items_my_box['url_image']; ?>" alt="<?php echo $items_my_box['titre']; ?>" /></a><div class="where_item"><a href="<?php echo 'index.php?rubrique='.$items_my_box['id_rub']; ?>"><?php echo $items_my_box['rubrique']; ?></a><br /><a href="<?php echo 'index.php?categorie='.$items_my_box['id_cat']; ?>"><?php echo $items_my_box['categorie']; ?></a><?php if(ISSET($items_my_box['sous_categorie'])){ echo '<br /><a href="index.php?sous_categorie='.$items_my_box['id_sous_cat'].'">'.$items_my_box['sous_categorie'].'</a>';} ?></div><div class="title_item"><a href="<?php echo 'index.php?target=item&amp;item_id='.$items_my_box['id_item']; ?>"><?php echo $items_my_box['titre']; ?></a></div><div class="date_item"><a href="index.php?target=user&amp;profil=<?php echo $items_my_box['idu']?>"><?php echo $items_my_box['pseudo']; ?></a></div><div class="delete_update_item"><a href="index.php?target=update_my_box&amp;delete_item=<?php echo $items_my_box['id_item']; ?>" class="delete_item"></a></div></div>
                    	<?php
                    }
                    ?>
                    	<div  class="confirmation_box"><a id="the_button" href="index.php?target=add_deal<?php echo '&amp;nb_box='.count($_SESSION['my_box']); ?>" class="button_basis button_confirm" onclick="var check = confirm ('Voulez-vous confirmer votre commande ?'); if(!check){return false;}" >Confirmer la commande (<?php echo count($_SESSION['my_box']); ?>)</a>
						<p id="the_text" style="color:#e66d75; text-align:right; display:none;"><a style="color:#e66d75;" href="" onclick="launch_modal_window(); return false;">Inscrivez-vous</a> ou <a style="color:#e66d75;" href="#">connectez-vous</a>.</p></div>
					<?php
                }
                else
                {
                    if(!ISSET($update_result)){echo '</div><div class="my_item_empty">Carton vide.</div>';}
                }
            ?>
        </div>
        
    </div>
</div>

	<?php if(!ISSET($_SESSION['id']) AND ISSET($_SESSION['my_box'])){ echo '<script type="text/javascript" src="components/js/my_box.js"></script>'; } ?>
 
<?php
    $content = ob_get_clean();
    include ('template.php');
?>