<?php
	/**
	 * The Application class is an abstract class that statically provides
	 * information and global utilities for the entire web application.
	 *
	 * Custom constants for this webapp, as well as global variables and global
	 * methods should be declared in this abstract class (declared statically).
	 *
	 * This Application class should extend from the ApplicationBase class in
	 * the framework.
	 */
	abstract class QApplication extends QApplicationBase {
		
		/////////////////////////////////////////////
		// Login-related Static Methods and Variables
		/////////////////////////////////////////////
		/**
		 * @var User
		 */
		public static $User;

		/**
		 * @var integer
		 */
		public static $UserId;
		
		/**
		 * This is called by the PHP5 Autoloader.  This method overrides the
		 * one in ApplicationBase.
		 *
		 * @return void
		 */
		public static function Autoload($strClassName) {
			// First use the Qcodo Autoloader
			if (!parent::Autoload($strClassName)) {
				// NOTE: Run any custom autoloading functionality (if any) here...
			}
		}

		/**
		 * Method will setup Internationalization.
		 * NOTE: This method has been INTENTIONALLY left incomplete.
		 * @return void
		 */
		public static function InitializeI18n() {
			if (isset($_SESSION)) {
				if (array_key_exists('country_code', $_SESSION))
					QApplication::$CountryCode = $_SESSION['country_code'];
				if (array_key_exists('language_code', $_SESSION))
					QApplication::$LanguageCode = $_SESSION['language_code'];
			}

			/*
			 * NOTE: This is where you would implement code to do Language Setting discovery, as well, for example:
			 *   Checking against $_GET['language_code']
			 *   checking against session (example provided below)
			 *   Checking the URL
			 *   etc.
			 * Options to do this are left to the developer.
			 */

			// Initialize I18n if QApplication::$LanguageCode is set
			if (QApplication::$LanguageCode)
				QI18n::Initialize();

			// Otherwise, you could optionally run with some defaults
			else {
				// QApplication::$CountryCode = 'us';
				// QApplication::$LanguageCode = 'en';
				// QI18n::Initialize();
			}
		}

		////////////////////////////
		// QApplication Customizations (e.g. EncodingType, Disallowing PHP Session, etc.)
		////////////////////////////
		// public static $EncodingType = 'ISO-8859-1';
		// public static $EnableSession = false;

		////////////////////////////
		// Additional Static Methods
		////////////////////////////
		// NOTE: Define any other custom global WebApplication functions (if any) here...
		
		/**
		 * Called by initialize_svfaces.inc.php to setup QApplication::$User
		 * from data in Session
		 * @return void
		 */
		public static function InitializeLogin() {
			
			if (array_key_exists('intUserId', $_SESSION)) {
				QApplication::$User = User::Load($_SESSION['intUserId']);

				// If NO object, update session
				if (!QApplication::$User) {
					$_SESSION['intUserId'] = null;
					unset($_SESSION['intUserId']);

				// Otherwise, process
				} else {
					// Make sure this User is allowed to use svFaces
					QApplication::$UserId = QApplication::$User->Id;
					

					// Update the NavBar based on User
					/*if (QApplication::$User->RoleTypeId != RoleType::ChMSAdministrator) {
						unset(ChmsForm::$NavSectionArray[ChmsForm::NavSectionAdministration]);
					}

					if (!QApplication::$User->IsPermissionAllowed(PermissionType::AccessStewardship)) {
						unset(ChmsForm::$NavSectionArray[ChmsForm::NavSectionStewardship]);
					}
					
					if (!QApplication::$User->IsPermissionAllowed(PermissionType::ManageClassifieds)) {
						unset(ChmsForm::$NavSectionArray[ChmsForm::NavSectionClassifieds]);
					}
					
					if (!QApplication::$User->IsPermissionAllowed(PermissionType::ManageClasses)) {
						ChmsForm::$NavSectionArray[ChmsForm::NavSectionEvents][0] = 'Events';
					}
					*/
				}
				
			}
		}
		
		/**
		 * Called by the UserForm to actually peform a User Login
		 * @param User $objUser
		 * @return void
		 */
		public static function Login(User $objUser) {
			QApplication::$User = $objUser;
			QApplication::$UserId = $objUser->Id;
			$_SESSION['intUserId'] = $objUser->Id;
		}
		
		/**
		 * Logs the user out (if applicable) and will redirect user to the login page
		 * @return void
		 */
		public static function Logout() {
			$_SESSION['intUserId'] = null;
			unset($_SESSION['intUserId']);
			QApplication::$User = null;
			QApplication::$UserId = null;
			QApplication::Redirect('/index.php');
		}
	}
?>