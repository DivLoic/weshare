<?php
    $title = 'search_advanced';
    $style = 'recherche_avancee';
    ob_start();
?>

<div id="content">
	<div class="container">
     <form action="index.php?target=search_advanced" method="get">
		
		<h1>Recherche avancée</h1>
	  <div class='input_information_search_advanced'>
	  <input name="key_word" type="text"  placeholder='mot-clé' class='input_search_advanced' />

      <h2>Rubrique</h2>
     

            <select id="id_rubrique_s" name="rub" >
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
            
       <h2>Catégorie</h2>
         
            <select id="id_categorie_s" name="cat" >
                <option value="0">Catégories</option>
            </select>
     
       <h2>Sous-catégorie</h2>
             
            <select id="id_sous_categorie_s" name="sous_cat" >
                <option value="0">Sous-catégories</option>
            </select>
             
	
            
       <h4>Posté par :</h4><input type="text" name="name" class='input_search_advanced' />
     
       <h4>À partir du :</h4> Jour / Mois / Année : <input type="text" name="day" class='input_search_advanced day' maxlength="2" /> / <input type="text" name="month" class='input_search_advanced month' maxlength="2" /> / <input type="text" name="year" class='input_search_advanced year' maxlength="4" /><br />
       <input type="submit" id="button_search_advanced" value="Rechercher" style="margin-top: 40px;" /> 
    </div>       
	 </form>
	</div>
</div>
 
<script type="text/javascript" src="components/js/search_advanced_selector.js"></script>
 
<?php
    $content = ob_get_clean();
    include ('template.php');
?>

