<?php

class Task
{
  public $id;
  public $taskname;
  public $status;
  public $dueDate;
  public $dueTime;
  public $idCategory;

  public static $errorMsg = "";
  public static $successMsg = "";

  public function __construct($taskname, $status, $dueDate, $dueTime, $idCategory)
  {
    // Initialize the attributes of the class with the parameters, and hash the password
    $this->taskname = $taskname;
    $this->status = $status;
    $this->dueDate = $dueDate;
    $this->dueTime = $dueTime;
    $this->idCategory = $idCategory;
  }

  public function insertTask($tableName, $conn)
  {
    // Insert a task into the database, and give a message to $successMsg and $errorMsg
    $sql = "INSERT INTO $tableName (taskname, status, dueDate, dueTime, idCategory)
    VALUES ('$this->taskname', '$this->status', '$this->dueDate', '$this->dueTime', '$this->idCategory')";
    if (mysqli_query($conn, $sql)) {
      self::$successMsg = "New record created successfully";
    } else {
      self::$errorMsg = "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
  }

  public static function selectAllTasks($tableName, $conn)
  {

    //select all the client from database, and inset the rows results in an array $data[]
    $sql = "SELECT id, taskname, status,dueDate,dueTime,idCategory FROM $tableName ";
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


  static function selectTaskById($tableName, $conn, $id)
  {
    //select a client by id, and return the row result
    $sql = "SELECT id, taskname, status, dueDate, dueTime, idCategory FROM $tableName WHERE id='$id'";
    $result = mysqli_query($conn, $sql);
    if (mysqli_num_rows($result) > 0) {
      // output data of each row
      $row = mysqli_fetch_assoc($result);

    }
    return $row;
  }


  static function updateTask($Task, $tableName, $conn, $id)
  {
    $sql = "UPDATE $tableName SET taskname='$Task->taskname', status='$Task->status', dueDate='$Task->dueDate', dueTime='$Task->dueTime', idCategory='$Task->idCategory' WHERE id='$id'";

    if (mysqli_query($conn, $sql)) {
      self::$successMsg = "Record updated successfully";
      header("Location: readTasks.php");
    } else {
      self::$errorMsg = "Error updating record: " . mysqli_error($conn);
    }
  }


  static function deleteTask($tableName, $conn, $id)
  {
    //delet a client by his id, and send the user to read.php
    $sql = "DELETE FROM $tableName WHERE id='$id'";

    if (mysqli_query($conn, $sql)) {
      self::$successMsg = "Record deleted successfully";
      header("Location:readTasks.php");
    } else {
      self::$errorMsg = "Error deleting record: " . mysqli_error($conn);
    }


  }


  public static function selectTaskByCategoryId($tableName, $conn, $idCategory)
  {
    $sql = "SELECT id, taskname, status, dueDate, dueTime, idCategory FROM $tableName WHERE idCategory='$idCategory' ";
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


}

?>