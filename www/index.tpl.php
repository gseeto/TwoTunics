<?php require(__INCLUDES__ . '/header.inc.php'); ?>

<div class="loginContainer">
	<img class="" src="<?php _p(__VIRTUAL_DIRECTORY__ . __IMAGE_ASSETS__); ?>/Two-Tunics_logo.png" style="display: block; margin: 0 auto; width:300px;"/>
	<div class="center">
		<h3><?php $this->lblMessage->Render(); ?></h3>
		<?php $this->txtUsername->RenderWithName('CssClass=form-control'); ?>
		<?php $this->txtPassword->RenderWithName('CssClass=form-control'); ?>
		<div class="checkbox">	
			<?php $this->chkRemember->RenderWithName(); ?>
		</div>	
		
		<div class="buttonBar">
			<?php $this->btnLogin->Render('CssClass=btn-primary'); ?>
		</div>
	</div>
</div>
<br>
<div class="section">
<!-- <?php $this->lblDebug->Render(); ?> -->
</div>
<?php require(__INCLUDES__ . '/footer.inc.php'); ?>