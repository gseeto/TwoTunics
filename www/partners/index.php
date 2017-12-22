<?php
require(dirname(__FILE__) . '/../../includes/prepend.inc.php');
require('CharityWidget.class.php');
require('FashionWidget.class.php');

class PartnersForm extends TwoTunicsForm {
	protected $objUser;
	protected $dtgCharity;
	protected $dlgCharityWidget;
    protected $btnAddCharity;
    
    protected $dtgFashion;
	protected $dlgFashionWidget;
    protected $btnAddFashion;

	protected function Form_Run() {	
		// If not logged in, go to login page.
		if (!QApplication::$User) QApplication::Redirect(__SUBDIRECTORY__.'/index.php');
	}

	protected function Form_Create() {
		$this->objUser = QApplication::$User;	
					
		$this->dtgCharity = new CharityPartnerDataGrid($this);
		$this->dtgCharity->AddColumn(new QDataGridColumn('Name', '<?= $_ITEM->Name ?>', 'HtmlEntities=false' ));
		$this->dtgCharity->AddColumn(new QDataGridColumn('Description', '<?= $_ITEM->Description ?>', 'HtmlEntities=false' ));	
		$this->dtgCharity->AddColumn(new QDataGridColumn('City', '<?= $_ITEM->City ?>','HtmlEntities=false'));				
		$this->dtgCharity->AddColumn(new QDataGridColumn('Contact Person', '<?= $_ITEM->ContactPerson ?>','HtmlEntities=false'));
		$this->dtgCharity->AddColumn(new QDataGridColumn('Edit Charity Details', '<?= $_FORM->CharityEdit_Render($_ITEM) ?>', 'HtmlEntities=false'));
		$this->dtgCharity->CellPadding = 5;
		$this->dtgCharity->SetDataBinder('dtgCharity_Bind',$this);
		$this->dtgCharity->UseAjax = true;
		$this->dtgCharity->CssClass = 'table table-striped table-bordered table-hover';
		$this->dtgCharity->NoDataHtml = 'No Charity Partners Currently in the System';
		
		// Define the Add Charity Dialog. passing in the Method Callback for whenever the Add Charity Dialog is Closed
        $this->dlgCharityWidget = new CharityWidget('btnAddCharity_Close', $this);
        $this->dlgCharityWidget->Visible = false;

        // Setup the Add Charity Button
        $this->btnAddCharity = new QButton($this);
        $this->btnAddCharity->Text = 'Add Charity';
        $this->btnAddCharity->AddAction(new QClickEvent(), new QAjaxAction('btnAddCharity_Click'));
        
        $this->dtgFashion = new FashionPartnerDataGrid($this);
		$this->dtgFashion->AddColumn(new QDataGridColumn('Name', '<?= $_ITEM->Name ?>', 'HtmlEntities=false' ));
		$this->dtgFashion->AddColumn(new QDataGridColumn('Description', '<?= $_ITEM->Description ?>', 'HtmlEntities=false' ));	
		$this->dtgFashion->AddColumn(new QDataGridColumn('City', '<?= $_ITEM->City ?>','HtmlEntities=false'));				
		$this->dtgFashion->AddColumn(new QDataGridColumn('Contact Person', '<?= $_ITEM->ContactPerson ?>','HtmlEntities=false'));
		$this->dtgFashion->AddColumn(new QDataGridColumn('Edit Fashion Details', '<?= $_FORM->FashionEdit_Render($_ITEM) ?>', 'HtmlEntities=false'));
		$this->dtgFashion->CellPadding = 5;
		$this->dtgFashion->SetDataBinder('dtgFashion_Bind',$this);
		$this->dtgFashion->UseAjax = true;
		$this->dtgFashion->CssClass = 'table table-striped table-bordered table-hover';
		$this->dtgFashion->NoDataHtml = 'No Fashion Partners Currently in the System';
		
		// Define the Add Fashion Dialog. passing in the Method Callback for whenever the Add Fashion Dialog is Closed
        $this->dlgFashionWidget = new FashionWidget('btnAddFashion_Close', $this);
        $this->dlgFashionWidget->Visible = false;

        // Setup the Add Fashion Button
        $this->btnAddFashion = new QButton($this);
        $this->btnAddFashion->Text = 'Add Fashion Partner';
        $this->btnAddFashion->AddAction(new QClickEvent(), new QAjaxAction('btnAddFashion_Click'));
	}
    
