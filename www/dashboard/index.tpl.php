<?php require(__INCLUDES__ . '/header.inc.php'); ?>

<h1>Dashboard</h1>
<?php _p("User: ". $this->objUser->FirstName." ". $this->objUser->LastName)?>
<?php _p("  Role: ". AccessLevel::Load($this->objUser->AccessLevel)->Value )?>

<h3>Needs</h3>
<div class="table-responsive">
	<?php  $this->dtgNeeds->Render(); ?>
</div>
<h3>Donations</h3>
<div class="table-responsive">
	<?php  $this->dtgDonations->Render(); ?>
</div>
<?php if ($this->objUser->AccessLevel == 3) { ?>
<h3>Users</h3>
<div class="table-responsive">
	<?php  $this->dtgUsers->Render(); ?>
</div>
<?php } ?>
<script "text/javascript">
$(document).ready(function () {
	  $(".nav li").removeClass("active");//this will remove the active class from  
	                                     //previously active menu item 
	  $('#dashboard').addClass('active');
	});
</script>
<?php require(__INCLUDES__ . '/footer.inc.php'); ?>