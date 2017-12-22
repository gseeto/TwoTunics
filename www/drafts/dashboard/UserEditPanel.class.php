<?php
	/**
	 * This is a quick-and-dirty draft QPanel object to do Create, Edit, and Delete functionality
	 * of the User class.  It uses the code-generated
	 * UserMetaControl class, which has meta-methods to help with
	 * easily creating/defining controls to modify the fields of a User columns.
	 *
	 * Any display customizations and presentation-tier logic can be implemented
	 * here by overriding existing or implementing new methods, properties and variables.
	 * 
	 * NOTE: This file is overwritten on any code regenerations.  If you want to make
	 * permanent changes, it is STRONGLY RECOMMENDED to move both user_edit.php AND
	 * user_edit.tpl.php out of this Form Drafts directory.
	 *
	 * @package My Application
	 * @subpackage Drafts
	 */
	class UserEditPanel extends QPanel {
		// Local instance of the UserMetaControl
		protected $mctUser;

		// Controls for User's Data Fields
		public $lblId;
		public $txtUsername;
		public $txtPassword;
		public $txtEmail;
		public $txtFirstName;
		public $txtLastName;
		public $lstAccessLevelObject;

		// Other ListBoxes (if applicable) via Unique ReverseReferences and ManyToMany References
		public $lstCharityPartnersAsCharity;
		public $lstFashionPartnersAsFashion;

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
			$this->strTemplate = 'UserEditPanel.tpl.php';
			$this->strClosePanelMethod = $strClosePanelMethod;

			// Construct the UserMetaControl
			// MAKE SURE we specify "$this" as the MetaControl's (and thus all subsequent controls') parent
			$this->mctUser = UserMetaControl::Create($this, $intId);

			// Call MetaControl's methods to create qcontrols based on User's data fields
			$this->lblId = $this->mctUser->lblId_Create();
			$this->txtUsername = $this->mctUser->txtUsername_Create();
			$this->txtPassword = $this->mctUser->txtPassword_Create();
			$this->txtEmail = $this->mctUser->txtEmail_Create();
			$this->txtFirstName = $this->mctUser->txtFirstName_Create();
			$this->txtLastName = $this->mctUser->txtLastName_Create();
			$this->lstAccessLevelObject = $this->mctUser->lstAccessLevelObject_Create();
			$this->lstCharityPartnersAsCharity = $this->mctUser->lstCharityPartnersAsCharity_Create();
			$this->lstFashionPartnersAsFashion = $this->mctUser->lstFashionPartnersAsFashion_Create();

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
			$this->btnDelete->AddAction(new QClickEvent(), new QConfirmAction(QApplication::Translate('Are you SURE you want to DELETE this') . ' ' . QApplication::Translate('User') . '?'));
			$this->btnDelete->AddAction(new QClickEvent(), new QAjaxControlAction($this, 'btnDelete_Click'));
			$this->btnDelete->Visible = $this->mctUser->EditMode;
		}

		// Control AjaxAction Event Handlers
		public function btnSave_Click($strFormId, $strControlId, $strParameter) {
			// Delegate "Save" processing to the UserMetaControl
			$this->mctUser->SaveUser();
			$this->CloseSelf(true);
		}

		public function btnDelete_Click($strFormId, $strControlId, $strParameter) {
			// Delegate "Delete" processing to the UserMetaControl
			$this->mctUser->DeleteUser();
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