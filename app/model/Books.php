<?php

namespace app\model;
use PDO;

class Books
{
    private $conn;
    private $table_name = "books";
    protected $id;
    protected $name;
    protected $description;
    protected $author_id;

    /**
     * Books constructor.
     */
    public function __construct()
    {
        $database = new Database();
        $this->conn = $database->getConnection();
    }

    /**
     * @return bool|\PDOStatement
     */
    public function getAll()
    {
        $query = "SELECT books.id, books.name as bookname, books.description, authors.name as author_name ,authors.email
        FROM " . $this->table_name . "
        INNER JOIN  authors
        ON books.author_id = authors.id";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt;
    }

    /**
     * @return bool
     */
    public function create()
    {

        $query = "INSERT INTO
                " . $this->table_name . "
            SET
                name=:name,  description=:description, author_id=:author_id";
        $stmt = $this->conn->prepare($query);

        $stmt->bindParam(":name", $_POST['name']);
        $stmt->bindParam(":description", $_POST['description']);
        $stmt->bindParam(":author_id", $_POST['author_id']);
        if ($stmt->execute()) {
            return true;
        }
        echo "Registration failed try again!";
        return false;
    }

    /**
     * @param $id
     * @return array
     */
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
            "author_id" => $this->author_id,

        );
    }

    /**
     * @param $id
     * @return bool
     */
    public function update($id)
    {
        $query = "UPDATE
                " . $this->table_name . "
            SET
                name=:name,  description=:description, author_id=:author_id where id=:id";
        $stmt = $this->conn->prepare($query);

        $stmt->bindParam(":name", $_POST['name']);
        $stmt->bindParam(":description", $_POST['description']);
        $stmt->bindParam(":author_id", $_POST['author_id']);
        $stmt->bindParam(':id', $_POST['id']);
        // execute the query
        if ($stmt->execute()) {
            return true;
        }

        return false;
    }

    /**
     * @param $id
     * @return bool
     */
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