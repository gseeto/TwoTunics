<?php
	/**
	 * This is a MetaControl class, providing a QForm or QPanel access to event handlers
	 * and QControls to perform the Create, Edit, and Delete functionality
	 * of the Donation class.  This code-generated class
	 * contains all the basic elements to help a QPanel or QForm display an HTML form that can
	 * manipulate a single Donation object.
	 *
	 * To take advantage of some (or all) of these control objects, you
	 * must create a new QForm or QPanel which instantiates a DonationMetaControl
	 * class.
	 *
	 * Any and all changes to this file will be overwritten with any subsequent
	 * code re-generation.
	 * 
	 * @package My Application
	 * @subpackage MetaControls
	 * property-read Donation $Donation the actual Donation data class being edited
	 * property QLabel $IdControl
	 * property-read QLabel $IdLabel
	 * property QTextBox $DescriptionControl
	 * property-read QLabel $DescriptionLabel
	 * property QIntegerTextBox $QuantityGivenControl
	 * property-read QLabel $QuantityGivenLabel
	 * property QListBox $UnitGenreIdControl
	 * property-read QLabel $UnitGenreIdLabel
	 * property QListBox $SizeIdControl
	 * property-read QLabel $SizeIdLabel
	 * property QListBox $StatusControl
	 * property-read QLabel $StatusLabel
	 * property QFloatTextBox $CostPerUnitControl
	 * property-read QLabel $CostPerUnitLabel
	 * property QListBox $FashionPartnerIdControl
	 * property-read QLabel $FashionPartnerIdLabel
	 * property QDateTimePicker $DateDonatedControl
	 * property-read QLabel $DateDonatedLabel
	 * property QIntegerTextBox $QuantityRemainingControl
	 * property-read QLabel $QuantityRemainingLabel
	 * property-read string $TitleVerb a verb indicating whether or not this is being edited or created
	 * property-read boolean $EditMode a boolean indicating whether or not this is being edited or created
	 */

	class DonationMetaControlGen extends QBaseClass {
		// General Variables
		/**
		 * @var Donation objDonation
		 * @access protected
		 */
		protected $objDonation;

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

		// Controls that allow the editing of Donation's individual data fields
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
         * @var QIntegerTextBox txtQuantityGiven;
         * @access protected
         */
		protected $txtQuantityGiven;

        /**
         * @var QListBox lstUnitGenre;
         * @access protected
         */
		protected $lstUnitGenre;

        /**
         * @var QListBox lstSize;
         * @access protected
         */
		protected $lstSize;

        /**
         * @var QListBox lstStatusObject;
         * @access protected
         */
		protected $lstStatusObject;

        /**
         * @var QFloatTextBox txtCostPerUnit;
         * @access protected
         */
		protected $txtCostPerUnit;

        /**
         * @var QListBox lstFashionPartner;
         * @access protected
         */
		protected $lstFashionPartner;

        /**
         * @var QDateTimePicker calDateDonated;
         * @access protected
         */
		protected $calDateDonated;

        /**
         * @var QIntegerTextBox txtQuantityRemaining;
         * @access protected
         */
		protected $txtQuantityRemaining;


		// Controls that allow the viewing of Donation's individual data fields
        /**
         * @var QLabel lblDescription
         * @access protected
         */
		protected $lblDescription;

        /**
         * @var QLabel lblQuantityGiven
         * @access protected
         */
		protected $lblQuantityGiven;

        /**
         * @var QLabel lblUnitGenreId
         * @access protected
         */
		protected $lblUnitGenreId;

        /**
         * @var QLabel lblSizeId
         * @access protected
         */
		protected $lblSizeId;

        /**
         * @var QLabel lblStatus
         * @access protected
         */
		protected $lblStatus;

        /**
         * @var QLabel lblCostPerUnit
         * @access protected
         */
		protected $lblCostPerUnit;

        /**
         * @var QLabel lblFashionPartnerId
         * @access protected
         */
		protected $lblFashionPartnerId;

        /**
         * @var QLabel lblDateDonated
         * @access protected
         */
		protected $lblDateDonated;

        /**
         * @var QLabel lblQuantityRemaining
         * @access protected
         */
		protected $lblQuantityRemaining;


		// QListBox Controls (if applicable) to edit Unique ReverseReferences and ManyToMany References

		// QLabel Controls (if applicable) to view Unique ReverseReferences and ManyToMany References


		/**
		 * Main constructor.  Constructor OR static create methods are designed to be called in either
		 * a parent QPanel or the main QForm when wanting to create a
		 * DonationMetaControl to edit a single Donation object within the
		 * QPanel or QForm.
		 *
		 * This constructor takes in a single Donation object, while any of the static
		 * create methods below can be used to construct based off of individual PK ID(s).
		 *
		 * @param mixed $objParentObject QForm or QPanel which will be using this DonationMetaControl
		 * @param Donation $objDonation new or existing Donation object
		 */
		 public function __construct($objParentObject, Donation $objDonation) {
			// Setup Parent Object (e.g. QForm or QPanel which will be using this DonationMetaControl)
			$this->objParentObject = $objParentObject;

			// Setup linked Donation object
			$this->objDonation = $objDonation;

			// Figure out if we're Editing or Creating New
			if ($this->objDonation->__Restored) {
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
		 * @param mixed $objParentObject QForm or QPanel which will be using this DonationMetaControl
		 * @param integer $intId primary key value
		 * @param QMetaControlCreateType $intCreateType rules governing Donation object creation - defaults to CreateOrEdit
 		 * @return DonationMetaControl
		 */
		public static function Create($objParentObject, $intId = null, $intCreateType = QMetaControlCreateType::CreateOrEdit) {
			// Attempt to Load from PK Arguments
			if (strlen($intId)) {
				$objDonation = Donation::Load($intId);

				// Donation was found -- return it!
				if ($objDonation)
					return new DonationMetaControl($objParentObject, $objDonation);

				// If CreateOnRecordNotFound not specified, throw an exception
				else if ($intCreateType != QMetaControlCreateType::CreateOnRecordNotFound)
					throw new QCallerException('Could not find a Donation object with PK arguments: ' . $intId);

			// If EditOnly is specified, throw an exception
			} else if ($intCreateType == QMetaControlCreateType::EditOnly)
				throw new QCallerException('No PK arguments specified');

			// If we are here, then we need to create a new record
			return new DonationMetaControl($objParentObject, new Donation());
		}

		/**
		 * Static Helper Method to Create using PathInfo arguments
		 *
		 * @param mixed $objParentObject QForm or QPanel which will be using this DonationMetaControl
		 * @param QMetaControlCreateType $intCreateType rules governing Donation object creation - defaults to CreateOrEdit
		 * @return DonationMetaControl
		 */
		public static function CreateFromPathInfo($objParentObject, $intCreateType = QMetaControlCreateType::CreateOrEdit) {
			$intId = QApplication::PathInfo(0);
			return DonationMetaControl::Create($objParentObject, $intId, $intCreateType);
		}

		/**
		 * Static Helper Method to Create using QueryString arguments
		 *
		 * @param mixed $objParentObject QForm or QPanel which will be using this DonationMetaControl
		 * @param QMetaControlCreateType $intCreateType rules governing Donation object creation - defaults to CreateOrEdit
		 * @return DonationMetaControl
		 */
		public static function CreateFromQueryString($objParentObject, $intCreateType = QMetaControlCreateType::CreateOrEdit) {
			$intId = QApplication::QueryString('intId');
			return DonationMetaControl::Create($objParentObject, $intId, $intCreateType);
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
				$this->lblId->Text = $this->objDonation->Id;
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
			$this->txtDescription->Text = $this->objDonation->Description;
			$this->txtDescription->MaxLength = Donation::DescriptionMaxLength;
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
			$this->lblDescription->Text = $this->objDonation->Description;
			return $this->lblDescription;
		}

		/**
		 * Create and setup QIntegerTextBox txtQuantityGiven
		 * @param string $strControlId optional ControlId to use
		 * @return QIntegerTextBox
		 */
		public function txtQuantityGiven_Create($strControlId = null) {
			$this->txtQuantityGiven = new QIntegerTextBox($this->objParentObject, $strControlId);
			$this->txtQuantityGiven->Name = QApplication::Translate('Quantity Given');
			$this->txtQuantityGiven->Text = $this->objDonation->QuantityGiven;
			return $this->txtQuantityGiven;
		}

		/**
		 * Create and setup QLabel lblQuantityGiven
		 * @param string $strControlId optional ControlId to use
		 * @param string $strFormat optional sprintf format to use
		 * @return QLabel
		 */
		public function lblQuantityGiven_Create($strControlId = null, $strFormat = null) {
			$this->lblQuantityGiven = new QLabel($this->objParentObject, $strControlId);
			$this->lblQuantityGiven->Name = QApplication::Translate('Quantity Given');
			$this->lblQuantityGiven->Text = $this->objDonation->QuantityGiven;
			$this->lblQuantityGiven->Format = $strFormat;
			return $this->lblQuantityGiven;
		}

		/**
		 * Create and setup QListBox lstUnitGenre
		 * @param string $strControlId optional ControlId to use
		 * @param QQCondition $objConditions override the default condition of QQ::All() to the query, itself
		 * @param QQClause[] $objOptionalClauses additional optional QQClause object or array of QQClause objects for the query
		 * @return QListBox
		 */
		public function lstUnitGenre_Create($strControlId = null, QQCondition $objCondition = null, $objOptionalClauses = null) {
			$this->lstUnitGenre = new QListBox($this->objParentObject, $strControlId);
			$this->lstUnitGenre->Name = QApplication::Translate('Unit Genre');
			$this->lstUnitGenre->AddItem(QApplication::Translate('- Select One -'), null);

			// Setup and perform the Query
			if (is_null($objCondition)) $objCondition = QQ::All();
			$objUnitGenreCursor = UnitGenre::QueryCursor($objCondition, $objOptionalClauses);

			// Iterate through the Cursor
			while ($objUnitGenre = UnitGenre::InstantiateCursor($objUnitGenreCursor)) {
				$objListItem = new QListItem($objUnitGenre->__toString(), $objUnitGenre->Id);
				if (($this->objDonation->UnitGenre) && ($this->objDonation->UnitGenre->Id == $objUnitGenre->Id))
					$objListItem->Selected = true;
				$this->lstUnitGenre->AddItem($objListItem);
			}

			// Return the QListBox
			return $this->lstUnitGenre;
		}

		/**
		 * Create and setup QLabel lblUnitGenreId
		 * @param string $strControlId optional ControlId to use
		 * @return QLabel
		 */
		public function lblUnitGenreId_Create($strControlId = null) {
			$this->lblUnitGenreId = new QLabel($this->objParentObject, $strControlId);
			$this->lblUnitGenreId->Name = QApplication::Translate('Unit Genre');
			$this->lblUnitGenreId->Text = ($this->objDonation->UnitGenre) ? $this->objDonation->UnitGenre->__toString() : null;
			return $this->lblUnitGenreId;
		}

		/**
		 * Create and setup QListBox lstSize
		 * @param string $strControlId optional ControlId to use
		 * @param QQCondition $objConditions override the default condition of QQ::All() to the query, itself
		 * @param QQClause[] $objOptionalClauses additional optional QQClause object or array of QQClause objects for the query
		 * @return QListBox
		 */
		public function lstSize_Create($strControlId = null, QQCondition $objCondition = null, $objOptionalClauses = null) {
			$this->lstSize = new QListBox($this->objParentObject, $strControlId);
			$this->lstSize->Name = QApplication::Translate('Size');
			$this->lstSize->AddItem(QApplication::Translate('- Select One -'), null);

			// Setup and perform the Query
			if (is_null($objCondition)) $objCondition = QQ::All();
			$objSizeCursor = Size::QueryCursor($objCondition, $objOptionalClauses);

			// Iterate through the Cursor
			while ($objSize = Size::InstantiateCursor($objSizeCursor)) {
				$objListItem = new QListItem($objSize->__toString(), $objSize->Id);
				if (($this->objDonation->Size) && ($this->objDonation->Size->Id == $objSize->Id))
					$objListItem->Selected = true;
				$this->lstSize->AddItem($objListItem);
			}

			// Return the QListBox
			return $this->lstSize;
		}

		/**
		 * Create and setup QLabel lblSizeId
		 * @param string $strControlId optional ControlId to use
		 * @return QLabel
		 */
		public function lblSizeId_Create($strControlId = null) {
			$this->lblSizeId = new QLabel($this->objParentObject, $strControlId);
			$this->lblSizeId->Name = QApplication::Translate('Size');
			$this->lblSizeId->Text = ($this->objDonation->Size) ? $this->objDonation->Size->__toString() : null;
			return $this->lblSizeId;
		}

		/**
		 * Create and setup QListBox lstStatusObject
		 * @param string $strControlId optional ControlId to use
		 * @param QQCondition $objConditions override the default condition of QQ::All() to the query, itself
		 * @param QQClause[] $objOptionalClauses additional optional QQClause object or array of QQClause objects for the query
		 * @return QListBox
		 */
		public function lstStatusObject_Create($strControlId = null, QQCondition $objCondition = null, $objOptionalClauses = null) {
			$this->lstStatusObject = new QListBox($this->objParentObject, $strControlId);
			$this->lstStatusObject->Name = QApplication::Translate('Status Object');
			$this->lstStatusObject->AddItem(QApplication::Translate('- Select One -'), null);

			// Setup and perform the Query
			if (is_null($objCondition)) $objCondition = QQ::All();
			$objStatusObjectCursor = DonationStatus::QueryCursor($objCondition, $objOptionalClauses);

			// Iterate through the Cursor
			while ($objStatusObject = DonationStatus::InstantiateCursor($objStatusObjectCursor)) {
				$objListItem = new QListItem($objStatusObject->__toString(), $objStatusObject->Id);
				if (($this->objDonation->StatusObject) && ($this->objDonation->StatusObject->Id == $objStatusObject->Id))
					$objListItem->Selected = true;
				$this->lstStatusObject->AddItem($objListItem);
			}

			// Return the QListBox
			return $this->lstStatusObject;
		}

		/**
		 * Create and setup QLabel lblStatus
		 * @param string $strControlId optional ControlId to use
		 * @return QLabel
		 */
		public function lblStatus_Create($strControlId = null) {
			$this->lblStatus = new QLabel($this->objParentObject, $strControlId);
			$this->lblStatus->Name = QApplication::Translate('Status Object');
			$this->lblStatus->Text = ($this->objDonation->StatusObject) ? $this->objDonation->StatusObject->__toString() : null;
			return $this->lblStatus;
		}

		/**
		 * Create and setup QFloatTextBox txtCostPerUnit
		 * @param string $strControlId optional ControlId to use
		 * @return QFloatTextBox
		 */
		public function txtCostPerUnit_Create($strControlId = null) {
			$this->txtCostPerUnit = new QFloatTextBox($this->objParentObject, $strControlId);
			$this->txtCostPerUnit->Name = QApplication::Translate('Cost Per Unit');
			$this->txtCostPerUnit->Text = $this->objDonation->CostPerUnit;
			return $this->txtCostPerUnit;
		}

		/**
		 * Create and setup QLabel lblCostPerUnit
		 * @param string $strControlId optional ControlId to use
		 * @param string $strFormat optional sprintf format to use
		 * @return QLabel
		 */
		public function lblCostPerUnit_Create($strControlId = null, $strFormat = null) {
			$this->lblCostPerUnit = new QLabel($this->objParentObject, $strControlId);
			$this->lblCostPerUnit->Name = QApplication::Translate('Cost Per Unit');
			$this->lblCostPerUnit->Text = $this->objDonation->CostPerUnit;
			$this->lblCostPerUnit->Format = $strFormat;
			return $this->lblCostPerUnit;
		}

		/**
		 * Create and setup QListBox lstFashionPartner
		 * @param string $strControlId optional ControlId to use
		 * @param QQCondition $objConditions override the default condition of QQ::All() to the query, itself
		 * @param QQClause[] $objOptionalClauses additional optional QQClause object or array of QQClause objects for the query
		 * @return QListBox
		 */
		public function lstFashionPartner_Create($strControlId = null, QQCondition $objCondition = null, $objOptionalClauses = null) {
			$this->lstFashionPartner = new QListBox($this->objParentObject, $strControlId);
			$this->lstFashionPartner->Name = QApplication::Translate('Fashion Partner');
			$this->lstFashionPartner->AddItem(QApplication::Translate('- Select One -'), null);

			// Setup and perform the Query
			if (is_null($objCondition)) $objCondition = QQ::All();
			$objFashionPartnerCursor = FashionPartner::QueryCursor($objCondition, $objOptionalClauses);

			// Iterate through the Cursor
			while ($objFashionPartner = FashionPartner::InstantiateCursor($objFashionPartnerCursor)) {
				$objListItem = new QListItem($objFashionPartner->__toString(), $objFashionPartner->Id);
				if (($this->objDonation->FashionPartner) && ($this->objDonation->FashionPartner->Id == $objFashionPartner->Id))
					$objListItem->Selected = true;
				$this->lstFashionPartner->AddItem($objListItem);
			}

			// Return the QListBox
			return $this->lstFashionPartner;
		}

		/**
		 * Create and setup QLabel lblFashionPartnerId
		 * @param string $strControlId optional ControlId to use
		 * @return QLabel
		 */
		public function lblFashionPartnerId_Create($strControlId = null) {
			$this->lblFashionPartnerId = new QLabel($this->objParentObject, $strControlId);
			$this->lblFashionPartnerId->Name = QApplication::Translate('Fashion Partner');
			$this->lblFashionPartnerId->Text = ($this->objDonation->FashionPartner) ? $this->objDonation->FashionPartner->__toString() : null;
			return $this->lblFashionPartnerId;
		}

		/**
		 * Create and setup QDateTimePicker calDateDonated
		 * @param string $strControlId optional ControlId to use
		 * @return QDateTimePicker
		 */
		public function calDateDonated_Create($strControlId = null) {
			$this->calDateDonated = new QDateTimePicker($this->objParentObject, $strControlId);
			$this->calDateDonated->Name = QApplication::Translate('Date Donated');
			$this->calDateDonated->DateTime = $this->objDonation->DateDonated;
			$this->calDateDonated->DateTimePickerType = QDateTimePickerType::Date;
			return $this->calDateDonated;
		}

		/**
		 * Create and setup QLabel lblDateDonated
		 * @param string $strControlId optional ControlId to use
		 * @param string $strDateTimeFormat optional DateTimeFormat to use
		 * @return QLabel
		 */
		public function lblDateDonated_Create($strControlId = null, $strDateTimeFormat = null) {
			$this->lblDateDonated = new QLabel($this->objParentObject, $strControlId);
			$this->lblDateDonated->Name = QApplication::Translate('Date Donated');
			$this->strDateDonatedDateTimeFormat = $strDateTimeFormat;
			$this->lblDateDonated->Text = sprintf($this->objDonation->DateDonated) ? $this->objDonation->DateDonated->__toString($this->strDateDonatedDateTimeFormat) : null;
			return $this->lblDateDonated;
		}

		protected $strDateDonatedDateTimeFormat;

		/**
		 * Create and setup QIntegerTextBox txtQuantityRemaining
		 * @param string $strControlId optional ControlId to use
		 * @return QIntegerTextBox
		 */
		public function txtQuantityRemaining_Create($strControlId = null) {
			$this->txtQuantityRemaining = new QIntegerTextBox($this->objParentObject, $strControlId);
			$this->txtQuantityRemaining->Name = QApplication::Translate('Quantity Remaining');
			$this->txtQuantityRemaining->Text = $this->objDonation->QuantityRemaining;
			return $this->txtQuantityRemaining;
		}

		/**
		 * Create and setup QLabel lblQuantityRemaining
		 * @param string $strControlId optional ControlId to use
		 * @param string $strFormat optional sprintf format to use
		 * @return QLabel
		 */
		public function lblQuantityRemaining_Create($strControlId = null, $strFormat = null) {
			$this->lblQuantityRemaining = new QLabel($this->objParentObject, $strControlId);
			$this->lblQuantityRemaining->Name = QApplication::Translate('Quantity Remaining');
			$this->lblQuantityRemaining->Text = $this->objDonation->QuantityRemaining;
			$this->lblQuantityRemaining->Format = $strFormat;
			return $this->lblQuantityRemaining;
		}



		/**
		 * Refresh this MetaControl with Data from the local Donation object.
		 * @param boolean $blnReload reload Donation from the database
		 * @return void
		 */
		public function Refresh($blnReload = false) {
			if ($blnReload)
				$this->objDonation->Reload();

			if ($this->lblId) if ($this->blnEditMode) $this->lblId->Text = $this->objDonation->Id;

			if ($this->txtDescription) $this->txtDescription->Text = $this->objDonation->Description;
			if ($this->lblDescription) $this->lblDescription->Text = $this->objDonation->Description;

			if ($this->txtQuantityGiven) $this->txtQuantityGiven->Text = $this->objDonation->QuantityGiven;
			if ($this->lblQuantityGiven) $this->lblQuantityGiven->Text = $this->objDonation->QuantityGiven;

			if ($this->lstUnitGenre) {
					$this->lstUnitGenre->RemoveAllItems();
				$this->lstUnitGenre->AddItem(QApplication::Translate('- Select One -'), null);
				$objUnitGenreArray = UnitGenre::LoadAll();
				if ($objUnitGenreArray) foreach ($objUnitGenreArray as $objUnitGenre) {
					$objListItem = new QListItem($objUnitGenre->__toString(), $objUnitGenre->Id);
					if (($this->objDonation->UnitGenre) && ($this->objDonation->UnitGenre->Id == $objUnitGenre->Id))
						$objListItem->Selected = true;
					$this->lstUnitGenre->AddItem($objListItem);
				}
			}
			if ($this->lblUnitGenreId) $this->lblUnitGenreId->Text = ($this->objDonation->UnitGenre) ? $this->objDonation->UnitGenre->__toString() : null;

			if ($this->lstSize) {
					$this->lstSize->RemoveAllItems();
				$this->lstSize->AddItem(QApplication::Translate('- Select One -'), null);
				$objSizeArray = Size::LoadAll();
				if ($objSizeArray) foreach ($objSizeArray as $objSize) {
					$objListItem = new QListItem($objSize->__toString(), $objSize->Id);
					if (($this->objDonation->Size) && ($this->objDonation->Size->Id == $objSize->Id))
						$objListItem->Selected = true;
					$this->lstSize->AddItem($objListItem);
				}
			}
			if ($this->lblSizeId) $this->lblSizeId->Text = ($this->objDonation->Size) ? $this->objDonation->Size->__toString() : null;

			if ($this->lstStatusObject) {
					$this->lstStatusObject->RemoveAllItems();
				$this->lstStatusObject->AddItem(QApplication::Translate('- Select One -'), null);
				$objStatusObjectArray = DonationStatus::LoadAll();
				if ($objStatusObjectArray) foreach ($objStatusObjectArray as $objStatusObject) {
					$objListItem = new QListItem($objStatusObject->__toString(), $objStatusObject->Id);
					if (($this->objDonation->StatusObject) && ($this->objDonation->StatusObject->Id == $objStatusObject->Id))
						$objListItem->Selected = true;
					$this->lstStatusObject->AddItem($objListItem);
				}
			}
			if ($this->lblStatus) $this->lblStatus->Text = ($this->objDonation->StatusObject) ? $this->objDonation->StatusObject->__toString() : null;

			if ($this->txtCostPerUnit) $this->txtCostPerUnit->Text = $this->objDonation->CostPerUnit;
			if ($this->lblCostPerUnit) $this->lblCostPerUnit->Text = $this->objDonation->CostPerUnit;

			if ($this->lstFashionPartner) {
					$this->lstFashionPartner->RemoveAllItems();
				$this->lstFashionPartner->AddItem(QApplication::Translate('- Select One -'), null);
				$objFashionPartnerArray = FashionPartner::LoadAll();
				if ($objFashionPartnerArray) foreach ($objFashionPartnerArray as $objFashionPartner) {
					$objListItem = new QListItem($objFashionPartner->__toString(), $objFashionPartner->Id);
					if (($this->objDonation->FashionPartner) && ($this->objDonation->FashionPartner->Id == $objFashionPartner->Id))
						$objListItem->Selected = true;
					$this->lstFashionPartner->AddItem($objListItem);
				}
			}
			if ($this->lblFashionPartnerId) $this->lblFashionPartnerId->Text = ($this->objDonation->FashionPartner) ? $this->objDonation->FashionPartner->__toString() : null;

			if ($this->calDateDonated) $this->calDateDonated->DateTime = $this->objDonation->DateDonated;
			if ($this->lblDateDonated) $this->lblDateDonated->Text = sprintf($this->objDonation->DateDonated) ? $this->objDonation->__toString($this->strDateDonatedDateTimeFormat) : null;

			if ($this->txtQuantityRemaining) $this->txtQuantityRemaining->Text = $this->objDonation->QuantityRemaining;
			if ($this->lblQuantityRemaining) $this->lblQuantityRemaining->Text = $this->objDonation->QuantityRemaining;

		}



		///////////////////////////////////////////////
		// PROTECTED UPDATE METHODS for ManyToManyReferences (if any)
		///////////////////////////////////////////////





		///////////////////////////////////////////////
		// PUBLIC DONATION OBJECT MANIPULATORS
		///////////////////////////////////////////////

		/**
		 * This will save this object's Donation instance,
		 * updating only the fields which have had a control created for it.
		 */
		public function SaveDonation() {
			try {
				// Update any fields for controls that have been created
				if ($this->txtDescription) $this->objDonation->Description = $this->txtDescription->Text;
				if ($this->txtQuantityGiven) $this->objDonation->QuantityGiven = $this->txtQuantityGiven->Text;
				if ($this->lstUnitGenre) $this->objDonation->UnitGenreId = $this->lstUnitGenre->SelectedValue;
				if ($this->lstSize) $this->objDonation->SizeId = $this->lstSize->SelectedValue;
				if ($this->lstStatusObject) $this->objDonation->Status = $this->lstStatusObject->SelectedValue;
				if ($this->txtCostPerUnit) $this->objDonation->CostPerUnit = $this->txtCostPerUnit->Text;
				if ($this->lstFashionPartner) $this->objDonation->FashionPartnerId = $this->lstFashionPartner->SelectedValue;
				if ($this->calDateDonated) $this->objDonation->DateDonated = $this->calDateDonated->DateTime;
				if ($this->txtQuantityRemaining) $this->objDonation->QuantityRemaining = $this->txtQuantityRemaining->Text;

				// Update any UniqueReverseReferences (if any) for controls that have been created for it

				// Save the Donation object
				$this->objDonation->Save();

				// Finally, update any ManyToManyReferences (if any)
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * This will DELETE this object's Donation instance from the database.
		 * It will also unassociate itself from any ManyToManyReferences.
		 */
		public function DeleteDonation() {
			$this->objDonation->Delete();
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
				case 'Donation': return $this->objDonation;
				case 'TitleVerb': return $this->strTitleVerb;
				case 'EditMode': return $this->blnEditMode;

				// Controls that point to Donation fields -- will be created dynamically if not yet created
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
				case 'QuantityGivenControl':
					if (!$this->txtQuantityGiven) return $this->txtQuantityGiven_Create();
					return $this->txtQuantityGiven;
				case 'QuantityGivenLabel':
					if (!$this->lblQuantityGiven) return $this->lblQuantityGiven_Create();
					return $this->lblQuantityGiven;
				case 'UnitGenreIdControl':
					if (!$this->lstUnitGenre) return $this->lstUnitGenre_Create();
					return $this->lstUnitGenre;
				case 'UnitGenreIdLabel':
					if (!$this->lblUnitGenreId) return $this->lblUnitGenreId_Create();
					return $this->lblUnitGenreId;
				case 'SizeIdControl':
					if (!$this->lstSize) return $this->lstSize_Create();
					return $this->lstSize;
				case 'SizeIdLabel':
					if (!$this->lblSizeId) return $this->lblSizeId_Create();
					return $this->lblSizeId;
				case 'StatusControl':
					if (!$this->lstStatusObject) return $this->lstStatusObject_Create();
					return $this->lstStatusObject;
				case 'StatusLabel':
					if (!$this->lblStatus) return $this->lblStatus_Create();
					return $this->lblStatus;
				case 'CostPerUnitControl':
					if (!$this->txtCostPerUnit) return $this->txtCostPerUnit_Create();
					return $this->txtCostPerUnit;
				case 'CostPerUnitLabel':
					if (!$this->lblCostPerUnit) return $this->lblCostPerUnit_Create();
					return $this->lblCostPerUnit;
				case 'FashionPartnerIdControl':
					if (!$this->lstFashionPartner) return $this->lstFashionPartner_Create();
					return $this->lstFashionPartner;
				case 'FashionPartnerIdLabel':
					if (!$this->lblFashionPartnerId) return $this->lblFashionPartnerId_Create();
					return $this->lblFashionPartnerId;
				case 'DateDonatedControl':
					if (!$this->calDateDonated) return $this->calDateDonated_Create();
					return $this->calDateDonated;
				case 'DateDonatedLabel':
					if (!$this->lblDateDonated) return $this->lblDateDonated_Create();
					return $this->lblDateDonated;
				case 'QuantityRemainingControl':
					if (!$this->txtQuantityRemaining) return $this->txtQuantityRemaining_Create();
					return $this->txtQuantityRemaining;
				case 'QuantityRemainingLabel':
					if (!$this->lblQuantityRemaining) return $this->lblQuantityRemaining_Create();
					return $this->lblQuantityRemaining;
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
					// Controls that point to Donation fields
					case 'IdControl':
						return ($this->lblId = QType::Cast($mixValue, 'QControl'));
					case 'DescriptionControl':
						return ($this->txtDescription = QType::Cast($mixValue, 'QControl'));
					case 'QuantityGivenControl':
						return ($this->txtQuantityGiven = QType::Cast($mixValue, 'QControl'));
					case 'UnitGenreIdControl':
						return ($this->lstUnitGenre = QType::Cast($mixValue, 'QControl'));
					case 'SizeIdControl':
						return ($this->lstSize = QType::Cast($mixValue, 'QControl'));
					case 'StatusControl':
						return ($this->lstStatusObject = QType::Cast($mixValue, 'QControl'));
					case 'CostPerUnitControl':
						return ($this->txtCostPerUnit = QType::Cast($mixValue, 'QControl'));
					case 'FashionPartnerIdControl':
						return ($this->lstFashionPartner = QType::Cast($mixValue, 'QControl'));
					case 'DateDonatedControl':
						return ($this->calDateDonated = QType::Cast($mixValue, 'QControl'));
					case 'QuantityRemainingControl':
						return ($this->txtQuantityRemaining = QType::Cast($mixValue, 'QControl'));
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