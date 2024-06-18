<?php

require("../config/connection.php");

$id_buku = htmlspecialchars(trim($_POST["id_buku"]));
$judul = htmlspecialchars(trim($_POST["edit_judul"]));
$penerbit = htmlspecialchars(trim($_POST["edit_penerbit"]));
$pengarang = htmlspecialchars(trim($_POST["edit_pengarang"]));
$tahun_rilis = htmlspecialchars(trim($_POST["edit_tahun_rilis"]));
$kategori = htmlspecialchars(trim($_POST["edit_kategori"]));
$deskripsi = htmlspecialchars(trim($_POST["edit_deskripsi"]));

$errMessage = "";
$target_dir = "C:/Users/arifa/project/liberirary/uploads/";
$ext = $_FILES["edit_cover"]["type"];
$name = explode(".", $_FILES["edit_cover"]["name"]);
$maxFileSize = 4000000;
$allowed_ext = array("image/jpg", "image/png", "image/jpeg");
$file = str_replace($name[0], rand(100000, 1000000), $name[0]) . "." . end($name);

if (!in_array($ext, $allowed_ext)) {
    $errMessage = "Image extension not allowed.";
} elseif ($_FILES["edit_cover"]["size"] > $maxFileSize) {
    $errMessage = "Image size not allowed.";
} else {
    if (move_uploaded_file($_FILES["edit_cover"]["tmp_name"], $target_dir . $file)) {
        $query = mysqli_query($connect, "UPDATE tbl_buku SET title='$judul', cover='$file', publisher='$penerbit', author='$pengarang', release_year=$tahun_rilis, category='$kategori', description='$deskripsi' WHERE book_id='$id_buku'");
        if ($query) {
            header("Location:../admin/dashboard.php?page=daftar-buku");
        } else {
            echo "Error updating record: " . mysqli_error($connect);
        }
    } 
}

?>
