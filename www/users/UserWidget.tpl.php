<div class="center">
		<?php $_CONTROL->txtFirstName->RenderWithName('CssClass=form-control'); ?>
		<?php $_CONTROL->txtLastName->RenderWithName('CssClass=form-control'); ?>	
		<?php $_CONTROL->txtEmail->RenderWithName('CssClass=form-control'); ?>	
		<?php $_CONTROL->txtUsername->RenderWithName('CssClass=form-control'); ?>
		<?php $_CONTROL->txtPassword->RenderWithName('CssClass=form-control'); ?>
		<div class="form-group">
  			<label>Select Users Access Level:</label>
		<?php $_CONTROL->lstAccessLevel->RenderWithName('CssClass=form-control'); ?>
		</div>
		
		<div class="buttonBar">
			<?php $_CONTROL->btnSubmit->Render(); ?>
			<?php $_CONTROL->btnCancel->Render(); ?>
		</div>
</div>