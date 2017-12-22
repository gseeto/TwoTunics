<?php
	/**
	 * The UnitType class defined here contains
	 * code for the UnitType enumerated type.  It represents
	 * the enumerated values found in the "unit_type" table
	 * in the database.
	 * 
	 * To use, you should use the UnitType subclass which
	 * extends this UnitTypeGen class.
	 * 
	 * Because subsequent re-code generations will overwrite any changes to this
	 * file, you should leave this file unaltered to prevent yourself from losing
	 * any information or code changes.  All customizations should be done by
	 * overriding existing or implementing new methods, properties and variables
	 * in the UnitType class.
	 * 
	 * @package My Application
	 * @subpackage GeneratedDataObjects
	 */
	abstract class UnitTypeGen extends QBaseClass {

		const MaxId = 0;

		public static $NameArray = array();

		public static $TokenArray = array();

		public static function ToString($intUnitTypeId) {
			switch ($intUnitTypeId) {
				default:
					throw new QCallerException(sprintf('Invalid intUnitTypeId: %s', $intUnitTypeId));
			}
		}

		public static function ToToken($intUnitTypeId) {
			switch ($intUnitTypeId) {
				default:
					throw new QCallerException(sprintf('Invalid intUnitTypeId: %s', $intUnitTypeId));
			}
		}

	}
?>