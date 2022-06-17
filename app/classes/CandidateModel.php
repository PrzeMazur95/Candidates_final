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

    protected function getCandidate($id){

        $sql = "SELECT * FROM $this->db_Table WHERE id = ? LIMIT 1";
        $stmt = $this->connect()->prepare($sql);

        if($stmt->execute([$id])){

            $result = $stmt->fetchAll();
            $stmt=null;
            return $result;

        } else {

            $stmt=null;
            return false;

        }

    }

    protected function update($id, $name, $age, $date, $role){

        $sql = "UPDATE $this->db_Table SET name = ?, age = ?, application_date = ?, role = ? WHERE id = ?";
    
        $stmt = $this->connect()->prepare($sql);
        
        if(!$stmt->execute(array($name, $age, $date, $role, $id))){
    
            $stmt=null;
            return false;
    
        }else{
    
            $stmt=null;
            return true;
    
        }
    

    }

    protected function delete($id){

        $sql = "DELETE FROM $this->db_Table WHERE id = ?";
    
        $stmt = $this->connect()->prepare($sql);
        
        if(!$stmt->execute([$id])){
    
            $stmt=null;
            return false;
    
        }else{
    
            $stmt=null;
            return true;
    
        }

    }

}

?>