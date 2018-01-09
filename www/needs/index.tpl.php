<?php require(__INCLUDES__ . '/header.inc.php'); ?>

<h1>Donations</h1>


<div class="table-responsive">
	<?php  $this->dtgNeeds->Render(); ?>
</div>
<?php $this->dlgNeedsWidget->Render(); ?>
<?php $this->dlgFulfillWidget->Render(); ?>

<p><?php $this->btnAddNeeds->Render('CssClass=btn btn-primary'); ?></p>

<script "text/javascript">
$(document).ready(function () {
	  $(".nav li").removeClass("active");//this will remove the active class from  
	                                     //previously active menu item 
	  $('#needs').addClass('active');
	});
</script>
<?php require(__INCLUDES__ . '/footer.inc.php'); ?>