<?php

class Database{
    private $host = 'localhost';
    private $dbname = 'projekti';
    private $username = 'root';
    private $password = '';
    private $conn;

    public function _construct(){
        try{
            $this->conn = new PDO(dsn: "mysql:host={$this->host};dbname={$this->dbname}", username: $this->username, password: $this->password);
            $this->conn->setAttribute(attribute: PPD::ATTR_ERRMODE, value: PDO::ERRMODE_EXCEPTION)    
    

        }catch()
    }
}



?>