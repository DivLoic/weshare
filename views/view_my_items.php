<?php
    $title = 'Mes annonces';
    $style = 'my_items';
    ob_start();
?>
 
<div id="content">
    <div class="container">
        <nav id="profile_menu">
            <ul>
                <li><a href="index.php?target=profile">Mon profil</a></li><li><a href="index.php?target=my_items" id="active">Mes annonces</a></li><li><a href="index.php?target=deal">Transactions en cours</a></li>
            </ul>
        </nav>
         
        <div id="my_items">
            <div class="add_item"><?php if($nb_items>0){ echo '<h2 id="titre_onglet">Mes annonces</h2>'; } ?><button type="button" id="click_add_item" class="button_basis button_add">Ajouter une annonce</button></div>
			<?php
				if(ISSET($result))
				{
					if($result == 1)
					{
						echo '<div class="success" style="margin: 0 0 20px 0; background-color: #ffffff; text-align: left;">Annonce ajoutée avec succès !</div>';
					}
					elseif($result == 2)
					{
						echo '<div class="failure" style="margin: 0 0 20px 0; background-color: #ffffff; text-align: left;">Le format de l\'image n\'est pas autorisé.</div>';
					}
					elseif($result == 3)
					{
						echo '<div class="failure" style="margin: 0 0 20px 0; background-color: #ffffff; text-align: left;">L\'image dépasse le poids de 3 mo autorisé !</div>';
					}
					else
					{
						echo '<div class="failure" style="margin: 0 0 20px 0; background-color: #ffffff; text-align: left;">Impossible d\'ajouter votre annonce.</div>';
					}
				}

                if($nb_items>0)
                {
                    while($my_items = $req_my_items->fetch())
                    {
                    ?>
                        <div class="item_in"><a href="<?php echo 'index.php?target=item&amp;item_id='.$my_items['id_item']; ?>"><img src="<?php echo $my_items['url_image']; ?>" alt="<?php echo $my_items['titre']; ?>" /></a><div class="where_item"><a href="<?php echo 'index.php?rubrique='.$my_items['id_rub']; ?>"><?php echo $my_items['rubrique']; ?></a><br /><a href="<?php echo 'index.php?categorie='.$my_items['id_cat']; ?>"><?php echo $my_items['categorie']; ?></a><?php if(ISSET($my_items['sous_categorie'])){ echo '<br /><a href="index.php?sous_categorie='.$my_items['id_sous_cat'].'">'.$my_items['sous_categorie'].'</a>';} ?></div><div class="title_item"><a href="<?php echo 'index.php?target=item&amp;item_id='.$my_items['id_item']; ?>"><?php echo $my_items['titre']; ?></a></div><div class="date_item"><?php echo $my_items['date_ajout']; ?></div><div class="delete_update_item"><a href="index.php?target=delete_my_items&amp;id_item=<?php echo $my_items['id_item']; ?>" class="delete_item" onclick="var check = confirm ('Voulez-vous vraiment supprimer l\'annonce :\n<?php echo $my_items['titre']; ?> ?'); if(!check){return false;}"></a></div></div>
                    <?php
                    }
                }
                else
                {
                    if(!ISSET($result))
                    {
                    	echo '<div class="my_item_empty">Aucune annonce.</div>';
                    }
                }
            ?>
        </div>
                
    </div>
</div>

<?php include ('views/view_modal_add_item.php'); ?>

<script type="text/javascript" src="components/js/my_items.js"></script>
 
<?php
    $content = ob_get_clean();
    include ('template.php');
?>
    
    		
