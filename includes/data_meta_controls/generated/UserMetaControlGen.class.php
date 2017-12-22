<?php
	/**
	 * This is a MetaControl class, providing a QForm or QPanel access to event handlers
	 * and QControls to perform the Create, Edit, and Delete functionality
	 * of the User class.  This code-generated class
	 * contains all the basic elements to help a QPanel or QForm display an HTML form that can
	 * manipulate a single User object.
	 *
	 * To take advantage of some (or all) of these control objects, you
	 * must create a new QForm or QPanel which instantiates a UserMetaControl
	 * class.
	 *
	 * Any and all changes to this file will be overwritten with any subsequent
	 * code re-generation.
	 * 
	 * @package My Application
	 * @subpackage MetaControls
	 * property-read User $User the actual User data class being edited
	 * property QLabel $IdControl
	 * property-read QLabel $IdLabel
	 * property QTextBox $UsernameControl
	 * property-read QLabel $UsernameLabel
	 * property QTextBox $PasswordControl
	 * property-read QLabel $PasswordLabel
	 * property QTextBox $EmailControl
	 * property-read QLabel $EmailLabel
	 * property QTextBox $FirstNameControl
	 * property-read QLabel $FirstNameLabel
	 * property QTextBox $LastNameControl
	 * property-read QLabel $LastNameLabel
	 * property QListBox $AccessLevelControl
	 * property-read QLabel $AccessLevelLabel
	 * property QListBox $CharityPartnerAsCharityControl
	 * property-read QLabel $CharityPartnerAsCharityLabel
	 * property QListBox $FashionPartnerAsFashionControl
	 * property-read QLabel $FashionPartnerAsFashionLabel
	 * property-read string $TitleVerb a verb indicating whether or not this is being edited or created
	 * property-read boolean $EditMode a boolean indicating whether or not this is being edited or created
	 */

	class UserMetaControlGen extends QBaseClass {
		// General Variables
		/**
		 * @var User objUser
		 * @access protected
		 */
		protected $objUser;

		/**
		 * @var QForm|QControl objParentObject
		 * @access protected
		 */
		protected $objParentObject;

		/**
		 * @var string  strTitleVerb
		 * @access protected
		 */
		protected $strTitleVerb;

		/**
		 * @var boolean blnEditMode
		 * @access protected
		 */
		protected $blnEditMode;

		// Controls that allow the editing of User's individual data fields
        /**
         * @var QLabel lblId;
         * @access protected
         */
		protected $lblId;

        /**
         * @var QTextBox txtUsername;
         * @access protected
         */
		protected $txtUsername;

        /**
         * @var QTextBox txtPassword;
         * @access protected
         */
		protected $txtPassword;

        /**
         * @var QTextBox txtEmail;
         * @access protected
         */
		protected $txtEmail;

        /**
         * @var QTextBox txtFirstName;
         * @access protected
         */
		protected $txtFirstName;

        /**
         * @var QTextBox txtLastName;
         * @access protected
         */
		protected $txtLastName;

        /**
         * @var QListBox lstAccessLevelObject;
         * @access protected
         */
		protected $lstAccessLevelObject;


		// Controls that allow the viewing of User's individual data fields
        /**
         * @var QLabel lblUsername
         * @access protected
         */
		protected $lblUsername;

        /**
         * @var QLabel lblPassword
         * @access protected
         */
		protected $lblPassword;

        /**
         * @var QLabel lblEmail
         * @access protected
         */
		protected $lblEmail;

        /**
         * @var QLabel lblFirstName
         * @access protected
         */
		protected $lblFirstName;

        /**
         * @var QLabel lblLastName
         * @access protected
         */
		protected $lblLastName;

        /**
         * @var QLabel lblAccessLevel
         * @access protected
         */
		protected $lblAccessLevel;


		// QListBox Controls (if applicable) to edit Unique ReverseReferences and ManyToMany References
		protected $lstCharityPartnersAsCharity;

		protected $lstFashionPartnersAsFashion;


		// QLabel Controls (if applicable) to view Unique ReverseReferences and ManyToMany References
		protected $lblCharityPartnersAsCharity;

		protected $lblFashionPartnersAsFashion;



		/**
		 * Main constructor.  Constructor OR static create methods are designed to be called in either
		 * a parent QPanel or the main QForm when wanting to create a
		 * UserMetaControl to edit a single User object within the
		 * QPanel or QForm.
		 *
		 * This constructor takes in a single User object, while any of the static
		 * create methods below can be used to construct based off of individual PK ID(s).
		 *
		 * @param mixed $objParentObject QForm or QPanel which will be using this UserMetaControl
		 * @param User $objUser new or existing User object
		 */
		 public function __construct($objParentObject, User $objUser) {
			// Setup Parent Object (e.g. QForm or QPanel which will be using this UserMetaControl)
			$this->objParentObject = $objParentObject;

			// Setup linked User object
			$this->objUser = $objUser;

			// Figure out if we're Editing or Creating New
			if ($this->objUser->__Restored) {
				$this->strTitleVerb = QApplication::Translate('Edit');
				$this->blnEditMode = true;
			} else {
				$this->strTitleVerb = QApplication::Translate('Create');
				$this->blnEditMode = false;
			}
		 }

		/**
		 * Static Helper Method to Create using PK arguments
		 * You must pass in the PK arguments on an object to load, or leave it blank to create a new one.
		 * If you want to load via QueryString or PathInfo, use the CreateFromQueryString or CreateFromPathInfo
		 * static helper methods.  Finally, specify a CreateType to define whether or not we are only allowed to 
		 * edit, or if we are also allowed to create a new one, etc.
		 * 
		 * @param mixed $objParentObject QForm or QPanel which will be using this UserMetaControl
		 * @param integer $intId primary key value
		 * @param QMetaControlCreateType $intCreateType rules governing User object creation - defaults to CreateOrEdit
 		 * @return UserMetaControl
		 */
		public static function Create($objParentObject, $intId = null, $intCreateType = QMetaControlCreateType::CreateOrEdit) {
			// Attempt to Load from PK Arguments
			if (strlen($intId)) {
				$objUser = User::Load($intId);

				// User was found -- return it!
				if ($objUser)
					return new UserMetaControl($objParentObject, $objUser);

				// If CreateOnRecordNotFound not specified, throw an exception
				else if ($intCreateType != QMetaControlCreateType::CreateOnRecordNotFound)
					throw new QCallerException('Could not find a User object with PK arguments: ' . $intId);

			// If EditOnly is specified, throw an exception
			} else if ($intCreateType == QMetaControlCreateType::EditOnly)
				throw new QCallerException('No PK arguments specified');

			// If we are here, then we need to create a new record
			return new UserMetaControl($objParentObject, new User());
		}

		/**
		 * Static Helper Method to Create using PathInfo arguments
		 *
		 * @param mixed $objParentObject QForm or QPanel which will be using this UserMetaControl
		 * @param QMetaControlCreateType $intCreateType rules governing User object creation - defaults to CreateOrEdit
		 * @return UserMetaControl
		 */
		public static function CreateFromPathInfo($objParentObject, $intCreateType = QMetaControlCreateType::CreateOrEdit) {
			$intId = QApplication::PathInfo(0);
			return UserMetaControl::Create($objParentObject, $intId, $intCreateType);
		}

		/**
		 * Static Helper Method to Create using QueryString arguments
		 *
		 * @param mixed $objParentObject QForm or QPanel which will be using this UserMetaControl
		 * @param QMetaControlCreateType $intCreateType rules governing User object creation - defaults to CreateOrEdit
		 * @return UserMetaControl
		 */
		public static function CreateFromQueryString($objParentObject, $intCreateType = QMetaControlCreateType::CreateOrEdit) {
			$intId = QApplication::QueryString('intId');
			return UserMetaControl::Create($objParentObject, $intId, $intCreateType);
		}



		///////////////////////////////////////////////
		// PUBLIC CREATE and REFRESH METHODS
		///////////////////////////////////////////////

		/**
		 * Create and setup QLabel lblId
		 * @param string $strControlId optional ControlId to use
		 * @return QLabel
		 */
		public function lblId_Create($strControlId = null) {
			$this->lblId = new QLabel($this->objParentObject, $strControlId);
			$this->lblId->Name = QApplication::Translate('Id');
			if ($this->blnEditMode)
				$this->lblId->Text = $this->objUser->Id;
			else
				$this->lblId->Text = 'N/A';
			return $this->lblId;
		}

		/**
		 * Create and setup QTextBox txtUsername
		 * @param string $strControlId optional ControlId to use
		 * @return QTextBox
		 */
		public function txtUsername_Create($strControlId = null) {
			$this->txtUsername = new QTextBox($this->objParentObject, $strControlId);
			$this->txtUsername->Name = QApplication::Translate('Username');
			$this->txtUsername->Text = $this->objUser->Username;
			$this->txtUsername->MaxLength = User::UsernameMaxLength;
			return $this->txtUsername;
		}

		/**
		 * Create and setup QLabel lblUsername
		 * @param string $strControlId optional ControlId to use
		 * @return QLabel
		 */
		public function lblUsername_Create($strControlId = null) {
			$this->lblUsername = new QLabel($this->objParentObject, $strControlId);
			$this->lblUsername->Name = QApplication::Translate('Username');
			$this->lblUsername->Text = $this->objUser->Username;
			return $this->lblUsername;
		}

		/**
		 * Create and setup QTextBox txtPassword
		 * @param string $strControlId optional ControlId to use
		 * @return QTextBox
		 */
		public function txtPassword_Create($strControlId = null) {
			$this->txtPassword = new QTextBox($this->objParentObject, $strControlId);
			$this->txtPassword->Name = QApplication::Translate('Password');
			$this->txtPassword->Text = $this->objUser->Password;
			$this->txtPassword->MaxLength = User::PasswordMaxLength;
			return $this->txtPassword;
		}

		/**
		 * Create and setup QLabel lblPassword
		 * @param string $strControlId optional ControlId to use
		 * @return QLabel
		 */
		public function lblPassword_Create($strControlId = null) {
			$this->lblPassword = new QLabel($this->objParentObject, $strControlId);
			$this->lblPassword->Name = QApplication::Translate('Password');
			$this->lblPassword->Text = $this->objUser->Password;
			return $this->lblPassword;
		}

		/**
		 * Create and setup QTextBox txtEmail
		 * @param string $strControlId optional ControlId to use
		 * @return QTextBox
		 */
		public function txtEmail_Create($strControlId = null) {
			$this->txtEmail = new QTextBox($this->objParentObject, $strControlId);
			$this->txtEmail->Name = QApplication::Translate('Email');
			$this->txtEmail->Text = $this->objUser->Email;
			$this->txtEmail->MaxLength = User::EmailMaxLength;
			return $this->txtEmail;
		}

		/**
		 * Create and setup QLabel lblEmail
		 * @param string $strControlId optional ControlId to use
		 * @return QLabel
		 */
		public function lblEmail_Create($strControlId = null) {
			$this->lblEmail = new QLabel($this->objParentObject, $strControlId);
			$this->lblEmail->Name = QApplication::Translate('Email');
			$this->lblEmail->Text = $this->objUser->Email;
			return $this->lblEmail;
		}

		/**
		 * Create and setup QTextBox txtFirstName
		 * @param string $strControlId optional ControlId to use
		 * @return QTextBox
		 */
		public function txtFirstName_Create($strControlId = null) {
			$this->txtFirstName = new QTextBox($this->objParentObject, $strControlId);
			$this->txtFirstName->Name = QApplication::Translate('First Name');
			$this->txtFirstName->Text = $this->objUser->FirstName;
			$this->txtFirstName->MaxLength = User::FirstNameMaxLength;
			return $this->txtFirstName;
		}

		/**
		 * Create and setup QLabel lblFirstName
		 * @param string $strControlId optional ControlId to use
		 * @return QLabel
		 */
		public function lblFirstName_Create($strControlId = null) {
			$this->lblFirstName = new QLabel($this->objParentObject, $strControlId);
			$this->lblFirstName->Name = QApplication::Translate('First Name');
			$this->lblFirstName->Text = $this->objUser->FirstName;
			return $this->lblFirstName;
		}

		/**
		 * Create and setup QTextBox txtLastName
		 * @param string $strControlId optional ControlId to use
		 * @return QTextBox
		 */
		public function txtLastName_Create($strControlId = null) {
			$this->txtLastName = new QTextBox($this->objParentObject, $strControlId);
			$this->txtLastName->Name = QApplication::Translate('Last Name');
			$this->txtLastName->Text = $this->objUser->LastName;
			$this->txtLastName->MaxLength = User::LastNameMaxLength;
			return $this->txtLastName;
		}

		/**
		 * Create and setup QLabel lblLastName
		 * @param string $strControlId optional ControlId to use
		 * @return QLabel
		 */
		public function lblLastName_Create($strControlId = null) {
			$this->lblLastName = new QLabel($this->objParentObject, $strControlId);
			$this->lblLastName->Name = QApplication::Translate('Last Name');
			$this->lblLastName->Text = $this->objUser->LastName;
			return $this->lblLastName;
		}

		/**
		 * Create and setup QListBox lstAccessLevelObject
		 * @param string $strControlId optional ControlId to use
		 * @param QQCondition $objConditions override the default condition of QQ::All() to the query, itself
		 * @param QQClause[] $objOptionalClauses additional optional QQClause object or array of QQClause objects for the query
		 * @return QListBox
		 */
		public function lstAccessLevelObject_Create($strControlId = null, QQCondition $objCondition = null, $objOptionalClauses = null) {
			$this->lstAccessLevelObject = new QListBox($this->objParentObject, $strControlId);
			$this->lstAccessLevelObject->Name = QApplication::Translate('Access Level Object');
			$this->lstAccessLevelObject->AddItem(QApplication::Translate('- Select One -'), null);

			// Setup and perform the Query
			if (is_null($objCondition)) $objCondition = QQ::All();
			$objAccessLevelObjectCursor = AccessLevel::QueryCursor($objCondition, $objOptionalClauses);

			// Iterate through the Cursor
			while ($objAccessLevelObject = AccessLevel::InstantiateCursor($objAccessLevelObjectCursor)) {
				$objListItem = new QListItem($objAccessLevelObject->__toString(), $objAccessLevelObject->Id);
				if (($this->objUser->AccessLevelObject) && ($this->objUser->AccessLevelObject->Id == $objAccessLevelObject->Id))
					$objListItem->Selected = true;
				$this->lstAccessLevelObject->AddItem($objListItem);
			}

			// Return the QListBox
			return $this->lstAccessLevelObject;
		}

		/**
		 * Create and setup QLabel lblAccessLevel
		 * @param string $strControlId optional ControlId to use
		 * @return QLabel
		 */
		public function lblAccessLevel_Create($strControlId = null) {
			$this->lblAccessLevel = new QLabel($this->objParentObject, $strControlId);
			$this->lblAccessLevel->Name = QApplication::Translate('Access Level Object');
			$this->lblAccessLevel->Text = ($this->objUser->AccessLevelObject) ? $this->objUser->AccessLevelObject->__toString() : null;
			return $this->lblAccessLevel;
		}

		/**
		 * Create and setup QListBox lstCharityPartnersAsCharity
		 * @param string $strControlId optional ControlId to use
		 * @param QQCondition $objConditions override the default condition of QQ::All() to the query, itself
		 * @param QQClause[] $objOptionalClauses additional optional QQClause object or array of QQClause objects for the query
		 * @return QListBox
		 */
		public function lstCharityPartnersAsCharity_Create($strControlId = null, QQCondition $objCondition = null, $objOptionalClauses = null) {
			$this->lstCharityPartnersAsCharity = new QListBox($this->objParentObject, $strControlId);
			$this->lstCharityPartnersAsCharity->Name = QApplication::Translate('Charity Partners As Charity');
			$this->lstCharityPartnersAsCharity->SelectionMode = QSelectionMode::Multiple;

			// We need to know which items to "Pre-Select"
			$objAssociatedArray = $this->objUser->GetCharityPartnerAsCharityArray();

			// Setup and perform the Query
			if (is_null($objCondition)) $objCondition = QQ::All();
			$objCharityPartnerCursor = CharityPartner::QueryCursor($objCondition, $objOptionalClauses);

			// Iterate through the Cursor
			while ($objCharityPartner = CharityPartner::InstantiateCursor($objCharityPartnerCursor)) {
				$objListItem = new QListItem($objCharityPartner->__toString(), $objCharityPartner->Id);
				foreach ($objAssociatedArray as $objAssociated) {
					if ($objAssociated->Id == $objCharityPartner->Id)
						$objListItem->Selected = true;
				}
				$this->lstCharityPartnersAsCharity->AddItem($objListItem);
			}

			// Return the QListControl
			return $this->lstCharityPartnersAsCharity;
		}

		/**
		 * Create and setup QLabel lblCharityPartnersAsCharity
		 * @param string $strControlId optional ControlId to use
		 * @param string $strGlue glue to display in between each associated object
		 * @return QLabel
		 */
		public function lblCharityPartnersAsCharity_Create($strControlId = null, $strGlue = ', ') {
			$this->lblCharityPartnersAsCharity = new QLabel($this->objParentObject, $strControlId);
			$this->lstCharityPartnersAsCharity->Name = QApplication::Translate('Charity Partners As Charity');
			
			$objAssociatedArray = $this->objUser->GetCharityPartnerAsCharityArray();
			$strItems = array();
			foreach ($objAssociatedArray as $objAssociated)
				$strItems[] = $objAssociated->__toString();
			$this->lblCharityPartnersAsCharity->Text = implode($strGlue, $strItems);
			return $this->lblCharityPartnersAsCharity;
		}

		/**
		 * Create and setup QListBox lstFashionPartnersAsFashion
		 * @param string $strControlId optional ControlId to use
		 * @param QQCondition $objConditions override the default condition of QQ::All() to the query, itself
		 * @param QQClause[] $objOptionalClauses additional optional QQClause object or array of QQClause objects for the query
		 * @return QListBox
		 */
		public function lstFashionPartnersAsFashion_Create($strControlId = null, QQCondition $objCondition = null, $objOptionalClauses = null) {
			$this->lstFashionPartnersAsFashion = new QListBox($this->objParentObject, $strControlId);
			$this->lstFashionPartnersAsFashion->Name = QApplication::Translate('Fashion Partners As Fashion');
			$this->lstFashionPartnersAsFashion->SelectionMode = QSelectionMode::Multiple;

			// We need to know which items to "Pre-Select"
			$objAssociatedArray = $this->objUser->GetFashionPartnerAsFashionArray();

			// Setup and perform the Query
			if (is_null($objCondition)) $objCondition = QQ::All();
			$objFashionPartnerCursor = FashionPartner::QueryCursor($objCondition, $objOptionalClauses);

			// Iterate through the Cursor
			while ($objFashionPartner = FashionPartner::InstantiateCursor($objFashionPartnerCursor)) {
				$objListItem = new QListItem($objFashionPartner->__toString(), $objFashionPartner->Id);
				foreach ($objAssociatedArray as $objAssociated) {
					if ($objAssociated->Id == $objFashionPartner->Id)
						$objListItem->Selected = true;
				}
				$this->lstFashionPartnersAsFashion->AddItem($objListItem);
			}

			// Return the QListControl
			return $this->lstFashionPartnersAsFashion;
		}

		/**
		 * Create and setup QLabel lblFashionPartnersAsFashion
		 * @param string $strControlId optional ControlId to use
		 * @param string $strGlue glue to display in between each associated object
		 * @return QLabel
		 */
		public function lblFashionPartnersAsFashion_Create($strControlId = null, $strGlue = ', ') {
			$this->lblFashionPartnersAsFashion = new QLabel($this->objParentObject, $strControlId);
			$this->lstFashionPartnersAsFashion->Name = QApplication::Translate('Fashion Partners As Fashion');
			
			$objAssociatedArray = $this->objUser->GetFashionPartnerAsFashionArray();
			$strItems = array();
			foreach ($objAssociatedArray as $objAssociated)
				$strItems[] = $objAssociated->__toString();
			$this->lblFashionPartnersAsFashion->Text = implode($strGlue, $strItems);
			return $this->lblFashionPartnersAsFashion;
		}



		/**
		 * Refresh this MetaControl with Data from the local User object.
		 * @param boolean $blnReload reload User from the database
		 * @return void
		 */
		public function Refresh($blnReload = false) {
			if ($blnReload)
				$this->objUser->Reload();

			if ($this->lblId) if ($this->blnEditMode) $this->lblId->Text = $this->objUser->Id;

			if ($this->txtUsername) $this->txtUsername->Text = $this->objUser->Username;
			if ($this->lblUsername) $this->lblUsername->Text = $this->objUser->Username;

			if ($this->txtPassword) $this->txtPassword->Text = $this->objUser->Password;
			if ($this->lblPassword) $this->lblPassword->Text = $this->objUser->Password;

			if ($this->txtEmail) $this->txtEmail->Text = $this->objUser->Email;
			if ($this->lblEmail) $this->lblEmail->Text = $this->objUser->Email;

			if ($this->txtFirstName) $this->txtFirstName->Text = $this->objUser->FirstName;
			if ($this->lblFirstName) $this->lblFirstName->Text = $this->objUser->FirstName;

			if ($this->txtLastName) $this->txtLastName->Text = $this->objUser->LastName;
			if ($this->lblLastName) $this->lblLastName->Text = $this->objUser->LastName;

			if ($this->lstAccessLevelObject) {
					$this->lstAccessLevelObject->RemoveAllItems();
				$this->lstAccessLevelObject->AddItem(QApplication::Translate('- Select One -'), null);
				$objAccessLevelObjectArray = AccessLevel::LoadAll();
				if ($objAccessLevelObjectArray) foreach ($objAccessLevelObjectArray as $objAccessLevelObject) {
					$objListItem = new QListItem($objAccessLevelObject->__toString(), $objAccessLevelObject->Id);
					if (($this->objUser->AccessLevelObject) && ($this->objUser->AccessLevelObject->Id == $objAccessLevelObject->Id))
						$objListItem->Selected = true;
					$this->lstAccessLevelObject->AddItem($objListItem);
				}
			}
			if ($this->lblAccessLevel) $this->lblAccessLevel->Text = ($this->objUser->AccessLevelObject) ? $this->objUser->AccessLevelObject->__toString() : null;

			if ($this->lstCharityPartnersAsCharity) {
				$this->lstCharityPartnersAsCharity->RemoveAllItems();
				$objAssociatedArray = $this->objUser->GetCharityPartnerAsCharityArray();
				$objCharityPartnerArray = CharityPartner::LoadAll();
				if ($objCharityPartnerArray) foreach ($objCharityPartnerArray as $objCharityPartner) {
					$objListItem = new QListItem($objCharityPartner->__toString(), $objCharityPartner->Id);
					foreach ($objAssociatedArray as $objAssociated) {
						if ($objAssociated->Id == $objCharityPartner->Id)
							$objListItem->Selected = true;
					}
					$this->lstCharityPartnersAsCharity->AddItem($objListItem);
				}
			}
			if ($this->lblCharityPartnersAsCharity) {
				$objAssociatedArray = $this->objUser->GetCharityPartnerAsCharityArray();
				$strItems = array();
				foreach ($objAssociatedArray as $objAssociated)
					$strItems[] = $objAssociated->__toString();
				$this->lblCharityPartnersAsCharity->Text = implode($strGlue, $strItems);
			}

			if ($this->lstFashionPartnersAsFashion) {
				$this->lstFashionPartnersAsFashion->RemoveAllItems();
				$objAssociatedArray = $this->objUser->GetFashionPartnerAsFashionArray();
				$objFashionPartnerArray = FashionPartner::LoadAll();
				if ($objFashionPartnerArray) foreach ($objFashionPartnerArray as $objFashionPartner) {
					$objListItem = new QListItem($objFashionPartner->__toString(), $objFashionPartner->Id);
					foreach ($objAssociatedArray as $objAssociated) {
						if ($objAssociated->Id == $objFashionPartner->Id)
							$objListItem->Selected = true;
					}
					$this->lstFashionPartnersAsFashion->AddItem($objListItem);
				}
			}
			if ($this->lblFashionPartnersAsFashion) {
				$objAssociatedArray = $this->objUser->GetFashionPartnerAsFashionArray();
				$strItems = array();
				foreach ($objAssociatedArray as $objAssociated)
					$strItems[] = $objAssociated->__toString();
				$this->lblFashionPartnersAsFashion->Text = implode($strGlue, $strItems);
			}

		}



		///////////////////////////////////////////////
		// PROTECTED UPDATE METHODS for ManyToManyReferences (if any)
		///////////////////////////////////////////////

		protected function lstCharityPartnersAsCharity_Update() {
			if ($this->lstCharityPartnersAsCharity) {
				$this->objUser->UnassociateAllCharityPartnersAsCharity();
				$objSelectedListItems = $this->lstCharityPartnersAsCharity->SelectedItems;
				if ($objSelectedListItems) foreach ($objSelectedListItems as $objListItem) {
					$this->objUser->AssociateCharityPartnerAsCharity(CharityPartner::Load($objListItem->Value));
				}
			}
		}

		protected function lstFashionPartnersAsFashion_Update() {
			if ($this->lstFashionPartnersAsFashion) {
				$this->objUser->UnassociateAllFashionPartnersAsFashion();
				$objSelectedListItems = $this->lstFashionPartnersAsFashion->SelectedItems;
				if ($objSelectedListItems) foreach ($objSelectedListItems as $objListItem) {
					$this->objUser->AssociateFashionPartnerAsFashion(FashionPartner::Load($objListItem->Value));
				}
			}
		}





		///////////////////////////////////////////////
		// PUBLIC USER OBJECT MANIPULATORS
		///////////////////////////////////////////////

		/**
		 * This will save this object's User instance,
		 * updating only the fields which have had a control created for it.
		 */
		public function SaveUser() {
			try {
				// Update any fields for controls that have been created
				if ($this->txtUsername) $this->objUser->Username = $this->txtUsername->Text;
				if ($this->txtPassword) $this->objUser->Password = $this->txtPassword->Text;
				if ($this->txtEmail) $this->objUser->Email = $this->txtEmail->Text;
				if ($this->txtFirstName) $this->objUser->FirstName = $this->txtFirstName->Text;
				if ($this->txtLastName) $this->objUser->LastName = $this->txtLastName->Text;
				if ($this->lstAccessLevelObject) $this->objUser->AccessLevel = $this->lstAccessLevelObject->SelectedValue;

				// Update any UniqueReverseReferences (if any) for controls that have been created for it

				// Save the User object
				$this->objUser->Save();

				// Finally, update any ManyToManyReferences (if any)
				$this->lstCharityPartnersAsCharity_Update();
				$this->lstFashionPartnersAsFashion_Update();
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * This will DELETE this object's User instance from the database.
		 * It will also unassociate itself from any ManyToManyReferences.
		 */
		public function DeleteUser() {
			$this->objUser->UnassociateAllCharityPartnersAsCharity();
			$this->objUser->UnassociateAllFashionPartnersAsFashion();
			$this->objUser->Delete();
		}		



		///////////////////////////////////////////////
		// PUBLIC GETTERS and SETTERS
		///////////////////////////////////////////////

		/**
		 * Override method to perform a property "Get"
		 * This will get the value of $strName
		 *
		 * @param string $strName Name of the property to get
		 * @return mixed
		 */
		public function __get($strName) {
			switch ($strName) {
				// General MetaControlVariables
				case 'User': return $this->objUser;
				case 'TitleVerb': return $this->strTitleVerb;
				case 'EditMode': return $this->blnEditMode;

				// Controls that point to User fields -- will be created dynamically if not yet created
				case 'IdControl':
					if (!$this->lblId) return $this->lblId_Create();
					return $this->lblId;
				case 'IdLabel':
					if (!$this->lblId) return $this->lblId_Create();
					return $this->lblId;
				case 'UsernameControl':
					if (!$this->txtUsername) return $this->txtUsername_Create();
					return $this->txtUsername;
				case 'UsernameLabel':
					if (!$this->lblUsername) return $this->lblUsername_Create();
					return $this->lblUsername;
				case 'PasswordControl':
					if (!$this->txtPassword) return $this->txtPassword_Create();
					return $this->txtPassword;
				case 'PasswordLabel':
					if (!$this->lblPassword) return $this->lblPassword_Create();
					return $this->lblPassword;
				case 'EmailControl':
					if (!$this->txtEmail) return $this->txtEmail_Create();
					return $this->txtEmail;
				case 'EmailLabel':
					if (!$this->lblEmail) return $this->lblEmail_Create();
					return $this->lblEmail;
				case 'FirstNameControl':
					if (!$this->txtFirstName) return $this->txtFirstName_Create();
					return $this->txtFirstName;
				case 'FirstNameLabel':
					if (!$this->lblFirstName) return $this->lblFirstName_Create();
					return $this->lblFirstName;
				case 'LastNameControl':
					if (!$this->txtLastName) return $this->txtLastName_Create();
					return $this->txtLastName;
				case 'LastNameLabel':
					if (!$this->lblLastName) return $this->lblLastName_Create();
					return $this->lblLastName;
				case 'AccessLevelControl':
					if (!$this->lstAccessLevelObject) return $this->lstAccessLevelObject_Create();
					return $this->lstAccessLevelObject;
				case 'AccessLevelLabel':
					if (!$this->lblAccessLevel) return $this->lblAccessLevel_Create();
					return $this->lblAccessLevel;
				case 'CharityPartnerAsCharityControl':
					if (!$this->lstCharityPartnersAsCharity) return $this->lstCharityPartnersAsCharity_Create();
					return $this->lstCharityPartnersAsCharity;
				case 'CharityPartnerAsCharityLabel':
					if (!$this->lblCharityPartnersAsCharity) return $this->lblCharityPartnersAsCharity_Create();
					return $this->lblCharityPartnersAsCharity;
				case 'FashionPartnerAsFashionControl':
					if (!$this->lstFashionPartnersAsFashion) return $this->lstFashionPartnersAsFashion_Create();
					return $this->lstFashionPartnersAsFashion;
				case 'FashionPartnerAsFashionLabel':
					if (!$this->lblFashionPartnersAsFashion) return $this->lblFashionPartnersAsFashion_Create();
					return $this->lblFashionPartnersAsFashion;
				default:
					try {
						return parent::__get($strName);
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}
			}
		}

		/**
		 * Override method to perform a property "Set"
		 * This will set the property $strName to be $mixValue
		 *
		 * @param string $strName Name of the property to set
		 * @param string $mixValue New value of the property
		 * @return mixed
		 */
		public function __set($strName, $mixValue) {
			try {
				switch ($strName) {
					// Controls that point to User fields
					case 'IdControl':
						return ($this->lblId = QType::Cast($mixValue, 'QControl'));
					case 'UsernameControl':
						return ($this->txtUsername = QType::Cast($mixValue, 'QControl'));
					case 'PasswordControl':
						return ($this->txtPassword = QType::Cast($mixValue, 'QControl'));
					case 'EmailControl':
						return ($this->txtEmail = QType::Cast($mixValue, 'QControl'));
					case 'FirstNameControl':
						return ($this->txtFirstName = QType::Cast($mixValue, 'QControl'));
					case 'LastNameControl':
						return ($this->txtLastName = QType::Cast($mixValue, 'QControl'));
					case 'AccessLevelControl':
						return ($this->lstAccessLevelObject = QType::Cast($mixValue, 'QControl'));
					case 'CharityPartnerAsCharityControl':
						return ($this->lstCharityPartnersAsCharity = QType::Cast($mixValue, 'QControl'));
					case 'FashionPartnerAsFashionControl':
						return ($this->lstFashionPartnersAsFashion = QType::Cast($mixValue, 'QControl'));
					default:
						return parent::__set($strName, $mixValue);
				}
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}
	}
?>