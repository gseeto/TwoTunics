<?php
	/**
	 * This is a MetaControl class, providing a QForm or QPanel access to event handlers
	 * and QControls to perform the Create, Edit, and Delete functionality
	 * of the Transaction class.  This code-generated class
	 * contains all the basic elements to help a QPanel or QForm display an HTML form that can
	 * manipulate a single Transaction object.
	 *
	 * To take advantage of some (or all) of these control objects, you
	 * must create a new QForm or QPanel which instantiates a TransactionMetaControl
	 * class.
	 *
	 * Any and all changes to this file will be overwritten with any subsequent
	 * code re-generation.
	 * 
	 * @package My Application
	 * @subpackage MetaControls
	 * property-read Transaction $Transaction the actual Transaction data class being edited
	 * property QLabel $IdControl
	 * property-read QLabel $IdLabel
	 * property QListBox $DonationIdControl
	 * property-read QLabel $DonationIdLabel
	 * property QListBox $NeedIdControl
	 * property-read QLabel $NeedIdLabel
	 * property QDateTimePicker $DateInitiatedControl
	 * property-read QLabel $DateInitiatedLabel
	 * property QIntegerTextBox $NumberOfUnitsControl
	 * property-read QLabel $NumberOfUnitsLabel
	 * property-read string $TitleVerb a verb indicating whether or not this is being edited or created
	 * property-read boolean $EditMode a boolean indicating whether or not this is being edited or created
	 */

	class TransactionMetaControlGen extends QBaseClass {
		// General Variables
		/**
		 * @var Transaction objTransaction
		 * @access protected
		 */
		protected $objTransaction;

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

		// Controls that allow the editing of Transaction's individual data fields
        /**
         * @var QLabel lblId;
         * @access protected
         */
		protected $lblId;

        /**
         * @var QListBox lstDonation;
         * @access protected
         */
		protected $lstDonation;

        /**
         * @var QListBox lstNeed;
         * @access protected
         */
		protected $lstNeed;

        /**
         * @var QDateTimePicker calDateInitiated;
         * @access protected
         */
		protected $calDateInitiated;

        /**
         * @var QIntegerTextBox txtNumberOfUnits;
         * @access protected
         */
		protected $txtNumberOfUnits;


		// Controls that allow the viewing of Transaction's individual data fields
        /**
         * @var QLabel lblDonationId
         * @access protected
         */
		protected $lblDonationId;

        /**
         * @var QLabel lblNeedId
         * @access protected
         */
		protected $lblNeedId;

        /**
         * @var QLabel lblDateInitiated
         * @access protected
         */
		protected $lblDateInitiated;

        /**
         * @var QLabel lblNumberOfUnits
         * @access protected
         */
		protected $lblNumberOfUnits;


		// QListBox Controls (if applicable) to edit Unique ReverseReferences and ManyToMany References

		// QLabel Controls (if applicable) to view Unique ReverseReferences and ManyToMany References


		/**
		 * Main constructor.  Constructor OR static create methods are designed to be called in either
		 * a parent QPanel or the main QForm when wanting to create a
		 * TransactionMetaControl to edit a single Transaction object within the
		 * QPanel or QForm.
		 *
		 * This constructor takes in a single Transaction object, while any of the static
		 * create methods below can be used to construct based off of individual PK ID(s).
		 *
		 * @param mixed $objParentObject QForm or QPanel which will be using this TransactionMetaControl
		 * @param Transaction $objTransaction new or existing Transaction object
		 */
		 public function __construct($objParentObject, Transaction $objTransaction) {
			// Setup Parent Object (e.g. QForm or QPanel which will be using this TransactionMetaControl)
			$this->objParentObject = $objParentObject;

			// Setup linked Transaction object
			$this->objTransaction = $objTransaction;

			// Figure out if we're Editing or Creating New
			if ($this->objTransaction->__Restored) {
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
		 * @param mixed $objParentObject QForm or QPanel which will be using this TransactionMetaControl
		 * @param integer $intId primary key value
		 * @param QMetaControlCreateType $intCreateType rules governing Transaction object creation - defaults to CreateOrEdit
 		 * @return TransactionMetaControl
		 */
		public static function Create($objParentObject, $intId = null, $intCreateType = QMetaControlCreateType::CreateOrEdit) {
			// Attempt to Load from PK Arguments
			if (strlen($intId)) {
				$objTransaction = Transaction::Load($intId);

				// Transaction was found -- return it!
				if ($objTransaction)
					return new TransactionMetaControl($objParentObject, $objTransaction);

				// If CreateOnRecordNotFound not specified, throw an exception
				else if ($intCreateType != QMetaControlCreateType::CreateOnRecordNotFound)
					throw new QCallerException('Could not find a Transaction object with PK arguments: ' . $intId);

			// If EditOnly is specified, throw an exception
			} else if ($intCreateType == QMetaControlCreateType::EditOnly)
				throw new QCallerException('No PK arguments specified');

			// If we are here, then we need to create a new record
			return new TransactionMetaControl($objParentObject, new Transaction());
		}

		/**
		 * Static Helper Method to Create using PathInfo arguments
		 *
		 * @param mixed $objParentObject QForm or QPanel which will be using this TransactionMetaControl
		 * @param QMetaControlCreateType $intCreateType rules governing Transaction object creation - defaults to CreateOrEdit
		 * @return TransactionMetaControl
		 */
		public static function CreateFromPathInfo($objParentObject, $intCreateType = QMetaControlCreateType::CreateOrEdit) {
			$intId = QApplication::PathInfo(0);
			return TransactionMetaControl::Create($objParentObject, $intId, $intCreateType);
		}

		/**
		 * Static Helper Method to Create using QueryString arguments
		 *
		 * @param mixed $objParentObject QForm or QPanel which will be using this TransactionMetaControl
		 * @param QMetaControlCreateType $intCreateType rules governing Transaction object creation - defaults to CreateOrEdit
		 * @return TransactionMetaControl
		 */
		public static function CreateFromQueryString($objParentObject, $intCreateType = QMetaControlCreateType::CreateOrEdit) {
			$intId = QApplication::QueryString('intId');
			return TransactionMetaControl::Create($objParentObject, $intId, $intCreateType);
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
				$this->lblId->Text = $this->objTransaction->Id;
			else
				$this->lblId->Text = 'N/A';
			return $this->lblId;
		}

		/**
		 * Create and setup QListBox lstDonation
		 * @param string $strControlId optional ControlId to use
		 * @param QQCondition $objConditions override the default condition of QQ::All() to the query, itself
		 * @param QQClause[] $objOptionalClauses additional optional QQClause object or array of QQClause objects for the query
		 * @return QListBox
		 */
		public function lstDonation_Create($strControlId = null, QQCondition $objCondition = null, $objOptionalClauses = null) {
			$this->lstDonation = new QListBox($this->objParentObject, $strControlId);
			$this->lstDonation->Name = QApplication::Translate('Donation');
			$this->lstDonation->AddItem(QApplication::Translate('- Select One -'), null);

			// Setup and perform the Query
			if (is_null($objCondition)) $objCondition = QQ::All();
			$objDonationCursor = Donation::QueryCursor($objCondition, $objOptionalClauses);

			// Iterate through the Cursor
			while ($objDonation = Donation::InstantiateCursor($objDonationCursor)) {
				$objListItem = new QListItem($objDonation->__toString(), $objDonation->Id);
				if (($this->objTransaction->Donation) && ($this->objTransaction->Donation->Id == $objDonation->Id))
					$objListItem->Selected = true;
				$this->lstDonation->AddItem($objListItem);
			}

			// Return the QListBox
			return $this->lstDonation;
		}

		/**
		 * Create and setup QLabel lblDonationId
		 * @param string $strControlId optional ControlId to use
		 * @return QLabel
		 */
		public function lblDonationId_Create($strControlId = null) {
			$this->lblDonationId = new QLabel($this->objParentObject, $strControlId);
			$this->lblDonationId->Name = QApplication::Translate('Donation');
			$this->lblDonationId->Text = ($this->objTransaction->Donation) ? $this->objTransaction->Donation->__toString() : null;
			return $this->lblDonationId;
		}

		/**
		 * Create and setup QListBox lstNeed
		 * @param string $strControlId optional ControlId to use
		 * @param QQCondition $objConditions override the default condition of QQ::All() to the query, itself
		 * @param QQClause[] $objOptionalClauses additional optional QQClause object or array of QQClause objects for the query
		 * @return QListBox
		 */
		public function lstNeed_Create($strControlId = null, QQCondition $objCondition = null, $objOptionalClauses = null) {
			$this->lstNeed = new QListBox($this->objParentObject, $strControlId);
			$this->lstNeed->Name = QApplication::Translate('Need');
			$this->lstNeed->AddItem(QApplication::Translate('- Select One -'), null);

			// Setup and perform the Query
			if (is_null($objCondition)) $objCondition = QQ::All();
			$objNeedCursor = Need::QueryCursor($objCondition, $objOptionalClauses);

			// Iterate through the Cursor
			while ($objNeed = Need::InstantiateCursor($objNeedCursor)) {
				$objListItem = new QListItem($objNeed->__toString(), $objNeed->Id);
				if (($this->objTransaction->Need) && ($this->objTransaction->Need->Id == $objNeed->Id))
					$objListItem->Selected = true;
				$this->lstNeed->AddItem($objListItem);
			}

			// Return the QListBox
			return $this->lstNeed;
		}

		/**
		 * Create and setup QLabel lblNeedId
		 * @param string $strControlId optional ControlId to use
		 * @return QLabel
		 */
		public function lblNeedId_Create($strControlId = null) {
			$this->lblNeedId = new QLabel($this->objParentObject, $strControlId);
			$this->lblNeedId->Name = QApplication::Translate('Need');
			$this->lblNeedId->Text = ($this->objTransaction->Need) ? $this->objTransaction->Need->__toString() : null;
			return $this->lblNeedId;
		}

		/**
		 * Create and setup QDateTimePicker calDateInitiated
		 * @param string $strControlId optional ControlId to use
		 * @return QDateTimePicker
		 */
		public function calDateInitiated_Create($strControlId = null) {
			$this->calDateInitiated = new QDateTimePicker($this->objParentObject, $strControlId);
			$this->calDateInitiated->Name = QApplication::Translate('Date Initiated');
			$this->calDateInitiated->DateTime = $this->objTransaction->DateInitiated;
			$this->calDateInitiated->DateTimePickerType = QDateTimePickerType::Date;
			return $this->calDateInitiated;
		}

		/**
		 * Create and setup QLabel lblDateInitiated
		 * @param string $strControlId optional ControlId to use
		 * @param string $strDateTimeFormat optional DateTimeFormat to use
		 * @return QLabel
		 */
		public function lblDateInitiated_Create($strControlId = null, $strDateTimeFormat = null) {
			$this->lblDateInitiated = new QLabel($this->objParentObject, $strControlId);
			$this->lblDateInitiated->Name = QApplication::Translate('Date Initiated');
			$this->strDateInitiatedDateTimeFormat = $strDateTimeFormat;
			$this->lblDateInitiated->Text = sprintf($this->objTransaction->DateInitiated) ? $this->objTransaction->DateInitiated->__toString($this->strDateInitiatedDateTimeFormat) : null;
			return $this->lblDateInitiated;
		}

		protected $strDateInitiatedDateTimeFormat;

		/**
		 * Create and setup QIntegerTextBox txtNumberOfUnits
		 * @param string $strControlId optional ControlId to use
		 * @return QIntegerTextBox
		 */
		public function txtNumberOfUnits_Create($strControlId = null) {
			$this->txtNumberOfUnits = new QIntegerTextBox($this->objParentObject, $strControlId);
			$this->txtNumberOfUnits->Name = QApplication::Translate('Number Of Units');
			$this->txtNumberOfUnits->Text = $this->objTransaction->NumberOfUnits;
			return $this->txtNumberOfUnits;
		}

		/**
		 * Create and setup QLabel lblNumberOfUnits
		 * @param string $strControlId optional ControlId to use
		 * @param string $strFormat optional sprintf format to use
		 * @return QLabel
		 */
		public function lblNumberOfUnits_Create($strControlId = null, $strFormat = null) {
			$this->lblNumberOfUnits = new QLabel($this->objParentObject, $strControlId);
			$this->lblNumberOfUnits->Name = QApplication::Translate('Number Of Units');
			$this->lblNumberOfUnits->Text = $this->objTransaction->NumberOfUnits;
			$this->lblNumberOfUnits->Format = $strFormat;
			return $this->lblNumberOfUnits;
		}



		/**
		 * Refresh this MetaControl with Data from the local Transaction object.
		 * @param boolean $blnReload reload Transaction from the database
		 * @return void
		 */
		public function Refresh($blnReload = false) {
			if ($blnReload)
				$this->objTransaction->Reload();

			if ($this->lblId) if ($this->blnEditMode) $this->lblId->Text = $this->objTransaction->Id;

			if ($this->lstDonation) {
					$this->lstDonation->RemoveAllItems();
				$this->lstDonation->AddItem(QApplication::Translate('- Select One -'), null);
				$objDonationArray = Donation::LoadAll();
				if ($objDonationArray) foreach ($objDonationArray as $objDonation) {
					$objListItem = new QListItem($objDonation->__toString(), $objDonation->Id);
					if (($this->objTransaction->Donation) && ($this->objTransaction->Donation->Id == $objDonation->Id))
						$objListItem->Selected = true;
					$this->lstDonation->AddItem($objListItem);
				}
			}
			if ($this->lblDonationId) $this->lblDonationId->Text = ($this->objTransaction->Donation) ? $this->objTransaction->Donation->__toString() : null;

			if ($this->lstNeed) {
					$this->lstNeed->RemoveAllItems();
				$this->lstNeed->AddItem(QApplication::Translate('- Select One -'), null);
				$objNeedArray = Need::LoadAll();
				if ($objNeedArray) foreach ($objNeedArray as $objNeed) {
					$objListItem = new QListItem($objNeed->__toString(), $objNeed->Id);
					if (($this->objTransaction->Need) && ($this->objTransaction->Need->Id == $objNeed->Id))
						$objListItem->Selected = true;
					$this->lstNeed->AddItem($objListItem);
				}
			}
			if ($this->lblNeedId) $this->lblNeedId->Text = ($this->objTransaction->Need) ? $this->objTransaction->Need->__toString() : null;

			if ($this->calDateInitiated) $this->calDateInitiated->DateTime = $this->objTransaction->DateInitiated;
			if ($this->lblDateInitiated) $this->lblDateInitiated->Text = sprintf($this->objTransaction->DateInitiated) ? $this->objTransaction->__toString($this->strDateInitiatedDateTimeFormat) : null;

			if ($this->txtNumberOfUnits) $this->txtNumberOfUnits->Text = $this->objTransaction->NumberOfUnits;
			if ($this->lblNumberOfUnits) $this->lblNumberOfUnits->Text = $this->objTransaction->NumberOfUnits;

		}



		///////////////////////////////////////////////
		// PROTECTED UPDATE METHODS for ManyToManyReferences (if any)
		///////////////////////////////////////////////





		///////////////////////////////////////////////
		// PUBLIC TRANSACTION OBJECT MANIPULATORS
		///////////////////////////////////////////////

		/**
		 * This will save this object's Transaction instance,
		 * updating only the fields which have had a control created for it.
		 */
		public function SaveTransaction() {
			try {
				// Update any fields for controls that have been created
				if ($this->lstDonation) $this->objTransaction->DonationId = $this->lstDonation->SelectedValue;
				if ($this->lstNeed) $this->objTransaction->NeedId = $this->lstNeed->SelectedValue;
				if ($this->calDateInitiated) $this->objTransaction->DateInitiated = $this->calDateInitiated->DateTime;
				if ($this->txtNumberOfUnits) $this->objTransaction->NumberOfUnits = $this->txtNumberOfUnits->Text;

				// Update any UniqueReverseReferences (if any) for controls that have been created for it

				// Save the Transaction object
				$this->objTransaction->Save();

				// Finally, update any ManyToManyReferences (if any)
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * This will DELETE this object's Transaction instance from the database.
		 * It will also unassociate itself from any ManyToManyReferences.
		 */
		public function DeleteTransaction() {
			$this->objTransaction->Delete();
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
				case 'Transaction': return $this->objTransaction;
				case 'TitleVerb': return $this->strTitleVerb;
				case 'EditMode': return $this->blnEditMode;

				// Controls that point to Transaction fields -- will be created dynamically if not yet created
				case 'IdControl':
					if (!$this->lblId) return $this->lblId_Create();
					return $this->lblId;
				case 'IdLabel':
					if (!$this->lblId) return $this->lblId_Create();
					return $this->lblId;
				case 'DonationIdControl':
					if (!$this->lstDonation) return $this->lstDonation_Create();
					return $this->lstDonation;
				case 'DonationIdLabel':
					if (!$this->lblDonationId) return $this->lblDonationId_Create();
					return $this->lblDonationId;
				case 'NeedIdControl':
					if (!$this->lstNeed) return $this->lstNeed_Create();
					return $this->lstNeed;
				case 'NeedIdLabel':
					if (!$this->lblNeedId) return $this->lblNeedId_Create();
					return $this->lblNeedId;
				case 'DateInitiatedControl':
					if (!$this->calDateInitiated) return $this->calDateInitiated_Create();
					return $this->calDateInitiated;
				case 'DateInitiatedLabel':
					if (!$this->lblDateInitiated) return $this->lblDateInitiated_Create();
					return $this->lblDateInitiated;
				case 'NumberOfUnitsControl':
					if (!$this->txtNumberOfUnits) return $this->txtNumberOfUnits_Create();
					return $this->txtNumberOfUnits;
				case 'NumberOfUnitsLabel':
					if (!$this->lblNumberOfUnits) return $this->lblNumberOfUnits_Create();
					return $this->lblNumberOfUnits;
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
					// Controls that point to Transaction fields
					case 'IdControl':
						return ($this->lblId = QType::Cast($mixValue, 'QControl'));
					case 'DonationIdControl':
						return ($this->lstDonation = QType::Cast($mixValue, 'QControl'));
					case 'NeedIdControl':
						return ($this->lstNeed = QType::Cast($mixValue, 'QControl'));
					case 'DateInitiatedControl':
						return ($this->calDateInitiated = QType::Cast($mixValue, 'QControl'));
					case 'NumberOfUnitsControl':
						return ($this->txtNumberOfUnits = QType::Cast($mixValue, 'QControl'));
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