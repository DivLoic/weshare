<?php
	$title = 'Confirmation du carton';
	ob_start();
?>

<div id="content">
	<div class="container">
		
		<div class="success">Confirmation de carton effectuée. Redirection vers vos transactions dans 4s..</div>
		<script type="text/javascript">setTimeout(function(){ window.location.href = 'index.php?target=deal'; }, 4000);</script>
		
		<?php
			if(ISSET($_SESSION['result_transaction']))
			{
				if($_SESSION['result_transaction'] == 1)
				{
					echo '<div class="failure">Une ou plusieurs annonces sélectionnées n\'étaient plus disponibles.</div>';
				}
			}
		?>
		
	</div>	
</div>

<?php
	$content = ob_get_clean();
	include ('template.php');
?>