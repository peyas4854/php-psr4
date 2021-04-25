<?php
require_once realpath('vendor/autoload.php');

use app\controller\BooksController;


include './app/controller/BooksController.php';

$booksobj = new BooksController();
// delete books record 
if (isset($_GET['deleteId']) && !empty($_GET['deleteId'])) {
    $deleteId = $_GET['deleteId'];
    $booksobj->delete($deleteId);
}

include './view/layout/header.php';
?>

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
        if (isset($_GET['msg2']) == "update") {
            echo "<div class='alert alert-success alert-dismissible'>
                    <button type='button' class='close' data-dismiss='alert'>&times;</button>
                    Books  updated successfully
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
                        $books = $booksobj->getBook();
                        foreach ($books as $book) {
                        ?>
                            <tr>
                                <td><?php echo $book['id'] ?></td>
                                <td><?php echo $book['bookname'] ?></td>
                                <td><?php echo $book['author_name'] ?></td>
                                <td><?php echo $book['description'] ?></td>


                                <td>
                                    <a href="view/editBook.php?editId=<?php echo $book['id'] ?>" class="btn btn-sm btn-primary">EDIT</a>
                                    <a href="index.php?deleteId=<?php echo $book['id'] ?>" class="btn btn-sm btn-danger text-white">DELETE</a>
                                </td>
                            </tr>
                        <?php } ?>

                    </tbody>
                </table>
            </div>
        </div>


    </div>

    <?php
    include './view/layout/scripts.php';
    ?>
</body>

</html>