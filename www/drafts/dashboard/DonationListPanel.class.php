<?php
	/**
	 * This is the abstract Panel class for the List All functionality
	 * of the Donation class.  This code-generated class
	 * contains a datagrid to display an HTML page that can
	 * list a collection of Donation objects.  It includes
	 * functionality to perform pagination and sorting on columns.
	 *
	 * To take advantage of some (or all) of these control objects, you
	 * must create a new QPanel which extends this DonationListPanelBase
	 * class.
	 *
	 * Any and all changes to this file will be overwritten with any subsequent re-
	 * code generation.
	 * 
	 * @package My Application
	 * @subpackage Drafts
	 * 
	 */
	class DonationListPanel extends QPanel {
		// Local instance of the Meta DataGrid to list Donations
		public $dtgDonations;

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
			$this->Template = 'DonationListPanel.tpl.php';

			// Instantiate the Meta DataGrid
			$this->dtgDonations = new DonationDataGrid($this);

			// Style the DataGrid (if desired)
			$this->dtgDonations->CssClass = 'datagrid';
			$this->dtgDonations->AlternateRowStyle->CssClass = 'alternate';

			// Add Pagination (if desired)
			$this->dtgDonations->Paginator = new QPaginator($this->dtgDonations);
			$this->dtgDonations->ItemsPerPage = 8;

			// Use the MetaDataGrid functionality to add Columns for this datagrid

			// Create an Edit Column
			$this->pxyEdit = new QControlProxy($this);
			$this->pxyEdit->AddAction(new QClickEvent(), new QAjaxControlAction($this, 'pxyEdit_Click'));
			$this->dtgDonations->MetaAddEditProxyColumn($this->pxyEdit, 'Edit', 'Edit');

			// Create the Other Columns (note that you can use strings for donation's properties, or you
			// can traverse down QQN::donation() to display fields that are down the hierarchy)
			$this->dtgDonations->MetaAddColumn('Id');
			$this->dtgDonations->MetaAddColumn('Description');
			$this->dtgDonations->MetaAddColumn('QuantityGiven');
			$this->dtgDonations->MetaAddColumn(QQN::Donation()->UnitGenre);
			$this->dtgDonations->MetaAddColumn(QQN::Donation()->Size);
			$this->dtgDonations->MetaAddColumn(QQN::Donation()->StatusObject);
			$this->dtgDonations->MetaAddColumn('CostPerUnit');
			$this->dtgDonations->MetaAddColumn(QQN::Donation()->FashionPartner);
			$this->dtgDonations->MetaAddColumn('DateDonated');
			$this->dtgDonations->MetaAddColumn('QuantityRemaining');

			// Setup the Create New button
			$this->btnCreateNew = new QButton($this);
			$this->btnCreateNew->Text = QApplication::Translate('Create a New') . ' ' . QApplication::Translate('Donation');
			$this->btnCreateNew->AddAction(new QClickEvent(), new QAjaxControlAction($this, 'btnCreateNew_Click'));
		}

		public function pxyEdit_Click($strFormId, $strControlId, $strParameter) {
			$strParameterArray = explode(',', $strParameter);
			$objEditPanel = new DonationEditPanel($this, $this->strCloseEditPanelMethod, $strParameterArray[0]);

			$strMethodName = $this->strSetEditPanelMethod;
			$this->objForm->$strMethodName($objEditPanel);
		}

		public function btnCreateNew_Click($strFormId, $strControlId, $strParameter) {
			$objEditPanel = new DonationEditPanel($this, $this->strCloseEditPanelMethod, null);
			$strMethodName = $this->strSetEditPanelMethod;
			$this->objForm->$strMethodName($objEditPanel);
		}
	}
?>