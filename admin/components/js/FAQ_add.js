var selec_id_titre_FAQ = document.querySelector('#id_titre_FAQ');

var input_FAQ = document.querySelectorAll('.add_FAQ_input');
var submit_FAQ = document.querySelectorAll('.add_FAQ_submit');


selec_id_titre_FAQ.onchange  = function()
{
	if(selec_id_titre_FAQ.value != 0)
	{
		input_FAQ[0].style.visibility = 'visible';
		input_FAQ[0].style.opacity = "1";
		input_FAQ[1].style.visibility = 'visible';
		input_FAQ[1].style.opacity = "1";
		submit_FAQ[0].style.visibility = 'visible';
		submit_FAQ[0].style.opacity = "1";
	}
	else
	{
		input_FAQ[0].style.visibility = 'hidden';
		input_FAQ[0].style.opacity = "0";
		input_FAQ[1].style.visibility = 'hidden';
		input_FAQ[1].style.opacity = "0";
		submit_FAQ[0].style.visibility = 'hidden';
		submit_FAQ[0].style.opacity = "0";
		input_FAQ[0].value = '';
		input_FAQ[1].value = '';
	}
};

submit_FAQ[0].onclick = function()
{
	if(/^ *$/i.test(input_FAQ[0].value) || /^ *$/i.test(input_FAQ[1].value))
	{
		return false;
	}
};


