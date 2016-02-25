<?php
    require('models/model_help_dyn.php');
    
    $FAQ1 = select_FAQ(1);
    
    $FAQ2 = select_FAQ(2);
    
    $FAQ3 = select_FAQ(3);
    
    $FAQ4 = select_FAQ(4);
    
    
    include ('views/view_help_dyn.php');
?>
