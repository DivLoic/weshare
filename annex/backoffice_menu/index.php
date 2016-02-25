<meta charset="utf-8" />
<link rel="stylesheet" href="css/style.css" />

<div id="content_left">
	<table style="border: 3px solid black;">
		<tr>
			<td colspan="2" style="border-left: 3px solid black; border-right: 3px solid black; border-bottom: 3px solid black;">Rubrique</td>
			<td colspan="2" style="border-right: 3px solid black; border-bottom: 3px solid black;">Catégorie</td>
			<td colspan="2" style="border-right: 3px solid black; border-bottom: 3px solid black;">Sous-catégorie</td>
		</tr>
		
		<?php
		
			include('connexion.php');
				
			$reply = $bdd->query('SELECT rubrique.id AS id_rub, categorie.id AS id_cat, sous_categorie.id AS id_sous_cat, rubrique.nom AS rubrique, categorie.nom AS categorie, sous_categorie.nom AS sous_categorie FROM rubrique LEFT JOIN categorie ON rubrique.id = categorie.id_rubrique LEFT JOIN sous_categorie ON categorie.id = sous_categorie.id_categorie');
	
			while($data = $reply->fetch())
			{
			?>
				<tr>
					<td style="border-left: 3px solid black;"><?php echo $data['id_rub']; ?></td>
					<td style="border-right: 3px solid black;"><?php echo $data['rubrique']; ?></td>
					<td><?php echo $data['id_cat']; ?></td>
					<td style="border-right: 3px solid black;"><?php echo $data['categorie']; ?></td>
					<td><?php echo $data['id_sous_cat']; ?></td>
					<td style="border-right: 3px solid black;"><?php echo $data['sous_categorie']; ?></td>
				</tr>
			<?php
			}
	
			$reply->closeCursor();
		?>
	</table>
</div>

<div id="content_right">
	<h2>Ajouter :</h2>
	<ul>
		<li>
			<form action="add_cat.php" method="post">
				Catégorie : <input type="text" placeholder="id parent" size="10" name="id_rub" /> <input type="text" placeholder="nom" size="30" name="nom" /> <input type="submit" value="Ajouter" />
			</form>
		</li>
		<li>
			<form action="add_sous_cat.php" method="post">
				Sous-catégorie : <input type="text" placeholder="id parent" size="10" name="id_cat" /> <input type="text" placeholder="nom" size="30" name="nom" /> <input type="submit" value="Ajouter" />
			</form>
		</li>
	</ul>

	<h2>Modifier :</h2>
	<ul>
		<li>
			<form action="upd_cat.php" method="post">
				Catégorie : <input type="text" placeholder="id" size="10" name="id_cat" /> <input type="text" placeholder="nom" size="30" name="nom" /> <input type="submit" value="Modifier" />
			</form>
		</li>
		<li>
			<form action="upd_sous_cat.php" method="post">
				Sous-catégorie : <input type="text" placeholder="id" size="10" name="id_sous_cat" /> <input type="text" placeholder="nom" size="30" name="nom" /> <input type="submit" value="Modifier" />
			</form>
		</li>
	</ul>


	<h2>Supprimer :</h2>
	<ul>
		<li>
			<form action="del_cat.php" method="post">
				Catégorie : <input type="text" placeholder="id" size="10" name="id_cat" /> <input type="submit" value="Supprimer" />
			</form>
		</li>
		<li>
			<form action="del_sous_cat.php" method="post">
				Sous-catégorie : <input type="text" placeholder="id" size="10" name="id_sous_cat" /> <input type="submit" value="Supprimer" />
			</form>
		</li>
	</ul>

</div>