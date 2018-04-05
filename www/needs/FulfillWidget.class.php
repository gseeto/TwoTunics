<?php
class FulfillWidget extends QDialogBox {
	// Public child controls
	public $txtQuantityRequested; 
	public $lstDonations;
	public $lblDonationDetails;

	public $btnSubmit;
	public $btnCancel;
	
	// Object Variables
    protected $strCloseCallback;  
    protected $iNeedId;
    protected $objNeed;
        
    // Default Overrides
    protected $blnMatteClickable = false;
    protected $strTemplate = 'FulfillWidget.tpl.php';
	
     public function __construct($strCloseCallback, $objParentObject, $strControlId = null) {
            parent::__construct($objParentObject, $strControlId);
            $this->strCloseCallback = $strCloseCallback;
		
            $this->lblDonationDetails = new QTextBox($this);
            $this->lblDonationDetails->Name = 'Donation Details';
            $this->lblDonationDetails->TextMode = QTextMode::MultiLine;
            $this->lblDonationDetails->Height = 150;
            $this->lblDonationDetails->Width = 300;
            $this->lblDonationDetails->Rows = 5;
            $this->lblDonationDetails->Enabled = false;
            
            $this->txtQuantityRequested = new QTextBox($this);
            $this->txtQuantityRequested->Name = 'Quantity Requested';
            $this->txtQuantityRequested->Required = true;
                        			
			$this->lstDonations = new QListBox($this);
			$this->lstDonations->Name = 'Select a Donation you wish to Accept';
			$this->lstDonations->AddAction(new QChangeEvent(), new QAjaxControlAction($this, 'lstDonations_Change'));
									
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
     
     // Change the Donation details display based off this change
     public function lstDonations_Change() {
     	$this->lblDonationDetails->Text = 'No Details';
     	$objDonation = Donation::Load($this->lstDonations->SelectedValue);
     	if($objDonation) {
     		$this->lblDonationDetails->Text .= 'Found a donation';
     		$this->lblDonationDetails->Text = sprintf("Type: %s %s\nSize: %s\nQuantity Available: %s",
     			$objDonation->UnitGenre->Name,$objDonation->UnitGenre->Category, $objDonation->Size->Value, $objDonation->QuantityRemaining);
     	}
     }
     
	public function btnCancel_Click() {
		$this->HideDialogBox();
   }
        
   public function btnSubmit_Click() {
   	//Update Need Quantity 
   	$objNeed = Need::Load($this->iNeedId);
   	if($objNeed) {
   		$objNeed->QuantityStillRequired = $objNeed->QuantityRequested - $this->txtQuantityRequested->Text;
   		$objNeed->Save();
   	}
   	// Update donation quantity and status
   	$objDonation = Donation::Load($this->lstDonations->SelectedValue);
   	if($objDonation) {
   		$objDonation->QuantityRemaining = $objDonation->QuantityGiven - $this->txtQuantityRequested->Text;
   		if($objDonation->QuantityRemaining == 0) {
   			$objDonation->Status = 2; // Accepted  			
   		}
   		$objDonation->Save();
   	}
   	// Create Transaction
   	if($objNeed && $objDonation) {
   		$objTransaction = new Transaction();
   		$objTransaction->DonationId = $objDonation->Id;
   		$objTransaction->NeedId = $objNeed->Id;
   		$objTransaction->NumberOfUnits = $this->txtQuantityRequested->Text;
   		$objTransaction->DateInitiated = QDateTime::Now();
   		$objTransaction->Save();
   	}
   	call_user_func(array($this->objForm, $this->strCloseCallback));
    $this->HideDialogBox();
   }

   public function ShowDialogBox() {
   	parent::ShowDialogBox(); 
   		// Update dialog details based off Need Requirements
   		$objNeed = Need::Load($this->iNeedId);
   		if($objNeed) {
   			$this->lstDonations->RemoveAllItems();
   			$unitGenreId = $objNeed->UnitGenreId;
   			$sizeId = $objNeed->Size;
   			$objConditions = QQ::AndCondition(QQ::Equal(QQN::Donation()->SizeId, $sizeId), QQ::Equal(QQN::Donation()->UnitGenreId, $unitGenreId), QQ::GreaterThan(QQN::Donation()->QuantityRemaining, 0) );
   			$objClauses = array();
   			$objArrayDonations = Donation::QueryArray($objConditions,$objClauses);
   			if($objArrayDonations == null) {
   				$this->lstDonations->AddItem('No Matching Donations', 0);
   				$this->lblDonationDetails->Text = '';
   			} else {  				
	   			foreach($objArrayDonations as $objDonation) {
	   				$this->lstDonations->AddItem($objDonation->Description, $objDonation->Id);
	   				$this->lstDonations->SelectedValue = $objDonation->Id;
	   			}	   			
	   			$this->lstDonations_Change();
   			}	   		
	   		$this->txtQuantityRequested->Text = $objNeed->QuantityStillRequired;	
   		}		
   }

   /*
    * Get values from parent
    */
	public function __get($strName) {
            switch ($strName) {               
                case "NeedId": return $this->iNeedId;
                	break;               
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
                case "NeedId":
                	$this->iNeedId = 0;
                	try {                    
                        $this->iNeedId = QType::Cast($mixValue, QType::Integer);
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