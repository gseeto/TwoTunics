<?php
require(dirname(__FILE__) . '/../../includes/prepend.inc.php');
require('NeedsWidget.class.php');
require ('FulfillWidget.class.php');

class NeedsForm extends TwoTunicsForm {
	protected $objUser;
	protected $dtgNeeds;
	protected $dlgNeedsWidget;
	protected $dlgFulfillWidget;
    protected $btnAddNeeds;

	protected function Form_Run() {	
		// If not logged in, go to login page.
		if (!QApplication::$User) QApplication::Redirect(__SUBDIRECTORY__.'/index.php');
	}

	protected function Form_Create() {
		$this->objUser = QApplication::$User;		
		$this->dtgNeeds = new NeedDataGrid($this);
		$this->dtgNeeds->AddColumn(new QDataGridColumn('Description of Need', '<?= $_ITEM->Description ?>', 'HtmlEntities=false' ));
		$this->dtgNeeds->AddColumn(new QDataGridColumn('Quantity Requested', '<?= $_ITEM->QuantityRequested ?>', 'HtmlEntities=false' ));	
		$this->dtgNeeds->AddColumn(new QDataGridColumn('Status', '<?= $_FORM->Status_Render($_ITEM) ?>','HtmlEntities=false'));
		$this->dtgNeeds->AddColumn(new QDataGridColumn('Charity Partner', '<?= $_FORM->Partner_Render($_ITEM) ?>','HtmlEntities=false'));		
		$this->dtgNeeds->AddColumn(new QDataGridColumn('Type', '<?= $_FORM->NeedType_Render($_ITEM) ?>','HtmlEntities=false'));				
		$this->dtgNeeds->AddColumn(new QDataGridColumn('Size', '<?= $_FORM->Size_Render($_ITEM) ?>','HtmlEntities=false'));		
		$this->dtgNeeds->AddColumn(new QDataGridColumn('Date Requested', '<?= $_ITEM->DateRequested ?>', 'HtmlEntities=false' ));
		$this->dtgNeeds->AddColumn(new QDataGridColumn('Edit Need Details', '<?= $_FORM->EditNeed_Render($_ITEM) ?>', 'HtmlEntities=false'));
		$this->dtgNeeds->AddColumn(new QDataGridColumn('Fulfill Need', '<?= $_FORM->FulfillNeed_Render($_ITEM) ?>', 'HtmlEntities=false'));
		$this->dtgNeeds->CellPadding = 5;
		$this->dtgNeeds->SetDataBinder('dtgNeeds_Bind',$this);
		$this->dtgNeeds->UseAjax = true;
		$this->dtgNeeds->CssClass = 'table table-striped table-bordered table-hover';
		$this->dtgNeeds->NoDataHtml = 'No Needs Currently in the System';
		
		// Define the Create Need Dialog. passing in the Method Callback for whenever the Create Need Dialog is Closed
        $this->dlgNeedsWidget = new NeedsWidget('btnAddNeeds_Close', $this);
        $this->dlgNeedsWidget->Visible = false;

        // Define the Create Need Dialog. passing in the Method Callback for whenever the Create Need Dialog is Closed
        $this->dlgFulfillWidget = new FulfillWidget('btnFulfill_Close', $this);
        $this->dlgFulfillWidget->Visible = false;
        
        
        // Setup the Create User Button
        $this->btnAddNeeds = new QButton($this);
        $this->btnAddNeeds->Text = 'Add a Need';
        $this->btnAddNeeds->AddAction(new QClickEvent(), new QAjaxAction('btnAddNeeds_Click'));
	}
    
	public function FulfillNeed_Render(Need $objNeed) {
            // In order to keep track whether or not a Fulfill Need Button has been rendered,
            // we will use explicitly defined control ids.
            $strControlId = 'btnFulfill' . $objNeed->Id;

            // Let's see if the Checkbox exists already
            $btnFulfill = $this->GetControl($strControlId);
            
            if (!$btnFulfill) {
                // Define the button -- it's parent is the Datagrid (b/c the datagrid is the one calling
                // this method which is responsible for rendering the checkbox.  Also, we must
                // explicitly specify the control ID
                $btnFulfill = new QButton($this->dtgNeeds, $strControlId);
                $btnFulfill->Text = 'Fulfill Need';
                $btnFulfill->CssClass = 'btn btn-primary';
                
                // We'll use Control Parameters to help us identify the Need ID 
                $btnFulfill->ActionParameter = $objNeed->Id;
                
                // Let's assign a server action on click
                $btnFulfill->AddAction(new QClickEvent(), new QServerAction('btnFulfillNeed_Click'));
            }
            return $btnFulfill->Render(false);
        }
        
		protected function btnFulfillNeed_Click($strFormId, $strControlId, $strParameter) {
            // Pass details to dialog if necessary
            // Open a transaction Dlg
            
            // Display list of Donations that match the need paramaters in terms of unit genre and size.
            // Allow user to select which they want and the quantity.
            // Update Donation, Need, and create a transaction object
            $this->dlgFulfillWidget->NeedId = $strParameter;          	
            $this->dlgFulfillWidget->ShowDialogBox();
            
        }
        
