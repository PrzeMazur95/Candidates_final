<?php

session_start();
require_once("autoloader.php");

//check if delete button on show page has been clicked
if(isset($_GET['deleteCandidate'])){

    $id = $_GET['id'];

    $candidate = new CandidateController();
    //check if in URL is candidate ID number
    if(!empty($_GET['id'])){
        //check if user did not type something else by hand as a URL id 
        if(is_numeric($_GET['id']) || $_GET['id']>0){
            //if everything above is correct, delete user
            $candidate->deleteCandidate($id);

        } else {

        $_SESSION['msg']="ID of candidate cannot be less than 0, or you did not type a number!";
        $_SESSION['msg_type']="danger";
        header("location: show.php");

        }

    }else{

        $_SESSION['msg']="You have to put ID of candidate which you want to remove!";
        $_SESSION['msg_type']="danger";
        header("location: show.php");

    }

}else{

    $_SESSION['msg']="You have to press delete button near Candidate you want to remove";
    $_SESSION['msg_type']="danger";

    header("location: show.php");

}

?>
