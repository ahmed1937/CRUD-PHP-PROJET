<?php

class Person
{

  public $id;
  public $firstname;
  public $lastname;
  public $email;
  public $password;
  public $reg_date;



  public static $errorMsg = "";

  public static $successMsg = "";


  public function __construct($firstname, $lastname, $email, $password)
  {

    //initialize the attributs of the class with the parameters, and hash the password
    $this->firstname = $firstname;
    $this->lastname = $lastname;
    $this->email = $email;
    $this->password = password_hash($password, PASSWORD_DEFAULT);


  }

  public function insertPerson($tableName, $conn)
  {

    //insert a client in the database, and give a message to $successMsg and $errorMsg
    $sql = "INSERT INTO $tableName (firstname, lastname, email,password)
VALUES ('$this->firstname', '$this->lastname', '$this->email','$this->password')";
    if (mysqli_query($conn, $sql)) {
      self::$successMsg = "New record created successfully";

    } else {
      self::$errorMsg = "Error: " . $sql . "<br>" . mysqli_error($conn);
    }



  }

  public static function selectAllPersons($tableName, $conn)
  {
    //select all the clients from the database, including the password field
    $sql = "SELECT id, firstname, lastname, email, password FROM $tableName";
    $result = mysqli_query($conn, $sql);

    if ($result) {
      $data = [];
      while ($row = mysqli_fetch_assoc($result)) {
        $data[] = $row;
      }
      return $data;
    } else {
      // Handle the error, for now, let's return an empty array
      return [];
    }
  }

  static function selectPersonById($tableName, $conn, $id)
  {
    //select a client by id, and return the row result
    $sql = "SELECT firstname, lastname,email FROM $tableName  WHERE id='$id'";
    $result = mysqli_query($conn, $sql);
    if (mysqli_num_rows($result) > 0) {
      // output data of each row
      $row = mysqli_fetch_assoc($result);

    }
    return $row;
  }

  static function updatePerson($Person, $tableName, $conn, $id)
  {
    //update a client of $id, with the values of $client in parameter
    //and send the user to read.php
    $sql = "UPDATE $tableName SET lastname='$Person->lastname',firstname='$Person->firstname',email='$Person->email' WHERE id='$id'";
    if (mysqli_query($conn, $sql)) {
      self::$successMsg = "New record updated successfully";
      header("Location:readPersons.php");
    } else {
      self::$errorMsg = "Error updating record: " . mysqli_error($conn);
    }


  }

  static function deletePerson($tableName, $conn, $id)
  {
    //delet a client by his id, and send the user to read.php
    $sql = "DELETE FROM $tableName WHERE id='$id'";

    if (mysqli_query($conn, $sql)) {
      self::$successMsg = "Record deleted successfully";
      header("Location:readPersons.php");
    } else {
      self::$errorMsg = "Error deleting record: " . mysqli_error($conn);
    }


  }






}

?>