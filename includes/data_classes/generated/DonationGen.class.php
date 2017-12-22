<?php
	/**
	 * The abstract DonationGen class defined here is
	 * code-generated and contains all the basic CRUD-type functionality as well as
	 * basic methods to handle relationships and index-based loading.
	 *
	 * To use, you should use the Donation subclass which
	 * extends this DonationGen class.
	 *
	 * Because subsequent re-code generations will overwrite any changes to this
	 * file, you should leave this file unaltered to prevent yourself from losing
	 * any information or code changes.  All customizations should be done by
	 * overriding existing or implementing new methods, properties and variables
	 * in the Donation class.
	 * 
	 * @package My Application
	 * @subpackage GeneratedDataObjects
	 * @property integer $Id the value for intId (Read-Only PK)
	 * @property string $Description the value for strDescription 
	 * @property integer $QuantityGiven the value for intQuantityGiven 
	 * @property integer $UnitTypeId the value for intUnitTypeId 
	 * @property integer $SizeId the value for intSizeId 
	 * @property integer $Status the value for intStatus 
	 * @property integer $CostPerUnit the value for intCostPerUnit 
	 * @property integer $FashionPartnerId the value for intFashionPartnerId 
	 * @property QDateTime $DateDonated the value for dttDateDonated 
	 * @property integer $QuantityRemaining the value for intQuantityRemaining 
	 * @property Size $Size the value for the Size object referenced by intSizeId 
	 * @property DonationStatus $StatusObject the value for the DonationStatus object referenced by intStatus 
	 * @property FashionPartner $FashionPartner the value for the FashionPartner object referenced by intFashionPartnerId 
	 * @property Transaction $_Transaction the value for the private _objTransaction (Read-Only) if set due to an expansion on the transaction.donation_id reverse relationship
	 * @property Transaction[] $_TransactionArray the value for the private _objTransactionArray (Read-Only) if set due to an ExpandAsArray on the transaction.donation_id reverse relationship
	 * @property boolean $__Restored whether or not this object was restored from the database (as opposed to created new)
	 */
	class DonationGen extends QBaseClass {

		///////////////////////////////////////////////////////////////////////
		// PROTECTED MEMBER VARIABLES and TEXT FIELD MAXLENGTHS (if applicable)
		///////////////////////////////////////////////////////////////////////
		
		/**
		 * Protected member variable that maps to the database PK Identity column donation.id
		 * @var integer intId
		 */
		protected $intId;
		const IdDefault = null;


		/**
		 * Protected member variable that maps to the database column donation.description
		 * @var string strDescription
		 */
		protected $strDescription;
		const DescriptionMaxLength = 500;
		const DescriptionDefault = null;


		/**
		 * Protected member variable that maps to the database column donation.quantity_given
		 * @var integer intQuantityGiven
		 */
		protected $intQuantityGiven;
		const QuantityGivenDefault = null;


		/**
		 * Protected member variable that maps to the database column donation.unit_type_id
		 * @var integer intUnitTypeId
		 */
		protected $intUnitTypeId;
		const UnitTypeIdDefault = null;


		/**
		 * Protected member variable that maps to the database column donation.size_id
		 * @var integer intSizeId
		 */
		protected $intSizeId;
		const SizeIdDefault = null;


		/**
		 * Protected member variable that maps to the database column donation.status
		 * @var integer intStatus
		 */
		protected $intStatus;
		const StatusDefault = null;


		/**
		 * Protected member variable that maps to the database column donation.cost_per_unit
		 * @var integer intCostPerUnit
		 */
		protected $intCostPerUnit;
		const CostPerUnitDefault = null;


		/**
		 * Protected member variable that maps to the database column donation.fashion_partner_id
		 * @var integer intFashionPartnerId
		 */
		protected $intFashionPartnerId;
		const FashionPartnerIdDefault = null;


		/**
		 * Protected member variable that maps to the database column donation.date_donated
		 * @var QDateTime dttDateDonated
		 */
		protected $dttDateDonated;
		const DateDonatedDefault = null;


		/**
		 * Protected member variable that maps to the database column donation.quantity_remaining
		 * @var integer intQuantityRemaining
		 */
		protected $intQuantityRemaining;
		const QuantityRemainingDefault = null;


		/**
		 * Private member variable that stores a reference to a single Transaction object
		 * (of type Transaction), if this Donation object was restored with
		 * an expansion on the transaction association table.
		 * @var Transaction _objTransaction;
		 */
		private $_objTransaction;

		/**
		 * Private member variable that stores a reference to an array of Transaction objects
		 * (of type Transaction[]), if this Donation object was restored with
		 * an ExpandAsArray on the transaction association table.
		 * @var Transaction[] _objTransactionArray;
		 */
		private $_objTransactionArray = array();

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

		/**
		 * Protected member variable that contains the object pointed by the reference
		 * in the database column donation.size_id.
		 *
		 * NOTE: Always use the Size property getter to correctly retrieve this Size object.
		 * (Because this class implements late binding, this variable reference MAY be null.)
		 * @var Size objSize
		 */
		protected $objSize;

		/**
		 * Protected member variable that contains the object pointed by the reference
		 * in the database column donation.status.
		 *
		 * NOTE: Always use the StatusObject property getter to correctly retrieve this DonationStatus object.
		 * (Because this class implements late binding, this variable reference MAY be null.)
		 * @var DonationStatus objStatusObject
		 */
		protected $objStatusObject;

		/**
		 * Protected member variable that contains the object pointed by the reference
		 * in the database column donation.fashion_partner_id.
		 *
		 * NOTE: Always use the FashionPartner property getter to correctly retrieve this FashionPartner object.
		 * (Because this class implements late binding, this variable reference MAY be null.)
		 * @var FashionPartner objFashionPartner
		 */
		protected $objFashionPartner;





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
		 * Load a Donation from PK Info
		 * @param integer $intId
		 * @return Donation
		 */
		public static function Load($intId) {
			// Use QuerySingle to Perform the Query
			return Donation::QuerySingle(
				QQ::Equal(QQN::Donation()->Id, $intId)
			);
		}

		/**
		 * Load all Donations
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return Donation[]
		 */
		public static function LoadAll($objOptionalClauses = null) {
			// Call Donation::QueryArray to perform the LoadAll query
			try {
				return Donation::QueryArray(QQ::All(), $objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Count all Donations
		 * @return int
		 */
		public static function CountAll() {
			// Call Donation::QueryCount to perform the CountAll query
			return Donation::QueryCount(QQ::All());
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
			$objDatabase = Donation::GetDatabase();

			// Create/Build out the QueryBuilder object with Donation-specific SELET and FROM fields
			$objQueryBuilder = new QQueryBuilder($objDatabase, 'donation');
			Donation::GetSelectFields($objQueryBuilder);
			$objQueryBuilder->AddFromItem('donation');

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
		 * Static Qcodo Query method to query for a single Donation object.
		 * Uses BuildQueryStatment to perform most of the work.
		 * @param QQCondition $objConditions any conditions on the query, itself
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @param mixed[] $mixParameterArray a array of name-value pairs to perform PrepareStatement with
		 * @return Donation the queried object
		 */
		public static function QuerySingle(QQCondition $objConditions, $objOptionalClauses = null, $mixParameterArray = null) {
			// Get the Query Statement
			try {
				$strQuery = Donation::BuildQueryStatement($objQueryBuilder, $objConditions, $objOptionalClauses, $mixParameterArray, false);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}

			// Perform the Query
			$objDbResult = $objQueryBuilder->Database->Query($strQuery);

			// Instantiate a new Donation object and return it

			// Do we have to expand anything?
			if ($objQueryBuilder->ExpandAsArrayNodes) {
				$objToReturn = array();
				while ($objDbRow = $objDbResult->GetNextRow()) {
					$objItem = Donation::InstantiateDbRow($objDbRow, null, $objQueryBuilder->ExpandAsArrayNodes, $objToReturn, $objQueryBuilder->ColumnAliasArray);
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
				return Donation::InstantiateDbRow($objDbRow, null, null, null, $objQueryBuilder->ColumnAliasArray);
			}
		}

		/**
		 * Static Qcodo Query method to query for an array of Donation objects.
		 * Uses BuildQueryStatment to perform most of the work.
		 * @param QQCondition $objConditions any conditions on the query, itself
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @param mixed[] $mixParameterArray a array of name-value pairs to perform PrepareStatement with
		 * @return Donation[] the queried objects as an array
		 */
		public static function QueryArray(QQCondition $objConditions, $objOptionalClauses = null, $mixParameterArray = null) {
			// Get the Query Statement
			try {
				$strQuery = Donation::BuildQueryStatement($objQueryBuilder, $objConditions, $objOptionalClauses, $mixParameterArray, false);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}

			// Perform the Query and Instantiate the Array Result
			$objDbResult = $objQueryBuilder->Database->Query($strQuery);
			return Donation::InstantiateDbResult($objDbResult, $objQueryBuilder->ExpandAsArrayNodes, $objQueryBuilder->ColumnAliasArray);
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
				$strQuery = Donation::BuildQueryStatement($objQueryBuilder, $objConditions, $objOptionalClauses, $mixParameterArray, false);
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
		 * Static Qcodo Query method to query for a count of Donation objects.
		 * Uses BuildQueryStatment to perform most of the work.
		 * @param QQCondition $objConditions any conditions on the query, itself
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @param mixed[] $mixParameterArray a array of name-value pairs to perform PrepareStatement with
		 * @return integer the count of queried objects as an integer
		 */
		public static function QueryCount(QQCondition $objConditions, $objOptionalClauses = null, $mixParameterArray = null) {
			// Get the Query Statement
			try {
				$strQuery = Donation::BuildQueryStatement($objQueryBuilder, $objConditions, $objOptionalClauses, $mixParameterArray, true);
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
			$objDatabase = Donation::GetDatabase();

			// Lookup the QCache for This Query Statement
			$objCache = new QCache('query', 'donation_' . serialize($strConditions));
			if (!($strQuery = $objCache->GetData())) {
				// Not Found -- Go ahead and Create/Build out a new QueryBuilder object with Donation-specific fields
				$objQueryBuilder = new QQueryBuilder($objDatabase);
				Donation::GetSelectFields($objQueryBuilder);
				Donation::GetFromFields($objQueryBuilder);

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
			return Donation::InstantiateDbResult($objDbResult);
		}*/

		/**
		 * Updates a QQueryBuilder with the SELECT fields for this Donation
		 * @param QQueryBuilder $objBuilder the Query Builder object to update
		 * @param string $strPrefix optional prefix to add to the SELECT fields
		 */
		public static function GetSelectFields(QQueryBuilder $objBuilder, $strPrefix = null) {
			if ($strPrefix) {
				$strTableName = $strPrefix;
				$strAliasPrefix = $strPrefix . '__';
			} else {
				$strTableName = 'donation';
				$strAliasPrefix = '';
			}

			$objBuilder->AddSelectItem($strTableName, 'id', $strAliasPrefix . 'id');
			$objBuilder->AddSelectItem($strTableName, 'description', $strAliasPrefix . 'description');
			$objBuilder->AddSelectItem($strTableName, 'quantity_given', $strAliasPrefix . 'quantity_given');
			$objBuilder->AddSelectItem($strTableName, 'unit_type_id', $strAliasPrefix . 'unit_type_id');
			$objBuilder->AddSelectItem($strTableName, 'size_id', $strAliasPrefix . 'size_id');
			$objBuilder->AddSelectItem($strTableName, 'status', $strAliasPrefix . 'status');
			$objBuilder->AddSelectItem($strTableName, 'cost_per_unit', $strAliasPrefix . 'cost_per_unit');
			$objBuilder->AddSelectItem($strTableName, 'fashion_partner_id', $strAliasPrefix . 'fashion_partner_id');
			$objBuilder->AddSelectItem($strTableName, 'date_donated', $strAliasPrefix . 'date_donated');
			$objBuilder->AddSelectItem($strTableName, 'quantity_remaining', $strAliasPrefix . 'quantity_remaining');
		}




		///////////////////////////////
		// INSTANTIATION-RELATED METHODS
		///////////////////////////////

		/**
		 * Instantiate a Donation from a Database Row.
		 * Takes in an optional strAliasPrefix, used in case another Object::InstantiateDbRow
		 * is calling this Donation::InstantiateDbRow in order to perform
		 * early binding on referenced objects.
		 * @param QDatabaseRowBase $objDbRow
		 * @param string $strAliasPrefix
		 * @param string $strExpandAsArrayNodes
		 * @param QBaseClass $objPreviousItem
		 * @param string[] $strColumnAliasArray
		 * @return Donation
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
					$strAliasPrefix = 'donation__';


				$strAlias = $strAliasPrefix . 'transaction__id';
				$strAliasName = array_key_exists($strAlias, $strColumnAliasArray) ? $strColumnAliasArray[$strAlias] : $strAlias;
				if ((array_key_exists($strAlias, $strExpandAsArrayNodes)) &&
					(!is_null($objDbRow->GetColumn($strAliasName)))) {
					if ($intPreviousChildItemCount = count($objPreviousItem->_objTransactionArray)) {
						$objPreviousChildItem = $objPreviousItem->_objTransactionArray[$intPreviousChildItemCount - 1];
						$objChildItem = Transaction::InstantiateDbRow($objDbRow, $strAliasPrefix . 'transaction__', $strExpandAsArrayNodes, $objPreviousChildItem, $strColumnAliasArray);
						if ($objChildItem)
							$objPreviousItem->_objTransactionArray[] = $objChildItem;
					} else
						$objPreviousItem->_objTransactionArray[] = Transaction::InstantiateDbRow($objDbRow, $strAliasPrefix . 'transaction__', $strExpandAsArrayNodes, null, $strColumnAliasArray);
					$blnExpandedViaArray = true;
				}

				// Either return false to signal array expansion, or check-to-reset the Alias prefix and move on
				if ($blnExpandedViaArray)
					return false;
				else if ($strAliasPrefix == 'donation__')
					$strAliasPrefix = null;
			}

			// Create a new instance of the Donation object
			$objToReturn = new Donation();
			$objToReturn->__blnRestored = true;

			$strAliasName = array_key_exists($strAliasPrefix . 'id', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'id'] : $strAliasPrefix . 'id';
			$objToReturn->intId = $objDbRow->GetColumn($strAliasName, 'Integer');
			$strAliasName = array_key_exists($strAliasPrefix . 'description', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'description'] : $strAliasPrefix . 'description';
			$objToReturn->strDescription = $objDbRow->GetColumn($strAliasName, 'VarChar');
			$strAliasName = array_key_exists($strAliasPrefix . 'quantity_given', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'quantity_given'] : $strAliasPrefix . 'quantity_given';
			$objToReturn->intQuantityGiven = $objDbRow->GetColumn($strAliasName, 'Integer');
			$strAliasName = array_key_exists($strAliasPrefix . 'unit_type_id', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'unit_type_id'] : $strAliasPrefix . 'unit_type_id';
			$objToReturn->intUnitTypeId = $objDbRow->GetColumn($strAliasName, 'Integer');
			$strAliasName = array_key_exists($strAliasPrefix . 'size_id', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'size_id'] : $strAliasPrefix . 'size_id';
			$objToReturn->intSizeId = $objDbRow->GetColumn($strAliasName, 'Integer');
			$strAliasName = array_key_exists($strAliasPrefix . 'status', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'status'] : $strAliasPrefix . 'status';
			$objToReturn->intStatus = $objDbRow->GetColumn($strAliasName, 'Integer');
			$strAliasName = array_key_exists($strAliasPrefix . 'cost_per_unit', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'cost_per_unit'] : $strAliasPrefix . 'cost_per_unit';
			$objToReturn->intCostPerUnit = $objDbRow->GetColumn($strAliasName, 'Integer');
			$strAliasName = array_key_exists($strAliasPrefix . 'fashion_partner_id', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'fashion_partner_id'] : $strAliasPrefix . 'fashion_partner_id';
			$objToReturn->intFashionPartnerId = $objDbRow->GetColumn($strAliasName, 'Integer');
			$strAliasName = array_key_exists($strAliasPrefix . 'date_donated', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'date_donated'] : $strAliasPrefix . 'date_donated';
			$objToReturn->dttDateDonated = $objDbRow->GetColumn($strAliasName, 'Date');
			$strAliasName = array_key_exists($strAliasPrefix . 'quantity_remaining', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'quantity_remaining'] : $strAliasPrefix . 'quantity_remaining';
			$objToReturn->intQuantityRemaining = $objDbRow->GetColumn($strAliasName, 'Integer');

			// Instantiate Virtual Attributes
			foreach ($objDbRow->GetColumnNameArray() as $strColumnName => $mixValue) {
				$strVirtualPrefix = $strAliasPrefix . '__';
				$strVirtualPrefixLength = strlen($strVirtualPrefix);
				if (substr($strColumnName, 0, $strVirtualPrefixLength) == $strVirtualPrefix)
					$objToReturn->__strVirtualAttributeArray[substr($strColumnName, $strVirtualPrefixLength)] = $mixValue;
			}

			// Prepare to Check for Early/Virtual Binding
			if (!$strAliasPrefix)
				$strAliasPrefix = 'donation__';

			// Check for Size Early Binding
			$strAlias = $strAliasPrefix . 'size_id__id';
			$strAliasName = array_key_exists($strAlias, $strColumnAliasArray) ? $strColumnAliasArray[$strAlias] : $strAlias;
			if (!is_null($objDbRow->GetColumn($strAliasName)))
				$objToReturn->objSize = Size::InstantiateDbRow($objDbRow, $strAliasPrefix . 'size_id__', $strExpandAsArrayNodes, null, $strColumnAliasArray);

			// Check for StatusObject Early Binding
			$strAlias = $strAliasPrefix . 'status__id';
			$strAliasName = array_key_exists($strAlias, $strColumnAliasArray) ? $strColumnAliasArray[$strAlias] : $strAlias;
			if (!is_null($objDbRow->GetColumn($strAliasName)))
				$objToReturn->objStatusObject = DonationStatus::InstantiateDbRow($objDbRow, $strAliasPrefix . 'status__', $strExpandAsArrayNodes, null, $strColumnAliasArray);

			// Check for FashionPartner Early Binding
			$strAlias = $strAliasPrefix . 'fashion_partner_id__id';
			$strAliasName = array_key_exists($strAlias, $strColumnAliasArray) ? $strColumnAliasArray[$strAlias] : $strAlias;
			if (!is_null($objDbRow->GetColumn($strAliasName)))
				$objToReturn->objFashionPartner = FashionPartner::InstantiateDbRow($objDbRow, $strAliasPrefix . 'fashion_partner_id__', $strExpandAsArrayNodes, null, $strColumnAliasArray);




			// Check for Transaction Virtual Binding
			$strAlias = $strAliasPrefix . 'transaction__id';
			$strAliasName = array_key_exists($strAlias, $strColumnAliasArray) ? $strColumnAliasArray[$strAlias] : $strAlias;
			if (!is_null($objDbRow->GetColumn($strAliasName))) {
				if (($strExpandAsArrayNodes) && (array_key_exists($strAlias, $strExpandAsArrayNodes)))
					$objToReturn->_objTransactionArray[] = Transaction::InstantiateDbRow($objDbRow, $strAliasPrefix . 'transaction__', $strExpandAsArrayNodes, null, $strColumnAliasArray);
				else
					$objToReturn->_objTransaction = Transaction::InstantiateDbRow($objDbRow, $strAliasPrefix . 'transaction__', $strExpandAsArrayNodes, null, $strColumnAliasArray);
			}

			return $objToReturn;
		}

		/**
		 * Instantiate an array of Donations from a Database Result
		 * @param QDatabaseResultBase $objDbResult
		 * @param string $strExpandAsArrayNodes
		 * @param string[] $strColumnAliasArray
		 * @return Donation[]
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
					$objItem = Donation::InstantiateDbRow($objDbRow, null, $strExpandAsArrayNodes, $objLastRowItem, $strColumnAliasArray);
					if ($objItem) {
						$objToReturn[] = $objItem;
						$objLastRowItem = $objItem;
					}
				}
			} else {
				while ($objDbRow = $objDbResult->GetNextRow())
					$objToReturn[] = Donation::InstantiateDbRow($objDbRow, null, null, null, $strColumnAliasArray);
			}

			return $objToReturn;
		}

		/**
		 * Instantiate a single Donation object from a query cursor (e.g. a DB ResultSet).
		 * Cursor is automatically moved to the "next row" of the result set.
		 * Will return NULL if no cursor or if the cursor has no more rows in the resultset.
		 * @param QDatabaseResultBase $objDbResult cursor resource
		 * @return Donation next row resulting from the query
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
			return Donation::InstantiateDbRow($objDbRow, null, $strExpandAsArrayNodes, null, $strColumnAliasArray);
		}




		///////////////////////////////////////////////////
		// INDEX-BASED LOAD METHODS (Single Load and Array)
		///////////////////////////////////////////////////
			
		/**
		 * Load a single Donation object,
		 * by Id Index(es)
		 * @param integer $intId
		 * @return Donation
		*/
		public static function LoadById($intId, $objOptionalClauses = null) {
			return Donation::QuerySingle(
				QQ::Equal(QQN::Donation()->Id, $intId)
			, $objOptionalClauses
			);
		}
			
		/**
		 * Load an array of Donation objects,
		 * by UnitTypeId Index(es)
		 * @param integer $intUnitTypeId
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return Donation[]
		*/
		public static function LoadArrayByUnitTypeId($intUnitTypeId, $objOptionalClauses = null) {
			// Call Donation::QueryArray to perform the LoadArrayByUnitTypeId query
			try {
				return Donation::QueryArray(
					QQ::Equal(QQN::Donation()->UnitTypeId, $intUnitTypeId),
					$objOptionalClauses
					);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Count Donations
		 * by UnitTypeId Index(es)
		 * @param integer $intUnitTypeId
		 * @return int
		*/
		public static function CountByUnitTypeId($intUnitTypeId, $objOptionalClauses = null) {
			// Call Donation::QueryCount to perform the CountByUnitTypeId query
			return Donation::QueryCount(
				QQ::Equal(QQN::Donation()->UnitTypeId, $intUnitTypeId)
			, $objOptionalClauses
			);
		}
			
		/**
		 * Load an array of Donation objects,
		 * by SizeId Index(es)
		 * @param integer $intSizeId
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return Donation[]
		*/
		public static function LoadArrayBySizeId($intSizeId, $objOptionalClauses = null) {
			// Call Donation::QueryArray to perform the LoadArrayBySizeId query
			try {
				return Donation::QueryArray(
					QQ::Equal(QQN::Donation()->SizeId, $intSizeId),
					$objOptionalClauses
					);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Count Donations
		 * by SizeId Index(es)
		 * @param integer $intSizeId
		 * @return int
		*/
		public static function CountBySizeId($intSizeId, $objOptionalClauses = null) {
			// Call Donation::QueryCount to perform the CountBySizeId query
			return Donation::QueryCount(
				QQ::Equal(QQN::Donation()->SizeId, $intSizeId)
			, $objOptionalClauses
			);
		}
			
		/**
		 * Load an array of Donation objects,
		 * by Status Index(es)
		 * @param integer $intStatus
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return Donation[]
		*/
		public static function LoadArrayByStatus($intStatus, $objOptionalClauses = null) {
			// Call Donation::QueryArray to perform the LoadArrayByStatus query
			try {
				return Donation::QueryArray(
					QQ::Equal(QQN::Donation()->Status, $intStatus),
					$objOptionalClauses
					);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Count Donations
		 * by Status Index(es)
		 * @param integer $intStatus
		 * @return int
		*/
		public static function CountByStatus($intStatus, $objOptionalClauses = null) {
			// Call Donation::QueryCount to perform the CountByStatus query
			return Donation::QueryCount(
				QQ::Equal(QQN::Donation()->Status, $intStatus)
			, $objOptionalClauses
			);
		}
			
		/**
		 * Load an array of Donation objects,
		 * by FashionPartnerId Index(es)
		 * @param integer $intFashionPartnerId
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return Donation[]
		*/
		public static function LoadArrayByFashionPartnerId($intFashionPartnerId, $objOptionalClauses = null) {
			// Call Donation::QueryArray to perform the LoadArrayByFashionPartnerId query
			try {
				return Donation::QueryArray(
					QQ::Equal(QQN::Donation()->FashionPartnerId, $intFashionPartnerId),
					$objOptionalClauses
					);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Count Donations
		 * by FashionPartnerId Index(es)
		 * @param integer $intFashionPartnerId
		 * @return int
		*/
		public static function CountByFashionPartnerId($intFashionPartnerId, $objOptionalClauses = null) {
			// Call Donation::QueryCount to perform the CountByFashionPartnerId query
			return Donation::QueryCount(
				QQ::Equal(QQN::Donation()->FashionPartnerId, $intFashionPartnerId)
			, $objOptionalClauses
			);
		}



		////////////////////////////////////////////////////
		// INDEX-BASED LOAD METHODS (Array via Many to Many)
		////////////////////////////////////////////////////




		//////////////////////////////////////
		// SAVE, DELETE, RELOAD and JOURNALING
		//////////////////////////////////////

		/**
		 * Save this Donation
		 * @param bool $blnForceInsert
		 * @param bool $blnForceUpdate
		 * @return int
		 */
		public function Save($blnForceInsert = false, $blnForceUpdate = false) {
			// Get the Database Object for this Class
			$objDatabase = Donation::GetDatabase();

			$mixToReturn = null;

			try {
				if ((!$this->__blnRestored) || ($blnForceInsert)) {
					// Perform an INSERT query
					$objDatabase->NonQuery('
						INSERT INTO `donation` (
							`description`,
							`quantity_given`,
							`unit_type_id`,
							`size_id`,
							`status`,
							`cost_per_unit`,
							`fashion_partner_id`,
							`date_donated`,
							`quantity_remaining`
						) VALUES (
							' . $objDatabase->SqlVariable($this->strDescription) . ',
							' . $objDatabase->SqlVariable($this->intQuantityGiven) . ',
							' . $objDatabase->SqlVariable($this->intUnitTypeId) . ',
							' . $objDatabase->SqlVariable($this->intSizeId) . ',
							' . $objDatabase->SqlVariable($this->intStatus) . ',
							' . $objDatabase->SqlVariable($this->intCostPerUnit) . ',
							' . $objDatabase->SqlVariable($this->intFashionPartnerId) . ',
							' . $objDatabase->SqlVariable($this->dttDateDonated) . ',
							' . $objDatabase->SqlVariable($this->intQuantityRemaining) . '
						)
					');

					// Update Identity column and return its value
					$mixToReturn = $this->intId = $objDatabase->InsertId('donation', 'id');

					// Journaling
					if ($objDatabase->JournalingDatabase) $this->Journal('INSERT');

				} else {
					// Perform an UPDATE query

					// First checking for Optimistic Locking constraints (if applicable)

					// Perform the UPDATE query
					$objDatabase->NonQuery('
						UPDATE
							`donation`
						SET
							`description` = ' . $objDatabase->SqlVariable($this->strDescription) . ',
							`quantity_given` = ' . $objDatabase->SqlVariable($this->intQuantityGiven) . ',
							`unit_type_id` = ' . $objDatabase->SqlVariable($this->intUnitTypeId) . ',
							`size_id` = ' . $objDatabase->SqlVariable($this->intSizeId) . ',
							`status` = ' . $objDatabase->SqlVariable($this->intStatus) . ',
							`cost_per_unit` = ' . $objDatabase->SqlVariable($this->intCostPerUnit) . ',
							`fashion_partner_id` = ' . $objDatabase->SqlVariable($this->intFashionPartnerId) . ',
							`date_donated` = ' . $objDatabase->SqlVariable($this->dttDateDonated) . ',
							`quantity_remaining` = ' . $objDatabase->SqlVariable($this->intQuantityRemaining) . '
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
		 * Delete this Donation
		 * @return void
		 */
		public function Delete() {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Cannot delete this Donation with an unset primary key.');

			// Get the Database Object for this Class
			$objDatabase = Donation::GetDatabase();


			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`donation`
				WHERE
					`id` = ' . $objDatabase->SqlVariable($this->intId) . '');

			// Journaling
			if ($objDatabase->JournalingDatabase) $this->Journal('DELETE');
		}

		/**
		 * Delete all Donations
		 * @return void
		 */
		public static function DeleteAll() {
			// Get the Database Object for this Class
			$objDatabase = Donation::GetDatabase();

			// Perform the Query
			$objDatabase->NonQuery('
				DELETE FROM
					`donation`');
		}

		/**
		 * Truncate donation table
		 * @return void
		 */
		public static function Truncate() {
			// Get the Database Object for this Class
			$objDatabase = Donation::GetDatabase();

			// Perform the Query
			$objDatabase->NonQuery('
				TRUNCATE `donation`');
		}

		/**
		 * Reload this Donation from the database.
		 * @return void
		 */
		public function Reload() {
			// Make sure we are actually Restored from the database
			if (!$this->__blnRestored)
				throw new QCallerException('Cannot call Reload() on a new, unsaved Donation object.');

			// Reload the Object
			$objReloaded = Donation::Load($this->intId);

			// Update $this's local variables to match
			$this->strDescription = $objReloaded->strDescription;
			$this->intQuantityGiven = $objReloaded->intQuantityGiven;
			$this->UnitTypeId = $objReloaded->UnitTypeId;
			$this->SizeId = $objReloaded->SizeId;
			$this->Status = $objReloaded->Status;
			$this->intCostPerUnit = $objReloaded->intCostPerUnit;
			$this->FashionPartnerId = $objReloaded->FashionPartnerId;
			$this->dttDateDonated = $objReloaded->dttDateDonated;
			$this->intQuantityRemaining = $objReloaded->intQuantityRemaining;
		}

		/**
		 * Journals the current object into the Log database.
		 * Used internally as a helper method.
		 * @param string $strJournalCommand
		 */
		public function Journal($strJournalCommand) {
			$objDatabase = Donation::GetDatabase()->JournalingDatabase;

			$objDatabase->NonQuery('
				INSERT INTO `donation` (
					`id`,
					`description`,
					`quantity_given`,
					`unit_type_id`,
					`size_id`,
					`status`,
					`cost_per_unit`,
					`fashion_partner_id`,
					`date_donated`,
					`quantity_remaining`,
					__sys_login_id,
					__sys_action,
					__sys_date
				) VALUES (
					' . $objDatabase->SqlVariable($this->intId) . ',
					' . $objDatabase->SqlVariable($this->strDescription) . ',
					' . $objDatabase->SqlVariable($this->intQuantityGiven) . ',
					' . $objDatabase->SqlVariable($this->intUnitTypeId) . ',
					' . $objDatabase->SqlVariable($this->intSizeId) . ',
					' . $objDatabase->SqlVariable($this->intStatus) . ',
					' . $objDatabase->SqlVariable($this->intCostPerUnit) . ',
					' . $objDatabase->SqlVariable($this->intFashionPartnerId) . ',
					' . $objDatabase->SqlVariable($this->dttDateDonated) . ',
					' . $objDatabase->SqlVariable($this->intQuantityRemaining) . ',
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
		 * @return Donation[]
		 */
		public static function GetJournalForId($intId) {
			$objDatabase = Donation::GetDatabase()->JournalingDatabase;

			$objResult = $objDatabase->Query('SELECT * FROM donation WHERE id = ' .
				$objDatabase->SqlVariable($intId) . ' ORDER BY __sys_date');

			return Donation::InstantiateDbResult($objResult);
		}

		/**
		 * Gets the historical journal for this object from the log database.
		 * Objects will have VirtualAttributes available to lookup login, date, and action information from the journal object.
		 * @return Donation[]
		 */
		public function GetJournal() {
			return Donation::GetJournalForId($this->intId);
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

				case 'Description':
					// Gets the value for strDescription 
					// @return string
					return $this->strDescription;

				case 'QuantityGiven':
					// Gets the value for intQuantityGiven 
					// @return integer
					return $this->intQuantityGiven;

				case 'UnitTypeId':
					// Gets the value for intUnitTypeId 
					// @return integer
					return $this->intUnitTypeId;

				case 'SizeId':
					// Gets the value for intSizeId 
					// @return integer
					return $this->intSizeId;

				case 'Status':
					// Gets the value for intStatus 
					// @return integer
					return $this->intStatus;

				case 'CostPerUnit':
					// Gets the value for intCostPerUnit 
					// @return integer
					return $this->intCostPerUnit;

				case 'FashionPartnerId':
					// Gets the value for intFashionPartnerId 
					// @return integer
					return $this->intFashionPartnerId;

				case 'DateDonated':
					// Gets the value for dttDateDonated 
					// @return QDateTime
					return $this->dttDateDonated;

				case 'QuantityRemaining':
					// Gets the value for intQuantityRemaining 
					// @return integer
					return $this->intQuantityRemaining;


				///////////////////
				// Member Objects
				///////////////////
				case 'Size':
					// Gets the value for the Size object referenced by intSizeId 
					// @return Size
					try {
						if ((!$this->objSize) && (!is_null($this->intSizeId)))
							$this->objSize = Size::Load($this->intSizeId);
						return $this->objSize;
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'StatusObject':
					// Gets the value for the DonationStatus object referenced by intStatus 
					// @return DonationStatus
					try {
						if ((!$this->objStatusObject) && (!is_null($this->intStatus)))
							$this->objStatusObject = DonationStatus::Load($this->intStatus);
						return $this->objStatusObject;
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'FashionPartner':
					// Gets the value for the FashionPartner object referenced by intFashionPartnerId 
					// @return FashionPartner
					try {
						if ((!$this->objFashionPartner) && (!is_null($this->intFashionPartnerId)))
							$this->objFashionPartner = FashionPartner::Load($this->intFashionPartnerId);
						return $this->objFashionPartner;
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}


				////////////////////////////
				// Virtual Object References (Many to Many and Reverse References)
				// (If restored via a "Many-to" expansion)
				////////////////////////////

				case '_Transaction':
					// Gets the value for the private _objTransaction (Read-Only)
					// if set due to an expansion on the transaction.donation_id reverse relationship
					// @return Transaction
					return $this->_objTransaction;

				case '_TransactionArray':
					// Gets the value for the private _objTransactionArray (Read-Only)
					// if set due to an ExpandAsArray on the transaction.donation_id reverse relationship
					// @return Transaction[]
					return (array) $this->_objTransactionArray;


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

				case 'QuantityGiven':
					// Sets the value for intQuantityGiven 
					// @param integer $mixValue
					// @return integer
					try {
						return ($this->intQuantityGiven = QType::Cast($mixValue, QType::Integer));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'UnitTypeId':
					// Sets the value for intUnitTypeId 
					// @param integer $mixValue
					// @return integer
					try {
						return ($this->intUnitTypeId = QType::Cast($mixValue, QType::Integer));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'SizeId':
					// Sets the value for intSizeId 
					// @param integer $mixValue
					// @return integer
					try {
						$this->objSize = null;
						return ($this->intSizeId = QType::Cast($mixValue, QType::Integer));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'Status':
					// Sets the value for intStatus 
					// @param integer $mixValue
					// @return integer
					try {
						$this->objStatusObject = null;
						return ($this->intStatus = QType::Cast($mixValue, QType::Integer));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'CostPerUnit':
					// Sets the value for intCostPerUnit 
					// @param integer $mixValue
					// @return integer
					try {
						return ($this->intCostPerUnit = QType::Cast($mixValue, QType::Integer));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'FashionPartnerId':
					// Sets the value for intFashionPartnerId 
					// @param integer $mixValue
					// @return integer
					try {
						$this->objFashionPartner = null;
						return ($this->intFashionPartnerId = QType::Cast($mixValue, QType::Integer));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'DateDonated':
					// Sets the value for dttDateDonated 
					// @param QDateTime $mixValue
					// @return QDateTime
					try {
						return ($this->dttDateDonated = QType::Cast($mixValue, QType::DateTime));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'QuantityRemaining':
					// Sets the value for intQuantityRemaining 
					// @param integer $mixValue
					// @return integer
					try {
						return ($this->intQuantityRemaining = QType::Cast($mixValue, QType::Integer));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}


				///////////////////
				// Member Objects
				///////////////////
				case 'Size':
					// Sets the value for the Size object referenced by intSizeId 
					// @param Size $mixValue
					// @return Size
					if (is_null($mixValue)) {
						$this->intSizeId = null;
						$this->objSize = null;
						return null;
					} else {
						// Make sure $mixValue actually is a Size object
						try {
							$mixValue = QType::Cast($mixValue, 'Size');
						} catch (QInvalidCastException $objExc) {
							$objExc->IncrementOffset();
							throw $objExc;
						} 

						// Make sure $mixValue is a SAVED Size object
						if (is_null($mixValue->Id))
							throw new QCallerException('Unable to set an unsaved Size for this Donation');

						// Update Local Member Variables
						$this->objSize = $mixValue;
						$this->intSizeId = $mixValue->Id;

						// Return $mixValue
						return $mixValue;
					}
					break;

				case 'StatusObject':
					// Sets the value for the DonationStatus object referenced by intStatus 
					// @param DonationStatus $mixValue
					// @return DonationStatus
					if (is_null($mixValue)) {
						$this->intStatus = null;
						$this->objStatusObject = null;
						return null;
					} else {
						// Make sure $mixValue actually is a DonationStatus object
						try {
							$mixValue = QType::Cast($mixValue, 'DonationStatus');
						} catch (QInvalidCastException $objExc) {
							$objExc->IncrementOffset();
							throw $objExc;
						} 

						// Make sure $mixValue is a SAVED DonationStatus object
						if (is_null($mixValue->Id))
							throw new QCallerException('Unable to set an unsaved StatusObject for this Donation');

						// Update Local Member Variables
						$this->objStatusObject = $mixValue;
						$this->intStatus = $mixValue->Id;

						// Return $mixValue
						return $mixValue;
					}
					break;

				case 'FashionPartner':
					// Sets the value for the FashionPartner object referenced by intFashionPartnerId 
					// @param FashionPartner $mixValue
					// @return FashionPartner
					if (is_null($mixValue)) {
						$this->intFashionPartnerId = null;
						$this->objFashionPartner = null;
						return null;
					} else {
						// Make sure $mixValue actually is a FashionPartner object
						try {
							$mixValue = QType::Cast($mixValue, 'FashionPartner');
						} catch (QInvalidCastException $objExc) {
							$objExc->IncrementOffset();
							throw $objExc;
						} 

						// Make sure $mixValue is a SAVED FashionPartner object
						if (is_null($mixValue->Id))
							throw new QCallerException('Unable to set an unsaved FashionPartner for this Donation');

						// Update Local Member Variables
						$this->objFashionPartner = $mixValue;
						$this->intFashionPartnerId = $mixValue->Id;

						// Return $mixValue
						return $mixValue;
					}
					break;

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

			
		
		// Related Objects' Methods for Transaction
		//-------------------------------------------------------------------

		/**
		 * Gets all associated Transactions as an array of Transaction objects
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return Transaction[]
		*/ 
		public function GetTransactionArray($objOptionalClauses = null) {
			if ((is_null($this->intId)))
				return array();

			try {
				return Transaction::LoadArrayByDonationId($this->intId, $objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Counts all associated Transactions
		 * @return int
		*/ 
		public function CountTransactions() {
			if ((is_null($this->intId)))
				return 0;

			return Transaction::CountByDonationId($this->intId);
		}

		/**
		 * Associates a Transaction
		 * @param Transaction $objTransaction
		 * @return void
		*/ 
		public function AssociateTransaction(Transaction $objTransaction) {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call AssociateTransaction on this unsaved Donation.');
			if ((is_null($objTransaction->Id)))
				throw new QUndefinedPrimaryKeyException('Unable to call AssociateTransaction on this Donation with an unsaved Transaction.');

			// Get the Database Object for this Class
			$objDatabase = Donation::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`transaction`
				SET
					`donation_id` = ' . $objDatabase->SqlVariable($this->intId) . '
				WHERE
					`id` = ' . $objDatabase->SqlVariable($objTransaction->Id) . '
			');

			// Journaling (if applicable)
			if ($objDatabase->JournalingDatabase) {
				$objTransaction->DonationId = $this->intId;
				$objTransaction->Journal('UPDATE');
			}
		}

		/**
		 * Unassociates a Transaction
		 * @param Transaction $objTransaction
		 * @return void
		*/ 
		public function UnassociateTransaction(Transaction $objTransaction) {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateTransaction on this unsaved Donation.');
			if ((is_null($objTransaction->Id)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateTransaction on this Donation with an unsaved Transaction.');

			// Get the Database Object for this Class
			$objDatabase = Donation::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`transaction`
				SET
					`donation_id` = null
				WHERE
					`id` = ' . $objDatabase->SqlVariable($objTransaction->Id) . ' AND
					`donation_id` = ' . $objDatabase->SqlVariable($this->intId) . '
			');

			// Journaling
			if ($objDatabase->JournalingDatabase) {
				$objTransaction->DonationId = null;
				$objTransaction->Journal('UPDATE');
			}
		}

		/**
		 * Unassociates all Transactions
		 * @return void
		*/ 
		public function UnassociateAllTransactions() {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateTransaction on this unsaved Donation.');

			// Get the Database Object for this Class
			$objDatabase = Donation::GetDatabase();

			// Journaling
			if ($objDatabase->JournalingDatabase) {
				foreach (Transaction::LoadArrayByDonationId($this->intId) as $objTransaction) {
					$objTransaction->DonationId = null;
					$objTransaction->Journal('UPDATE');
				}
			}

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`transaction`
				SET
					`donation_id` = null
				WHERE
					`donation_id` = ' . $objDatabase->SqlVariable($this->intId) . '
			');
		}

		/**
		 * Deletes an associated Transaction
		 * @param Transaction $objTransaction
		 * @return void
		*/ 
		public function DeleteAssociatedTransaction(Transaction $objTransaction) {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateTransaction on this unsaved Donation.');
			if ((is_null($objTransaction->Id)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateTransaction on this Donation with an unsaved Transaction.');

			// Get the Database Object for this Class
			$objDatabase = Donation::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`transaction`
				WHERE
					`id` = ' . $objDatabase->SqlVariable($objTransaction->Id) . ' AND
					`donation_id` = ' . $objDatabase->SqlVariable($this->intId) . '
			');

			// Journaling
			if ($objDatabase->JournalingDatabase) {
				$objTransaction->Journal('DELETE');
			}
		}

		/**
		 * Deletes all associated Transactions
		 * @return void
		*/ 
		public function DeleteAllTransactions() {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateTransaction on this unsaved Donation.');

			// Get the Database Object for this Class
			$objDatabase = Donation::GetDatabase();

			// Journaling
			if ($objDatabase->JournalingDatabase) {
				foreach (Transaction::LoadArrayByDonationId($this->intId) as $objTransaction) {
					$objTransaction->Journal('DELETE');
				}
			}

			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`transaction`
				WHERE
					`donation_id` = ' . $objDatabase->SqlVariable($this->intId) . '
			');
		}





		////////////////////////////////////////
		// METHODS for SOAP-BASED WEB SERVICES
		////////////////////////////////////////

		public static function GetSoapComplexTypeXml() {
			$strToReturn = '<complexType name="Donation"><sequence>';
			$strToReturn .= '<element name="Id" type="xsd:int"/>';
			$strToReturn .= '<element name="Description" type="xsd:string"/>';
			$strToReturn .= '<element name="QuantityGiven" type="xsd:int"/>';
			$strToReturn .= '<element name="UnitTypeId" type="xsd:int"/>';
			$strToReturn .= '<element name="Size" type="xsd1:Size"/>';
			$strToReturn .= '<element name="StatusObject" type="xsd1:DonationStatus"/>';
			$strToReturn .= '<element name="CostPerUnit" type="xsd:int"/>';
			$strToReturn .= '<element name="FashionPartner" type="xsd1:FashionPartner"/>';
			$strToReturn .= '<element name="DateDonated" type="xsd:dateTime"/>';
			$strToReturn .= '<element name="QuantityRemaining" type="xsd:int"/>';
			$strToReturn .= '<element name="__blnRestored" type="xsd:boolean"/>';
			$strToReturn .= '</sequence></complexType>';
			return $strToReturn;
		}

		public static function AlterSoapComplexTypeArray(&$strComplexTypeArray) {
			if (!array_key_exists('Donation', $strComplexTypeArray)) {
				$strComplexTypeArray['Donation'] = Donation::GetSoapComplexTypeXml();
				Size::AlterSoapComplexTypeArray($strComplexTypeArray);
				DonationStatus::AlterSoapComplexTypeArray($strComplexTypeArray);
				FashionPartner::AlterSoapComplexTypeArray($strComplexTypeArray);
			}
		}

		public static function GetArrayFromSoapArray($objSoapArray) {
			$objArrayToReturn = array();

			foreach ($objSoapArray as $objSoapObject)
				array_push($objArrayToReturn, Donation::GetObjectFromSoapObject($objSoapObject));

			return $objArrayToReturn;
		}

		public static function GetObjectFromSoapObject($objSoapObject) {
			$objToReturn = new Donation();
			if (property_exists($objSoapObject, 'Id'))
				$objToReturn->intId = $objSoapObject->Id;
			if (property_exists($objSoapObject, 'Description'))
				$objToReturn->strDescription = $objSoapObject->Description;
			if (property_exists($objSoapObject, 'QuantityGiven'))
				$objToReturn->intQuantityGiven = $objSoapObject->QuantityGiven;
			if (property_exists($objSoapObject, 'UnitTypeId'))
				$objToReturn->intUnitTypeId = $objSoapObject->UnitTypeId;
			if ((property_exists($objSoapObject, 'Size')) &&
				($objSoapObject->Size))
				$objToReturn->Size = Size::GetObjectFromSoapObject($objSoapObject->Size);
			if ((property_exists($objSoapObject, 'StatusObject')) &&
				($objSoapObject->StatusObject))
				$objToReturn->StatusObject = DonationStatus::GetObjectFromSoapObject($objSoapObject->StatusObject);
			if (property_exists($objSoapObject, 'CostPerUnit'))
				$objToReturn->intCostPerUnit = $objSoapObject->CostPerUnit;
			if ((property_exists($objSoapObject, 'FashionPartner')) &&
				($objSoapObject->FashionPartner))
				$objToReturn->FashionPartner = FashionPartner::GetObjectFromSoapObject($objSoapObject->FashionPartner);
			if (property_exists($objSoapObject, 'DateDonated'))
				$objToReturn->dttDateDonated = new QDateTime($objSoapObject->DateDonated);
			if (property_exists($objSoapObject, 'QuantityRemaining'))
				$objToReturn->intQuantityRemaining = $objSoapObject->QuantityRemaining;
			if (property_exists($objSoapObject, '__blnRestored'))
				$objToReturn->__blnRestored = $objSoapObject->__blnRestored;
			return $objToReturn;
		}

		public static function GetSoapArrayFromArray($objArray) {
			if (!$objArray)
				return null;

			$objArrayToReturn = array();

			foreach ($objArray as $objObject)
				array_push($objArrayToReturn, Donation::GetSoapObjectFromObject($objObject, true));

			return unserialize(serialize($objArrayToReturn));
		}

		public static function GetSoapObjectFromObject($objObject, $blnBindRelatedObjects) {
			if ($objObject->objSize)
				$objObject->objSize = Size::GetSoapObjectFromObject($objObject->objSize, false);
			else if (!$blnBindRelatedObjects)
				$objObject->intSizeId = null;
			if ($objObject->objStatusObject)
				$objObject->objStatusObject = DonationStatus::GetSoapObjectFromObject($objObject->objStatusObject, false);
			else if (!$blnBindRelatedObjects)
				$objObject->intStatus = null;
			if ($objObject->objFashionPartner)
				$objObject->objFashionPartner = FashionPartner::GetSoapObjectFromObject($objObject->objFashionPartner, false);
			else if (!$blnBindRelatedObjects)
				$objObject->intFashionPartnerId = null;
			if ($objObject->dttDateDonated)
				$objObject->dttDateDonated = $objObject->dttDateDonated->__toString(QDateTime::FormatSoap);
			return $objObject;
		}




	}



	/////////////////////////////////////
	// ADDITIONAL CLASSES for QCODO QUERY
	/////////////////////////////////////

	/**
	 * @property-read QQNode $Id
	 * @property-read QQNode $Description
	 * @property-read QQNode $QuantityGiven
	 * @property-read QQNode $UnitTypeId
	 * @property-read QQNode $SizeId
	 * @property-read QQNodeSize $Size
	 * @property-read QQNode $Status
	 * @property-read QQNodeDonationStatus $StatusObject
	 * @property-read QQNode $CostPerUnit
	 * @property-read QQNode $FashionPartnerId
	 * @property-read QQNodeFashionPartner $FashionPartner
	 * @property-read QQNode $DateDonated
	 * @property-read QQNode $QuantityRemaining
	 * @property-read QQReverseReferenceNodeTransaction $Transaction
	 */
	class QQNodeDonation extends QQNode {
		protected $strTableName = 'donation';
		protected $strPrimaryKey = 'id';
		protected $strClassName = 'Donation';
		public function __get($strName) {
			switch ($strName) {
				case 'Id':
					return new QQNode('id', 'Id', 'integer', $this);
				case 'Description':
					return new QQNode('description', 'Description', 'string', $this);
				case 'QuantityGiven':
					return new QQNode('quantity_given', 'QuantityGiven', 'integer', $this);
				case 'UnitTypeId':
					return new QQNode('unit_type_id', 'UnitTypeId', 'integer', $this);
				case 'SizeId':
					return new QQNode('size_id', 'SizeId', 'integer', $this);
				case 'Size':
					return new QQNodeSize('size_id', 'Size', 'integer', $this);
				case 'Status':
					return new QQNode('status', 'Status', 'integer', $this);
				case 'StatusObject':
					return new QQNodeDonationStatus('status', 'StatusObject', 'integer', $this);
				case 'CostPerUnit':
					return new QQNode('cost_per_unit', 'CostPerUnit', 'integer', $this);
				case 'FashionPartnerId':
					return new QQNode('fashion_partner_id', 'FashionPartnerId', 'integer', $this);
				case 'FashionPartner':
					return new QQNodeFashionPartner('fashion_partner_id', 'FashionPartner', 'integer', $this);
				case 'DateDonated':
					return new QQNode('date_donated', 'DateDonated', 'QDateTime', $this);
				case 'QuantityRemaining':
					return new QQNode('quantity_remaining', 'QuantityRemaining', 'integer', $this);
				case 'Transaction':
					return new QQReverseReferenceNodeTransaction($this, 'transaction', 'reverse_reference', 'donation_id');

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
	 * @property-read QQNode $Description
	 * @property-read QQNode $QuantityGiven
	 * @property-read QQNode $UnitTypeId
	 * @property-read QQNode $SizeId
	 * @property-read QQNodeSize $Size
	 * @property-read QQNode $Status
	 * @property-read QQNodeDonationStatus $StatusObject
	 * @property-read QQNode $CostPerUnit
	 * @property-read QQNode $FashionPartnerId
	 * @property-read QQNodeFashionPartner $FashionPartner
	 * @property-read QQNode $DateDonated
	 * @property-read QQNode $QuantityRemaining
	 * @property-read QQReverseReferenceNodeTransaction $Transaction
	 * @property-read QQNode $_PrimaryKeyNode
	 */
	class QQReverseReferenceNodeDonation extends QQReverseReferenceNode {
		protected $strTableName = 'donation';
		protected $strPrimaryKey = 'id';
		protected $strClassName = 'Donation';
		public function __get($strName) {
			switch ($strName) {
				case 'Id':
					return new QQNode('id', 'Id', 'integer', $this);
				case 'Description':
					return new QQNode('description', 'Description', 'string', $this);
				case 'QuantityGiven':
					return new QQNode('quantity_given', 'QuantityGiven', 'integer', $this);
				case 'UnitTypeId':
					return new QQNode('unit_type_id', 'UnitTypeId', 'integer', $this);
				case 'SizeId':
					return new QQNode('size_id', 'SizeId', 'integer', $this);
				case 'Size':
					return new QQNodeSize('size_id', 'Size', 'integer', $this);
				case 'Status':
					return new QQNode('status', 'Status', 'integer', $this);
				case 'StatusObject':
					return new QQNodeDonationStatus('status', 'StatusObject', 'integer', $this);
				case 'CostPerUnit':
					return new QQNode('cost_per_unit', 'CostPerUnit', 'integer', $this);
				case 'FashionPartnerId':
					return new QQNode('fashion_partner_id', 'FashionPartnerId', 'integer', $this);
				case 'FashionPartner':
					return new QQNodeFashionPartner('fashion_partner_id', 'FashionPartner', 'integer', $this);
				case 'DateDonated':
					return new QQNode('date_donated', 'DateDonated', 'QDateTime', $this);
				case 'QuantityRemaining':
					return new QQNode('quantity_remaining', 'QuantityRemaining', 'integer', $this);
				case 'Transaction':
					return new QQReverseReferenceNodeTransaction($this, 'transaction', 'reverse_reference', 'donation_id');

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