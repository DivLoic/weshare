<?php
	$title = 'weshare - chat - déconnexion';
	$style = 'disconnect';
	ob_start();
?>

<div id="disconnect">
	<div id="header_disconnect">Déconnexion</div>

	<div id="frame_disconnect">
		<p class="success">Vous êtes bien déconnecté !<br />Vous allez être redirigé dans 3 secondes.</p>
		<script type="text/javascript">setTimeout(function(){ window.location.href = 'index.php'; }, 3000);</script>
	</div>
</div>

<?php
	$content = ob_get_clean();
	include ('template.php');
?>