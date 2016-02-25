var add_topic = document.querySelector('.button_add');
var topic_connexion = document.querySelector('#topic_connexion');
var answer = document.querySelector('.window_dashboard');


add_topic.onclick = function()
{
	if(add_topic.getAttribute('href') == '#')
	{
		topic_connexion.style.display = 'block';
		return false;
	}
	else
	{
		answer.style.display = 'block';
	}
};

var champ = document.querySelector('textarea');

function extensible()
{
    champ.style.height = 'auto';
    champ.style.height = champ.scrollHeight-15+'px';
}    

champ.onkeyup = function()
{
    extensible();
};

champ.onkeydown = function()
{
    extensible();
};

champ.onpaste = function()
{
    window.setTimeout(extensible(),0);
};

champ.oncut = function()
{
    window.setTimeout(extensible(),0);
};

champ.ondrop = function()
{
    window.setTimeout(extensible(),0);
};




var annuler = document.querySelector('.cancel');

annuler.onclick = function()
{
	answer.style.display = 'none';
	champ.className = 'message_topic';
};

var formulaire = document.querySelector('form');

formulaire.onsubmit = function()
{
	if(/^( |\n)*$/i.test(champ.value))
	{
		champ.className = 'message_topic input_invalidate';
		return false;
	}
};


champ.onfocus = function()
{
	champ.className = 'message_topic';
};
