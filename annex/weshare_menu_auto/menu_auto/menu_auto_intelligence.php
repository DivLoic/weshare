<?php

	echo '<ul id="items_menu_content">';
	
	$rub_ul = false;
	$cat_ul = false;
	$first_rubrique = true;

	try
	{
		$bdd = new PDO('mysql:host=localhost;dbname=weshare', 'root', 'root');
		$bdd->exec("SET CHARACTER SET utf8");
	}
	catch (Exception $e)
	{
			die('Erreur : ' . $e->getMessage());
	}

	$reply_rub = $bdd->query('SELECT id AS id_rub, nom AS rubrique FROM rubrique');

	while($data = $reply_rub->fetch())
	{
			$reply_ul = $bdd->prepare('SELECT COUNT(*) AS nb FROM rubrique LEFT JOIN categorie ON rubrique.id = categorie.id_rubrique WHERE rubrique.id = ? AND categorie.id IS NOT NULL');
			$reply_ul->execute(array($data['id_rub']));
		
			$data_ul = $reply_ul->fetch();

		echo '<li><a href="';
		echo 'index.php?rubrique='.$data['id_rub'].'"';
		if($first_rubrique == true){ echo ' class="items_menu_first"'; $first_rubrique = false; }
		echo'>'.$data['rubrique'].'</a>';
		if($data_ul['nb'] > 0){echo '<ul>'; $rub_ul = true;}
		
		$reply_cat = $bdd->prepare('SELECT categorie.id AS id_cat, categorie.nom AS categorie FROM rubrique LEFT JOIN categorie ON rubrique.id = categorie.id_rubrique WHERE rubrique.id = ? AND categorie.id IS NOT NULL');
		$reply_cat->execute(array($data['id_rub']));
		
		while($data = $reply_cat->fetch())
		{
				$reply_ul = $bdd->prepare('SELECT COUNT(*) AS nb FROM categorie LEFT JOIN sous_categorie ON categorie.id = sous_categorie.id_categorie WHERE categorie.id = ? AND sous_categorie.id IS NOT NULL');
				$reply_ul->execute(array($data['id_cat']));
		
				$data_ul = $reply_ul->fetch();
				
			if($data_ul['nb'] > 0){echo '<li><a href="index.php?categorie='.$data['id_cat'].'" class="items_menu_plus">'.$data['categorie'].'</a><ul>'; $cat_ul = true;} else{echo '<li><a href="index.php?categorie='.$data['id_cat'].'">'.$data['categorie'].'</a>';}
			
			$reply_sous_cat = $bdd->prepare('SELECT sous_categorie.id AS id_sous_cat, sous_categorie.nom AS sous_categorie FROM categorie LEFT JOIN sous_categorie ON categorie.id = sous_categorie.id_categorie WHERE categorie.id = ? AND sous_categorie.id IS NOT NULL');
			$reply_sous_cat->execute(array($data['id_cat']));
			
			while($data = $reply_sous_cat->fetch())
			{
				echo '<li><a href="index.php?sous_categorie='.$data['id_sous_cat'].'">'.$data['sous_categorie'].'</a></li>';
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
	
	echo '<li><div class="items_menu_last"><form action="#" method="post"><input type="text" class="input_search"/><input type="submit" value="" class="button_search" /></form></div><ul class="items_menu_content_search"><li><a href="#">Recherche avancée</a></li></ul></li></ul>';
?>