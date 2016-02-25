<?php
    require('../models/bdd_connexion.php');
	
	function menu_auto()
	{
		$rub_ul = false;
		$cat_ul = false;
		$first_rubrique = true;
		$last_rubrique = 1;
		$last_li_rubrique = 1;
		$last_li_bis_rubrique = 1;

		global $bdd;

		$reply_rub = $bdd->query('SELECT id AS id_rub, nom AS rubrique FROM rubrique');

		while($data = $reply_rub->fetch())
		{
				$reply_ul = $bdd->prepare('SELECT COUNT(*) AS nb FROM rubrique LEFT JOIN categorie ON rubrique.id = categorie.id_rubrique WHERE rubrique.id = ? AND categorie.id IS NOT NULL');
				$reply_ul->execute(array($data['id_rub']));
		
				$data_ul = $reply_ul->fetch();

			echo '<li';
			if($last_li_bis_rubrique == 3){ echo ' class="items_menu_last_li"'; $last_li_bis_rubrique++; }else{$last_li_bis_rubrique++;}
			if($last_li_rubrique == 4){ echo ' class="items_menu_last_li"'; $last_li_rubrique++; }else{$last_li_rubrique++;}
			echo '><a href="';
			echo '#"';
			if($first_rubrique == true){ echo ' class="items_menu_first"'; $first_rubrique = false; }
			if($last_rubrique == 4){ echo ' class="items_menu_last"'; $last_rubrique++; }else{$last_rubrique++;}
			echo'>'.$data['rubrique'].'</a>';
			if($data_ul['nb'] > 0){echo '<ul>'; $rub_ul = true;}
		
			$reply_cat = $bdd->prepare('SELECT categorie.id AS id_cat, categorie.nom AS categorie FROM rubrique LEFT JOIN categorie ON rubrique.id = categorie.id_rubrique WHERE rubrique.id = ? AND categorie.id IS NOT NULL ORDER BY categorie.nom');
			$reply_cat->execute(array($data['id_rub']));
		
			while($data = $reply_cat->fetch())
			{
					$reply_ul = $bdd->prepare('SELECT COUNT(*) AS nb FROM categorie LEFT JOIN sous_categorie ON categorie.id = sous_categorie.id_categorie WHERE categorie.id = ? AND sous_categorie.id IS NOT NULL');
					$reply_ul->execute(array($data['id_cat']));
		
					$data_ul = $reply_ul->fetch();
				
				if($data_ul['nb'] > 0){echo '<li><a href="#" class="items_menu_plus">'.$data['categorie'].'</a><ul>'; $cat_ul = true;} else{echo '<li><a href="#">'.$data['categorie'].'</a>';}
			
				$reply_sous_cat = $bdd->prepare('SELECT sous_categorie.id AS id_sous_cat, sous_categorie.nom AS sous_categorie FROM categorie LEFT JOIN sous_categorie ON categorie.id = sous_categorie.id_categorie WHERE categorie.id = ? AND sous_categorie.id IS NOT NULL ORDER BY sous_categorie.nom');
				$reply_sous_cat->execute(array($data['id_cat']));
			
				while($data = $reply_sous_cat->fetch())
				{
					echo '<li><a href="#">'.$data['sous_categorie'].'</a></li>';
				}
			
				$reply_sous_cat->closeCursor();
			
				if($cat_ul == true){echo '</ul>'; $cat_ul = false;}
				echo '</li>';
			
			}
		
			$reply_cat->closeCursor();
		
			if($rub_ul == true){echo '</ul>'; $rub_ul = false;}
			echo '</li>';
		
		}

		$reply_rub->closeCursor();
	}







	function selector_rub()
    {
    	global $bdd;
    	
    	$reponse = $bdd->query('SELECT id AS id_rubrique, nom FROM rubrique');
	
		return $reponse;
    }  
?>