<?php

$hostname = "localhost";
$username = "root";
$password =  "";
$name = "liberirary";

$connect = mysqli_connect($hostname, $username, $password, $name);

if (!$connect) {
  die("Failed: ".mysqli_connect_error());
}

?>