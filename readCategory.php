<?php

//include connection file
include('connection.php');


//create in instance of class Connection
$connection = new Connection();


//call the selectDatabase method
$connection->selectDatabase('mydatabase');

//include the client file
include('category.php');


//call the static selectAllClients method and store the result of the method in $clients
$Categories = Category::selectAllCategories('category', $connection->conn);


?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title> category list </title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

</head>

<body>

  <div class="container my-5">
    <h2>List of categories from database</h2>
    <a class="btn btn-primary" href="createCategory.php" role="button">Add</a>

    <br>
    <br>
    <form method="post">

      <table class="table">

        <thead>
          <tr>
            <th>ID</th>
            <th>Category Name</th>
            <th>Action</th>
          </tr>
        </thead>
        <tbody>

          <?php
          foreach ($Categories as $row) {
            echo " <tr>
            <td>$row[id]</td>
            <td>$row[catname]</td>
            <td>
            <a class ='btn btn-success btn-sm' href='updateCategory.php?id=$row[id]'>edit</a>
            <a class ='btn btn-danger btn-sm' href='deleteCategory.php?id=$row[id]'>delete</a>
            </td>
        </tr>";
          }

          ?>
        </tbody>

      </table>
  </div>
</body>

</html>