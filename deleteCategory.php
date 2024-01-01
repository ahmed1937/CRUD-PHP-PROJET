<?php

if ($_SERVER['REQUEST_METHOD'] == 'GET') {
  $id = $_GET['id'];

  include('connection.php');

  $connection = new Connection();
  $connection->selectDatabase('mydatabase');

  include('category.php');

  if (Category::deleteCategory('category', $connection->conn, $id)) {
    header("Location: readCategory.php");
    exit();
  } else {
    // Display detailed error message
    echo "Error deleting category: " . Category::$errorMsg;
  }
}


?>