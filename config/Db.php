<?php

class DB
{
    private $host = 'localhost';
    private $dbname = 'secretlab';
    private $user = 'root';
    private $pass = '';
    private $conn;

    public function connectdb()
    {
        $this->conn = null;
        
        try 
        { 
            $this->conn = new PDO('mysql:host=' . $this->host . ';dbname=' . $this->dbname, $this->user, $this->pass);
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } 
        catch(PDOException $e) 
        {
            echo 'Connection Error: ' . $e->getMessage();
        }
        return $this->conn;
    }
}