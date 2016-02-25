<?php
	$title = 'Erreur - 404';
	$style = 'error_404';
	ob_start();
?>

<div id="content">
	<div class="container">
		
		<h2>Erreur 404</h2>
		
		<h4>Cette page n'existe plus, ou n'a jamais existé !</h4>
		
		<p>Il peut s'agir également d'une <strong>annonce</strong>, d'un <strong>profil</strong>, d'un <strong>topic</strong> supprimé ou inexistant.</p>
	</div>	
</div>

<?php
	$content = ob_get_clean();
	include ('template.php');
?>