<?php

use app\controller\BooksController;

include '../app/controller/BooksController.php';

$booksobj = new BooksController();

// create new book record 
if (isset($_POST['submit'])) {

    $booksobj->create($_POST);
}

?>
<!doctype html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <title>PHP-OOP</title>
</head>

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
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>

</html>