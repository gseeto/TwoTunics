<?php
class UserWidget extends QDialogBox {
	// Public child controls
	public $txtFirstName;
	public $txtLastName;
	public $txtEmail;
	public $txtUsername;
	public $txtPassword;
	public $lstAccessLevel;
	public $lstPartner;
	public $btnSubmit;
	public $btnCancel;
	
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
			$this->lstAccessLevel->AddAction(new QChangeEvent(), new QAjaxControlAction($this, 'lstAccessLevel_Change'));
			foreach($arrAccessLevels as $objLevel)
				$this->lstAccessLevel->AddItem($objLevel->Value, $objLevel->Id);
						
			$this->lstPartner = new QListBox($this);
			$this->lstPartner->HtmlBefore = 'Select Partner Organization this user is associated with:';
			$this->lstPartner->AddItem('-Select-', 0);
						
			$this->btnSubmit = new QButton($this);
			$this->btnSubmit->Text = 'Submit';
			$this->btnSubmit->CausesValidation = true;
			$this->btnSubmit->CssClass = 'btn btn-primary';
			$this->btnSubmit->AddAction(new QClickEvent(), new QAjaxControlAction($this, 'btnSubmit_Click'));
			
			$this->btnCancel = new QButton($this);
            $this->btnCancel->Text = 'Cancel';
            $this->btnCancel->CssClass = 'btn btn-primary';
            $this->btnCancel->AddAction(new QClickEvent(), new QAjaxControlAction($this, 'btnCancel_Click'));            
     }
     
     public function lstAccessLevel_Change() {
     	switch($this->lstAccessLevel->SelectedValue) {
     		case 1: // charity
     			$this->lstPartner->Display = true;
     			$this->lstPartner->RemoveAllItems();
     			$arrCharities = CharityPartner::LoadAll();
     			foreach($arrCharities as $objCharity)
					$this->lstPartner->AddItem($objCharity->Name, $objCharity->Id);
     			break;
     		case 2: // fashion
     			$this->lstPartner->Display = true;
     			$this->lstPartner->RemoveAllItems();
     			$arrFashion = FashionPartner::LoadAll();
     			foreach($arrFashion as $objFashion)
					$this->lstPartner->AddItem($objFashion->Name, $objFashion->Id);
     			break;
     		case 3: // Administrator - not applicable
     			$this->lstPartner->Display = false;
     			break;
     	}
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
		if($this->lstAccessLevel->SelectedValue == 1) {
			$objCharityPartner = CharityPartner::LoadById($this->lstPartner->SelectedValue);
			$objUser->AssociateCharityPartnerAsCharity($objCharityPartner);
		}else if ($this->lstAccessLevel->SelectedValue == 2) {
			$objFashionPartner = FashionPartner::LoadById($this->lstPartner->SelectedValue);
			$objUser->AssociateFashionPartnerAsFashion($objFashionPartner);
		}
		$objUser->Save();
   	} else {
   		$this->objUser->FirstName = $this->txtFirstName->Text;
        $this->objUser->LastName = $this->txtLastName->Text;
        $this->objUser->Email = $this->txtEmail->Text;
        $this->objUser->Username = $this->txtUsername->Text;
        $this->objUser->Password = $this->txtPassword->Text;
        $this->objUser->AccessLevel = $this->lstAccessLevel->SelectedValue;
   		if($this->lstAccessLevel->SelectedValue == 1) {
			$objCharityPartner = CharityPartner::LoadById($this->lstPartner->SelectedValue);
			$this->objUser->UnassociateAllCharityPartnersAsCharity();
			$this->objUser->AssociateCharityPartnerAsCharity($objCharityPartner);
		}else if ($this->lstAccessLevel->SelectedValue == 2) {
			$objFashionPartner = FashionPartner::LoadById($this->lstPartner->SelectedValue);
			$this->objUser->UnassociateAllFashionPartnersAsFashion();
			$this->objUser->AssociateFashionPartnerAsFashion($objFashionPartner);
		}
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
   			$this->lstAccessLevel_Change();
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