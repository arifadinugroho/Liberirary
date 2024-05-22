<?php

require("./config/connection.php");

$errInput = array("email" => "", "password" => "");

if (isset($_POST["login"])) {
  $email = $_POST["email"];
  $password = $_POST["password"];

  $query = mysqli_query($connect, "SELECT * FROM tbl_users WHERE email = '$email'");

  if (mysqli_num_rows($query) > 0) {
    $user = mysqli_fetch_assoc($query);

    if (!empty($_POST["password"])) {
      $checkPass = password_verify($password, $user["password"]);
      
      if ($checkPass) {
        $_SESSION["logged_in"] = true;
        $_SESSION["username"] = $user["username"];
        $_SESSION["role"] = $user["role"];
        header("Location:index.php");
      } else {
        $errInput["password"] = "Wrong password";
      }
    }
  } else {
    $errInput["email"] = "Email not found";
  }
}

?>