    public function EditNeed_Render(Need $objNeed) {
            // In order to keep track whether or not a Need Edit Button has been rendered,
            // we will use explicitly defined control ids.
            $strControlId = 'btnEdit' . $objNeed->Id;

            // Let's see if the Checkbox exists already
            $btnEdit = $this->GetControl($strControlId);
            
            if (!$btnEdit) {
                // Define the button -- it's parent is the Datagrid (b/c the datagrid is the one calling
                // this method which is responsible for rendering the checkbox.  Also, we must
                // explicitly specify the control ID
                $btnEdit = new QButton($this->dtgNeeds, $strControlId);
                $btnEdit->Text = 'Edit Need';
                $btnEdit->CssClass = 'btn btn-primary';
                
                // We'll use Control Parameters to help us identify the Need ID 
                $btnEdit->ActionParameter = $objNeed->Id;
                
                // Let's assign a server action on click
                $btnEdit->AddAction(new QClickEvent(), new QServerAction('btnEditNeed_Click'));
            }
            return $btnEdit->Render(false);
        }
        
		protected function btnEditNeed_Click($strFormId, $strControlId, $strParameter) {
            // Pass details to dialog if necessary
            $this->dlgNeedsWidget->IsCreate = false;
            $this->dlgNeedsWidget->NeedId = $strParameter;
            $objCharityPartners = CharityPartner::LoadAll();
			foreach($objCharityPartners as $objCharityPartner) {
				if($this->objUser->IsCharityPartnerAsCharityAssociated($objCharityPartner)) {
					$this->dlgNeedsWidget->CharityPartnerId = $objCharityPartner->Id;
					break;
				}
			}	
            $this->dlgNeedsWidget->ShowDialogBox();
        }
        
		protected function btnAddNeeds_Click($strFormId, $strControlId, $strParameter) {
            // Pass details to dialog if necessary
            $this->dlgNeedsWidget->IsCreate = true;
            $objCharityPartners = CharityPartner::LoadAll();
			foreach($objCharityPartners as $objCharityPartner) {
				if($this->objUser->IsCharityPartnerAsCharityAssociated($objCharityPartner)) {
					$this->dlgNeedsWidget->CharityPartnerId = $objCharityPartner->Id;
					break;
				} else {
					if($this->objUser->AccessLevel == 3) {
						$this->dlgNeedsWidget->CharityPartnerId = 0;
					}
				}
			}		
            $this->dlgNeedsWidget->ShowDialogBox();
        }
        
        // Setup the "Callback" function for when the User Dialog closes
        // This needs to be a public method
        public function btnAddNeeds_Close() {
        	// Update the page as necessary
            $this->dtgNeeds->Refresh();
        }
        
        public function btnFulfill_Close() {
        	// Update the page as necessary
            $this->dtgNeeds->Refresh();
        }
        
    public function NeedType_Render(Need $objNeed) {       	
    	$objUnitGenre = UnitGenre::Load($objNeed->UnitGenreId);
    	if($objUnitGenre)
    		return $objUnitGenre->Name . ' / '. $objUnitGenre->Category;
    	else return 'Unknown Genre';
  	
    }
    
    public function Status_Render(Need $objNeed) {   
    	// We need to check transactions to see if this need has been fulfilled. 
    	// If not, then set to unfulfilled 
    	// If partially fulfilled, then set to partially fulfilled
    	// If completed then set to fulfilled
    	$QuantityRequested = $objNeed->QuantityRequested;
    	$AmountFulfilled = 0;
    	$objTransactionArray = Transaction::LoadArrayByNeedId($objNeed->Id);
    	foreach($objTransactionArray as $objTransaction) {
    		$AmountFulfilled += $objTransaction->NumberOfUnits;
    	}
    	if($AmountFulfilled == $QuantityRequested) {
    		return 'Fulfilled';
    	} else if($AmountFulfilled == 0) {
    		return "Still Needed";
    	} else if($QuantityRequested > $AmountFulfilled) {
    		return sprintf("Partially Fulfilled (%d/%d)",$AmountFulfilled, $QuantityRequested);
    	}
    	return 'Unknown Status';
    }
    
    public function Partner_Render(Need $objNeed) {  
    	if($objNeed->Charity) {
	    	$name = $objNeed->Charity->Name;
	    	if($name) return $name;
	    	else return 'Unknown Charity Partner';
    	} else {
    		return 'Administrator Entered';
    	}
    }
    
    public function dtgNeeds_Bind() {
    	$objConditions = QQ::All();
		$objClauses = array();
		// If user is Fashion Partner or Administrator, then show them all needs.
		// If user is Charity Partner , show them just their needs
		if($this->objUser->AccessLevel == 1) {
			$objCharityPartners = CharityPartner::LoadAll();
			$objPartnerId = 0;
			foreach($objCharityPartners as $objCharityPartner) {
				if($this->objUser->IsCharityPartnerAsCharityAssociated($objCharityPartner)) {
					$objPartnerId = $objCharityPartner->Id;
					break;
				}
			}			
			$objConditions = QQ::Equal(QQN::Need()->CharityId, $objPartnerId);
			$this->dtgNeeds->DataSource = Need::QueryArray($objConditions,$objClauses);
		} else {
			$this->dtgNeeds->DataSource = Need::QueryArray($objConditions,$objClauses);
		}
		
    }
    
	public function Size_Render(Need $objNeed) {
		$objSize = Size::load($objNeed->Size);
		if($objSize) {	
    		$returnString = sprintf("%s",$objSize->Value);
    		return $returnString;  
		}	
    }
    	
}

NeedsForm::Run('NeedsForm');
?>
