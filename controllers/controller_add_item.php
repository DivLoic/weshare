<?php
require('models/model_add_item.php');

function crop_square_jpg($url)
{
	$source = $url;
	$source = imagecreatefromjpeg($source);

	$width_source = imagesx($source);
	$height_source = imagesy($source);

	$min_value = min($width_source,$height_source);
	
	$target = imagecreatetruecolor($min_value, $min_value);

	if($width_source > $height_source)
	{
		$x = (int)(($width_source - $height_source) / 2);
		$y = 0;
		imagecopyresampled($target, $source, 0, 0, $x, $y, $min_value, $min_value, $min_value, $min_value);
	}
	elseif($width_source < $height_source)
	{
		$x = 0;
		$y = (int)(($height_source - $width_source) / 2);
	
		imagecopyresampled($target, $source, 0, 0, $x, $y, $min_value, $min_value, $min_value, $min_value);
	}
	else
	{
		$target = $source;
	}

	imagejpeg($target, $url);
}


function crop_square_png($url)
{
	$source = $url;
	$source = imagecreatefrompng($source);

	$width_source = imagesx($source);
	$height_source = imagesy($source);

	$min_value = min($width_source,$height_source);
	
	$target = imagecreatetruecolor($min_value, $min_value);

	if($width_source > $height_source)
	{
		$x = (int)(($width_source - $height_source) / 2);
		$y = 0;
		imagecopyresampled($target, $source, 0, 0, $x, $y, $min_value, $min_value, $min_value, $min_value);
	}
	elseif($width_source < $height_source)
	{
		$x = 0;
		$y = (int)(($height_source - $width_source) / 2);
	
		imagecopyresampled($target, $source, 0, 0, $x, $y, $min_value, $min_value, $min_value, $min_value);
	}
	else
	{
		$target = $source;
	}

	imagepng($target, $url);
}

function check_rub()
{
	if(ISSET($_POST['id_rubrique']))
	{
		if($_POST['id_rubrique'] != 0)
		{
			return 1;
		}
		else
		{
			return 0;
		}
	}
	else
	{
		return 0;
	}
}

function check_cat()
{
	if(ISSET($_POST['id_categorie']))
	{
		if($_POST['id_categorie'] != 0)
		{
			return 1;
		}
		else
		{
			return 0;
		}
	}
	else
	{
		return 1;
	}
}

function check_sous_cat()
{
	if(ISSET($_POST['id_sous_categorie']))
	{
		if($_POST['id_sous_categorie'] != 0)
		{
			return 1;
		}
		else
		{
			return 0;
		}
	}
	else
	{
		return 1;
	}
}

if (isset($_FILES['image']) AND $_FILES['image']['error'] == 0 AND ISSET($_POST['titre']) AND ISSET($_POST['description']) AND check_rub() == 1 AND check_cat() == 1 AND check_sous_cat() == 1)
{
	if(!preg_match("#^ *$#i",$_POST['titre']) AND !preg_match("#^( |\n|\s|\r)*$#i",$_POST['description']))
	{
		if ($_FILES['image']['size'] <= 3000000)
		{
			$infosfichier = pathinfo($_FILES['image']['name']);
			$extension_upload = strtolower($infosfichier['extension']);
			$extensions_autorisees = array('jpg', 'jpeg', 'png');
			if (in_array($extension_upload, $extensions_autorisees))
			{
				if(!ISSET($_POST['id_categorie'])){ $_POST['id_categorie'] = 0; }
				if(!ISSET($_POST['id_sous_categorie'])){ $_POST['id_sous_categorie'] = 0; }
				$key = date('jnyGis');
				$url_image = 'content_files/pics/items/'.$_SESSION['id'].$key.'.'.$extension_upload;
				move_uploaded_file($_FILES['image']['tmp_name'], $url_image);
			
				if($extension_upload == 'jpg' OR $extension_upload == 'jpeg')
				{
					crop_square_jpg($url_image);
				}
				else
				{
					crop_square_png($url_image);
				}
			
				add_item($url_image);
				
				$id_item = get_this_item();
				
				$all_users = get_all_user_request();
				
				while($user = $all_users->fetch())
				{
					$find = find_request($user['demande'],$user['demande'],$user['id_utilisateur'],$id_item);
					
					if($find['nb'] > 0)
					{
$site_root = dirname($_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI']);	
				
$adresse = $user['email'];

$titre = 'Réponse à la demande '.$user['demande'];

$contenu = 'Bonjour '.$user['pseudo'].', cette annonce semble répondre à votre demande «'.$user['demande'].' » :
http://'.$site_root.'/index.php?target=item&item_id='.$find['id'].'

Si vous souhaitez ne plus recevoir d\'email pour la demande « '.$user['demande'].' », cliquez ci-dessous :
http://'.$site_root.'/index.php?target=item_request_delete&id_request='.$user['id'].'&id_user='.$user['id_utilisateur'].'&key='.$user['cle'];
					
						mail($adresse,$titre,$contenu);
					}
				
				}
				
				$result = 1;
			}
			else
			{
				$result = 2;
			}
		}
		else
		{
			$result = 3;
		}
	}
	else
	{
		$result = 0;
	}
}

include('controllers/controller_my_items.php');
?>
