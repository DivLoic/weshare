var input_password = document.querySelector('#password_input');
var input_old_password = document.querySelector('#old_password');
var submit_button = document.querySelector('.submit_password');
var cancel_button = document.querySelector('.cancel_password');





function check_bdd_input(adresse, pseudo)
{
	var xhr = new XMLHttpRequest();
	xhr.open('GET', adresse + pseudo, false);
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



var tooltip = document.querySelector('.message_error');
var tooltip2 = document.querySelector('.message_error_third');

input_password.addEventListener('blur', function verification_password() {
    if(!(/^[a-z][a-z0-9._-]*@[a-z][a-z0-9._-]+\.[a-z]{2,}$/i.test(input_password.value)))
	{
        tooltip.style.display = 'block';
        input_password.className ='password_input input_error';
    }
    else
    {
    	if(check_bdd_input('models/model_ajax_check_email.php?email=', input_password.value) == 1)
		{
			tooltip.style.display = 'none';
        	tooltip2.style.display = 'block';
        	input_password.className ='password_input input_error';
		}
		else
		{
    		tooltip.style.display = 'none';
    		tooltip2.style.display = 'none';
        	input_password.className ='password_input';
        }
    }
}, false);

var tooltip_bis = document.querySelector('.message_error_bis');
var tooltip_first = document.querySelector('.message_error_first');

input_old_password.addEventListener('blur', function verification_password() {
	
	tooltip_first.style.display = 'none';
	input_old_password.className ='password_input';
	
    if(input_old_password.value.length == 0)
	{
        tooltip_bis.style.display = 'block';
        input_old_password.className ='password_input input_error';
    }
    else
    {
    	tooltip_bis.style.display = 'none';
        input_old_password.className ='password_input';
    }
}, false);



cancel_button.onclick = function()
{
	window.location = "index.php?target=profile";
};



submit_button.onclick = function()
{
	input_old_password.focus();
	input_old_password.blur();
	input_password.focus();
	input_password.blur();
	
	if(!(input_password.className == 'password_input' && input_old_password.className == 'password_input'))
	{
		return false;
	}

};