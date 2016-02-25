<?php
	$title = 'Conditions générales d’utilisation';
	$style = 'terms_of_use';
	ob_start();
?>

<div id="content">
	<div class="container">
		<div id="conditions">
			<h1>Conditions générales d’utilisation</h1>
			<ul>
				<li>Les <em>objets illicites</em> ou <em>services illégaux</em> ne peuvent faire l’objet d’une annonce.</li>
				<li>L'annonce doit être postée dans la <em>bonne catégorie</em>.</li>
				<li>Soumettre <em>une seule et unique</em> annonce pour chaque produit.</li>
				<li>Vous ne pouvez avoir qu'<em>un seul compte</em>.</li>
				<li>Les annonces doivent être rédigées en <em>français</em>.</li>
				<li>Le titre ne doit comporter que le <em>nom</em> du produit.</li>
				<li>Ne pas mentionner de numéro de téléphone, d'adresse e-mail ou de lien de site web dans le titre de l'annonce ou l'image qui l'accompagne</li>
				<li>
					L'annonce ne doit pas comporter un contenu ne respectant pas la politique de <em>weshare</em> Nous vous invitons à prendre connaissance de la liste thématique ci-dessous des produits <em>interdits</em> sur le site :
					<ol class="bubble_conditions">
						<li>Tabac, drogue et objets associées, substances dangereuses et illicites.</li>
						<li>Médicaments, produits de cosmétique et parapharmacie.</li>
						<li>Armes, explosifs, pièges de chasse.</li>
						<li>Contenu réservé aux adultes.</li>
						<li>Espèces végétales et animales protégées.</li>
						<li>Articles ou produits contrefaits.</li>
					</ol>
				</li>
				<li>Le nom spécifié dans la déclaration doit être <em>exacte</em>.</li>
				<li>Les annonces postées sont <em>accessibles</em> à tous les membres de « weshare ».</li>
				<li>Si vous êtes intéressé par une annonce ajoutez-la à votre <em>« carton »</em>. Vous ne pouvez finaliser qu’<em>une seule annonce</em> à la fois. Il vous est possible d’organiser votre carton.</li>
				<li>Dans le cas d’échange de services/objet les utilisateurs doivent se <em>mettre d’accord</em> par l’intermédiaire du <em>« mini-chat »</em>.</li>
				<li>Après une transaction fructueuse nous vous demandons une <em>validation</em>, afin de retirer définitivement votre annonce en ligne. Après <em>un mois</em> sans retour de votre part l’annonce sera <em>supprimée</em>.</li>
				<li><em>Aucune</em> information bancaire ne doit être divulguée.</li>
				<li>Si jamais votre <em>annonce</em> ou votre <em>compte</em> ont été <em>bloqués</em>, cela signifie que vous avez <em>violé</em> une règle mentionnée ci-dessus.</li>
			</ul>
		</div>
	</div>
</div>

<?php
	$content = ob_get_clean();
	include ('template.php');
?>