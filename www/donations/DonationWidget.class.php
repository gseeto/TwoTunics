<?php
class DonationWidget extends QDialogBox {
	// Public child controls
	public $txtDescription;
	public $txtQuantityGiven;
	public $txtCostPerUnit;	
	public $lstUnitGenre;
	public $lstSize;
	public $btnSubmit;
	public $btnCancel;
	public $txtQuantityWarning;
	public $txtCostPerUnitWarning;
	public $txtTypeWarning;
	public $txtSizeWarning;
	
	// Object Variables
    protected $strCloseCallback;  
    protected $bCreateDonation; 
    protected $iDonationId;
    protected $iFashionPartnerId;
    protected $objDonation;
        
    // Default Overrides
    protected $blnMatteClickable = false;
    protected $strTemplate = 'DonationWidget.tpl.php';
	
     public function __construct($strCloseCallback, $objParentObject, $strControlId = null) {
            parent::__construct($objParentObject, $strControlId);
            $this->strCloseCallback = $strCloseCallback;
		
            $this->txtDescription = new QTextBox($this);
            $this->txtDescription->Name = 'Description';
            $this->txtDescription->Required = true;
            
            $this->txtQuantityWarning  = new QLabel($this);
            $this->txtQuantityWarning->Visible = false;
            
            $this->txtCostPerUnitWarning  = new QLabel($this);
            $this->txtCostPerUnitWarning->Visible = false;
            
            $this->txtTypeWarning  = new QLabel($this);
            $this->txtTypeWarning->Visible = false;
            
            $this->txtSizeWarning  = new QLabel($this);
            $this->txtSizeWarning->Visible = false;
            
            $this->txtQuantityGiven = new QTextBox($this);
            $this->txtQuantityGiven->Name = 'Quantity Given';
            $this->txtQuantityGiven->Required = true;
            
            $this->txtCostPerUnit = new QTextBox($this);
            $this->txtCostPerUnit->Name = 'Cost Per Unit';
            			
			$this->lstUnitGenre = new QListBox($this);
			$arrUnitGenre = UnitGenre::LoadAll();
			$this->lstUnitGenre->AddAction(new QChangeEvent(), new QAjaxControlAction($this, 'lstUnitGenre_Change'));
			foreach($arrUnitGenre as $objUnitGenre)
				$this->lstUnitGenre->AddItem($objUnitGenre->Name .'/'.$objUnitGenre->Category, $objUnitGenre->Id);
						
			$this->lstSize = new QListBox($this);
			$this->lstSize->HtmlBefore = 'Select Size of the units:';
			$this->lstSize->AddItem('-Select Unit Type first -', 0);
						
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
     
     // Change the available options in the Size dropdown based off this change
     public function lstUnitGenre_Change() {
     	$objUnitGenre = UnitGenre::Load($this->lstUnitGenre->SelectedValue);
     	$objConditions = QQ::Equal(QQN::Size()->Category, $objUnitGenre->Category);
     	$objSizeArray = Size::QueryArray($objConditions);
     	$this->lstSize->RemoveAllItems();
     	foreach($objSizeArray as $objSize) {
     		$this->lstSize->AddItem($objSize->Value, $objSize->Id);
     	}   	
     }
     
	public function btnCancel_Click() {
		$this->HideDialogBox();
   }
        
   public function btnSubmit_Click() {
   // Add some validation at this point.
   	$bValidated = true;
   	
   	// Make sure Quantity Given is an integer
   	if (!is_numeric($this->txtQuantityGiven->Text) ) {
 			$this->txtQuantityWarning->Visible = true;
 			$this->txtQuantityWarning->Text = 'Quantity Requested must be a number';
 			$bValidated = false; 
 	} else $this->txtQuantityWarning->Visible = false;
 	
   // Make sure Cost Per Unit is an integer
   	if (!is_numeric($this->txtCostPerUnit->Text) ) {
 			$this->txtCostPerUnitWarning->Visible = true;
 			$this->txtCostPerUnitWarning->Text = 'Cost Per Unit must be a number';
 			$bValidated = false; 
 	} else $this->txtCostPerUnitWarning->Visible = false;
 	
 	// Make sure Unit Genre has been selected
 	if($this->lstUnitGenre->SelectedValue == null) {
 		$this->txtTypeWarning->Visible = true;
 		$this->txtTypeWarning->Text = 'You must select a Unit Genre';
 		$bValidated = false; 
 	} else $this->txtTypeWarning->Visible = false;
 	
   // Make sure Size has been selected
 	if($this->lstSize->SelectedValue == null) {
 		$this->txtSizeWarning->Visible = true;
 		$this->txtSizeWarning->Text = 'You must select a Size';
 		$bValidated = false; 
 	} else $this->txtSizeWarning->Visible = false;

 	if($bValidated == false) return; // if Validation fails break off early after displaying message
 		
   	// If Create is set then create user, else update.
   	if($this->bCreateDonation){
   		$objDonation = new Donation();
   		$objDonation->Description = $this->txtDescription->Text;
		$objDonation->QuantityGiven = $this->txtQuantityGiven->Text;
		$objDonation->CostPerUnit = $this->txtCostPerUnit->Text;
		$objDonation->UnitGenreId = $this->lstUnitGenre->SelectedValue;	
		$objDonation->SizeId = $this->lstSize->SelectedValue;	
		$objDonation->QuantityRemaining = $this->txtQuantityGiven->Text; // At Creation this should be the same
		$objDonation->Status = 1; // Available		
		$objFashionPartner = FashionPartner::Load($this->iFashionPartnerId);
		if($objFashionPartner) $objDonation->FashionPartnerId = $this->iFashionPartnerId;
		$objDonation->DateDonated = QDateTime::Now();
		$objDonation->Save();		
   	} else {
   		$this->objDonation->Description = $this->txtDescription->Text;
        $this->objDonation->QuantityGiven = $this->txtQuantityGiven->Text;
        $this->objDonation->CostPerUnit = $this->txtCostPerUnit->Text;
        $this->objDonation->UnitGenreId = $this->lstUnitGenre->SelectedValue;  	
        $this->objDonation->SizeId = $this->lstSize->SelectedValue;	
        $this->objDonation->Save();
   	}
   	call_user_func(array($this->objForm, $this->strCloseCallback));
    $this->HideDialogBox();
   }

   public function ShowDialogBox() {
   	parent::ShowDialogBox(); 
   	if($this->bCreateDonation) {
   		$this->txtDescription->Text = '';
   		$this->txtQuantityGiven->Text = 0;
   		$this->txtCostPerUnit->Text = 0; 		
   	} else {
	   	if($this->iDonationId != 0) {
	   		$this->objDonation = Donation::LoadById($this->iDonationId);
	   		if($this->objDonation != null) {
	   			$this->txtDescription->Text = $this->objDonation->Description;
	   			$this->txtQuantityGiven->Text = $this->objDonation->QuantityGiven;
	   			$this->txtCostPerUnit->Text = $this->objDonation->CostPerUnit;
	   			$this->lstUnitGenre->SelectedValue = $this->objDonation->UnitGenreId;
	   			$this->lstUnitGenre_Change();
	   			$this->lstSize->SelectedValue = $this->objDonation->SizeId;
	   			
	   		}
	   	}  
   	}	
   }

   /*
    * Get values from parent
    */
	public function __get($strName) {
            switch ($strName) {
                case "IsCreate": return $this->bCreateDonation;
					break;
                case "DonationId": return $this->iDonationId;
                	break;
                case "FashionPartnerId": return $this->iFashionPartnerId;
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
            		$this->bCreateDonation = false;
                    try {                    
                        $this->bCreateDonation = QType::Cast($mixValue, QType::Boolean);
                        break;
                    } catch (QInvalidCastException $objExc) {}                  
                     break;

                case "DonationId":
                	$this->iDonationId = 0;
                	try {                    
                        $this->iDonationId = QType::Cast($mixValue, QType::Integer);
                        break;
                    } catch (QInvalidCastException $objExc) {}                  
                     break;
                     
                case "FashionPartnerId":
                	$this->iFashionPartnerId = 0;
                	try {                    
                        $this->iFashionPartnerId = QType::Cast($mixValue, QType::Integer);
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