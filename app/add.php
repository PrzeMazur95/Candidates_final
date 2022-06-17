<?php

session_start();
require_once("autoloader.php");


if(isset($_POST['submit'])){

    $first_name = $_POST['firstname'];
    $last_name = $_POST['lastname'];
    $age = $_POST['age'];
    $role = $_POST['role'];
    $date = $_POST['date'];

    $candidate = new CandidateController();

    if($candidate->emptyInput($first_name, $last_name, $age, $date, $role)){

        if(is_int($age) || $age>0){

            if($role<=0){

                $_SESSION['msg']="You have to choose a role!";
                $_SESSION['msg_type']="danger";
                header("location: addCandidateForm.php");

            }else{

                $candidate->addCandidate($first_name, $last_name, $age, $date, $role);

            }



        } else {

        $_SESSION['msg']="Age cannot be less than 0, or you did not type a number!";
        $_SESSION['msg_type']="danger";
        header("location: addCandidateForm.php");

        }

    }else{

        $_SESSION['msg']="You have to type all fields!";
        $_SESSION['msg_type']="danger";
        header("location: addCandidateForm.php");

    }

}else{

    $_SESSION['msg']="You have to submit the form";
    $_SESSION['msg_type']="danger";

    header("location: addCandidateForm.php");

}

?>
