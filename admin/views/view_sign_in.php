<!DOCTYPE html>

<html>

	<head>
		<meta charset="utf-8" />
		<link rel="stylesheet" href="components/css/normalize.css" />
		<link rel="stylesheet" href="components/css/sign_in.css" />
		<title>Back-office | Connexion</title>
	</head>

	<body>
		<div id="content">
			<div class="container">
			
				<div id="sign_in">
					<div id="header_sign_in">Espace admin</div>

					<div id="frame_sign_in">
	
						<form action="index.php" method="post">
							<p><input type="text" name="pseudo" class="input_text_password<?php if($error_sign_in == 1){ echo ' input_error';} ?>" placeholder="pseudo" /></p>
							<p><input type="password" name="password" class="input_text_password<?php if($error_sign_in == 1){ echo ' input_error';} ?>" placeholder="mot de passe" /></p>
							<?php if($error_sign_in == 1){ echo '<p class="sign_in_error">Accès refusé</p>';} ?>
							<p><input type="submit" class="input_submit" value="Se connecter" /></p>
						</form>
		
					</div>
				</div>
			
			</div>
		</div>
		
	</body>

</html>