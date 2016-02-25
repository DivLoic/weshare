<?php
	require('models/bdd_connexion.php');
	
	function menu_auto()
	{
		$rub_ul = false;
		$cat_ul = false;
		$first_rubrique = true;

		global $bdd;

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
		
			$reply_cat = $bdd->prepare('SELECT categorie.id AS id_cat, categorie.nom AS categorie FROM rubrique LEFT JOIN categorie ON rubrique.id = categorie.id_rubrique WHERE rubrique.id = ? AND categorie.id IS NOT NULL AND categorie.id IN (SELECT id_categorie FROM annonce WHERE visible = 0) ORDER BY categorie.nom');
			$reply_cat->execute(array($data['id_rub']));
		
			while($data = $reply_cat->fetch())
			{
					$reply_ul = $bdd->prepare('SELECT COUNT(*) AS nb FROM categorie LEFT JOIN sous_categorie ON categorie.id = sous_categorie.id_categorie WHERE categorie.id = ? AND sous_categorie.id IS NOT NULL');
					$reply_ul->execute(array($data['id_cat']));
		
					$data_ul = $reply_ul->fetch();
				
				if($data_ul['nb'] > 0){echo '<li><a href="index.php?categorie='.$data['id_cat'].'" class="items_menu_plus">'.$data['categorie'].'</a><ul>'; $cat_ul = true;} else{echo '<li><a href="index.php?categorie='.$data['id_cat'].'">'.$data['categorie'].'</a>';}
			
				$reply_sous_cat = $bdd->prepare('SELECT sous_categorie.id AS id_sous_cat, sous_categorie.nom AS sous_categorie FROM categorie LEFT JOIN sous_categorie ON categorie.id = sous_categorie.id_categorie WHERE categorie.id = ? AND sous_categorie.id IS NOT NULL AND sous_categorie.id IN (SELECT id_sous_categorie FROM annonce WHERE visible = 0) ORDER BY sous_categorie.nom');
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
	
		echo '<li><div class="items_menu_last"><form action="index.php" method="GET" ><input name="recherche" type="text" class="input_search"/><input type="submit" value="" class="button_search" /></form></div><ul class="items_menu_content_search"><li><a href="index.php?target=search_advanced_selector">Recherche avancée</a></li></ul></li>';
	}
	
	function remind_url () /* pour trier la gallerie*/
	{
	global $gallery_tri;
	global $orderby;
	
	if ( $gallery_tri == 1) /*si on se trouve dans une rubrique */
	{
		if ( $orderby == 0) /* par pertinence*/
		{
			$id_url= basename($_SERVER['REQUEST_URI']); 
		}
		else if ( $orderby == 1)/* par chronologie*/
		{
			$id_url=basename($_SERVER['REQUEST_URI'],'&order='.$_GET['order'].'').PHP_EOL;
		}
	}
	else /*sinon on se trouve à la page d'accueil*/
	{
		$id_url= basename($_SERVER['PHP_SELF']);
	}
	
	return $id_url;
	}
	
	function gallery () /* pour afficher la gallerie*/
	{
		global $bdd; 
		global $gallery_tri;
		global $orderby;
		
		if( $orderby == 1)/* pour ordonner notre gallerie*/
		{
			if($_GET['order']==1)/* par pertinance*/
			{
				$sqlorder = 'vu DESC';
			} 
			else if ($_GET['order']==2)/* par chronologie*/ 
			{
				$sqlorder = 'date DESC';
			}
			else
			{
				$sqlorder = 'vu DESC';
			}
		}
		else
		{
			$sqlorder ='vu DESC';/*par defaut nous sommes en pertinence*/
		}
	
	
		if ($gallery_tri== 1) /* allons chercher les annonces*/
		{
			if(!empty($_GET['rubrique']) AND $_GET['rubrique'] <=4 AND $_GET['rubrique']> 0)
			{
				$peche= $bdd->prepare('SELECT id, titre, url_image AS image FROM annonce WHERE (id_rubrique = ? AND visible= 0) ORDER BY '.$sqlorder.'');
				$peche->execute(array($_GET['rubrique']));
			}
			else if (!empty($_GET['categorie']) AND $_GET['categorie']> 0 /*AND $_GET['categorie']< 50*/)
			{
				$peche= $bdd->prepare('SELECT id, titre, url_image AS image FROM annonce WHERE (id_categorie = ? AND visible= 0) ORDER BY '.$sqlorder.'');
				$peche->execute(array($_GET['categorie']));
			}
			else if (!empty($_GET['sous_categorie']) AND $_GET['sous_categorie']> 0 /*AND $_GET['sous_categorie']< 50*/)
			{
				$peche= $bdd->prepare('SELECT id, titre, url_image AS image FROM annonce WHERE (id_sous_categorie = ?  AND visible= 0) ORDER BY '.$sqlorder.'');
				$peche->execute(array($_GET['sous_categorie']));
			}
			else if(!empty($_GET['recherche']))
			{	
				$mot1=preg_replace('#\s+#',' ',$_GET['recherche']);
				$mot2=trim($mot1);
				$array= array();
				$search= explode(' ',$mot2);
				$sql=" SELECT id, titre, url_image AS image, description AS txt, COUNT(description) AS nbr FROM( ";
				foreach($search as $key=> $word)
				{
					$sql= $sql."
					(SELECT annonce.id, annonce.titre, annonce.url_image, annonce.description FROM annonce  WHERE (((annonce.titre  LIKE ?) OR (annonce.description  LIKE ?)) AND (annonce.visible= 0))) 
					UNION ALL ";
					array_push($array,"%$word%","%$word%");
				}				
				$sql=preg_replace('#UNION ALL $#','',$sql);				
				$sql=$sql.") AS tab GROUP BY txt ORDER BY nbr DESC";			
				// $sql= $sql."ORDER BY annonce.vu DESC "			
				// unset($array[0]);		
				// $array= array_slice($array,1);			
				$peche= $bdd->prepare($sql);			
				$peche->execute($array);

				
				
			}
			else
			{
				$peche= $bdd->prepare('SELECT id , titre, url_image AS image FROM annonce WHERE visible= 0 ORDER BY '.$sqlorder.' ');
				$peche->execute();
			}
			
		}
		else if($gallery_tri== 2)
		{
			$sql2="SELECT id, titre, url_image AS image FROM annonce WHERE (id = ? AND visible= 0)";
			$nb=count($_SESSION['visited']);
			for( $i=1; $i<=$nb; $i++)
			{
				$sql2=$sql2." UNION SELECT id, titre, url_image AS image FROM annonce WHERE (id = ? AND visible= 0) ";
			}
				
			
			$arr= array(' ');
			for( $i=0; $i< $nb; $i++)
			{
			array_push($arr,$_SESSION['visited'][$i]);
			}
							
			$peche= $bdd->prepare($sql2);
			$peche->execute($arr);
			
		}
		else if ($gallery_tri== 3)
		{
			$peche= $bdd->prepare('SELECT id , titre, url_image AS image FROM annonce WHERE visible= 36');
			$peche->execute();
		}
		else
		{
			$peche= $bdd->prepare('SELECT id, titre AS titre, url_image AS image FROM annonce WHERE visible= 0 ORDER BY '.$sqlorder.' ');
			$peche->execute();
		}
		
		return $peche;
	}
	
	
	
	function headband($idr) /* cette fonction permet d'afficher les rubriques de chaque annonce*/
	{
		global $bdd;
		$headreq= $bdd->query('SELECT rubrique.nom AS rubrique, rubrique.id AS idr, categorie.id AS idc, sous_categorie.id AS ids,rubrique.nom AS rubrique,categorie.nom AS categorie,sous_categorie.nom AS sous_categorie FROM annonce LEFT JOIN rubrique ON rubrique.id= annonce.id_rubrique LEFT JOIN categorie ON annonce.id_categorie= categorie.id  LEFT JOIN sous_categorie ON annonce.id_sous_categorie = sous_categorie.id WHERE annonce.id = '.$idr.'');
		$head= $headreq->fetch();
		return $head;
	}
	
	
	
	
	
	function get_rub()
	{
		global $bdd;
		
		$req = $bdd->prepare('SELECT id AS id_rubrique, nom AS rubrique FROM rubrique WHERE id = ?');
		$req->execute(array($_GET['rubrique']));
		$data = $req->fetch();
		return $data;
	}
	
	function get_cat()
	{
		global $bdd;
		
		$req = $bdd->prepare('SELECT rubrique.id AS id_rubrique, categorie.id AS id_categorie, rubrique.nom AS rubrique, categorie.nom AS categorie FROM rubrique INNER JOIN categorie ON rubrique.id = categorie.id_rubrique WHERE categorie.id = ?');
		$req->execute(array($_GET['categorie']));
		$data = $req->fetch();
		return $data;
	}
	
	function get_sous_cat()
	{
		global $bdd;
		
		$req = $bdd->prepare('SELECT rubrique.id AS id_rubrique, categorie.id AS id_categorie, sous_categorie.id AS id_sous_categorie, rubrique.nom AS rubrique, categorie.nom AS categorie, sous_categorie.nom AS sous_categorie FROM rubrique INNER JOIN categorie ON rubrique.id = categorie.id_rubrique INNER JOIN sous_categorie ON categorie.id = sous_categorie.id_categorie WHERE sous_categorie.id = ?');
		$req->execute(array($_GET['sous_categorie']));
		$data = $req->fetch();
		return $data;
	}
	


?>