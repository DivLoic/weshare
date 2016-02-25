var selec_rub_c = document.querySelector('#id_rubrique_c');

var selec_rub_s = document.querySelector('#id_rubrique_s');
var selec_cat_s = document.querySelector('#id_categorie_s');
var input_cat_s = document.querySelectorAll('.add_sous_cat_input');
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


selec_rub_c.onchange = function()
{
	if(selec_rub_c.value != 0)
	{
		input_cat_s[0].style.visibility = 'visible';
		input_cat_s[0].style.opacity = "1";
		submit_cat_s[0].style.visibility = 'visible';
		submit_cat_s[0].style.opacity = "1";
	}
	else
	{
		input_cat_s[0].style.visibility = 'hidden';
		input_cat_s[0].style.opacity = "0";
		submit_cat_s[0].style.visibility = 'hidden';
		submit_cat_s[0].style.opacity = "0";
		input_cat_s[0].value = '';
	}
};



selec_rub_s.onchange = function()
{
	var id_rub = selec_rub_s.value;
	selec_cat_s.innerHTML = get_cat(id_rub);
	
	input_cat_s[1].style.visibility = 'hidden';
	input_cat_s[1].style.opacity = "0";
	submit_cat_s[1].style.visibility = 'hidden';
	submit_cat_s[1].style.opacity = "0";
	input_cat_s[1].value = '';
};

selec_cat_s.onchange = function()
{
	if(selec_cat_s.value != 0)
	{
		input_cat_s[1].style.visibility = 'visible';
		input_cat_s[1].style.opacity = "1";
		submit_cat_s[1].style.visibility = 'visible';
		submit_cat_s[1].style.opacity = "1";
	}
	else
	{
		input_cat_s[1].style.visibility = 'hidden';
		input_cat_s[1].style.opacity = "0";
		submit_cat_s[1].style.visibility = 'hidden';
		submit_cat_s[1].style.opacity = "0";
		input_cat_s[1].value = '';
	}
};



submit_cat_s[0].onclick = function()
{
	if(/^ *$/i.test(input_cat_s[0].value))
	{
		return false;
	}
};

submit_cat_s[1].onclick = function()
{
	if(/^ *$/i.test(input_cat_s[1].value))
	{
		return false;
	}
};


