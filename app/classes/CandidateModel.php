<?php 


class CandidateModel extends Dbh{

    public function getAllCandidates(){

        $sql = "SELECT * FROM Candidates";
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

}

?>