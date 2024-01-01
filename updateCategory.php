<?php
// include connection file
include('connection.php');

// create an instance of class Connection
$connection = new Connection();

// call the selectDatabase method
$connection->selectDatabase('mydatabase');
$categoryValue = "";

$errorMesage = "";
$successMesage = "";

include('category.php');

if ($_SERVER['REQUEST_METHOD'] == 'GET') {
  $id = $_GET['id'];

  // Call the staticbselectClientById method and store the result of the method in $row
  $row = Category::selectCategoryById('category', $connection->conn, $id);

  // Check if the key 'category' exists in the $row array
  if (isset($row["category"])) {
    $categoryValue = $row["category"]; // line 23
  }

} else if (isset($_POST["submit"])) {

  // Check if 'category' key is set in the $_POST array
  if (isset($_POST["category"])) {
    $categoryValue = $_POST["category"];

    if (empty($categoryValue)) {
      $errorMesage = "Field must be filled out!";
    } else {
      // include the client file

      // create a new instance of the Category class with the values of the inputs
      $Category = new Category($categoryValue);

      // call the insertCategory method
      Category::updateCategory($Category, 'category', $connection->conn, $_GET['id']);

      // give the $successMesage the value of the static $successMsg of the class
      $successMesage = Category::$successMsg;

      // give the $errorMesage the value of the static $errorMsg of the class
      $errorMesage = Category::$errorMsg;

      $categoryValue = "";
    }
  } else {
    $errorMesage = "Category field must be filled out!";
  }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Add category</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</head>

<body>
  <div class="container my-5">

    <h2>Update category</h2>

    <?php
    if (!empty($errorMesage)) {
      echo "<div class='alert alert-warning alert-dismissible fade show' role='alert'>
                    <strong>$errorMesage</strong>
                    <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
                </div>";
    }
    ?>

    <br>
    <form method="post">

      <div class="row mb-3">
        <label class="col-form-label col-sm-1" for="fname"> Name:</label>
        <div class="col-sm-6">
          <input value="<?php echo $categoryValue ?>" class="form-control" type="text" id="category" name="category">
        </div>
      </div>

      <?php
      if (!empty($successMesage)) {
        echo "<div class='alert alert-success alert-dismissible fade show' role='alert'>
                        <strong>$successMesage</strong>
                        <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
                    </div>";
      }
      ?>

      <div class="row mb-3">
        <div class="offset-sm-1 col-sm-3 d-grid">
          <button name="submit" type="submit" class="btn btn-primary">Update</button>
        </div>
      </div>

    </form>
  </div>
</body>

</html>