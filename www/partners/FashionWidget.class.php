<?php
class FashionWidget extends QDialogBox {
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
    protected $bAddFashion; 
    protected $iFashionId;
    protected $objFashion;
        
    // Default Overrides
    protected $blnMatteClickable = false;
    protected $strTemplate = 'FashionWidget.tpl.php';
	
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
   	if($this->bAddFashion){
   		$objFashion = new FashionPartner();
   		$objFashion->Name = $this->txtName->Text;
		$objFashion->Description = $this->txtDescription->Text;
		$objFashion->Street = $this->txtStreet->Text;
		$objFashion->City = $this->txtCity->Text;
		$objFashion->State = $this->txtState->Text;
		$objFashion->Zipcode = $this->txtZipcode->Text;
		$objFashion->Phone = $this->txtPhone->Text;
		$objFashion->Email = $this->txtEmail->Text;
		$objFashion->ContactPerson = $this->txtContactPerson->Text;
		$objFashion->Save();
   	} else {
   		$this->objFashion->Name = $this->txtName->Text;
        $this->objFashion->Description = $this->txtDescription->Text;
        $this->objFashion->Street = $this->txtStreet->Text;
        $this->objFashion->City = $this->txtCity->Text;
        $this->objFashion->State = $this->txtState->Text;
        $this->objFashion->Zipcode = $this->txtZipcode->Text;
        $this->objFashion->Phone = $this->txtPhone->Text;
        $this->objFashion->Email = $this->txtEmail->Text;
        $this->objFashion->ContactPerson = $this->txtContactPerson->Text;
        $this->objFashion->Save();
   	}
   	call_user_func(array($this->objForm, $this->strCloseCallback));
    $this->HideDialogBox();
   }

   public function ShowDialogBox() {
   	parent::ShowDialogBox(); 
   	if(($this->iFashionId != 0)&& (!$this->bAddFashion)) {
   		$this->objFashion = FashionPartner::LoadById($this->iFashionId);
   		if($this->objFashion != null) {
   			$this->txtName->Text = $this->objFashion->Name;
   			$this->txtDescription->Text = $this->objFashion->Description;
   			$this->txtStreet->Text = $this->objFashion->Street;
   			$this->txtCity->Text = $this->objFashion->City;
   			$this->txtState->Text = $this->objFashion->State;
   			$this->txtZipcode->Text = $this->objFashion->Zipcode;
   			$this->txtPhone->Text = $this->objFashion->Phone;
   			$this->txtEmail->Text = $this->objFashion->Email;
   			$this->txtContactPerson->Text = $this->objFashion->ContactPerson;
   		}
   	} else {
   		$this->objFashion = null;
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
                case "IsCreate": return $this->bAddFashion;
					break;
                case "FashionId": return $this->iFashionId;
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
            		$this->bAddFashion = false;
                    try {                    
                        $this->bAddFashion = QType::Cast($mixValue, QType::Boolean);
                        break;
                    } catch (QInvalidCastException $objExc) {}                  
                     break;

                case "FashionId":
                	$this->iFashionId = 0;
                	try {                    
                        $this->iFashionId = QType::Cast($mixValue, QType::Integer);
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