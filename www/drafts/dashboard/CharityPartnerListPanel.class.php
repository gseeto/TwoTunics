<?php
	/**
	 * This is the abstract Panel class for the List All functionality
	 * of the CharityPartner class.  This code-generated class
	 * contains a datagrid to display an HTML page that can
	 * list a collection of CharityPartner objects.  It includes
	 * functionality to perform pagination and sorting on columns.
	 *
	 * To take advantage of some (or all) of these control objects, you
	 * must create a new QPanel which extends this CharityPartnerListPanelBase
	 * class.
	 *
	 * Any and all changes to this file will be overwritten with any subsequent re-
	 * code generation.
	 * 
	 * @package My Application
	 * @subpackage Drafts
	 * 
	 */
	class CharityPartnerListPanel extends QPanel {
		// Local instance of the Meta DataGrid to list CharityPartners
		public $dtgCharityPartners;

		// Other public QControls in this panel
		public $btnCreateNew;
		public $pxyEdit;

		// Callback Method Names
		protected $strSetEditPanelMethod;
		protected $strCloseEditPanelMethod;
		
		public function __construct($objParentObject, $strSetEditPanelMethod, $strCloseEditPanelMethod, $strControlId = null) {
			// Call the Parent
			try {
				parent::__construct($objParentObject, $strControlId);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}

			// Record Method Callbacks
			$this->strSetEditPanelMethod = $strSetEditPanelMethod;
			$this->strCloseEditPanelMethod = $strCloseEditPanelMethod;

			// Setup the Template
			$this->Template = 'CharityPartnerListPanel.tpl.php';

			// Instantiate the Meta DataGrid
			$this->dtgCharityPartners = new CharityPartnerDataGrid($this);

			// Style the DataGrid (if desired)
			$this->dtgCharityPartners->CssClass = 'datagrid';
			$this->dtgCharityPartners->AlternateRowStyle->CssClass = 'alternate';

			// Add Pagination (if desired)
			$this->dtgCharityPartners->Paginator = new QPaginator($this->dtgCharityPartners);
			$this->dtgCharityPartners->ItemsPerPage = 8;

			// Use the MetaDataGrid functionality to add Columns for this datagrid

			// Create an Edit Column
			$this->pxyEdit = new QControlProxy($this);
			$this->pxyEdit->AddAction(new QClickEvent(), new QAjaxControlAction($this, 'pxyEdit_Click'));
			$this->dtgCharityPartners->MetaAddEditProxyColumn($this->pxyEdit, 'Edit', 'Edit');

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

			// Setup the Create New button
			$this->btnCreateNew = new QButton($this);
			$this->btnCreateNew->Text = QApplication::Translate('Create a New') . ' ' . QApplication::Translate('CharityPartner');
			$this->btnCreateNew->AddAction(new QClickEvent(), new QAjaxControlAction($this, 'btnCreateNew_Click'));
		}

		public function pxyEdit_Click($strFormId, $strControlId, $strParameter) {
			$strParameterArray = explode(',', $strParameter);
			$objEditPanel = new CharityPartnerEditPanel($this, $this->strCloseEditPanelMethod, $strParameterArray[0]);

			$strMethodName = $this->strSetEditPanelMethod;
			$this->objForm->$strMethodName($objEditPanel);
		}

		public function btnCreateNew_Click($strFormId, $strControlId, $strParameter) {
			$objEditPanel = new CharityPartnerEditPanel($this, $this->strCloseEditPanelMethod, null);
			$strMethodName = $this->strSetEditPanelMethod;
			$this->objForm->$strMethodName($objEditPanel);
		}
	}
?>