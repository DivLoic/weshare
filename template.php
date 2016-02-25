<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8" />
		<link rel="icon" type="image/png" href="components/img/weshare_ico4.png" />
		<link rel="stylesheet" href="components/css/normalize.css" />
		<link rel="stylesheet" href="components/css/<?php if(!ISSET($_SESSION['pseudo'])){ echo 'main'; } else{ echo 'main_connected'; } ?>.css" />
		<?php if(ISSET($style)){ echo '<link rel="stylesheet" href="components/css/'.$style.'.css" />'; } ?>
		<title>weshare - <?php echo $title; ?></title>
	</head>

	<body>
		<div id="canvas">
			<?php if(!ISSET($_SESSION['pseudo'])){ include('views/view_header.php'); } else{ include('views/view_header_connected.php'); } ?>
    	
			<?php echo $content; ?>
			
			<div class="push"></div>
			
		</div>
    	
		<?php include('views/view_footer.php'); ?>
    	
		<?php
			if(!ISSET($_SESSION['pseudo']))
			{
				include('views/view_modal_registration.php');
				echo '<script type="text/javascript" src="components/js/index.js"></script>';
			}
		?>
				
	</body>
</html>