<?php
    $title = 'Mes transactions';
    $style = 'deal';
    ob_start();
?>
 
<div id="content">
    <div class="container">
        <nav id="profile_menu">
            <ul>
                <li><a href="index.php?target=profile">Mon profil</a></li><li><a href="index.php?target=my_items" >Mes annonces</a></li><li><a href="index.php?target=deal" id="active">Transactions en cours</a></li>
            </ul>
        </nav>
         
        <div id="my_items">
					<?php
					
						if(ISSET($_SESSION['result_transaction']))
						{
							if($_SESSION['result_transaction'] == 1)
							{
								echo '<div class="failure" style="margin: 0 0 20px 0; background-color: #ffffff; text-align: left;">Une ou plusieurs annonces sélectionnées n\'étaient plus disponibles.</div>';
							}
						}
					
					
					
					$nb_in=in_test(); 
					$nb_out=out_test();
					
					if($nb_out['COUNT(*)'] > 0 OR $nb_in['COUNT(*)'] > 0)
					{
						$testone=in_test(); 
						if($testone['COUNT(*)'] != 0)
						{
							echo'<div class="type_deal">Entrante(s)</div>';
							$in= in_deal();
							while($in_data= $in->fetch() )
							{	echo'
								<div class="item_in">
									<a href="index.php?target=item&amp;item_id='.$in_data['id'].'">
										<img src="'.$in_data['url_image'].'" alt="Annonce"/>
									</a>
									<div class="where_item">
										<a href="index.php?target=user&amp;profil='.$in_data['idu'].'">'.$in_data['pseudo'].'</a><br />
									</div>
									<div class="title_item">'.$in_data['description'].'</div>
									<div class="date_item">
										'.$in_data['date'].'
									</div>
									<div class="valid_item">
										<a class="lauch_chat_button" href="index.php?target=chat&amp;chat_id='.$in_data['id'].'#">Plus</a>
									</div>
								</div>';
							}
						}
					
						$testtwo=out_test();
						if($testtwo['COUNT(*)'] != 0)
						{
							echo'
							<div class="type_deal">Sortante(s)</div>';
						
							$out= out_deal();
							while($out_data= $out->fetch() )
							{	echo'
								<div class="item_in">
									<a href="index.php?target=item&amp;item_id='.$out_data['id'].'">
										<img src="'.$out_data['url_image'].'" alt="Annonce"/>
									</a>
									<div class="where_item">
										<a href="index.php?target=user&amp;profil='.$out_data['idu'].'">'.$out_data['pseudo'].'</a><br />
									</div>
									<div class="title_item">'.$out_data['description'].'</div>
									<div class="date_item">
										'.$out_data['date'].'
									</div>
									<div class="valid_item">
										<a class="lauch_chat_button" href="index.php?target=chat&amp;chat_id='.$out_data['id'].'#">Plus</a>
									</div>
								</div>';
							}
						}
					}
					else
					{
						if(!ISSET($_SESSION['result_transaction'])){ echo '<div class="my_deal_empty">Aucune transaction en cours.</div>'; }
					}
					
					
					if(ISSET($_SESSION['result_transaction'])){ unset($_SESSION['result_transaction']); }
					
					
					?>
					
				
        </div>
                
    </div>
</div>

 
<?php
    $content = ob_get_clean();
    include ('template.php');
?>
    
    		
