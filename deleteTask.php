<?php

if ($_SERVER['REQUEST_METHOD'] == 'GET') {

  $id = $_GET['id'];

  include('connection.php');

  $connection = new Connection();
  $connection->selectDatabase('mydatabase');

  include('task.php');

  Task::deleteTask('task', $connection->conn, $id);




}
?>