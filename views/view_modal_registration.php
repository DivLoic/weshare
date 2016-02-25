<div id="mask"></div>

<div id="inscription">
	<form action="index.php?target=registration" method="post">
		<div class="top">
			<h1>Inscription</h1>
			<button type="button" class="cross"></button>
		</div>
	
		<div class="center">
	
			<p class="input_information">Adresse e-mail</p>
			<div class="block_inscription">
				<input type="text" class="input_inscription" spellcheck="false" name="email" />
				<div class="tooltip">
					<p class="inscription_validate">e-mail valide</p>
					<p class="inscription_invalidate">e-mail invalide</p>
					<p class="inscription_invalidate">e-mail déjà utilisé</p>
					<p class="inscription_invalidate">champ obligatoire</p>
				</div>
			</div>
			
			<p class="input_information">Créez un mot de passe</p>
			<div class="block_inscription" id="inscription_password">
				<img src="components/img/padlock2.svg" alt="padlock preload" style="display: none;"/>
				<button type="button" id="padlock_lock"></button>
				<input type="password" class="input_inscription" spellcheck="false" name="mot_de_passe" />
				<div class="tooltip">
					<p class="inscription_validate">mot de passe valide</p>
					<p class="inscription_invalidate">au moins 6 caractères</p>
					<p class="inscription_invalidate">lettre & chiffre obligatoires</p>
					<p class="inscription_invalidate">champ obligatoire</p>
				</div>
			</div>
			
			<p class="input_information">Choisissez un pseudo</p>
			<div class="block_inscription">
				<input type="text" class="input_inscription" spellcheck="false" maxlength="19" name="pseudo" />
				<div class="tooltip">
					<p class="inscription_validate">pseudo valide</p>
					<p class="inscription_invalidate">pseudo invalide</p>
					<p class="inscription_invalidate">pseudo déjà utilisé</p>
					<p class="inscription_invalidate">champ obligatoire</p>
				</div>
			</div>
			
			<p class="input_information">Votre code postal <span id="paris_only"> - Paris seulement</span></p>
			<div class="block_inscription">
				<input type="text" class="input_inscription" spellcheck="false" maxlength="5" name="code_postal" />
				<div class="tooltip">
					<p class="inscription_validate">code postal valide</p>
					<p class="inscription_invalidate">code postal invalide</p>
					<p class="inscription_invalidate">code postal parisien</p>
					<p class="inscription_invalidate">champ obligatoire</p>
				</div>
			</div>
		
			<div id="checkbox_rules"><input id="checkbox_inscription" class="checkbox" type="checkbox" /><label for="checkbox_inscription" class="label_inscription">J'accepte les <a href="index.php?target=terms_of_use" target="_blank">conditions d'utilisation</a> de weshare</label></div>

		</div>
	
		<div class="bottom">
			<div class="button_window">
				<button type="reset">Annuler</button>
				<button type="button" id="submit_inscription">S'inscrire</button>
			</div>
		</div>
	</form>
</div>