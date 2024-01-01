<?php
$emailError = "";
$passwordError = "";

if (isset($_POST["submit"])) {
  $emailValue = $_POST["emailName"];
  $passwordValue = $_POST["passwordName"];

  if ($emailValue == "") {
    $emailError = "Email must be filled out";
  } else if (!filter_var($emailValue, FILTER_VALIDATE_EMAIL)) {
    $emailError = "Please enter a valid email address";
  } else if ($passwordValue == "") {
    $passwordError = "Password must be filled out";
  } else {
    session_start();
    $_SESSION["emailS"] = $emailValue;
    $_SESSION["passS"] = $passwordValue;
    header("Location: taskpro.php");
    exit();
  }
}
?>