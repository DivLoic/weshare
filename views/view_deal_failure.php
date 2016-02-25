<?php
    $title = 'Mes transactions';
    ob_start();
?>
 
<div id="content">
    <div class="container">
		<div class="failure" style="margin: 70px 0; text-align: left;">La transaction a bien été annulée.</div>
    </div>
</div>
 
<?php
    $content = ob_get_clean();
    include ('template.php');
?>
    
    		