    public function CharityEdit_Render(CharityPartner $objCharity) {
            // In order to keep track whether or not a User Edit Button has been rendered,
            // we will use explicitly defined control ids.
            $strControlId = 'btnCharityEdit' . $objCharity->Id;

            // Let's see if the Checkbox exists already
            $btnEdit = $this->GetControl($strControlId);
            
            if (!$btnEdit) {
                // Define the button -- it's parent is the Datagrid (b/c the datagrid is the one calling
                // this method which is responsible for rendering the checkbox.  Also, we must
                // explicitly specify the control ID
                $btnEdit = new QButton($this->dtgCharity, $strControlId);
                $btnEdit->Text = 'Edit Charity';
                $btnEdit->CssClass = 'btn btn-primary';
                
                // We'll use Control Parameters to help us identify the User ID 
                $btnEdit->ActionParameter = $objCharity->Id;
                
                // Let's assign a server action on click
                $btnEdit->AddAction(new QClickEvent(), new QServerAction('btnEditCharity_Click'));
            }
            return $btnEdit->Render(false);
        }
        
		protected function btnEditCharity_Click($strFormId, $strControlId, $strParameter) {
            // Pass details to dialog if necessary
            $this->dlgCharityWidget->IsCreate = false;
            $this->dlgCharityWidget->CharityId = $strParameter;
            $this->dlgCharityWidget->ShowDialogBox();
        }
        
		protected function btnAddCharity_Click($strFormId, $strControlId, $strParameter) {
            // Pass details to dialog if necessary
            $this->dlgCharityWidget->IsCreate = true;
            $this->dlgCharityWidget->ShowDialogBox();
        }
        
        // Setup the "Callback" function for when the User Dialog closes
        // This needs to be a public method
        public function btnAddCharity_Close() {
        	// Update the page as necessary
            $this->dtgCharity->Refresh();
        }
           
    public function dtgCharity_Bind() {
    	$objConditions = QQ::All();
		$objClauses = array();
		$this->dtgCharity->DataSource = CharityPartner::QueryArray($objConditions,$objClauses);
    }    
    	
    /************************/
    public function FashionEdit_Render(FashionPartner $objFashion) {
            // In order to keep track whether or not a User Edit Button has been rendered,
            // we will use explicitly defined control ids.
            $strControlId = 'btnFashionEdit' . $objFashion->Id;

            // Let's see if the Checkbox exists already
            $btnEdit = $this->GetControl($strControlId);
            
            if (!$btnEdit) {
                // Define the button -- it's parent is the Datagrid (b/c the datagrid is the one calling
                // this method which is responsible for rendering the checkbox.  Also, we must
                // explicitly specify the control ID
                $btnEdit = new QButton($this->dtgFashion, $strControlId);
                $btnEdit->Text = 'Edit Fashion Partner';
                $btnEdit->CssClass = 'btn btn-primary';
                
                // We'll use Control Parameters to help us identify the User ID 
                $btnEdit->ActionParameter = $objFashion->Id;
                
                // Let's assign a server action on click
                $btnEdit->AddAction(new QClickEvent(), new QServerAction('btnEditFashion_Click'));
            }
            return $btnEdit->Render(false);
        }
        
		protected function btnEditFashion_Click($strFormId, $strControlId, $strParameter) {
            // Pass details to dialog if necessary
            $this->dlgFashionWidget->IsCreate = false;
            $this->dlgFashionWidget->FashionId = $strParameter;
            $this->dlgFashionWidget->ShowDialogBox();
        }
        
		protected function btnAddFashion_Click($strFormId, $strControlId, $strParameter) {
            // Pass details to dialog if necessary
            $this->dlgFashionWidget->IsCreate = true;
            $this->dlgFashionWidget->ShowDialogBox();
        }
        
        // Setup the "Callback" function for when the User Dialog closes
        // This needs to be a public method
        public function btnAddFashion_Close() {
        	// Update the page as necessary
            $this->dtgFashion->Refresh();
        }
           
    public function dtgFashion_Bind() {
    	$objConditions = QQ::All();
		$objClauses = array();
		$this->dtgFashion->DataSource = FashionPartner::QueryArray($objConditions,$objClauses);
    }    
}

PartnersForm::Run('PartnersForm');
?>
