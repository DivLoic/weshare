
 
var selec_rub_s = document.querySelector('#id_rubrique_s');
var selec_cat_s = document.querySelector('#id_categorie_s');
var selec_sous_cat_s = document.querySelector('#id_sous_categorie_s');
 
 
 
 
function get_cat(id_rub)
{
    var xhr = new XMLHttpRequest();
    xhr.open('GET', 'models/model_search_advanced_selector_ajax.php?id_rubrique='+id_rub, false);
    xhr.send(null);
 
    if (xhr.readyState == 4 && xhr.status == 200)
    {
        return xhr.responseText;
    }          
    else
    {
        return false;
    }
}
 
function get_sous_cat(id_cat)
{
    var xhr = new XMLHttpRequest();
    xhr.open('GET', 'models/model_search_advanced_selector_ajax.php?id_categorie='+id_cat, false);
    xhr.send(null);
 
    if (xhr.readyState == 4 && xhr.status == 200)
    {
        return xhr.responseText;
    }          
    else
    {
        return false;
    }
}
 

 
 
 
 
 
 selec_rub_s.onchange =  function() {
     alert("Vous m'avez cliqué !");
  };
 
selec_rub_s.onchange = function()
{
    var id_rub = selec_rub_s.value;
    selec_cat_s.innerHTML = get_cat(id_rub);
    var id_cat = selec_cat_s.value;
    selec_sous_cat_s.innerHTML = get_sous_cat(id_cat);
 };   

 
 
selec_cat_s.onchange = function()
{
    var id_cat = selec_cat_s.value;
    selec_sous_cat_s.innerHTML = get_sous_cat(id_cat);

};