<?php
	// Load the Qcodo Development Framework
	require(dirname(__FILE__) . '/../../includes/prepend.inc.php');

	/**
	 * This is a quick-and-dirty draft QForm object to do the List All functionality
	 * of the Size class.  It uses the code-generated
	 * SizeDataGrid control which has meta-methods to help with
	 * easily creating/defining Size columns.
	 *
	 * Any display customizations and presentation-tier logic can be implemented
	 * here by overriding existing or implementing new methods, properties and variables.
	 * 
	 * NOTE: This file is overwritten on any code regenerations.  If you want to make
	 * permanent changes, it is STRONGLY RECOMMENDED to move both size_list.php AND
	 * size_list.tpl.php out of this Form Drafts directory.
	 *
	 * @package My Application
	 * @subpackage Drafts
	 */
	class SizeListForm extends QForm {
		// Local instance of the Meta DataGrid to list Sizes
		protected $dtgSizes;

		// Create QForm Event Handlers as Needed

//		protected function Form_Exit() {}
//		protected function Form_Load() {}
//		protected function Form_PreRender() {}
//		protected function Form_Validate() {}

		protected function Form_Run() {
			// Security check for ALLOW_REMOTE_ADMIN
			// To allow access REGARDLESS of ALLOW_REMOTE_ADMIN, simply remove the line below
			QApplication::CheckRemoteAdmin();
		}

		protected function Form_Create() {
			// Instantiate the Meta DataGrid
			$this->dtgSizes = new SizeDataGrid($this);

			// Style the DataGrid (if desired)
			$this->dtgSizes->CssClass = 'datagrid';
			$this->dtgSizes->AlternateRowStyle->CssClass = 'alternate';

			// Add Pagination (if desired)
			$this->dtgSizes->Paginator = new QPaginator($this->dtgSizes);
			$this->dtgSizes->ItemsPerPage = 20;

			// Use the MetaDataGrid functionality to add Columns for this datagrid

			// Create an Edit Column
			$strEditPageUrl = __VIRTUAL_DIRECTORY__ . __FORM_DRAFTS__ . '/size_edit.php';
			$this->dtgSizes->MetaAddEditLinkColumn($strEditPageUrl, 'Edit', 'Edit');

			// Create the Other Columns (note that you can use strings for size's properties, or you
			// can traverse down QQN::size() to display fields that are down the hierarchy)
			$this->dtgSizes->MetaAddColumn('Id');
			$this->dtgSizes->MetaAddColumn('Value');
			$this->dtgSizes->MetaAddColumn('Category');
		}
	}

	// Go ahead and run this form object to generate the page and event handlers, implicitly using
	// size_list.tpl.php as the included HTML template file
	SizeListForm::Run('SizeListForm');
?>