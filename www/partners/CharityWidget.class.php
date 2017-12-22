<?php
class CharityWidget extends QDialogBox {
	// Public child controls
	public $txtName;
	public $txtDescription;
	public $txtStreet;
	public $txtCity;
	public $txtState;
	public $txtZipcode;
	public $txtPhone;
	public $txtEmail;
	public $txtContactPerson;
	public $btnSubmit;
	public $btnCancel;
	
	// Object Variables
    protected $strCloseCallback;  
    protected $bAddCharity; 
    protected $iCharityId;
    protected $objCharity;
        
    // Default Overrides
    protected $blnMatteClickable = false;
    protected $strTemplate = 'CharityWidget.tpl.php';
	
     public function __construct($strCloseCallback, $objParentObject, $strControlId = null) {
            parent::__construct($objParentObject, $strControlId);
            $this->strCloseCallback = $strCloseCallback;
                        
            $this->txtName = new QTextBox($this);
            $this->txtName->Name = 'First Name';
            $this->txtName->Required = true;
            
            $this->txtDescription = new QTextBox($this);
            $this->txtDescription->Name = 'Description';
            $this->txtDescription->Required = true;
            
            $this->txtStreet = new QTextBox($this);
            $this->txtStreet->Name = 'Street';
            
            $this->txtCity = new QTextBox($this);
            $this->txtCity->Name = 'City';
            
            $this->txtState = new QTextBox($this);
            $this->txtState->Name = 'State';		
			
			$this->txtZipcode = new QTextBox($this);
			$this->txtZipcode->Name = 'Zip Code';
			
			$this->txtPhone = new QTextBox($this);
			$this->txtPhone->Name = 'Phone';
			
			$this->txtEmail = new QTextBox($this);
			$this->txtEmail->Name = 'Email';
			
			$this->txtContactPerson = new QTextBox($this);
			$this->txtContactPerson->Name = 'Contact Person';
			
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
     
	public function btnCancel_Click() {
		$this->HideDialogBox();
   }
        
   public function btnSubmit_Click() {
   	// If Create is set then create user, else update.
   	if($this->bAddCharity){
   		$objCharity = new CharityPartner();
   		$objCharity->Name = $this->txtName->Text;
		$objCharity->Description = $this->txtDescription->Text;
		$objCharity->Street = $this->txtStreet->Text;
		$objCharity->City = $this->txtCity->Text;
		$objCharity->State = $this->txtState->Text;
		$objCharity->Zipcode = $this->txtZipcode->Text;
		$objCharity->Phone = $this->txtPhone->Text;
		$objCharity->Email = $this->txtEmail->Text;
		$objCharity->ContactPerson = $this->txtContactPerson->Text;
		$objCharity->Save();
   	} else {
   		$this->objCharity->Name = $this->txtName->Text;
        $this->objCharity->Description = $this->txtDescription->Text;
        $this->objCharity->Street = $this->txtStreet->Text;
        $this->objCharity->City = $this->txtCity->Text;
        $this->objCharity->State = $this->txtState->Text;
        $this->objCharity->Zipcode = $this->txtZipcode->Text;
        $this->objCharity->Phone = $this->txtPhone->Text;
        $this->objCharity->Email = $this->txtEmail->Text;
        $this->objCharity->ContactPerson = $this->txtContactPerson->Text;
        $this->objCharity->Save();
   	}
   	call_user_func(array($this->objForm, $this->strCloseCallback));
    $this->HideDialogBox();
   }

   public function ShowDialogBox() {
   	parent::ShowDialogBox(); 
   	if(($this->iCharityId != 0)&& (!$this->bAddCharity)) {
   		$this->objCharity = CharityPartner::LoadById($this->iCharityId);
   		if($this->objCharity != null) {
   			$this->txtName->Text = $this->objCharity->Name;
   			$this->txtDescription->Text = $this->objCharity->Description;
   			$this->txtStreet->Text = $this->objCharity->Street;
   			$this->txtCity->Text = $this->objCharity->City;
   			$this->txtState->Text = $this->objCharity->State;
   			$this->txtZipcode->Text = $this->objCharity->Zipcode;
   			$this->txtPhone->Text = $this->objCharity->Phone;
   			$this->txtEmail->Text = $this->objCharity->Email;
   			$this->txtContactPerson->Text = $this->objCharity->ContactPerson;
   		}
   	} else {
   		$this->objCharity = null;
   		$this->txtName->Text = '';
   		$this->txtDescription->Text = '';
   		$this->txtStreet->Text = '';
   		$this->txtCity->Text = '';
   		$this->txtState->Text = '';
   		$this->txtZipcode->Text = '';
   		$this->txtPhone->Text = '';
   		$this->txtEmail->Text = '';
   		$this->txtContactPerson->Text = '';
   	}
   	
   }

   /*
    * Get values from parent
    */
	public function __get($strName) {
            switch ($strName) {
                case "IsCreate": return $this->bAddCharity;
					break;
                case "CharityId": return $this->iCharityId;
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
            		$this->bAddCharity = false;
                    try {                    
                        $this->bAddCharity = QType::Cast($mixValue, QType::Boolean);
                        break;
                    } catch (QInvalidCastException $objExc) {}                  
                     break;

                case "CharityId":
                	$this->iCharityId = 0;
                	try {                    
                        $this->iCharityId = QType::Cast($mixValue, QType::Integer);
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