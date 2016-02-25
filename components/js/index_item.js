var item = document.querySelectorAll('.item');
var link_item = document.querySelectorAll('.item_description');
var image = document.querySelectorAll('.item img');
var mask_item = document.querySelector('#mask_item');
var modal_win_item = document.querySelector('#modal_item');
var center_item = document.querySelector('.item_center');
var cross_item = document.querySelector('.item_cross');
var cancel_item = document.querySelector('#modal_item .button_window button:first-child');
var see = document.querySelector('#see_item');
var title = document.querySelector('.item_top h1');

function launch_modal_window_item()
{
	mask_item.style.display = 'block';
    modal_win_item.style.display = 'block';
}

function stop_modal_window_item()
{
    modal_win_item.style.display = 'none';
    mask_item.style.display = 'none';
}

function item_information(id)
{
	var xhr = new XMLHttpRequest();
	xhr.open('GET', 'models/model_ajax_modal_content_item.php?item_id=' + id, false);
	xhr.send(null);

	if (xhr.readyState == 4 && xhr.status == 200)
	{
		var informations = xhr.responseText;
		var both = informations.split('%££%');
		return both;
	}			
	else
	{
		return false;
	}
}

for(var i=0, nb = item.length ; i < nb ; i++)
{
	image[i].onclick = (function() {
		  var nb = i;
		  return function() {
			item_ajax = item_information(item[nb].id);
			if(item_ajax[3] > 0)
			{
				title.innerHTML = item_ajax[0];
				center_item.innerHTML = item_ajax[1];
				see.href = item_ajax[2];
				see.style.display = 'inline-block';
			}
			else
			{
				title.innerHTML = 'Objet inexistant';
				center_item.innerHTML = '<div style="padding: 15px; font-size: 1.7em; line-height:1.4em; color:grey;">L\'objet n\'existe malheureusement plus. Il a pu être choisi comme il a pu être supprimé.</div>';
				see.href = '#';
				see.style.display = 'none';
			}
			launch_modal_window_item();
			return false;
		  }
	   })();
}

for(var i=0, nb = item.length ; i < nb ; i++)
{
	link_item[i].onclick = (function() {
		  var nb = i;
		  return function() {
			item_ajax = item_information(item[nb].id);
			title.innerHTML = item_ajax[0];
			center_item.innerHTML = item_ajax[1];
			see.href = item_ajax[2];
			launch_modal_window_item();
			return false;
		  }
	   })();
}

mask_item.onclick = function(){ stop_modal_window_item(); };
cross_item.onclick = function(){ stop_modal_window_item(); };
cancel_item.onclick = function(){ stop_modal_window_item(); };