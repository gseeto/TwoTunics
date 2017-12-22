<?php require(__INCLUDES__ . '/header.inc.php'); ?>

<h1>Partners</h1>

<?php if ($this->objUser->AccessLevel == 3) { ?>
<h2>Charity Partners</h2>
<div class="table-responsive">
	<?php  $this->dtgCharity->Render(); ?>
</div>
<?php $this->dlgCharityWidget->Render(); ?>
<p><?php $this->btnAddCharity->Render('CssClass=btn btn-primary'); ?></p>

<?php } else { ?>
<div class="text-danger">You do not have permissions to view this page.</div>
<?php  }?>
<?php require(__INCLUDES__ . '/footer.inc.php'); ?>