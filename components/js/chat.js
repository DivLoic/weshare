var frame_chat = document.querySelector('#frame_chat');
var input_chat = document.querySelector('#input_chat');
var form_chat = document.querySelector('#form_chat');
var disconnect_chat = document.querySelector('#disconnect_chat');

var item = document.querySelector('#my_items');

var id_item = item.className;

var content_before = 0, content_after = 0;

var check_write = 0;

frame_chat.scrollTop = frame_chat.scrollHeight;

input_chat.focus();

function get_message(check_write)
{
	var xhr = new XMLHttpRequest();
	xhr.open('GET', 'models/model_ajax_chat.php?check_write=' + check_write + '&id_annonce=' + id_item, false);
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

function send_message(message)
{
	var xhr = new XMLHttpRequest();
	xhr.open('POST', 'models/model_ajax_chat.php');
	xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
	xhr.send('message=' + message + '&id_annonce=' + id_item);
}


function check_user()
{
	var xhr = new XMLHttpRequest();
	xhr.open('GET', 'models/model_ajax_chat_check_user.php?&id_annonce=' + id_item, false);
	xhr.send(null);

	if (xhr.readyState == 4 && xhr.status == 200)
	{
		var check = xhr.responseText;
		if(/1/.test(check))
		{
			window.location.href = 'index.php?target=deal_failure_uncontrolled';
		}
		else if(/2/.test(check))
		{
			window.location.href = 'index.php?target=deal_failure_uncontrolled&m=1';
		}
	}			
	else
	{
		return false;
	}
}



setInterval(function() {
	if(frame_chat.scrollTop+400 == frame_chat.scrollHeight)
	{
		check_user();
		if(!/^ *$/i.test(input_chat.value)){check_write = 1;}else{check_write = 0;}
		content_before = get_message(check_write);
		if(content_before != content_after){frame_chat.innerHTML = content_before;}
		content_after = content_before;
		frame_chat.scrollTop = frame_chat.scrollHeight;
	}
	else
	{
		check_user();
		if(!/^ *$/i.test(input_chat.value)){check_write = 1;}else{check_write = 0;}
		content_before = get_message(check_write);
		if(content_before != content_after){frame_chat.innerHTML = content_before;}
		content_after = content_before;
	}
}, 500);

form_chat.onsubmit = function()
{
	if(!/^ *$/i.test(input_chat.value)){send_message(input_chat.value);}
	input_chat.value = '';
	if(!/^ *$/i.test(input_chat.value)){check_write = 1;}else{check_write = 0;}
	frame_chat.innerHTML = get_message(check_write);
	frame_chat.scrollTop = frame_chat.scrollHeight;
	return false;
};


window.onunload = function()
{
	input_chat.value = '';
	check_write = 0;
	get_message(check_write);
};

