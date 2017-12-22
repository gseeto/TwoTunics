<?php
require(dirname(__FILE__) . '/../../includes/prepend.inc.php');

class DashboardForm extends TwoTunicsForm {
	protected $objUser;
	protected $dtgNeeds;
	protected $dtgDonations;
	protected $dtgUsers;

	protected function Form_Run() {	
		// If not logged in, go to login page.
		if (!QApplication::$User) QApplication::Redirect(__SUBDIRECTORY__.'/index.php');
	}

	protected function Form_Create() {
		$this->objUser = QApplication::$User;	
			
		$this->dtgNeeds = new NeedDataGrid($this);
		$this->dtgNeeds->AddColumn(new QDataGridColumn('Description', '<?= $_ITEM->Description ?>', 'HtmlEntities=false' ));
		$this->dtgNeeds->AddColumn(new QDataGridColumn('Requested By', '<?= $_FORM->Charity_Render($_ITEM)', 'HtmlEntities=false' ));			
		$this->dtgNeeds->AddColumn(new QDataGridColumn('Type', '<?= $_FORM->Need_Type_Render($_ITEM) ?>','HtmlEntities=false'));
		$this->dtgNeeds->AddColumn(new QDataGridColumn('Size', '<?= $_FORM->Need_Size_Render($_ITEM) ?>','HtmlEntities=false'));
		$this->dtgNeeds->AddColumn(new QDataGridColumn('Quantity Requested', '<?= $_ITEM->QuantityRequested ?>','HtmlEntities=false'));
		$this->dtgNeeds->AddColumn(new QDataGridColumn('Quantity Still Required', '<?= $_ITEM->QuantityStillRequired ?>','HtmlEntities=false'));
		$this->dtgNeeds->CellPadding = 5;
		$this->dtgNeeds->SetDataBinder('dtgNeeds_Bind',$this);
		$this->dtgNeeds->UseAjax = true;
		$this->dtgNeeds->CssClass = 'table table-striped table-bordered table-hover';
		$this->dtgNeeds->NoDataHtml = 'No Needs Currently Listed';
		
		$this->dtgDonations = new DonationDataGrid($this);
		$this->dtgDonations->AddColumn(new QDataGridColumn('Description', '<?= $_ITEM->Description ?>', 'HtmlEntities=false' ));
		$this->dtgDonations->AddColumn(new QDataGridColumn('Donated By', '<?= $_FORM->Fashion_Partner_Render($_ITEM)', 'HtmlEntities=false' ));			
		$this->dtgDonations->AddColumn(new QDataGridColumn('Type', '<?= $_FORM->Donation_Type_Render($_ITEM) ?>','HtmlEntities=false'));
		$this->dtgDonations->AddColumn(new QDataGridColumn('Size', '<?= $_FORM->Donation_Size_Render($_ITEM) ?>','HtmlEntities=false'));
		$this->dtgDonations->AddColumn(new QDataGridColumn('Quantity Donated', '<?= $_ITEM->QuantityGiven ?>','HtmlEntities=false'));
		$this->dtgDonations->AddColumn(new QDataGridColumn('Quantity Still Remaining', '<?= $_ITEM->QuantityRemaining ?>','HtmlEntities=false'));
		$this->dtgDonations->CellPadding = 5;
		$this->dtgDonations->SetDataBinder('dtgDonations_Bind',$this);
		$this->dtgDonations->UseAjax = true;
		$this->dtgDonations->CssClass = 'table table-striped table-bordered table-hover';
		$this->dtgDonations->NoDataHtml = 'No Donations Currently Listed';
		
		$this->dtgUsers = new UserDataGrid($this);
		$this->dtgUsers->AddColumn(new QDataGridColumn('Name', '<?= $_ITEM->FirstName." ".$_ITEM->LastName ?>', 'HtmlEntities=false' ));
		$this->dtgUsers->AddColumn(new QDataGridColumn('Username', '<?= $_ITEM->Username ?>', 'HtmlEntities=false' ));	
		$this->dtgUsers->AddColumn(new QDataGridColumn('Partner Type', '<?= $_FORM->PartnerType_Render($_ITEM) ?>','HtmlEntities=false'));				
		$this->dtgUsers->AddColumn(new QDataGridColumn('Organization', '<?= $_FORM->Organization_Render($_ITEM) ?>','HtmlEntities=false'));
		$this->dtgUsers->CellPadding = 5;
		$this->dtgUsers->SetDataBinder('dtgUsers_Bind',$this);
		$this->dtgUsers->UseAjax = true;
		$this->dtgUsers->CssClass = 'table table-striped table-bordered table-hover';
		$this->dtgUsers->NoDataHtml = 'No Users Currently in the System';
	}

