<?php
	/**
	 * This is a MetaControl class, providing a QForm or QPanel access to event handlers
	 * and QControls to perform the Create, Edit, and Delete functionality
	 * of the FashionPartner class.  This code-generated class
	 * contains all the basic elements to help a QPanel or QForm display an HTML form that can
	 * manipulate a single FashionPartner object.
	 *
	 * To take advantage of some (or all) of these control objects, you
	 * must create a new QForm or QPanel which instantiates a FashionPartnerMetaControl
	 * class.
	 *
	 * Any and all changes to this file will be overwritten with any subsequent
	 * code re-generation.
	 * 
	 * @package My Application
	 * @subpackage MetaControls
	 * property-read FashionPartner $FashionPartner the actual FashionPartner data class being edited
	 * property QLabel $IdControl
	 * property-read QLabel $IdLabel
	 * property QTextBox $NameControl
	 * property-read QLabel $NameLabel
	 * property QTextBox $DescriptionControl
	 * property-read QLabel $DescriptionLabel
	 * property QTextBox $StreetControl
	 * property-read QLabel $StreetLabel
	 * property QTextBox $CityControl
	 * property-read QLabel $CityLabel
	 * property QTextBox $StateControl
	 * property-read QLabel $StateLabel
	 * property QTextBox $ZipcodeControl
	 * property-read QLabel $ZipcodeLabel
	 * property QTextBox $PhoneControl
	 * property-read QLabel $PhoneLabel
	 * property QTextBox $EmailControl
	 * property-read QLabel $EmailLabel
	 * property QTextBox $ContactPersonControl
	 * property-read QLabel $ContactPersonLabel
	 * property QListBox $UserAsFashionControl
	 * property-read QLabel $UserAsFashionLabel
	 * property-read string $TitleVerb a verb indicating whether or not this is being edited or created
	 * property-read boolean $EditMode a boolean indicating whether or not this is being edited or created
	 */

	class FashionPartnerMetaControlGen extends QBaseClass {
		// General Variables
		/**
		 * @var FashionPartner objFashionPartner
		 * @access protected
		 */
		protected $objFashionPartner;

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

		// Controls that allow the editing of FashionPartner's individual data fields
        /**
         * @var QLabel lblId;
         * @access protected
         */
		protected $lblId;

        /**
         * @var QTextBox txtName;
         * @access protected
         */
		protected $txtName;

        /**
         * @var QTextBox txtDescription;
         * @access protected
         */
		protected $txtDescription;

        /**
         * @var QTextBox txtStreet;
         * @access protected
         */
		protected $txtStreet;

        /**
         * @var QTextBox txtCity;
         * @access protected
         */
		protected $txtCity;

        /**
         * @var QTextBox txtState;
         * @access protected
         */
		protected $txtState;

        /**
         * @var QTextBox txtZipcode;
         * @access protected
         */
		protected $txtZipcode;

        /**
         * @var QTextBox txtPhone;
         * @access protected
         */
		protected $txtPhone;

        /**
         * @var QTextBox txtEmail;
         * @access protected
         */
		protected $txtEmail;

        /**
         * @var QTextBox txtContactPerson;
         * @access protected
         */
		protected $txtContactPerson;


		// Controls that allow the viewing of FashionPartner's individual data fields
        /**
         * @var QLabel lblName
         * @access protected
         */
		protected $lblName;

        /**
         * @var QLabel lblDescription
         * @access protected
         */
		protected $lblDescription;

        /**
         * @var QLabel lblStreet
         * @access protected
         */
		protected $lblStreet;

        /**
         * @var QLabel lblCity
         * @access protected
         */
		protected $lblCity;

        /**
         * @var QLabel lblState
         * @access protected
         */
		protected $lblState;

        /**
         * @var QLabel lblZipcode
         * @access protected
         */
		protected $lblZipcode;

        /**
         * @var QLabel lblPhone
         * @access protected
         */
		protected $lblPhone;

        /**
         * @var QLabel lblEmail
         * @access protected
         */
		protected $lblEmail;

        /**
         * @var QLabel lblContactPerson
         * @access protected
         */
		protected $lblContactPerson;


		// QListBox Controls (if applicable) to edit Unique ReverseReferences and ManyToMany References
		protected $lstUsersAsFashion;


		// QLabel Controls (if applicable) to view Unique ReverseReferences and ManyToMany References
		protected $lblUsersAsFashion;



		/**
		 * Main constructor.  Constructor OR static create methods are designed to be called in either
		 * a parent QPanel or the main QForm when wanting to create a
		 * FashionPartnerMetaControl to edit a single FashionPartner object within the
		 * QPanel or QForm.
		 *
		 * This constructor takes in a single FashionPartner object, while any of the static
		 * create methods below can be used to construct based off of individual PK ID(s).
		 *
		 * @param mixed $objParentObject QForm or QPanel which will be using this FashionPartnerMetaControl
		 * @param FashionPartner $objFashionPartner new or existing FashionPartner object
		 */
		 public function __construct($objParentObject, FashionPartner $objFashionPartner) {
			// Setup Parent Object (e.g. QForm or QPanel which will be using this FashionPartnerMetaControl)
			$this->objParentObject = $objParentObject;

			// Setup linked FashionPartner object
			$this->objFashionPartner = $objFashionPartner;

			// Figure out if we're Editing or Creating New
			if ($this->objFashionPartner->__Restored) {
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
		 * @param mixed $objParentObject QForm or QPanel which will be using this FashionPartnerMetaControl
		 * @param integer $intId primary key value
		 * @param QMetaControlCreateType $intCreateType rules governing FashionPartner object creation - defaults to CreateOrEdit
 		 * @return FashionPartnerMetaControl
		 */
		public static function Create($objParentObject, $intId = null, $intCreateType = QMetaControlCreateType::CreateOrEdit) {
			// Attempt to Load from PK Arguments
			if (strlen($intId)) {
				$objFashionPartner = FashionPartner::Load($intId);

				// FashionPartner was found -- return it!
				if ($objFashionPartner)
					return new FashionPartnerMetaControl($objParentObject, $objFashionPartner);

				// If CreateOnRecordNotFound not specified, throw an exception
				else if ($intCreateType != QMetaControlCreateType::CreateOnRecordNotFound)
					throw new QCallerException('Could not find a FashionPartner object with PK arguments: ' . $intId);

			// If EditOnly is specified, throw an exception
			} else if ($intCreateType == QMetaControlCreateType::EditOnly)
				throw new QCallerException('No PK arguments specified');

			// If we are here, then we need to create a new record
			return new FashionPartnerMetaControl($objParentObject, new FashionPartner());
		}

		/**
		 * Static Helper Method to Create using PathInfo arguments
		 *
		 * @param mixed $objParentObject QForm or QPanel which will be using this FashionPartnerMetaControl
		 * @param QMetaControlCreateType $intCreateType rules governing FashionPartner object creation - defaults to CreateOrEdit
		 * @return FashionPartnerMetaControl
		 */
		public static function CreateFromPathInfo($objParentObject, $intCreateType = QMetaControlCreateType::CreateOrEdit) {
			$intId = QApplication::PathInfo(0);
			return FashionPartnerMetaControl::Create($objParentObject, $intId, $intCreateType);
		}

		/**
		 * Static Helper Method to Create using QueryString arguments
		 *
		 * @param mixed $objParentObject QForm or QPanel which will be using this FashionPartnerMetaControl
		 * @param QMetaControlCreateType $intCreateType rules governing FashionPartner object creation - defaults to CreateOrEdit
		 * @return FashionPartnerMetaControl
		 */
		public static function CreateFromQueryString($objParentObject, $intCreateType = QMetaControlCreateType::CreateOrEdit) {
			$intId = QApplication::QueryString('intId');
			return FashionPartnerMetaControl::Create($objParentObject, $intId, $intCreateType);
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
				$this->lblId->Text = $this->objFashionPartner->Id;
			else
				$this->lblId->Text = 'N/A';
			return $this->lblId;
		}

		/**
		 * Create and setup QTextBox txtName
		 * @param string $strControlId optional ControlId to use
		 * @return QTextBox
		 */
		public function txtName_Create($strControlId = null) {
			$this->txtName = new QTextBox($this->objParentObject, $strControlId);
			$this->txtName->Name = QApplication::Translate('Name');
			$this->txtName->Text = $this->objFashionPartner->Name;
			$this->txtName->MaxLength = FashionPartner::NameMaxLength;
			return $this->txtName;
		}

		/**
		 * Create and setup QLabel lblName
		 * @param string $strControlId optional ControlId to use
		 * @return QLabel
		 */
		public function lblName_Create($strControlId = null) {
			$this->lblName = new QLabel($this->objParentObject, $strControlId);
			$this->lblName->Name = QApplication::Translate('Name');
			$this->lblName->Text = $this->objFashionPartner->Name;
			return $this->lblName;
		}

		/**
		 * Create and setup QTextBox txtDescription
		 * @param string $strControlId optional ControlId to use
		 * @return QTextBox
		 */
		public function txtDescription_Create($strControlId = null) {
			$this->txtDescription = new QTextBox($this->objParentObject, $strControlId);
			$this->txtDescription->Name = QApplication::Translate('Description');
			$this->txtDescription->Text = $this->objFashionPartner->Description;
			$this->txtDescription->MaxLength = FashionPartner::DescriptionMaxLength;
			return $this->txtDescription;
		}

		/**
		 * Create and setup QLabel lblDescription
		 * @param string $strControlId optional ControlId to use
		 * @return QLabel
		 */
		public function lblDescription_Create($strControlId = null) {
			$this->lblDescription = new QLabel($this->objParentObject, $strControlId);
			$this->lblDescription->Name = QApplication::Translate('Description');
			$this->lblDescription->Text = $this->objFashionPartner->Description;
			return $this->lblDescription;
		}

		/**
		 * Create and setup QTextBox txtStreet
		 * @param string $strControlId optional ControlId to use
		 * @return QTextBox
		 */
		public function txtStreet_Create($strControlId = null) {
			$this->txtStreet = new QTextBox($this->objParentObject, $strControlId);
			$this->txtStreet->Name = QApplication::Translate('Street');
			$this->txtStreet->Text = $this->objFashionPartner->Street;
			$this->txtStreet->MaxLength = FashionPartner::StreetMaxLength;
			return $this->txtStreet;
		}

		/**
		 * Create and setup QLabel lblStreet
		 * @param string $strControlId optional ControlId to use
		 * @return QLabel
		 */
		public function lblStreet_Create($strControlId = null) {
			$this->lblStreet = new QLabel($this->objParentObject, $strControlId);
			$this->lblStreet->Name = QApplication::Translate('Street');
			$this->lblStreet->Text = $this->objFashionPartner->Street;
			return $this->lblStreet;
		}

		/**
		 * Create and setup QTextBox txtCity
		 * @param string $strControlId optional ControlId to use
		 * @return QTextBox
		 */
		public function txtCity_Create($strControlId = null) {
			$this->txtCity = new QTextBox($this->objParentObject, $strControlId);
			$this->txtCity->Name = QApplication::Translate('City');
			$this->txtCity->Text = $this->objFashionPartner->City;
			$this->txtCity->MaxLength = FashionPartner::CityMaxLength;
			return $this->txtCity;
		}

		/**
		 * Create and setup QLabel lblCity
		 * @param string $strControlId optional ControlId to use
		 * @return QLabel
		 */
		public function lblCity_Create($strControlId = null) {
			$this->lblCity = new QLabel($this->objParentObject, $strControlId);
			$this->lblCity->Name = QApplication::Translate('City');
			$this->lblCity->Text = $this->objFashionPartner->City;
			return $this->lblCity;
		}

		/**
		 * Create and setup QTextBox txtState
		 * @param string $strControlId optional ControlId to use
		 * @return QTextBox
		 */
		public function txtState_Create($strControlId = null) {
			$this->txtState = new QTextBox($this->objParentObject, $strControlId);
			$this->txtState->Name = QApplication::Translate('State');
			$this->txtState->Text = $this->objFashionPartner->State;
			$this->txtState->MaxLength = FashionPartner::StateMaxLength;
			return $this->txtState;
		}

		/**
		 * Create and setup QLabel lblState
		 * @param string $strControlId optional ControlId to use
		 * @return QLabel
		 */
		public function lblState_Create($strControlId = null) {
			$this->lblState = new QLabel($this->objParentObject, $strControlId);
			$this->lblState->Name = QApplication::Translate('State');
			$this->lblState->Text = $this->objFashionPartner->State;
			return $this->lblState;
		}

		/**
		 * Create and setup QTextBox txtZipcode
		 * @param string $strControlId optional ControlId to use
		 * @return QTextBox
		 */
		public function txtZipcode_Create($strControlId = null) {
			$this->txtZipcode = new QTextBox($this->objParentObject, $strControlId);
			$this->txtZipcode->Name = QApplication::Translate('Zipcode');
			$this->txtZipcode->Text = $this->objFashionPartner->Zipcode;
			$this->txtZipcode->MaxLength = FashionPartner::ZipcodeMaxLength;
			return $this->txtZipcode;
		}

		/**
		 * Create and setup QLabel lblZipcode
		 * @param string $strControlId optional ControlId to use
		 * @return QLabel
		 */
		public function lblZipcode_Create($strControlId = null) {
			$this->lblZipcode = new QLabel($this->objParentObject, $strControlId);
			$this->lblZipcode->Name = QApplication::Translate('Zipcode');
			$this->lblZipcode->Text = $this->objFashionPartner->Zipcode;
			return $this->lblZipcode;
		}

		/**
		 * Create and setup QTextBox txtPhone
		 * @param string $strControlId optional ControlId to use
		 * @return QTextBox
		 */
		public function txtPhone_Create($strControlId = null) {
			$this->txtPhone = new QTextBox($this->objParentObject, $strControlId);
			$this->txtPhone->Name = QApplication::Translate('Phone');
			$this->txtPhone->Text = $this->objFashionPartner->Phone;
			$this->txtPhone->MaxLength = FashionPartner::PhoneMaxLength;
			return $this->txtPhone;
		}

		/**
		 * Create and setup QLabel lblPhone
		 * @param string $strControlId optional ControlId to use
		 * @return QLabel
		 */
		public function lblPhone_Create($strControlId = null) {
			$this->lblPhone = new QLabel($this->objParentObject, $strControlId);
			$this->lblPhone->Name = QApplication::Translate('Phone');
			$this->lblPhone->Text = $this->objFashionPartner->Phone;
			return $this->lblPhone;
		}

		/**
		 * Create and setup QTextBox txtEmail
		 * @param string $strControlId optional ControlId to use
		 * @return QTextBox
		 */
		public function txtEmail_Create($strControlId = null) {
			$this->txtEmail = new QTextBox($this->objParentObject, $strControlId);
			$this->txtEmail->Name = QApplication::Translate('Email');
			$this->txtEmail->Text = $this->objFashionPartner->Email;
			$this->txtEmail->MaxLength = FashionPartner::EmailMaxLength;
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
			$this->lblEmail->Text = $this->objFashionPartner->Email;
			return $this->lblEmail;
		}

		/**
		 * Create and setup QTextBox txtContactPerson
		 * @param string $strControlId optional ControlId to use
		 * @return QTextBox
		 */
		public function txtContactPerson_Create($strControlId = null) {
			$this->txtContactPerson = new QTextBox($this->objParentObject, $strControlId);
			$this->txtContactPerson->Name = QApplication::Translate('Contact Person');
			$this->txtContactPerson->Text = $this->objFashionPartner->ContactPerson;
			$this->txtContactPerson->MaxLength = FashionPartner::ContactPersonMaxLength;
			return $this->txtContactPerson;
		}

		/**
		 * Create and setup QLabel lblContactPerson
		 * @param string $strControlId optional ControlId to use
		 * @return QLabel
		 */
		public function lblContactPerson_Create($strControlId = null) {
			$this->lblContactPerson = new QLabel($this->objParentObject, $strControlId);
			$this->lblContactPerson->Name = QApplication::Translate('Contact Person');
			$this->lblContactPerson->Text = $this->objFashionPartner->ContactPerson;
			return $this->lblContactPerson;
		}

		/**
		 * Create and setup QListBox lstUsersAsFashion
		 * @param string $strControlId optional ControlId to use
		 * @param QQCondition $objConditions override the default condition of QQ::All() to the query, itself
		 * @param QQClause[] $objOptionalClauses additional optional QQClause object or array of QQClause objects for the query
		 * @return QListBox
		 */
		public function lstUsersAsFashion_Create($strControlId = null, QQCondition $objCondition = null, $objOptionalClauses = null) {
			$this->lstUsersAsFashion = new QListBox($this->objParentObject, $strControlId);
			$this->lstUsersAsFashion->Name = QApplication::Translate('Users As Fashion');
			$this->lstUsersAsFashion->SelectionMode = QSelectionMode::Multiple;

			// We need to know which items to "Pre-Select"
			$objAssociatedArray = $this->objFashionPartner->GetUserAsFashionArray();

			// Setup and perform the Query
			if (is_null($objCondition)) $objCondition = QQ::All();
			$objUserCursor = User::QueryCursor($objCondition, $objOptionalClauses);

			// Iterate through the Cursor
			while ($objUser = User::InstantiateCursor($objUserCursor)) {
				$objListItem = new QListItem($objUser->__toString(), $objUser->Id);
				foreach ($objAssociatedArray as $objAssociated) {
					if ($objAssociated->Id == $objUser->Id)
						$objListItem->Selected = true;
				}
				$this->lstUsersAsFashion->AddItem($objListItem);
			}

			// Return the QListControl
			return $this->lstUsersAsFashion;
		}

		/**
		 * Create and setup QLabel lblUsersAsFashion
		 * @param string $strControlId optional ControlId to use
		 * @param string $strGlue glue to display in between each associated object
		 * @return QLabel
		 */
		public function lblUsersAsFashion_Create($strControlId = null, $strGlue = ', ') {
			$this->lblUsersAsFashion = new QLabel($this->objParentObject, $strControlId);
			$this->lstUsersAsFashion->Name = QApplication::Translate('Users As Fashion');
			
			$objAssociatedArray = $this->objFashionPartner->GetUserAsFashionArray();
			$strItems = array();
			foreach ($objAssociatedArray as $objAssociated)
				$strItems[] = $objAssociated->__toString();
			$this->lblUsersAsFashion->Text = implode($strGlue, $strItems);
			return $this->lblUsersAsFashion;
		}



		/**
		 * Refresh this MetaControl with Data from the local FashionPartner object.
		 * @param boolean $blnReload reload FashionPartner from the database
		 * @return void
		 */
		public function Refresh($blnReload = false) {
			if ($blnReload)
				$this->objFashionPartner->Reload();

			if ($this->lblId) if ($this->blnEditMode) $this->lblId->Text = $this->objFashionPartner->Id;

			if ($this->txtName) $this->txtName->Text = $this->objFashionPartner->Name;
			if ($this->lblName) $this->lblName->Text = $this->objFashionPartner->Name;

			if ($this->txtDescription) $this->txtDescription->Text = $this->objFashionPartner->Description;
			if ($this->lblDescription) $this->lblDescription->Text = $this->objFashionPartner->Description;

			if ($this->txtStreet) $this->txtStreet->Text = $this->objFashionPartner->Street;
			if ($this->lblStreet) $this->lblStreet->Text = $this->objFashionPartner->Street;

			if ($this->txtCity) $this->txtCity->Text = $this->objFashionPartner->City;
			if ($this->lblCity) $this->lblCity->Text = $this->objFashionPartner->City;

			if ($this->txtState) $this->txtState->Text = $this->objFashionPartner->State;
			if ($this->lblState) $this->lblState->Text = $this->objFashionPartner->State;

			if ($this->txtZipcode) $this->txtZipcode->Text = $this->objFashionPartner->Zipcode;
			if ($this->lblZipcode) $this->lblZipcode->Text = $this->objFashionPartner->Zipcode;

			if ($this->txtPhone) $this->txtPhone->Text = $this->objFashionPartner->Phone;
			if ($this->lblPhone) $this->lblPhone->Text = $this->objFashionPartner->Phone;

			if ($this->txtEmail) $this->txtEmail->Text = $this->objFashionPartner->Email;
			if ($this->lblEmail) $this->lblEmail->Text = $this->objFashionPartner->Email;

			if ($this->txtContactPerson) $this->txtContactPerson->Text = $this->objFashionPartner->ContactPerson;
			if ($this->lblContactPerson) $this->lblContactPerson->Text = $this->objFashionPartner->ContactPerson;

			if ($this->lstUsersAsFashion) {
				$this->lstUsersAsFashion->RemoveAllItems();
				$objAssociatedArray = $this->objFashionPartner->GetUserAsFashionArray();
				$objUserArray = User::LoadAll();
				if ($objUserArray) foreach ($objUserArray as $objUser) {
					$objListItem = new QListItem($objUser->__toString(), $objUser->Id);
					foreach ($objAssociatedArray as $objAssociated) {
						if ($objAssociated->Id == $objUser->Id)
							$objListItem->Selected = true;
					}
					$this->lstUsersAsFashion->AddItem($objListItem);
				}
			}
			if ($this->lblUsersAsFashion) {
				$objAssociatedArray = $this->objFashionPartner->GetUserAsFashionArray();
				$strItems = array();
				foreach ($objAssociatedArray as $objAssociated)
					$strItems[] = $objAssociated->__toString();
				$this->lblUsersAsFashion->Text = implode($strGlue, $strItems);
			}

		}



		///////////////////////////////////////////////
		// PROTECTED UPDATE METHODS for ManyToManyReferences (if any)
		///////////////////////////////////////////////

		protected function lstUsersAsFashion_Update() {
			if ($this->lstUsersAsFashion) {
				$this->objFashionPartner->UnassociateAllUsersAsFashion();
				$objSelectedListItems = $this->lstUsersAsFashion->SelectedItems;
				if ($objSelectedListItems) foreach ($objSelectedListItems as $objListItem) {
					$this->objFashionPartner->AssociateUserAsFashion(User::Load($objListItem->Value));
				}
			}
		}





		///////////////////////////////////////////////
		// PUBLIC FASHIONPARTNER OBJECT MANIPULATORS
		///////////////////////////////////////////////

		/**
		 * This will save this object's FashionPartner instance,
		 * updating only the fields which have had a control created for it.
		 */
		public function SaveFashionPartner() {
			try {
				// Update any fields for controls that have been created
				if ($this->txtName) $this->objFashionPartner->Name = $this->txtName->Text;
				if ($this->txtDescription) $this->objFashionPartner->Description = $this->txtDescription->Text;
				if ($this->txtStreet) $this->objFashionPartner->Street = $this->txtStreet->Text;
				if ($this->txtCity) $this->objFashionPartner->City = $this->txtCity->Text;
				if ($this->txtState) $this->objFashionPartner->State = $this->txtState->Text;
				if ($this->txtZipcode) $this->objFashionPartner->Zipcode = $this->txtZipcode->Text;
				if ($this->txtPhone) $this->objFashionPartner->Phone = $this->txtPhone->Text;
				if ($this->txtEmail) $this->objFashionPartner->Email = $this->txtEmail->Text;
				if ($this->txtContactPerson) $this->objFashionPartner->ContactPerson = $this->txtContactPerson->Text;

				// Update any UniqueReverseReferences (if any) for controls that have been created for it

				// Save the FashionPartner object
				$this->objFashionPartner->Save();

				// Finally, update any ManyToManyReferences (if any)
				$this->lstUsersAsFashion_Update();
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * This will DELETE this object's FashionPartner instance from the database.
		 * It will also unassociate itself from any ManyToManyReferences.
		 */
		public function DeleteFashionPartner() {
			$this->objFashionPartner->UnassociateAllUsersAsFashion();
			$this->objFashionPartner->Delete();
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
				case 'FashionPartner': return $this->objFashionPartner;
				case 'TitleVerb': return $this->strTitleVerb;
				case 'EditMode': return $this->blnEditMode;

				// Controls that point to FashionPartner fields -- will be created dynamically if not yet created
				case 'IdControl':
					if (!$this->lblId) return $this->lblId_Create();
					return $this->lblId;
				case 'IdLabel':
					if (!$this->lblId) return $this->lblId_Create();
					return $this->lblId;
				case 'NameControl':
					if (!$this->txtName) return $this->txtName_Create();
					return $this->txtName;
				case 'NameLabel':
					if (!$this->lblName) return $this->lblName_Create();
					return $this->lblName;
				case 'DescriptionControl':
					if (!$this->txtDescription) return $this->txtDescription_Create();
					return $this->txtDescription;
				case 'DescriptionLabel':
					if (!$this->lblDescription) return $this->lblDescription_Create();
					return $this->lblDescription;
				case 'StreetControl':
					if (!$this->txtStreet) return $this->txtStreet_Create();
					return $this->txtStreet;
				case 'StreetLabel':
					if (!$this->lblStreet) return $this->lblStreet_Create();
					return $this->lblStreet;
				case 'CityControl':
					if (!$this->txtCity) return $this->txtCity_Create();
					return $this->txtCity;
				case 'CityLabel':
					if (!$this->lblCity) return $this->lblCity_Create();
					return $this->lblCity;
				case 'StateControl':
					if (!$this->txtState) return $this->txtState_Create();
					return $this->txtState;
				case 'StateLabel':
					if (!$this->lblState) return $this->lblState_Create();
					return $this->lblState;
				case 'ZipcodeControl':
					if (!$this->txtZipcode) return $this->txtZipcode_Create();
					return $this->txtZipcode;
				case 'ZipcodeLabel':
					if (!$this->lblZipcode) return $this->lblZipcode_Create();
					return $this->lblZipcode;
				case 'PhoneControl':
					if (!$this->txtPhone) return $this->txtPhone_Create();
					return $this->txtPhone;
				case 'PhoneLabel':
					if (!$this->lblPhone) return $this->lblPhone_Create();
					return $this->lblPhone;
				case 'EmailControl':
					if (!$this->txtEmail) return $this->txtEmail_Create();
					return $this->txtEmail;
				case 'EmailLabel':
					if (!$this->lblEmail) return $this->lblEmail_Create();
					return $this->lblEmail;
				case 'ContactPersonControl':
					if (!$this->txtContactPerson) return $this->txtContactPerson_Create();
					return $this->txtContactPerson;
				case 'ContactPersonLabel':
					if (!$this->lblContactPerson) return $this->lblContactPerson_Create();
					return $this->lblContactPerson;
				case 'UserAsFashionControl':
					if (!$this->lstUsersAsFashion) return $this->lstUsersAsFashion_Create();
					return $this->lstUsersAsFashion;
				case 'UserAsFashionLabel':
					if (!$this->lblUsersAsFashion) return $this->lblUsersAsFashion_Create();
					return $this->lblUsersAsFashion;
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
					// Controls that point to FashionPartner fields
					case 'IdControl':
						return ($this->lblId = QType::Cast($mixValue, 'QControl'));
					case 'NameControl':
						return ($this->txtName = QType::Cast($mixValue, 'QControl'));
					case 'DescriptionControl':
						return ($this->txtDescription = QType::Cast($mixValue, 'QControl'));
					case 'StreetControl':
						return ($this->txtStreet = QType::Cast($mixValue, 'QControl'));
					case 'CityControl':
						return ($this->txtCity = QType::Cast($mixValue, 'QControl'));
					case 'StateControl':
						return ($this->txtState = QType::Cast($mixValue, 'QControl'));
					case 'ZipcodeControl':
						return ($this->txtZipcode = QType::Cast($mixValue, 'QControl'));
					case 'PhoneControl':
						return ($this->txtPhone = QType::Cast($mixValue, 'QControl'));
					case 'EmailControl':
						return ($this->txtEmail = QType::Cast($mixValue, 'QControl'));
					case 'ContactPersonControl':
						return ($this->txtContactPerson = QType::Cast($mixValue, 'QControl'));
					case 'UserAsFashionControl':
						return ($this->lstUsersAsFashion = QType::Cast($mixValue, 'QControl'));
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