<!DOCTYPE html>

<html>

	<head>
		<meta charset="utf-8" />
		<link rel="icon" type="image/png" href="components/img/weshare_ico4.png" />
		<link rel="stylesheet" href="components/css/normalize.css" />
		<link rel="stylesheet" href="components/css/main.css" />
		<?php if(ISSET($style)){ echo '<link rel="stylesheet" href="components/css/'.$style.'.css" />'; } ?>
		<title>weshare - Back-office - <?php echo $title; ?></title>
	</head>

	<body>
	
		<div id="main_menu">
			<header>
				<h1>Back-office</h1>
			</header>
			
			<nav>
				<ul>
					<li><a href="index.php?target=index" <?php if(ISSET($menu)){ if($menu == 'dashboard'){echo 'id=active';} } ?> class="dashboard_menu" >Dashboard</a></li>
					<li>
						<a href="#" class="a_sub rub_list" <?php if(ISSET($menu)){ if($menu == 'menu_weshare'){echo 'id=active';} } ?> >Menu weshare</a>
						<ul class="ul_sub">
							<li><a href="index.php?target=menu_weshare_add" class="rub_list_add">Ajouter</a></li>
							<li><a href="index.php?target=menu_weshare_update" class="rub_list_update">Modifier</a></li>
							<li><a href="index.php?target=menu_weshare_delete" class="rub_list_delete">Supprimer</a></li>
						</ul>
					</li>
					<li><a href="index.php?target=users" <?php if(ISSET($menu)){ if($menu == 'users'){echo 'id=active';} } ?> class="users_menu" >Utilisateurs</a></li>
					<li><a href="index.php?target=items" <?php if(ISSET($menu)){ if($menu == 'items'){echo 'id=active';} } ?> class="items_menu" >Annonces</a></li>
					<li>
						<a href="#" class="a_sub comments" <?php if(ISSET($menu)){ if($menu == 'comments'){echo 'id=active';} } ?> >Commentaires</a>
						<ul class="ul_sub">
							<li><a href="index.php?target=comments_item" class="comments_item">Annonces</a></li>
							<li><a href="index.php?target=comments_user" class="comments_user">Utilisateurs</a></li>
						</ul>
					</li>
					<li>
						<a href="#" class="a_sub forum" <?php if(ISSET($menu)){ if($menu == 'forum'){echo 'id=active';} } ?> >Forum</a>
						<ul class="ul_sub">
							<li><a href="index.php?target=topic" class="forum_topic">Topics</a></li>
							<li><a href="index.php?target=message" class="forum_message">Messages</a></li>
						</ul>
					</li>
					<li>
						<a href="#" class="a_sub FAQ_list" <?php if(ISSET($menu)){ if($menu == 'faq'){echo 'id=active';} } ?> >FAQ</a>
						<ul class="ul_sub">
							<li><a href="index.php?target=FAQ_add" class="rub_list_add">Ajouter</a></li>
							<li><a href="index.php?target=FAQ_update" class="rub_list_update">Modifier</a></li>
							<li><a href="index.php?target=FAQ_delete" class="rub_list_delete">Supprimer</a></li>
						</ul>
					</li>
				</ul>
			</nav>
		</div>
		
		<div id="main_content">
			<header>
				<button type="button" id="show_menu"></button>
				<div id="login_menu"><a href="index.php?target=disconnect"></a></div>
			</header>
			
			<div id="content">
				<?php echo $content; ?>
			</div>
		</div>
		
		<script type="text/javascript" src="components/js/main.js"></script>
		
	</body>

</html>