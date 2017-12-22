<?php
	// Load the Qcodo Development Framework
	require(dirname(__FILE__) . '/../../includes/prepend.inc.php');

	/**
	 * This is a quick-and-dirty draft QForm object to do the List All functionality
	 * of the Transaction class.  It uses the code-generated
	 * TransactionDataGrid control which has meta-methods to help with
	 * easily creating/defining Transaction columns.
	 *
	 * Any display customizations and presentation-tier logic can be implemented
	 * here by overriding existing or implementing new methods, properties and variables.
	 * 
	 * NOTE: This file is overwritten on any code regenerations.  If you want to make
	 * permanent changes, it is STRONGLY RECOMMENDED to move both transaction_list.php AND
	 * transaction_list.tpl.php out of this Form Drafts directory.
	 *
	 * @package My Application
	 * @subpackage Drafts
	 */
	class TransactionListForm extends QForm {
		// Local instance of the Meta DataGrid to list Transactions
		protected $dtgTransactions;

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
			$this->dtgTransactions = new TransactionDataGrid($this);

			// Style the DataGrid (if desired)
			$this->dtgTransactions->CssClass = 'datagrid';
			$this->dtgTransactions->AlternateRowStyle->CssClass = 'alternate';

			// Add Pagination (if desired)
			$this->dtgTransactions->Paginator = new QPaginator($this->dtgTransactions);
			$this->dtgTransactions->ItemsPerPage = 20;

			// Use the MetaDataGrid functionality to add Columns for this datagrid

			// Create an Edit Column
			$strEditPageUrl = __VIRTUAL_DIRECTORY__ . __FORM_DRAFTS__ . '/transaction_edit.php';
			$this->dtgTransactions->MetaAddEditLinkColumn($strEditPageUrl, 'Edit', 'Edit');

			// Create the Other Columns (note that you can use strings for transaction's properties, or you
			// can traverse down QQN::transaction() to display fields that are down the hierarchy)
			$this->dtgTransactions->MetaAddColumn('Id');
			$this->dtgTransactions->MetaAddColumn(QQN::Transaction()->Donation);
			$this->dtgTransactions->MetaAddColumn(QQN::Transaction()->Need);
			$this->dtgTransactions->MetaAddColumn('DateInitiated');
			$this->dtgTransactions->MetaAddColumn('NumberOfUnits');
		}
	}

	// Go ahead and run this form object to generate the page and event handlers, implicitly using
	// transaction_list.tpl.php as the included HTML template file
	TransactionListForm::Run('TransactionListForm');
?>