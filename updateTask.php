<?php
// Start the session (if not started already)
session_start();

// Include connection file
include('connection.php');
include('task.php');

// Create an instance of class Connection
$connection = new Connection();

// Call the selectDatabase method
$connection->selectDatabase('mydatabase');
$taskNameValue = "";
$statusValue = "";
$dueDateValue = "";
$duetimeValue = "";
$categoryValue = "";

include('category.php');

// Check if the user is logged in (replace 'emailS' with the appropriate session variable)
$userEmail = isset($_SESSION['emailS']) ? $_SESSION['emailS'] : "Not set";

// Check if the form is being submitted
if ($_SERVER['REQUEST_METHOD'] == 'GET') {
  $id = $_GET['id'];

  // Call the static selectTaskById method and store the result in $row
  $row = Task::selectTaskById('task', $connection->conn, $id);

  // Check if the key 'taskname' exists in the $row array
  if (isset($row["taskname"])) {
    $taskNameValue = $row["taskname"];
  }

  // Check if the key 'status' exists in the $row array
  if (isset($row["status"])) {
    $statusValue = $row["status"];
  }

  // Check if the key 'dueDate' exists in the $row array
  if (isset($row["dueDate"])) {
    $dueDateValue = $row["dueDate"];
  }

  // Check if the key 'dueTime' exists in the $row array
  if (isset($row["dueTime"])) {
    $duetimeValue = $row["dueTime"];
  }

  // Check if the key 'idCategory' exists in the $row array
  if (isset($row["idCategory"])) {
    $categoryValue = $row["idCategory"];
  }
} elseif ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST["submit"])) {
  $id = $_GET['id']; // Ensure $id is set

  // Check if 'categoryInput' key is set in the $_POST array
  if (isset($_POST["categoryInput"])) {
    $taskNameValue = $_POST["taskNameInput"];
    $statusValue = $_POST["statusInput"];
    $dueDateValue = $_POST["dueDateInput"];
    $duetimeValue = $_POST["dueTimeInput"];
    $categoryValue = $_POST["categoryInput"];

    // Create a new instance of the Task class with the values of the inputs
    $task = new Task($taskNameValue, $statusValue, $dueDateValue, $duetimeValue, $categoryValue);

    // Call the updateTask method
    Task::updateTask($task, 'task', $connection->conn, $id);
  }
  $taskNameValue = "";
  $statusValue = "";
  $dueDateValue = "";
  $duetimeValue = "";
  $categoryValue = "";
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Update Task</title>
  <link rel="stylesheet" type="text/css" href="taskpro.css">
</head>

<body>
  <?php
  echo "Welcome to taskpro <br> ";
  echo "Email: $userEmail <br>";
  ?>

  <div class="logout-container2">
    <a href="readTasks.php">My tasks</a>
  </div>

  <form id="task-form" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>?id=<?php echo $id; ?>"
    method="post">
    <h2>Update Task</h2>

    <label for="taskInput">Task:</label>
    <input type="text" name="taskNameInput" value="<?php echo htmlspecialchars($taskNameValue); ?>">

    <label for="dueDateInput">Due Date:</label>
    <input type="date" name="dueDateInput" value="<?php echo htmlspecialchars($dueDateValue); ?>">

    <label for="dueTimeInput">Due Time:</label>
    <input type="time" name="dueTimeInput" value="<?php echo htmlspecialchars($duetimeValue); ?>">

    <label for="statusInput">Status:</label>
    <input type="text" name="statusInput" value="<?php echo htmlspecialchars($statusValue); ?>">

    <label for="categoryInput">Category:</label>
    <select name="categoryInput">
      <?php
      $categories = Category::selectAllCategories("category", $connection->conn);
      foreach ($categories as $category) {
        $selected = ($category['id'] == $categoryValue) ? "selected" : "";
        echo "<option value='{$category['id']}' {$selected}>{$category['catname']}</option>";
      }
      ?>
    </select>

    <button class="btn" type="submit" name="submit">Update</button>
  </form>

  <script src="taskpro.js"></script>
</body>

</html>