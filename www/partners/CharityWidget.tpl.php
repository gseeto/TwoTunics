<div class="center">
		<?php $_CONTROL->txtName->RenderWithName('CssClass=form-control'); ?>
		<?php $_CONTROL->txtDescription->RenderWithName('CssClass=form-control'); ?>	
		<?php $_CONTROL->txtStreet->RenderWithName('CssClass=form-control'); ?>	
		<?php $_CONTROL->txtCity->RenderWithName('CssClass=form-control'); ?>
		<?php $_CONTROL->txtState->RenderWithName('CssClass=form-control'); ?>
		<?php $_CONTROL->txtZipcode->RenderWithName('CssClass=form-control'); ?>
		<?php $_CONTROL->txtPhone->RenderWithName('CssClass=form-control'); ?>
		<?php $_CONTROL->txtEmail->RenderWithName('CssClass=form-control'); ?>
		<?php $_CONTROL->txtContactPerson->RenderWithName('CssClass=form-control'); ?>
		
		
		<div class="buttonBar">
			<?php $_CONTROL->btnSubmit->Render(); ?>
			<?php $_CONTROL->btnCancel->Render(); ?>
		</div>
</div>