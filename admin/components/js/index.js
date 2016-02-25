var bouton = document.querySelector('.maintenance_action input');
var selector = document.querySelector('.maintenance_action select');

selector.onchange = function()
{
	
	if(selector.value == 1)
	{
		bouton.style.visibility = 'visible';
		bouton.style.opacity = "1";
		bouton.style.backgroundColor = '#696969';
		bouton.value = selector.options[selector.selectedIndex].text;
	}
	else(selector.value == 0)
	{
		bouton.style.visibility = 'visible';
		bouton.style.opacity = "1";
		bouton.style.backgroundColor = '#696969';
		bouton.value = selector.options[selector.selectedIndex].text;
	}
};



var input_email = document.querySelector('.input_email');
var input_submit = document.querySelector('.input_email_submit');


input_email.onfocus = function()
{
	input_submit.style.display = 'inline-block';
	input_email.style.borderRadius = '0';
	input_email.style.borderTopLeftRadius = '4px';
	input_email.style.borderBottomLeftRadius = '4px';
	input_email.style.border= '2px #d5d5d5 solid';
	input_email.style.borderRight = '0';
}