<?php
	$title = 'Déconnexion';
	ob_start();
?>

<div id="content">
	<div class="container">
		
		<div class="success">Vous êtes bien déconnecté. Vous allez être redirigé dans 3s..</div>
		<script type="text/javascript">setTimeout(function(){ window.location.href = 'index.php'; }, 3000);</script>
	</div>	
</div>

<?php
	$content = ob_get_clean();
	include ('template.php');
?>