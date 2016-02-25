<?php
    require('../models/bdd_connexion.php');
    
    function replace_para($texte)
    {
		$texte = preg_replace('#\[p\](.+)\[/p\]#isU', '<p>$1</p>', $texte);
		return $texte;
	}
	
	function add_question($question, $reponse, $id_parent)
	{
		global $bdd;
		
		$req = $bdd->prepare('INSERT INTO question_reponse(question, reponse,id_parent) VALUES(?, ?, ?)');
		$req->execute(array(htmlspecialchars($question), replace_para(htmlspecialchars($reponse)), $id_parent));
	}
	
	
	
	function update_question($question, $reponse, $id)
	{
		global $bdd;
		
		$req = $bdd->prepare('UPDATE question_reponse SET question = ?, reponse = ? WHERE id = ?');
		$req->execute(array(htmlspecialchars($question), replace_para(htmlspecialchars($reponse)), $id));
	}
	
	
	function delete_question($id)
	{
		global $bdd;
		
		$req1 = $bdd->prepare('DELETE FROM question_reponse WHERE id = ?');
		$req1->execute(array($id));
	}
	
	    function check_question()
    {
    	global $bdd;
    	
    	$req = $bdd->query('SELECT id FROM question_reponse');
    	
    	return $req;
    }
	
?>