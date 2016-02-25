var boutton= document.querySelector('#the_button');
var text= document.getElementById('the_text');




boutton.onclick = function()
{
	text.style.display='block';
	return false;
};