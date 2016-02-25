<?php
    $title = 'Mes transactions';
    ob_start();
?>
 
<div id="content">
    <div class="container">
    	<?php
    		if(ISSET($_GET['m']))
    		{
    			echo '<div class="success" style="margin: 70px 0; text-align: left;">L\'annonce a disparu ! Il s\'agit d\'une confirmation finale de la transaction.<br /><br/>PS : Dans un cas rarissime, il peut s\'agir de la suppression de l\'annonce.</div>';
    		}
    		else
    		{
    			echo '<div class="failure" style="margin: 70px 0; text-align: left;">La transaction est malheureusement annulée.</div>';
    		}
    	?>
		
    </div>
</div>
 
<?php
    $content = ob_get_clean();
    include ('template.php');
?>
    
    		
