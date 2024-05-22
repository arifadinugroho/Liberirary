<?php

define("HOSTNAME", "localhost");
define("USERNAME", "root");
define("PASSWORD", "");
define("DB_NAME", "litera-hub");
define("PORT", 3306);

$connect = mysqli_connect(HOSTNAME, USERNAME, PASSWORD, DB_NAME, PORT);

if (!$connect) {
  die("Failed: ".mysqli_connect_error());
}

?>