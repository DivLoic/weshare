<?php
    $title = 'Aide';
    $style = 'help';
    ob_start();
?>
<div id="content">
    <div class="container">
    <h2 id="faq">FAQ / Aide</h2>
    
    <h4>I. Mon compte :</h4>
    
    <?php
    while ($block1 = $FAQ1->fetch())
    {
    ?>
      <div class="question"><?php echo $block1['question']; ?></div>
      <div class="arrow_hide"></div>
      <div class="reponses">
      <?php echo $block1['reponse']; ?>
      </div>
    <?php
    }
    ?>
    
    <h4>II. Les annonces :</h4>
    
    <?php
    while ($block2 = $FAQ2->fetch())
    {
    ?>
      <div class="question"><?php echo $block2['question']; ?></div>
      <div class="arrow_hide"></div>
      <div class="reponses">
      <?php echo $block2['reponse']; ?>
      </div>
    <?php
    }
    ?>
    
    <h4>III. Mon carton et mes transactions :</h4>
    
    <?php
    while ($block3 = $FAQ3->fetch())
    {
    ?>
      <div class="question"><?php echo $block3['question']; ?></div>
      <div class="arrow_hide"></div>
      <div class="reponses">
      <?php echo $block3['reponse']; ?>
      </div>
    <?php
    }
    ?>
    
    <h4>IV. Le forum :</h4>
    
    <?php
    while ($block4 = $FAQ4->fetch())
    {
    ?>
      <div class="question"><?php echo $block4['question']; ?></div>
      <div class="arrow_hide"></div>
      <div class="reponses">
      <?php echo $block4['reponse']; ?>
      </div>
    <?php
    }
    ?>
	<h2 id="contact_us" style="margin-top: 120px;">Nous contacter</h2>
		
		<form action="index.php?target=contact" method="post">
			<div id="send_mail">
				<div class="arrow_email"></div>
				<?php if(!ISSET($_SESSION['id'])){ echo '<input type="text" id="input_email" placeholder="Votre adresse e-mail" name="email" spellcheck="false" />'; } ?>
				<textarea id="input_content" placeholder="Exprimez-vous..." name="content" ></textarea>
			</div>
			<input id="input_submit" type="submit" />
		</form>
    
    </diV>
</div>

<script type="text/javascript" src="components/js/help.js"></script>

<?php
	if(ISSET($_SESSION['id']))
	{
		echo '<script type="text/javascript" src="components/js/help_mail_connected.js"></script>';
	}
	else
	{
		echo '<script type="text/javascript" src="components/js/help_mail.js"></script>';
	}
?>

<?php
    $content = ob_get_clean();
    include ('template.php');
?>