	public function dtgNeeds_Bind() {
		$objConditions = QQ::All();
		$objClauses = array();

		switch ($this->objUser->AccessLevel) {
			case 1: // User is a Charity Partner - just show them their needs
				$charityId = 0;
				foreach (CharityPartner::LoadAll() as $objCharityPartner) {
					if($this->objUser->IsCharityPartnerAsCharityAssociated($objCharityPartner)) {
						$charityId = $objCharityPartner->Id;
						break;
					}
				}
				$objConditions = QQ::AndCondition($objConditions,QQ::Equal( QQN::Need()->CharityId, $charityId) );
				break;
			case 2: // User is Fashion Partner - show them all needs
			case 3: // User is Administrator - show them all needs
				$objConditions = QQ::All();
				break;
		}	
		$this->dtgNeeds->DataSource = Need::QueryArray($objConditions,$objClauses);; 
	}
	
	public function Charity_Render(Need $objNeed) {
        return $objNeed->Charity->Name;
    }
    
	public function Need_Type_Render(Need $objNeed) {
		return UnitType::ToString($objNeed->UnitTypeId);
    }
    	
    
	public function Need_Size_Render(Need $objNeed) {
		return ($objNeed->Size->Value);
    }  
    
	public function dtgDonations_Bind() {
		$objConditions = QQ::All();
		$objClauses = array();

		switch ($this->objUser->AccessLevel) {
			case 2: // User is a Fashion Partner - just show them their donations
				$fashionId = 0;
				foreach (FashionPartner::LoadAll() as $objFashionPartner) {
					if($this->objUser->IsFashionPartnerAsFashionAssociated($objFashionPartner)) {
						$fashionId = $objFashionPartner->Id;
						break;
					}
				}
				$objConditions = QQ::AndCondition($objConditions,QQ::Equal( QQN::Donation()->FashionPartnerId, $fashionId) );
				break;
			case 1: // User is Charity Partner - show them all donations
			case 3: // User is Administrator - show them all donations
				$objConditions = QQ::All();
				break;
		}	
		$this->dtgDonations->DataSource = Donation::QueryArray($objConditions,$objClauses);
	}
	
	public function Fashion_Partner_Render(Donation $objDonation) {
        return $objDonation->FashionPartner->Name;
    }
    
	public function Donation_Type_Render(Donation $objDonation) {
		return UnitType::ToString($objDonation->UnitTypeId);
    }
    
	public function Size_Render(Donation $objDonation) {
		return ($objDonation->Size->Value);
    }
    
    public function PartnerType_Render(User $objUser) {
    	$charityArray = CharityPartner::LoadArrayByUserAsCharity($objUser->Id);
    	if(!empty($charityArray)) return 'Charity Partner';
    	
    	$fashionArray = FashionPartner::LoadArrayByUserAsFashion($objUser->Id);
    	if(!empty($fashionArray)) return 'Fashion Partner';
    	
    	return 'Administrator';
    	
    }
    
    public function dtgUsers_Bind() {
    	$objConditions = QQ::All();
		$objClauses = array();
		$this->dtgUsers->DataSource = User::QueryArray($objConditions,$objClauses);
    }
    
	public function Organization_Render(User $objUser) {
		foreach(CharityPartner::LoadAll() as $objCharityPartner) {
			if($objUser->IsCharityPartnerAsCharityAssociated($objCharityPartner)) {
				return $objCharityPartner->Name;
			}
		}
		foreach(FashionPartner::LoadAll() as $objFashionPartner) {
			if($objUser->IsFashionPartnerAsFashionAssociated($objFashionPartner)) {
				return $objFashionPartner->Name;
			}
		}
    	
    	return 'Unknown Organization';
    	
    }
    	
}

DashboardForm::Run('DashboardForm');
?>
