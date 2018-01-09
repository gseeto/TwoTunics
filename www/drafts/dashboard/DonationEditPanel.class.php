<?php
	/**
	 * This is a quick-and-dirty draft QPanel object to do Create, Edit, and Delete functionality
	 * of the Donation class.  It uses the code-generated
	 * DonationMetaControl class, which has meta-methods to help with
	 * easily creating/defining controls to modify the fields of a Donation columns.
	 *
	 * Any display customizations and presentation-tier logic can be implemented
	 * here by overriding existing or implementing new methods, properties and variables.
	 * 
	 * NOTE: This file is overwritten on any code regenerations.  If you want to make
	 * permanent changes, it is STRONGLY RECOMMENDED to move both donation_edit.php AND
	 * donation_edit.tpl.php out of this Form Drafts directory.
	 *
	 * @package My Application
	 * @subpackage Drafts
	 */
	class DonationEditPanel extends QPanel {
		// Local instance of the DonationMetaControl
		protected $mctDonation;

		// Controls for Donation's Data Fields
		public $lblId;
		public $txtDescription;
		public $txtQuantityGiven;
		public $lstUnitGenre;
		public $lstSize;
		public $lstStatusObject;
		public $txtCostPerUnit;
		public $lstFashionPartner;
		public $calDateDonated;
		public $txtQuantityRemaining;

		// Other ListBoxes (if applicable) via Unique ReverseReferences and ManyToMany References

		// Other Controls
		public $btnSave;
		public $btnDelete;
		public $btnCancel;

		// Callback
		protected $strClosePanelMethod;

		public function __construct($objParentObject, $strClosePanelMethod, $intId = null, $strControlId = null) {
			// Call the Parent
			try {
				parent::__construct($objParentObject, $strControlId);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}

			// Setup Callback and Template
			$this->strTemplate = 'DonationEditPanel.tpl.php';
			$this->strClosePanelMethod = $strClosePanelMethod;

			// Construct the DonationMetaControl
			// MAKE SURE we specify "$this" as the MetaControl's (and thus all subsequent controls') parent
			$this->mctDonation = DonationMetaControl::Create($this, $intId);

			// Call MetaControl's methods to create qcontrols based on Donation's data fields
			$this->lblId = $this->mctDonation->lblId_Create();
			$this->txtDescription = $this->mctDonation->txtDescription_Create();
			$this->txtQuantityGiven = $this->mctDonation->txtQuantityGiven_Create();
			$this->lstUnitGenre = $this->mctDonation->lstUnitGenre_Create();
			$this->lstSize = $this->mctDonation->lstSize_Create();
			$this->lstStatusObject = $this->mctDonation->lstStatusObject_Create();
			$this->txtCostPerUnit = $this->mctDonation->txtCostPerUnit_Create();
			$this->lstFashionPartner = $this->mctDonation->lstFashionPartner_Create();
			$this->calDateDonated = $this->mctDonation->calDateDonated_Create();
			$this->txtQuantityRemaining = $this->mctDonation->txtQuantityRemaining_Create();

			// Create Buttons and Actions on this Form
			$this->btnSave = new QButton($this);
			$this->btnSave->Text = QApplication::Translate('Save');
			$this->btnSave->AddAction(new QClickEvent(), new QAjaxControlAction($this, 'btnSave_Click'));
			$this->btnSave->CausesValidation = $this;

			$this->btnCancel = new QButton($this);
			$this->btnCancel->Text = QApplication::Translate('Cancel');
			$this->btnCancel->AddAction(new QClickEvent(), new QAjaxControlAction($this, 'btnCancel_Click'));

			$this->btnDelete = new QButton($this);
			$this->btnDelete->Text = QApplication::Translate('Delete');
			$this->btnDelete->AddAction(new QClickEvent(), new QConfirmAction(QApplication::Translate('Are you SURE you want to DELETE this') . ' ' . QApplication::Translate('Donation') . '?'));
			$this->btnDelete->AddAction(new QClickEvent(), new QAjaxControlAction($this, 'btnDelete_Click'));
			$this->btnDelete->Visible = $this->mctDonation->EditMode;
		}

		// Control AjaxAction Event Handlers
		public function btnSave_Click($strFormId, $strControlId, $strParameter) {
			// Delegate "Save" processing to the DonationMetaControl
			$this->mctDonation->SaveDonation();
			$this->CloseSelf(true);
		}

		public function btnDelete_Click($strFormId, $strControlId, $strParameter) {
			// Delegate "Delete" processing to the DonationMetaControl
			$this->mctDonation->DeleteDonation();
			$this->CloseSelf(true);
		}

		public function btnCancel_Click($strFormId, $strControlId, $strParameter) {
			$this->CloseSelf(false);
		}

		// Close Myself and Call ClosePanelMethod Callback
		protected function CloseSelf($blnChangesMade) {
			$strMethod = $this->strClosePanelMethod;
			$this->objForm->$strMethod($blnChangesMade);
		}
	}
?>