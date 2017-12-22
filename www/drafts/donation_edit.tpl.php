<?php
	// This is the HTML template include file (.tpl.php) for the donation_edit.php
	// form DRAFT page.  Remember that this is a DRAFT.  It is MEANT to be altered/modified.

	// Be sure to move this out of the generated/ subdirectory before modifying to ensure that subsequent 
	// code re-generations do not overwrite your changes.

	$strPageTitle = QApplication::Translate('Donation') . ' - ' . $this->mctDonation->TitleVerb;
	require(__INCLUDES__ . '/header.inc.php');
?>

	<?php $this->RenderBegin() ?>

	<div id="titleBar">
		<h2><?php _p($this->mctDonation->TitleVerb); ?></h2>
		<h1><?php _t('Donation')?></h1>
	</div>

	<div id="formControls">
		<?php $this->lblId->RenderWithName(); ?>

		<?php $this->txtDescription->RenderWithName(); ?>

		<?php $this->txtQuantityGiven->RenderWithName(); ?>

		<?php $this->lstUnitType->RenderWithName(); ?>

		<?php $this->lstSize->RenderWithName(); ?>

		<?php $this->lstStatusObject->RenderWithName(); ?>

		<?php $this->txtCostPerUnit->RenderWithName(); ?>

		<?php $this->lstFashionPartner->RenderWithName(); ?>

		<?php $this->calDateDonated->RenderWithName(); ?>

		<?php $this->txtQuantityRemaining->RenderWithName(); ?>

	</div>

	<div id="formActions">
		<div id="save"><?php $this->btnSave->Render(); ?></div>
		<div id="cancel"><?php $this->btnCancel->Render(); ?></div>
		<div id="delete"><?php $this->btnDelete->Render(); ?></div>
	</div>

	<?php $this->RenderEnd() ?>	

<?php require(__INCLUDES__ .'/footer.inc.php'); ?>