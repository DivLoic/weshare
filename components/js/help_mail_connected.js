var champ = document.querySelector('#input_content');
var envoyer = document.querySelector('#input_submit');
var bulle = document.querySelector('#send_mail');
var formulaire = document.querySelector('#content form');


function extensible()
{
    champ.style.height = 'auto';
    champ.style.height = champ.scrollHeight-20+'px';
}    


champ.onkeyup = function()
{
    extensible();
	
	test_entry();
};

champ.onkeydown = function()
{
    extensible();
    
	test_entry();
};



champ.onpaste = function()
{
    window.setTimeout(extensible(),0);
    
	test_entry();
};

champ.oncut = function()
{
    window.setTimeout(extensible(),0);
    
	test_entry();
};


champ.ondrop = function()
{
    window.setTimeout(extensible(),0);
    
	test_entry();
};

champ.onblur = function()
{
	test_entry();
};


function test_entry()
{
	if(!(/^( |\n)*$/i.test(champ.value)))
	{
		envoyer.style.visibility = 'visible';
		envoyer.style.opacity = "1";
		bulle.style.borderRadius= '0';
		bulle.style.borderTopLeftRadius= '30px';
		bulle.style.borderTopRightRadius= '30px';
	}
	else
	{
		envoyer.style.opacity = "0";
		envoyer.style.visibility = 'hidden';
		bulle.style.borderRadius= '30px';
	}
}


formulaire.onsubmit = function()
{
	if((/^( |\n)*$/i.test(champ.value)))
	{
		return false;
	}
}