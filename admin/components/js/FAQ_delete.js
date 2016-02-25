var select_FAQ = document.querySelectorAll('table input[type="checkbox"]');
var select_all = document.querySelector('.select_all input[type="checkbox"]');
var text_select_all = document.querySelector('.all_selected');

function check_all()
{
	for(var i=0, nb = select_FAQ.length ; i < nb ; i++)
	{
		select_FAQ[i].checked = true;
	}
}

function uncheck_all()
{
	for(var i=0, nb = select_FAQ.length ; i < nb ; i++)
	{
		select_FAQ[i].checked = false;
	}
}


select_all.onclick = function()
{
	if(select_all.checked == true)
	{
		check_all();
	}
	else
	{
		uncheck_all();
	}
};

text_select_all.onclick = function()
{
	if(select_all.checked == false)
	{
		select_all.checked = true;
		check_all();
	}
	else
	{
		select_all.checked = false;
		uncheck_all();
	}
};

var select_action = document.querySelector('.user_action select');
var submit_action = document.querySelector('.user_action input');

select_action.onchange = function()
{
	submit_action.value = select_action.value;
	
	if(submit_action.value == 'Supprimer')
	{
		submit_action.style.visibility = 'visible';
		submit_action.style.opacity = "1";
		submit_action.style.backgroundColor = 'rgb(230,109,117)';
	}
	else
	{
		submit_action.style.opacity = "0";
		submit_action.style.visibility = 'hidden';
	}	
	
};


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
	
	if(result == 0)
	{
		alert('Aucune question sélectionnée.');
		return false;
	}
	else
	{
		var check = confirm ('Voulez-vous vraiment '+submit_action.value.toLowerCase()+' le ou les question(s) ?'); if(!check){return false;}
	}
}

submit_action.onclick = function()
{
	return check_submit();
}