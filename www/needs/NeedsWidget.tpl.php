<div class="">
		<?php $_CONTROL->txtDescription->RenderWithName('CssClass=form-control'); ?>		
		<?php $_CONTROL->txtQuantityRequested->RenderWithName('CssClass=form-control'); ?>	
		<?php $_CONTROL->txtQuantityWarning->Render('CssClass=text-danger'); ?>
		<div class="form-group">
  			<label>Select The Type being Donated:</label>
		<?php $_CONTROL->lstUnitGenre->Render('CssClass=form-control'); ?>
		<?php $_CONTROL->txtTypeWarning->Render('CssClass=text-danger'); ?>
		</div>
		<div class="form-group">
		<?php $_CONTROL->lstSize->Render('CssClass=form-control'); ?>
		<?php $_CONTROL->txtSizeWarning->Render('CssClass=text-danger'); ?>		
		</div>
		<div class="buttonBar">
			<?php $_CONTROL->btnSubmit->Render(); ?>
			<?php $_CONTROL->btnCancel->Render(); ?>
		</div>
</div>