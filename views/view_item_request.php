<?php
	$title = 'Demande d\'objets ou de services';
	$style = 'item_request';
	ob_start();
?>

<div id="content">
	<div class="container">
		
		<div class="window_dashboard">
			<div class="header_window_dashboard"><h2>Demande d'objets ou de services</h2></div>
	
			<div class="content_window_dashboard">
				
				<p class="enter_forget">Faire une demande d'objets ou de services</p>
				<form action="index.php?target=item_request_action" method="post">
					<input type="text" name="request" class="forget_input" placeholder="ex : voiture, robe, marteau, jouet" /><input type="submit" class="forget_submit" id="send_request" />
					<p class="sign_in_error">veuillez entrer des mots-clés</p>
				</form>
				
			</div>
		</div>	
		
	</div>	
</div>

<script type="text/javascript" src="components/js/item_request.js"></script>


<?php
	$content = ob_get_clean();
	include ('template.php');
?>