<?php
    require('../../models/bdd_connexion.php');
	
	function get_question_reponse($id)
	{
		global $bdd;
		
		$req = $bdd->prepare('SELECT question, reponse FROM question_reponse WHERE id = ?');
		$req->execute(array($id));
		
		$data = $req->fetch();
		
		return $data;
	}
	
    function replace_para($texte)
    {
		$texte = preg_replace('#\<p>(.+)\</p>#isU', '[p]$1[/p]', $texte);
		return $texte;
	}
	
	
?>



<?php
	if(ISSET($_GET['id']))
	{
		$data = get_question_reponse($_GET['id']);
	}
?>



<?php
	echo $data['question'];
	echo '%££%';
	echo replace_para($data['reponse']);
?>