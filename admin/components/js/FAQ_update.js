var select_FAQ = document.querySelectorAll('table input[type="radio"]');
var select_action = document.querySelector('.user_action select');
var input_action = document.querySelectorAll('.Q_R');
var submit_action = document.querySelector('.update_FAQ_submit')

select_action.onchange = function()
{
	submit_action.value = select_action.value;
	
	if(submit_action.value == 'Modifier')
	{
		input_action[0].style.visibility = 'visible';
		input_action[0].style.opacity = "1";
		input_action[1].style.visibility = 'visible';
		input_action[1].style.opacity = "1";
		submit_action.style.visibility = 'visible';
		submit_action.style.opacity = "1";
		submit_action.style.backgroundColor = '#696969';
		submit_action.style.color = '#ffffff';
		submit_action.style.border = "0";
	}
	else
	{
		input_action[0].style.opacity = "0";
		input_action[0].style.visibility = 'hidden';
		input_action[1].style.opacity = "0";
		input_action[1].style.visibility = 'hidden';
		submit_action.style.opacity = "0";
		submit_action.style.visibility = 'hidden';
	}	
	
};


var input_FAQ = document.querySelectorAll('.Q_R');


function check_submit()
{
	var result = 0;
	
	for(var i=0, nb = select_FAQ.length ; i < nb ; i++)
	{
		if(select_FAQ[i].checked != false)
		{
			result = 1;
		}
	}
	
	if(/^ *$/i.test(input_FAQ[0].value) || /^ *$/i.test(input_FAQ[1].value))
	{
		return false;
	}
	
	else if(result == 0)
	{
		alert('Aucune question sélectionnée.');
		return false;
	}
	else
	{
		var check = confirm ('Voulez-vous vraiment '+submit_action.value.toLowerCase()+' question ?'); if(!check){return false;}
	}
}

submit_action.onclick = function()
{
	return check_submit();
}



coche = document.querySelectorAll('.coche')



for(var i = 0, nb = coche.length ; i < nb ; i++)
{
	coche[i].onclick = (function()
	{
		var nb = i;
		return function() {
			data_ajax = get_question_reponse(coche[nb].value);
			input_action[0].value = data_ajax[0];
			input_action[1].value = data_ajax[1];
		  }
	})();
}


function get_question_reponse(id)
{
	var xhr = new XMLHttpRequest();
	xhr.open('GET', 'models/model_admin_FAQ_update_ajax.php?id=' + id, false);
	xhr.send(null);

	if (xhr.readyState == 4 && xhr.status == 200)
	{
		var data = xhr.responseText;
		var both = data.split('%££%');
		return both;
	}			
	else
	{
		return false;
	}
}