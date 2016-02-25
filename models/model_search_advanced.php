<?php
    require('bdd_connexion.php');
 
 
     
    function gallery_av() /* pour afficher la gallerie avec une recherche avancée*/
    {
        global $bdd;
        global $gallery_tri;
        global $orderby;
         
		if( $orderby == 1)/* pour ordonner notre gallerie*/
		{
			if($_GET['order']==1)/* par pertinance*/
			{
				$sqlorder = 'annonce.vu DESC';
			}
			else if ($_GET['order']==2)/* par chronologie*/
			{
				$sqlorder = 'annonce.date DESC';
			}
			else
			{
				$sqlorder = 'annonce.vu DESC';
			}
		}
		else
		{
			$sqlorder ='annonce.vu DESC';/*par defaut nous sommes en pertinence*/
		}
     
         if (!empty($_GET['year']) AND !empty($_GET['month']) AND !empty($_GET['day']) )
        {
			$date=$_GET['year']."-".$_GET['month']."-".$_GET['day'];
			
			if($_GET['rub'] != 0 AND $_GET['cat'] !=0 AND $_GET['sous_cat'] != 0)
			{
				$peche= $bdd->prepare("SELECT annonce.id, annonce.titre, annonce.url_image AS image FROM annonce INNER JOIN utilisateur ON annonce.id_utilisateur=utilisateur.id WHERE (utilisateur.pseudo LIKE ?) AND annonce.date >= ? AND (annonce.description LIKE ?  OR annonce.titre LIKE ?) AND (annonce.id_rubrique= ?) AND (annonce.id_categorie= ?) AND (annonce.id_sous_categorie= ?) AND (annonce.visible= 0) ORDER BY ".$sqlorder."");
				$peche->execute(array("%$_GET[name]%",$date,"%$_GET[key_word]%","%$_GET[key_word]%",$_GET['rub'],$_GET['cat'],$_GET['sous_cat']));                   
			}
			else if($_GET['rub'] != 0 AND $_GET['cat'] !=0 )
			{
				$peche= $bdd->prepare("SELECT annonce.id, annonce.titre, annonce.url_image AS image FROM annonce INNER JOIN utilisateur ON annonce.id_utilisateur=utilisateur.id WHERE (utilisateur.pseudo LIKE ?) AND annonce.date >= ? AND (annonce.description LIKE ? OR annonce.titre LIKE ?) AND (annonce.id_rubrique= ?) AND (annonce.id_categorie= ?) AND (annonce.visible= 0) ORDER BY ".$sqlorder."");
				$peche->execute(array("%$_GET[name]%",$date,"%$_GET[key_word]%","%$_GET[key_word]%",$_GET['rub'],$_GET['cat']));
			}
			else if($_GET['rub'] != 0 )
			{
				$peche= $bdd->prepare("SELECT annonce.id, annonce.titre, annonce.url_image AS image FROM annonce INNER JOIN utilisateur ON annonce.id_utilisateur=utilisateur.id WHERE (utilisateur.pseudo LIKE ?) AND annonce.date >= ? AND (annonce.description LIKE ? OR annonce.titre LIKE ?) AND (annonce.id_rubrique= ?) AND (annonce.visible= 0) ORDER BY ".$sqlorder."");
				$peche->execute(array("%$_GET[name]%",$date,"%$_GET[key_word]%","%$_GET[key_word]%",$_GET['rub']));
			}
			else
			{
				$peche= $bdd->prepare("SELECT annonce.id, annonce.titre, annonce.url_image AS image FROM annonce INNER JOIN utilisateur ON annonce.id_utilisateur=utilisateur.id WHERE (utilisateur.pseudo LIKE ?) AND annonce.date >= ? AND (annonce.description LIKE ? OR annonce.titre LIKE ?) AND (annonce.visible= 0) ORDER BY ".$sqlorder."");
				$peche->execute(array("%$_GET[name]%",$date,"%$_GET[key_word]%","%$_GET[key_word]%","%$_GET[key_word]%"));
			}
		}
		else 
		{
			if($_GET['rub'] != 0 AND $_GET['cat'] !=0 AND $_GET['sous_cat'] != 0)
			{
				$peche= $bdd->prepare("SELECT annonce.id, annonce.titre, annonce.url_image AS image FROM annonce INNER JOIN utilisateur ON annonce.id_utilisateur=utilisateur.id WHERE ((utilisateur.pseudo LIKE ?)  AND (annonce.description LIKE ? OR annonce.titre LIKE ?) AND (annonce.id_rubrique= ?) AND (annonce.id_categorie= ?) AND (annonce.id_sous_categorie= ?) AND (annonce.visible= 0)) ORDER BY ".$sqlorder."");
				$peche->execute(array("%$_GET[name]%","%$_GET[key_word]%","%$_GET[key_word]%",$_GET['rub'],$_GET['cat'],$_GET['sous_cat']));                   
			}
			else if($_GET['rub'] != 0 AND $_GET['cat'] !=0)
			{
				$peche= $bdd->prepare("SELECT annonce.id, annonce.titre, annonce.url_image AS image FROM annonce INNER JOIN utilisateur ON annonce.id_utilisateur=utilisateur.id WHERE ((utilisateur.pseudo LIKE ?)  AND (annonce.description LIKE ? OR annonce.titre LIKE ?) AND (annonce.id_rubrique= ?) AND (annonce.id_categorie= ?) AND (annonce.visible= 0)) ORDER BY ".$sqlorder."");
				$peche->execute(array("%$_GET[name]%","%$_GET[key_word]%","%$_GET[key_word]%",$_GET['rub'],$_GET['cat']));
			}
			else if($_GET['rub'] != 0)
			{
				$peche= $bdd->prepare("SELECT annonce.id, annonce.titre, annonce.url_image AS image FROM annonce INNER JOIN utilisateur ON annonce.id_utilisateur=utilisateur.id WHERE ((utilisateur.pseudo LIKE ?)  AND (annonce.description LIKE ? OR annonce.titre LIKE ?) AND (annonce.id_rubrique= ?) AND (annonce.visible= 0)) ORDER BY ".$sqlorder."");
				$peche->execute(array("%$_GET[name]%","%$_GET[key_word]%","%$_GET[key_word]%",$_GET['rub']));
			}
			else if(empty($_GET['name']) AND empty($_GET['key_word']))
			{
			   $peche= $bdd->prepare("SELECT annonce.id, annonce.titre, annonce.url_image AS image FROM annonce WHERE annonce.id= 0");
			$peche->execute(array());
			}
			else
			{
				$peche= $bdd->prepare("SELECT annonce.id, annonce.titre, annonce.url_image AS image FROM annonce INNER JOIN utilisateur ON annonce.id_utilisateur=utilisateur.id WHERE ((utilisateur.pseudo LIKE ?)  AND (annonce.description LIKE ? OR annonce.titre LIKE ?) AND (annonce.visible= 0))  ORDER BY ".$sqlorder."");
				$peche->execute(array("%$_GET[name]%","%$_GET[key_word]%","%$_GET[key_word]%"));
			}
		}
		
         
        return $peche;
    }
