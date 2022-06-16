<?php 


class CandidateController extends CandidateModel{

    private $name;
    private $age;
    private $date;
    private $role;
    
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

    function emptyInput($firstname, $lastname, $age, $date, $role){

        if(empty($firstname) || empty($lastname) || empty($age) || empty($date) || empty($role)){

            return false;

        }else{

            return true;

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