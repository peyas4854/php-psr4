<?php


namespace app\data;

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
        echo "this is database class";
        
    }
   


}
