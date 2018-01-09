<?php
	/**
	 * This is a MetaControl class, providing a QForm or QPanel access to event handlers
	 * and QControls to perform the Create, Edit, and Delete functionality
	 * of the UnitGenre class.  This code-generated class
	 * contains all the basic elements to help a QPanel or QForm display an HTML form that can
	 * manipulate a single UnitGenre object.
	 *
	 * To take advantage of some (or all) of these control objects, you
	 * must create a new QForm or QPanel which instantiates a UnitGenreMetaControl
	 * class.
	 *
	 * Any and all changes to this file will be overwritten with any subsequent
	 * code re-generation.
	 * 
	 * @package My Application
	 * @subpackage MetaControls
	 * property-read UnitGenre $UnitGenre the actual UnitGenre data class being edited
	 * property QLabel $IdControl
	 * property-read QLabel $IdLabel
	 * property QTextBox $NameControl
	 * property-read QLabel $NameLabel
	 * property QTextBox $CategoryControl
	 * property-read QLabel $CategoryLabel
	 * property-read string $TitleVerb a verb indicating whether or not this is being edited or created
	 * property-read boolean $EditMode a boolean indicating whether or not this is being edited or created
	 */

	class UnitGenreMetaControlGen extends QBaseClass {
		// General Variables
		/**
		 * @var UnitGenre objUnitGenre
		 * @access protected
		 */
		protected $objUnitGenre;

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

		// Controls that allow the editing of UnitGenre's individual data fields
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
         * @var QTextBox txtCategory;
         * @access protected
         */
		protected $txtCategory;


		// Controls that allow the viewing of UnitGenre's individual data fields
        /**
         * @var QLabel lblName
         * @access protected
         */
		protected $lblName;

        /**
         * @var QLabel lblCategory
         * @access protected
         */
		protected $lblCategory;


		// QListBox Controls (if applicable) to edit Unique ReverseReferences and ManyToMany References

		// QLabel Controls (if applicable) to view Unique ReverseReferences and ManyToMany References


		/**
		 * Main constructor.  Constructor OR static create methods are designed to be called in either
		 * a parent QPanel or the main QForm when wanting to create a
		 * UnitGenreMetaControl to edit a single UnitGenre object within the
		 * QPanel or QForm.
		 *
		 * This constructor takes in a single UnitGenre object, while any of the static
		 * create methods below can be used to construct based off of individual PK ID(s).
		 *
		 * @param mixed $objParentObject QForm or QPanel which will be using this UnitGenreMetaControl
		 * @param UnitGenre $objUnitGenre new or existing UnitGenre object
		 */
		 public function __construct($objParentObject, UnitGenre $objUnitGenre) {
			// Setup Parent Object (e.g. QForm or QPanel which will be using this UnitGenreMetaControl)
			$this->objParentObject = $objParentObject;

			// Setup linked UnitGenre object
			$this->objUnitGenre = $objUnitGenre;

			// Figure out if we're Editing or Creating New
			if ($this->objUnitGenre->__Restored) {
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
		 * @param mixed $objParentObject QForm or QPanel which will be using this UnitGenreMetaControl
		 * @param integer $intId primary key value
		 * @param QMetaControlCreateType $intCreateType rules governing UnitGenre object creation - defaults to CreateOrEdit
 		 * @return UnitGenreMetaControl
		 */
		public static function Create($objParentObject, $intId = null, $intCreateType = QMetaControlCreateType::CreateOrEdit) {
			// Attempt to Load from PK Arguments
			if (strlen($intId)) {
				$objUnitGenre = UnitGenre::Load($intId);

				// UnitGenre was found -- return it!
				if ($objUnitGenre)
					return new UnitGenreMetaControl($objParentObject, $objUnitGenre);

				// If CreateOnRecordNotFound not specified, throw an exception
				else if ($intCreateType != QMetaControlCreateType::CreateOnRecordNotFound)
					throw new QCallerException('Could not find a UnitGenre object with PK arguments: ' . $intId);

			// If EditOnly is specified, throw an exception
			} else if ($intCreateType == QMetaControlCreateType::EditOnly)
				throw new QCallerException('No PK arguments specified');

			// If we are here, then we need to create a new record
			return new UnitGenreMetaControl($objParentObject, new UnitGenre());
		}

		/**
		 * Static Helper Method to Create using PathInfo arguments
		 *
		 * @param mixed $objParentObject QForm or QPanel which will be using this UnitGenreMetaControl
		 * @param QMetaControlCreateType $intCreateType rules governing UnitGenre object creation - defaults to CreateOrEdit
		 * @return UnitGenreMetaControl
		 */
		public static function CreateFromPathInfo($objParentObject, $intCreateType = QMetaControlCreateType::CreateOrEdit) {
			$intId = QApplication::PathInfo(0);
			return UnitGenreMetaControl::Create($objParentObject, $intId, $intCreateType);
		}

		/**
		 * Static Helper Method to Create using QueryString arguments
		 *
		 * @param mixed $objParentObject QForm or QPanel which will be using this UnitGenreMetaControl
		 * @param QMetaControlCreateType $intCreateType rules governing UnitGenre object creation - defaults to CreateOrEdit
		 * @return UnitGenreMetaControl
		 */
		public static function CreateFromQueryString($objParentObject, $intCreateType = QMetaControlCreateType::CreateOrEdit) {
			$intId = QApplication::QueryString('intId');
			return UnitGenreMetaControl::Create($objParentObject, $intId, $intCreateType);
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
				$this->lblId->Text = $this->objUnitGenre->Id;
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
			$this->txtName->Text = $this->objUnitGenre->Name;
			$this->txtName->MaxLength = UnitGenre::NameMaxLength;
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
			$this->lblName->Text = $this->objUnitGenre->Name;
			return $this->lblName;
		}

		/**
		 * Create and setup QTextBox txtCategory
		 * @param string $strControlId optional ControlId to use
		 * @return QTextBox
		 */
		public function txtCategory_Create($strControlId = null) {
			$this->txtCategory = new QTextBox($this->objParentObject, $strControlId);
			$this->txtCategory->Name = QApplication::Translate('Category');
			$this->txtCategory->Text = $this->objUnitGenre->Category;
			$this->txtCategory->MaxLength = UnitGenre::CategoryMaxLength;
			return $this->txtCategory;
		}

		/**
		 * Create and setup QLabel lblCategory
		 * @param string $strControlId optional ControlId to use
		 * @return QLabel
		 */
		public function lblCategory_Create($strControlId = null) {
			$this->lblCategory = new QLabel($this->objParentObject, $strControlId);
			$this->lblCategory->Name = QApplication::Translate('Category');
			$this->lblCategory->Text = $this->objUnitGenre->Category;
			return $this->lblCategory;
		}



		/**
		 * Refresh this MetaControl with Data from the local UnitGenre object.
		 * @param boolean $blnReload reload UnitGenre from the database
		 * @return void
		 */
		public function Refresh($blnReload = false) {
			if ($blnReload)
				$this->objUnitGenre->Reload();

			if ($this->lblId) if ($this->blnEditMode) $this->lblId->Text = $this->objUnitGenre->Id;

			if ($this->txtName) $this->txtName->Text = $this->objUnitGenre->Name;
			if ($this->lblName) $this->lblName->Text = $this->objUnitGenre->Name;

			if ($this->txtCategory) $this->txtCategory->Text = $this->objUnitGenre->Category;
			if ($this->lblCategory) $this->lblCategory->Text = $this->objUnitGenre->Category;

		}



		///////////////////////////////////////////////
		// PROTECTED UPDATE METHODS for ManyToManyReferences (if any)
		///////////////////////////////////////////////





		///////////////////////////////////////////////
		// PUBLIC UNITGENRE OBJECT MANIPULATORS
		///////////////////////////////////////////////

		/**
		 * This will save this object's UnitGenre instance,
		 * updating only the fields which have had a control created for it.
		 */
		public function SaveUnitGenre() {
			try {
				// Update any fields for controls that have been created
				if ($this->txtName) $this->objUnitGenre->Name = $this->txtName->Text;
				if ($this->txtCategory) $this->objUnitGenre->Category = $this->txtCategory->Text;

				// Update any UniqueReverseReferences (if any) for controls that have been created for it

				// Save the UnitGenre object
				$this->objUnitGenre->Save();

				// Finally, update any ManyToManyReferences (if any)
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * This will DELETE this object's UnitGenre instance from the database.
		 * It will also unassociate itself from any ManyToManyReferences.
		 */
		public function DeleteUnitGenre() {
			$this->objUnitGenre->Delete();
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
				case 'UnitGenre': return $this->objUnitGenre;
				case 'TitleVerb': return $this->strTitleVerb;
				case 'EditMode': return $this->blnEditMode;

				// Controls that point to UnitGenre fields -- will be created dynamically if not yet created
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
				case 'CategoryControl':
					if (!$this->txtCategory) return $this->txtCategory_Create();
					return $this->txtCategory;
				case 'CategoryLabel':
					if (!$this->lblCategory) return $this->lblCategory_Create();
					return $this->lblCategory;
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
					// Controls that point to UnitGenre fields
					case 'IdControl':
						return ($this->lblId = QType::Cast($mixValue, 'QControl'));
					case 'NameControl':
						return ($this->txtName = QType::Cast($mixValue, 'QControl'));
					case 'CategoryControl':
						return ($this->txtCategory = QType::Cast($mixValue, 'QControl'));
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