<?php
require(dirname(__FILE__) . '/../../includes/prepend.inc.php');
require('DonationWidget.class.php');

class DonationsForm extends TwoTunicsForm {
	protected $objUser;
	protected $dtgDonations;
	protected $dlgDonationWidget;
    protected $btnAddDonation;

	protected function Form_Run() {	
		// If not logged in, go to login page.
		if (!QApplication::$User) QApplication::Redirect(__SUBDIRECTORY__.'/index.php');
	}

	protected function Form_Create() {
		$this->objUser = QApplication::$User;			
		$this->dtgDonations = new DonationDataGrid($this);
		$this->dtgDonations->AddColumn(new QDataGridColumn('Description', '<?= $_ITEM->Description ?>', 'HtmlEntities=false' ));
		$this->dtgDonations->AddColumn(new QDataGridColumn('Quantity Given', '<?= $_ITEM->QuantityGiven ?>', 'HtmlEntities=false' ));
		$this->dtgDonations->AddColumn(new QDataGridColumn('Quantity Remaining', '<?= $_ITEM->QuantityRemaining ?>', 'HtmlEntities=false' ));	
		$this->dtgDonations->AddColumn(new QDataGridColumn('Type', '<?= $_FORM->DonationType_Render($_ITEM) ?>','HtmlEntities=false'));				
		$this->dtgDonations->AddColumn(new QDataGridColumn('Size', '<?= $_FORM->Size_Render($_ITEM) ?>','HtmlEntities=false'));
		$this->dtgDonations->AddColumn(new QDataGridColumn('Status', '<?= $_FORM->Status_Render($_ITEM) ?>','HtmlEntities=false'));
		$this->dtgDonations->AddColumn(new QDataGridColumn('Cost Per Unit', '<?= $_ITEM->CostPerUnit ?>', 'HtmlEntities=false' ));
		$this->dtgDonations->AddColumn(new QDataGridColumn('Fashion Partner', '<?= $_FORM->Partner_Render($_ITEM) ?>','HtmlEntities=false'));
		$this->dtgDonations->AddColumn(new QDataGridColumn('Date Donated', '<?= $_ITEM->DateDonated ?>', 'HtmlEntities=false' ));
		$this->dtgDonations->AddColumn(new QDataGridColumn('Edit Donation Details', '<?= $_FORM->EditDonation_Render($_ITEM) ?>', 'HtmlEntities=false'));
		$this->dtgDonations->CellPadding = 5;
		$this->dtgDonations->SetDataBinder('dtgDonations_Bind',$this);
		$this->dtgDonations->UseAjax = true;
		$this->dtgDonations->CssClass = 'table table-striped table-bordered table-hover';
		$this->dtgDonations->NoDataHtml = 'No Donations Currently in the System';
		
		// Define the Create User Dialog. passing in the Method Callback for whenever the Create User Dialog is Closed
        $this->dlgDonationWidget = new DonationWidget('btnAddDonation_Close', $this);
        $this->dlgDonationWidget->Visible = false;

        // Setup the Create User Button
        $this->btnAddDonation = new QButton($this);
        $this->btnAddDonation->Text = 'Add a Donation';
        $this->btnAddDonation->AddAction(new QClickEvent(), new QAjaxAction('btnAddDonation_Click'));
	}
    
    public function EditDonation_Render(Donation $objDonation) {
            // In order to keep track whether or not a Donation Edit Button has been rendered,
            // we will use explicitly defined control ids.
            $strControlId = 'btnEdit' . $objDonation->Id;

            // Let's see if the Checkbox exists already
            $btnEdit = $this->GetControl($strControlId);
            
            if (!$btnEdit) {
                // Define the button -- it's parent is the Datagrid (b/c the datagrid is the one calling
                // this method which is responsible for rendering the checkbox.  Also, we must
                // explicitly specify the control ID
                $btnEdit = new QButton($this->dtgDonations, $strControlId);
                $btnEdit->Text = 'Edit Donation';
                $btnEdit->CssClass = 'btn btn-primary';
                
                // We'll use Control Parameters to help us identify the Donation ID 
                $btnEdit->ActionParameter = $objDonation->Id;
                
                // Let's assign a server action on click
                $btnEdit->AddAction(new QClickEvent(), new QServerAction('btnEditDonation_Click'));
            }
            return $btnEdit->Render(false);
        }
        
