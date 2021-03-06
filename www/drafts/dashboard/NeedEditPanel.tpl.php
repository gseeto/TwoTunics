<?php
	// This is the HTML template include file (.tpl.php) for needEditPanel.
	// Remember that this is a DRAFT.  It is MEANT to be altered/modified.
	// Be sure to move this out of the drafts/dashboard subdirectory before modifying to ensure that subsequent 
	// code re-generations do not overwrite your changes.
?>
	<div id="formControls">
		<?php $_CONTROL->lblId->RenderWithName(); ?>

		<?php $_CONTROL->txtDescription->RenderWithName(); ?>

		<?php $_CONTROL->txtQuantityRequested->RenderWithName(); ?>

		<?php $_CONTROL->lstUnitGenre->RenderWithName(); ?>

		<?php $_CONTROL->txtSize->RenderWithName(); ?>

		<?php $_CONTROL->calDateRequested->RenderWithName(); ?>

		<?php $_CONTROL->lstCharity->RenderWithName(); ?>

		<?php $_CONTROL->txtQuantityStillRequired->RenderWithName(); ?>

	</div>

	<div id="formActions">
		<div id="save"><?php $_CONTROL->btnSave->Render(); ?></div>
		<div id="cancel"><?php $_CONTROL->btnCancel->Render(); ?></div>
		<div id="delete"><?php $_CONTROL->btnDelete->Render(); ?></div>
	</div>
