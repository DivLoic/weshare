var button = document.querySelector('#personal_information button:first-child');
var input = document.querySelectorAll('#personal_information_input input');
var validation = document.querySelector('#personal_information_validation');
var cancel = document.querySelector('#personal_information_validation input:first-child');
var form = document.querySelector('#content_personal_information form');
var launch_img = document.querySelector('#launch_img');
var input_img_profile = document.querySelector('#input_img_profile');

var description = document.querySelector('.input_description');

button.onclick = function()
{
	for(var i=0, nb=input.length ; i<nb ; i++)
    {
    	if(input[i].value!='Paris'){input[i].removeAttribute('readonly');}
    }
    description.removeAttribute('readonly');
    
	validation.style.display = 'block';
	
    button.style.display = 'none';
};

cancel.onclick = function()
{
	for(var i=0, nb=input.length ; i<nb ; i++)
    {
    	if(input[i].value!='Paris'){input[i].setAttribute('readonly', 'readonly');}
    }
    description.setAttribute('readonly');
    
    validation.style.display = 'none';
    button.style.display = 'inline-block';
};

if(form.id == 'first_connexion_form')
{
	for(var i=0, nb=input.length ; i<nb ; i++)
    {
    	if(input[i].value!='Paris'){input[i].removeAttribute('readonly');}
    }
    description.removeAttribute('readonly');
    
	validation.style.display = 'block';
	
    button.style.display = 'none';
}

input_img_profile.onmouseover = function()
{
	launch_img.style.textDecoration = 'underline';
};

input_img_profile.onmouseout = function()
{
	launch_img.style.textDecoration = 'none';
};