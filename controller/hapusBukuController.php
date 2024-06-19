<?php

require("../config/connection.php");

$id_buku = isset($_POST["id_buku"]) ? htmlspecialchars(trim($_POST["id_buku"])) : null; 

if (isset($_POST["hapus_buku"])) {
  $query = mysqli_query($connect, "DELETE FROM tbl_buku WHERE book_id = '$id_buku'");
  
  if ($query) {
    header("Location:../admin/dashboard.php?page=daftar-buku");
  }
}

?>