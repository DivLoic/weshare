<?php
    $title = 'Mes transactions';
    $style = '';
    ob_start();
?>
 
<div id="content">
    <div class="container">
		<div class="success" style="margin: 70px 0; text-align: left;"><?php if($step==1){echo'Vous avez validez la transaction! ';} else if($step==2){echo'La transaction est terminée, l\'annonce va être supprimée. ';}?></div>
    </div>
</div>
 
<?php
    $content = ob_get_clean();
    include ('template.php');
?>
    
    		
