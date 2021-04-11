<?php

namespace app\controller;

use mysqli;

class BooksController
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
    public function getBook()
    {

        // get all books  inner join with author 
        $query = "SELECT books.id, books.name as bookname, books.description, authors.name as author_name ,authors.email
        FROM books 
        INNER JOIN  authors
        ON books.author_id = authors.id";
        $result = $this->con->query($query);

        if ($result->num_rows > 0) {
            $data = array();
            while ($row = $result->fetch_assoc()) {
                $data[] = $row;
            }

            return $data;
        } else {
            echo "No found records";
        }
    }
    // create new book record 
    public function create()
    {

        $name = $this->con->real_escape_string($_POST['name']);
        $description = $this->con->real_escape_string($_POST['description']);
        $author_id = $this->con->real_escape_string($_POST['author_id']);


        $query = "INSERT INTO books(name,description,author_id) VALUES('$name','$description','$author_id')";

        $sql = $this->con->query($query);


        if ($sql == true) {
            echo "<div class='alert alert-success alert-dismissible'>
              <button type='button' class='close' data-dismiss='alert'>&times;</button>
              Your Books  added successfully
            </div>";
        } else {
            echo "Registration failed try again!";
        }
    }
    public function edit()
    {
    }
    public function update()
    {
    }

    // delete books record 
    public function delete($id)
    {

        $query = "DELETE FROM books WHERE id = '$id'";
        $sql = $this->con->query($query);
        if ($sql == true) {
            echo "<div class='alert alert-success alert-dismissible'>
              <button type='button' class='close' data-dismiss='alert'>&times;</button>
               Books  record delete  successfully
            </div>";
        } else {

            echo "<div class='alert alert-success alert-dismissible'>
              <button type='button' class='close' data-dismiss='alert'>&times;</button>
              Record does not delete try again
            </div>";
        }
    }
}
