<?php
	/**
	 * This is a MetaControl class, providing a QForm or QPanel access to event handlers
	 * and QControls to perform the Create, Edit, and Delete functionality
	 * of the Need class.  This code-generated class
	 * contains all the basic elements to help a QPanel or QForm display an HTML form that can
	 * manipulate a single Need object.
	 *
	 * To take advantage of some (or all) of these control objects, you
	 * must create a new QForm or QPanel which instantiates a NeedMetaControl
	 * class.
	 *
	 * Any and all changes to this file will be overwritten with any subsequent
	 * code re-generation.
	 * 
	 * @package My Application
	 * @subpackage MetaControls
	 * property-read Need $Need the actual Need data class being edited
	 * property QLabel $IdControl
	 * property-read QLabel $IdLabel
	 * property QTextBox $DescriptionControl
	 * property-read QLabel $DescriptionLabel
	 * property QIntegerTextBox $QuantityRequestedControl
	 * property-read QLabel $QuantityRequestedLabel
	 * property QListBox $UnitTypeIdControl
	 * property-read QLabel $UnitTypeIdLabel
	 * property QIntegerTextBox $SizeControl
	 * property-read QLabel $SizeLabel
	 * property QDateTimePicker $DateRequestedControl
	 * property-read QLabel $DateRequestedLabel
	 * property QListBox $CharityIdControl
	 * property-read QLabel $CharityIdLabel
	 * property QIntegerTextBox $QuantityStillRequiredControl
	 * property-read QLabel $QuantityStillRequiredLabel
	 * property-read string $TitleVerb a verb indicating whether or not this is being edited or created
	 * property-read boolean $EditMode a boolean indicating whether or not this is being edited or created
	 */

	class NeedMetaControlGen extends QBaseClass {
		// General Variables
		/**
		 * @var Need objNeed
		 * @access protected
		 */
		protected $objNeed;

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

		// Controls that allow the editing of Need's individual data fields
        /**
         * @var QLabel lblId;
         * @access protected
         */
		protected $lblId;

        /**
         * @var QTextBox txtDescription;
         * @access protected
         */
		protected $txtDescription;

        /**
         * @var QIntegerTextBox txtQuantityRequested;
         * @access protected
         */
		protected $txtQuantityRequested;

        /**
         * @var QListBox lstUnitType;
         * @access protected
         */
		protected $lstUnitType;

        /**
         * @var QIntegerTextBox txtSize;
         * @access protected
         */
		protected $txtSize;

        /**
         * @var QDateTimePicker calDateRequested;
         * @access protected
         */
		protected $calDateRequested;

        /**
         * @var QListBox lstCharity;
         * @access protected
         */
		protected $lstCharity;

        /**
         * @var QIntegerTextBox txtQuantityStillRequired;
         * @access protected
         */
		protected $txtQuantityStillRequired;


		// Controls that allow the viewing of Need's individual data fields
        /**
         * @var QLabel lblDescription
         * @access protected
         */
		protected $lblDescription;

        /**
         * @var QLabel lblQuantityRequested
         * @access protected
         */
		protected $lblQuantityRequested;

        /**
         * @var QLabel lblUnitTypeId
         * @access protected
         */
		protected $lblUnitTypeId;

        /**
         * @var QLabel lblSize
         * @access protected
         */
		protected $lblSize;

        /**
         * @var QLabel lblDateRequested
         * @access protected
         */
		protected $lblDateRequested;

        /**
         * @var QLabel lblCharityId
         * @access protected
         */
		protected $lblCharityId;

        /**
         * @var QLabel lblQuantityStillRequired
         * @access protected
         */
		protected $lblQuantityStillRequired;


		// QListBox Controls (if applicable) to edit Unique ReverseReferences and ManyToMany References

		// QLabel Controls (if applicable) to view Unique ReverseReferences and ManyToMany References


		/**
		 * Main constructor.  Constructor OR static create methods are designed to be called in either
		 * a parent QPanel or the main QForm when wanting to create a
		 * NeedMetaControl to edit a single Need object within the
		 * QPanel or QForm.
		 *
		 * This constructor takes in a single Need object, while any of the static
		 * create methods below can be used to construct based off of individual PK ID(s).
		 *
		 * @param mixed $objParentObject QForm or QPanel which will be using this NeedMetaControl
		 * @param Need $objNeed new or existing Need object
		 */
		 public function __construct($objParentObject, Need $objNeed) {
			// Setup Parent Object (e.g. QForm or QPanel which will be using this NeedMetaControl)
			$this->objParentObject = $objParentObject;

			// Setup linked Need object
			$this->objNeed = $objNeed;

			// Figure out if we're Editing or Creating New
			if ($this->objNeed->__Restored) {
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
		 * @param mixed $objParentObject QForm or QPanel which will be using this NeedMetaControl
		 * @param integer $intId primary key value
		 * @param QMetaControlCreateType $intCreateType rules governing Need object creation - defaults to CreateOrEdit
 		 * @return NeedMetaControl
		 */
		public static function Create($objParentObject, $intId = null, $intCreateType = QMetaControlCreateType::CreateOrEdit) {
			// Attempt to Load from PK Arguments
			if (strlen($intId)) {
				$objNeed = Need::Load($intId);

				// Need was found -- return it!
				if ($objNeed)
					return new NeedMetaControl($objParentObject, $objNeed);

				// If CreateOnRecordNotFound not specified, throw an exception
				else if ($intCreateType != QMetaControlCreateType::CreateOnRecordNotFound)
					throw new QCallerException('Could not find a Need object with PK arguments: ' . $intId);

			// If EditOnly is specified, throw an exception
			} else if ($intCreateType == QMetaControlCreateType::EditOnly)
				throw new QCallerException('No PK arguments specified');

			// If we are here, then we need to create a new record
			return new NeedMetaControl($objParentObject, new Need());
		}

		/**
		 * Static Helper Method to Create using PathInfo arguments
		 *
		 * @param mixed $objParentObject QForm or QPanel which will be using this NeedMetaControl
		 * @param QMetaControlCreateType $intCreateType rules governing Need object creation - defaults to CreateOrEdit
		 * @return NeedMetaControl
		 */
		public static function CreateFromPathInfo($objParentObject, $intCreateType = QMetaControlCreateType::CreateOrEdit) {
			$intId = QApplication::PathInfo(0);
			return NeedMetaControl::Create($objParentObject, $intId, $intCreateType);
		}

		/**
		 * Static Helper Method to Create using QueryString arguments
		 *
		 * @param mixed $objParentObject QForm or QPanel which will be using this NeedMetaControl
		 * @param QMetaControlCreateType $intCreateType rules governing Need object creation - defaults to CreateOrEdit
		 * @return NeedMetaControl
		 */
		public static function CreateFromQueryString($objParentObject, $intCreateType = QMetaControlCreateType::CreateOrEdit) {
			$intId = QApplication::QueryString('intId');
			return NeedMetaControl::Create($objParentObject, $intId, $intCreateType);
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
				$this->lblId->Text = $this->objNeed->Id;
			else
				$this->lblId->Text = 'N/A';
			return $this->lblId;
		}

		/**
		 * Create and setup QTextBox txtDescription
		 * @param string $strControlId optional ControlId to use
		 * @return QTextBox
		 */
		public function txtDescription_Create($strControlId = null) {
			$this->txtDescription = new QTextBox($this->objParentObject, $strControlId);
			$this->txtDescription->Name = QApplication::Translate('Description');
			$this->txtDescription->Text = $this->objNeed->Description;
			$this->txtDescription->MaxLength = Need::DescriptionMaxLength;
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
			$this->lblDescription->Text = $this->objNeed->Description;
			return $this->lblDescription;
		}

		/**
		 * Create and setup QIntegerTextBox txtQuantityRequested
		 * @param string $strControlId optional ControlId to use
		 * @return QIntegerTextBox
		 */
		public function txtQuantityRequested_Create($strControlId = null) {
			$this->txtQuantityRequested = new QIntegerTextBox($this->objParentObject, $strControlId);
			$this->txtQuantityRequested->Name = QApplication::Translate('Quantity Requested');
			$this->txtQuantityRequested->Text = $this->objNeed->QuantityRequested;
			return $this->txtQuantityRequested;
		}

		/**
		 * Create and setup QLabel lblQuantityRequested
		 * @param string $strControlId optional ControlId to use
		 * @param string $strFormat optional sprintf format to use
		 * @return QLabel
		 */
		public function lblQuantityRequested_Create($strControlId = null, $strFormat = null) {
			$this->lblQuantityRequested = new QLabel($this->objParentObject, $strControlId);
			$this->lblQuantityRequested->Name = QApplication::Translate('Quantity Requested');
			$this->lblQuantityRequested->Text = $this->objNeed->QuantityRequested;
			$this->lblQuantityRequested->Format = $strFormat;
			return $this->lblQuantityRequested;
		}

		/**
		 * Create and setup QListBox lstUnitType
		 * @param string $strControlId optional ControlId to use
		 * @return QListBox
		 */
		public function lstUnitType_Create($strControlId = null) {
			$this->lstUnitType = new QListBox($this->objParentObject, $strControlId);
			$this->lstUnitType->Name = QApplication::Translate('Unit Type');
			$this->lstUnitType->AddItem(QApplication::Translate('- Select One -'), null);

			$this->lstUnitType->AddItems(UnitType::$NameArray, $this->objNeed->UnitTypeId);
			return $this->lstUnitType;
		}

		/**
		 * Create and setup QLabel lblUnitTypeId
		 * @param string $strControlId optional ControlId to use
		 * @return QLabel
		 */
		public function lblUnitTypeId_Create($strControlId = null) {
			$this->lblUnitTypeId = new QLabel($this->objParentObject, $strControlId);
			$this->lblUnitTypeId->Name = QApplication::Translate('Unit Type');
			$this->lblUnitTypeId->Text = ($this->objNeed->UnitTypeId) ? UnitType::$NameArray[$this->objNeed->UnitTypeId] : null;
			return $this->lblUnitTypeId;
		}

		/**
		 * Create and setup QIntegerTextBox txtSize
		 * @param string $strControlId optional ControlId to use
		 * @return QIntegerTextBox
		 */
		public function txtSize_Create($strControlId = null) {
			$this->txtSize = new QIntegerTextBox($this->objParentObject, $strControlId);
			$this->txtSize->Name = QApplication::Translate('Size');
			$this->txtSize->Text = $this->objNeed->Size;
			return $this->txtSize;
		}

		/**
		 * Create and setup QLabel lblSize
		 * @param string $strControlId optional ControlId to use
		 * @param string $strFormat optional sprintf format to use
		 * @return QLabel
		 */
		public function lblSize_Create($strControlId = null, $strFormat = null) {
			$this->lblSize = new QLabel($this->objParentObject, $strControlId);
			$this->lblSize->Name = QApplication::Translate('Size');
			$this->lblSize->Text = $this->objNeed->Size;
			$this->lblSize->Format = $strFormat;
			return $this->lblSize;
		}

		/**
		 * Create and setup QDateTimePicker calDateRequested
		 * @param string $strControlId optional ControlId to use
		 * @return QDateTimePicker
		 */
		public function calDateRequested_Create($strControlId = null) {
			$this->calDateRequested = new QDateTimePicker($this->objParentObject, $strControlId);
			$this->calDateRequested->Name = QApplication::Translate('Date Requested');
			$this->calDateRequested->DateTime = $this->objNeed->DateRequested;
			$this->calDateRequested->DateTimePickerType = QDateTimePickerType::Date;
			return $this->calDateRequested;
		}

		/**
		 * Create and setup QLabel lblDateRequested
		 * @param string $strControlId optional ControlId to use
		 * @param string $strDateTimeFormat optional DateTimeFormat to use
		 * @return QLabel
		 */
		public function lblDateRequested_Create($strControlId = null, $strDateTimeFormat = null) {
			$this->lblDateRequested = new QLabel($this->objParentObject, $strControlId);
			$this->lblDateRequested->Name = QApplication::Translate('Date Requested');
			$this->strDateRequestedDateTimeFormat = $strDateTimeFormat;
			$this->lblDateRequested->Text = sprintf($this->objNeed->DateRequested) ? $this->objNeed->DateRequested->__toString($this->strDateRequestedDateTimeFormat) : null;
			return $this->lblDateRequested;
		}

		protected $strDateRequestedDateTimeFormat;

		/**
		 * Create and setup QListBox lstCharity
		 * @param string $strControlId optional ControlId to use
		 * @param QQCondition $objConditions override the default condition of QQ::All() to the query, itself
		 * @param QQClause[] $objOptionalClauses additional optional QQClause object or array of QQClause objects for the query
		 * @return QListBox
		 */
		public function lstCharity_Create($strControlId = null, QQCondition $objCondition = null, $objOptionalClauses = null) {
			$this->lstCharity = new QListBox($this->objParentObject, $strControlId);
			$this->lstCharity->Name = QApplication::Translate('Charity');
			$this->lstCharity->AddItem(QApplication::Translate('- Select One -'), null);

			// Setup and perform the Query
			if (is_null($objCondition)) $objCondition = QQ::All();
			$objCharityCursor = CharityPartner::QueryCursor($objCondition, $objOptionalClauses);

			// Iterate through the Cursor
			while ($objCharity = CharityPartner::InstantiateCursor($objCharityCursor)) {
				$objListItem = new QListItem($objCharity->__toString(), $objCharity->Id);
				if (($this->objNeed->Charity) && ($this->objNeed->Charity->Id == $objCharity->Id))
					$objListItem->Selected = true;
				$this->lstCharity->AddItem($objListItem);
			}

			// Return the QListBox
			return $this->lstCharity;
		}

		/**
		 * Create and setup QLabel lblCharityId
		 * @param string $strControlId optional ControlId to use
		 * @return QLabel
		 */
		public function lblCharityId_Create($strControlId = null) {
			$this->lblCharityId = new QLabel($this->objParentObject, $strControlId);
			$this->lblCharityId->Name = QApplication::Translate('Charity');
			$this->lblCharityId->Text = ($this->objNeed->Charity) ? $this->objNeed->Charity->__toString() : null;
			return $this->lblCharityId;
		}

		/**
		 * Create and setup QIntegerTextBox txtQuantityStillRequired
		 * @param string $strControlId optional ControlId to use
		 * @return QIntegerTextBox
		 */
		public function txtQuantityStillRequired_Create($strControlId = null) {
			$this->txtQuantityStillRequired = new QIntegerTextBox($this->objParentObject, $strControlId);
			$this->txtQuantityStillRequired->Name = QApplication::Translate('Quantity Still Required');
			$this->txtQuantityStillRequired->Text = $this->objNeed->QuantityStillRequired;
			return $this->txtQuantityStillRequired;
		}

		/**
		 * Create and setup QLabel lblQuantityStillRequired
		 * @param string $strControlId optional ControlId to use
		 * @param string $strFormat optional sprintf format to use
		 * @return QLabel
		 */
		public function lblQuantityStillRequired_Create($strControlId = null, $strFormat = null) {
			$this->lblQuantityStillRequired = new QLabel($this->objParentObject, $strControlId);
			$this->lblQuantityStillRequired->Name = QApplication::Translate('Quantity Still Required');
			$this->lblQuantityStillRequired->Text = $this->objNeed->QuantityStillRequired;
			$this->lblQuantityStillRequired->Format = $strFormat;
			return $this->lblQuantityStillRequired;
		}



		/**
		 * Refresh this MetaControl with Data from the local Need object.
		 * @param boolean $blnReload reload Need from the database
		 * @return void
		 */
		public function Refresh($blnReload = false) {
			if ($blnReload)
				$this->objNeed->Reload();

			if ($this->lblId) if ($this->blnEditMode) $this->lblId->Text = $this->objNeed->Id;

			if ($this->txtDescription) $this->txtDescription->Text = $this->objNeed->Description;
			if ($this->lblDescription) $this->lblDescription->Text = $this->objNeed->Description;

			if ($this->txtQuantityRequested) $this->txtQuantityRequested->Text = $this->objNeed->QuantityRequested;
			if ($this->lblQuantityRequested) $this->lblQuantityRequested->Text = $this->objNeed->QuantityRequested;

			if ($this->lstUnitType) $this->lstUnitType->SelectedValue = $this->objNeed->UnitTypeId;
			if ($this->lblUnitTypeId) $this->lblUnitTypeId->Text = ($this->objNeed->UnitTypeId) ? UnitType::$NameArray[$this->objNeed->UnitTypeId] : null;

			if ($this->txtSize) $this->txtSize->Text = $this->objNeed->Size;
			if ($this->lblSize) $this->lblSize->Text = $this->objNeed->Size;

			if ($this->calDateRequested) $this->calDateRequested->DateTime = $this->objNeed->DateRequested;
			if ($this->lblDateRequested) $this->lblDateRequested->Text = sprintf($this->objNeed->DateRequested) ? $this->objNeed->__toString($this->strDateRequestedDateTimeFormat) : null;

			if ($this->lstCharity) {
					$this->lstCharity->RemoveAllItems();
				$this->lstCharity->AddItem(QApplication::Translate('- Select One -'), null);
				$objCharityArray = CharityPartner::LoadAll();
				if ($objCharityArray) foreach ($objCharityArray as $objCharity) {
					$objListItem = new QListItem($objCharity->__toString(), $objCharity->Id);
					if (($this->objNeed->Charity) && ($this->objNeed->Charity->Id == $objCharity->Id))
						$objListItem->Selected = true;
					$this->lstCharity->AddItem($objListItem);
				}
			}
			if ($this->lblCharityId) $this->lblCharityId->Text = ($this->objNeed->Charity) ? $this->objNeed->Charity->__toString() : null;

			if ($this->txtQuantityStillRequired) $this->txtQuantityStillRequired->Text = $this->objNeed->QuantityStillRequired;
			if ($this->lblQuantityStillRequired) $this->lblQuantityStillRequired->Text = $this->objNeed->QuantityStillRequired;

		}



		///////////////////////////////////////////////
		// PROTECTED UPDATE METHODS for ManyToManyReferences (if any)
		///////////////////////////////////////////////





		///////////////////////////////////////////////
		// PUBLIC NEED OBJECT MANIPULATORS
		///////////////////////////////////////////////

		/**
		 * This will save this object's Need instance,
		 * updating only the fields which have had a control created for it.
		 */
		public function SaveNeed() {
			try {
				// Update any fields for controls that have been created
				if ($this->txtDescription) $this->objNeed->Description = $this->txtDescription->Text;
				if ($this->txtQuantityRequested) $this->objNeed->QuantityRequested = $this->txtQuantityRequested->Text;
				if ($this->lstUnitType) $this->objNeed->UnitTypeId = $this->lstUnitType->SelectedValue;
				if ($this->txtSize) $this->objNeed->Size = $this->txtSize->Text;
				if ($this->calDateRequested) $this->objNeed->DateRequested = $this->calDateRequested->DateTime;
				if ($this->lstCharity) $this->objNeed->CharityId = $this->lstCharity->SelectedValue;
				if ($this->txtQuantityStillRequired) $this->objNeed->QuantityStillRequired = $this->txtQuantityStillRequired->Text;

				// Update any UniqueReverseReferences (if any) for controls that have been created for it

				// Save the Need object
				$this->objNeed->Save();

				// Finally, update any ManyToManyReferences (if any)
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * This will DELETE this object's Need instance from the database.
		 * It will also unassociate itself from any ManyToManyReferences.
		 */
		public function DeleteNeed() {
			$this->objNeed->Delete();
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
				case 'Need': return $this->objNeed;
				case 'TitleVerb': return $this->strTitleVerb;
				case 'EditMode': return $this->blnEditMode;

				// Controls that point to Need fields -- will be created dynamically if not yet created
				case 'IdControl':
					if (!$this->lblId) return $this->lblId_Create();
					return $this->lblId;
				case 'IdLabel':
					if (!$this->lblId) return $this->lblId_Create();
					return $this->lblId;
				case 'DescriptionControl':
					if (!$this->txtDescription) return $this->txtDescription_Create();
					return $this->txtDescription;
				case 'DescriptionLabel':
					if (!$this->lblDescription) return $this->lblDescription_Create();
					return $this->lblDescription;
				case 'QuantityRequestedControl':
					if (!$this->txtQuantityRequested) return $this->txtQuantityRequested_Create();
					return $this->txtQuantityRequested;
				case 'QuantityRequestedLabel':
					if (!$this->lblQuantityRequested) return $this->lblQuantityRequested_Create();
					return $this->lblQuantityRequested;
				case 'UnitTypeIdControl':
					if (!$this->lstUnitType) return $this->lstUnitType_Create();
					return $this->lstUnitType;
				case 'UnitTypeIdLabel':
					if (!$this->lblUnitTypeId) return $this->lblUnitTypeId_Create();
					return $this->lblUnitTypeId;
				case 'SizeControl':
					if (!$this->txtSize) return $this->txtSize_Create();
					return $this->txtSize;
				case 'SizeLabel':
					if (!$this->lblSize) return $this->lblSize_Create();
					return $this->lblSize;
				case 'DateRequestedControl':
					if (!$this->calDateRequested) return $this->calDateRequested_Create();
					return $this->calDateRequested;
				case 'DateRequestedLabel':
					if (!$this->lblDateRequested) return $this->lblDateRequested_Create();
					return $this->lblDateRequested;
				case 'CharityIdControl':
					if (!$this->lstCharity) return $this->lstCharity_Create();
					return $this->lstCharity;
				case 'CharityIdLabel':
					if (!$this->lblCharityId) return $this->lblCharityId_Create();
					return $this->lblCharityId;
				case 'QuantityStillRequiredControl':
					if (!$this->txtQuantityStillRequired) return $this->txtQuantityStillRequired_Create();
					return $this->txtQuantityStillRequired;
				case 'QuantityStillRequiredLabel':
					if (!$this->lblQuantityStillRequired) return $this->lblQuantityStillRequired_Create();
					return $this->lblQuantityStillRequired;
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
					// Controls that point to Need fields
					case 'IdControl':
						return ($this->lblId = QType::Cast($mixValue, 'QControl'));
					case 'DescriptionControl':
						return ($this->txtDescription = QType::Cast($mixValue, 'QControl'));
					case 'QuantityRequestedControl':
						return ($this->txtQuantityRequested = QType::Cast($mixValue, 'QControl'));
					case 'UnitTypeIdControl':
						return ($this->lstUnitType = QType::Cast($mixValue, 'QControl'));
					case 'SizeControl':
						return ($this->txtSize = QType::Cast($mixValue, 'QControl'));
					case 'DateRequestedControl':
						return ($this->calDateRequested = QType::Cast($mixValue, 'QControl'));
					case 'CharityIdControl':
						return ($this->lstCharity = QType::Cast($mixValue, 'QControl'));
					case 'QuantityStillRequiredControl':
						return ($this->txtQuantityStillRequired = QType::Cast($mixValue, 'QControl'));
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