<?php

namespace App\Config;

class Connection {

  private $hostname = "localhost";
  private $username = "root";
  private $password = "";
  private $name = "litera-hub";
  private $port = 3306;

  public function connect() {
    return mysqli_connect($this->hostname, $this->username, $this->password, $this->name, $this->port) or die("failed: ".  mysqli_connect_error());
  }

}

?>