		protected function btnEditDonation_Click($strFormId, $strControlId, $strParameter) {
            // Pass details to dialog if necessary
            $this->dlgDonationWidget->IsCreate = false;
            $this->dlgDonationWidget->DonationId = $strParameter;
            $objFashionPartners = FashionPartner::LoadAll();
			foreach($objFashionPartners as $objFashionPartner) {
				if($this->objUser->IsFashionPartnerAsFashionAssociated($objFashionPartner)) {
					$this->dlgDonationWidget->FashionPartnerId = $objFashionPartner->Id;
					break;
				}
			}	
            $this->dlgDonationWidget->ShowDialogBox();
        }
        
		protected function btnAddDonation_Click($strFormId, $strControlId, $strParameter) {
            // Pass details to dialog if necessary
            $this->dlgDonationWidget->IsCreate = true;
            $objFashionPartners = FashionPartner::LoadAll();
			foreach($objFashionPartners as $objFashionPartner) {
				if($this->objUser->IsFashionPartnerAsFashionAssociated($objFashionPartner)) {
					$this->dlgDonationWidget->FashionPartnerId = $objFashionPartner->Id;
					break;
				} else {
					if($this->objUser->AccessLevel == 3) {
						$this->dlgDonationWidget->FashionPartnerId = 0;
					}
				}
			}		
            $this->dlgDonationWidget->ShowDialogBox();
        }
        
        // Setup the "Callback" function for when the User Dialog closes
        // This needs to be a public method
        public function btnAddDonation_Close() {
        	// Update the page as necessary
            $this->dtgDonations->Refresh();
        }
        
    public function DonationType_Render(Donation $objDonation) {       	
    	$objUnitGenre = UnitGenre::Load($objDonation->UnitGenreId);
    	if($objUnitGenre)
    		return $objUnitGenre->Name . ' / '. $objUnitGenre->Category;
    	else return 'Unknown Genre';
  	
    }
    
    public function Status_Render(Donation $objDonation) {      	
    	$objDonationStatus = DonationStatus::Load($objDonation->Status);
    	if($objDonationStatus) return $objDonationStatus->Value;
    	else return 'Unknown Status';
    }
    
    public function Partner_Render(Donation $objDonation) {  
    	if($objDonation->FashionPartner) {
	    	$name = $objDonation->FashionPartner->Name;
	    	if($name) return $name;
	    	else return 'Unknown Fashion Partner';
    	} else {
    		return 'Administrator Entered';
    	}
    }
    
    public function dtgDonations_Bind() {
    	$objConditions = QQ::All();
		$objClauses = array();
		// If user is Fashion Partner, then only show them their donations.
		// If user is Charity Partner or Administrator, show them ALL donations
		if($this->objUser->AccessLevel == 2) {
			$objFashionPartners = FashionPartner::LoadAll();
			$objPartnerId = 0;
			foreach($objFashionPartners as $objFashionPartner) {
				if($this->objUser->IsFashionPartnerAsFashionAssociated($objFashionPartner)) {
					$objPartnerId = $objFashionPartner->Id;
					break;
				}
			}			
			$objConditions = QQ::Equal(QQN::Donation()->FashionPartner->Id, $objPartnerId);
			$this->dtgDonations->DataSource = Donation::QueryArray($objConditions,$objClauses);
		} else {
			$this->dtgDonations->DataSource = Donation::QueryArray($objConditions,$objClauses);
		}
		
    }
    
	public function Size_Render(Donation $objDonation) {	
    	$objSize = Size::Load($objDonation->SizeId);
    	$returnString = $objSize->Category .' '. $objSize->Value;
    	return $returnString;  	
    }
    	
}

DonationsForm::Run('DonationsForm');
?>
