<?php 


class RoleModel extends Dbh{

    private $db_Table = "Role";

    protected function getAllRoles(){

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

    protected function setRole($name){

        $sql = "INSERT INTO $this->db_Table (name) VALUES (?)";

        $stmt = $this->connect()->prepare($sql);
    
        if(!$stmt->execute([$name])){

            $stmt=null;
            return false;

        }else{

            $stmt=null;
            return true;

        }

    }

    protected function getRole($id){

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

}

?>