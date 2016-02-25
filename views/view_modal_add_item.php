<div id="mask_item"></div>

<div id="modal_item">
	<form action="index.php?target=add_item" method="post" enctype="multipart/form-data">
		<div class="item_top">
			<h1>Ajouter une annonce</h1>
			<button type="button" class="item_cross"></button>
		</div>

		<div class="item_center">
		
			<p class="input_information">Titre de l'annonce</p>
			<div id="item_titre">
				<input type="text" name="titre" class="input_my_items" maxlength="30" placeholder="30 caractères max" />
				<div class="tooltip">
					<p class="tooltip_validate">titre valide.</p>
					<p class="tooltip_invalidate">champ obligatoire.</p>
				</div>
			</div>
			
			<p class="input_information">Rangez votre annonce</p>
			<div id="item_range" style="position:relative;">
				<div id="block_rub">
					<select name="id_rubrique" >
						<option value="0">Rubriques</option>
						<?php
						while ($rub = $selector_rub->fetch())
						{
						?>
							<option value="<?php echo $rub['id_rubrique']; ?>"><?php echo $rub['nom']; ?></option>
						<?php
						}
						?>
					</select>
				</div>
			
				<div id="block_cat">
				</div>
			
				<div id="block_sous_cat">
				</div>
			
				<div class="tooltip">
					<p class="tooltip_invalidate" style="position:absolute;top:2px;left:432px;width:150px;">veuillez compléter.</p>
				</div>
			</div>
			
			<p class="input_information">Votre description</p>
			<div id="item_description">
			<textarea style="resize:none;" name="description" id="description" rows="6" class="input_my_items"></textarea>
				<div class="tooltip">
					<p class="tooltip_validate">description valide.</p>
					<p class="tooltip_invalidate">champ obligatoire.</p>
				</div>
			</div>
			
			<p style="display: inline-block;" class="input_information">Votre photo : </p>
			<div id="item_photo" style="display: inline-block;">
				<input type="file" name="image" style="width: 296px;" />
				<div class="tooltip">
					<p class="tooltip_invalidate">photo obligatoire.</p>
				</div>
			</div>
			
		</div>

		<div class="item_bottom">
			<div class="button_window">
				<button type="reset">Annuler</button>
				<button type="button" id="see_item">Ajouter</button>
			</div>
		</div>
	</form>
</div>