<?php

namespace Models;
use PDO;
use PDOException;

class Database
{
    private $host = 'localhost';
    private $db_name = 'db_todolist';
    private $username = 'root';
    private $password = '';
    public $conn;

    //PDO connection
    public function connect(){
        try{
            $this->conn = new PDO('mysql:host='.$this->host.';dbname='.$this->db_name, $this->username, $this->password);
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            return $this->conn;
        }catch (PDOException $e){
            echo 'Erro na conexão: '.$e->getMessage();
            return false;
        }
    }


}
