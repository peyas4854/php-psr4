<?php


namespace app\model;

use mysqli;

class Database
{


    private $servername = 'localhost';
    private $username = 'root';
    private $password = '12345';
    private $dbname = 'books-author';
    public  $con;

    public function __construct()
    {
        $this->con = new mysqli($this->servername, $this->username, $this->password, $this->dbname);
        if (mysqli_connect_error()) {
            trigger_error("Failed to connect to MySQL: " . mysqli_connect_error());
        } else {
            return  $this->con;
        }
        
    }
   


}
