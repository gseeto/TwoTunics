<?php
	/**
	 * The abstract NeedGen class defined here is
	 * code-generated and contains all the basic CRUD-type functionality as well as
	 * basic methods to handle relationships and index-based loading.
	 *
	 * To use, you should use the Need subclass which
	 * extends this NeedGen class.
	 *
	 * Because subsequent re-code generations will overwrite any changes to this
	 * file, you should leave this file unaltered to prevent yourself from losing
	 * any information or code changes.  All customizations should be done by
	 * overriding existing or implementing new methods, properties and variables
	 * in the Need class.
	 * 
	 * @package My Application
	 * @subpackage GeneratedDataObjects
	 * @property integer $Id the value for intId (Read-Only PK)
	 * @property string $Description the value for strDescription 
	 * @property integer $QuantityRequested the value for intQuantityRequested 
	 * @property integer $UnitGenreId the value for intUnitGenreId 
	 * @property integer $Size the value for intSize 
	 * @property QDateTime $DateRequested the value for dttDateRequested 
	 * @property integer $CharityId the value for intCharityId 
	 * @property integer $QuantityStillRequired the value for intQuantityStillRequired 
	 * @property UnitGenre $UnitGenre the value for the UnitGenre object referenced by intUnitGenreId 
	 * @property CharityPartner $Charity the value for the CharityPartner object referenced by intCharityId 
	 * @property Transaction $_Transaction the value for the private _objTransaction (Read-Only) if set due to an expansion on the transaction.need_id reverse relationship
	 * @property Transaction[] $_TransactionArray the value for the private _objTransactionArray (Read-Only) if set due to an ExpandAsArray on the transaction.need_id reverse relationship
	 * @property boolean $__Restored whether or not this object was restored from the database (as opposed to created new)
	 */
	class NeedGen extends QBaseClass {

		///////////////////////////////////////////////////////////////////////
		// PROTECTED MEMBER VARIABLES and TEXT FIELD MAXLENGTHS (if applicable)
		///////////////////////////////////////////////////////////////////////
		
		/**
		 * Protected member variable that maps to the database PK Identity column need.id
		 * @var integer intId
		 */
		protected $intId;
		const IdDefault = null;


		/**
		 * Protected member variable that maps to the database column need.description
		 * @var string strDescription
		 */
		protected $strDescription;
		const DescriptionMaxLength = 500;
		const DescriptionDefault = null;


		/**
		 * Protected member variable that maps to the database column need.quantity_requested
		 * @var integer intQuantityRequested
		 */
		protected $intQuantityRequested;
		const QuantityRequestedDefault = null;


		/**
		 * Protected member variable that maps to the database column need.unit_genre_id
		 * @var integer intUnitGenreId
		 */
		protected $intUnitGenreId;
		const UnitGenreIdDefault = null;


		/**
		 * Protected member variable that maps to the database column need.size
		 * @var integer intSize
		 */
		protected $intSize;
		const SizeDefault = null;


		/**
		 * Protected member variable that maps to the database column need.date_requested
		 * @var QDateTime dttDateRequested
		 */
		protected $dttDateRequested;
		const DateRequestedDefault = null;


		/**
		 * Protected member variable that maps to the database column need.charity_id
		 * @var integer intCharityId
		 */
		protected $intCharityId;
		const CharityIdDefault = null;


		/**
		 * Protected member variable that maps to the database column need.quantity_still_required
		 * @var integer intQuantityStillRequired
		 */
		protected $intQuantityStillRequired;
		const QuantityStillRequiredDefault = null;


		/**
		 * Private member variable that stores a reference to a single Transaction object
		 * (of type Transaction), if this Need object was restored with
		 * an expansion on the transaction association table.
		 * @var Transaction _objTransaction;
		 */
		private $_objTransaction;

		/**
		 * Private member variable that stores a reference to an array of Transaction objects
		 * (of type Transaction[]), if this Need object was restored with
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
		 * in the database column need.unit_genre_id.
		 *
		 * NOTE: Always use the UnitGenre property getter to correctly retrieve this UnitGenre object.
		 * (Because this class implements late binding, this variable reference MAY be null.)
		 * @var UnitGenre objUnitGenre
		 */
		protected $objUnitGenre;

		/**
		 * Protected member variable that contains the object pointed by the reference
		 * in the database column need.charity_id.
		 *
		 * NOTE: Always use the Charity property getter to correctly retrieve this CharityPartner object.
		 * (Because this class implements late binding, this variable reference MAY be null.)
		 * @var CharityPartner objCharity
		 */
		protected $objCharity;





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
		 * Load a Need from PK Info
		 * @param integer $intId
		 * @return Need
		 */
		public static function Load($intId) {
			// Use QuerySingle to Perform the Query
			return Need::QuerySingle(
				QQ::Equal(QQN::Need()->Id, $intId)
			);
		}

		/**
		 * Load all Needs
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return Need[]
		 */
		public static function LoadAll($objOptionalClauses = null) {
			// Call Need::QueryArray to perform the LoadAll query
			try {
				return Need::QueryArray(QQ::All(), $objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Count all Needs
		 * @return int
		 */
		public static function CountAll() {
			// Call Need::QueryCount to perform the CountAll query
			return Need::QueryCount(QQ::All());
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
			$objDatabase = Need::GetDatabase();

			// Create/Build out the QueryBuilder object with Need-specific SELET and FROM fields
			$objQueryBuilder = new QQueryBuilder($objDatabase, 'need');
			Need::GetSelectFields($objQueryBuilder);
			$objQueryBuilder->AddFromItem('need');

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
		 * Static Qcodo Query method to query for a single Need object.
		 * Uses BuildQueryStatment to perform most of the work.
		 * @param QQCondition $objConditions any conditions on the query, itself
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @param mixed[] $mixParameterArray a array of name-value pairs to perform PrepareStatement with
		 * @return Need the queried object
		 */
		public static function QuerySingle(QQCondition $objConditions, $objOptionalClauses = null, $mixParameterArray = null) {
			// Get the Query Statement
			try {
				$strQuery = Need::BuildQueryStatement($objQueryBuilder, $objConditions, $objOptionalClauses, $mixParameterArray, false);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}

			// Perform the Query
			$objDbResult = $objQueryBuilder->Database->Query($strQuery);

			// Instantiate a new Need object and return it

			// Do we have to expand anything?
			if ($objQueryBuilder->ExpandAsArrayNodes) {
				$objToReturn = array();
				while ($objDbRow = $objDbResult->GetNextRow()) {
					$objItem = Need::InstantiateDbRow($objDbRow, null, $objQueryBuilder->ExpandAsArrayNodes, $objToReturn, $objQueryBuilder->ColumnAliasArray);
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
				return Need::InstantiateDbRow($objDbRow, null, null, null, $objQueryBuilder->ColumnAliasArray);
			}
		}

		/**
		 * Static Qcodo Query method to query for an array of Need objects.
		 * Uses BuildQueryStatment to perform most of the work.
		 * @param QQCondition $objConditions any conditions on the query, itself
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @param mixed[] $mixParameterArray a array of name-value pairs to perform PrepareStatement with
		 * @return Need[] the queried objects as an array
		 */
		public static function QueryArray(QQCondition $objConditions, $objOptionalClauses = null, $mixParameterArray = null) {
			// Get the Query Statement
			try {
				$strQuery = Need::BuildQueryStatement($objQueryBuilder, $objConditions, $objOptionalClauses, $mixParameterArray, false);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}

			// Perform the Query and Instantiate the Array Result
			$objDbResult = $objQueryBuilder->Database->Query($strQuery);
			return Need::InstantiateDbResult($objDbResult, $objQueryBuilder->ExpandAsArrayNodes, $objQueryBuilder->ColumnAliasArray);
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
				$strQuery = Need::BuildQueryStatement($objQueryBuilder, $objConditions, $objOptionalClauses, $mixParameterArray, false);
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
		 * Static Qcodo Query method to query for a count of Need objects.
		 * Uses BuildQueryStatment to perform most of the work.
		 * @param QQCondition $objConditions any conditions on the query, itself
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @param mixed[] $mixParameterArray a array of name-value pairs to perform PrepareStatement with
		 * @return integer the count of queried objects as an integer
		 */
		public static function QueryCount(QQCondition $objConditions, $objOptionalClauses = null, $mixParameterArray = null) {
			// Get the Query Statement
			try {
				$strQuery = Need::BuildQueryStatement($objQueryBuilder, $objConditions, $objOptionalClauses, $mixParameterArray, true);
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
			$objDatabase = Need::GetDatabase();

			// Lookup the QCache for This Query Statement
			$objCache = new QCache('query', 'need_' . serialize($strConditions));
			if (!($strQuery = $objCache->GetData())) {
				// Not Found -- Go ahead and Create/Build out a new QueryBuilder object with Need-specific fields
				$objQueryBuilder = new QQueryBuilder($objDatabase);
				Need::GetSelectFields($objQueryBuilder);
				Need::GetFromFields($objQueryBuilder);

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
			return Need::InstantiateDbResult($objDbResult);
		}*/

		/**
		 * Updates a QQueryBuilder with the SELECT fields for this Need
		 * @param QQueryBuilder $objBuilder the Query Builder object to update
		 * @param string $strPrefix optional prefix to add to the SELECT fields
		 */
		public static function GetSelectFields(QQueryBuilder $objBuilder, $strPrefix = null) {
			if ($strPrefix) {
				$strTableName = $strPrefix;
				$strAliasPrefix = $strPrefix . '__';
			} else {
				$strTableName = 'need';
				$strAliasPrefix = '';
			}

			$objBuilder->AddSelectItem($strTableName, 'id', $strAliasPrefix . 'id');
			$objBuilder->AddSelectItem($strTableName, 'description', $strAliasPrefix . 'description');
			$objBuilder->AddSelectItem($strTableName, 'quantity_requested', $strAliasPrefix . 'quantity_requested');
			$objBuilder->AddSelectItem($strTableName, 'unit_genre_id', $strAliasPrefix . 'unit_genre_id');
			$objBuilder->AddSelectItem($strTableName, 'size', $strAliasPrefix . 'size');
			$objBuilder->AddSelectItem($strTableName, 'date_requested', $strAliasPrefix . 'date_requested');
			$objBuilder->AddSelectItem($strTableName, 'charity_id', $strAliasPrefix . 'charity_id');
			$objBuilder->AddSelectItem($strTableName, 'quantity_still_required', $strAliasPrefix . 'quantity_still_required');
		}




		///////////////////////////////
		// INSTANTIATION-RELATED METHODS
		///////////////////////////////

		/**
		 * Instantiate a Need from a Database Row.
		 * Takes in an optional strAliasPrefix, used in case another Object::InstantiateDbRow
		 * is calling this Need::InstantiateDbRow in order to perform
		 * early binding on referenced objects.
		 * @param QDatabaseRowBase $objDbRow
		 * @param string $strAliasPrefix
		 * @param string $strExpandAsArrayNodes
		 * @param QBaseClass $objPreviousItem
		 * @param string[] $strColumnAliasArray
		 * @return Need
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
					$strAliasPrefix = 'need__';


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
				else if ($strAliasPrefix == 'need__')
					$strAliasPrefix = null;
			}

			// Create a new instance of the Need object
			$objToReturn = new Need();
			$objToReturn->__blnRestored = true;

			$strAliasName = array_key_exists($strAliasPrefix . 'id', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'id'] : $strAliasPrefix . 'id';
			$objToReturn->intId = $objDbRow->GetColumn($strAliasName, 'Integer');
			$strAliasName = array_key_exists($strAliasPrefix . 'description', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'description'] : $strAliasPrefix . 'description';
			$objToReturn->strDescription = $objDbRow->GetColumn($strAliasName, 'VarChar');
			$strAliasName = array_key_exists($strAliasPrefix . 'quantity_requested', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'quantity_requested'] : $strAliasPrefix . 'quantity_requested';
			$objToReturn->intQuantityRequested = $objDbRow->GetColumn($strAliasName, 'Integer');
			$strAliasName = array_key_exists($strAliasPrefix . 'unit_genre_id', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'unit_genre_id'] : $strAliasPrefix . 'unit_genre_id';
			$objToReturn->intUnitGenreId = $objDbRow->GetColumn($strAliasName, 'Integer');
			$strAliasName = array_key_exists($strAliasPrefix . 'size', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'size'] : $strAliasPrefix . 'size';
			$objToReturn->intSize = $objDbRow->GetColumn($strAliasName, 'Integer');
			$strAliasName = array_key_exists($strAliasPrefix . 'date_requested', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'date_requested'] : $strAliasPrefix . 'date_requested';
			$objToReturn->dttDateRequested = $objDbRow->GetColumn($strAliasName, 'Date');
			$strAliasName = array_key_exists($strAliasPrefix . 'charity_id', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'charity_id'] : $strAliasPrefix . 'charity_id';
			$objToReturn->intCharityId = $objDbRow->GetColumn($strAliasName, 'Integer');
			$strAliasName = array_key_exists($strAliasPrefix . 'quantity_still_required', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'quantity_still_required'] : $strAliasPrefix . 'quantity_still_required';
			$objToReturn->intQuantityStillRequired = $objDbRow->GetColumn($strAliasName, 'Integer');

			// Instantiate Virtual Attributes
			foreach ($objDbRow->GetColumnNameArray() as $strColumnName => $mixValue) {
				$strVirtualPrefix = $strAliasPrefix . '__';
				$strVirtualPrefixLength = strlen($strVirtualPrefix);
				if (substr($strColumnName, 0, $strVirtualPrefixLength) == $strVirtualPrefix)
					$objToReturn->__strVirtualAttributeArray[substr($strColumnName, $strVirtualPrefixLength)] = $mixValue;
			}

			// Prepare to Check for Early/Virtual Binding
			if (!$strAliasPrefix)
				$strAliasPrefix = 'need__';

			// Check for UnitGenre Early Binding
			$strAlias = $strAliasPrefix . 'unit_genre_id__id';
			$strAliasName = array_key_exists($strAlias, $strColumnAliasArray) ? $strColumnAliasArray[$strAlias] : $strAlias;
			if (!is_null($objDbRow->GetColumn($strAliasName)))
				$objToReturn->objUnitGenre = UnitGenre::InstantiateDbRow($objDbRow, $strAliasPrefix . 'unit_genre_id__', $strExpandAsArrayNodes, null, $strColumnAliasArray);

			// Check for Charity Early Binding
			$strAlias = $strAliasPrefix . 'charity_id__id';
			$strAliasName = array_key_exists($strAlias, $strColumnAliasArray) ? $strColumnAliasArray[$strAlias] : $strAlias;
			if (!is_null($objDbRow->GetColumn($strAliasName)))
				$objToReturn->objCharity = CharityPartner::InstantiateDbRow($objDbRow, $strAliasPrefix . 'charity_id__', $strExpandAsArrayNodes, null, $strColumnAliasArray);




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
		 * Instantiate an array of Needs from a Database Result
		 * @param QDatabaseResultBase $objDbResult
		 * @param string $strExpandAsArrayNodes
		 * @param string[] $strColumnAliasArray
		 * @return Need[]
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
					$objItem = Need::InstantiateDbRow($objDbRow, null, $strExpandAsArrayNodes, $objLastRowItem, $strColumnAliasArray);
					if ($objItem) {
						$objToReturn[] = $objItem;
						$objLastRowItem = $objItem;
					}
				}
			} else {
				while ($objDbRow = $objDbResult->GetNextRow())
					$objToReturn[] = Need::InstantiateDbRow($objDbRow, null, null, null, $strColumnAliasArray);
			}

			return $objToReturn;
		}

		/**
		 * Instantiate a single Need object from a query cursor (e.g. a DB ResultSet).
		 * Cursor is automatically moved to the "next row" of the result set.
		 * Will return NULL if no cursor or if the cursor has no more rows in the resultset.
		 * @param QDatabaseResultBase $objDbResult cursor resource
		 * @return Need next row resulting from the query
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
			return Need::InstantiateDbRow($objDbRow, null, $strExpandAsArrayNodes, null, $strColumnAliasArray);
		}




		///////////////////////////////////////////////////
		// INDEX-BASED LOAD METHODS (Single Load and Array)
		///////////////////////////////////////////////////
			
		/**
		 * Load a single Need object,
		 * by Id Index(es)
		 * @param integer $intId
		 * @return Need
		*/
		public static function LoadById($intId, $objOptionalClauses = null) {
			return Need::QuerySingle(
				QQ::Equal(QQN::Need()->Id, $intId)
			, $objOptionalClauses
			);
		}
			
		/**
		 * Load an array of Need objects,
		 * by UnitGenreId Index(es)
		 * @param integer $intUnitGenreId
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return Need[]
		*/
		public static function LoadArrayByUnitGenreId($intUnitGenreId, $objOptionalClauses = null) {
			// Call Need::QueryArray to perform the LoadArrayByUnitGenreId query
			try {
				return Need::QueryArray(
					QQ::Equal(QQN::Need()->UnitGenreId, $intUnitGenreId),
					$objOptionalClauses
					);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Count Needs
		 * by UnitGenreId Index(es)
		 * @param integer $intUnitGenreId
		 * @return int
		*/
		public static function CountByUnitGenreId($intUnitGenreId, $objOptionalClauses = null) {
			// Call Need::QueryCount to perform the CountByUnitGenreId query
			return Need::QueryCount(
				QQ::Equal(QQN::Need()->UnitGenreId, $intUnitGenreId)
			, $objOptionalClauses
			);
		}
			
		/**
		 * Load an array of Need objects,
		 * by CharityId Index(es)
		 * @param integer $intCharityId
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return Need[]
		*/
		public static function LoadArrayByCharityId($intCharityId, $objOptionalClauses = null) {
			// Call Need::QueryArray to perform the LoadArrayByCharityId query
			try {
				return Need::QueryArray(
					QQ::Equal(QQN::Need()->CharityId, $intCharityId),
					$objOptionalClauses
					);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Count Needs
		 * by CharityId Index(es)
		 * @param integer $intCharityId
		 * @return int
		*/
		public static function CountByCharityId($intCharityId, $objOptionalClauses = null) {
			// Call Need::QueryCount to perform the CountByCharityId query
			return Need::QueryCount(
				QQ::Equal(QQN::Need()->CharityId, $intCharityId)
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
		 * Save this Need
		 * @param bool $blnForceInsert
		 * @param bool $blnForceUpdate
		 * @return int
		 */
		public function Save($blnForceInsert = false, $blnForceUpdate = false) {
			// Get the Database Object for this Class
			$objDatabase = Need::GetDatabase();

			$mixToReturn = null;

			try {
				if ((!$this->__blnRestored) || ($blnForceInsert)) {
					// Perform an INSERT query
					$objDatabase->NonQuery('
						INSERT INTO `need` (
							`description`,
							`quantity_requested`,
							`unit_genre_id`,
							`size`,
							`date_requested`,
							`charity_id`,
							`quantity_still_required`
						) VALUES (
							' . $objDatabase->SqlVariable($this->strDescription) . ',
							' . $objDatabase->SqlVariable($this->intQuantityRequested) . ',
							' . $objDatabase->SqlVariable($this->intUnitGenreId) . ',
							' . $objDatabase->SqlVariable($this->intSize) . ',
							' . $objDatabase->SqlVariable($this->dttDateRequested) . ',
							' . $objDatabase->SqlVariable($this->intCharityId) . ',
							' . $objDatabase->SqlVariable($this->intQuantityStillRequired) . '
						)
					');

					// Update Identity column and return its value
					$mixToReturn = $this->intId = $objDatabase->InsertId('need', 'id');

					// Journaling
					if ($objDatabase->JournalingDatabase) $this->Journal('INSERT');

				} else {
					// Perform an UPDATE query

					// First checking for Optimistic Locking constraints (if applicable)

					// Perform the UPDATE query
					$objDatabase->NonQuery('
						UPDATE
							`need`
						SET
							`description` = ' . $objDatabase->SqlVariable($this->strDescription) . ',
							`quantity_requested` = ' . $objDatabase->SqlVariable($this->intQuantityRequested) . ',
							`unit_genre_id` = ' . $objDatabase->SqlVariable($this->intUnitGenreId) . ',
							`size` = ' . $objDatabase->SqlVariable($this->intSize) . ',
							`date_requested` = ' . $objDatabase->SqlVariable($this->dttDateRequested) . ',
							`charity_id` = ' . $objDatabase->SqlVariable($this->intCharityId) . ',
							`quantity_still_required` = ' . $objDatabase->SqlVariable($this->intQuantityStillRequired) . '
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
		 * Delete this Need
		 * @return void
		 */
		public function Delete() {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Cannot delete this Need with an unset primary key.');

			// Get the Database Object for this Class
			$objDatabase = Need::GetDatabase();


			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`need`
				WHERE
					`id` = ' . $objDatabase->SqlVariable($this->intId) . '');

			// Journaling
			if ($objDatabase->JournalingDatabase) $this->Journal('DELETE');
		}

		/**
		 * Delete all Needs
		 * @return void
		 */
		public static function DeleteAll() {
			// Get the Database Object for this Class
			$objDatabase = Need::GetDatabase();

			// Perform the Query
			$objDatabase->NonQuery('
				DELETE FROM
					`need`');
		}

		/**
		 * Truncate need table
		 * @return void
		 */
		public static function Truncate() {
			// Get the Database Object for this Class
			$objDatabase = Need::GetDatabase();

			// Perform the Query
			$objDatabase->NonQuery('
				TRUNCATE `need`');
		}

		/**
		 * Reload this Need from the database.
		 * @return void
		 */
		public function Reload() {
			// Make sure we are actually Restored from the database
			if (!$this->__blnRestored)
				throw new QCallerException('Cannot call Reload() on a new, unsaved Need object.');

			// Reload the Object
			$objReloaded = Need::Load($this->intId);

			// Update $this's local variables to match
			$this->strDescription = $objReloaded->strDescription;
			$this->intQuantityRequested = $objReloaded->intQuantityRequested;
			$this->UnitGenreId = $objReloaded->UnitGenreId;
			$this->intSize = $objReloaded->intSize;
			$this->dttDateRequested = $objReloaded->dttDateRequested;
			$this->CharityId = $objReloaded->CharityId;
			$this->intQuantityStillRequired = $objReloaded->intQuantityStillRequired;
		}

		/**
		 * Journals the current object into the Log database.
		 * Used internally as a helper method.
		 * @param string $strJournalCommand
		 */
		public function Journal($strJournalCommand) {
			$objDatabase = Need::GetDatabase()->JournalingDatabase;

			$objDatabase->NonQuery('
				INSERT INTO `need` (
					`id`,
					`description`,
					`quantity_requested`,
					`unit_genre_id`,
					`size`,
					`date_requested`,
					`charity_id`,
					`quantity_still_required`,
					__sys_login_id,
					__sys_action,
					__sys_date
				) VALUES (
					' . $objDatabase->SqlVariable($this->intId) . ',
					' . $objDatabase->SqlVariable($this->strDescription) . ',
					' . $objDatabase->SqlVariable($this->intQuantityRequested) . ',
					' . $objDatabase->SqlVariable($this->intUnitGenreId) . ',
					' . $objDatabase->SqlVariable($this->intSize) . ',
					' . $objDatabase->SqlVariable($this->dttDateRequested) . ',
					' . $objDatabase->SqlVariable($this->intCharityId) . ',
					' . $objDatabase->SqlVariable($this->intQuantityStillRequired) . ',
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
		 * @return Need[]
		 */
		public static function GetJournalForId($intId) {
			$objDatabase = Need::GetDatabase()->JournalingDatabase;

			$objResult = $objDatabase->Query('SELECT * FROM need WHERE id = ' .
				$objDatabase->SqlVariable($intId) . ' ORDER BY __sys_date');

			return Need::InstantiateDbResult($objResult);
		}

		/**
		 * Gets the historical journal for this object from the log database.
		 * Objects will have VirtualAttributes available to lookup login, date, and action information from the journal object.
		 * @return Need[]
		 */
		public function GetJournal() {
			return Need::GetJournalForId($this->intId);
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

				case 'QuantityRequested':
					// Gets the value for intQuantityRequested 
					// @return integer
					return $this->intQuantityRequested;

				case 'UnitGenreId':
					// Gets the value for intUnitGenreId 
					// @return integer
					return $this->intUnitGenreId;

				case 'Size':
					// Gets the value for intSize 
					// @return integer
					return $this->intSize;

				case 'DateRequested':
					// Gets the value for dttDateRequested 
					// @return QDateTime
					return $this->dttDateRequested;

				case 'CharityId':
					// Gets the value for intCharityId 
					// @return integer
					return $this->intCharityId;

				case 'QuantityStillRequired':
					// Gets the value for intQuantityStillRequired 
					// @return integer
					return $this->intQuantityStillRequired;


				///////////////////
				// Member Objects
				///////////////////
				case 'UnitGenre':
					// Gets the value for the UnitGenre object referenced by intUnitGenreId 
					// @return UnitGenre
					try {
						if ((!$this->objUnitGenre) && (!is_null($this->intUnitGenreId)))
							$this->objUnitGenre = UnitGenre::Load($this->intUnitGenreId);
						return $this->objUnitGenre;
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'Charity':
					// Gets the value for the CharityPartner object referenced by intCharityId 
					// @return CharityPartner
					try {
						if ((!$this->objCharity) && (!is_null($this->intCharityId)))
							$this->objCharity = CharityPartner::Load($this->intCharityId);
						return $this->objCharity;
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
					// if set due to an expansion on the transaction.need_id reverse relationship
					// @return Transaction
					return $this->_objTransaction;

				case '_TransactionArray':
					// Gets the value for the private _objTransactionArray (Read-Only)
					// if set due to an ExpandAsArray on the transaction.need_id reverse relationship
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

				case 'QuantityRequested':
					// Sets the value for intQuantityRequested 
					// @param integer $mixValue
					// @return integer
					try {
						return ($this->intQuantityRequested = QType::Cast($mixValue, QType::Integer));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'UnitGenreId':
					// Sets the value for intUnitGenreId 
					// @param integer $mixValue
					// @return integer
					try {
						$this->objUnitGenre = null;
						return ($this->intUnitGenreId = QType::Cast($mixValue, QType::Integer));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'Size':
					// Sets the value for intSize 
					// @param integer $mixValue
					// @return integer
					try {
						return ($this->intSize = QType::Cast($mixValue, QType::Integer));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'DateRequested':
					// Sets the value for dttDateRequested 
					// @param QDateTime $mixValue
					// @return QDateTime
					try {
						return ($this->dttDateRequested = QType::Cast($mixValue, QType::DateTime));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'CharityId':
					// Sets the value for intCharityId 
					// @param integer $mixValue
					// @return integer
					try {
						$this->objCharity = null;
						return ($this->intCharityId = QType::Cast($mixValue, QType::Integer));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'QuantityStillRequired':
					// Sets the value for intQuantityStillRequired 
					// @param integer $mixValue
					// @return integer
					try {
						return ($this->intQuantityStillRequired = QType::Cast($mixValue, QType::Integer));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}


				///////////////////
				// Member Objects
				///////////////////
				case 'UnitGenre':
					// Sets the value for the UnitGenre object referenced by intUnitGenreId 
					// @param UnitGenre $mixValue
					// @return UnitGenre
					if (is_null($mixValue)) {
						$this->intUnitGenreId = null;
						$this->objUnitGenre = null;
						return null;
					} else {
						// Make sure $mixValue actually is a UnitGenre object
						try {
							$mixValue = QType::Cast($mixValue, 'UnitGenre');
						} catch (QInvalidCastException $objExc) {
							$objExc->IncrementOffset();
							throw $objExc;
						} 

						// Make sure $mixValue is a SAVED UnitGenre object
						if (is_null($mixValue->Id))
							throw new QCallerException('Unable to set an unsaved UnitGenre for this Need');

						// Update Local Member Variables
						$this->objUnitGenre = $mixValue;
						$this->intUnitGenreId = $mixValue->Id;

						// Return $mixValue
						return $mixValue;
					}
					break;

				case 'Charity':
					// Sets the value for the CharityPartner object referenced by intCharityId 
					// @param CharityPartner $mixValue
					// @return CharityPartner
					if (is_null($mixValue)) {
						$this->intCharityId = null;
						$this->objCharity = null;
						return null;
					} else {
						// Make sure $mixValue actually is a CharityPartner object
						try {
							$mixValue = QType::Cast($mixValue, 'CharityPartner');
						} catch (QInvalidCastException $objExc) {
							$objExc->IncrementOffset();
							throw $objExc;
						} 

						// Make sure $mixValue is a SAVED CharityPartner object
						if (is_null($mixValue->Id))
							throw new QCallerException('Unable to set an unsaved Charity for this Need');

						// Update Local Member Variables
						$this->objCharity = $mixValue;
						$this->intCharityId = $mixValue->Id;

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
				return Transaction::LoadArrayByNeedId($this->intId, $objOptionalClauses);
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

			return Transaction::CountByNeedId($this->intId);
		}

		/**
		 * Associates a Transaction
		 * @param Transaction $objTransaction
		 * @return void
		*/ 
		public function AssociateTransaction(Transaction $objTransaction) {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call AssociateTransaction on this unsaved Need.');
			if ((is_null($objTransaction->Id)))
				throw new QUndefinedPrimaryKeyException('Unable to call AssociateTransaction on this Need with an unsaved Transaction.');

			// Get the Database Object for this Class
			$objDatabase = Need::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`transaction`
				SET
					`need_id` = ' . $objDatabase->SqlVariable($this->intId) . '
				WHERE
					`id` = ' . $objDatabase->SqlVariable($objTransaction->Id) . '
			');

			// Journaling (if applicable)
			if ($objDatabase->JournalingDatabase) {
				$objTransaction->NeedId = $this->intId;
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
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateTransaction on this unsaved Need.');
			if ((is_null($objTransaction->Id)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateTransaction on this Need with an unsaved Transaction.');

			// Get the Database Object for this Class
			$objDatabase = Need::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`transaction`
				SET
					`need_id` = null
				WHERE
					`id` = ' . $objDatabase->SqlVariable($objTransaction->Id) . ' AND
					`need_id` = ' . $objDatabase->SqlVariable($this->intId) . '
			');

			// Journaling
			if ($objDatabase->JournalingDatabase) {
				$objTransaction->NeedId = null;
				$objTransaction->Journal('UPDATE');
			}
		}

		/**
		 * Unassociates all Transactions
		 * @return void
		*/ 
		public function UnassociateAllTransactions() {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateTransaction on this unsaved Need.');

			// Get the Database Object for this Class
			$objDatabase = Need::GetDatabase();

			// Journaling
			if ($objDatabase->JournalingDatabase) {
				foreach (Transaction::LoadArrayByNeedId($this->intId) as $objTransaction) {
					$objTransaction->NeedId = null;
					$objTransaction->Journal('UPDATE');
				}
			}

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`transaction`
				SET
					`need_id` = null
				WHERE
					`need_id` = ' . $objDatabase->SqlVariable($this->intId) . '
			');
		}

		/**
		 * Deletes an associated Transaction
		 * @param Transaction $objTransaction
		 * @return void
		*/ 
		public function DeleteAssociatedTransaction(Transaction $objTransaction) {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateTransaction on this unsaved Need.');
			if ((is_null($objTransaction->Id)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateTransaction on this Need with an unsaved Transaction.');

			// Get the Database Object for this Class
			$objDatabase = Need::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`transaction`
				WHERE
					`id` = ' . $objDatabase->SqlVariable($objTransaction->Id) . ' AND
					`need_id` = ' . $objDatabase->SqlVariable($this->intId) . '
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
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateTransaction on this unsaved Need.');

			// Get the Database Object for this Class
			$objDatabase = Need::GetDatabase();

			// Journaling
			if ($objDatabase->JournalingDatabase) {
				foreach (Transaction::LoadArrayByNeedId($this->intId) as $objTransaction) {
					$objTransaction->Journal('DELETE');
				}
			}

			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`transaction`
				WHERE
					`need_id` = ' . $objDatabase->SqlVariable($this->intId) . '
			');
		}





		////////////////////////////////////////
		// METHODS for SOAP-BASED WEB SERVICES
		////////////////////////////////////////

		public static function GetSoapComplexTypeXml() {
			$strToReturn = '<complexType name="Need"><sequence>';
			$strToReturn .= '<element name="Id" type="xsd:int"/>';
			$strToReturn .= '<element name="Description" type="xsd:string"/>';
			$strToReturn .= '<element name="QuantityRequested" type="xsd:int"/>';
			$strToReturn .= '<element name="UnitGenre" type="xsd1:UnitGenre"/>';
			$strToReturn .= '<element name="Size" type="xsd:int"/>';
			$strToReturn .= '<element name="DateRequested" type="xsd:dateTime"/>';
			$strToReturn .= '<element name="Charity" type="xsd1:CharityPartner"/>';
			$strToReturn .= '<element name="QuantityStillRequired" type="xsd:int"/>';
			$strToReturn .= '<element name="__blnRestored" type="xsd:boolean"/>';
			$strToReturn .= '</sequence></complexType>';
			return $strToReturn;
		}

		public static function AlterSoapComplexTypeArray(&$strComplexTypeArray) {
			if (!array_key_exists('Need', $strComplexTypeArray)) {
				$strComplexTypeArray['Need'] = Need::GetSoapComplexTypeXml();
				UnitGenre::AlterSoapComplexTypeArray($strComplexTypeArray);
				CharityPartner::AlterSoapComplexTypeArray($strComplexTypeArray);
			}
		}

		public static function GetArrayFromSoapArray($objSoapArray) {
			$objArrayToReturn = array();

			foreach ($objSoapArray as $objSoapObject)
				array_push($objArrayToReturn, Need::GetObjectFromSoapObject($objSoapObject));

			return $objArrayToReturn;
		}

		public static function GetObjectFromSoapObject($objSoapObject) {
			$objToReturn = new Need();
			if (property_exists($objSoapObject, 'Id'))
				$objToReturn->intId = $objSoapObject->Id;
			if (property_exists($objSoapObject, 'Description'))
				$objToReturn->strDescription = $objSoapObject->Description;
			if (property_exists($objSoapObject, 'QuantityRequested'))
				$objToReturn->intQuantityRequested = $objSoapObject->QuantityRequested;
			if ((property_exists($objSoapObject, 'UnitGenre')) &&
				($objSoapObject->UnitGenre))
				$objToReturn->UnitGenre = UnitGenre::GetObjectFromSoapObject($objSoapObject->UnitGenre);
			if (property_exists($objSoapObject, 'Size'))
				$objToReturn->intSize = $objSoapObject->Size;
			if (property_exists($objSoapObject, 'DateRequested'))
				$objToReturn->dttDateRequested = new QDateTime($objSoapObject->DateRequested);
			if ((property_exists($objSoapObject, 'Charity')) &&
				($objSoapObject->Charity))
				$objToReturn->Charity = CharityPartner::GetObjectFromSoapObject($objSoapObject->Charity);
			if (property_exists($objSoapObject, 'QuantityStillRequired'))
				$objToReturn->intQuantityStillRequired = $objSoapObject->QuantityStillRequired;
			if (property_exists($objSoapObject, '__blnRestored'))
				$objToReturn->__blnRestored = $objSoapObject->__blnRestored;
			return $objToReturn;
		}

		public static function GetSoapArrayFromArray($objArray) {
			if (!$objArray)
				return null;

			$objArrayToReturn = array();

			foreach ($objArray as $objObject)
				array_push($objArrayToReturn, Need::GetSoapObjectFromObject($objObject, true));

			return unserialize(serialize($objArrayToReturn));
		}

		public static function GetSoapObjectFromObject($objObject, $blnBindRelatedObjects) {
			if ($objObject->objUnitGenre)
				$objObject->objUnitGenre = UnitGenre::GetSoapObjectFromObject($objObject->objUnitGenre, false);
			else if (!$blnBindRelatedObjects)
				$objObject->intUnitGenreId = null;
			if ($objObject->dttDateRequested)
				$objObject->dttDateRequested = $objObject->dttDateRequested->__toString(QDateTime::FormatSoap);
			if ($objObject->objCharity)
				$objObject->objCharity = CharityPartner::GetSoapObjectFromObject($objObject->objCharity, false);
			else if (!$blnBindRelatedObjects)
				$objObject->intCharityId = null;
			return $objObject;
		}




	}



	/////////////////////////////////////
	// ADDITIONAL CLASSES for QCODO QUERY
	/////////////////////////////////////

	/**
	 * @property-read QQNode $Id
	 * @property-read QQNode $Description
	 * @property-read QQNode $QuantityRequested
	 * @property-read QQNode $UnitGenreId
	 * @property-read QQNodeUnitGenre $UnitGenre
	 * @property-read QQNode $Size
	 * @property-read QQNode $DateRequested
	 * @property-read QQNode $CharityId
	 * @property-read QQNodeCharityPartner $Charity
	 * @property-read QQNode $QuantityStillRequired
	 * @property-read QQReverseReferenceNodeTransaction $Transaction
	 */
	class QQNodeNeed extends QQNode {
		protected $strTableName = 'need';
		protected $strPrimaryKey = 'id';
		protected $strClassName = 'Need';
		public function __get($strName) {
			switch ($strName) {
				case 'Id':
					return new QQNode('id', 'Id', 'integer', $this);
				case 'Description':
					return new QQNode('description', 'Description', 'string', $this);
				case 'QuantityRequested':
					return new QQNode('quantity_requested', 'QuantityRequested', 'integer', $this);
				case 'UnitGenreId':
					return new QQNode('unit_genre_id', 'UnitGenreId', 'integer', $this);
				case 'UnitGenre':
					return new QQNodeUnitGenre('unit_genre_id', 'UnitGenre', 'integer', $this);
				case 'Size':
					return new QQNode('size', 'Size', 'integer', $this);
				case 'DateRequested':
					return new QQNode('date_requested', 'DateRequested', 'QDateTime', $this);
				case 'CharityId':
					return new QQNode('charity_id', 'CharityId', 'integer', $this);
				case 'Charity':
					return new QQNodeCharityPartner('charity_id', 'Charity', 'integer', $this);
				case 'QuantityStillRequired':
					return new QQNode('quantity_still_required', 'QuantityStillRequired', 'integer', $this);
				case 'Transaction':
					return new QQReverseReferenceNodeTransaction($this, 'transaction', 'reverse_reference', 'need_id');

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
	 * @property-read QQNode $QuantityRequested
	 * @property-read QQNode $UnitGenreId
	 * @property-read QQNodeUnitGenre $UnitGenre
	 * @property-read QQNode $Size
	 * @property-read QQNode $DateRequested
	 * @property-read QQNode $CharityId
	 * @property-read QQNodeCharityPartner $Charity
	 * @property-read QQNode $QuantityStillRequired
	 * @property-read QQReverseReferenceNodeTransaction $Transaction
	 * @property-read QQNode $_PrimaryKeyNode
	 */
	class QQReverseReferenceNodeNeed extends QQReverseReferenceNode {
		protected $strTableName = 'need';
		protected $strPrimaryKey = 'id';
		protected $strClassName = 'Need';
		public function __get($strName) {
			switch ($strName) {
				case 'Id':
					return new QQNode('id', 'Id', 'integer', $this);
				case 'Description':
					return new QQNode('description', 'Description', 'string', $this);
				case 'QuantityRequested':
					return new QQNode('quantity_requested', 'QuantityRequested', 'integer', $this);
				case 'UnitGenreId':
					return new QQNode('unit_genre_id', 'UnitGenreId', 'integer', $this);
				case 'UnitGenre':
					return new QQNodeUnitGenre('unit_genre_id', 'UnitGenre', 'integer', $this);
				case 'Size':
					return new QQNode('size', 'Size', 'integer', $this);
				case 'DateRequested':
					return new QQNode('date_requested', 'DateRequested', 'QDateTime', $this);
				case 'CharityId':
					return new QQNode('charity_id', 'CharityId', 'integer', $this);
				case 'Charity':
					return new QQNodeCharityPartner('charity_id', 'Charity', 'integer', $this);
				case 'QuantityStillRequired':
					return new QQNode('quantity_still_required', 'QuantityStillRequired', 'integer', $this);
				case 'Transaction':
					return new QQReverseReferenceNodeTransaction($this, 'transaction', 'reverse_reference', 'need_id');

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