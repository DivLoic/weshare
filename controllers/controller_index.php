<?php
	require('models/model_index.php');
	
	
	if(isset($_GET['name']) && (isset($_GET['year']) && isset($_GET['month']) && isset($_GET['day'])) && isset($_GET['key_word']) && isset($_GET['rub']) && isset($_GET['cat']) && isset($_GET['sous_cat']))
	{
		if($search_avdanced=1)
		{
			$gallery_tri =1;
			$var_url= '&amp;';
			require('models/model_search_advanced.php');
		}
	}
	else if(isset($_GET['rubrique']) || isset($_GET['categorie']) || isset($_GET['sous_categorie']) || isset($_GET['recherche']) )/* l'utilisateur as-t'il déjà trier la gallerie*/
	{
		$gallery_tri =1;
		$var_url= '&amp;';
		$search_avdanced=0;
	}
	else if(isset($_GET['visited']))
	{
		$search_avdanced=0;
		
		if($_GET['visited']==1)
		{
			$gallery_tri = 2;
			$var_url='#';
		}
		else if($_GET['visited']==2)
		{
			$gallery_tri =3;
			$var_url= '?';
		}
		else
		{
		$gallery_tri =0;
		$var_url= '?';
		}
	}
	else
	{ 
		$search_avdanced=0;
		$gallery_tri =0;
		$var_url= '?';
	}
	
	if(isset($_GET['order']))/* l'utilisateur as-t'il déjà choisi l'ordre d'affichage */
	{
		$orderby =1;
	}
	else
	{
		$orderby =0;
	}
	
	include ('views/view_index.php');
?>