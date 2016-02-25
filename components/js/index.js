var button_inscription = document.querySelector('#click_inscription');
var mask = document.querySelector('#mask');
var modal_win = document.querySelector('#inscription');
var cross = document.querySelector('#inscription .cross');
var cancel = document.querySelector('#inscription .button_window button:first-child');
var form = document.querySelector('#inscription form');
var button_submit = document.querySelector('#inscription .button_window button:nth-child(2)');
var padlock = document.querySelector('#padlock_lock');
var input_password = document.querySelector('#inscription_password input');
var inscription_check = document.querySelector('#checkbox_inscription');

var input_inscription = document.querySelectorAll('.block_inscription input');
var tooltip = document.querySelectorAll('.tooltip p');

function launch_modal_window()
{
	mask.style.display = 'block';
    modal_win.style.display = 'block';
}

function stop_modal_window()
{
    modal_win.style.display = 'none';
    mask.style.display = 'none';
    for(var i = 0, nb = tooltip.length ; i < nb ; i++)
    {
    	tooltip[i].style.display = 'none';
    }
    for(var i = 0, nb = input_inscription.length ; i <nb ; i++)
    {
        input_inscription[i].className = 'input_inscription';
    }
	input_inscription[1].type = 'password';
	padlock.id = 'padlock_lock';
    form.reset();
}

function submit_inscription()
{
	if(input_inscription[0].className == 'input_inscription input_validate' && input_inscription[1].className == 'input_inscription input_validate' && input_inscription[2].className == 'input_inscription input_validate' && input_inscription[3].className == 'input_inscription input_validate' && inscription_check.checked == true && check_bdd_input('check_email.php?email=', input_inscription[0].value) == 0 && check_bdd_input('check_pseudo.php?pseudo=', input_inscription[2].value) == 0)
	{
		form.submit();
	}
	else
	{
		for(var i = 0, nb = input_inscription.length ; i <nb ; i++)
		{
			input_inscription[i].focus();
			input_inscription[i].blur();
		}
	}
}

function show_password()
{
	if(padlock.id == 'padlock_lock')
	{
		input_inscription[1].type = 'text';
		padlock.id = 'padlock_open';
	}
	else
	{
		input_inscription[1].type = 'password';
		padlock.id = 'padlock_lock';
	}
}

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

function check_input(condition1, condition2, nb)
{
	nb = nb++;

    if(condition1)
	{
		if(condition2)
		{
			tooltip[0+nb*4].style.display = 'block';
			tooltip[1+nb*4].style.display = 'none';
			tooltip[2+nb*4].style.display = 'none';
			tooltip[3+nb*4].style.display = 'none';
			input_inscription[nb].className ='input_inscription input_validate';
		}
		else
		{
			tooltip[0+nb*4].style.display = 'none';
			tooltip[1+nb*4].style.display = 'none';
			tooltip[2+nb*4].style.display = 'block';
			tooltip[3+nb*4].style.display = 'none';
			input_inscription[nb].className ='input_inscription input_invalidate';
        }
    }
    else if (input_inscription[nb].value.length > 0)
    {
			tooltip[0+nb*4].style.display = 'none';
			tooltip[1+nb*4].style.display = 'block';
			tooltip[2+nb*4].style.display = 'none';
			tooltip[3+nb*4].style.display = 'none';
        	input_inscription[nb].className ='input_inscription input_invalidate';
    }
    else
    {
			tooltip[0+nb*4].style.display = 'none';
			tooltip[1+nb*4].style.display = 'none';
			tooltip[2+nb*4].style.display = 'none';
			tooltip[3+nb*4].style.display = 'block';
        	input_inscription[nb].className ='input_inscription input_invalidate';
    }
}

button_inscription.onclick = function(){ launch_modal_window(); return false; };
mask.onclick = function(){ stop_modal_window(); };
cross.onclick = function(){ stop_modal_window(); };
cancel.onclick = function(){ stop_modal_window(); };
padlock.onclick = function(){ show_password(); };
button_submit.onclick = function(){ submit_inscription(); };

input_inscription[0].onblur = function(){ check_input(/^[a-z][a-z0-9._-]*@[a-z][a-z0-9._-]+\.[a-z]{2,}$/i.test(input_inscription[0].value), check_bdd_input('models/model_ajax_check_email.php?email=', input_inscription[0].value) == 0, 0); };
input_inscription[1].onblur = function(){ check_input(input_inscription[1].value.length >= 6, /[a-z].*[0-9]|[0-9].*[a-z]/i.test(input_inscription[1].value), 1); };
input_inscription[2].onblur = function(){ check_input(/^[a-z][a-z0-9_-]{2,18}/i.test(input_inscription[2].value), check_bdd_input('models/model_ajax_check_pseudo.php?pseudo=', input_inscription[2].value) == 0, 2); };
input_inscription[3].onblur = function(){ check_input(/^[0-9]{5}$/i.test(input_inscription[3].value), /^750([0-1][1-9]|20)$/i.test(input_inscription[3].value), 3); };















var formulaire = document.querySelector('#banner form');
var tooltips = document.querySelectorAll('#connexion p');
var champs = document.querySelectorAll('#connexion input');

formulaire.onsubmit = function()
{
	reset_result();	
	
	if(/^ *$/i.test(champs[0].value) && /^ *$/i.test(champs[1].value))
	{
		tooltips[0].style.display = 'block';
		champs[0].className = 'input_basis input_user input_error';
		champs[1].className = 'input_basis input_password input_error';
		return false;
	}
	else if(/^ *$/i.test(champs[1].value))
	{
		tooltips[0].style.display = 'block';
		champs[1].className = 'input_basis input_password input_error';
		return false;
	}
	else if(/^ *$/i.test(champs[0].value))
	{
		tooltips[0].style.display = 'block';
		champs[0].className = 'input_basis input_user input_error';
		return false;
	}
	else if(check_sign_in(champs[0].value,champs[1].value) == 0)
	{
		tooltips[1].style.display = 'block';
		champs[0].className = 'input_basis input_user input_error';
		champs[1].className = 'input_basis input_password input_error';
		return false;
	}
};


function reset_result()
{
	tooltips[0].style.display = 'none';
	tooltips[1].style.display = 'none';
	champs[0].className = 'input_basis input_user';
	champs[1].className = 'input_basis input_password';
}


function check_sign_in(email,password)
{
	var xhr = new XMLHttpRequest();
	xhr.open('POST', 'models/model_ajax_sign_in.php',false);
	xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
	xhr.send('email=' + email + '&password=' + password);
	if (xhr.readyState == 4 && xhr.status == 200)
	{
		return xhr.responseText;
	}			
	else
	{
		return false;
	}
}