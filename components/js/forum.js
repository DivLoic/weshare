var add_topic = document.querySelector('.button_add');
var topic_connexion = document.querySelector('#topic_connexion');


add_topic.onclick = function()
{
	if(add_topic.getAttribute('href') == '#')
	{
		topic_connexion.style.display = 'block';
		return false;
	}
};