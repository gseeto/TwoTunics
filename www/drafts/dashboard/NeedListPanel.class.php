<?php
	/**
	 * This is the abstract Panel class for the List All functionality
	 * of the Need class.  This code-generated class
	 * contains a datagrid to display an HTML page that can
	 * list a collection of Need objects.  It includes
	 * functionality to perform pagination and sorting on columns.
	 *
	 * To take advantage of some (or all) of these control objects, you
	 * must create a new QPanel which extends this NeedListPanelBase
	 * class.
	 *
	 * Any and all changes to this file will be overwritten with any subsequent re-
	 * code generation.
	 * 
	 * @package My Application
	 * @subpackage Drafts
	 * 
	 */
	class NeedListPanel extends QPanel {
		// Local instance of the Meta DataGrid to list Needs
		public $dtgNeeds;

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
			$this->Template = 'NeedListPanel.tpl.php';

			// Instantiate the Meta DataGrid
			$this->dtgNeeds = new NeedDataGrid($this);

			// Style the DataGrid (if desired)
			$this->dtgNeeds->CssClass = 'datagrid';
			$this->dtgNeeds->AlternateRowStyle->CssClass = 'alternate';

			// Add Pagination (if desired)
			$this->dtgNeeds->Paginator = new QPaginator($this->dtgNeeds);
			$this->dtgNeeds->ItemsPerPage = 8;

			// Use the MetaDataGrid functionality to add Columns for this datagrid

			// Create an Edit Column
			$this->pxyEdit = new QControlProxy($this);
			$this->pxyEdit->AddAction(new QClickEvent(), new QAjaxControlAction($this, 'pxyEdit_Click'));
			$this->dtgNeeds->MetaAddEditProxyColumn($this->pxyEdit, 'Edit', 'Edit');

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

			// Setup the Create New button
			$this->btnCreateNew = new QButton($this);
			$this->btnCreateNew->Text = QApplication::Translate('Create a New') . ' ' . QApplication::Translate('Need');
			$this->btnCreateNew->AddAction(new QClickEvent(), new QAjaxControlAction($this, 'btnCreateNew_Click'));
		}

		public function pxyEdit_Click($strFormId, $strControlId, $strParameter) {
			$strParameterArray = explode(',', $strParameter);
			$objEditPanel = new NeedEditPanel($this, $this->strCloseEditPanelMethod, $strParameterArray[0]);

			$strMethodName = $this->strSetEditPanelMethod;
			$this->objForm->$strMethodName($objEditPanel);
		}

		public function btnCreateNew_Click($strFormId, $strControlId, $strParameter) {
			$objEditPanel = new NeedEditPanel($this, $this->strCloseEditPanelMethod, null);
			$strMethodName = $this->strSetEditPanelMethod;
			$this->objForm->$strMethodName($objEditPanel);
		}
	}
?>