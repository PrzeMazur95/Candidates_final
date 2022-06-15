<?php 


class Dbh{

    private $host = "localhost";
    private $user = "root";
    private $pwd = "";
    private $dbName = "Candidates";


    protected function connect() {

        try{

        $dsn = 'mysql:host='.$this->host.';dbname='.$this->dbName;
        $pdo = new PDO($dsn, $this->user, $this->pwd);
        $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
        return $pdo;

        } catch (PDOexception $e){

            print "Error: ".$e->getMessage()."</br>";
            die();

        }
        
    }
}

?>