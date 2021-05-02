<?php


namespace app\model;
use PDO;
use PDOException;

class Database
{
    private $servername = 'localhost';
    private $username = 'root';
    private $password = '12345';
    private $dbname = 'books-author';
    public $con;

    public function getConnection()
    {
        $this->conn = null;

        try {
            $this->conn = new PDO("mysql:host=" . $this->servername . ";dbname=" . $this->dbname, $this->username, $this->password);
            $this->conn->exec("set names utf8");

        } catch (PDOException $exception) {
            echo "Connection error: " . $exception->getMessage();
        }

        return $this->conn;
    }
}
