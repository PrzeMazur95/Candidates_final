<?php

require 'app/classes/Dbh.php';
require 'app/classes/CandidateModel.php';
require 'app/classes/CandidateView.php';
require 'app/classes/CandidateController.php';
require 'app/classes/RoleModel.php';
require 'app/classes/RoleView.php';
require 'app/classes/RoleController.php';

class CandidateTest extends \PHPUnit\Framework\TestCase{

    public $Dbh;
    public $CandidateController;
    public $CandidateView;
    public $CandidateModel;
    public $RoleController;
    public $RoleView;
    public $RoleModel;

    protected function setUp(): void {

        $this->Dbh = new Dbh();
        $this->CandidateController = new CandidateController();
        $this->CandidateView = new CandidateView();
        $this->CandidateModel= new CandidateModel();
        $this->RoleController= new RoleController();
        $this->RoleView = new RoleView();
        $this->RoleModel= new RoleModel();

    }

    public function test_if_we_can_instantiate_Dbh(){

        $this->assertInstanceOf("Dbh",$this->Dbh);

    }

    public function test_if_Dbh_has_connect_method(){

        $this->assertTrue(method_exists($this->Dbh, 'connect'));

    }

    public function test_if_we_can_instantiate_CandidateModel(){

        $this->assertInstanceOf("CandidateModel",$this->CandidateModel);

    }

    public function test_if_we_can_instantiate_CandidateController(){

        $this->assertInstanceOf("CandidateController",$this->CandidateController);

    }

    public function test_if_we_can_instantiate_CandidateView(){

        $this->assertInstanceOf("CandidateView",$this->CandidateView);

    }

    public function test_if_we_can_ask_Db_to_find_All_Candidates_and_get_result(){

        $this->CandidateModel->getAllCandidates();
        $this->assertTrue($this->CandidateModel->getAllCandidates());

    }

    public function test_if_we_can_show_all_Candidates_to_user(){

        $this->CandidateView->showAllCandidates();
        $this->assertTrue($this->CandidateView->showAllCandidates());

    }

    public function test_if_we_can_check_if_properties_are_not_empty(){

        $this->CandidateController->emptyInput('John', 'Doe', 25 , '2022-06-16', 'Admin');

    }

    public function test_if_we_can_clean_properties(){

        $this->assertEquals($this->CandidateController->cleanInput('John    '),'John');

    }

    public function test_if_we_can_set_candidate(){

        $this->CandidateController->addName('John','Doe');
        $this->CandidateController->addDate('2022-16-07');
        $this->CandidateController->addAge(25);
        $this->CandidateController->addRole('Admin');
        $this->CandidateController->addCandidate();
        $this->CandidateModel->setCandidate('John Doe', '25', '2022-16-07', 'Admin');

    }

    public function test_if_we_can_show_specific_candidate(){

        $this->CandidateView->showSpecificCandidate(3);
        
    }

    public function test_if_we_can_get_specific_candidate_from_db(){

        $this->CandidateModel->getCandidate(3);
        
    }

    public function test_if_we_can_update_candidate_informations(){

        $this->CandidateController->updateCandidate(3, 'Jane', 'Fox', 45, 'Moderator', '2024-16-08');

    }

    public function test_if_we_can_update_user_informations_in_db(){

        $this->CandidateModel->update(3, 'Jane', 'Fox', 45, 'Moderator', '2024-16-08');

    }

    public function test_if_we_can_delete_candidate(){

        $this->CandidateController->deleteCandidate(1);

    }

    public function test_if_we_can_delete_candidate_from_db(){

        $this->CandidateModel->delete(1);

    }

    public function test_if_we_can_instantiate_RoleModel(){

        $this->assertInstanceOf("CandidateModel",$this->CandidateModel);

    }

    public function test_if_we_can_instantiate_RoleController(){

        $this->assertInstanceOf("CandidateController",$this->CandidateController);

    }

    public function test_if_we_can_instantiate_RoleView(){

        $this->assertInstanceOf("CandidateView",$this->CandidateView);

    }

    public function test_if_we_can_ask_db_to_show_all_Roles(){

        $this->RoleModel->getAllRoles();
        $this->assertTrue($this->RoleModel->getAllRoles());

    }

    public function test_if_we_can_set_new_role_in_db(){

        $this->RoleModel->setRole('Administrator');

    }

    public function test_if_we_can_set_get_specifc_role_from_db(){

        $this->RoleModel->getRole(3);

    }

    public function test_if_we_can_set_show_all_roles_to_user(){

        $this->RoleView->showAllRoles();

    }

    public function test_if_we_can_set_show_specific_role_to_user(){

        $this->RoleView->showSpecificRole(2);

    }

    public function test_if_we_can_clean_properties_in_RoleView(){

        $this->RoleView->cleanInput('       Admin');

    }

    public function test_if_we_can_check_empty_inputs_in_RoleController(){

        $this->RoleController->emptyInput('Admin');

    }

    public function test_if_we_can_clear_inputs_in_RoleController(){

        $this->RoleController->cleanInput();

    }

    public function test_if_we_can_set_name_of_role_in_RoleController(){

        $this->RoleController->addName('Admin');

    }

    public function test_if_user_can_set_new_role_in_RoleController(){

        $this->RoleController->addRole('Admin');

    }

    

}