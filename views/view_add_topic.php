<?php
    $title = 'Forum';
    $style = 'add_topic';
    ob_start();
?>
 
<div id="content">
    <div class="container">
    	
    	<div id="forum">
    	
			<div class="window_dashboard">
					<div class="header_window_dashboard"><h2>Ajouter un topic</h2></div>
					
					<div class="content_window_dashboard">
					<form action="index.php?target=add_topic_action" method="post">
						<div id="titre_topic_block">
							<p class="text_topic">Titre du topic</p>
							<div id="tooltip_titre">champ obligatoire</div>
							<input type="text" name="titre" class="input_topic" maxlength="150" />
						</div>
				
						<div id="type_topic_block">
							<p class="text_topic">Type</p>
							<div id="tooltip_type">type obligatoire</div>
							<select name="id_type" style="width: 300px; margin: 5px 0 10px 0;" >
								<option value="0">Veuillez choisir le type</option>
								<?php
								while ($type = $types->fetch())
								{
								?>
									<option value="<?php echo $type['id_rubrique']; ?>"><?php echo $type['nom']; ?></option>
								<?php
								}
								?>
								<option value="5">Divers</option>
							</select>
						</div>
				
						<div id="contenu_topic_block">
							<p class="text_topic">Votre message</p>
							<div id="tooltip_contenu">champ obligatoire</div>
							<textarea class="message_topic" name="contenu"></textarea>
						</div>
				
						<div class="button_topic"><input type="reset" value="Annuler" class="cancel" /><input type="submit" value="Poster" class="valid" /></div>
					</form>
					</div>
			</div>	

    	
    	</div>
    	
    </div>
</div>

<script type="text/javascript" src="components/js/add_topic.js"></script>
 
<?php
    $content = ob_get_clean();
    include ('template.php');
?>
    
    		
