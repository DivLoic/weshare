var main_menu = document.querySelectorAll('.a_sub');
var second_menu = document.querySelectorAll('.ul_sub');


for(var i=0, nb = main_menu.length ; i < nb ; i++)
{
	if(main_menu[i].id != 'active')
	{
		second_menu[i].onmouseover = (function()
		{
			var j = i;
			return function()
			{
				main_menu[j].style.backgroundColor = '#585858';
				main_menu[j].style.borderRight = '7px #ececed solid';
			}
		})();
	
		second_menu[i].onmouseout = (function()
		{
			var j = i;
			return function()
			{
				main_menu[j].style.backgroundColor = '#424242';
				main_menu[j].style.borderRight = '0px #ececed solid';
			}
		})();

		main_menu[i].onmouseover = (function()
		{
			var j = i;
			return function()
			{
				main_menu[j].style.backgroundColor = '#585858';
				main_menu[j].style.borderRight = '7px #ececed solid';
			}
		})();
	
		main_menu[i].onmouseout = (function()
		{
			var j = i;
			return function()
			{
				main_menu[j].style.backgroundColor = '#424242';
				main_menu[j].style.borderRight = '0px #ececed solid';
			}
		})();
	
		main_menu[i].onmousedown = (function()
		{
			var j = i;
			return function()
			{
				main_menu[j].style.backgroundColor = '#696969';
			}
		})();
	
		main_menu[i].onmouseup = (function()
		{
			var j = i;
			return function()
			{
				main_menu[j].style.backgroundColor = '#585858';
			}
		})();
	}
}




function resize_content()
{
	var content = document.querySelector('#content');
	var size_content = window.innerHeight - 105;
	content.style.height = size_content+'px';
}

resize_content();

window.onresize = function()
{
	resize_content();
};









var menu = document.querySelector('#main_menu');
var content = document.querySelector('#main_content');
var show_menu = document.querySelector('#show_menu');
var all = document.querySelector('body');


show_menu.onclick = function()
{
	var status = getComputedStyle(menu, null).display;
	
	if(status == 'block')
	{
		menu.style.display = 'none';
		content.style.width = '100%';
		all.style.minWidth = '794px';
	}
	else
	{
		menu.style.display = 'block';
		all.style.minWidth = '1024px';
	}
};