<?php
	include('bdd_connexion.php');
	
    function count_cat($id_rubrique)
    {
        global $bdd;
         
        $req = $bdd->prepare('SELECT COUNT(*) AS nb FROM categorie WHERE id_rubrique = ?');
        $req->execute(array($id_rubrique));
        $data = $req->fetch();
         
        return $data['nb'];
    }
    
    function count_sous_cat($id_categorie)
    {
        global $bdd;
         
        $req = $bdd->prepare('SELECT COUNT(*) AS nb FROM sous_categorie WHERE id_categorie = ?');
        $req->execute(array($id_categorie));
        $data = $req->fetch();

         
        return $data['nb'];
    }
	
    function selector_cat($id_rubrique)
    {
        global $bdd;
         
        $req = $bdd->prepare('SELECT id AS id_categorie, nom FROM categorie WHERE id_rubrique = ? ORDER BY categorie.nom');
        $req->execute(array($id_rubrique));
         
        return $req;
    }
    
    function selector_sous_cat($id_categorie)
    {
        global $bdd;
         
        $req = $bdd->prepare('SELECT id AS id_sous_categorie, nom FROM sous_categorie WHERE id_categorie = ? ORDER BY sous_categorie.nom');
        $req->execute(array($id_categorie));
         
        return $req;
    }
?>



<?php
	if(ISSET($_GET['id_rubrique']))
	{
		if(count_cat($_GET['id_rubrique']) > 0){$categories = selector_cat($_GET['id_rubrique']);}
	}
	
	if(ISSET($_GET['id_categorie']))
	{
		if(count_sous_cat($_GET['id_categorie']) > 0){$sous_categories = selector_sous_cat($_GET['id_categorie']);}
	}
?>



<?php
	if(ISSET($categories))
	{
		echo '<select name="id_categorie" ><option value="0">Catégories</option>';
		
		while($data = $categories->fetch())
		{
			echo '<option value="'.$data['id_categorie'].'">'.$data['nom'].'</option>';
		}
		
		echo '</select>';
		?>
		%££%
			var selector_cat = document.querySelector('#block_cat select');
			
			selector_cat.onchange = function()
			{
				tooltip_range.style.display = 'none';
				block_sous_cat.innerHTML = '';
				block_sous_cat.innerHTML = get_sous_cat(selector_cat.value);
				if(/<select name="id_sous_categorie">/i.test(block_sous_cat.innerHTML))
				{
					var selector_sous_cat = document.querySelector('#block_sous_cat select');
					selector_sous_cat.onchange = function(){tooltip_range.style.display = 'none';};
				}

			};
		<?php
	}
	
	
	if(ISSET($sous_categories))
	{
		echo '<select name="id_sous_categorie" ><option value="0">Sous-catégories</option>';
		
		while($data = $sous_categories->fetch())
		{
			echo '<option value="'.$data['id_sous_categorie'].'">'.$data['nom'].'</option>';
		}
		
		echo '</select>';
	}
?>