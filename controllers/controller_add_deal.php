<?php

	require('models/model_add_deal.php');

	if(isset($_SESSION['id']) && isset($_SESSION['my_box']))
	{
		foreach($_SESSION['my_box'] as $keybox => $id_item)
		{
			$add_deal=open_deal($id_item);
			lauch_chat_deal($id_item);
			$mail=lauch_mails($id_item);
			$take_out_item= hide_item($id_item);
			$notifi=update_notif($id_item);
			
		}
		
		unset($_SESSION['my_box']);
		
	}
	include('views/view_add_deal.php');

?>