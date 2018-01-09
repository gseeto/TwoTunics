<?php
	// Load the Qcodo Development Framework
	require(dirname(__FILE__) . '/../../includes/prepend.inc.php');

	/**
	 * This is a quick-and-dirty draft QForm object to do the List All functionality
	 * of the UnitGenre class.  It uses the code-generated
	 * UnitGenreDataGrid control which has meta-methods to help with
	 * easily creating/defining UnitGenre columns.
	 *
	 * Any display customizations and presentation-tier logic can be implemented
	 * here by overriding existing or implementing new methods, properties and variables.
	 * 
	 * NOTE: This file is overwritten on any code regenerations.  If you want to make
	 * permanent changes, it is STRONGLY RECOMMENDED to move both unit_genre_list.php AND
	 * unit_genre_list.tpl.php out of this Form Drafts directory.
	 *
	 * @package My Application
	 * @subpackage Drafts
	 */
	class UnitGenreListForm extends QForm {
		// Local instance of the Meta DataGrid to list UnitGenres
		protected $dtgUnitGenres;

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
			$this->dtgUnitGenres = new UnitGenreDataGrid($this);

			// Style the DataGrid (if desired)
			$this->dtgUnitGenres->CssClass = 'datagrid';
			$this->dtgUnitGenres->AlternateRowStyle->CssClass = 'alternate';

			// Add Pagination (if desired)
			$this->dtgUnitGenres->Paginator = new QPaginator($this->dtgUnitGenres);
			$this->dtgUnitGenres->ItemsPerPage = 20;

			// Use the MetaDataGrid functionality to add Columns for this datagrid

			// Create an Edit Column
			$strEditPageUrl = __VIRTUAL_DIRECTORY__ . __FORM_DRAFTS__ . '/unit_genre_edit.php';
			$this->dtgUnitGenres->MetaAddEditLinkColumn($strEditPageUrl, 'Edit', 'Edit');

			// Create the Other Columns (note that you can use strings for unit_genre's properties, or you
			// can traverse down QQN::unit_genre() to display fields that are down the hierarchy)
			$this->dtgUnitGenres->MetaAddColumn('Id');
			$this->dtgUnitGenres->MetaAddColumn('Name');
			$this->dtgUnitGenres->MetaAddColumn('Category');
		}
	}

	// Go ahead and run this form object to generate the page and event handlers, implicitly using
	// unit_genre_list.tpl.php as the included HTML template file
	UnitGenreListForm::Run('UnitGenreListForm');
?>