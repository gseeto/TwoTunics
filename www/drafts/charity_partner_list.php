<?php
	// Load the Qcodo Development Framework
	require(dirname(__FILE__) . '/../../includes/prepend.inc.php');

	/**
	 * This is a quick-and-dirty draft QForm object to do the List All functionality
	 * of the CharityPartner class.  It uses the code-generated
	 * CharityPartnerDataGrid control which has meta-methods to help with
	 * easily creating/defining CharityPartner columns.
	 *
	 * Any display customizations and presentation-tier logic can be implemented
	 * here by overriding existing or implementing new methods, properties and variables.
	 * 
	 * NOTE: This file is overwritten on any code regenerations.  If you want to make
	 * permanent changes, it is STRONGLY RECOMMENDED to move both charity_partner_list.php AND
	 * charity_partner_list.tpl.php out of this Form Drafts directory.
	 *
	 * @package My Application
	 * @subpackage Drafts
	 */
	class CharityPartnerListForm extends QForm {
		// Local instance of the Meta DataGrid to list CharityPartners
		protected $dtgCharityPartners;

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
			$this->dtgCharityPartners = new CharityPartnerDataGrid($this);

			// Style the DataGrid (if desired)
			$this->dtgCharityPartners->CssClass = 'datagrid';
			$this->dtgCharityPartners->AlternateRowStyle->CssClass = 'alternate';

			// Add Pagination (if desired)
			$this->dtgCharityPartners->Paginator = new QPaginator($this->dtgCharityPartners);
			$this->dtgCharityPartners->ItemsPerPage = 20;

			// Use the MetaDataGrid functionality to add Columns for this datagrid

			// Create an Edit Column
			$strEditPageUrl = __VIRTUAL_DIRECTORY__ . __FORM_DRAFTS__ . '/charity_partner_edit.php';
			$this->dtgCharityPartners->MetaAddEditLinkColumn($strEditPageUrl, 'Edit', 'Edit');

			// Create the Other Columns (note that you can use strings for charity_partner's properties, or you
			// can traverse down QQN::charity_partner() to display fields that are down the hierarchy)
			$this->dtgCharityPartners->MetaAddColumn('Id');
			$this->dtgCharityPartners->MetaAddColumn('Name');
			$this->dtgCharityPartners->MetaAddColumn('Description');
			$this->dtgCharityPartners->MetaAddColumn('Street');
			$this->dtgCharityPartners->MetaAddColumn('City');
			$this->dtgCharityPartners->MetaAddColumn('State');
			$this->dtgCharityPartners->MetaAddColumn('Zipcode');
			$this->dtgCharityPartners->MetaAddColumn('Phone');
			$this->dtgCharityPartners->MetaAddColumn('Email');
			$this->dtgCharityPartners->MetaAddColumn('ContactPerson');
		}
	}

	// Go ahead and run this form object to generate the page and event handlers, implicitly using
	// charity_partner_list.tpl.php as the included HTML template file
	CharityPartnerListForm::Run('CharityPartnerListForm');
?>