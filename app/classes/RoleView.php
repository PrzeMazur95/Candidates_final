<?php 


class RoleView extends RoleModel{

    public function showAllRoles(){

        $foundRoles = $this->getAllRoles();

        if($foundRoles === false){

            $_SESSION['msg'] = "There are some problems with Db connection, please contact with admin";
            $_SESSION['msg_type'] = "danger";
            
        } else {

            foreach ($foundRoles as $role){ ?>

                <option value=<?php echo $role['id'] ?>><?php echo $role['name'] ?></option>

            <?php }


        }

    }


    public function showSpecificRole($id){

        $role = $this->getRole($this->cleanInput($id));

        if($role === false){

            $_SESSION['msg']="There were some troubles with Db connection, contact with admin!";
            $_SESSION['msg_type']="danger";

        }else{

            return $role;

        }
        

    }

    function cleanInput($input){

        $input = trim($input);
        $input = stripslashes($input);
        $input = htmlspecialchars($input);

        return $input;
        
    }

}

?>