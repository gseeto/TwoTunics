<?php
class NeedsWidget extends QDialogBox {
	// Public child controls
	public $txtDescription;
	public $txtQuantityRequested;
	public $lstUnitGenre;
	public $lstSize;
	public $btnSubmit;
	public $btnCancel;
	public $txtQuantityWarning;
	public $txtTypeWarning;
	public $txtSizeWarning;
	
	// Object Variables
    protected $strCloseCallback;  
    protected $bCreateNeed; 
    protected $iNeedId;
    protected $iCharityPartnerId;
    protected $objNeed;
        
    // Default Overrides
    protected $blnMatteClickable = false;
    protected $strTemplate = 'NeedsWidget.tpl.php';
	
     public function __construct($strCloseCallback, $objParentObject, $strControlId = null) {
            parent::__construct($objParentObject, $strControlId);
            $this->strCloseCallback = $strCloseCallback;
		
            $this->txtQuantityWarning  = new QLabel($this);
            $this->txtQuantityWarning->Visible = false;
            
            $this->txtTypeWarning  = new QLabel($this);
            $this->txtTypeWarning->Visible = false;
            
            $this->txtSizeWarning  = new QLabel($this);
            $this->txtSizeWarning->Visible = false;
            
            $this->txtDescription = new QTextBox($this);
            $this->txtDescription->Name = 'Description';
            $this->txtDescription->Required = true;
            
            $this->txtQuantityRequested = new QTextBox($this);
            $this->txtQuantityRequested->Name = 'Quantity Requested';
            $this->txtQuantityRequested->Required = true;
                        			
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
   	// Make sure Quantity Requested is an integer
   	if (!is_numeric($this->txtQuantityRequested->Text) ) {
 			$this->txtQuantityWarning->Visible = true;
 			$this->txtQuantityWarning->Text = 'Quantity Requested must be a number';
 			$bValidated = false; 
 	}
 	// Make sure Unit Genre has been selected
 	if($this->lstUnitGenre->SelectedValue == null) {
 		$this->txtTypeWarning->Visible = true;
 		$this->txtTypeWarning->Text = 'You must select a Unit Genre';
 		$bValidated = false; 
 	}
   // Make sure Size has been selected
 	if($this->lstSize->SelectedValue == null) {
 		$this->txtSizeWarning->Visible = true;
 		$this->txtSizeWarning->Text = 'You must select a Size';
 		$bValidated = false; 
 	}

 	if($bValidated == false) return; // if Validation fails break off early after displaying message
 	else {
 		$this->txtQuantityWarning->Visible = false;
 		$this->txtTypeWarning->Visible = false;
 		$this->txtSizeWarning->Visible = false;
 	}
 	
   	// If Create is set then create user, else update.
   	if($this->bCreateNeed){
   		$objNeed = new Need();
   		$objNeed->Description = $this->txtDescription->Text;
		$objNeed->QuantityRequested = $this->txtQuantityRequested->Text;
		$objNeed->UnitGenreId = $this->lstUnitGenre->SelectedValue;	
		$objNeed->Size = $this->lstSize->SelectedValue;	
		$objNeed->QuantityStillRequired = $this->txtQuantityRequested->Text; // At Creation this should be the same
		$objCharityPartner = CharityPartner::LoadById($this->iCharityPartnerId);
		if($objCharityPartner) $objNeed->CharityId = $this->iCharityPartnerId;
		$objNeed->DateRequested = QDateTime::Now();
		$objNeed->Save();		
   	} else {
   		$this->objNeed->Description = $this->txtDescription->Text;
        $this->objNeed->QuantityRequested = $this->txtQuantityRequested->Text;
        $this->objNeed->UnitGenreId = $this->lstUnitGenre->SelectedValue;  	
        $this->objNeed->Size = $this->lstSize->SelectedValue;	
        $this->objNeed->Save();
   	}
   	call_user_func(array($this->objForm, $this->strCloseCallback));
    $this->HideDialogBox();
   }

   public function ShowDialogBox() {
   	parent::ShowDialogBox(); 
   	if($this->bCreateNeed) {
   		$this->txtDescription->Text = '';
   		$this->txtQuantityRequested->Text = 0;		
   	} else {
	   	if($this->iNeedId != 0) {
	   		$this->objNeed = Need::LoadById($this->iNeedId);
	   		if($this->objNeed != null) {
	   			$this->txtDescription->Text = $this->objNeed->Description;
	   			$this->txtQuantityRequested->Text = $this->objNeed->QuantityRequested;
	   			$this->lstUnitGenre->SelectedValue = $this->objNeed->UnitGenreId;
	   			$this->lstUnitGenre_Change();
	   			$this->lstSize->SelectedValue = $this->objNeed->Size;
	   			
	   		}
	   	}  
   	}	
   }

   /*
    * Get values from parent
    */
	public function __get($strName) {
            switch ($strName) {
                case "IsCreate": return $this->bCreateNeed;
					break;
                case "NeedId": return $this->iNeedId;
                	break;
                case "CharityPartnerId": return $this->iCharityPartnerId;
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
            		$this->bCreateNeed = false;
                    try {                    
                        $this->bCreateNeed = QType::Cast($mixValue, QType::Boolean);
                        break;
                    } catch (QInvalidCastException $objExc) {}                  
                     break;

                case "NeedId":
                	$this->iNeedId = 0;
                	try {                    
                        $this->iNeedId = QType::Cast($mixValue, QType::Integer);
                        break;
                    } catch (QInvalidCastException $objExc) {}                  
                     break;
                     
                case "CharityPartnerId":
                	$this->iCharityPartnerId = 0;
                	try {                    
                        $this->iCharityPartnerId = QType::Cast($mixValue, QType::Integer);
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