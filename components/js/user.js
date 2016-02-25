var onglet1= document.getElementById('navone');
var onglet2= document.getElementById('navtwo');
var onglet3= document.getElementById('navtree');
var block1= document.getElementById('self');
var block2= document.getElementById('comment');
var block3= document.getElementById('items');
var button= document.getElementById('add_comment_button');
var blockZone= button.parentNode;
var warning= blockZone.lastChild;
var writeZone= document.getElementById('input_comment');
var txta= document.getElementsByTagName('textarea');

var comment = document.querySelectorAll('.comment_in');
var img_comment = document.querySelectorAll('.comment_in img');

var nav= document.querySelector('#user_description');
var navFlag= nav.className;


if (navFlag == 'after_comment')
{
	(function ()
	{
		onglet2.className ='active';
		onglet1.className ='inactive';
		onglet3.className ='inactive';
		block2.style.display ='block';
		block1.style.display ='none';
		block3.style.display ='none';
	})();

}


if (navFlag == 'itemof')
{
	(function ()
	{
		onglet3.className ='active';
		onglet2.className ='inactive';
		onglet1.className ='inactive';
		block3.style.display ='block';
		block2.style.display ='none';
		block1.style.display ='none';
	})();

}



onglet1.onclick = function()
{
    onglet1.className ='active';
    onglet2.className ='inactive';
	onglet3.className ='inactive';
    block1.style.display ='block';
    block2.style.display ='none';
	block3.style.display ='none';
	return false;
};

onglet2.onclick = function()
{
    onglet2.className ='active';
    onglet1.className ='inactive';
	onglet3.className ='inactive';
    block2.style.display ='block';
    block1.style.display ='none';
	block3.style.display ='none';
	
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

onglet3.onclick = function()
{
    onglet3.className ='active';
    onglet2.className ='inactive';
	onglet1.className ='inactive';
    block3.style.display ='block';
    block2.style.display ='none';
	block1.style.display ='none';
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







var my_comment = document.querySelector('#add_comment_zone');
var my_pic = document.querySelector('#add_comment_zone img');

var champ = document.querySelector('.comment_in textarea');

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
