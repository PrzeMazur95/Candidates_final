<?php

session_start();
require_once("autoloader.php");

//checking if submit button has been clocked in AddRoleForm

if(isset($_POST['submit'])){

    $name = $_POST['name'];

    $role = new RoleController();
    //checking if user typed a new role name 
    if($role->emptyInput($name)){
        //call to a method which will add new role
        $role->addRole($name);

    }else{

        $_SESSION['msg']="You have to type name of new role!";
        $_SESSION['msg_type']="danger";
        header("location: addRoleForm.php");

    }

}else{

    $_SESSION['msg']="You have to submit the form";
    $_SESSION['msg_type']="danger";

    header("location: addRoleForm.php");

}

?>
