<?php
	require ('models/model_menu_weshare_action.php');
	
	if(ISSET($_POST['id_rubrique_c']) AND ISSET($_POST['input_add_cat']))
	{
		if(!preg_match("#^ *$#i",$_POST['input_add_cat']) AND $_POST['id_rubrique_c'] != 0)
		{
			add_cat($_POST['id_rubrique_c'], $_POST['input_add_cat']);
			$result = 'add';
		}
	}
	
	if(ISSET($_POST['id_categorie_s']) AND ISSET($_POST['input_add_sous_cat']))
	{
		if(!preg_match("#^ *$#i",$_POST['input_add_sous_cat']) AND $_POST['id_categorie_s'] != 0)
		{
			add_sous_cat($_POST['id_categorie_s'], $_POST['input_add_sous_cat']);
			$result = 'add';
		}
	}
	
	
	
	
	if(ISSET($_POST['id_categorie_c']) AND ISSET($_POST['input_update_cat']))
	{
		if($_POST['id_categorie_c'] != 0)
		{
			update_cat($_POST['input_update_cat'],$_POST['id_categorie_c']);
			$result = 'update';
		}
	}
	
	if(ISSET($_POST['id_sous_categorie_s']) AND ISSET($_POST['input_update_sous_cat']))
	{
		if($_POST['id_sous_categorie_s'] != 0)
		{
			update_sous_cat($_POST['input_update_sous_cat'],$_POST['id_sous_categorie_s']);
			$result = 'update';
		}
	}
	
	
	
	
	
	if(ISSET($_POST['id_categorie_c']) AND ISSET($_POST['delete']))
	{
		if($_POST['id_categorie_c'] != 0)
		{
			delete_cat($_POST['id_categorie_c']);
			$result = 'delete';
		}
	}
	
	if(ISSET($_POST['id_sous_categorie_s']) AND ISSET($_POST['delete']))
	{
		if($_POST['id_sous_categorie_s'] != 0)
		{
			delete_sous_cat($_POST['id_sous_categorie_s']);
			$result = 'delete';
		}
	}
	
	
	
	
	if(ISSET($result))
	{
		if($result == 'add')
		{
			include ('controllers/controller_menu_weshare_add.php');
		}
		elseif($result == 'update')
		{
			include ('controllers/controller_menu_weshare_update.php');
		}
		elseif($result == 'delete')
		{
			include ('controllers/controller_menu_weshare_delete.php');
		}
	}
	else
	{
		include ('controllers/controller_index.php');
	}
?>