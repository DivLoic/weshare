var send = document.querySelector('#send_request');
var champ = document.querySelector('.forget_input');
var formu = document.querySelector('form');
var tooltip = document.querySelector('.sign_in_error');


formu.onsubmit = function()
{
	if(/^ *$/i.test(champ.value))
	{
		champ.className = 'forget_input input_error';
		tooltip.style.display = 'block';
		return false;
	}
	else
	{
		champ.className = 'forget_input';
		tooltip.style.display = 'none';
	}
};

champ.onclick = function()
{
	champ.className = 'forget_input';
	tooltip.style.display = 'none';
}