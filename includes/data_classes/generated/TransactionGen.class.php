<?php
	/**
	 * The abstract TransactionGen class defined here is
	 * code-generated and contains all the basic CRUD-type functionality as well as
	 * basic methods to handle relationships and index-based loading.
	 *
	 * To use, you should use the Transaction subclass which
	 * extends this TransactionGen class.
	 *
	 * Because subsequent re-code generations will overwrite any changes to this
	 * file, you should leave this file unaltered to prevent yourself from losing
	 * any information or code changes.  All customizations should be done by
	 * overriding existing or implementing new methods, properties and variables
	 * in the Transaction class.
	 * 
	 * @package My Application
	 * @subpackage GeneratedDataObjects
	 * @property integer $Id the value for intId (Read-Only PK)
	 * @property integer $DonationId the value for intDonationId 
	 * @property integer $NeedId the value for intNeedId 
	 * @property QDateTime $DateInitiated the value for dttDateInitiated 
	 * @property integer $NumberOfUnits the value for intNumberOfUnits 
	 * @property Donation $Donation the value for the Donation object referenced by intDonationId 
	 * @property Need $Need the value for the Need object referenced by intNeedId 
	 * @property boolean $__Restored whether or not this object was restored from the database (as opposed to created new)
	 */
	class TransactionGen extends QBaseClass {

		///////////////////////////////////////////////////////////////////////
		// PROTECTED MEMBER VARIABLES and TEXT FIELD MAXLENGTHS (if applicable)
		///////////////////////////////////////////////////////////////////////
		
		/**
		 * Protected member variable that maps to the database PK Identity column transaction.id
		 * @var integer intId
		 */
		protected $intId;
		const IdDefault = null;


		/**
		 * Protected member variable that maps to the database column transaction.donation_id
		 * @var integer intDonationId
		 */
		protected $intDonationId;
		const DonationIdDefault = null;


		/**
		 * Protected member variable that maps to the database column transaction.need_id
		 * @var integer intNeedId
		 */
		protected $intNeedId;
		const NeedIdDefault = null;


		/**
		 * Protected member variable that maps to the database column transaction.date_initiated
		 * @var QDateTime dttDateInitiated
		 */
		protected $dttDateInitiated;
		const DateInitiatedDefault = null;


		/**
		 * Protected member variable that maps to the database column transaction.number_of_units
		 * @var integer intNumberOfUnits
		 */
		protected $intNumberOfUnits;
		const NumberOfUnitsDefault = null;


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
		 * in the database column transaction.donation_id.
		 *
		 * NOTE: Always use the Donation property getter to correctly retrieve this Donation object.
		 * (Because this class implements late binding, this variable reference MAY be null.)
		 * @var Donation objDonation
		 */
		protected $objDonation;

		/**
		 * Protected member variable that contains the object pointed by the reference
		 * in the database column transaction.need_id.
		 *
		 * NOTE: Always use the Need property getter to correctly retrieve this Need object.
		 * (Because this class implements late binding, this variable reference MAY be null.)
		 * @var Need objNeed
		 */
		protected $objNeed;





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
		 * Load a Transaction from PK Info
		 * @param integer $intId
		 * @return Transaction
		 */
		public static function Load($intId) {
			// Use QuerySingle to Perform the Query
			return Transaction::QuerySingle(
				QQ::Equal(QQN::Transaction()->Id, $intId)
			);
		}

		/**
		 * Load all Transactions
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return Transaction[]
		 */
		public static function LoadAll($objOptionalClauses = null) {
			// Call Transaction::QueryArray to perform the LoadAll query
			try {
				return Transaction::QueryArray(QQ::All(), $objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Count all Transactions
		 * @return int
		 */
		public static function CountAll() {
			// Call Transaction::QueryCount to perform the CountAll query
			return Transaction::QueryCount(QQ::All());
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
			$objDatabase = Transaction::GetDatabase();

			// Create/Build out the QueryBuilder object with Transaction-specific SELET and FROM fields
			$objQueryBuilder = new QQueryBuilder($objDatabase, 'transaction');
			Transaction::GetSelectFields($objQueryBuilder);
			$objQueryBuilder->AddFromItem('transaction');

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
		 * Static Qcodo Query method to query for a single Transaction object.
		 * Uses BuildQueryStatment to perform most of the work.
		 * @param QQCondition $objConditions any conditions on the query, itself
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @param mixed[] $mixParameterArray a array of name-value pairs to perform PrepareStatement with
		 * @return Transaction the queried object
		 */
		public static function QuerySingle(QQCondition $objConditions, $objOptionalClauses = null, $mixParameterArray = null) {
			// Get the Query Statement
			try {
				$strQuery = Transaction::BuildQueryStatement($objQueryBuilder, $objConditions, $objOptionalClauses, $mixParameterArray, false);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}

			// Perform the Query
			$objDbResult = $objQueryBuilder->Database->Query($strQuery);

			// Instantiate a new Transaction object and return it

			// Do we have to expand anything?
			if ($objQueryBuilder->ExpandAsArrayNodes) {
				$objToReturn = array();
				while ($objDbRow = $objDbResult->GetNextRow()) {
					$objItem = Transaction::InstantiateDbRow($objDbRow, null, $objQueryBuilder->ExpandAsArrayNodes, $objToReturn, $objQueryBuilder->ColumnAliasArray);
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
				return Transaction::InstantiateDbRow($objDbRow, null, null, null, $objQueryBuilder->ColumnAliasArray);
			}
		}

		/**
		 * Static Qcodo Query method to query for an array of Transaction objects.
		 * Uses BuildQueryStatment to perform most of the work.
		 * @param QQCondition $objConditions any conditions on the query, itself
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @param mixed[] $mixParameterArray a array of name-value pairs to perform PrepareStatement with
		 * @return Transaction[] the queried objects as an array
		 */
		public static function QueryArray(QQCondition $objConditions, $objOptionalClauses = null, $mixParameterArray = null) {
			// Get the Query Statement
			try {
				$strQuery = Transaction::BuildQueryStatement($objQueryBuilder, $objConditions, $objOptionalClauses, $mixParameterArray, false);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}

			// Perform the Query and Instantiate the Array Result
			$objDbResult = $objQueryBuilder->Database->Query($strQuery);
			return Transaction::InstantiateDbResult($objDbResult, $objQueryBuilder->ExpandAsArrayNodes, $objQueryBuilder->ColumnAliasArray);
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
				$strQuery = Transaction::BuildQueryStatement($objQueryBuilder, $objConditions, $objOptionalClauses, $mixParameterArray, false);
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
		 * Static Qcodo Query method to query for a count of Transaction objects.
		 * Uses BuildQueryStatment to perform most of the work.
		 * @param QQCondition $objConditions any conditions on the query, itself
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @param mixed[] $mixParameterArray a array of name-value pairs to perform PrepareStatement with
		 * @return integer the count of queried objects as an integer
		 */
		public static function QueryCount(QQCondition $objConditions, $objOptionalClauses = null, $mixParameterArray = null) {
			// Get the Query Statement
			try {
				$strQuery = Transaction::BuildQueryStatement($objQueryBuilder, $objConditions, $objOptionalClauses, $mixParameterArray, true);
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
			$objDatabase = Transaction::GetDatabase();

			// Lookup the QCache for This Query Statement
			$objCache = new QCache('query', 'transaction_' . serialize($strConditions));
			if (!($strQuery = $objCache->GetData())) {
				// Not Found -- Go ahead and Create/Build out a new QueryBuilder object with Transaction-specific fields
				$objQueryBuilder = new QQueryBuilder($objDatabase);
				Transaction::GetSelectFields($objQueryBuilder);
				Transaction::GetFromFields($objQueryBuilder);

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
			return Transaction::InstantiateDbResult($objDbResult);
		}*/

		/**
		 * Updates a QQueryBuilder with the SELECT fields for this Transaction
		 * @param QQueryBuilder $objBuilder the Query Builder object to update
		 * @param string $strPrefix optional prefix to add to the SELECT fields
		 */
		public static function GetSelectFields(QQueryBuilder $objBuilder, $strPrefix = null) {
			if ($strPrefix) {
				$strTableName = $strPrefix;
				$strAliasPrefix = $strPrefix . '__';
			} else {
				$strTableName = 'transaction';
				$strAliasPrefix = '';
			}

			$objBuilder->AddSelectItem($strTableName, 'id', $strAliasPrefix . 'id');
			$objBuilder->AddSelectItem($strTableName, 'donation_id', $strAliasPrefix . 'donation_id');
			$objBuilder->AddSelectItem($strTableName, 'need_id', $strAliasPrefix . 'need_id');
			$objBuilder->AddSelectItem($strTableName, 'date_initiated', $strAliasPrefix . 'date_initiated');
			$objBuilder->AddSelectItem($strTableName, 'number_of_units', $strAliasPrefix . 'number_of_units');
		}




		///////////////////////////////
		// INSTANTIATION-RELATED METHODS
		///////////////////////////////

		/**
		 * Instantiate a Transaction from a Database Row.
		 * Takes in an optional strAliasPrefix, used in case another Object::InstantiateDbRow
		 * is calling this Transaction::InstantiateDbRow in order to perform
		 * early binding on referenced objects.
		 * @param QDatabaseRowBase $objDbRow
		 * @param string $strAliasPrefix
		 * @param string $strExpandAsArrayNodes
		 * @param QBaseClass $objPreviousItem
		 * @param string[] $strColumnAliasArray
		 * @return Transaction
		*/
		public static function InstantiateDbRow($objDbRow, $strAliasPrefix = null, $strExpandAsArrayNodes = null, $objPreviousItem = null, $strColumnAliasArray = array()) {
			// If blank row, return null
			if (!$objDbRow)
				return null;


			// Create a new instance of the Transaction object
			$objToReturn = new Transaction();
			$objToReturn->__blnRestored = true;

			$strAliasName = array_key_exists($strAliasPrefix . 'id', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'id'] : $strAliasPrefix . 'id';
			$objToReturn->intId = $objDbRow->GetColumn($strAliasName, 'Integer');
			$strAliasName = array_key_exists($strAliasPrefix . 'donation_id', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'donation_id'] : $strAliasPrefix . 'donation_id';
			$objToReturn->intDonationId = $objDbRow->GetColumn($strAliasName, 'Integer');
			$strAliasName = array_key_exists($strAliasPrefix . 'need_id', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'need_id'] : $strAliasPrefix . 'need_id';
			$objToReturn->intNeedId = $objDbRow->GetColumn($strAliasName, 'Integer');
			$strAliasName = array_key_exists($strAliasPrefix . 'date_initiated', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'date_initiated'] : $strAliasPrefix . 'date_initiated';
			$objToReturn->dttDateInitiated = $objDbRow->GetColumn($strAliasName, 'Date');
			$strAliasName = array_key_exists($strAliasPrefix . 'number_of_units', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'number_of_units'] : $strAliasPrefix . 'number_of_units';
			$objToReturn->intNumberOfUnits = $objDbRow->GetColumn($strAliasName, 'Integer');

			// Instantiate Virtual Attributes
			foreach ($objDbRow->GetColumnNameArray() as $strColumnName => $mixValue) {
				$strVirtualPrefix = $strAliasPrefix . '__';
				$strVirtualPrefixLength = strlen($strVirtualPrefix);
				if (substr($strColumnName, 0, $strVirtualPrefixLength) == $strVirtualPrefix)
					$objToReturn->__strVirtualAttributeArray[substr($strColumnName, $strVirtualPrefixLength)] = $mixValue;
			}

			// Prepare to Check for Early/Virtual Binding
			if (!$strAliasPrefix)
				$strAliasPrefix = 'transaction__';

			// Check for Donation Early Binding
			$strAlias = $strAliasPrefix . 'donation_id__id';
			$strAliasName = array_key_exists($strAlias, $strColumnAliasArray) ? $strColumnAliasArray[$strAlias] : $strAlias;
			if (!is_null($objDbRow->GetColumn($strAliasName)))
				$objToReturn->objDonation = Donation::InstantiateDbRow($objDbRow, $strAliasPrefix . 'donation_id__', $strExpandAsArrayNodes, null, $strColumnAliasArray);

			// Check for Need Early Binding
			$strAlias = $strAliasPrefix . 'need_id__id';
			$strAliasName = array_key_exists($strAlias, $strColumnAliasArray) ? $strColumnAliasArray[$strAlias] : $strAlias;
			if (!is_null($objDbRow->GetColumn($strAliasName)))
				$objToReturn->objNeed = Need::InstantiateDbRow($objDbRow, $strAliasPrefix . 'need_id__', $strExpandAsArrayNodes, null, $strColumnAliasArray);




			return $objToReturn;
		}

		/**
		 * Instantiate an array of Transactions from a Database Result
		 * @param QDatabaseResultBase $objDbResult
		 * @param string $strExpandAsArrayNodes
		 * @param string[] $strColumnAliasArray
		 * @return Transaction[]
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
					$objItem = Transaction::InstantiateDbRow($objDbRow, null, $strExpandAsArrayNodes, $objLastRowItem, $strColumnAliasArray);
					if ($objItem) {
						$objToReturn[] = $objItem;
						$objLastRowItem = $objItem;
					}
				}
			} else {
				while ($objDbRow = $objDbResult->GetNextRow())
					$objToReturn[] = Transaction::InstantiateDbRow($objDbRow, null, null, null, $strColumnAliasArray);
			}

			return $objToReturn;
		}

		/**
		 * Instantiate a single Transaction object from a query cursor (e.g. a DB ResultSet).
		 * Cursor is automatically moved to the "next row" of the result set.
		 * Will return NULL if no cursor or if the cursor has no more rows in the resultset.
		 * @param QDatabaseResultBase $objDbResult cursor resource
		 * @return Transaction next row resulting from the query
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
			return Transaction::InstantiateDbRow($objDbRow, null, $strExpandAsArrayNodes, null, $strColumnAliasArray);
		}




		///////////////////////////////////////////////////
		// INDEX-BASED LOAD METHODS (Single Load and Array)
		///////////////////////////////////////////////////
			
		/**
		 * Load a single Transaction object,
		 * by Id Index(es)
		 * @param integer $intId
		 * @return Transaction
		*/
		public static function LoadById($intId, $objOptionalClauses = null) {
			return Transaction::QuerySingle(
				QQ::Equal(QQN::Transaction()->Id, $intId)
			, $objOptionalClauses
			);
		}
			
		/**
		 * Load an array of Transaction objects,
		 * by DonationId Index(es)
		 * @param integer $intDonationId
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return Transaction[]
		*/
		public static function LoadArrayByDonationId($intDonationId, $objOptionalClauses = null) {
			// Call Transaction::QueryArray to perform the LoadArrayByDonationId query
			try {
				return Transaction::QueryArray(
					QQ::Equal(QQN::Transaction()->DonationId, $intDonationId),
					$objOptionalClauses
					);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Count Transactions
		 * by DonationId Index(es)
		 * @param integer $intDonationId
		 * @return int
		*/
		public static function CountByDonationId($intDonationId, $objOptionalClauses = null) {
			// Call Transaction::QueryCount to perform the CountByDonationId query
			return Transaction::QueryCount(
				QQ::Equal(QQN::Transaction()->DonationId, $intDonationId)
			, $objOptionalClauses
			);
		}
			
		/**
		 * Load an array of Transaction objects,
		 * by NeedId Index(es)
		 * @param integer $intNeedId
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return Transaction[]
		*/
		public static function LoadArrayByNeedId($intNeedId, $objOptionalClauses = null) {
			// Call Transaction::QueryArray to perform the LoadArrayByNeedId query
			try {
				return Transaction::QueryArray(
					QQ::Equal(QQN::Transaction()->NeedId, $intNeedId),
					$objOptionalClauses
					);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Count Transactions
		 * by NeedId Index(es)
		 * @param integer $intNeedId
		 * @return int
		*/
		public static function CountByNeedId($intNeedId, $objOptionalClauses = null) {
			// Call Transaction::QueryCount to perform the CountByNeedId query
			return Transaction::QueryCount(
				QQ::Equal(QQN::Transaction()->NeedId, $intNeedId)
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
		 * Save this Transaction
		 * @param bool $blnForceInsert
		 * @param bool $blnForceUpdate
		 * @return int
		 */
		public function Save($blnForceInsert = false, $blnForceUpdate = false) {
			// Get the Database Object for this Class
			$objDatabase = Transaction::GetDatabase();

			$mixToReturn = null;

			try {
				if ((!$this->__blnRestored) || ($blnForceInsert)) {
					// Perform an INSERT query
					$objDatabase->NonQuery('
						INSERT INTO `transaction` (
							`donation_id`,
							`need_id`,
							`date_initiated`,
							`number_of_units`
						) VALUES (
							' . $objDatabase->SqlVariable($this->intDonationId) . ',
							' . $objDatabase->SqlVariable($this->intNeedId) . ',
							' . $objDatabase->SqlVariable($this->dttDateInitiated) . ',
							' . $objDatabase->SqlVariable($this->intNumberOfUnits) . '
						)
					');

					// Update Identity column and return its value
					$mixToReturn = $this->intId = $objDatabase->InsertId('transaction', 'id');

					// Journaling
					if ($objDatabase->JournalingDatabase) $this->Journal('INSERT');

				} else {
					// Perform an UPDATE query

					// First checking for Optimistic Locking constraints (if applicable)

					// Perform the UPDATE query
					$objDatabase->NonQuery('
						UPDATE
							`transaction`
						SET
							`donation_id` = ' . $objDatabase->SqlVariable($this->intDonationId) . ',
							`need_id` = ' . $objDatabase->SqlVariable($this->intNeedId) . ',
							`date_initiated` = ' . $objDatabase->SqlVariable($this->dttDateInitiated) . ',
							`number_of_units` = ' . $objDatabase->SqlVariable($this->intNumberOfUnits) . '
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
		 * Delete this Transaction
		 * @return void
		 */
		public function Delete() {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Cannot delete this Transaction with an unset primary key.');

			// Get the Database Object for this Class
			$objDatabase = Transaction::GetDatabase();


			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`transaction`
				WHERE
					`id` = ' . $objDatabase->SqlVariable($this->intId) . '');

			// Journaling
			if ($objDatabase->JournalingDatabase) $this->Journal('DELETE');
		}

		/**
		 * Delete all Transactions
		 * @return void
		 */
		public static function DeleteAll() {
			// Get the Database Object for this Class
			$objDatabase = Transaction::GetDatabase();

			// Perform the Query
			$objDatabase->NonQuery('
				DELETE FROM
					`transaction`');
		}

		/**
		 * Truncate transaction table
		 * @return void
		 */
		public static function Truncate() {
			// Get the Database Object for this Class
			$objDatabase = Transaction::GetDatabase();

			// Perform the Query
			$objDatabase->NonQuery('
				TRUNCATE `transaction`');
		}

		/**
		 * Reload this Transaction from the database.
		 * @return void
		 */
		public function Reload() {
			// Make sure we are actually Restored from the database
			if (!$this->__blnRestored)
				throw new QCallerException('Cannot call Reload() on a new, unsaved Transaction object.');

			// Reload the Object
			$objReloaded = Transaction::Load($this->intId);

			// Update $this's local variables to match
			$this->DonationId = $objReloaded->DonationId;
			$this->NeedId = $objReloaded->NeedId;
			$this->dttDateInitiated = $objReloaded->dttDateInitiated;
			$this->intNumberOfUnits = $objReloaded->intNumberOfUnits;
		}

		/**
		 * Journals the current object into the Log database.
		 * Used internally as a helper method.
		 * @param string $strJournalCommand
		 */
		public function Journal($strJournalCommand) {
			$objDatabase = Transaction::GetDatabase()->JournalingDatabase;

			$objDatabase->NonQuery('
				INSERT INTO `transaction` (
					`id`,
					`donation_id`,
					`need_id`,
					`date_initiated`,
					`number_of_units`,
					__sys_login_id,
					__sys_action,
					__sys_date
				) VALUES (
					' . $objDatabase->SqlVariable($this->intId) . ',
					' . $objDatabase->SqlVariable($this->intDonationId) . ',
					' . $objDatabase->SqlVariable($this->intNeedId) . ',
					' . $objDatabase->SqlVariable($this->dttDateInitiated) . ',
					' . $objDatabase->SqlVariable($this->intNumberOfUnits) . ',
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
		 * @return Transaction[]
		 */
		public static function GetJournalForId($intId) {
			$objDatabase = Transaction::GetDatabase()->JournalingDatabase;

			$objResult = $objDatabase->Query('SELECT * FROM transaction WHERE id = ' .
				$objDatabase->SqlVariable($intId) . ' ORDER BY __sys_date');

			return Transaction::InstantiateDbResult($objResult);
		}

		/**
		 * Gets the historical journal for this object from the log database.
		 * Objects will have VirtualAttributes available to lookup login, date, and action information from the journal object.
		 * @return Transaction[]
		 */
		public function GetJournal() {
			return Transaction::GetJournalForId($this->intId);
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

				case 'DonationId':
					// Gets the value for intDonationId 
					// @return integer
					return $this->intDonationId;

				case 'NeedId':
					// Gets the value for intNeedId 
					// @return integer
					return $this->intNeedId;

				case 'DateInitiated':
					// Gets the value for dttDateInitiated 
					// @return QDateTime
					return $this->dttDateInitiated;

				case 'NumberOfUnits':
					// Gets the value for intNumberOfUnits 
					// @return integer
					return $this->intNumberOfUnits;


				///////////////////
				// Member Objects
				///////////////////
				case 'Donation':
					// Gets the value for the Donation object referenced by intDonationId 
					// @return Donation
					try {
						if ((!$this->objDonation) && (!is_null($this->intDonationId)))
							$this->objDonation = Donation::Load($this->intDonationId);
						return $this->objDonation;
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'Need':
					// Gets the value for the Need object referenced by intNeedId 
					// @return Need
					try {
						if ((!$this->objNeed) && (!is_null($this->intNeedId)))
							$this->objNeed = Need::Load($this->intNeedId);
						return $this->objNeed;
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}


				////////////////////////////
				// Virtual Object References (Many to Many and Reverse References)
				// (If restored via a "Many-to" expansion)
				////////////////////////////


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
				case 'DonationId':
					// Sets the value for intDonationId 
					// @param integer $mixValue
					// @return integer
					try {
						$this->objDonation = null;
						return ($this->intDonationId = QType::Cast($mixValue, QType::Integer));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'NeedId':
					// Sets the value for intNeedId 
					// @param integer $mixValue
					// @return integer
					try {
						$this->objNeed = null;
						return ($this->intNeedId = QType::Cast($mixValue, QType::Integer));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'DateInitiated':
					// Sets the value for dttDateInitiated 
					// @param QDateTime $mixValue
					// @return QDateTime
					try {
						return ($this->dttDateInitiated = QType::Cast($mixValue, QType::DateTime));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'NumberOfUnits':
					// Sets the value for intNumberOfUnits 
					// @param integer $mixValue
					// @return integer
					try {
						return ($this->intNumberOfUnits = QType::Cast($mixValue, QType::Integer));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}


				///////////////////
				// Member Objects
				///////////////////
				case 'Donation':
					// Sets the value for the Donation object referenced by intDonationId 
					// @param Donation $mixValue
					// @return Donation
					if (is_null($mixValue)) {
						$this->intDonationId = null;
						$this->objDonation = null;
						return null;
					} else {
						// Make sure $mixValue actually is a Donation object
						try {
							$mixValue = QType::Cast($mixValue, 'Donation');
						} catch (QInvalidCastException $objExc) {
							$objExc->IncrementOffset();
							throw $objExc;
						} 

						// Make sure $mixValue is a SAVED Donation object
						if (is_null($mixValue->Id))
							throw new QCallerException('Unable to set an unsaved Donation for this Transaction');

						// Update Local Member Variables
						$this->objDonation = $mixValue;
						$this->intDonationId = $mixValue->Id;

						// Return $mixValue
						return $mixValue;
					}
					break;

				case 'Need':
					// Sets the value for the Need object referenced by intNeedId 
					// @param Need $mixValue
					// @return Need
					if (is_null($mixValue)) {
						$this->intNeedId = null;
						$this->objNeed = null;
						return null;
					} else {
						// Make sure $mixValue actually is a Need object
						try {
							$mixValue = QType::Cast($mixValue, 'Need');
						} catch (QInvalidCastException $objExc) {
							$objExc->IncrementOffset();
							throw $objExc;
						} 

						// Make sure $mixValue is a SAVED Need object
						if (is_null($mixValue->Id))
							throw new QCallerException('Unable to set an unsaved Need for this Transaction');

						// Update Local Member Variables
						$this->objNeed = $mixValue;
						$this->intNeedId = $mixValue->Id;

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





		////////////////////////////////////////
		// METHODS for SOAP-BASED WEB SERVICES
		////////////////////////////////////////

		public static function GetSoapComplexTypeXml() {
			$strToReturn = '<complexType name="Transaction"><sequence>';
			$strToReturn .= '<element name="Id" type="xsd:int"/>';
			$strToReturn .= '<element name="Donation" type="xsd1:Donation"/>';
			$strToReturn .= '<element name="Need" type="xsd1:Need"/>';
			$strToReturn .= '<element name="DateInitiated" type="xsd:dateTime"/>';
			$strToReturn .= '<element name="NumberOfUnits" type="xsd:int"/>';
			$strToReturn .= '<element name="__blnRestored" type="xsd:boolean"/>';
			$strToReturn .= '</sequence></complexType>';
			return $strToReturn;
		}

		public static function AlterSoapComplexTypeArray(&$strComplexTypeArray) {
			if (!array_key_exists('Transaction', $strComplexTypeArray)) {
				$strComplexTypeArray['Transaction'] = Transaction::GetSoapComplexTypeXml();
				Donation::AlterSoapComplexTypeArray($strComplexTypeArray);
				Need::AlterSoapComplexTypeArray($strComplexTypeArray);
			}
		}

		public static function GetArrayFromSoapArray($objSoapArray) {
			$objArrayToReturn = array();

			foreach ($objSoapArray as $objSoapObject)
				array_push($objArrayToReturn, Transaction::GetObjectFromSoapObject($objSoapObject));

			return $objArrayToReturn;
		}

		public static function GetObjectFromSoapObject($objSoapObject) {
			$objToReturn = new Transaction();
			if (property_exists($objSoapObject, 'Id'))
				$objToReturn->intId = $objSoapObject->Id;
			if ((property_exists($objSoapObject, 'Donation')) &&
				($objSoapObject->Donation))
				$objToReturn->Donation = Donation::GetObjectFromSoapObject($objSoapObject->Donation);
			if ((property_exists($objSoapObject, 'Need')) &&
				($objSoapObject->Need))
				$objToReturn->Need = Need::GetObjectFromSoapObject($objSoapObject->Need);
			if (property_exists($objSoapObject, 'DateInitiated'))
				$objToReturn->dttDateInitiated = new QDateTime($objSoapObject->DateInitiated);
			if (property_exists($objSoapObject, 'NumberOfUnits'))
				$objToReturn->intNumberOfUnits = $objSoapObject->NumberOfUnits;
			if (property_exists($objSoapObject, '__blnRestored'))
				$objToReturn->__blnRestored = $objSoapObject->__blnRestored;
			return $objToReturn;
		}

		public static function GetSoapArrayFromArray($objArray) {
			if (!$objArray)
				return null;

			$objArrayToReturn = array();

			foreach ($objArray as $objObject)
				array_push($objArrayToReturn, Transaction::GetSoapObjectFromObject($objObject, true));

			return unserialize(serialize($objArrayToReturn));
		}

		public static function GetSoapObjectFromObject($objObject, $blnBindRelatedObjects) {
			if ($objObject->objDonation)
				$objObject->objDonation = Donation::GetSoapObjectFromObject($objObject->objDonation, false);
			else if (!$blnBindRelatedObjects)
				$objObject->intDonationId = null;
			if ($objObject->objNeed)
				$objObject->objNeed = Need::GetSoapObjectFromObject($objObject->objNeed, false);
			else if (!$blnBindRelatedObjects)
				$objObject->intNeedId = null;
			if ($objObject->dttDateInitiated)
				$objObject->dttDateInitiated = $objObject->dttDateInitiated->__toString(QDateTime::FormatSoap);
			return $objObject;
		}




	}



	/////////////////////////////////////
	// ADDITIONAL CLASSES for QCODO QUERY
	/////////////////////////////////////

	/**
	 * @property-read QQNode $Id
	 * @property-read QQNode $DonationId
	 * @property-read QQNodeDonation $Donation
	 * @property-read QQNode $NeedId
	 * @property-read QQNodeNeed $Need
	 * @property-read QQNode $DateInitiated
	 * @property-read QQNode $NumberOfUnits
	 */
	class QQNodeTransaction extends QQNode {
		protected $strTableName = 'transaction';
		protected $strPrimaryKey = 'id';
		protected $strClassName = 'Transaction';
		public function __get($strName) {
			switch ($strName) {
				case 'Id':
					return new QQNode('id', 'Id', 'integer', $this);
				case 'DonationId':
					return new QQNode('donation_id', 'DonationId', 'integer', $this);
				case 'Donation':
					return new QQNodeDonation('donation_id', 'Donation', 'integer', $this);
				case 'NeedId':
					return new QQNode('need_id', 'NeedId', 'integer', $this);
				case 'Need':
					return new QQNodeNeed('need_id', 'Need', 'integer', $this);
				case 'DateInitiated':
					return new QQNode('date_initiated', 'DateInitiated', 'QDateTime', $this);
				case 'NumberOfUnits':
					return new QQNode('number_of_units', 'NumberOfUnits', 'integer', $this);

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
	 * @property-read QQNode $DonationId
	 * @property-read QQNodeDonation $Donation
	 * @property-read QQNode $NeedId
	 * @property-read QQNodeNeed $Need
	 * @property-read QQNode $DateInitiated
	 * @property-read QQNode $NumberOfUnits
	 * @property-read QQNode $_PrimaryKeyNode
	 */
	class QQReverseReferenceNodeTransaction extends QQReverseReferenceNode {
		protected $strTableName = 'transaction';
		protected $strPrimaryKey = 'id';
		protected $strClassName = 'Transaction';
		public function __get($strName) {
			switch ($strName) {
				case 'Id':
					return new QQNode('id', 'Id', 'integer', $this);
				case 'DonationId':
					return new QQNode('donation_id', 'DonationId', 'integer', $this);
				case 'Donation':
					return new QQNodeDonation('donation_id', 'Donation', 'integer', $this);
				case 'NeedId':
					return new QQNode('need_id', 'NeedId', 'integer', $this);
				case 'Need':
					return new QQNodeNeed('need_id', 'Need', 'integer', $this);
				case 'DateInitiated':
					return new QQNode('date_initiated', 'DateInitiated', 'QDateTime', $this);
				case 'NumberOfUnits':
					return new QQNode('number_of_units', 'NumberOfUnits', 'integer', $this);

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