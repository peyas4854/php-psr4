<?php

namespace app\controller;
use app\model\Database;
use PDO;

class BooksController
{
    private $conn;
    private $table_name = "books";
    public $id;
    public $name;
    public $description;
    public $author_id;


    public function __construct()
    {
        $database = new Database();
        $this->conn = $database->getConnection();
    }


    public function getBook()
    {

        // get all books  inner join with author 
        $query = "SELECT books.id, books.name as bookname, books.description, authors.name as author_name ,authors.email
        FROM books 
        INNER JOIN  authors
        ON books.author_id = authors.id";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt;

    }

    // create new book record
    public function create()
    {

        $query = "INSERT INTO
                " . $this->table_name . "
            SET
                name=:name,  description=:description, author_id=:author_id";
        $stmt = $this->conn->prepare($query);

        $this->name = ($_POST['name']);
        $this->description = ($_POST['description']);
        $this->author_id = ($_POST['author_id']);

        $stmt->bindParam(":name", $this->name);
        $stmt->bindParam(":description", $this->description);
        $stmt->bindParam(":author_id", $this->author_id);
        if ($stmt->execute()) {

            return true;
        }
        echo "Registration failed try again!";
        return false;

    }

    public function edit($id)
    {

        $query = "SELECT * FROM books WHERE id = '$id'";
        $stmt = $this->conn->prepare($query);

        // bind id of product to be updated
        $stmt->bindParam(1, $this->id);

        // execute query
        $stmt->execute();


        // get retrieved row
        $row = $stmt->fetch(PDO::FETCH_ASSOC);

        // set values to object properties
        $this->id = $row['id'];
        $this->name = $row['name'];
        $this->description = $row['description'];
        $this->author_id = $row['author_id'];
        return $product_arr = array(
            "id" => $this->id,
            "name" => $this->name,
            "description" => $this->description,
            "price" => $this->author_id,


        );


    }

    public function update($postData)
    {

        $query = "UPDATE
                " . $this->table_name . "
            SET
                name=:name,  description=:description, author_id=:author_id where id=:id";
        $stmt = $this->conn->prepare($query);

        $this->name = ($_POST['name']);
        $this->description = ($_POST['description']);
        $this->author_id = ($_POST['author_id']);
        $this->id = ($_POST['id']);

        $stmt->bindParam(":name", $this->name);
        $stmt->bindParam(":description", $this->description);
        $stmt->bindParam(":author_id", $this->author_id);
        $stmt->bindParam(':id', $this->id);
        // execute the query
        if ($stmt->execute()) {
            return true;
        }

        return false;
    }

    // delete books record 
    public function delete($id)
    {

        $query = "DELETE FROM " . $this->table_name . " WHERE id = ?";

        // prepare query
        $stmt = $this->conn->prepare($query);

        $this->id = $id;

        // bind id of record to delete
        $stmt->bindParam(1, $this->id);

        // execute query
        if ($stmt->execute()) {
            echo "<div class='alert alert-success alert-dismissible'>
              <button type='button' class='close' data-dismiss='alert'>&times;</button>
               Books  record delete  successfully
            </div>";
            return true;
        }

        return false;
    }
}
