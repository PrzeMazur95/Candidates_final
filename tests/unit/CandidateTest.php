<?php

require 'app/classes/Dbh.php';
require 'app/classes/CandidateModel.php';
require 'app/classes/CandidateView.php';
require 'app/classes/CandidateController.php';

class CandidateTest extends \PHPUnit\Framework\TestCase{

    public $Dbh;
    public $CandidateController;
    public $CandidateView;
    public $CandidateModel;

    protected function setUp(): void {

        $this->Dbh = new Dbh();
        $this->CandidateController = new CandidateController();
        $this->CandidateView = new CandidateView();
        $this->CandidateModel= new CandidateModel();

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

}