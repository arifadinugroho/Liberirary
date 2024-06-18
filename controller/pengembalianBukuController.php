<?php

require("../config/connection.php");

$id_buku = htmlspecialchars(trim($_POST["id_buku"]));
$data = mysqli_fetch_assoc(mysqli_query($connect, "SELECT * FROM tbl_peminjaman WHERE book_id = '$id_buku'"));
$id_admin = $data["admin_id"];
$id_user = $data["user_id"];

if (isset($_POST["kembalikan"])) {
  mysqli_query($connect, "INSERT INTO tbl_pengembalian (user_id, admin_id, book_id) VALUES ('$id_user', '$id_admin', '$id_buku')");
  $status = mysqli_query($connect, "UPDATE tbl_buku SET status = 'tersedia' WHERE book_id = '$id_buku'");

  if ($status) {
    header("Location:../admin/dashboard.php?page=peminjaman");
  }
}

?>