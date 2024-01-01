<?php

try {
  // include the connection file
  include('connection.php');

  // create an instance of Connection class
  $connection = new Connection();

  // call the createDatabase method to create database "mydatabase"
  $connection->createDatabase('mydatabase');

  // call the selectDatabase method to select the chap4Db
  $connection->selectDatabase('mydatabase');

  // create tables
  $query0 = "
    CREATE TABLE user (
        id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
        firstname VARCHAR(30) NOT NULL,
        lastname VARCHAR(30) NOT NULL,
        email VARCHAR(50) UNIQUE,
        password VARCHAR(80),
        reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
    )
    ";

  $query2 = "
    CREATE TABLE category (
        id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
        catname VARCHAR(30) NOT NULL
    )
    ";

  $query1 = "
    CREATE TABLE task (
        id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
        taskname VARCHAR(30) NOT NULL,
        status VARCHAR(30) NOT NULL,
        dueDate DATE NOT NULL,
        dueTime TIME NOT NULL,
        dateCreated TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
        idCategory INT(6) UNSIGNED NOT NULL,
        FOREIGN KEY (idCategory) REFERENCES category(id)
    )
    ";




  $connection->createTable($query0);
  $connection->createTable($query1);
  $connection->createTable($query2);

} catch (Exception $e) {
  // Handle the exception, e.g., log the error or show a user-friendly message.
  echo "Error: " . $e->getMessage();
}
?>