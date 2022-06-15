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

}