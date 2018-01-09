<div class="">
		
		<div class="form-group">
		<?php $_CONTROL->lstDonations->RenderWithName('CssClass=form-control'); ?>
		</div>
		<div style="height:100px;">
		<?php $_CONTROL->lblDonationDetails->RenderWithName(); ?>
		</div>
		<?php $_CONTROL->txtQuantityRequested->RenderWithName('CssClass=form-control'); ?>	
		
		<div class="buttonBar">
			<?php $_CONTROL->btnSubmit->Render(); ?>
			<?php $_CONTROL->btnCancel->Render(); ?>
		</div>
</div>