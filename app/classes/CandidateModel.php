<?php 


class CandidateModel extends Dbh{

    private $db_Table = "Candidates";

    protected function getAllCandidates(){

        $sql = "SELECT * FROM $this->db_Table";
        $stmt = $this->connect()->prepare($sql);

        if($stmt->execute([$sql])){

            $results = $stmt->fetchAll();
            $stmt=null;
            return $results;

        } else {

            $stmt=null;
            return false;

        }

    }

    protected function setCandidate($name, $age, $date, $role){

        $sql = "INSERT INTO Candidates (name, age, application_date, role) VALUES (?,?,?,?)";

        $stmt = $this->connect()->prepare($sql);
    
        if(!$stmt->execute(array($name, $age, $date, $role))){

            $stmt=null;
            return false;

        }else{

            $stmt=null;
            return true;

        }

    }

}

?>