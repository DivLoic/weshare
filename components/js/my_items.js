var click_add_item = document.querySelector('#click_add_item');
var mask_item = document.querySelector('#mask_item');
var modal_win_item = document.querySelector('#modal_item');
var center_item = document.querySelector('.item_center');
var cross_item = document.querySelector('.item_cross');
var cancel_item = document.querySelector('#modal_item .button_window button:first-child');
var see = document.querySelector('#see_item');

var block_rub = document.querySelector('#block_rub');
var block_cat = document.querySelector('#block_cat');
var block_sous_cat = document.querySelector('#block_sous_cat');

var selector_rub = document.querySelector('#block_rub select');

var formulaire = document.querySelector('#modal_item form');

var rub = document.querySelector('select[name=id_rubrique]');

function launch_modal_window_item()
{
	mask_item.style.display = 'block';
    modal_win_item.style.display = 'block';
}

function stop_modal_window_item()
{
    modal_win_item.style.display = 'none';
    mask_item.style.display = 'none';
	block_cat.innerHTML = '';
	block_sous_cat.innerHTML = '';
	formulaire.reset();
	tooltip_titre1.style.display = 'none';
	tooltip_titre2.style.display = 'none';
	input_titre.className ='input_my_items';
	
    tooltip_description1.style.display = 'none';
    tooltip_description2.style.display = 'none';
    input_description.className ='input_my_items';
    
	tooltip_photo1.style.display = 'none';
	
	tooltip_range.style.display = 'none';
	
}

function get_cat(id_rub)
{
	var xhr = new XMLHttpRequest();
	xhr.open('GET', 'models/model_ajax_get_my_items.php?id_rubrique='+id_rub, false);
	xhr.send(null);

	if (xhr.readyState == 4 && xhr.status == 200)
	{
		var informations = xhr.responseText;
		var both = informations.split('%££%');
		return both;
	}			
	else
	{
		return false;
	}
}

function get_sous_cat(id_cat)
{
	var xhr = new XMLHttpRequest();
	xhr.open('GET', 'models/model_ajax_get_my_items.php?id_categorie='+id_cat, false);
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


mask_item.onclick = function(){ stop_modal_window_item(); };
cross_item.onclick = function(){ stop_modal_window_item(); };
cancel_item.onclick = function(){ stop_modal_window_item(); };

click_add_item.onclick = function(){ launch_modal_window_item(); };



selector_rub.onchange = function()
{
	tooltip_range.style.display = 'none';
	block_cat.innerHTML = '';
	block_sous_cat.innerHTML = '';
	var both = get_cat(selector_rub.value);
	block_cat.innerHTML = both[0];
	eval(both[1]);
};

function test_cat()
{
	if(/<select name="id_categorie">/i.test(block_cat.innerHTML))
	{
		var cat = document.querySelector('select[name=id_categorie]');
		if(cat.value != 0){ return true; } else { return false; }
	}
	else
	{
		return true;
	}
}

function test_sous_cat()
{
	if(/<select name="id_sous_categorie">/i.test(block_sous_cat.innerHTML))
	{
		var sous_cat = document.querySelector('select[name=id_sous_categorie]');
		if(sous_cat.value != 0){ return true; } else { return false; }
	}
	else
	{
		return true;
	}
}

var tooltip_range = document.querySelector('#item_range p:nth-child(1)');

function test_all_range()
{
	if(test_cat() && test_sous_cat() && rub.value != 0)
	{
		tooltip_range.style.display = 'none';
		return true;
	}
	else
	{
		tooltip_range.style.display = 'block';
		return false;
	}
}










var input_titre = document.querySelector('#item_titre input');
var tooltip_titre1 = document.querySelector('#item_titre p:nth-child(1)');
var tooltip_titre2 = document.querySelector('#item_titre p:nth-child(2)');

input_titre.addEventListener('blur', function verification_titre() {
    if(!(/^ *$/i.test(input_titre.value)))
	{
        tooltip_titre1.style.display = 'block';
        tooltip_titre2.style.display = 'none';
        input_titre.className ='input_my_items input_validate';
    }
    else
    {
        tooltip_titre1.style.display = 'none';
        tooltip_titre2.style.display = 'block';
        input_titre.className ='input_my_items input_invalidate';
    }
}, false);


var input_description = document.querySelector('#item_description textarea');
var tooltip_description1 = document.querySelector('#item_description p:nth-child(1)');
var tooltip_description2 = document.querySelector('#item_description p:nth-child(2)');

input_description.addEventListener('blur', function verification_titre() {
    if(!(/^( |\n)*$/i.test(input_description.value)))
	{
        tooltip_description1.style.display = 'block';
        tooltip_description2.style.display = 'none';
        input_description.className ='input_my_items input_validate';
    }
    else
    {
        tooltip_description1.style.display = 'none';
        tooltip_description2.style.display = 'block';
        input_description.className ='input_my_items input_invalidate';
    }
}, false);

var photo_input = document.querySelector('#item_photo input');
var tooltip_photo1 = document.querySelector('#item_photo p:nth-child(1)');

see.onclick = function()
{
	if(test_all_range() && input_description.className == 'input_my_items input_validate' && input_titre.className == 'input_my_items input_validate' && photo_input.value != '')
	{
		formulaire.submit();
	}
	else
	{
		input_titre.focus();
		input_titre.blur();
		input_description.focus();
		input_description.blur();
		if(photo_input.value == '') { tooltip_photo1.style.display = 'block'; } else { tooltip_photo1.style.display = 'none'; }
		test_all_range();
	}
};


