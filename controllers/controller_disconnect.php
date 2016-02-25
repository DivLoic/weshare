<?php
	unset($_SESSION['pseudo']);
	unset($_SESSION['id']);
	
	//echo '<script type="text/javascript">window.location = "index.php";</script>';
	
	include ('views/view_disconnect.php');
?>