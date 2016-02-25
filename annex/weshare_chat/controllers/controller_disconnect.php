<?php
	//include('models/model_disconnect.php');
	
	$_SESSION = array();
	session_destroy();
	
	include('views/view_disconnect.php');
?>