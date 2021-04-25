<?php

namespace app\controller;

use app\model\Database;


class BooksController extends Database
{

    
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
    public function edit($id)
    {
       
        $query = "SELECT * FROM books WHERE id = '$id'";
			$result = $this->con->query($query);
			if ($result->num_rows > 0) {
				$row = $result->fetch_assoc();
				return $row;
			}else{
				echo "Record not found";
			}
    }
    public function update($postData)
    {

        $name = $this->con->real_escape_string($_POST['name']);
        $description = $this->con->real_escape_string($_POST['description']);
        $author_id = $this->con->real_escape_string($_POST['author_id']);
        $id = $this->con->real_escape_string($_POST['id']);

        if (!empty($id) && !empty($postData)) {
            $query = "UPDATE books SET name = '$name', author_id = '$author_id', description = '$description' WHERE id = '$id'";
            $sql = $this->con->query($query);
            if ($sql==true) {
                echo "<div class='alert alert-success alert-dismissible'>
              <button type='button' class='close' data-dismiss='alert'>&times;</button>
               Books  updated  successfully
            </div>";
           
            }else{
                echo "Books updated  failed try again!";
            }
        }
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
