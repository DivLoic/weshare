<?php
	require ('models/model_admin_FAQ_action.php');
	
	if(ISSET($_POST['add_question_input']) AND ISSET($_POST['add_reponse_input']) AND ISSET($_POST['id_titre_FAQ']))
	{
		if(!preg_match("#^ *$#i",$_POST['add_question_input']) AND !preg_match("#^ *$#i",$_POST['add_reponse_input'] AND $_POST['id_titre_FAQ']!= 0))
		{
			add_question($_POST['add_question_input'], $_POST['add_reponse_input'],$_POST['id_titre_FAQ']);
			$result = 'add';
		}
	}
	
	
	if(ISSET($_POST['actions']))
	{
		$check_questions = check_question();
		
		if($_POST['actions'] == 'Supprimer')
		{
			while($check_question = $check_questions->fetch())
			{
				if(ISSET($_POST[$check_question['id']]))
				{
					delete_question($check_question['id']);
					$result = 'delete';
				}
			}
		}
		else if($_POST['actions'] == 'Modifier')
		{
				if(ISSET($_POST['id_question']))
					{
						update_question($_POST['question'],$_POST['reponse'],$_POST['id_question']);
						$result = 'update';
					}
		}
	}

		
	if(ISSET($result))
	{
		if($result == 'add')
		{
			include ('controllers/controller_admin_FAQ_add.php');
		}
		elseif($result == 'update')
		{
			include ('controllers/controller_admin_FAQ_update.php');
		}
		elseif($result == 'delete')
		{
			include ('controllers/controller_admin_FAQ_delete.php');
		}
	}
	else
	{
		include ('controllers/controller_index.php');
	}
?>