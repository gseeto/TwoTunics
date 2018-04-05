<?php
require(dirname(__FILE__) . '/../../includes/prepend.inc.php');

class TransactionsForm extends TwoTunicsForm {
	protected $objUser;
	protected $dtgTransactions;
	protected $iTotalDonationAmount;
	protected $lblTotalDonationAmount;

	protected function Form_Run() {	
		// If not logged in, go to login page.
		if (!QApplication::$User) QApplication::Redirect(__SUBDIRECTORY__.'/index.php');
	}

	protected function Form_Create() {
		$this->objUser = QApplication::$User;			
		$this->dtgTransactions = new TransactionDataGrid($this);
		$this->dtgTransactions->AddColumn(new QDataGridColumn('Fashion Partner', '<?= $_FORM->Partner_Render($_ITEM) ?>','HtmlEntities=false'));
		$this->dtgTransactions->AddColumn(new QDataGridColumn('Description', '<?= $_FORM->Description_Render($_ITEM) ?>', 'HtmlEntities=false' ));			
		$this->dtgTransactions->AddColumn(new QDataGridColumn('Type', '<?= $_FORM->DonationType_Render($_ITEM) ?>','HtmlEntities=false'));				
		$this->dtgTransactions->AddColumn(new QDataGridColumn('Size', '<?= $_FORM->Size_Render($_ITEM) ?>','HtmlEntities=false'));		
		$this->dtgTransactions->AddColumn(new QDataGridColumn('Cost Per Unit', '<?= $_FORM->CostPerUnit_Render($_ITEM) ?>', 'HtmlEntities=false' ));
		$this->dtgTransactions->AddColumn(new QDataGridColumn('Quantity Donated', '<?= $_ITEM->NumberOfUnits ?>', 'HtmlEntities=false' ));
		$this->dtgTransactions->AddColumn(new QDataGridColumn('Amount Donated', '<?= $_FORM->AmountDonated_Render($_ITEM) ?>', 'HtmlEntities=false' ));
		$this->dtgTransactions->AddColumn(new QDataGridColumn('Date Donated', '<?= $_ITEM->DateInitiated ?>', 'HtmlEntities=false' ));
		
		$this->dtgTransactions->CellPadding = 5;
		$this->dtgTransactions->SetDataBinder('dtgTransactions_Bind',$this);
		$this->dtgTransactions->UseAjax = true;
		$this->dtgTransactions->CssClass = 'table table-striped table-bordered table-hover';
		$this->dtgTransactions->NoDataHtml = 'No Transactions Currently in the System';	
		
		$this->CalculateTotal();
		$this->lblTotalDonationAmount = new QLabel($this);
		$this->lblTotalDonationAmount->Text = '$'. number_format( $this->iTotalDonationAmount,2);	
	}
    
    public function DonationType_Render(Transaction $objTransaction) {       	
    	$objUnitGenre = UnitGenre::Load($objTransaction->Donation->UnitGenreId);
    	if($objUnitGenre)
    		return $objUnitGenre->Name . ' / '. $objUnitGenre->Category;
    	else return 'Unknown Genre';
  	
    }
    
    
    public function Partner_Render(Transaction $objTransaction) {  
    	if($objTransaction->Donation->FashionPartner) {
	    	$name = $objTransaction->Donation->FashionPartner->Name;
	    	if($name) return $name;
	    	else return 'Unknown Fashion Partner';
    	} else {
    		return 'Administrator Entered';
    	}
    }
    
    public function Description_Render(Transaction $objTransaction) {  
    	if($objTransaction->Donation->Description) {
	    	return $objTransaction->Donation->Description;
    	} else {
    		return 'No Description';
    	}
    }
    public function dtgTransactions_Bind() {
    	$objConditions = QQ::All();
		$objClauses = array();
		// If user is Fashion Partner, then only show them their transactions.
		// If user is Administrator, show them ALL transactions
		if($this->objUser->AccessLevel == 2) {
			$objFashionPartners = FashionPartner::LoadAll();
			$objPartnerId = 0;
			foreach($objFashionPartners as $objFashionPartner) {
				if($this->objUser->IsFashionPartnerAsFashionAssociated($objFashionPartner)) {
					$objPartnerId = $objFashionPartner->Id;
					break;
				}
			}			
			$objConditions = QQ::Equal(QQN::Transaction()->Donation->FashionPartner->Id, $objPartnerId);
			$this->dtgTransactions->DataSource = Transaction::QueryArray($objConditions,$objClauses);
		} else {
			$this->dtgTransactions->DataSource = Transaction::QueryArray($objConditions,$objClauses);
		}   		
    }

    public function CalculateTotal() {
    	$objConditions = QQ::All();
		$objClauses = array();
		// If user is Fashion Partner, then only calculate their transactions.
		// If user is Administrator, calculate ALL transactions
		if($this->objUser->AccessLevel == 2) {
			$objFashionPartners = FashionPartner::LoadAll();
			$objPartnerId = 0;
			foreach($objFashionPartners as $objFashionPartner) {
				if($this->objUser->IsFashionPartnerAsFashionAssociated($objFashionPartner)) {
					$objPartnerId = $objFashionPartner->Id;
					break;
				}
			}			
			$objConditions = QQ::Equal(QQN::Transaction()->Donation->FashionPartner->Id, $objPartnerId);
			$objTransactionArray = Transaction::QueryArray($objConditions,$objClauses);
		} else {
			$objTransactionArray = Transaction::QueryArray($objConditions,$objClauses);
		}
		
    	$this->iTotalDonationAmount = 0;
    	foreach($objTransactionArray as $objTransaction) {
    		$iamount = $objTransaction->Donation->CostPerUnit * $objTransaction->NumberOfUnits;
    		$this->iTotalDonationAmount += $iamount;
    	}		
    }
    
	public function Size_Render(Transaction $objTransaction) {	
    	$objSize = Size::Load($objTransaction->Donation->SizeId);
    	$returnString = $objSize->Category .' '. $objSize->Value;
    	return $returnString;  	
    }
    
    public function CostPerUnit_Render(Transaction $objTransaction) {	
    	if($objTransaction->Donation->CostPerUnit) {
    		return '$'. number_format($objTransaction->Donation->CostPerUnit,2); 
    	} else {
    		return '';
    	} 	
    }
    
    public function AmountDonated_Render(Transaction $objTransaction) {	
    	if($objTransaction->Donation->CostPerUnit) {
    		$iamount = $objTransaction->Donation->CostPerUnit * $objTransaction->NumberOfUnits;
    		return '$'. number_format($iamount,2); 
    	} else {
    		return '';
    	} 	
    }
    	
}

TransactionsForm::Run('TransactionsForm');
?>
