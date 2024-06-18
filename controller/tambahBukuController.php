<?php session_start(); ?>
<?php

require("../config/connection.php");

$errMessage = "";
$target_dir = "C:\Users\arifa\project\liberirary\uploads\\";
$ext = $_FILES["cover"]["type"];
$name = explode(".", $_FILES["cover"]["name"]);
$maxFileSize = 4000000;
$allowed_ext = array("image/jpg", "image/png", "image/jpeg");
$file = str_replace($name[0], rand(100000, 1000000), $name[0]) . "." . $name[1];
  
$username = $_SESSION["username"];
$user_data = mysqli_query($connect, "SELECT user_id FROM tbl_users WHERE username = '$username'");
$user = mysqli_fetch_assoc($user_data);
$user_id = $user["user_id"];

if (isset($_POST["tambah_buku"])) {
  $judul = htmlspecialchars(trim($_POST["judul"]));
  $penerbit = htmlspecialchars(trim($_POST["penerbit"]));
  $pengarang = htmlspecialchars(trim($_POST["pengarang"]));
  $tahun_rilis = htmlspecialchars(trim($_POST["tahun_rilis"]));
  $kategori = htmlspecialchars(trim($_POST["kategori"]));
  $deskripsi = htmlspecialchars(trim($_POST["deskripsi"]));

  if ($ext !== $allowed_ext[0] && $ext !== $allowed_ext[1] && $ext !== $allowed_ext[2]) {
    $errMessage = "image ext not allowed";
  } else if ($_FILES["cover"]["size"] > $maxFileSize) {
    $errMessage = "size image not allowed";
  } else {
    if (move_uploaded_file($_FILES["cover"]["tmp_name"], $target_dir . $file)) {
      mysqli_query($connect, "INSERT INTO tbl_buku (book_id, title, cover, publisher, author, release_year, category, description, upload_by) VALUES (uuid(), '$judul', '$file', '$penerbit', '$pengarang', '$tahun_rilis', '$kategori', '$deskripsi', '$user_id')");
      header("Location:../admin/dashboard.php?page=daftar-buku");
    }
  }
}
?>