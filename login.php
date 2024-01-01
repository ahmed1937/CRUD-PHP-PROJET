<?php
session_start();
session_destroy();

// include connection file
include('connection.php');
// create an instance of class Connection
$connection = new Connection();
// call the selectDatabase method
$connection->selectDatabase('mydatabase');
$emailError = "";
$passwordError = "";
$error = "";

if (isset($_POST["submit"])) {
  $emailValue = $_POST["emailName"];
  $passwordValue = $_POST["passwordName"];

  if ($emailValue == "") {
    $emailError = "Email must be filled out";
  } elseif (!filter_var($emailValue, FILTER_VALIDATE_EMAIL)) {
    $emailError = "Please enter a valid email address";
  } elseif ($passwordValue == "") {
    $passwordError = "Password must be filled out";
  } else {
    include('person.php');
    $clients = Person::selectAllPersons('user', $connection->conn);

    // Check if the entered email exists in the array of persons
    $userFound = false;
    foreach ($clients as $client) {
      if ($client['email'] == $emailValue && password_verify($passwordValue, $client['password'])) {
        $userFound = true;
        break;
      }
    }

    if ($userFound) {
      // Authentication successful, set session variables and redirect to taskpro.php
      session_start();
      $_SESSION["emailS"] = $emailValue;
      $_SESSION["passS"] = $passwordValue;
      header("Location: taskpro.php");
      exit();
    } else {
      $error = "Invalid email or password";
    }
  }
  $emailError = "";
  $passwordError = "";
  $error = "";
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="login.css">
  <title>Login Page</title>
</head>

<body>

  <div class="login-container">
    <form class="login-form" action="login.php" method="post">
      <h1>Login</h1>
      <?php if ($error): ?>
        <span style='color:red'>
          <?php echo $error; ?>
        </span>
      <?php endif; ?>
      <label for="email">Email:</label>
      <input value="<?php echo isset($emailValue) ? $emailValue : ''; ?>" type="email" name="emailName">

      <label for="password">Password:</label>
      <input type="password" name="passwordName">

      <button type="submit" name="submit">Login</button>
      <a href="signUp.php">Sign Up ? </a><a href="index.php">Home ? </a>
    </form>
  </div>
</body>

</html>