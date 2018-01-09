<?php
	// Load the Qcodo Development Framework
	require(dirname(__FILE__) . '/../../includes/prepend.inc.php');

	/**
	 * This is a quick-and-dirty draft QForm object to do the List All functionality
	 * of the Need class.  It uses the code-generated
	 * NeedDataGrid control which has meta-methods to help with
	 * easily creating/defining Need columns.
	 *
	 * Any display customizations and presentation-tier logic can be implemented
	 * here by overriding existing or implementing new methods, properties and variables.
	 * 
	 * NOTE: This file is overwritten on any code regenerations.  If you want to make
	 * permanent changes, it is STRONGLY RECOMMENDED to move both need_list.php AND
	 * need_list.tpl.php out of this Form Drafts directory.
	 *
	 * @package My Application
	 * @subpackage Drafts
	 */
	class NeedListForm extends QForm {
		// Local instance of the Meta DataGrid to list Needs
		protected $dtgNeeds;

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
			$this->dtgNeeds = new NeedDataGrid($this);

			// Style the DataGrid (if desired)
			$this->dtgNeeds->CssClass = 'datagrid';
			$this->dtgNeeds->AlternateRowStyle->CssClass = 'alternate';

			// Add Pagination (if desired)
			$this->dtgNeeds->Paginator = new QPaginator($this->dtgNeeds);
			$this->dtgNeeds->ItemsPerPage = 20;

			// Use the MetaDataGrid functionality to add Columns for this datagrid

			// Create an Edit Column
			$strEditPageUrl = __VIRTUAL_DIRECTORY__ . __FORM_DRAFTS__ . '/need_edit.php';
			$this->dtgNeeds->MetaAddEditLinkColumn($strEditPageUrl, 'Edit', 'Edit');

			// Create the Other Columns (note that you can use strings for need's properties, or you
			// can traverse down QQN::need() to display fields that are down the hierarchy)
			$this->dtgNeeds->MetaAddColumn('Id');
			$this->dtgNeeds->MetaAddColumn('Description');
			$this->dtgNeeds->MetaAddColumn('QuantityRequested');
			$this->dtgNeeds->MetaAddColumn(QQN::Need()->UnitGenre);
			$this->dtgNeeds->MetaAddColumn('Size');
			$this->dtgNeeds->MetaAddColumn('DateRequested');
			$this->dtgNeeds->MetaAddColumn(QQN::Need()->Charity);
			$this->dtgNeeds->MetaAddColumn('QuantityStillRequired');
		}
	}

	// Go ahead and run this form object to generate the page and event handlers, implicitly using
	// need_list.tpl.php as the included HTML template file
	NeedListForm::Run('NeedListForm');
?>