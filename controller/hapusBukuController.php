<?php

require("../config/connection.php");

$id_buku = $_POST["id_buku"];

if (isset($_POST["hapus_buku"])) {
  $query = mysqli_query($connect, "DELETE FROM tbl_buku WHERE book_id = '$id_buku'");
  
  if ($query) {
    header("Location:../admin/dashboard.php?page=daftar-buku");
  }
}

?>