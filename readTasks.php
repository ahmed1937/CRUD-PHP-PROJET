<?php
include('category.php');
include('connection.php');

$connection = new Connection();
$connection->selectDatabase('mydatabase');
include('task.php');

// Check if the form is submitted
if (isset($_POST['submit'])) {
  // If submitted, filter tasks by category
  $categoryId = isset($_POST['category']) ? $_POST['category'] : null;
  $tasks = $categoryId ? Task::selectTaskByCategoryId('task', $connection->conn, $categoryId) : Task::selectAllTasks('task', $connection->conn);
} else {
  // If not submitted, get all tasks
  $tasks = Task::selectAllTasks('task', $connection->conn);
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Task list</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</head>

<body>
  <div class="container my-5">
    <h2>List of Tasks</h2>

    <br><br>
    <form method="post">

      <div class="input-group">

        <span class="input-group-btn">
          <button class="btn btn-success" type="submit" name="submit">Search</button>
        </span>
        <select name='category' class="form-select">
          <option value=''>Show All</option>
          <?php
          $categories = Category::selectAllCategories('category', $connection->conn);
          foreach ($categories as $category) {
            echo "<option value='$category[id]' >$category[catname]</option>";
          }
          ?>
        </select>
      </div>
    </form>

    <table class="table">
      <thead>
        <tr>
          <th>ID</th>
          <th>Task Name</th>
          <th>Status</th>
          <th>Due date</th>
          <th>Due Time</th>
          <th>Category Name</th>
          <th>Action</th>
        </tr>
      </thead>
      <tbody>
        <?php
        if (isset($tasks)) {
          foreach ($tasks as $row) {
            $category = Category::selectCategoryById('category', $connection->conn, $row['idCategory']);
            echo "<tr>
                            <td>$row[id]</td>
                            <td>$row[taskname]</td>
                            <td>$row[status]</td>
                            <td>$row[dueDate]</td>
                            <td>$row[dueTime]</td>
                            <td>$category[catname]</td>
                            <td>
                                <a class ='btn btn-success btn-sm' href='updateTask.php?id=$row[id]'>edit</a>
                                <a class ='btn btn-danger btn-sm' href='deleteTask.php?id=$row[id]'>delete</a>
                            </td>
                        </tr>";
          }
        } else {
          echo "<tr><td colspan='7'>No tasks found</td></tr>";
        }
        ?>
      </tbody>
    </table>
  </div>
  <div class="container my-5">
    <a class="btn btn-primary" href="taskPro.php" role="button">Add task</a>
    <a class="btn btn-primary" href="createCategory.php" role="button">Add category</a>
  </div>
</body>

</html>