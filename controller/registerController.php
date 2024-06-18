<?php

require("./config/connection.php");

$errInput = "";

if (isset($_POST["register"])) {
  $username = htmlspecialchars(strtolower(trim($_POST["username"])));
  $email = htmlspecialchars(strtolower(trim($_POST["register_email"])));
  $password = htmlspecialchars(trim($_POST["register_password"]));
  $role = $_POST["role"];

  $hashPass = password_hash($password, PASSWORD_DEFAULT);
  $existUser = mysqli_query($connect, "SELECT email FROM tbl_users WHERE email = '$email'");

  
  if (strlen($username) > 15) {
    $errInput = "Max 15 characters";
  } else if (mysqli_num_rows($existUser) > 0) {
    $errInput = "Email already exist";
  } else {
    $query = mysqli_query($connect, "INSERT INTO tbl_users (user_id, username, email, password, role) VALUES (uuid(), '$username', '$email', '$hashPass', '$role')");

    if ($query) {
      $_SESSION["logged_in"] = true;
      $_SESSION["username"] = $username;
      $_SESSION["role"] = $role;
      header("Location:index.php");
    }
  }
}

?>