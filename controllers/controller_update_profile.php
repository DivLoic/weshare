<?php
	require('models/model_update_profile.php');
	
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
	
	if (ISSET($_FILES['image']) AND $_FILES['image']['error'] == 0)
	{
		if ($_FILES['image']['size'] <= 3000000)
		{
			$infosfichier = pathinfo($_FILES['image']['name']);
			$extension_upload = strtolower($infosfichier['extension']);
			$extensions_autorisees = array('jpg', 'jpeg', 'png');
			if (in_array($extension_upload, $extensions_autorisees))
			{
				$key = date('jnyGis');
				$url_image = 'content_files/pics/profile/'.$_SESSION['id'].$key.'.'.$extension_upload;
				move_uploaded_file($_FILES['image']['tmp_name'], $url_image);
				
				if($extension_upload == 'jpg' OR $extension_upload == 'jpeg')
				{
					crop_square_jpg($url_image);
				}
				else
				{
					crop_square_png($url_image);
				}
				
				update_pic_profile($url_image);
				$update_result = 2;
			}
			else
			{
				$update_result = 3;
			}
		}
		else
		{
			$update_result = 4;
		}
	}
	
	if(ISSET($_POST['prenom']) AND ISSET($_POST['nom']) AND ISSET($_POST['jour']) AND ISSET($_POST['mois']) AND ISSET($_POST['annee']) AND ISSET($_POST['adresse']) AND ISSET($_POST['code_postal']) AND ISSET($_POST['tel']) AND ISSET($_POST['description']))
	{
		if(preg_match("#^750([0-1][1-9]|20)$#",$_POST['code_postal']))
		{
			if(!empty($_POST['jour']) OR !empty($_POST['mois']) OR !empty($_POST['annee']))
			{
				if(preg_match("#^[0-9]{4}$#",$_POST['annee']) AND preg_match("#^[0-9]{2}$#",$_POST['mois']) AND preg_match("#^[0-9]{2}$#",$_POST['jour']))
				{
					$date_de_naissance = $_POST['annee'].'-'.$_POST['mois'].'-'.$_POST['jour'];
					update_user($_SESSION['pseudo'], $date_de_naissance);
					$update_result = 1;
				}
				else
				{
					$update_result = 22;
				}
			}
			else
			{
				$date_de_naissance = '';
				update_user($_SESSION['pseudo'], $date_de_naissance);
				$update_result = 1;
			}
		}
		else
		{
			$update_result = 0;
		}
	}
	
	
	include ('controllers/controller_profile.php');
?>