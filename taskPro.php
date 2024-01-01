<?php
session_start();

//include connection file
include('connection.php');

//create an instance of class Connection
$connection = new Connection();
//call the selectDatabase method
$connection->selectDatabase('mydatabase');

// Retrieve categories from the database
$taskNameValue = "";
$statusValue = "";
$dueDateValue = "";
$duetimeValue = "";

if (isset($_POST["submit"])) {

  $taskNameValue = $_POST["taskNameInput"];
  $statusValue = $_POST["statusInput"];
  $dueDateValue = $_POST["dueDateInput"];
  $duetimeValue = $_POST["dueTimeInput"];
  $idCategoryValue = $_POST["categoryInput"];

  //include the task file
  include('task.php');

  //create a new instance of the Task class with the values of the inputs
  $task = new Task($taskNameValue, $statusValue, $dueDateValue, $duetimeValue, $idCategoryValue);

  //call the insertTask method
  $task->insertTask('task', $connection->conn);

  $taskNameValue = "";
  $statusValue = "";
  $dueDateValue = "";
  $duetimeValue = "";
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Task Management</title>
  <link rel="stylesheet" type="text/css" href="taskpro.css">
</head>

<body>

  <?php
  echo "Welcome to taskpro <br> ";
  echo isset($_SESSION['emailS']) ? "{$_SESSION['emailS']} <br>" : "Email: Not set <br>"; ?>

  <div class="logout-container">
    <a href="readTasks.php">My tasks</a> <a href="index.php">Log Out</a>
  </div>

  <form id="task-form" action="" method="post">
    <h2>Add Task</h2>

    <label for="taskInput">Task:</label>
    <input type="text" name="taskNameInput" placeholder="Enter a new task">

    <label for="dueDateInput">Due Date:</label>
    <input type="date" name="dueDateInput">

    <label for="dueTimeInput">Due Time:</label>
    <input type="time" name="dueTimeInput">

    <label for="statusInput">Status:</label>
    <input type="text" name="statusInput">

    <label for="categoryInput">Category:</label>
    <select name="categoryInput">
      <?php
      include 'Category.php';
      $categories = Category::selectAllCategories("category", $connection->conn);
      foreach ($categories as $category) {
        echo "<option value='{$category['id']}'>{$category['catname']}</option>";
      }
      ?>
    </select>
    <br> <br>
    <button class="btn" type="submit" name="submit">Add Task</button>
  </form>

  <script src="taskpro.js"></script>
</body>

</html>