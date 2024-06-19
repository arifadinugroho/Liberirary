<?php session_start(); ?>
<?php

require("../config/connection.php");


$id_buku = isset($_POST["id_buku"]) ? htmlspecialchars(trim($_POST["id_buku"])) : null;
$admin = mysqli_fetch_assoc(mysqli_query($connect, "SELECT upload_by FROM tbl_buku WHERE book_id = '$id_buku'"));
$id_admin = $admin["upload_by"];

$username = $_SESSION["username"];
$user = mysqli_fetch_assoc(mysqli_query($connect, "SELECT user_id FROM tbl_users WHERE role = 'peminjam' AND username = '$username'"));
$id_user = $user["user_id"];

if (isset($_POST["pinjam_buku"])) {
  mysqli_query($connect, "INSERT INTO tbl_peminjaman (user_id, admin_id, book_id) VALUES ('$id_user', '$id_admin','$id_buku')");
  $status = mysqli_query($connect, "UPDATE tbl_buku SET status = 'dipinjam' WHERE book_id = '$id_buku'");
  
  if ($status) {
    header("Location:../buku/daftar-buku.php");
  }
}



?>