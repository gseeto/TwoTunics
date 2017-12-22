<?php require(__INCLUDES__ . '/header.inc.php'); ?>

<h1>Users</h1>

<?php if ($this->objUser->AccessLevel == 3) { ?>
<div class="table-responsive">
	<?php  $this->dtgUsers->Render(); ?>
</div>
<?php $this->dlgUserWidget->Render(); ?>
<p><?php $this->btnCreateUser->Render('CssClass=btn btn-primary'); ?></p>

<?php } else { ?>
<div class="text-danger">You do not have permissions to view this page.</div>
<?php  }?>
<?php require(__INCLUDES__ . '/footer.inc.php'); ?>