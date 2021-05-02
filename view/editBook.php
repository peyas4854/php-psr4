<?php
require_once realpath('../vendor/autoload.php');

use app\controller\BooksController;

include '../app/controller/BooksController.php';

$booksobj = new BooksController();

// Edit book record
if (isset($_GET['editId']) && !empty($_GET['editId'])) {

    // echo $_GET['editId'];
    $editId = $_GET['editId'];
    $books = $booksobj->edit($editId);

}
// Update book record
if (isset($_POST['update'])) {
    $booksobj->update($_POST);

    return header("location:../index.php");

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
            <h4 class="text-center">Edit Books </h4>
            <form action="editBook.php" method="POST">
                <input type="hidden" name="id" value="<?php echo $books['id']; ?>">
                <div class="form-group">
                    <label for="bookname">Bookname </label>
                    <input type="text" class="form-control" placeholder="Enter name " id="bookname" name="name"
                           value="<?php echo $books['name']; ?>">
                </div>
                <div class="form-group">

                    <label for="sel1">Select author</label>
                    <select class="form-control" id="sel1" name="author_id" value="<?php echo $books['author_id']; ?>">
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                    </select>
                </div>

                <div class="form-group">
                    <label for="author">Describtion </label>
                    <textarea class="form-control" rows="5" id="description" name="description"

                              value="<?php echo $books['description']; ?>"> <?php echo $books['description']; ?></textarea>
                </div>
                <input type="submit" name="update" class="btn btn-primary" value="Update">
            </form>
        </div>
    </div>
</div>
<?php
include './layout/scripts.php';
?>
</body>

</html>