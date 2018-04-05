<?php require(__INCLUDES__ . '/header.inc.php'); ?>

<h1>Transactions</h1>


<div class="table-responsive">
	<?php  $this->dtgTransactions->Render(); ?>
</div>
<h2>Total Amount: <?php $this->lblTotalDonationAmount->Render(); ?></h2>


<script "text/javascript">
$(document).ready(function () {
	  $(".nav li").removeClass("active");//this will remove the active class from  
	                                     //previously active menu item 
	  $('#transactions').addClass('active');
	});
</script>
<?php require(__INCLUDES__ . '/footer.inc.php'); ?>