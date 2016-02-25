<?php
	$title = 'Qui sommes nous';
	$style = 'about_us';
	ob_start();
?>

<div id="content">
	<div id="presentation">
		<div class="container">
			<div id="resume">
				<h1>Qui sommes-nous ?</h1>
				<p>
					Apparu en 2013, weshare est un concept innovant, développé à Paris par des étudiants de l’ISEP. Il a pour objectif de partager divers objets ou services, proposés par sa communauté présente et active. Allant de la veste en cuir, au tournevis cruciforme, il peut s’agir d’un emprunt, d’un échange, ou même d’un don. L'utilisation de la plateforme est bien évidemment gratuite, et il vous suffira de quelques clics pour faire et vous faire plaisir !
				</p>
				<p style="text-indent: 0;">
					Alors inscrivez vous et participez à l'aventure humaine qu'est weshare : des surprises vous sont réservées !
				</p>
			</div>
			
			<div id="edito">
				<div id="bubble">
					<?php echo $edito['edito']; ?>
					<div class="arrow_bubble"></div>
					<img src="<?php echo $edito['photo']; ?>" class="edito_photo" alt="<?php echo $edito['prenom'].' '.$edito['nom']; ?>" />
				</div>
				<p>
					<?php echo $edito['prenom'].' '.$edito['nom']; ?><br />
					<span class="edito_founder">Co-Fondateur</span>
				</p>
			</div>
		</div>
	</div>
	
	<div id="feature">
		<div class="container">
			<div class="first_feature">
				<h2>Communauté</h2>
				<p>weshare, c’est d’abord une communauté au sein de Paris. Elle ne cesse d’accueillir de nouveaux abonnés, qui font la force de notre réseau. Chaque membre contribue à rendre weshare plus dynamique et toujours plus vivant : pourquoi pas vous ?</p>
			</div>
			<div class="second_feature">
				<h2>Partage</h2>
				<p>weshare, c’est la chance de partager avec des personnes près de chez vous. Donner, échanger, emprunter tout et en toute confiance, devient possible. Démontrez vos talents en participant à l'aventure. Lâchez-vous et soyez force de propositions !</p>
			</div>
			<div class="third_feature">
				<h2>Solidarité</h2>
				<p>Plus qu’une plateforme de partage, weshare est un outil de solidarité qui vous donne l’opportunité d'aider et de vous aider. Ce site est animé et fait pour vous permettre de rencontrer et aider vos amis. N’hésitez plus et rejoignez la famille weshare !</p>
			</div>
		</div>
	</div>
	
	<div id="contact">
		<div class="container">
			<div id="contact_information">
				<div class="arrow_bubble_inverse"></div>
				
				<div id="information">
					<h3>Siège social</h3>
					<address>28 rue Notre-Dame des Champs<br />75006 Paris<br />France</address>
					<p><span class="blue_information">tél :</span> 01 13 41 54 65<br /><span class="blue_information">e-mail :</span> <a href="mailto:contact@weshare.fr">contact@weshare.fr</a></p>
				</div>
				
				<iframe class="map" src="https://maps.google.fr/maps?ie=UTF8&amp;q=isep+paris&amp;fb=1&amp;gl=fr&amp;hq=isep&amp;hnear=0x47e672571766f253:0x40b82c3688b3990,Charenton-le-Pont&amp;cid=0,0,11227944611336476014&amp;t=m&amp;ll=48.845429,2.33099&amp;spn=0.006016,0.017123&amp;z=15&amp;output=embed"></iframe>
			</div>
		</div>
	</div>
</div>

<?php
	$content = ob_get_clean();
	include ('template.php');
?>