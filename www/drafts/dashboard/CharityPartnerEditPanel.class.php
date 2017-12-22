<?php
	/**
	 * This is a quick-and-dirty draft QPanel object to do Create, Edit, and Delete functionality
	 * of the CharityPartner class.  It uses the code-generated
	 * CharityPartnerMetaControl class, which has meta-methods to help with
	 * easily creating/defining controls to modify the fields of a CharityPartner columns.
	 *
	 * Any display customizations and presentation-tier logic can be implemented
	 * here by overriding existing or implementing new methods, properties and variables.
	 * 
	 * NOTE: This file is overwritten on any code regenerations.  If you want to make
	 * permanent changes, it is STRONGLY RECOMMENDED to move both charity_partner_edit.php AND
	 * charity_partner_edit.tpl.php out of this Form Drafts directory.
	 *
	 * @package My Application
	 * @subpackage Drafts
	 */
	class CharityPartnerEditPanel extends QPanel {
		// Local instance of the CharityPartnerMetaControl
		protected $mctCharityPartner;

		// Controls for CharityPartner's Data Fields
		public $lblId;
		public $txtName;
		public $txtDescription;
		public $txtStreet;
		public $txtCity;
		public $txtState;
		public $txtZipcode;
		public $txtPhone;
		public $txtEmail;
		public $txtContactPerson;

		// Other ListBoxes (if applicable) via Unique ReverseReferences and ManyToMany References
		public $lstUsersAsCharity;

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
			$this->strTemplate = 'CharityPartnerEditPanel.tpl.php';
			$this->strClosePanelMethod = $strClosePanelMethod;

			// Construct the CharityPartnerMetaControl
			// MAKE SURE we specify "$this" as the MetaControl's (and thus all subsequent controls') parent
			$this->mctCharityPartner = CharityPartnerMetaControl::Create($this, $intId);

			// Call MetaControl's methods to create qcontrols based on CharityPartner's data fields
			$this->lblId = $this->mctCharityPartner->lblId_Create();
			$this->txtName = $this->mctCharityPartner->txtName_Create();
			$this->txtDescription = $this->mctCharityPartner->txtDescription_Create();
			$this->txtStreet = $this->mctCharityPartner->txtStreet_Create();
			$this->txtCity = $this->mctCharityPartner->txtCity_Create();
			$this->txtState = $this->mctCharityPartner->txtState_Create();
			$this->txtZipcode = $this->mctCharityPartner->txtZipcode_Create();
			$this->txtPhone = $this->mctCharityPartner->txtPhone_Create();
			$this->txtEmail = $this->mctCharityPartner->txtEmail_Create();
			$this->txtContactPerson = $this->mctCharityPartner->txtContactPerson_Create();
			$this->lstUsersAsCharity = $this->mctCharityPartner->lstUsersAsCharity_Create();

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
			$this->btnDelete->AddAction(new QClickEvent(), new QConfirmAction(QApplication::Translate('Are you SURE you want to DELETE this') . ' ' . QApplication::Translate('CharityPartner') . '?'));
			$this->btnDelete->AddAction(new QClickEvent(), new QAjaxControlAction($this, 'btnDelete_Click'));
			$this->btnDelete->Visible = $this->mctCharityPartner->EditMode;
		}

		// Control AjaxAction Event Handlers
		public function btnSave_Click($strFormId, $strControlId, $strParameter) {
			// Delegate "Save" processing to the CharityPartnerMetaControl
			$this->mctCharityPartner->SaveCharityPartner();
			$this->CloseSelf(true);
		}

		public function btnDelete_Click($strFormId, $strControlId, $strParameter) {
			// Delegate "Delete" processing to the CharityPartnerMetaControl
			$this->mctCharityPartner->DeleteCharityPartner();
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