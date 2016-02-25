<?php
	$title = 'Accueil';
	$style = 'index';
	ob_start();
?>

<div id="content">
	<div class="container">
		
		<nav id="items_menu">
			<ul id="items_menu_content">
				<?php menu_auto(); ?>
			</ul>
		</nav>
		<?php $id_path=remind_url();  /*renseignons nous sur notre url*/
		
			if($search_avdanced== 1){$nb=gallery_av();}else{$nb=gallery();}
			$nb_all = $nb->fetchAll();
			
		if(isset($_GET['recherche']) AND count($nb_all)>0)
		{
			echo '<p id="selection_criteria">';
			echo '<a href="index.php?order=1">Pertinent</a>';
			echo ' | ';
			echo '<a href="index.php?order=2">Récent</a>';
			echo ' | ';
			echo '<a href="';if(isset($_SESSION['visited'])){echo'index.php?visited=1';}else{echo'index.php?visited=2';}echo'">Récemment consultés</a></p>';
		}
		else if(ISSET($_GET['order']) AND count($nb_all)>0)
		{
			echo '<p id="selection_criteria">';
			if($_GET['order']!=1){echo '<a href="'.$id_path.''.$var_url.'order=1">Pertinent</a>';}else{echo '<span class="criteria_active">Pertinent</span>';}
			echo ' | ';
			if($_GET['order']!=2){echo '<a href="'.$id_path.''.$var_url.'order=2">Récent</a>';}else{echo '<span class="criteria_active">Récent</span>';}
			echo ' | ';
			echo '<a href="';if(isset($_SESSION['visited'])){echo'index.php?visited=1';}else{echo'index.php?visited=2';}echo'">Récemment consultés</a></p>';
		}
		else if(ISSET($_GET['visited']) AND count($nb_all)>0)
		{
			echo '<p id="selection_criteria">';
			echo '<a href="index.php?order=1">Pertinent</a>';
			echo ' | ';
			echo '<a href="index.php?order=2">Récent</a>';
			echo ' | ';
			echo '<span class="criteria_active">Récemment consultés</span></p>';	
		}
		elseif(count($nb_all)>0)
		{
			echo '<p id="selection_criteria"><span class="criteria_active">Pertinent</span> | <a href="'.$id_path.''.$var_url.'order=2">Récent</a> | <a href="';if(isset($_SESSION['visited'])){echo'index.php?visited=1';}else{echo'index.php?visited=2';}echo'">Récemment consultés</a></p>';
		}
		?>
		<div class="path_explore">
			<?php
				if(ISSET($_GET['rubrique']) AND count($nb_all)>0)
				{
					$rub = get_rub();
					echo '<a href="index.php">Accueil</a> / <span class="path_in">'.$rub['rubrique'].'</span>';
				}
				elseif(ISSET($_GET['categorie']) AND count($nb_all)>0)
				{
					$cat = get_cat();
					echo '<a href="index.php">Accueil</a> / <a href="index.php?rubrique='.$cat['id_rubrique'].'">'.$cat['rubrique'].'</a> / <span class="path_in">'.$cat['categorie'].'</span>';
				}
				elseif(ISSET($_GET['sous_categorie']) AND count($nb_all)>0)
				{
					$sous_cat = get_sous_cat();
					echo '<a href="index.php">Accueil</a> / <a href="index.php?rubrique='.$sous_cat['id_rubrique'].'">'.$sous_cat['rubrique'].'</a> / <a href="index.php?categorie='.$sous_cat['id_categorie'].'">'.$sous_cat['categorie'].'</a> / <span class="path_in">'.$sous_cat['sous_categorie'].'</span>';
				}
				else
				{
					echo '<span class="path_hide">/</span>';
				}
			?>
		</div>
		
		<div id="gallery">
			<?php
			
			if(count($nb_all)>0)
			{
				$cmt = 4; /*compteur d'annonces*/
				if($search_avdanced== 1){$peche=gallery_av();}else{$peche=gallery();} /*on va pêcher les annonces*/
				while($annonce= $peche->fetch()) /*pour chaque anonces...*/
				{
					$rub_head= headband($annonce['id']);/* on cherche sa catégorie son nom et son image*/
					echo'<div id="'.$annonce['id'].'" class="item';if($cmt ==4){echo' item_first';$cmt=1;} else{$cmt++;} echo'"><div class="headband"><p class="rub_headband">'.$rub_head['rubrique'].'</p></div><a href="#"><img class="item_img" src="'.$annonce['image'].'" alt="'.$annonce['titre'].'"/></a><div class="item_type"><p><a href="index.php?categorie='.$rub_head['idc'].'">'.$rub_head['categorie'].'</a>';if($rub_head['sous_categorie'] != NULL){echo' / ';} echo'<a href="index.php?sous_categorie='.$rub_head['ids'].'">'.$rub_head['sous_categorie'].'</a></p></div><a href="#" class="item_description">'.$annonce['titre'].'</a></div>';
				}
			}
			elseif(ISSET($_GET['recherche']))
			{
				echo '<div class="no_result">Aucun résultat pour la recherche<br />« <span style="color:#666666;">'.htmlspecialchars($_GET['recherche']).'</span> »</div>';
			}
			else
			{
				echo '<div class="no_result">Aucun resultat.</div>';
			}
			?>
		</div>
	</div>	
</div>

<?php include ('views/view_modal_item.php'); ?>

<script type="text/javascript" src="components/js/index_item.js"></script>

<?php
	$content = ob_get_clean();
	include ('template.php');
?>