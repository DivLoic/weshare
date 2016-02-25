var reponses = document.querySelectorAll('.reponses');
var question = document.querySelectorAll('.question');
var arrow_hide = document.querySelectorAll('.arrow_hide');
var envoyer = document.querySelector('#input_submit');

		
        for (var j = 0,c = reponses.length; j<c; j++)
        {
		reponses[j].className = 'hide';
		arrow_hide[j].className = 'hide';
        }
	

		
function question_open(i)
{
        if(reponses[i].className == 'hide')
        {
        question[i].className = 'question_open';
        reponses[i].className = 'show';
		arrow_hide[i].className = 'arrow_show';
        }
        else 
        {
		question[i].className = 'question';
        reponses[i].className = 'hide';
		arrow_hide[i].className = 'hide';
        }
}


for(var i=0, nb = question.length ; i < nb ; i++)
{
	question[i].onclick = (function() {
		var nb = i;
		return function()
		{
			question_open(nb);
		}
	})();
}



envoyer.onmouseover = function()
{
	envoyer.style.backgroundColor= '#34b1bc';
};

envoyer.onmouseout = function()
{
	envoyer.style.backgroundColor= '#b0e0e2';
};