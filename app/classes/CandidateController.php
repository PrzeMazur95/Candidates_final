<?php 


class CandidateController extends CandidateModel{

    private $name;
    private $age;
    private $date;
    private $role;
    private $id;
    
    public function addName($firstname, $lastname){

        $this->name = $this->cleanInput($firstname)." ".$this->cleanInput($lastname);

    }

    public function addAge($age){

        $this->age=$this->cleanInput($age);
        
    }

    public function addDate($date){

        $this->date=$this->cleanInput($date);
        
    }

    public function addRole($role){

        $this->role=$this->cleanInput($role);
    
    }
    public function addId($id){

        $this->id=$this->cleanInput($id);
    
    }

    public function addCandidate($first_name, $last_name, $age, $date, $role){

        $this->addName($first_name, $last_name);
        $this->addAge($age);
        $this->addDate($date);
        $this->addRole($role);

        if(!$this->setCandidate($this->name, $this->age, $this->date, $this->role)){

            $_SESSION['msg']="Something went wrong with Db connection, please contact with admin!";
            $_SESSION['msg_type']="danger";
            header("location: addCandidateForm.php");

        } else {

            $_SESSION['msg']="You have added new Candidate!";
            $_SESSION['msg_type']="success";
            header("location: addCandidateForm.php");

        }

    }

    public function emptyInput($firstname, $lastname, $age, $date, $role){

        if(empty($firstname) || empty($lastname) || empty($age) || empty($date) || empty($role)){

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

    public function updateCandidate($id, $first_name, $last_name, $age, $role, $date){

        $this->addId($id);
        $this->addName($first_name, $last_name);
        $this->addAge($age);
        $this->addDate($date);
        $this->addRole($role);

        if(!$this->update($this->id, $this->name, $this->age, $this->date, $this->role)){

            $_SESSION['msg']="Something went wrong with Db connection, please contact with admin!";
            $_SESSION['msg_type']="danger";
            header("location: editCandidateForm.php?editCandidate&id=$this->id");

        } else {

            $_SESSION['msg']="You have sucesfully updated this Candidate!";
            $_SESSION['msg_type']="success";
            header("location: editCandidateForm.php?editCandidate&id=$this->id");

        }

    }

}

?>