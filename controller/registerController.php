<?php

$db = new \App\Config\Connection;

$errInput = "";

if (isset($_POST["register"])) {
  $username = htmlspecialchars(trim($_POST["username"]));
  $gmail = htmlspecialchars(trim($_POST["register_email"]));
  $password = htmlspecialchars(trim($_POST["register_password"]));

  $hashPass = password_hash($password, PASSWORD_DEFAULT);
  // $existUser = mysqli_query($db->connect(), )
}

?>