var padlock = document.querySelector('#padlock_lock');
var input_password = document.querySelector('#password_input');
var input_old_password = document.querySelector('#old_password');
var submit_button = document.querySelector('.submit_password');
var cancel_button = document.querySelector('.cancel_password');



function show_password()
{
	if(padlock.id == 'padlock_lock')
	{
		input_password.type = 'text';
		padlock.id = 'padlock_open';
	}
	else
	{
		input_password.type = 'password';
		padlock.id = 'padlock_lock';
	}
}

padlock.onclick = function()
{
	show_password();
}

var tooltip = document.querySelector('.message_error');

input_password.addEventListener('blur', function verification_password() {
    if(!(/[a-z].*[0-9]|[0-9].*[a-z]/i.test(input_password.value) && /.{6,}/i.test(input_password.value)))
	{
        tooltip.style.display = 'block';
        input_password.className ='password_input input_error';
    }
    else
    {
    	tooltip.style.display = 'none';
        input_password.className ='password_input';
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