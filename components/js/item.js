var comment = document.querySelectorAll('.comment_in');
var img_comment = document.querySelectorAll('.comment_in img');
var onglet1= document.getElementById('inactive');
var onglet2= document.getElementById('active');
var block1= document.getElementById('description');
var block2= document.getElementById('comment');
var aft_com = block2.className;
var button= document.getElementById('add_comment_button');
var blockZone= button.parentNode;
var warning= document.getElementById('alert_message');
var writeZone= document.getElementById('add_comment_zone');
var tab=document.getElementsByTagName('form');
var txta= document.getElementsByTagName('textarea');
h=98;



if (aft_com == 'after_comment')
{
	(function ()
	{
		onglet1.id ='active';
		onglet2.id ='inactive';
		block1.style.display ='none';
		block2.style.display ='block';
	})();
	
}

onglet1.onclick = function()
{
    onglet1.id ='active';
    onglet2.id ='inactive';
    block1.style.display ='none';
    block2.style.display ='block';

	for(var i=0, nb = comment.length ; i < nb ; i++)
	{
		hauteur = getComputedStyle(comment[i], null).height;
		if(hauteur != '110px')
		{
			img_comment[i].style.borderBottom = '3px #dddddd solid';
			img_comment[i].style.borderBottomLeftRadius = '0';
			img_comment[i].style.borderBottomRightRadius = '5px';
		}
	}
    
	return false;
};

onglet2.onclick = function()
{
    onglet1.id ='inactive';
    onglet2.id ='active';
    block1.style.display ='block';
    block2.style.display ='none';
	return false;
};

button.onclick= function ()
{
	
	if(blockZone.id == 'connected')
	{
		writeZone.style.display='table';
	}
	else if(blockZone.id == 'not_connected')
	{
		warning.style.display= 'block';
	}

}



tab[0].onblur= function ()
{
	writeZone.style.display='none';
}


var my_comment = document.querySelector('#add_comment_zone');
var my_pic = document.querySelector('#my_comment_img');

var champ = txta[0];

function extensible()
{
    champ.style.height = 'auto';
    champ.style.height = champ.scrollHeight-15+'px';
    
		hauteur = getComputedStyle(my_comment, null).height;
		if(hauteur > '130px')
		{
			my_pic.style.borderBottom = '3px #dddddd solid';
			my_pic.style.borderBottomLeftRadius = '0';
			my_pic.style.borderBottomRightRadius = '5px';
		}
		else
		{
			my_pic.style.borderBottom = '0px #dddddd solid';
			my_pic.style.borderBottomLeftRadius = '5px';
			my_pic.style.borderBottomRightRadius = '0px';
		}
}    


champ.onkeyup = function()
{
    extensible();
};

champ.onkeydown = function()
{
    extensible();
};



champ.onpaste = function()
{
    window.setTimeout(extensible(),0);
};

champ.oncut = function()
{
    window.setTimeout(extensible(),0);
};


champ.ondrop = function()
{
    window.setTimeout(extensible(),0);
};





for(var i=0, nb = comment.length ; i < nb ; i++)
{
	hauteur = getComputedStyle(comment[i], null).height;
	if(hauteur != '110px')
	{
		img_comment[i].style.borderBottom = '3px #dddddd solid';
		img_comment[i].style.borderBottomLeftRadius = '0';
		img_comment[i].style.borderBottomRightRadius = '5px';
	}
}




var send_comment_button = document.querySelector('#send_comment_submit');

send_comment_button.onclick = function()
{
	if(/^( |\n)*$/i.test(champ.value))
	{
		return false;
	}
};
