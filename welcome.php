<?php

use app\controller\BooksController;


include './app/controller/BooksController.php';

$booksobj = new BooksController();
// delete books record 
if (isset($_GET['deleteId']) && !empty($_GET['deleteId'])) {
  $deleteId = $_GET['deleteId'];
  $booksobj->delete($deleteId);
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
    <?php
    if (isset($_GET['msg1']) == "insert") {
      echo "<div class='alert alert-success alert-dismissible'>
              <button type='button' class='close' data-dismiss='alert'>&times;</button>
              Your Registration added successfully
            </div>";
    }

    ?>
    <div class="row">
      <div class="col-md-12">
        <h4 class="text-center">All Books </h4>
        <a href="view/addBook.php" class="btn btn-primary btn-sm float-right mb-4"> Add Book</a>
        <table class="table table-border ">
          <thead>
            <tr>
              <th scope="col">#</th>
              <th scope="col">Book name </th>
              <th scope="col">Author </th>
              <th scope="col">Describtion </th>
              <th>Action</th>
            </tr>
          </thead>
          <tbody>
            <?php
            $customers = $booksobj->getBook();
            foreach ($customers as $customer) {
            ?>
              <tr>
                <td><?php echo $customer['id'] ?></td>
                <td><?php echo $customer['bookname'] ?></td>
                <td><?php echo $customer['author_name'] ?></td>
                <td><?php echo $customer['description'] ?></td>


                <td>
                  <a href="view/edit.php" class="btn btn-sm btn-primary">EDIT</a>
                  <a href="welcome.php?deleteId=<?php echo $customer['id'] ?>" class="btn btn-sm btn-danger text-white">DELETE</a>
                </td>
              </tr>
            <?php } ?>

          </tbody>
        </table>
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