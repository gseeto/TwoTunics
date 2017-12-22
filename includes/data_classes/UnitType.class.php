<?php
	require(__DATAGEN_CLASSES__ . '/UnitTypeGen.class.php');

	/**
	 * The UnitType class defined here contains any
	 * customized code for the UnitType enumerated type. 
	 * 
	 * It represents the enumerated values found in the "unit_type" table in the database,
	 * and extends from the code generated abstract UnitTypeGen
	 * class, which contains all the values extracted from the database.
	 * 
	 * Type classes which are generally used to attach a type to data object.
	 * However, they may be used as simple database indepedant enumerated type.
	 * 
	 * @package My Application
	 * @subpackage DataObjects
	 */
	abstract class UnitType extends UnitTypeGen {
	}
?>