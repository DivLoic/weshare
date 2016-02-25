<?php
	echo $_POST['pseudo'];
	echo '<br />';
	echo $_POST['pass'];
	
	unset($_POST['pass']);
	echo '<br />';
	
	echo $_POST['pseudo'];
	echo '<br />';
	echo $_POST['pass'];
?>