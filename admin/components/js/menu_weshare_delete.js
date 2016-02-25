var selec_rub_c = document.querySelector('#id_rubrique_c');
var selec_cat_c = document.querySelector('#id_categorie_c');

var selec_rub_s = document.querySelector('#id_rubrique_s');
var selec_cat_s = document.querySelector('#id_categorie_s');
var selec_sous_cat_s = document.querySelector('#id_sous_categorie_s');


var submit_cat_s = document.querySelectorAll('.add_sous_cat_submit');



function get_cat(id_rub)
{
	var xhr = new XMLHttpRequest();
	xhr.open('GET', 'models/model_menu_weshare_ajax.php?id_rubrique='+id_rub, false);
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
	xhr.open('GET', 'models/model_menu_weshare_ajax.php?id_categorie='+id_cat, false);
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


selec_cat_c.onchange = function()
{
	if(selec_cat_c.value != 0)
	{
		submit_cat_s[0].style.visibility = 'visible';
		submit_cat_s[0].style.opacity = "1";
	}
	else
	{
		submit_cat_s[0].style.visibility = 'hidden';
		submit_cat_s[0].style.opacity = "0";
	}
};

selec_rub_c.onchange = function()
{
	var id_rub = selec_rub_c.value;
	selec_cat_c.innerHTML = get_cat(id_rub);
	
	submit_cat_s[0].style.visibility = 'hidden';
	submit_cat_s[0].style.opacity = "0";
};







selec_rub_s.onchange = function()
{
	var id_rub = selec_rub_s.value;
	selec_cat_s.innerHTML = get_cat(id_rub);
	var id_cat = selec_cat_s.value;
	selec_sous_cat_s.innerHTML = get_sous_cat(id_cat);
	
	submit_cat_s[1].style.visibility = 'hidden';
	submit_cat_s[1].style.opacity = "0";
};


selec_cat_s.onchange = function()
{
	var id_cat = selec_cat_s.value;
	selec_sous_cat_s.innerHTML = get_sous_cat(id_cat);
	
	submit_cat_s[1].style.visibility = 'hidden';
	submit_cat_s[1].style.opacity = "0";
};






selec_sous_cat_s.onchange = function()
{
	if(selec_sous_cat_s.value != 0)
	{
		submit_cat_s[1].style.visibility = 'visible';
		submit_cat_s[1].style.opacity = "1";
	}
	else
	{
		submit_cat_s[1].style.visibility = 'hidden';
		submit_cat_s[1].style.opacity = "0";
	}
};



submit_cat_s[0].onclick = function()
{
	var check = confirm ('Voulez-vous vraiment supprimer la catégorie '+selec_cat_c.options[selec_cat_c.selectedIndex].text+' ?'); if(!check){return false;}
};

submit_cat_s[1].onclick = function()
{
	var check = confirm ('Voulez-vous vraiment supprimer la sous-catégorie '+selec_sous_cat_s.options[selec_sous_cat_s.selectedIndex].text+' ?'); if(!check){return false;}
};


