<?php

class Category
{

  public $id;
  public $categoryname;

  public static $errorMsg = "";
  public static $successMsg = "";

  public function __construct($categoryname)
  {
    //initialize the attributes of the class with the parameters, and hash the password
    $this->categoryname = $categoryname;
  }

  public function insertCategory($tableName, $conn)
  {
    //insert a category in the database, and give a message to $successMsg and $errorMsg
    $sql = "INSERT INTO $tableName (catname) VALUES ('$this->categoryname')";
    if (mysqli_query($conn, $sql)) {
      self::$successMsg = "New record created successfully";
    } else {
      self::$errorMsg = "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
  }

  public static function selectAllCategories($tableName, $conn)
  {
    //select all the categories from the database and insert the rows results into an array $data[]
    $sql = "SELECT id, catname FROM $tableName ";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) {
      // output data of each row
      $data = [];
      while ($row = mysqli_fetch_assoc($result)) {
        $data[] = $row;
      }
      return $data;
    }
  }
  public static function selectCategoryById($tableName, $conn, $id)
  {
    $sql = "SELECT catname FROM $tableName  WHERE id='$id'";
    $result = mysqli_query($conn, $sql);
    if (mysqli_num_rows($result) > 0) {
      // output data of each row
      $row = mysqli_fetch_assoc($result);
    }
    return $row;
  }

  // Other methods for updating, deleting, and retrieving categories can be added here
  static function updateCategory($Category, $tableName, $conn, $id)
  {
    //update a client of $id, with the values of $client in parameter
    //and send the user to read.php
    $sql = "UPDATE $tableName SET catname='$Category->categoryname' WHERE id='$id'";
    if (mysqli_query($conn, $sql)) {
      self::$successMsg = "New record updated successfully";
      header("Location:readCategory.php");
    } else {
      self::$errorMsg = "Error updating record: " . mysqli_error($conn);
    }


  }

  static function deleteCategory($tableName, $conn, $id)
  {
    // Check if there are associated tasks
    $checkTasksQuery = "SELECT id FROM task WHERE idCategory = '$id'";
    $checkTasksResult = mysqli_query($conn, $checkTasksQuery);

    if ($checkTasksResult && mysqli_num_rows($checkTasksResult) > 0) {
      // Delete associated tasks first
      while ($taskRow = mysqli_fetch_assoc($checkTasksResult)) {
        $taskId = $taskRow['id'];
        $deleteTaskQuery = "DELETE FROM task WHERE id = '$taskId'";
        if (!mysqli_query($conn, $deleteTaskQuery)) {
          self::$errorMsg = "Error deleting associated tasks: " . mysqli_error($conn);
          return false;
        }
      }
    }

    // Delete the category after deleting associated tasks
    $deleteCategoryQuery = "DELETE FROM $tableName WHERE id='$id'";

    if (mysqli_query($conn, $deleteCategoryQuery)) {
      self::$successMsg = "Record deleted successfully";
      return true;
    } else {
      self::$errorMsg = "Error deleting record: " . mysqli_error($conn);
      return false;
    }
  }



}

?>