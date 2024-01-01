<?php

if ($_SERVER['REQUEST_METHOD'] == 'GET') {

  $id = $_GET['id'];

  include('connection.php');

  $connection = new Connection();
  $connection->selectDatabase('mydatabase');

  include('person.php');

  Person::deletePerson('user', $connection->conn, $id);




}
?>