<?php
class UserWidget extends QDialogBox {
	// Public child controls
	public $txtFirstName;
	public $txtLastName;
	public $txtEmail;
	public $txtUsername;
	public $txtPassword;
	public $lstAccessLevel;
	public $btnSubmit;
	public $btnCancel;
	public $lblDebug;
	
	// Object Variables
    protected $strCloseCallback;  
    protected $bCreateUser; 
    protected $iUserId;
    protected $objUser;
        
    // Default Overrides
    protected $blnMatteClickable = false;
    protected $strTemplate = 'UserWidget.tpl.php';
	
     public function __construct($strCloseCallback, $objParentObject, $strControlId = null) {
            parent::__construct($objParentObject, $strControlId);
            $this->strCloseCallback = $strCloseCallback;
            
            $this->lblDebug = new QLabel($this);
            $this->lblDebug->HtmlEntities = false;
            
            $this->lblDebug->Text = 'Debugging...';
            $this->txtFirstName = new QTextBox($this);
            $this->txtFirstName->Name = 'First Name';
            $this->txtFirstName->Required = true;
            
            $this->txtLastName = new QTextBox($this);
            $this->txtLastName->Name = 'Last Name';
            $this->txtLastName->Required = true;
            
            $this->txtEmail = new QTextBox($this);
            $this->txtEmail->Name = 'Email';
            
            $this->txtUsername = new QTextBox($this);
            $this->txtUsername->Name = 'Username';
            
            $this->txtPassword = new QTextBox($this);
            $this->txtPassword->Name = 'Password';
			$this->txtPassword->TextMode = QTextMode::Password;
			$this->txtPassword->Required = true;
			$this->txtPassword->CausesValidation = true;
			
			$this->lstAccessLevel = new QListBox($this);
			$arrAccessLevels = AccessLevel::LoadAll();
			foreach($arrAccessLevels as $objLevel)
				$this->lstAccessLevel->AddItem($objLevel->Value, $objLevel->Id);
			
			$this->btnSubmit = new QButton($this);
			$this->btnSubmit->Text = 'Submit';
			$this->btnSubmit->CausesValidation = true;
			$this->btnSubmit->CssClass = 'btn btn-primary';
			$this->btnSubmit->AddAction(new QClickEvent(), new QAjaxControlAction($this, 'btnSubmit_Click'));
			
			$this->btnCancel = new QButton($this);
            $this->btnCancel->Text = 'Cancel';
            $this->btnCancel->CssClass = 'btn btn-primary';
            $this->btnCancel->AddAction(new QClickEvent(), new QAjaxControlAction($this, 'btnCancel_Click'));
            
            $this->lblDebug->Text .= 'userId passed = '.$this->iUserId;
            $this->lblDebug->Text .= '<br>bCreateUser = '.$this->bCreateUser;
            
     }
     
	public function btnCancel_Click() {
		$this->HideDialogBox();
   }
        
   public function btnSubmit_Click() {
   	// If Create is set then create user, else update.
   	if($this->bCreateUser){
   		$objUser = new User();
   		$objUser->FirstName = $this->txtFirstName->Text;
		$objUser->LastName = $this->txtLastName->Text;
		$objUser->Email = $this->txtEmail->Text;
		$objUser->Username = $this->txtUsername->Text;
		$objUser->Password = $this->txtPassword->Text;
		$objUser->AccessLevel = $this->lstAccessLevel->SelectedValue;
		$objUser->Save();
   	} else {
   		$this->objUser->FirstName = $this->txtFirstName->Text;
        $this->objUser->LastName = $this->txtLastName->Text;
        $this->objUser->Email = $this->txtEmail->Text;
        $this->objUser->Username = $this->txtUsername->Text;
        $this->objUser->Password = $this->txtPassword->Text;
        $this->objUser->AccessLevel = $this->lstAccessLevel->SelectedValue;
        $this->objUser->Save();
   	}
   	call_user_func(array($this->objForm, $this->strCloseCallback));
    $this->HideDialogBox();
   }

   public function ShowDialogBox() {
   	parent::ShowDialogBox(); 
   	if($this->iUserId != 0) {
   		$this->objUser = User::LoadById($this->iUserId);
   		if($this->objUser != null) {
   			$this->txtFirstName->Text = $this->objUser->FirstName;
   			$this->txtLastName->Text = $this->objUser->LastName;
   			$this->txtEmail->Text = $this->objUser->Email;
   			$this->txtUsername->Text = $this->objUser->Username;
   			$this->txtPassword->Text = $this->objUser->Password;
   			$this->lstAccessLevel->SelectedValue = $this->objUser->AccessLevel;
   		}
   	} else {
   		$this->objUser = null;
   	}
   	
   }

   /*
    * Get values from parent
    */
	public function __get($strName) {
            switch ($strName) {
                case "IsCreate": return $this->bCreateUser;
					break;
                case "UserId": return $this->iUserId;
                default:
                    try {
                        return parent::__get($strName);
                    } catch (QCallerException $objExc) {
                        $objExc->IncrementOffset();
                        throw $objExc;
                    }
            }
        }

        /*
         * Set values from parent
         */
        public function __set($strName, $mixValue) {
            $this->blnModified = true;

            switch ($strName) {
                case "IsCreate":
            		$this->bCreateUser = false;
                    try {                    
                        $this->bCreateUser = QType::Cast($mixValue, QType::Boolean);
                        break;
                    } catch (QInvalidCastException $objExc) {}                  
                     break;

                case "UserId":
                	$this->iUserId = 0;
                	try {                    
                        $this->iUserId = QType::Cast($mixValue, QType::Integer);
                        break;
                    } catch (QInvalidCastException $objExc) {}                  
                     break;
                     
                default:
                    try {
                        parent::__set($strName, $mixValue);
                    } catch (QCallerException $objExc) {
                        $objExc->IncrementOffset();
                        throw $objExc;
                    }
                    break;
            }
        }
}
?>