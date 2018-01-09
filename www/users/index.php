<?php
require(dirname(__FILE__) . '/../../includes/prepend.inc.php');
require('UserWidget.class.php');

class UsersForm extends TwoTunicsForm {
	protected $objUser;
	protected $dtgUsers;
	protected $dlgUserWidget;
    protected $btnCreateUser;

	protected function Form_Run() {	
		// If not logged in, go to login page.
		if (!QApplication::$User) QApplication::Redirect(__SUBDIRECTORY__.'/index.php');
	}

	protected function Form_Create() {
		$this->objUser = QApplication::$User;	
					
		$this->dtgUsers = new UserDataGrid($this);
		$this->dtgUsers->AddColumn(new QDataGridColumn('Name', '<?= $_ITEM->FirstName." ".$_ITEM->LastName ?>', 'HtmlEntities=false' ));
		$this->dtgUsers->AddColumn(new QDataGridColumn('Username', '<?= $_ITEM->Username ?>', 'HtmlEntities=false' ));	
		$this->dtgUsers->AddColumn(new QDataGridColumn('Partner Type', '<?= $_FORM->PartnerType_Render($_ITEM) ?>','HtmlEntities=false'));				
		$this->dtgUsers->AddColumn(new QDataGridColumn('Organization', '<?= $_FORM->Organization_Render($_ITEM) ?>','HtmlEntities=false'));
		$this->dtgUsers->AddColumn(new QDataGridColumn('Edit User Details', '<?= $_FORM->UserEdit_Render($_ITEM) ?>', 'HtmlEntities=false'));
		$this->dtgUsers->CellPadding = 5;
		$this->dtgUsers->SetDataBinder('dtgUsers_Bind',$this);
		$this->dtgUsers->UseAjax = true;
		$this->dtgUsers->CssClass = 'table table-striped table-bordered table-hover';
		$this->dtgUsers->NoDataHtml = 'No Users Currently in the System';
		
		// Define the Create User Dialog. passing in the Method Callback for whenever the Create User Dialog is Closed
        $this->dlgUserWidget = new UserWidget('btnCreateUser_Close', $this);
        $this->dlgUserWidget->Visible = false;

        // Setup the Create User Button
        $this->btnCreateUser = new QButton($this);
        $this->btnCreateUser->Text = 'Create User';
        $this->btnCreateUser->AddAction(new QClickEvent(), new QAjaxAction('btnCreateUser_Click'));
	}
    
    public function UserEdit_Render(User $objUser) {
            // In order to keep track whether or not a User Edit Button has been rendered,
            // we will use explicitly defined control ids.
            $strControlId = 'btnEdit' . $objUser->Id;

            // Let's see if the Checkbox exists already
            $btnEdit = $this->GetControl($strControlId);
            
            if (!$btnEdit) {
                // Define the button -- it's parent is the Datagrid (b/c the datagrid is the one calling
                // this method which is responsible for rendering the checkbox.  Also, we must
                // explicitly specify the control ID
                $btnEdit = new QButton($this->dtgUsers, $strControlId);
                $btnEdit->Text = 'Edit User';
                $btnEdit->CssClass = 'btn btn-primary';
                
                // We'll use Control Parameters to help us identify the User ID 
                $btnEdit->ActionParameter = $objUser->Id;
                
                // Let's assign a server action on click
                $btnEdit->AddAction(new QClickEvent(), new QServerAction('btnEditUser_Click'));
            }
            return $btnEdit->Render(false);
        }
        
		protected function btnEditUser_Click($strFormId, $strControlId, $strParameter) {
            // Pass details to dialog if necessary
            $this->dlgUserWidget->IsCreate = false;
            $this->dlgUserWidget->UserId = $strParameter;
            $this->dlgUserWidget->ShowDialogBox();
        }
        
		protected function btnCreateUser_Click($strFormId, $strControlId, $strParameter) {
            // Pass details to dialog if necessary
            $this->dlgUserWidget->IsCreate = true;
            $this->dlgUserWidget->ShowDialogBox();
        }
        
        // Setup the "Callback" function for when the User Dialog closes
        // This needs to be a public method
        public function btnCreateUser_Close() {
        	// Update the page as necessary
            $this->dtgUsers->Refresh();
        }
        
    public function PartnerType_Render(User $objUser) {
    	$charityArray = CharityPartner::LoadArrayByUserAsCharity($objUser->Id);
    	if(!empty($charityArray)) return 'Charity Partner';
    	
    	$fashionArray = FashionPartner::LoadArrayByUserAsFashion($objUser->Id);
    	if(!empty($fashionArray)) return 'Fashion Partner';
    	if($objUser->AccessLevel == 3) return 'Administrator';
    	else return 'Unknown';
    	
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

UsersForm::Run('UsersForm');
?>
