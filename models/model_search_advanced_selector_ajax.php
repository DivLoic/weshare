<?php
    require('bdd_connexion.php');
     
    function count_cat($id_rubrique)
    {
        global $bdd;
          
        $req = $bdd->prepare('SELECT COUNT(*) AS nb FROM categorie WHERE id_rubrique = ?');
        $req->execute(array($id_rubrique));
        $data = $req->fetch();
          
        return $data['nb'];
    } 
	//useless
     
    function count_sous_cat($id_categorie)
    {
        global $bdd;
          
        $req = $bdd->prepare('SELECT COUNT(*) AS nb FROM sous_categorie WHERE id_categorie = ?');
        $req->execute(array($id_categorie));
        $data = $req->fetch();
 
          
        return $data['nb'];
    } 
	//useless
     
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
        if(count_cat($_GET['id_rubrique']) > 0){$categories = selector_cat($_GET['id_rubrique']);} else{ echo '<option value="0">Catégories</option>'; }
    }
     
    if(ISSET($_GET['id_categorie']))
    {
        if(count_sous_cat($_GET['id_categorie']) > 0){$sous_categories = selector_sous_cat($_GET['id_categorie']);} else{ echo '<option value="0">Sous-catégories</option>'; }
    }
?> 
 
 
 
<?php
    if(ISSET($categories))
    {
        echo '<option value="0">Catégories</option>';
         
        while($data = $categories->fetch())
        {
            echo '<option value="'.$data['id_categorie'].'">'.$data['nom'].'</option>';
        }
    }
     
     
    if(ISSET($sous_categories))
    {
        echo '<option value="0">Sous-catégories</option>';
         
        while($data = $sous_categories->fetch())
        {
            echo '<option value="'.$data['id_sous_categorie'].'">'.$data['nom'].'</option>';
        }
    }
?>
