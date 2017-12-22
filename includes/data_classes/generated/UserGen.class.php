<?php
	/**
	 * The abstract UserGen class defined here is
	 * code-generated and contains all the basic CRUD-type functionality as well as
	 * basic methods to handle relationships and index-based loading.
	 *
	 * To use, you should use the User subclass which
	 * extends this UserGen class.
	 *
	 * Because subsequent re-code generations will overwrite any changes to this
	 * file, you should leave this file unaltered to prevent yourself from losing
	 * any information or code changes.  All customizations should be done by
	 * overriding existing or implementing new methods, properties and variables
	 * in the User class.
	 * 
	 * @package My Application
	 * @subpackage GeneratedDataObjects
	 * @property integer $Id the value for intId (Read-Only PK)
	 * @property string $Username the value for strUsername 
	 * @property string $Password the value for strPassword 
	 * @property string $Email the value for strEmail 
	 * @property string $FirstName the value for strFirstName 
	 * @property string $LastName the value for strLastName 
	 * @property integer $AccessLevel the value for intAccessLevel 
	 * @property AccessLevel $AccessLevelObject the value for the AccessLevel object referenced by intAccessLevel 
	 * @property CharityPartner $_CharityPartnerAsCharity the value for the private _objCharityPartnerAsCharity (Read-Only) if set due to an expansion on the user_charity_assn association table
	 * @property CharityPartner[] $_CharityPartnerAsCharityArray the value for the private _objCharityPartnerAsCharityArray (Read-Only) if set due to an ExpandAsArray on the user_charity_assn association table
	 * @property FashionPartner $_FashionPartnerAsFashion the value for the private _objFashionPartnerAsFashion (Read-Only) if set due to an expansion on the user_fashion_assn association table
	 * @property FashionPartner[] $_FashionPartnerAsFashionArray the value for the private _objFashionPartnerAsFashionArray (Read-Only) if set due to an ExpandAsArray on the user_fashion_assn association table
	 * @property boolean $__Restored whether or not this object was restored from the database (as opposed to created new)
	 */
	class UserGen extends QBaseClass {

		///////////////////////////////////////////////////////////////////////
		// PROTECTED MEMBER VARIABLES and TEXT FIELD MAXLENGTHS (if applicable)
		///////////////////////////////////////////////////////////////////////
		
		/**
		 * Protected member variable that maps to the database PK Identity column user.id
		 * @var integer intId
		 */
		protected $intId;
		const IdDefault = null;


		/**
		 * Protected member variable that maps to the database column user.username
		 * @var string strUsername
		 */
		protected $strUsername;
		const UsernameMaxLength = 255;
		const UsernameDefault = null;


		/**
		 * Protected member variable that maps to the database column user.password
		 * @var string strPassword
		 */
		protected $strPassword;
		const PasswordMaxLength = 255;
		const PasswordDefault = null;


		/**
		 * Protected member variable that maps to the database column user.email
		 * @var string strEmail
		 */
		protected $strEmail;
		const EmailMaxLength = 255;
		const EmailDefault = null;


		/**
		 * Protected member variable that maps to the database column user.first_name
		 * @var string strFirstName
		 */
		protected $strFirstName;
		const FirstNameMaxLength = 255;
		const FirstNameDefault = null;


		/**
		 * Protected member variable that maps to the database column user.last_name
		 * @var string strLastName
		 */
		protected $strLastName;
		const LastNameMaxLength = 255;
		const LastNameDefault = null;


		/**
		 * Protected member variable that maps to the database column user.access_level
		 * @var integer intAccessLevel
		 */
		protected $intAccessLevel;
		const AccessLevelDefault = null;


		/**
		 * Private member variable that stores a reference to a single CharityPartnerAsCharity object
		 * (of type CharityPartner), if this User object was restored with
		 * an expansion on the user_charity_assn association table.
		 * @var CharityPartner _objCharityPartnerAsCharity;
		 */
		private $_objCharityPartnerAsCharity;

		/**
		 * Private member variable that stores a reference to an array of CharityPartnerAsCharity objects
		 * (of type CharityPartner[]), if this User object was restored with
		 * an ExpandAsArray on the user_charity_assn association table.
		 * @var CharityPartner[] _objCharityPartnerAsCharityArray;
		 */
		private $_objCharityPartnerAsCharityArray = array();

		/**
		 * Private member variable that stores a reference to a single FashionPartnerAsFashion object
		 * (of type FashionPartner), if this User object was restored with
		 * an expansion on the user_fashion_assn association table.
		 * @var FashionPartner _objFashionPartnerAsFashion;
		 */
		private $_objFashionPartnerAsFashion;

		/**
		 * Private member variable that stores a reference to an array of FashionPartnerAsFashion objects
		 * (of type FashionPartner[]), if this User object was restored with
		 * an ExpandAsArray on the user_fashion_assn association table.
		 * @var FashionPartner[] _objFashionPartnerAsFashionArray;
		 */
		private $_objFashionPartnerAsFashionArray = array();

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
		 * in the database column user.access_level.
		 *
		 * NOTE: Always use the AccessLevelObject property getter to correctly retrieve this AccessLevel object.
		 * (Because this class implements late binding, this variable reference MAY be null.)
		 * @var AccessLevel objAccessLevelObject
		 */
		protected $objAccessLevelObject;





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
		 * Load a User from PK Info
		 * @param integer $intId
		 * @return User
		 */
		public static function Load($intId) {
			// Use QuerySingle to Perform the Query
			return User::QuerySingle(
				QQ::Equal(QQN::User()->Id, $intId)
			);
		}

		/**
		 * Load all Users
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return User[]
		 */
		public static function LoadAll($objOptionalClauses = null) {
			// Call User::QueryArray to perform the LoadAll query
			try {
				return User::QueryArray(QQ::All(), $objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Count all Users
		 * @return int
		 */
		public static function CountAll() {
			// Call User::QueryCount to perform the CountAll query
			return User::QueryCount(QQ::All());
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
			$objDatabase = User::GetDatabase();

			// Create/Build out the QueryBuilder object with User-specific SELET and FROM fields
			$objQueryBuilder = new QQueryBuilder($objDatabase, 'user');
			User::GetSelectFields($objQueryBuilder);
			$objQueryBuilder->AddFromItem('user');

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
		 * Static Qcodo Query method to query for a single User object.
		 * Uses BuildQueryStatment to perform most of the work.
		 * @param QQCondition $objConditions any conditions on the query, itself
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @param mixed[] $mixParameterArray a array of name-value pairs to perform PrepareStatement with
		 * @return User the queried object
		 */
		public static function QuerySingle(QQCondition $objConditions, $objOptionalClauses = null, $mixParameterArray = null) {
			// Get the Query Statement
			try {
				$strQuery = User::BuildQueryStatement($objQueryBuilder, $objConditions, $objOptionalClauses, $mixParameterArray, false);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}

			// Perform the Query
			$objDbResult = $objQueryBuilder->Database->Query($strQuery);

			// Instantiate a new User object and return it

			// Do we have to expand anything?
			if ($objQueryBuilder->ExpandAsArrayNodes) {
				$objToReturn = array();
				while ($objDbRow = $objDbResult->GetNextRow()) {
					$objItem = User::InstantiateDbRow($objDbRow, null, $objQueryBuilder->ExpandAsArrayNodes, $objToReturn, $objQueryBuilder->ColumnAliasArray);
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
				return User::InstantiateDbRow($objDbRow, null, null, null, $objQueryBuilder->ColumnAliasArray);
			}
		}

		/**
		 * Static Qcodo Query method to query for an array of User objects.
		 * Uses BuildQueryStatment to perform most of the work.
		 * @param QQCondition $objConditions any conditions on the query, itself
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @param mixed[] $mixParameterArray a array of name-value pairs to perform PrepareStatement with
		 * @return User[] the queried objects as an array
		 */
		public static function QueryArray(QQCondition $objConditions, $objOptionalClauses = null, $mixParameterArray = null) {
			// Get the Query Statement
			try {
				$strQuery = User::BuildQueryStatement($objQueryBuilder, $objConditions, $objOptionalClauses, $mixParameterArray, false);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}

			// Perform the Query and Instantiate the Array Result
			$objDbResult = $objQueryBuilder->Database->Query($strQuery);
			return User::InstantiateDbResult($objDbResult, $objQueryBuilder->ExpandAsArrayNodes, $objQueryBuilder->ColumnAliasArray);
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
				$strQuery = User::BuildQueryStatement($objQueryBuilder, $objConditions, $objOptionalClauses, $mixParameterArray, false);
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
		 * Static Qcodo Query method to query for a count of User objects.
		 * Uses BuildQueryStatment to perform most of the work.
		 * @param QQCondition $objConditions any conditions on the query, itself
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @param mixed[] $mixParameterArray a array of name-value pairs to perform PrepareStatement with
		 * @return integer the count of queried objects as an integer
		 */
		public static function QueryCount(QQCondition $objConditions, $objOptionalClauses = null, $mixParameterArray = null) {
			// Get the Query Statement
			try {
				$strQuery = User::BuildQueryStatement($objQueryBuilder, $objConditions, $objOptionalClauses, $mixParameterArray, true);
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
			$objDatabase = User::GetDatabase();

			// Lookup the QCache for This Query Statement
			$objCache = new QCache('query', 'user_' . serialize($strConditions));
			if (!($strQuery = $objCache->GetData())) {
				// Not Found -- Go ahead and Create/Build out a new QueryBuilder object with User-specific fields
				$objQueryBuilder = new QQueryBuilder($objDatabase);
				User::GetSelectFields($objQueryBuilder);
				User::GetFromFields($objQueryBuilder);

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
			return User::InstantiateDbResult($objDbResult);
		}*/

		/**
		 * Updates a QQueryBuilder with the SELECT fields for this User
		 * @param QQueryBuilder $objBuilder the Query Builder object to update
		 * @param string $strPrefix optional prefix to add to the SELECT fields
		 */
		public static function GetSelectFields(QQueryBuilder $objBuilder, $strPrefix = null) {
			if ($strPrefix) {
				$strTableName = $strPrefix;
				$strAliasPrefix = $strPrefix . '__';
			} else {
				$strTableName = 'user';
				$strAliasPrefix = '';
			}

			$objBuilder->AddSelectItem($strTableName, 'id', $strAliasPrefix . 'id');
			$objBuilder->AddSelectItem($strTableName, 'username', $strAliasPrefix . 'username');
			$objBuilder->AddSelectItem($strTableName, 'password', $strAliasPrefix . 'password');
			$objBuilder->AddSelectItem($strTableName, 'email', $strAliasPrefix . 'email');
			$objBuilder->AddSelectItem($strTableName, 'first_name', $strAliasPrefix . 'first_name');
			$objBuilder->AddSelectItem($strTableName, 'last_name', $strAliasPrefix . 'last_name');
			$objBuilder->AddSelectItem($strTableName, 'access_level', $strAliasPrefix . 'access_level');
		}




		///////////////////////////////
		// INSTANTIATION-RELATED METHODS
		///////////////////////////////

		/**
		 * Instantiate a User from a Database Row.
		 * Takes in an optional strAliasPrefix, used in case another Object::InstantiateDbRow
		 * is calling this User::InstantiateDbRow in order to perform
		 * early binding on referenced objects.
		 * @param QDatabaseRowBase $objDbRow
		 * @param string $strAliasPrefix
		 * @param string $strExpandAsArrayNodes
		 * @param QBaseClass $objPreviousItem
		 * @param string[] $strColumnAliasArray
		 * @return User
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
					$strAliasPrefix = 'user__';

				$strAlias = $strAliasPrefix . 'charitypartnerascharity__charity_id__id';
				$strAliasName = array_key_exists($strAlias, $strColumnAliasArray) ? $strColumnAliasArray[$strAlias] : $strAlias;
				if ((array_key_exists($strAlias, $strExpandAsArrayNodes)) &&
					(!is_null($objDbRow->GetColumn($strAliasName)))) {
					if ($intPreviousChildItemCount = count($objPreviousItem->_objCharityPartnerAsCharityArray)) {
						$objPreviousChildItem = $objPreviousItem->_objCharityPartnerAsCharityArray[$intPreviousChildItemCount - 1];
						$objChildItem = CharityPartner::InstantiateDbRow($objDbRow, $strAliasPrefix . 'charitypartnerascharity__charity_id__', $strExpandAsArrayNodes, $objPreviousChildItem, $strColumnAliasArray);
						if ($objChildItem)
							$objPreviousItem->_objCharityPartnerAsCharityArray[] = $objChildItem;
					} else
						$objPreviousItem->_objCharityPartnerAsCharityArray[] = CharityPartner::InstantiateDbRow($objDbRow, $strAliasPrefix . 'charitypartnerascharity__charity_id__', $strExpandAsArrayNodes, null, $strColumnAliasArray);
					$blnExpandedViaArray = true;
				}

				$strAlias = $strAliasPrefix . 'fashionpartnerasfashion__fashion_id__id';
				$strAliasName = array_key_exists($strAlias, $strColumnAliasArray) ? $strColumnAliasArray[$strAlias] : $strAlias;
				if ((array_key_exists($strAlias, $strExpandAsArrayNodes)) &&
					(!is_null($objDbRow->GetColumn($strAliasName)))) {
					if ($intPreviousChildItemCount = count($objPreviousItem->_objFashionPartnerAsFashionArray)) {
						$objPreviousChildItem = $objPreviousItem->_objFashionPartnerAsFashionArray[$intPreviousChildItemCount - 1];
						$objChildItem = FashionPartner::InstantiateDbRow($objDbRow, $strAliasPrefix . 'fashionpartnerasfashion__fashion_id__', $strExpandAsArrayNodes, $objPreviousChildItem, $strColumnAliasArray);
						if ($objChildItem)
							$objPreviousItem->_objFashionPartnerAsFashionArray[] = $objChildItem;
					} else
						$objPreviousItem->_objFashionPartnerAsFashionArray[] = FashionPartner::InstantiateDbRow($objDbRow, $strAliasPrefix . 'fashionpartnerasfashion__fashion_id__', $strExpandAsArrayNodes, null, $strColumnAliasArray);
					$blnExpandedViaArray = true;
				}


				// Either return false to signal array expansion, or check-to-reset the Alias prefix and move on
				if ($blnExpandedViaArray)
					return false;
				else if ($strAliasPrefix == 'user__')
					$strAliasPrefix = null;
			}

			// Create a new instance of the User object
			$objToReturn = new User();
			$objToReturn->__blnRestored = true;

			$strAliasName = array_key_exists($strAliasPrefix . 'id', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'id'] : $strAliasPrefix . 'id';
			$objToReturn->intId = $objDbRow->GetColumn($strAliasName, 'Integer');
			$strAliasName = array_key_exists($strAliasPrefix . 'username', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'username'] : $strAliasPrefix . 'username';
			$objToReturn->strUsername = $objDbRow->GetColumn($strAliasName, 'VarChar');
			$strAliasName = array_key_exists($strAliasPrefix . 'password', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'password'] : $strAliasPrefix . 'password';
			$objToReturn->strPassword = $objDbRow->GetColumn($strAliasName, 'VarChar');
			$strAliasName = array_key_exists($strAliasPrefix . 'email', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'email'] : $strAliasPrefix . 'email';
			$objToReturn->strEmail = $objDbRow->GetColumn($strAliasName, 'VarChar');
			$strAliasName = array_key_exists($strAliasPrefix . 'first_name', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'first_name'] : $strAliasPrefix . 'first_name';
			$objToReturn->strFirstName = $objDbRow->GetColumn($strAliasName, 'VarChar');
			$strAliasName = array_key_exists($strAliasPrefix . 'last_name', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'last_name'] : $strAliasPrefix . 'last_name';
			$objToReturn->strLastName = $objDbRow->GetColumn($strAliasName, 'VarChar');
			$strAliasName = array_key_exists($strAliasPrefix . 'access_level', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'access_level'] : $strAliasPrefix . 'access_level';
			$objToReturn->intAccessLevel = $objDbRow->GetColumn($strAliasName, 'Integer');

			// Instantiate Virtual Attributes
			foreach ($objDbRow->GetColumnNameArray() as $strColumnName => $mixValue) {
				$strVirtualPrefix = $strAliasPrefix . '__';
				$strVirtualPrefixLength = strlen($strVirtualPrefix);
				if (substr($strColumnName, 0, $strVirtualPrefixLength) == $strVirtualPrefix)
					$objToReturn->__strVirtualAttributeArray[substr($strColumnName, $strVirtualPrefixLength)] = $mixValue;
			}

			// Prepare to Check for Early/Virtual Binding
			if (!$strAliasPrefix)
				$strAliasPrefix = 'user__';

			// Check for AccessLevelObject Early Binding
			$strAlias = $strAliasPrefix . 'access_level__id';
			$strAliasName = array_key_exists($strAlias, $strColumnAliasArray) ? $strColumnAliasArray[$strAlias] : $strAlias;
			if (!is_null($objDbRow->GetColumn($strAliasName)))
				$objToReturn->objAccessLevelObject = AccessLevel::InstantiateDbRow($objDbRow, $strAliasPrefix . 'access_level__', $strExpandAsArrayNodes, null, $strColumnAliasArray);



			// Check for CharityPartnerAsCharity Virtual Binding
			$strAlias = $strAliasPrefix . 'charitypartnerascharity__charity_id__id';
			$strAliasName = array_key_exists($strAlias, $strColumnAliasArray) ? $strColumnAliasArray[$strAlias] : $strAlias;
			if (!is_null($objDbRow->GetColumn($strAliasName))) {
				if (($strExpandAsArrayNodes) && (array_key_exists($strAlias, $strExpandAsArrayNodes)))
					$objToReturn->_objCharityPartnerAsCharityArray[] = CharityPartner::InstantiateDbRow($objDbRow, $strAliasPrefix . 'charitypartnerascharity__charity_id__', $strExpandAsArrayNodes, null, $strColumnAliasArray);
				else
					$objToReturn->_objCharityPartnerAsCharity = CharityPartner::InstantiateDbRow($objDbRow, $strAliasPrefix . 'charitypartnerascharity__charity_id__', $strExpandAsArrayNodes, null, $strColumnAliasArray);
			}

			// Check for FashionPartnerAsFashion Virtual Binding
			$strAlias = $strAliasPrefix . 'fashionpartnerasfashion__fashion_id__id';
			$strAliasName = array_key_exists($strAlias, $strColumnAliasArray) ? $strColumnAliasArray[$strAlias] : $strAlias;
			if (!is_null($objDbRow->GetColumn($strAliasName))) {
				if (($strExpandAsArrayNodes) && (array_key_exists($strAlias, $strExpandAsArrayNodes)))
					$objToReturn->_objFashionPartnerAsFashionArray[] = FashionPartner::InstantiateDbRow($objDbRow, $strAliasPrefix . 'fashionpartnerasfashion__fashion_id__', $strExpandAsArrayNodes, null, $strColumnAliasArray);
				else
					$objToReturn->_objFashionPartnerAsFashion = FashionPartner::InstantiateDbRow($objDbRow, $strAliasPrefix . 'fashionpartnerasfashion__fashion_id__', $strExpandAsArrayNodes, null, $strColumnAliasArray);
			}


			return $objToReturn;
		}

		/**
		 * Instantiate an array of Users from a Database Result
		 * @param QDatabaseResultBase $objDbResult
		 * @param string $strExpandAsArrayNodes
		 * @param string[] $strColumnAliasArray
		 * @return User[]
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
					$objItem = User::InstantiateDbRow($objDbRow, null, $strExpandAsArrayNodes, $objLastRowItem, $strColumnAliasArray);
					if ($objItem) {
						$objToReturn[] = $objItem;
						$objLastRowItem = $objItem;
					}
				}
			} else {
				while ($objDbRow = $objDbResult->GetNextRow())
					$objToReturn[] = User::InstantiateDbRow($objDbRow, null, null, null, $strColumnAliasArray);
			}

			return $objToReturn;
		}

		/**
		 * Instantiate a single User object from a query cursor (e.g. a DB ResultSet).
		 * Cursor is automatically moved to the "next row" of the result set.
		 * Will return NULL if no cursor or if the cursor has no more rows in the resultset.
		 * @param QDatabaseResultBase $objDbResult cursor resource
		 * @return User next row resulting from the query
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
			return User::InstantiateDbRow($objDbRow, null, $strExpandAsArrayNodes, null, $strColumnAliasArray);
		}




		///////////////////////////////////////////////////
		// INDEX-BASED LOAD METHODS (Single Load and Array)
		///////////////////////////////////////////////////
			
		/**
		 * Load a single User object,
		 * by Id Index(es)
		 * @param integer $intId
		 * @return User
		*/
		public static function LoadById($intId, $objOptionalClauses = null) {
			return User::QuerySingle(
				QQ::Equal(QQN::User()->Id, $intId)
			, $objOptionalClauses
			);
		}
			
		/**
		 * Load an array of User objects,
		 * by AccessLevel Index(es)
		 * @param integer $intAccessLevel
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return User[]
		*/
		public static function LoadArrayByAccessLevel($intAccessLevel, $objOptionalClauses = null) {
			// Call User::QueryArray to perform the LoadArrayByAccessLevel query
			try {
				return User::QueryArray(
					QQ::Equal(QQN::User()->AccessLevel, $intAccessLevel),
					$objOptionalClauses
					);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Count Users
		 * by AccessLevel Index(es)
		 * @param integer $intAccessLevel
		 * @return int
		*/
		public static function CountByAccessLevel($intAccessLevel, $objOptionalClauses = null) {
			// Call User::QueryCount to perform the CountByAccessLevel query
			return User::QueryCount(
				QQ::Equal(QQN::User()->AccessLevel, $intAccessLevel)
			, $objOptionalClauses
			);
		}



		////////////////////////////////////////////////////
		// INDEX-BASED LOAD METHODS (Array via Many to Many)
		////////////////////////////////////////////////////
			/**
		 * Load an array of CharityPartner objects for a given CharityPartnerAsCharity
		 * via the user_charity_assn table
		 * @param integer $intCharityId
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return User[]
		*/
		public static function LoadArrayByCharityPartnerAsCharity($intCharityId, $objOptionalClauses = null) {
			// Call User::QueryArray to perform the LoadArrayByCharityPartnerAsCharity query
			try {
				return User::QueryArray(
					QQ::Equal(QQN::User()->CharityPartnerAsCharity->CharityId, $intCharityId),
					$objOptionalClauses
				);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Count Users for a given CharityPartnerAsCharity
		 * via the user_charity_assn table
		 * @param integer $intCharityId
		 * @return int
		*/
		public static function CountByCharityPartnerAsCharity($intCharityId, $objOptionalClauses = null) {
			return User::QueryCount(
				QQ::Equal(QQN::User()->CharityPartnerAsCharity->CharityId, $intCharityId),
				$objOptionalClauses
			);
		}
			/**
		 * Load an array of FashionPartner objects for a given FashionPartnerAsFashion
		 * via the user_fashion_assn table
		 * @param integer $intFashionId
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return User[]
		*/
		public static function LoadArrayByFashionPartnerAsFashion($intFashionId, $objOptionalClauses = null) {
			// Call User::QueryArray to perform the LoadArrayByFashionPartnerAsFashion query
			try {
				return User::QueryArray(
					QQ::Equal(QQN::User()->FashionPartnerAsFashion->FashionId, $intFashionId),
					$objOptionalClauses
				);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Count Users for a given FashionPartnerAsFashion
		 * via the user_fashion_assn table
		 * @param integer $intFashionId
		 * @return int
		*/
		public static function CountByFashionPartnerAsFashion($intFashionId, $objOptionalClauses = null) {
			return User::QueryCount(
				QQ::Equal(QQN::User()->FashionPartnerAsFashion->FashionId, $intFashionId),
				$objOptionalClauses
			);
		}




		//////////////////////////////////////
		// SAVE, DELETE, RELOAD and JOURNALING
		//////////////////////////////////////

		/**
		 * Save this User
		 * @param bool $blnForceInsert
		 * @param bool $blnForceUpdate
		 * @return int
		 */
		public function Save($blnForceInsert = false, $blnForceUpdate = false) {
			// Get the Database Object for this Class
			$objDatabase = User::GetDatabase();

			$mixToReturn = null;

			try {
				if ((!$this->__blnRestored) || ($blnForceInsert)) {
					// Perform an INSERT query
					$objDatabase->NonQuery('
						INSERT INTO `user` (
							`username`,
							`password`,
							`email`,
							`first_name`,
							`last_name`,
							`access_level`
						) VALUES (
							' . $objDatabase->SqlVariable($this->strUsername) . ',
							' . $objDatabase->SqlVariable($this->strPassword) . ',
							' . $objDatabase->SqlVariable($this->strEmail) . ',
							' . $objDatabase->SqlVariable($this->strFirstName) . ',
							' . $objDatabase->SqlVariable($this->strLastName) . ',
							' . $objDatabase->SqlVariable($this->intAccessLevel) . '
						)
					');

					// Update Identity column and return its value
					$mixToReturn = $this->intId = $objDatabase->InsertId('user', 'id');

					// Journaling
					if ($objDatabase->JournalingDatabase) $this->Journal('INSERT');

				} else {
					// Perform an UPDATE query

					// First checking for Optimistic Locking constraints (if applicable)

					// Perform the UPDATE query
					$objDatabase->NonQuery('
						UPDATE
							`user`
						SET
							`username` = ' . $objDatabase->SqlVariable($this->strUsername) . ',
							`password` = ' . $objDatabase->SqlVariable($this->strPassword) . ',
							`email` = ' . $objDatabase->SqlVariable($this->strEmail) . ',
							`first_name` = ' . $objDatabase->SqlVariable($this->strFirstName) . ',
							`last_name` = ' . $objDatabase->SqlVariable($this->strLastName) . ',
							`access_level` = ' . $objDatabase->SqlVariable($this->intAccessLevel) . '
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
		 * Delete this User
		 * @return void
		 */
		public function Delete() {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Cannot delete this User with an unset primary key.');

			// Get the Database Object for this Class
			$objDatabase = User::GetDatabase();


			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`user`
				WHERE
					`id` = ' . $objDatabase->SqlVariable($this->intId) . '');

			// Journaling
			if ($objDatabase->JournalingDatabase) $this->Journal('DELETE');
		}

		/**
		 * Delete all Users
		 * @return void
		 */
		public static function DeleteAll() {
			// Get the Database Object for this Class
			$objDatabase = User::GetDatabase();

			// Perform the Query
			$objDatabase->NonQuery('
				DELETE FROM
					`user`');
		}

		/**
		 * Truncate user table
		 * @return void
		 */
		public static function Truncate() {
			// Get the Database Object for this Class
			$objDatabase = User::GetDatabase();

			// Perform the Query
			$objDatabase->NonQuery('
				TRUNCATE `user`');
		}

		/**
		 * Reload this User from the database.
		 * @return void
		 */
		public function Reload() {
			// Make sure we are actually Restored from the database
			if (!$this->__blnRestored)
				throw new QCallerException('Cannot call Reload() on a new, unsaved User object.');

			// Reload the Object
			$objReloaded = User::Load($this->intId);

			// Update $this's local variables to match
			$this->strUsername = $objReloaded->strUsername;
			$this->strPassword = $objReloaded->strPassword;
			$this->strEmail = $objReloaded->strEmail;
			$this->strFirstName = $objReloaded->strFirstName;
			$this->strLastName = $objReloaded->strLastName;
			$this->AccessLevel = $objReloaded->AccessLevel;
		}

		/**
		 * Journals the current object into the Log database.
		 * Used internally as a helper method.
		 * @param string $strJournalCommand
		 */
		public function Journal($strJournalCommand) {
			$objDatabase = User::GetDatabase()->JournalingDatabase;

			$objDatabase->NonQuery('
				INSERT INTO `user` (
					`id`,
					`username`,
					`password`,
					`email`,
					`first_name`,
					`last_name`,
					`access_level`,
					__sys_login_id,
					__sys_action,
					__sys_date
				) VALUES (
					' . $objDatabase->SqlVariable($this->intId) . ',
					' . $objDatabase->SqlVariable($this->strUsername) . ',
					' . $objDatabase->SqlVariable($this->strPassword) . ',
					' . $objDatabase->SqlVariable($this->strEmail) . ',
					' . $objDatabase->SqlVariable($this->strFirstName) . ',
					' . $objDatabase->SqlVariable($this->strLastName) . ',
					' . $objDatabase->SqlVariable($this->intAccessLevel) . ',
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
		 * @return User[]
		 */
		public static function GetJournalForId($intId) {
			$objDatabase = User::GetDatabase()->JournalingDatabase;

			$objResult = $objDatabase->Query('SELECT * FROM user WHERE id = ' .
				$objDatabase->SqlVariable($intId) . ' ORDER BY __sys_date');

			return User::InstantiateDbResult($objResult);
		}

		/**
		 * Gets the historical journal for this object from the log database.
		 * Objects will have VirtualAttributes available to lookup login, date, and action information from the journal object.
		 * @return User[]
		 */
		public function GetJournal() {
			return User::GetJournalForId($this->intId);
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

				case 'Username':
					// Gets the value for strUsername 
					// @return string
					return $this->strUsername;

				case 'Password':
					// Gets the value for strPassword 
					// @return string
					return $this->strPassword;

				case 'Email':
					// Gets the value for strEmail 
					// @return string
					return $this->strEmail;

				case 'FirstName':
					// Gets the value for strFirstName 
					// @return string
					return $this->strFirstName;

				case 'LastName':
					// Gets the value for strLastName 
					// @return string
					return $this->strLastName;

				case 'AccessLevel':
					// Gets the value for intAccessLevel 
					// @return integer
					return $this->intAccessLevel;


				///////////////////
				// Member Objects
				///////////////////
				case 'AccessLevelObject':
					// Gets the value for the AccessLevel object referenced by intAccessLevel 
					// @return AccessLevel
					try {
						if ((!$this->objAccessLevelObject) && (!is_null($this->intAccessLevel)))
							$this->objAccessLevelObject = AccessLevel::Load($this->intAccessLevel);
						return $this->objAccessLevelObject;
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}


				////////////////////////////
				// Virtual Object References (Many to Many and Reverse References)
				// (If restored via a "Many-to" expansion)
				////////////////////////////

				case '_CharityPartnerAsCharity':
					// Gets the value for the private _objCharityPartnerAsCharity (Read-Only)
					// if set due to an expansion on the user_charity_assn association table
					// @return CharityPartner
					return $this->_objCharityPartnerAsCharity;

				case '_CharityPartnerAsCharityArray':
					// Gets the value for the private _objCharityPartnerAsCharityArray (Read-Only)
					// if set due to an ExpandAsArray on the user_charity_assn association table
					// @return CharityPartner[]
					return (array) $this->_objCharityPartnerAsCharityArray;

				case '_FashionPartnerAsFashion':
					// Gets the value for the private _objFashionPartnerAsFashion (Read-Only)
					// if set due to an expansion on the user_fashion_assn association table
					// @return FashionPartner
					return $this->_objFashionPartnerAsFashion;

				case '_FashionPartnerAsFashionArray':
					// Gets the value for the private _objFashionPartnerAsFashionArray (Read-Only)
					// if set due to an ExpandAsArray on the user_fashion_assn association table
					// @return FashionPartner[]
					return (array) $this->_objFashionPartnerAsFashionArray;


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
				case 'Username':
					// Sets the value for strUsername 
					// @param string $mixValue
					// @return string
					try {
						return ($this->strUsername = QType::Cast($mixValue, QType::String));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'Password':
					// Sets the value for strPassword 
					// @param string $mixValue
					// @return string
					try {
						return ($this->strPassword = QType::Cast($mixValue, QType::String));
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

				case 'FirstName':
					// Sets the value for strFirstName 
					// @param string $mixValue
					// @return string
					try {
						return ($this->strFirstName = QType::Cast($mixValue, QType::String));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'LastName':
					// Sets the value for strLastName 
					// @param string $mixValue
					// @return string
					try {
						return ($this->strLastName = QType::Cast($mixValue, QType::String));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'AccessLevel':
					// Sets the value for intAccessLevel 
					// @param integer $mixValue
					// @return integer
					try {
						$this->objAccessLevelObject = null;
						return ($this->intAccessLevel = QType::Cast($mixValue, QType::Integer));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}


				///////////////////
				// Member Objects
				///////////////////
				case 'AccessLevelObject':
					// Sets the value for the AccessLevel object referenced by intAccessLevel 
					// @param AccessLevel $mixValue
					// @return AccessLevel
					if (is_null($mixValue)) {
						$this->intAccessLevel = null;
						$this->objAccessLevelObject = null;
						return null;
					} else {
						// Make sure $mixValue actually is a AccessLevel object
						try {
							$mixValue = QType::Cast($mixValue, 'AccessLevel');
						} catch (QInvalidCastException $objExc) {
							$objExc->IncrementOffset();
							throw $objExc;
						} 

						// Make sure $mixValue is a SAVED AccessLevel object
						if (is_null($mixValue->Id))
							throw new QCallerException('Unable to set an unsaved AccessLevelObject for this User');

						// Update Local Member Variables
						$this->objAccessLevelObject = $mixValue;
						$this->intAccessLevel = $mixValue->Id;

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

			
		// Related Many-to-Many Objects' Methods for CharityPartnerAsCharity
		//-------------------------------------------------------------------

		/**
		 * Gets all many-to-many associated CharityPartnersAsCharity as an array of CharityPartner objects
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return CharityPartner[]
		*/ 
		public function GetCharityPartnerAsCharityArray($objOptionalClauses = null) {
			if ((is_null($this->intId)))
				return array();

			try {
				return CharityPartner::LoadArrayByUserAsCharity($this->intId, $objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Counts all many-to-many associated CharityPartnersAsCharity
		 * @return int
		*/ 
		public function CountCharityPartnersAsCharity() {
			if ((is_null($this->intId)))
				return 0;

			return CharityPartner::CountByUserAsCharity($this->intId);
		}

		/**
		 * Checks to see if an association exists with a specific CharityPartnerAsCharity
		 * @param CharityPartner $objCharityPartner
		 * @return bool
		*/
		public function IsCharityPartnerAsCharityAssociated(CharityPartner $objCharityPartner) {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call IsCharityPartnerAsCharityAssociated on this unsaved User.');
			if ((is_null($objCharityPartner->Id)))
				throw new QUndefinedPrimaryKeyException('Unable to call IsCharityPartnerAsCharityAssociated on this User with an unsaved CharityPartner.');

			$intRowCount = User::QueryCount(
				QQ::AndCondition(
					QQ::Equal(QQN::User()->Id, $this->intId),
					QQ::Equal(QQN::User()->CharityPartnerAsCharity->CharityId, $objCharityPartner->Id)
				)
			);

			return ($intRowCount > 0);
		}

		/**
		 * Journals the CharityPartnerAsCharity relationship into the Log database.
		 * Used internally as a helper method.
		 * @param string $strJournalCommand
		 */
		public function JournalCharityPartnerAsCharityAssociation($intAssociatedId, $strJournalCommand) {
			$objDatabase = User::GetDatabase()->JournalingDatabase;

			$objDatabase->NonQuery('
				INSERT INTO `user_charity_assn` (
					`user_id`,
					`charity_id`,
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
		 * Gets the historical journal for an object's CharityPartnerAsCharity relationship from the log database.
		 * @param integer intId
		 * @return QDatabaseResult $objResult
		 */
		public static function GetJournalCharityPartnerAsCharityAssociationForId($intId) {
			$objDatabase = User::GetDatabase()->JournalingDatabase;

			return $objDatabase->Query('SELECT * FROM user_charity_assn WHERE user_id = ' .
				$objDatabase->SqlVariable($intId) . ' ORDER BY __sys_date');
		}

		/**
		 * Gets the historical journal for this object's CharityPartnerAsCharity relationship from the log database.
		 * @return QDatabaseResult $objResult
		 */
		public function GetJournalCharityPartnerAsCharityAssociation() {
			return User::GetJournalCharityPartnerAsCharityAssociationForId($this->intId);
		}

		/**
		 * Associates a CharityPartnerAsCharity
		 * @param CharityPartner $objCharityPartner
		 * @return void
		*/ 
		public function AssociateCharityPartnerAsCharity(CharityPartner $objCharityPartner) {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call AssociateCharityPartnerAsCharity on this unsaved User.');
			if ((is_null($objCharityPartner->Id)))
				throw new QUndefinedPrimaryKeyException('Unable to call AssociateCharityPartnerAsCharity on this User with an unsaved CharityPartner.');

			// Get the Database Object for this Class
			$objDatabase = User::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				INSERT INTO `user_charity_assn` (
					`user_id`,
					`charity_id`
				) VALUES (
					' . $objDatabase->SqlVariable($this->intId) . ',
					' . $objDatabase->SqlVariable($objCharityPartner->Id) . '
				)
			');

			// Journaling (if applicable)
			if ($objDatabase->JournalingDatabase)
				$this->JournalCharityPartnerAsCharityAssociation($objCharityPartner->Id, 'INSERT');
		}

		/**
		 * Unassociates a CharityPartnerAsCharity
		 * @param CharityPartner $objCharityPartner
		 * @return void
		*/ 
		public function UnassociateCharityPartnerAsCharity(CharityPartner $objCharityPartner) {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateCharityPartnerAsCharity on this unsaved User.');
			if ((is_null($objCharityPartner->Id)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateCharityPartnerAsCharity on this User with an unsaved CharityPartner.');

			// Get the Database Object for this Class
			$objDatabase = User::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`user_charity_assn`
				WHERE
					`user_id` = ' . $objDatabase->SqlVariable($this->intId) . ' AND
					`charity_id` = ' . $objDatabase->SqlVariable($objCharityPartner->Id) . '
			');

			// Journaling (if applicable)
			if ($objDatabase->JournalingDatabase)
				$this->JournalCharityPartnerAsCharityAssociation($objCharityPartner->Id, 'DELETE');
		}

		/**
		 * Unassociates all CharityPartnersAsCharity
		 * @return void
		*/ 
		public function UnassociateAllCharityPartnersAsCharity() {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateAllCharityPartnerAsCharityArray on this unsaved User.');

			// Get the Database Object for this Class
			$objDatabase = User::GetDatabase();

			// Journaling (if applicable)
			if ($objDatabase->JournalingDatabase) {
				$objResult = $objDatabase->Query('SELECT `charity_id` AS associated_id FROM `user_charity_assn` WHERE `user_id` = ' . $objDatabase->SqlVariable($this->intId));
				while ($objRow = $objResult->GetNextRow()) {
					$this->JournalCharityPartnerAsCharityAssociation($objRow->GetColumn('associated_id'), 'DELETE');
				}
			}

			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`user_charity_assn`
				WHERE
					`user_id` = ' . $objDatabase->SqlVariable($this->intId) . '
			');
		}
			
		// Related Many-to-Many Objects' Methods for FashionPartnerAsFashion
		//-------------------------------------------------------------------

		/**
		 * Gets all many-to-many associated FashionPartnersAsFashion as an array of FashionPartner objects
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return FashionPartner[]
		*/ 
		public function GetFashionPartnerAsFashionArray($objOptionalClauses = null) {
			if ((is_null($this->intId)))
				return array();

			try {
				return FashionPartner::LoadArrayByUserAsFashion($this->intId, $objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Counts all many-to-many associated FashionPartnersAsFashion
		 * @return int
		*/ 
		public function CountFashionPartnersAsFashion() {
			if ((is_null($this->intId)))
				return 0;

			return FashionPartner::CountByUserAsFashion($this->intId);
		}

		/**
		 * Checks to see if an association exists with a specific FashionPartnerAsFashion
		 * @param FashionPartner $objFashionPartner
		 * @return bool
		*/
		public function IsFashionPartnerAsFashionAssociated(FashionPartner $objFashionPartner) {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call IsFashionPartnerAsFashionAssociated on this unsaved User.');
			if ((is_null($objFashionPartner->Id)))
				throw new QUndefinedPrimaryKeyException('Unable to call IsFashionPartnerAsFashionAssociated on this User with an unsaved FashionPartner.');

			$intRowCount = User::QueryCount(
				QQ::AndCondition(
					QQ::Equal(QQN::User()->Id, $this->intId),
					QQ::Equal(QQN::User()->FashionPartnerAsFashion->FashionId, $objFashionPartner->Id)
				)
			);

			return ($intRowCount > 0);
		}

		/**
		 * Journals the FashionPartnerAsFashion relationship into the Log database.
		 * Used internally as a helper method.
		 * @param string $strJournalCommand
		 */
		public function JournalFashionPartnerAsFashionAssociation($intAssociatedId, $strJournalCommand) {
			$objDatabase = User::GetDatabase()->JournalingDatabase;

			$objDatabase->NonQuery('
				INSERT INTO `user_fashion_assn` (
					`user_id`,
					`fashion_id`,
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
		 * Gets the historical journal for an object's FashionPartnerAsFashion relationship from the log database.
		 * @param integer intId
		 * @return QDatabaseResult $objResult
		 */
		public static function GetJournalFashionPartnerAsFashionAssociationForId($intId) {
			$objDatabase = User::GetDatabase()->JournalingDatabase;

			return $objDatabase->Query('SELECT * FROM user_fashion_assn WHERE user_id = ' .
				$objDatabase->SqlVariable($intId) . ' ORDER BY __sys_date');
		}

		/**
		 * Gets the historical journal for this object's FashionPartnerAsFashion relationship from the log database.
		 * @return QDatabaseResult $objResult
		 */
		public function GetJournalFashionPartnerAsFashionAssociation() {
			return User::GetJournalFashionPartnerAsFashionAssociationForId($this->intId);
		}

		/**
		 * Associates a FashionPartnerAsFashion
		 * @param FashionPartner $objFashionPartner
		 * @return void
		*/ 
		public function AssociateFashionPartnerAsFashion(FashionPartner $objFashionPartner) {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call AssociateFashionPartnerAsFashion on this unsaved User.');
			if ((is_null($objFashionPartner->Id)))
				throw new QUndefinedPrimaryKeyException('Unable to call AssociateFashionPartnerAsFashion on this User with an unsaved FashionPartner.');

			// Get the Database Object for this Class
			$objDatabase = User::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				INSERT INTO `user_fashion_assn` (
					`user_id`,
					`fashion_id`
				) VALUES (
					' . $objDatabase->SqlVariable($this->intId) . ',
					' . $objDatabase->SqlVariable($objFashionPartner->Id) . '
				)
			');

			// Journaling (if applicable)
			if ($objDatabase->JournalingDatabase)
				$this->JournalFashionPartnerAsFashionAssociation($objFashionPartner->Id, 'INSERT');
		}

		/**
		 * Unassociates a FashionPartnerAsFashion
		 * @param FashionPartner $objFashionPartner
		 * @return void
		*/ 
		public function UnassociateFashionPartnerAsFashion(FashionPartner $objFashionPartner) {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateFashionPartnerAsFashion on this unsaved User.');
			if ((is_null($objFashionPartner->Id)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateFashionPartnerAsFashion on this User with an unsaved FashionPartner.');

			// Get the Database Object for this Class
			$objDatabase = User::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`user_fashion_assn`
				WHERE
					`user_id` = ' . $objDatabase->SqlVariable($this->intId) . ' AND
					`fashion_id` = ' . $objDatabase->SqlVariable($objFashionPartner->Id) . '
			');

			// Journaling (if applicable)
			if ($objDatabase->JournalingDatabase)
				$this->JournalFashionPartnerAsFashionAssociation($objFashionPartner->Id, 'DELETE');
		}

		/**
		 * Unassociates all FashionPartnersAsFashion
		 * @return void
		*/ 
		public function UnassociateAllFashionPartnersAsFashion() {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateAllFashionPartnerAsFashionArray on this unsaved User.');

			// Get the Database Object for this Class
			$objDatabase = User::GetDatabase();

			// Journaling (if applicable)
			if ($objDatabase->JournalingDatabase) {
				$objResult = $objDatabase->Query('SELECT `fashion_id` AS associated_id FROM `user_fashion_assn` WHERE `user_id` = ' . $objDatabase->SqlVariable($this->intId));
				while ($objRow = $objResult->GetNextRow()) {
					$this->JournalFashionPartnerAsFashionAssociation($objRow->GetColumn('associated_id'), 'DELETE');
				}
			}

			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`user_fashion_assn`
				WHERE
					`user_id` = ' . $objDatabase->SqlVariable($this->intId) . '
			');
		}




		////////////////////////////////////////
		// METHODS for SOAP-BASED WEB SERVICES
		////////////////////////////////////////

		public static function GetSoapComplexTypeXml() {
			$strToReturn = '<complexType name="User"><sequence>';
			$strToReturn .= '<element name="Id" type="xsd:int"/>';
			$strToReturn .= '<element name="Username" type="xsd:string"/>';
			$strToReturn .= '<element name="Password" type="xsd:string"/>';
			$strToReturn .= '<element name="Email" type="xsd:string"/>';
			$strToReturn .= '<element name="FirstName" type="xsd:string"/>';
			$strToReturn .= '<element name="LastName" type="xsd:string"/>';
			$strToReturn .= '<element name="AccessLevelObject" type="xsd1:AccessLevel"/>';
			$strToReturn .= '<element name="__blnRestored" type="xsd:boolean"/>';
			$strToReturn .= '</sequence></complexType>';
			return $strToReturn;
		}

		public static function AlterSoapComplexTypeArray(&$strComplexTypeArray) {
			if (!array_key_exists('User', $strComplexTypeArray)) {
				$strComplexTypeArray['User'] = User::GetSoapComplexTypeXml();
				AccessLevel::AlterSoapComplexTypeArray($strComplexTypeArray);
			}
		}

		public static function GetArrayFromSoapArray($objSoapArray) {
			$objArrayToReturn = array();

			foreach ($objSoapArray as $objSoapObject)
				array_push($objArrayToReturn, User::GetObjectFromSoapObject($objSoapObject));

			return $objArrayToReturn;
		}

		public static function GetObjectFromSoapObject($objSoapObject) {
			$objToReturn = new User();
			if (property_exists($objSoapObject, 'Id'))
				$objToReturn->intId = $objSoapObject->Id;
			if (property_exists($objSoapObject, 'Username'))
				$objToReturn->strUsername = $objSoapObject->Username;
			if (property_exists($objSoapObject, 'Password'))
				$objToReturn->strPassword = $objSoapObject->Password;
			if (property_exists($objSoapObject, 'Email'))
				$objToReturn->strEmail = $objSoapObject->Email;
			if (property_exists($objSoapObject, 'FirstName'))
				$objToReturn->strFirstName = $objSoapObject->FirstName;
			if (property_exists($objSoapObject, 'LastName'))
				$objToReturn->strLastName = $objSoapObject->LastName;
			if ((property_exists($objSoapObject, 'AccessLevelObject')) &&
				($objSoapObject->AccessLevelObject))
				$objToReturn->AccessLevelObject = AccessLevel::GetObjectFromSoapObject($objSoapObject->AccessLevelObject);
			if (property_exists($objSoapObject, '__blnRestored'))
				$objToReturn->__blnRestored = $objSoapObject->__blnRestored;
			return $objToReturn;
		}

		public static function GetSoapArrayFromArray($objArray) {
			if (!$objArray)
				return null;

			$objArrayToReturn = array();

			foreach ($objArray as $objObject)
				array_push($objArrayToReturn, User::GetSoapObjectFromObject($objObject, true));

			return unserialize(serialize($objArrayToReturn));
		}

		public static function GetSoapObjectFromObject($objObject, $blnBindRelatedObjects) {
			if ($objObject->objAccessLevelObject)
				$objObject->objAccessLevelObject = AccessLevel::GetSoapObjectFromObject($objObject->objAccessLevelObject, false);
			else if (!$blnBindRelatedObjects)
				$objObject->intAccessLevel = null;
			return $objObject;
		}




	}



	/////////////////////////////////////
	// ADDITIONAL CLASSES for QCODO QUERY
	/////////////////////////////////////

	/**
	 * @property-read QQNode $CharityId
	 * @property-read QQNodeCharityPartner $CharityPartner
	 * @property-read QQNodeCharityPartner $_ChildTableNode
	 */
	class QQNodeUserCharityPartnerAsCharity extends QQAssociationNode {
		protected $strType = 'association';
		protected $strName = 'charitypartnerascharity';

		protected $strTableName = 'user_charity_assn';
		protected $strPrimaryKey = 'user_id';
		protected $strClassName = 'CharityPartner';

		public function __get($strName) {
			switch ($strName) {
				case 'CharityId':
					return new QQNode('charity_id', 'CharityId', 'integer', $this);
				case 'CharityPartner':
					return new QQNodeCharityPartner('charity_id', 'CharityId', 'integer', $this);
				case '_ChildTableNode':
					return new QQNodeCharityPartner('charity_id', 'CharityId', 'integer', $this);
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
	 * @property-read QQNode $FashionId
	 * @property-read QQNodeFashionPartner $FashionPartner
	 * @property-read QQNodeFashionPartner $_ChildTableNode
	 */
	class QQNodeUserFashionPartnerAsFashion extends QQAssociationNode {
		protected $strType = 'association';
		protected $strName = 'fashionpartnerasfashion';

		protected $strTableName = 'user_fashion_assn';
		protected $strPrimaryKey = 'user_id';
		protected $strClassName = 'FashionPartner';

		public function __get($strName) {
			switch ($strName) {
				case 'FashionId':
					return new QQNode('fashion_id', 'FashionId', 'integer', $this);
				case 'FashionPartner':
					return new QQNodeFashionPartner('fashion_id', 'FashionId', 'integer', $this);
				case '_ChildTableNode':
					return new QQNodeFashionPartner('fashion_id', 'FashionId', 'integer', $this);
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
	 * @property-read QQNode $Username
	 * @property-read QQNode $Password
	 * @property-read QQNode $Email
	 * @property-read QQNode $FirstName
	 * @property-read QQNode $LastName
	 * @property-read QQNode $AccessLevel
	 * @property-read QQNodeAccessLevel $AccessLevelObject
	 * @property-read QQNodeUserCharityPartnerAsCharity $CharityPartnerAsCharity
	 * @property-read QQNodeUserFashionPartnerAsFashion $FashionPartnerAsFashion
	 */
	class QQNodeUser extends QQNode {
		protected $strTableName = 'user';
		protected $strPrimaryKey = 'id';
		protected $strClassName = 'User';
		public function __get($strName) {
			switch ($strName) {
				case 'Id':
					return new QQNode('id', 'Id', 'integer', $this);
				case 'Username':
					return new QQNode('username', 'Username', 'string', $this);
				case 'Password':
					return new QQNode('password', 'Password', 'string', $this);
				case 'Email':
					return new QQNode('email', 'Email', 'string', $this);
				case 'FirstName':
					return new QQNode('first_name', 'FirstName', 'string', $this);
				case 'LastName':
					return new QQNode('last_name', 'LastName', 'string', $this);
				case 'AccessLevel':
					return new QQNode('access_level', 'AccessLevel', 'integer', $this);
				case 'AccessLevelObject':
					return new QQNodeAccessLevel('access_level', 'AccessLevelObject', 'integer', $this);
				case 'CharityPartnerAsCharity':
					return new QQNodeUserCharityPartnerAsCharity($this);
				case 'FashionPartnerAsFashion':
					return new QQNodeUserFashionPartnerAsFashion($this);

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
	 * @property-read QQNode $Username
	 * @property-read QQNode $Password
	 * @property-read QQNode $Email
	 * @property-read QQNode $FirstName
	 * @property-read QQNode $LastName
	 * @property-read QQNode $AccessLevel
	 * @property-read QQNodeAccessLevel $AccessLevelObject
	 * @property-read QQNodeUserCharityPartnerAsCharity $CharityPartnerAsCharity
	 * @property-read QQNodeUserFashionPartnerAsFashion $FashionPartnerAsFashion
	 * @property-read QQNode $_PrimaryKeyNode
	 */
	class QQReverseReferenceNodeUser extends QQReverseReferenceNode {
		protected $strTableName = 'user';
		protected $strPrimaryKey = 'id';
		protected $strClassName = 'User';
		public function __get($strName) {
			switch ($strName) {
				case 'Id':
					return new QQNode('id', 'Id', 'integer', $this);
				case 'Username':
					return new QQNode('username', 'Username', 'string', $this);
				case 'Password':
					return new QQNode('password', 'Password', 'string', $this);
				case 'Email':
					return new QQNode('email', 'Email', 'string', $this);
				case 'FirstName':
					return new QQNode('first_name', 'FirstName', 'string', $this);
				case 'LastName':
					return new QQNode('last_name', 'LastName', 'string', $this);
				case 'AccessLevel':
					return new QQNode('access_level', 'AccessLevel', 'integer', $this);
				case 'AccessLevelObject':
					return new QQNodeAccessLevel('access_level', 'AccessLevelObject', 'integer', $this);
				case 'CharityPartnerAsCharity':
					return new QQNodeUserCharityPartnerAsCharity($this);
				case 'FashionPartnerAsFashion':
					return new QQNodeUserFashionPartnerAsFashion($this);

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