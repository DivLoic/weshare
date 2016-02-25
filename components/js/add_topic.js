var input_titre = document.querySelector('.input_topic');
var tooltip_titre = document.querySelector('#tooltip_titre');

input_titre.addEventListener('blur', function verification_titre() {
    if(!(/^ *$/i.test(input_titre.value)))
	{
        tooltip_titre.style.display = 'none';
        input_titre.className ='input_topic';
    }
    else
    {
        tooltip_titre.style.display = 'block';
        input_titre.className ='input_topic input_invalidate';
    }
}, false);


var input_contenu = document.querySelector('textarea');
var tooltip_contenu = document.querySelector('#tooltip_contenu');

input_contenu.addEventListener('blur', function verification_titre() {
    if(!(/^( |\n)*$/i.test(input_contenu.value)))
	{
        tooltip_contenu.style.display = 'none';
        input_contenu.className ='message_topic';
    }
    else
    {
        tooltip_contenu.style.display = 'block';
        input_contenu.className ='message_topic input_invalidate';
    }
}, false);


var tooltip_type = document.querySelector('#tooltip_type');
var selector_type = document.querySelector('select');

function test_type()
{
	if(selector_type.value == 0)
	{
        tooltip_type.style.display = 'block';
	}
	else
	{
        tooltip_type.style.display = 'none';
	}
}


selector_type.onchange = function()
{
	test_type();
};




var formulaire = document.querySelector('form');

formulaire.onsubmit = function()
{
	input_titre.focus();
	input_titre.blur();
	input_contenu.focus();
	input_contenu.blur();
	test_type();
	
	if(tooltip_type.style.display == 'block' || tooltip_titre.style.display == 'block' || tooltip_contenu.style.display == 'block')
	{
		return false;
	}
	else
	{
		var check = confirm ('Voulez-vous vraiment ajouter ce topic ?');
		if(!check){return false;}
	}
};


var annuler = document.querySelector('.cancel');

annuler.onclick = function()
{
	window.location = "index.php?target=forum";
}