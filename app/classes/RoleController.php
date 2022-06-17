<?php 


class RoleController extends RoleModel{

    private $name;
    
    public function addName($name){

        $this->name = $this->cleanInput($name);

    }

    public function addRole($name){

        $this->addName($name);

        if(!$this->setRole($this->name)){

            $_SESSION['msg']="Something went wrong with Db connection, please contact with admin!";
            $_SESSION['msg_type']="danger";
            header("location: addRoleForm.php");

        } else {

            $_SESSION['msg']="You have added new Role!";
            $_SESSION['msg_type']="success";
            header("location: addRoleForm.php");

        }

    }

    public function emptyInput($name){

        if(empty($name)){

            return false;

        }else{

            return true;

        }
        
    }

    private function cleanInput($input){

        $input = trim($input);
        $input = stripslashes($input);
        $input = htmlspecialchars($input);

        return $input;
        
    }

}

?>