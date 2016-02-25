<?php
    $title = 'Forum';
    $style = 'forum';
    ob_start();
?>
 
<div id="content">
    <div class="container">
    	
    	<div id="forum">
    	
    		<div id="block_button">
    			<form action="index.php?target=forum" method="post"><input type="text" name="search" class="search_topic" placeholder="Rechercher dans le forum" /></form><a href="<?php if(ISSET($_SESSION['id'])) { echo 'index.php?target=add_topic'; } else { echo '#'; }?>" class="button_add">Nouveau topic</a>
    			<div id="topic_connexion"><a href="" onclick="launch_modal_window(); return false;">Inscrivez-vous</a> ou <a href="#">connectez-vous</a>.</div>
    		</div>
    		<table>
    			<tr>
    				<td class="type">Type</td>
    				<td class="title">Titre</td>
    				<td class="author">Auteur</td>
    				<td class="message">Messages</td>
    				<td class="last_message">Dernier message</td>
    			</tr>
    			
    		<?php
    			if($nb_topic > 0)
    			{
					while($topic = $get_topic->fetch())
					{
					$nb_message = get_nb_message_topic($topic['id']);
				
					if($topic['type'] == '')
					{
						$topic['type'] = 'Divers';
					}
				
					?>
					<tr>
						<td><?php echo $topic['type']; ?></td>
						<td class="title_content"><a href="index.php?target=forum_message&amp;id_topic=<?php echo $topic['id']; ?>"><?php echo print_first_words($topic['titre']); ?></a></td>
						<td class="author_content"><a href="index.php?target=user&amp;profil=<?php echo $topic['id_user']; ?>"><?php echo $topic['pseudo']; ?></a></td>
						<td><?php echo $nb_message; ?></td>
						<td><?php echo $topic['last_date_print']; ?></td>
					</tr>
					<?php
					}
				}
				else
				{
				?>
					<tr>
						<td colspan="5" style="padding: 30px; font-size: 1.3em;">Aucun topic</td>
					</tr>
				<?php
				}
    		?>
    			
    			
    		</table>
    	
    	</div>
    	
    </div>
</div>

<script type="text/javascript" src="components/js/forum.js"></script>
 
<?php
    $content = ob_get_clean();
    include ('template.php');
?>
    
    		
