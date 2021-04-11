<?php

use app\controller\BooksController;

include '../app/controller/BooksController.php';

$booksobj = new BooksController();

// create new book record 
if (isset($_POST['submit'])) {

    $booksobj->create($_POST);
}

include './layout/header.php';
?>

<body>

    <div class="jumbotron">
        <h1 class="text-center">PHP-OOP-PSR-4-STANDARD</h1>

    </div>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h4 class="text-center">Add Books </h4>
                <form action="addBook.php" method="POST">
                    <div class="form-group">
                        <label for="bookname">Bookname </label>
                        <input type="text" class="form-control" placeholder="Enter name " id="bookname" name="name">
                    </div>
                    <div class="form-group">

                        <label for="sel1">Select author</label>
                        <select class="form-control" id="sel1" name="author_id">
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="4">4</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="author">Describtion </label>
                        <textarea class="form-control" rows="5" id="description" name="description"></textarea>
                    </div>
                    <input type="submit" name="submit" class="btn btn-primary" value="Submit">
                </form>
            </div>
        </div>
    </div>
    <?php
include './layout/scripts.php';
?>
</body>

</html>