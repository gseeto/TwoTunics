<?php
	/**
	 * The abstract FashionPartnerGen class defined here is
	 * code-generated and contains all the basic CRUD-type functionality as well as
	 * basic methods to handle relationships and index-based loading.
	 *
	 * To use, you should use the FashionPartner subclass which
	 * extends this FashionPartnerGen class.
	 *
	 * Because subsequent re-code generations will overwrite any changes to this
	 * file, you should leave this file unaltered to prevent yourself from losing
	 * any information or code changes.  All customizations should be done by
	 * overriding existing or implementing new methods, properties and variables
	 * in the FashionPartner class.
	 * 
	 * @package My Application
	 * @subpackage GeneratedDataObjects
	 * @property integer $Id the value for intId (Read-Only PK)
	 * @property string $Name the value for strName 
	 * @property string $Description the value for strDescription 
	 * @property string $Street the value for strStreet 
	 * @property string $City the value for strCity 
	 * @property string $State the value for strState 
	 * @property string $Zipcode the value for strZipcode 
	 * @property string $Phone the value for strPhone 
	 * @property string $Email the value for strEmail 
	 * @property string $ContactPerson the value for strContactPerson 
	 * @property User $_UserAsFashion the value for the private _objUserAsFashion (Read-Only) if set due to an expansion on the user_fashion_assn association table
	 * @property User[] $_UserAsFashionArray the value for the private _objUserAsFashionArray (Read-Only) if set due to an ExpandAsArray on the user_fashion_assn association table
	 * @property Donation $_Donation the value for the private _objDonation (Read-Only) if set due to an expansion on the donation.fashion_partner_id reverse relationship
	 * @property Donation[] $_DonationArray the value for the private _objDonationArray (Read-Only) if set due to an ExpandAsArray on the donation.fashion_partner_id reverse relationship
	 * @property boolean $__Restored whether or not this object was restored from the database (as opposed to created new)
	 */
	class FashionPartnerGen extends QBaseClass {

		///////////////////////////////////////////////////////////////////////
		// PROTECTED MEMBER VARIABLES and TEXT FIELD MAXLENGTHS (if applicable)
		///////////////////////////////////////////////////////////////////////
		
		/**
		 * Protected member variable that maps to the database PK Identity column fashion_partner.id
		 * @var integer intId
		 */
		protected $intId;
		const IdDefault = null;


		/**
		 * Protected member variable that maps to the database column fashion_partner.name
		 * @var string strName
		 */
		protected $strName;
		const NameMaxLength = 255;
		const NameDefault = null;


		/**
		 * Protected member variable that maps to the database column fashion_partner.description
		 * @var string strDescription
		 */
		protected $strDescription;
		const DescriptionMaxLength = 500;
		const DescriptionDefault = null;


		/**
		 * Protected member variable that maps to the database column fashion_partner.street
		 * @var string strStreet
		 */
		protected $strStreet;
		const StreetMaxLength = 255;
		const StreetDefault = null;


		/**
		 * Protected member variable that maps to the database column fashion_partner.city
		 * @var string strCity
		 */
		protected $strCity;
		const CityMaxLength = 255;
		const CityDefault = null;


		/**
		 * Protected member variable that maps to the database column fashion_partner.state
		 * @var string strState
		 */
		protected $strState;
		const StateMaxLength = 255;
		const StateDefault = null;


		/**
		 * Protected member variable that maps to the database column fashion_partner.zipcode
		 * @var string strZipcode
		 */
		protected $strZipcode;
		const ZipcodeMaxLength = 10;
		const ZipcodeDefault = null;


		/**
		 * Protected member variable that maps to the database column fashion_partner.phone
		 * @var string strPhone
		 */
		protected $strPhone;
		const PhoneMaxLength = 12;
		const PhoneDefault = null;


		/**
		 * Protected member variable that maps to the database column fashion_partner.email
		 * @var string strEmail
		 */
		protected $strEmail;
		const EmailMaxLength = 100;
		const EmailDefault = null;


		/**
		 * Protected member variable that maps to the database column fashion_partner.contact_person
		 * @var string strContactPerson
		 */
		protected $strContactPerson;
		const ContactPersonMaxLength = 255;
		const ContactPersonDefault = null;


		/**
		 * Private member variable that stores a reference to a single UserAsFashion object
		 * (of type User), if this FashionPartner object was restored with
		 * an expansion on the user_fashion_assn association table.
		 * @var User _objUserAsFashion;
		 */
		private $_objUserAsFashion;

		/**
		 * Private member variable that stores a reference to an array of UserAsFashion objects
		 * (of type User[]), if this FashionPartner object was restored with
		 * an ExpandAsArray on the user_fashion_assn association table.
		 * @var User[] _objUserAsFashionArray;
		 */
		private $_objUserAsFashionArray = array();

		/**
		 * Private member variable that stores a reference to a single Donation object
		 * (of type Donation), if this FashionPartner object was restored with
		 * an expansion on the donation association table.
		 * @var Donation _objDonation;
		 */
		private $_objDonation;

		/**
		 * Private member variable that stores a reference to an array of Donation objects
		 * (of type Donation[]), if this FashionPartner object was restored with
		 * an ExpandAsArray on the donation association table.
		 * @var Donation[] _objDonationArray;
		 */
		private $_objDonationArray = array();

		/**
		 * Protected array of virtual attributes for this object (e.g. extra/other calculated and/or non-object bound
		 * columns from the run-time database query result for this object).  Used by InstantiateDbRow and
		 * GetVirtualAttribute.
		 * @var string[] $__strVirtualAttributeArray
		 */
		protected $__strVirtualAttributeArray = array();

		/**
		 * Protected internal member variable that specifies whether or not this object is Restored from the database.
		 * Used by Save() to determine if Save() should perform a db UPDATE or INSERT.
		 * @var bool __blnRestored;
		 */
		protected $__blnRestored;




		///////////////////////////////
		// PROTECTED MEMBER OBJECTS
		///////////////////////////////





		///////////////////////////////
		// CLASS-WIDE LOAD AND COUNT METHODS
		///////////////////////////////

		/**
		 * Static method to retrieve the Database object that owns this class.
		 * @return QDatabaseBase reference to the Database object that can query this class
		 */
		public static function GetDatabase() {
			return QApplication::$Database[1];
		}

		/**
		 * Load a FashionPartner from PK Info
		 * @param integer $intId
		 * @return FashionPartner
		 */
		public static function Load($intId) {
			// Use QuerySingle to Perform the Query
			return FashionPartner::QuerySingle(
				QQ::Equal(QQN::FashionPartner()->Id, $intId)
			);
		}

		/**
		 * Load all FashionPartners
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return FashionPartner[]
		 */
		public static function LoadAll($objOptionalClauses = null) {
			// Call FashionPartner::QueryArray to perform the LoadAll query
			try {
				return FashionPartner::QueryArray(QQ::All(), $objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Count all FashionPartners
		 * @return int
		 */
		public static function CountAll() {
			// Call FashionPartner::QueryCount to perform the CountAll query
			return FashionPartner::QueryCount(QQ::All());
		}




		///////////////////////////////
		// QCODO QUERY-RELATED METHODS
		///////////////////////////////

		/**
		 * Internally called method to assist with calling Qcodo Query for this class
		 * on load methods.
		 * @param QQueryBuilder &$objQueryBuilder the QueryBuilder object that will be created
		 * @param QQCondition $objConditions any conditions on the query, itself
		 * @param QQClause[] $objOptionalClauses additional optional QQClause object or array of QQClause objects for this query
		 * @param mixed[] $mixParameterArray a array of name-value pairs to perform PrepareStatement with (sending in null will skip the PrepareStatement step)
		 * @param boolean $blnCountOnly only select a rowcount
		 * @return string the query statement
		 */
		protected static function BuildQueryStatement(&$objQueryBuilder, QQCondition $objConditions, $objOptionalClauses, $mixParameterArray, $blnCountOnly) {
			// Get the Database Object for this Class
			$objDatabase = FashionPartner::GetDatabase();

			// Create/Build out the QueryBuilder object with FashionPartner-specific SELET and FROM fields
			$objQueryBuilder = new QQueryBuilder($objDatabase, 'fashion_partner');
			FashionPartner::GetSelectFields($objQueryBuilder);
			$objQueryBuilder->AddFromItem('fashion_partner');

			// Set "CountOnly" option (if applicable)
			if ($blnCountOnly)
				$objQueryBuilder->SetCountOnlyFlag();

			// Apply Any Conditions
			if ($objConditions)
				try {
					$objConditions->UpdateQueryBuilder($objQueryBuilder);
				} catch (QCallerException $objExc) {
					$objExc->IncrementOffset();
					throw $objExc;
				}

			// Iterate through all the Optional Clauses (if any) and perform accordingly
			if ($objOptionalClauses) {
				if ($objOptionalClauses instanceof QQClause)
					$objOptionalClauses->UpdateQueryBuilder($objQueryBuilder);
				else if (is_array($objOptionalClauses))
					foreach ($objOptionalClauses as $objClause)
						$objClause->UpdateQueryBuilder($objQueryBuilder);
				else
					throw new QCallerException('Optional Clauses must be a QQClause object or an array of QQClause objects');
			}

			// Get the SQL Statement
			$strQuery = $objQueryBuilder->GetStatement();

			// Prepare the Statement with the Query Parameters (if applicable)
			if ($mixParameterArray) {
				if (is_array($mixParameterArray)) {
					if (count($mixParameterArray))
						$strQuery = $objDatabase->PrepareStatement($strQuery, $mixParameterArray);

					// Ensure that there are no other Unresolved Named Parameters
					if (strpos($strQuery, chr(QQNamedValue::DelimiterCode) . '{') !== false)
						throw new QCallerException('Unresolved named parameters in the query');
				} else
					throw new QCallerException('Parameter Array must be an array of name-value parameter pairs');
			}

			// Return the Objects
			return $strQuery;
		}

		/**
		 * Static Qcodo Query method to query for a single FashionPartner object.
		 * Uses BuildQueryStatment to perform most of the work.
		 * @param QQCondition $objConditions any conditions on the query, itself
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @param mixed[] $mixParameterArray a array of name-value pairs to perform PrepareStatement with
		 * @return FashionPartner the queried object
		 */
		public static function QuerySingle(QQCondition $objConditions, $objOptionalClauses = null, $mixParameterArray = null) {
			// Get the Query Statement
			try {
				$strQuery = FashionPartner::BuildQueryStatement($objQueryBuilder, $objConditions, $objOptionalClauses, $mixParameterArray, false);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}

			// Perform the Query
			$objDbResult = $objQueryBuilder->Database->Query($strQuery);

			// Instantiate a new FashionPartner object and return it

			// Do we have to expand anything?
			if ($objQueryBuilder->ExpandAsArrayNodes) {
				$objToReturn = array();
				while ($objDbRow = $objDbResult->GetNextRow()) {
					$objItem = FashionPartner::InstantiateDbRow($objDbRow, null, $objQueryBuilder->ExpandAsArrayNodes, $objToReturn, $objQueryBuilder->ColumnAliasArray);
					if ($objItem) $objToReturn[] = $objItem;
				}

				if (count($objToReturn)) {
					// Since we only want the object to return, lets return the object and not the array.
					return $objToReturn[0];
				} else {
					return null;
				}
			} else {
				// No expands just return the first row
				$objDbRow = $objDbResult->GetNextRow();
				if (is_null($objDbRow)) return null;
				return FashionPartner::InstantiateDbRow($objDbRow, null, null, null, $objQueryBuilder->ColumnAliasArray);
			}
		}

		/**
		 * Static Qcodo Query method to query for an array of FashionPartner objects.
		 * Uses BuildQueryStatment to perform most of the work.
		 * @param QQCondition $objConditions any conditions on the query, itself
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @param mixed[] $mixParameterArray a array of name-value pairs to perform PrepareStatement with
		 * @return FashionPartner[] the queried objects as an array
		 */
		public static function QueryArray(QQCondition $objConditions, $objOptionalClauses = null, $mixParameterArray = null) {
			// Get the Query Statement
			try {
				$strQuery = FashionPartner::BuildQueryStatement($objQueryBuilder, $objConditions, $objOptionalClauses, $mixParameterArray, false);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}

			// Perform the Query and Instantiate the Array Result
			$objDbResult = $objQueryBuilder->Database->Query($strQuery);
			return FashionPartner::InstantiateDbResult($objDbResult, $objQueryBuilder->ExpandAsArrayNodes, $objQueryBuilder->ColumnAliasArray);
		}

		/**
		 * Static Qcodo query method to issue a query and get a cursor to progressively fetch its results.
		 * Uses BuildQueryStatment to perform most of the work.
		 * @param QQCondition $objConditions any conditions on the query, itself
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @param mixed[] $mixParameterArray a array of name-value pairs to perform PrepareStatement with
		 * @return QDatabaseResultBase the cursor resource instance
		 */
		public static function QueryCursor(QQCondition $objConditions, $objOptionalClauses = null, $mixParameterArray = null) {
			// Get the query statement
			try {
				$strQuery = FashionPartner::BuildQueryStatement($objQueryBuilder, $objConditions, $objOptionalClauses, $mixParameterArray, false);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}

			// Perform the query
			$objDbResult = $objQueryBuilder->Database->Query($strQuery);
		
			// Return the results cursor
			$objDbResult->QueryBuilder = $objQueryBuilder;
			return $objDbResult;
		}

		/**
		 * Static Qcodo Query method to query for a count of FashionPartner objects.
		 * Uses BuildQueryStatment to perform most of the work.
		 * @param QQCondition $objConditions any conditions on the query, itself
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @param mixed[] $mixParameterArray a array of name-value pairs to perform PrepareStatement with
		 * @return integer the count of queried objects as an integer
		 */
		public static function QueryCount(QQCondition $objConditions, $objOptionalClauses = null, $mixParameterArray = null) {
			// Get the Query Statement
			try {
				$strQuery = FashionPartner::BuildQueryStatement($objQueryBuilder, $objConditions, $objOptionalClauses, $mixParameterArray, true);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}

			// Perform the Query and return the row_count
			$objDbResult = $objQueryBuilder->Database->Query($strQuery);

			// Figure out if the query is using GroupBy
			$blnGrouped = false;

			if ($objOptionalClauses) foreach ($objOptionalClauses as $objClause) {
				if ($objClause instanceof QQGroupBy) {
					$blnGrouped = true;
					break;
				}
			}

			if ($blnGrouped)
				// Groups in this query - return the count of Groups (which is the count of all rows)
				return $objDbResult->CountRows();
			else {
				// No Groups - return the sql-calculated count(*) value
				$strDbRow = $objDbResult->FetchRow();
				return QType::Cast($strDbRow[0], QType::Integer);
			}
		}

/*		public static function QueryArrayCached($strConditions, $mixParameterArray = null) {
			// Get the Database Object for this Class
			$objDatabase = FashionPartner::GetDatabase();

			// Lookup the QCache for This Query Statement
			$objCache = new QCache('query', 'fashion_partner_' . serialize($strConditions));
			if (!($strQuery = $objCache->GetData())) {
				// Not Found -- Go ahead and Create/Build out a new QueryBuilder object with FashionPartner-specific fields
				$objQueryBuilder = new QQueryBuilder($objDatabase);
				FashionPartner::GetSelectFields($objQueryBuilder);
				FashionPartner::GetFromFields($objQueryBuilder);

				// Ensure the Passed-in Conditions is a string
				try {
					$strConditions = QType::Cast($strConditions, QType::String);
				} catch (QCallerException $objExc) {
					$objExc->IncrementOffset();
					throw $objExc;
				}

				// Create the Conditions object, and apply it
				$objConditions = eval('return ' . $strConditions . ';');

				// Apply Any Conditions
				if ($objConditions)
					$objConditions->UpdateQueryBuilder($objQueryBuilder);

				// Get the SQL Statement
				$strQuery = $objQueryBuilder->GetStatement();

				// Save the SQL Statement in the Cache
				$objCache->SaveData($strQuery);
			}

			// Prepare the Statement with the Parameters
			if ($mixParameterArray)
				$strQuery = $objDatabase->PrepareStatement($strQuery, $mixParameterArray);

			// Perform the Query and Instantiate the Array Result
			$objDbResult = $objDatabase->Query($strQuery);
			return FashionPartner::InstantiateDbResult($objDbResult);
		}*/

		/**
		 * Updates a QQueryBuilder with the SELECT fields for this FashionPartner
		 * @param QQueryBuilder $objBuilder the Query Builder object to update
		 * @param string $strPrefix optional prefix to add to the SELECT fields
		 */
		public static function GetSelectFields(QQueryBuilder $objBuilder, $strPrefix = null) {
			if ($strPrefix) {
				$strTableName = $strPrefix;
				$strAliasPrefix = $strPrefix . '__';
			} else {
				$strTableName = 'fashion_partner';
				$strAliasPrefix = '';
			}

			$objBuilder->AddSelectItem($strTableName, 'id', $strAliasPrefix . 'id');
			$objBuilder->AddSelectItem($strTableName, 'name', $strAliasPrefix . 'name');
			$objBuilder->AddSelectItem($strTableName, 'description', $strAliasPrefix . 'description');
			$objBuilder->AddSelectItem($strTableName, 'street', $strAliasPrefix . 'street');
			$objBuilder->AddSelectItem($strTableName, 'city', $strAliasPrefix . 'city');
			$objBuilder->AddSelectItem($strTableName, 'state', $strAliasPrefix . 'state');
			$objBuilder->AddSelectItem($strTableName, 'zipcode', $strAliasPrefix . 'zipcode');
			$objBuilder->AddSelectItem($strTableName, 'phone', $strAliasPrefix . 'phone');
			$objBuilder->AddSelectItem($strTableName, 'email', $strAliasPrefix . 'email');
			$objBuilder->AddSelectItem($strTableName, 'contact_person', $strAliasPrefix . 'contact_person');
		}




		///////////////////////////////
		// INSTANTIATION-RELATED METHODS
		///////////////////////////////

		/**
		 * Instantiate a FashionPartner from a Database Row.
		 * Takes in an optional strAliasPrefix, used in case another Object::InstantiateDbRow
		 * is calling this FashionPartner::InstantiateDbRow in order to perform
		 * early binding on referenced objects.
		 * @param QDatabaseRowBase $objDbRow
		 * @param string $strAliasPrefix
		 * @param string $strExpandAsArrayNodes
		 * @param QBaseClass $objPreviousItem
		 * @param string[] $strColumnAliasArray
		 * @return FashionPartner
		*/
		public static function InstantiateDbRow($objDbRow, $strAliasPrefix = null, $strExpandAsArrayNodes = null, $objPreviousItem = null, $strColumnAliasArray = array()) {
			// If blank row, return null
			if (!$objDbRow)
				return null;

			// See if we're doing an array expansion on the previous item
			$strAlias = $strAliasPrefix . 'id';
			$strAliasName = array_key_exists($strAlias, $strColumnAliasArray) ? $strColumnAliasArray[$strAlias] : $strAlias;
			if (($strExpandAsArrayNodes) && ($objPreviousItem) &&
				($objPreviousItem->intId == $objDbRow->GetColumn($strAliasName, 'Integer'))) {

				// We are.  Now, prepare to check for ExpandAsArray clauses
				$blnExpandedViaArray = false;
				if (!$strAliasPrefix)
					$strAliasPrefix = 'fashion_partner__';

				$strAlias = $strAliasPrefix . 'userasfashion__user_id__id';
				$strAliasName = array_key_exists($strAlias, $strColumnAliasArray) ? $strColumnAliasArray[$strAlias] : $strAlias;
				if ((array_key_exists($strAlias, $strExpandAsArrayNodes)) &&
					(!is_null($objDbRow->GetColumn($strAliasName)))) {
					if ($intPreviousChildItemCount = count($objPreviousItem->_objUserAsFashionArray)) {
						$objPreviousChildItem = $objPreviousItem->_objUserAsFashionArray[$intPreviousChildItemCount - 1];
						$objChildItem = User::InstantiateDbRow($objDbRow, $strAliasPrefix . 'userasfashion__user_id__', $strExpandAsArrayNodes, $objPreviousChildItem, $strColumnAliasArray);
						if ($objChildItem)
							$objPreviousItem->_objUserAsFashionArray[] = $objChildItem;
					} else
						$objPreviousItem->_objUserAsFashionArray[] = User::InstantiateDbRow($objDbRow, $strAliasPrefix . 'userasfashion__user_id__', $strExpandAsArrayNodes, null, $strColumnAliasArray);
					$blnExpandedViaArray = true;
				}


				$strAlias = $strAliasPrefix . 'donation__id';
				$strAliasName = array_key_exists($strAlias, $strColumnAliasArray) ? $strColumnAliasArray[$strAlias] : $strAlias;
				if ((array_key_exists($strAlias, $strExpandAsArrayNodes)) &&
					(!is_null($objDbRow->GetColumn($strAliasName)))) {
					if ($intPreviousChildItemCount = count($objPreviousItem->_objDonationArray)) {
						$objPreviousChildItem = $objPreviousItem->_objDonationArray[$intPreviousChildItemCount - 1];
						$objChildItem = Donation::InstantiateDbRow($objDbRow, $strAliasPrefix . 'donation__', $strExpandAsArrayNodes, $objPreviousChildItem, $strColumnAliasArray);
						if ($objChildItem)
							$objPreviousItem->_objDonationArray[] = $objChildItem;
					} else
						$objPreviousItem->_objDonationArray[] = Donation::InstantiateDbRow($objDbRow, $strAliasPrefix . 'donation__', $strExpandAsArrayNodes, null, $strColumnAliasArray);
					$blnExpandedViaArray = true;
				}

				// Either return false to signal array expansion, or check-to-reset the Alias prefix and move on
				if ($blnExpandedViaArray)
					return false;
				else if ($strAliasPrefix == 'fashion_partner__')
					$strAliasPrefix = null;
			}

			// Create a new instance of the FashionPartner object
			$objToReturn = new FashionPartner();
			$objToReturn->__blnRestored = true;

			$strAliasName = array_key_exists($strAliasPrefix . 'id', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'id'] : $strAliasPrefix . 'id';
			$objToReturn->intId = $objDbRow->GetColumn($strAliasName, 'Integer');
			$strAliasName = array_key_exists($strAliasPrefix . 'name', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'name'] : $strAliasPrefix . 'name';
			$objToReturn->strName = $objDbRow->GetColumn($strAliasName, 'VarChar');
			$strAliasName = array_key_exists($strAliasPrefix . 'description', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'description'] : $strAliasPrefix . 'description';
			$objToReturn->strDescription = $objDbRow->GetColumn($strAliasName, 'VarChar');
			$strAliasName = array_key_exists($strAliasPrefix . 'street', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'street'] : $strAliasPrefix . 'street';
			$objToReturn->strStreet = $objDbRow->GetColumn($strAliasName, 'VarChar');
			$strAliasName = array_key_exists($strAliasPrefix . 'city', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'city'] : $strAliasPrefix . 'city';
			$objToReturn->strCity = $objDbRow->GetColumn($strAliasName, 'VarChar');
			$strAliasName = array_key_exists($strAliasPrefix . 'state', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'state'] : $strAliasPrefix . 'state';
			$objToReturn->strState = $objDbRow->GetColumn($strAliasName, 'VarChar');
			$strAliasName = array_key_exists($strAliasPrefix . 'zipcode', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'zipcode'] : $strAliasPrefix . 'zipcode';
			$objToReturn->strZipcode = $objDbRow->GetColumn($strAliasName, 'VarChar');
			$strAliasName = array_key_exists($strAliasPrefix . 'phone', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'phone'] : $strAliasPrefix . 'phone';
			$objToReturn->strPhone = $objDbRow->GetColumn($strAliasName, 'VarChar');
			$strAliasName = array_key_exists($strAliasPrefix . 'email', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'email'] : $strAliasPrefix . 'email';
			$objToReturn->strEmail = $objDbRow->GetColumn($strAliasName, 'VarChar');
			$strAliasName = array_key_exists($strAliasPrefix . 'contact_person', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'contact_person'] : $strAliasPrefix . 'contact_person';
			$objToReturn->strContactPerson = $objDbRow->GetColumn($strAliasName, 'VarChar');

			// Instantiate Virtual Attributes
			foreach ($objDbRow->GetColumnNameArray() as $strColumnName => $mixValue) {
				$strVirtualPrefix = $strAliasPrefix . '__';
				$strVirtualPrefixLength = strlen($strVirtualPrefix);
				if (substr($strColumnName, 0, $strVirtualPrefixLength) == $strVirtualPrefix)
					$objToReturn->__strVirtualAttributeArray[substr($strColumnName, $strVirtualPrefixLength)] = $mixValue;
			}

			// Prepare to Check for Early/Virtual Binding
			if (!$strAliasPrefix)
				$strAliasPrefix = 'fashion_partner__';



			// Check for UserAsFashion Virtual Binding
			$strAlias = $strAliasPrefix . 'userasfashion__user_id__id';
			$strAliasName = array_key_exists($strAlias, $strColumnAliasArray) ? $strColumnAliasArray[$strAlias] : $strAlias;
			if (!is_null($objDbRow->GetColumn($strAliasName))) {
				if (($strExpandAsArrayNodes) && (array_key_exists($strAlias, $strExpandAsArrayNodes)))
					$objToReturn->_objUserAsFashionArray[] = User::InstantiateDbRow($objDbRow, $strAliasPrefix . 'userasfashion__user_id__', $strExpandAsArrayNodes, null, $strColumnAliasArray);
				else
					$objToReturn->_objUserAsFashion = User::InstantiateDbRow($objDbRow, $strAliasPrefix . 'userasfashion__user_id__', $strExpandAsArrayNodes, null, $strColumnAliasArray);
			}


			// Check for Donation Virtual Binding
			$strAlias = $strAliasPrefix . 'donation__id';
			$strAliasName = array_key_exists($strAlias, $strColumnAliasArray) ? $strColumnAliasArray[$strAlias] : $strAlias;
			if (!is_null($objDbRow->GetColumn($strAliasName))) {
				if (($strExpandAsArrayNodes) && (array_key_exists($strAlias, $strExpandAsArrayNodes)))
					$objToReturn->_objDonationArray[] = Donation::InstantiateDbRow($objDbRow, $strAliasPrefix . 'donation__', $strExpandAsArrayNodes, null, $strColumnAliasArray);
				else
					$objToReturn->_objDonation = Donation::InstantiateDbRow($objDbRow, $strAliasPrefix . 'donation__', $strExpandAsArrayNodes, null, $strColumnAliasArray);
			}

			return $objToReturn;
		}

		/**
		 * Instantiate an array of FashionPartners from a Database Result
		 * @param QDatabaseResultBase $objDbResult
		 * @param string $strExpandAsArrayNodes
		 * @param string[] $strColumnAliasArray
		 * @return FashionPartner[]
		 */
		public static function InstantiateDbResult(QDatabaseResultBase $objDbResult, $strExpandAsArrayNodes = null, $strColumnAliasArray = null) {
			$objToReturn = array();
			
			if (!$strColumnAliasArray)
				$strColumnAliasArray = array();

			// If blank resultset, then return empty array
			if (!$objDbResult)
				return $objToReturn;

			// Load up the return array with each row
			if ($strExpandAsArrayNodes) {
				$objLastRowItem = null;
				while ($objDbRow = $objDbResult->GetNextRow()) {
					$objItem = FashionPartner::InstantiateDbRow($objDbRow, null, $strExpandAsArrayNodes, $objLastRowItem, $strColumnAliasArray);
					if ($objItem) {
						$objToReturn[] = $objItem;
						$objLastRowItem = $objItem;
					}
				}
			} else {
				while ($objDbRow = $objDbResult->GetNextRow())
					$objToReturn[] = FashionPartner::InstantiateDbRow($objDbRow, null, null, null, $strColumnAliasArray);
			}

			return $objToReturn;
		}

		/**
		 * Instantiate a single FashionPartner object from a query cursor (e.g. a DB ResultSet).
		 * Cursor is automatically moved to the "next row" of the result set.
		 * Will return NULL if no cursor or if the cursor has no more rows in the resultset.
		 * @param QDatabaseResultBase $objDbResult cursor resource
		 * @return FashionPartner next row resulting from the query
		 */
		public static function InstantiateCursor(QDatabaseResultBase $objDbResult) {
			// If blank resultset, then return empty result
			if (!$objDbResult) return null;

			// If empty resultset, then return empty result
			$objDbRow = $objDbResult->GetNextRow();
			if (!$objDbRow) return null;

			// We need the Column Aliases
			$strColumnAliasArray = $objDbResult->QueryBuilder->ColumnAliasArray;
			if (!$strColumnAliasArray) $strColumnAliasArray = array();

			// Pull Expansions (if applicable)
			$strExpandAsArrayNodes = $objDbResult->QueryBuilder->ExpandAsArrayNodes;

			// Load up the return result with a row and return it
			return FashionPartner::InstantiateDbRow($objDbRow, null, $strExpandAsArrayNodes, null, $strColumnAliasArray);
		}




		///////////////////////////////////////////////////
		// INDEX-BASED LOAD METHODS (Single Load and Array)
		///////////////////////////////////////////////////
			
		/**
		 * Load a single FashionPartner object,
		 * by Id Index(es)
		 * @param integer $intId
		 * @return FashionPartner
		*/
		public static function LoadById($intId, $objOptionalClauses = null) {
			return FashionPartner::QuerySingle(
				QQ::Equal(QQN::FashionPartner()->Id, $intId)
			, $objOptionalClauses
			);
		}



		////////////////////////////////////////////////////
		// INDEX-BASED LOAD METHODS (Array via Many to Many)
		////////////////////////////////////////////////////
			/**
		 * Load an array of User objects for a given UserAsFashion
		 * via the user_fashion_assn table
		 * @param integer $intUserId
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return FashionPartner[]
		*/
		public static function LoadArrayByUserAsFashion($intUserId, $objOptionalClauses = null) {
			// Call FashionPartner::QueryArray to perform the LoadArrayByUserAsFashion query
			try {
				return FashionPartner::QueryArray(
					QQ::Equal(QQN::FashionPartner()->UserAsFashion->UserId, $intUserId),
					$objOptionalClauses
				);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Count FashionPartners for a given UserAsFashion
		 * via the user_fashion_assn table
		 * @param integer $intUserId
		 * @return int
		*/
		public static function CountByUserAsFashion($intUserId, $objOptionalClauses = null) {
			return FashionPartner::QueryCount(
				QQ::Equal(QQN::FashionPartner()->UserAsFashion->UserId, $intUserId),
				$objOptionalClauses
			);
		}




		//////////////////////////////////////
		// SAVE, DELETE, RELOAD and JOURNALING
		//////////////////////////////////////

		/**
		 * Save this FashionPartner
		 * @param bool $blnForceInsert
		 * @param bool $blnForceUpdate
		 * @return int
		 */
		public function Save($blnForceInsert = false, $blnForceUpdate = false) {
			// Get the Database Object for this Class
			$objDatabase = FashionPartner::GetDatabase();

			$mixToReturn = null;

			try {
				if ((!$this->__blnRestored) || ($blnForceInsert)) {
					// Perform an INSERT query
					$objDatabase->NonQuery('
						INSERT INTO `fashion_partner` (
							`name`,
							`description`,
							`street`,
							`city`,
							`state`,
							`zipcode`,
							`phone`,
							`email`,
							`contact_person`
						) VALUES (
							' . $objDatabase->SqlVariable($this->strName) . ',
							' . $objDatabase->SqlVariable($this->strDescription) . ',
							' . $objDatabase->SqlVariable($this->strStreet) . ',
							' . $objDatabase->SqlVariable($this->strCity) . ',
							' . $objDatabase->SqlVariable($this->strState) . ',
							' . $objDatabase->SqlVariable($this->strZipcode) . ',
							' . $objDatabase->SqlVariable($this->strPhone) . ',
							' . $objDatabase->SqlVariable($this->strEmail) . ',
							' . $objDatabase->SqlVariable($this->strContactPerson) . '
						)
					');

					// Update Identity column and return its value
					$mixToReturn = $this->intId = $objDatabase->InsertId('fashion_partner', 'id');

					// Journaling
					if ($objDatabase->JournalingDatabase) $this->Journal('INSERT');

				} else {
					// Perform an UPDATE query

					// First checking for Optimistic Locking constraints (if applicable)

					// Perform the UPDATE query
					$objDatabase->NonQuery('
						UPDATE
							`fashion_partner`
						SET
							`name` = ' . $objDatabase->SqlVariable($this->strName) . ',
							`description` = ' . $objDatabase->SqlVariable($this->strDescription) . ',
							`street` = ' . $objDatabase->SqlVariable($this->strStreet) . ',
							`city` = ' . $objDatabase->SqlVariable($this->strCity) . ',
							`state` = ' . $objDatabase->SqlVariable($this->strState) . ',
							`zipcode` = ' . $objDatabase->SqlVariable($this->strZipcode) . ',
							`phone` = ' . $objDatabase->SqlVariable($this->strPhone) . ',
							`email` = ' . $objDatabase->SqlVariable($this->strEmail) . ',
							`contact_person` = ' . $objDatabase->SqlVariable($this->strContactPerson) . '
						WHERE
							`id` = ' . $objDatabase->SqlVariable($this->intId) . '
					');

					// Journaling
					if ($objDatabase->JournalingDatabase) $this->Journal('UPDATE');
				}

			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}

			// Update __blnRestored and any Non-Identity PK Columns (if applicable)
			$this->__blnRestored = true;


			// Return 
			return $mixToReturn;
		}

		/**
		 * Delete this FashionPartner
		 * @return void
		 */
		public function Delete() {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Cannot delete this FashionPartner with an unset primary key.');

			// Get the Database Object for this Class
			$objDatabase = FashionPartner::GetDatabase();


			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`fashion_partner`
				WHERE
					`id` = ' . $objDatabase->SqlVariable($this->intId) . '');

			// Journaling
			if ($objDatabase->JournalingDatabase) $this->Journal('DELETE');
		}

		/**
		 * Delete all FashionPartners
		 * @return void
		 */
		public static function DeleteAll() {
			// Get the Database Object for this Class
			$objDatabase = FashionPartner::GetDatabase();

			// Perform the Query
			$objDatabase->NonQuery('
				DELETE FROM
					`fashion_partner`');
		}

		/**
		 * Truncate fashion_partner table
		 * @return void
		 */
		public static function Truncate() {
			// Get the Database Object for this Class
			$objDatabase = FashionPartner::GetDatabase();

			// Perform the Query
			$objDatabase->NonQuery('
				TRUNCATE `fashion_partner`');
		}

		/**
		 * Reload this FashionPartner from the database.
		 * @return void
		 */
		public function Reload() {
			// Make sure we are actually Restored from the database
			if (!$this->__blnRestored)
				throw new QCallerException('Cannot call Reload() on a new, unsaved FashionPartner object.');

			// Reload the Object
			$objReloaded = FashionPartner::Load($this->intId);

			// Update $this's local variables to match
			$this->strName = $objReloaded->strName;
			$this->strDescription = $objReloaded->strDescription;
			$this->strStreet = $objReloaded->strStreet;
			$this->strCity = $objReloaded->strCity;
			$this->strState = $objReloaded->strState;
			$this->strZipcode = $objReloaded->strZipcode;
			$this->strPhone = $objReloaded->strPhone;
			$this->strEmail = $objReloaded->strEmail;
			$this->strContactPerson = $objReloaded->strContactPerson;
		}

		/**
		 * Journals the current object into the Log database.
		 * Used internally as a helper method.
		 * @param string $strJournalCommand
		 */
		public function Journal($strJournalCommand) {
			$objDatabase = FashionPartner::GetDatabase()->JournalingDatabase;

			$objDatabase->NonQuery('
				INSERT INTO `fashion_partner` (
					`id`,
					`name`,
					`description`,
					`street`,
					`city`,
					`state`,
					`zipcode`,
					`phone`,
					`email`,
					`contact_person`,
					__sys_login_id,
					__sys_action,
					__sys_date
				) VALUES (
					' . $objDatabase->SqlVariable($this->intId) . ',
					' . $objDatabase->SqlVariable($this->strName) . ',
					' . $objDatabase->SqlVariable($this->strDescription) . ',
					' . $objDatabase->SqlVariable($this->strStreet) . ',
					' . $objDatabase->SqlVariable($this->strCity) . ',
					' . $objDatabase->SqlVariable($this->strState) . ',
					' . $objDatabase->SqlVariable($this->strZipcode) . ',
					' . $objDatabase->SqlVariable($this->strPhone) . ',
					' . $objDatabase->SqlVariable($this->strEmail) . ',
					' . $objDatabase->SqlVariable($this->strContactPerson) . ',
					' . (($objDatabase->JournaledById) ? $objDatabase->JournaledById : 'NULL') . ',
					' . $objDatabase->SqlVariable($strJournalCommand) . ',
					NOW()
				);
			');
		}

		/**
		 * Gets the historical journal for an object from the log database.
		 * Objects will have VirtualAttributes available to lookup login, date, and action information from the journal object.
		 * @param integer intId
		 * @return FashionPartner[]
		 */
		public static function GetJournalForId($intId) {
			$objDatabase = FashionPartner::GetDatabase()->JournalingDatabase;

			$objResult = $objDatabase->Query('SELECT * FROM fashion_partner WHERE id = ' .
				$objDatabase->SqlVariable($intId) . ' ORDER BY __sys_date');

			return FashionPartner::InstantiateDbResult($objResult);
		}

		/**
		 * Gets the historical journal for this object from the log database.
		 * Objects will have VirtualAttributes available to lookup login, date, and action information from the journal object.
		 * @return FashionPartner[]
		 */
		public function GetJournal() {
			return FashionPartner::GetJournalForId($this->intId);
		}




		////////////////////
		// PUBLIC OVERRIDERS
		////////////////////

				/**
		 * Override method to perform a property "Get"
		 * This will get the value of $strName
		 *
		 * @param string $strName Name of the property to get
		 * @return mixed
		 */
		public function __get($strName) {
			switch ($strName) {
				///////////////////
				// Member Variables
				///////////////////
				case 'Id':
					// Gets the value for intId (Read-Only PK)
					// @return integer
					return $this->intId;

				case 'Name':
					// Gets the value for strName 
					// @return string
					return $this->strName;

				case 'Description':
					// Gets the value for strDescription 
					// @return string
					return $this->strDescription;

				case 'Street':
					// Gets the value for strStreet 
					// @return string
					return $this->strStreet;

				case 'City':
					// Gets the value for strCity 
					// @return string
					return $this->strCity;

				case 'State':
					// Gets the value for strState 
					// @return string
					return $this->strState;

				case 'Zipcode':
					// Gets the value for strZipcode 
					// @return string
					return $this->strZipcode;

				case 'Phone':
					// Gets the value for strPhone 
					// @return string
					return $this->strPhone;

				case 'Email':
					// Gets the value for strEmail 
					// @return string
					return $this->strEmail;

				case 'ContactPerson':
					// Gets the value for strContactPerson 
					// @return string
					return $this->strContactPerson;


				///////////////////
				// Member Objects
				///////////////////

				////////////////////////////
				// Virtual Object References (Many to Many and Reverse References)
				// (If restored via a "Many-to" expansion)
				////////////////////////////

				case '_UserAsFashion':
					// Gets the value for the private _objUserAsFashion (Read-Only)
					// if set due to an expansion on the user_fashion_assn association table
					// @return User
					return $this->_objUserAsFashion;

				case '_UserAsFashionArray':
					// Gets the value for the private _objUserAsFashionArray (Read-Only)
					// if set due to an ExpandAsArray on the user_fashion_assn association table
					// @return User[]
					return (array) $this->_objUserAsFashionArray;

				case '_Donation':
					// Gets the value for the private _objDonation (Read-Only)
					// if set due to an expansion on the donation.fashion_partner_id reverse relationship
					// @return Donation
					return $this->_objDonation;

				case '_DonationArray':
					// Gets the value for the private _objDonationArray (Read-Only)
					// if set due to an ExpandAsArray on the donation.fashion_partner_id reverse relationship
					// @return Donation[]
					return (array) $this->_objDonationArray;


				case '__Restored':
					return $this->__blnRestored;

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
			switch ($strName) {
				///////////////////
				// Member Variables
				///////////////////
				case 'Name':
					// Sets the value for strName 
					// @param string $mixValue
					// @return string
					try {
						return ($this->strName = QType::Cast($mixValue, QType::String));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'Description':
					// Sets the value for strDescription 
					// @param string $mixValue
					// @return string
					try {
						return ($this->strDescription = QType::Cast($mixValue, QType::String));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'Street':
					// Sets the value for strStreet 
					// @param string $mixValue
					// @return string
					try {
						return ($this->strStreet = QType::Cast($mixValue, QType::String));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'City':
					// Sets the value for strCity 
					// @param string $mixValue
					// @return string
					try {
						return ($this->strCity = QType::Cast($mixValue, QType::String));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'State':
					// Sets the value for strState 
					// @param string $mixValue
					// @return string
					try {
						return ($this->strState = QType::Cast($mixValue, QType::String));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'Zipcode':
					// Sets the value for strZipcode 
					// @param string $mixValue
					// @return string
					try {
						return ($this->strZipcode = QType::Cast($mixValue, QType::String));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'Phone':
					// Sets the value for strPhone 
					// @param string $mixValue
					// @return string
					try {
						return ($this->strPhone = QType::Cast($mixValue, QType::String));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'Email':
					// Sets the value for strEmail 
					// @param string $mixValue
					// @return string
					try {
						return ($this->strEmail = QType::Cast($mixValue, QType::String));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'ContactPerson':
					// Sets the value for strContactPerson 
					// @param string $mixValue
					// @return string
					try {
						return ($this->strContactPerson = QType::Cast($mixValue, QType::String));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}


				///////////////////
				// Member Objects
				///////////////////
				default:
					try {
						return parent::__set($strName, $mixValue);
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}
			}
		}

		/**
		 * Lookup a VirtualAttribute value (if applicable).  Returns NULL if none found.
		 * @param string $strName
		 * @return string
		 */
		public function GetVirtualAttribute($strName) {
			if (array_key_exists($strName, $this->__strVirtualAttributeArray))
				return $this->__strVirtualAttributeArray[$strName];
			return null;
		}



		///////////////////////////////
		// ASSOCIATED OBJECTS' METHODS
		///////////////////////////////

			
		
		// Related Objects' Methods for Donation
		//-------------------------------------------------------------------

		/**
		 * Gets all associated Donations as an array of Donation objects
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return Donation[]
		*/ 
		public function GetDonationArray($objOptionalClauses = null) {
			if ((is_null($this->intId)))
				return array();

			try {
				return Donation::LoadArrayByFashionPartnerId($this->intId, $objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Counts all associated Donations
		 * @return int
		*/ 
		public function CountDonations() {
			if ((is_null($this->intId)))
				return 0;

			return Donation::CountByFashionPartnerId($this->intId);
		}

		/**
		 * Associates a Donation
		 * @param Donation $objDonation
		 * @return void
		*/ 
		public function AssociateDonation(Donation $objDonation) {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call AssociateDonation on this unsaved FashionPartner.');
			if ((is_null($objDonation->Id)))
				throw new QUndefinedPrimaryKeyException('Unable to call AssociateDonation on this FashionPartner with an unsaved Donation.');

			// Get the Database Object for this Class
			$objDatabase = FashionPartner::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`donation`
				SET
					`fashion_partner_id` = ' . $objDatabase->SqlVariable($this->intId) . '
				WHERE
					`id` = ' . $objDatabase->SqlVariable($objDonation->Id) . '
			');

			// Journaling (if applicable)
			if ($objDatabase->JournalingDatabase) {
				$objDonation->FashionPartnerId = $this->intId;
				$objDonation->Journal('UPDATE');
			}
		}

		/**
		 * Unassociates a Donation
		 * @param Donation $objDonation
		 * @return void
		*/ 
		public function UnassociateDonation(Donation $objDonation) {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateDonation on this unsaved FashionPartner.');
			if ((is_null($objDonation->Id)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateDonation on this FashionPartner with an unsaved Donation.');

			// Get the Database Object for this Class
			$objDatabase = FashionPartner::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`donation`
				SET
					`fashion_partner_id` = null
				WHERE
					`id` = ' . $objDatabase->SqlVariable($objDonation->Id) . ' AND
					`fashion_partner_id` = ' . $objDatabase->SqlVariable($this->intId) . '
			');

			// Journaling
			if ($objDatabase->JournalingDatabase) {
				$objDonation->FashionPartnerId = null;
				$objDonation->Journal('UPDATE');
			}
		}

		/**
		 * Unassociates all Donations
		 * @return void
		*/ 
		public function UnassociateAllDonations() {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateDonation on this unsaved FashionPartner.');

			// Get the Database Object for this Class
			$objDatabase = FashionPartner::GetDatabase();

			// Journaling
			if ($objDatabase->JournalingDatabase) {
				foreach (Donation::LoadArrayByFashionPartnerId($this->intId) as $objDonation) {
					$objDonation->FashionPartnerId = null;
					$objDonation->Journal('UPDATE');
				}
			}

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`donation`
				SET
					`fashion_partner_id` = null
				WHERE
					`fashion_partner_id` = ' . $objDatabase->SqlVariable($this->intId) . '
			');
		}

		/**
		 * Deletes an associated Donation
		 * @param Donation $objDonation
		 * @return void
		*/ 
		public function DeleteAssociatedDonation(Donation $objDonation) {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateDonation on this unsaved FashionPartner.');
			if ((is_null($objDonation->Id)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateDonation on this FashionPartner with an unsaved Donation.');

			// Get the Database Object for this Class
			$objDatabase = FashionPartner::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`donation`
				WHERE
					`id` = ' . $objDatabase->SqlVariable($objDonation->Id) . ' AND
					`fashion_partner_id` = ' . $objDatabase->SqlVariable($this->intId) . '
			');

			// Journaling
			if ($objDatabase->JournalingDatabase) {
				$objDonation->Journal('DELETE');
			}
		}

		/**
		 * Deletes all associated Donations
		 * @return void
		*/ 
		public function DeleteAllDonations() {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateDonation on this unsaved FashionPartner.');

			// Get the Database Object for this Class
			$objDatabase = FashionPartner::GetDatabase();

			// Journaling
			if ($objDatabase->JournalingDatabase) {
				foreach (Donation::LoadArrayByFashionPartnerId($this->intId) as $objDonation) {
					$objDonation->Journal('DELETE');
				}
			}

			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`donation`
				WHERE
					`fashion_partner_id` = ' . $objDatabase->SqlVariable($this->intId) . '
			');
		}

			
		// Related Many-to-Many Objects' Methods for UserAsFashion
		//-------------------------------------------------------------------

		/**
		 * Gets all many-to-many associated UsersAsFashion as an array of User objects
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return User[]
		*/ 
		public function GetUserAsFashionArray($objOptionalClauses = null) {
			if ((is_null($this->intId)))
				return array();

			try {
				return User::LoadArrayByFashionPartnerAsFashion($this->intId, $objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Counts all many-to-many associated UsersAsFashion
		 * @return int
		*/ 
		public function CountUsersAsFashion() {
			if ((is_null($this->intId)))
				return 0;

			return User::CountByFashionPartnerAsFashion($this->intId);
		}

		/**
		 * Checks to see if an association exists with a specific UserAsFashion
		 * @param User $objUser
		 * @return bool
		*/
		public function IsUserAsFashionAssociated(User $objUser) {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call IsUserAsFashionAssociated on this unsaved FashionPartner.');
			if ((is_null($objUser->Id)))
				throw new QUndefinedPrimaryKeyException('Unable to call IsUserAsFashionAssociated on this FashionPartner with an unsaved User.');

			$intRowCount = FashionPartner::QueryCount(
				QQ::AndCondition(
					QQ::Equal(QQN::FashionPartner()->Id, $this->intId),
					QQ::Equal(QQN::FashionPartner()->UserAsFashion->UserId, $objUser->Id)
				)
			);

			return ($intRowCount > 0);
		}

		/**
		 * Journals the UserAsFashion relationship into the Log database.
		 * Used internally as a helper method.
		 * @param string $strJournalCommand
		 */
		public function JournalUserAsFashionAssociation($intAssociatedId, $strJournalCommand) {
			$objDatabase = FashionPartner::GetDatabase()->JournalingDatabase;

			$objDatabase->NonQuery('
				INSERT INTO `user_fashion_assn` (
					`fashion_id`,
					`user_id`,
					__sys_login_id,
					__sys_action,
					__sys_date
				) VALUES (
					' . $objDatabase->SqlVariable($this->intId) . ',
					' . $objDatabase->SqlVariable($intAssociatedId) . ',
					' . (($objDatabase->JournaledById) ? $objDatabase->JournaledById : 'NULL') . ',
					' . $objDatabase->SqlVariable($strJournalCommand) . ',
					NOW()
				);
			');
		}

		/**
		 * Gets the historical journal for an object's UserAsFashion relationship from the log database.
		 * @param integer intId
		 * @return QDatabaseResult $objResult
		 */
		public static function GetJournalUserAsFashionAssociationForId($intId) {
			$objDatabase = FashionPartner::GetDatabase()->JournalingDatabase;

			return $objDatabase->Query('SELECT * FROM user_fashion_assn WHERE fashion_id = ' .
				$objDatabase->SqlVariable($intId) . ' ORDER BY __sys_date');
		}

		/**
		 * Gets the historical journal for this object's UserAsFashion relationship from the log database.
		 * @return QDatabaseResult $objResult
		 */
		public function GetJournalUserAsFashionAssociation() {
			return FashionPartner::GetJournalUserAsFashionAssociationForId($this->intId);
		}

		/**
		 * Associates a UserAsFashion
		 * @param User $objUser
		 * @return void
		*/ 
		public function AssociateUserAsFashion(User $objUser) {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call AssociateUserAsFashion on this unsaved FashionPartner.');
			if ((is_null($objUser->Id)))
				throw new QUndefinedPrimaryKeyException('Unable to call AssociateUserAsFashion on this FashionPartner with an unsaved User.');

			// Get the Database Object for this Class
			$objDatabase = FashionPartner::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				INSERT INTO `user_fashion_assn` (
					`fashion_id`,
					`user_id`
				) VALUES (
					' . $objDatabase->SqlVariable($this->intId) . ',
					' . $objDatabase->SqlVariable($objUser->Id) . '
				)
			');

			// Journaling (if applicable)
			if ($objDatabase->JournalingDatabase)
				$this->JournalUserAsFashionAssociation($objUser->Id, 'INSERT');
		}

		/**
		 * Unassociates a UserAsFashion
		 * @param User $objUser
		 * @return void
		*/ 
		public function UnassociateUserAsFashion(User $objUser) {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateUserAsFashion on this unsaved FashionPartner.');
			if ((is_null($objUser->Id)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateUserAsFashion on this FashionPartner with an unsaved User.');

			// Get the Database Object for this Class
			$objDatabase = FashionPartner::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`user_fashion_assn`
				WHERE
					`fashion_id` = ' . $objDatabase->SqlVariable($this->intId) . ' AND
					`user_id` = ' . $objDatabase->SqlVariable($objUser->Id) . '
			');

			// Journaling (if applicable)
			if ($objDatabase->JournalingDatabase)
				$this->JournalUserAsFashionAssociation($objUser->Id, 'DELETE');
		}

		/**
		 * Unassociates all UsersAsFashion
		 * @return void
		*/ 
		public function UnassociateAllUsersAsFashion() {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateAllUserAsFashionArray on this unsaved FashionPartner.');

			// Get the Database Object for this Class
			$objDatabase = FashionPartner::GetDatabase();

			// Journaling (if applicable)
			if ($objDatabase->JournalingDatabase) {
				$objResult = $objDatabase->Query('SELECT `user_id` AS associated_id FROM `user_fashion_assn` WHERE `fashion_id` = ' . $objDatabase->SqlVariable($this->intId));
				while ($objRow = $objResult->GetNextRow()) {
					$this->JournalUserAsFashionAssociation($objRow->GetColumn('associated_id'), 'DELETE');
				}
			}

			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`user_fashion_assn`
				WHERE
					`fashion_id` = ' . $objDatabase->SqlVariable($this->intId) . '
			');
		}




		////////////////////////////////////////
		// METHODS for SOAP-BASED WEB SERVICES
		////////////////////////////////////////

		public static function GetSoapComplexTypeXml() {
			$strToReturn = '<complexType name="FashionPartner"><sequence>';
			$strToReturn .= '<element name="Id" type="xsd:int"/>';
			$strToReturn .= '<element name="Name" type="xsd:string"/>';
			$strToReturn .= '<element name="Description" type="xsd:string"/>';
			$strToReturn .= '<element name="Street" type="xsd:string"/>';
			$strToReturn .= '<element name="City" type="xsd:string"/>';
			$strToReturn .= '<element name="State" type="xsd:string"/>';
			$strToReturn .= '<element name="Zipcode" type="xsd:string"/>';
			$strToReturn .= '<element name="Phone" type="xsd:string"/>';
			$strToReturn .= '<element name="Email" type="xsd:string"/>';
			$strToReturn .= '<element name="ContactPerson" type="xsd:string"/>';
			$strToReturn .= '<element name="__blnRestored" type="xsd:boolean"/>';
			$strToReturn .= '</sequence></complexType>';
			return $strToReturn;
		}

		public static function AlterSoapComplexTypeArray(&$strComplexTypeArray) {
			if (!array_key_exists('FashionPartner', $strComplexTypeArray)) {
				$strComplexTypeArray['FashionPartner'] = FashionPartner::GetSoapComplexTypeXml();
			}
		}

		public static function GetArrayFromSoapArray($objSoapArray) {
			$objArrayToReturn = array();

			foreach ($objSoapArray as $objSoapObject)
				array_push($objArrayToReturn, FashionPartner::GetObjectFromSoapObject($objSoapObject));

			return $objArrayToReturn;
		}

		public static function GetObjectFromSoapObject($objSoapObject) {
			$objToReturn = new FashionPartner();
			if (property_exists($objSoapObject, 'Id'))
				$objToReturn->intId = $objSoapObject->Id;
			if (property_exists($objSoapObject, 'Name'))
				$objToReturn->strName = $objSoapObject->Name;
			if (property_exists($objSoapObject, 'Description'))
				$objToReturn->strDescription = $objSoapObject->Description;
			if (property_exists($objSoapObject, 'Street'))
				$objToReturn->strStreet = $objSoapObject->Street;
			if (property_exists($objSoapObject, 'City'))
				$objToReturn->strCity = $objSoapObject->City;
			if (property_exists($objSoapObject, 'State'))
				$objToReturn->strState = $objSoapObject->State;
			if (property_exists($objSoapObject, 'Zipcode'))
				$objToReturn->strZipcode = $objSoapObject->Zipcode;
			if (property_exists($objSoapObject, 'Phone'))
				$objToReturn->strPhone = $objSoapObject->Phone;
			if (property_exists($objSoapObject, 'Email'))
				$objToReturn->strEmail = $objSoapObject->Email;
			if (property_exists($objSoapObject, 'ContactPerson'))
				$objToReturn->strContactPerson = $objSoapObject->ContactPerson;
			if (property_exists($objSoapObject, '__blnRestored'))
				$objToReturn->__blnRestored = $objSoapObject->__blnRestored;
			return $objToReturn;
		}

		public static function GetSoapArrayFromArray($objArray) {
			if (!$objArray)
				return null;

			$objArrayToReturn = array();

			foreach ($objArray as $objObject)
				array_push($objArrayToReturn, FashionPartner::GetSoapObjectFromObject($objObject, true));

			return unserialize(serialize($objArrayToReturn));
		}

		public static function GetSoapObjectFromObject($objObject, $blnBindRelatedObjects) {
			return $objObject;
		}




	}



	/////////////////////////////////////
	// ADDITIONAL CLASSES for QCODO QUERY
	/////////////////////////////////////

	/**
	 * @property-read QQNode $UserId
	 * @property-read QQNodeUser $User
	 * @property-read QQNodeUser $_ChildTableNode
	 */
	class QQNodeFashionPartnerUserAsFashion extends QQAssociationNode {
		protected $strType = 'association';
		protected $strName = 'userasfashion';

		protected $strTableName = 'user_fashion_assn';
		protected $strPrimaryKey = 'fashion_id';
		protected $strClassName = 'User';

		public function __get($strName) {
			switch ($strName) {
				case 'UserId':
					return new QQNode('user_id', 'UserId', 'integer', $this);
				case 'User':
					return new QQNodeUser('user_id', 'UserId', 'integer', $this);
				case '_ChildTableNode':
					return new QQNodeUser('user_id', 'UserId', 'integer', $this);
				default:
					try {
						return parent::__get($strName);
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}
			}
		}
	}

	/**
	 * @property-read QQNode $Id
	 * @property-read QQNode $Name
	 * @property-read QQNode $Description
	 * @property-read QQNode $Street
	 * @property-read QQNode $City
	 * @property-read QQNode $State
	 * @property-read QQNode $Zipcode
	 * @property-read QQNode $Phone
	 * @property-read QQNode $Email
	 * @property-read QQNode $ContactPerson
	 * @property-read QQNodeFashionPartnerUserAsFashion $UserAsFashion
	 * @property-read QQReverseReferenceNodeDonation $Donation
	 */
	class QQNodeFashionPartner extends QQNode {
		protected $strTableName = 'fashion_partner';
		protected $strPrimaryKey = 'id';
		protected $strClassName = 'FashionPartner';
		public function __get($strName) {
			switch ($strName) {
				case 'Id':
					return new QQNode('id', 'Id', 'integer', $this);
				case 'Name':
					return new QQNode('name', 'Name', 'string', $this);
				case 'Description':
					return new QQNode('description', 'Description', 'string', $this);
				case 'Street':
					return new QQNode('street', 'Street', 'string', $this);
				case 'City':
					return new QQNode('city', 'City', 'string', $this);
				case 'State':
					return new QQNode('state', 'State', 'string', $this);
				case 'Zipcode':
					return new QQNode('zipcode', 'Zipcode', 'string', $this);
				case 'Phone':
					return new QQNode('phone', 'Phone', 'string', $this);
				case 'Email':
					return new QQNode('email', 'Email', 'string', $this);
				case 'ContactPerson':
					return new QQNode('contact_person', 'ContactPerson', 'string', $this);
				case 'UserAsFashion':
					return new QQNodeFashionPartnerUserAsFashion($this);
				case 'Donation':
					return new QQReverseReferenceNodeDonation($this, 'donation', 'reverse_reference', 'fashion_partner_id');

				case '_PrimaryKeyNode':
					return new QQNode('id', 'Id', 'integer', $this);
				default:
					try {
						return parent::__get($strName);
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}
			}
		}
	}
	
	/**
	 * @property-read QQNode $Id
	 * @property-read QQNode $Name
	 * @property-read QQNode $Description
	 * @property-read QQNode $Street
	 * @property-read QQNode $City
	 * @property-read QQNode $State
	 * @property-read QQNode $Zipcode
	 * @property-read QQNode $Phone
	 * @property-read QQNode $Email
	 * @property-read QQNode $ContactPerson
	 * @property-read QQNodeFashionPartnerUserAsFashion $UserAsFashion
	 * @property-read QQReverseReferenceNodeDonation $Donation
	 * @property-read QQNode $_PrimaryKeyNode
	 */
	class QQReverseReferenceNodeFashionPartner extends QQReverseReferenceNode {
		protected $strTableName = 'fashion_partner';
		protected $strPrimaryKey = 'id';
		protected $strClassName = 'FashionPartner';
		public function __get($strName) {
			switch ($strName) {
				case 'Id':
					return new QQNode('id', 'Id', 'integer', $this);
				case 'Name':
					return new QQNode('name', 'Name', 'string', $this);
				case 'Description':
					return new QQNode('description', 'Description', 'string', $this);
				case 'Street':
					return new QQNode('street', 'Street', 'string', $this);
				case 'City':
					return new QQNode('city', 'City', 'string', $this);
				case 'State':
					return new QQNode('state', 'State', 'string', $this);
				case 'Zipcode':
					return new QQNode('zipcode', 'Zipcode', 'string', $this);
				case 'Phone':
					return new QQNode('phone', 'Phone', 'string', $this);
				case 'Email':
					return new QQNode('email', 'Email', 'string', $this);
				case 'ContactPerson':
					return new QQNode('contact_person', 'ContactPerson', 'string', $this);
				case 'UserAsFashion':
					return new QQNodeFashionPartnerUserAsFashion($this);
				case 'Donation':
					return new QQReverseReferenceNodeDonation($this, 'donation', 'reverse_reference', 'fashion_partner_id');

				case '_PrimaryKeyNode':
					return new QQNode('id', 'Id', 'integer', $this);
				default:
					try {
						return parent::__get($strName);
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}
			}
		}
	}

?>