<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="../styles/output.css">
  <title>Detail Buku</title>
</head>

<body>

  <?php

  require("../config/connection.php");

  $id_buku = isset($_GET["id_buku"]) ? htmlspecialchars(trim($_GET["id_buku"])) : null;
  $datas = mysqli_fetch_assoc(mysqli_query($connect, "SELECT * FROM tbl_buku WHERE book_id = '$id_buku'"));
  $id_user = $datas["upload_by"];
  $upload_by = mysqli_fetch_assoc(mysqli_query($connect, "SELECT username FROM tbl_users WHERE user_id = '$id_user'"));

  ?>

  <section class="h-screen flex justify-center items-center">
    <div class="h-full w-4/5 flex p-20">
      <div class="w-full">
        <img src="../uploads/<?= $datas["cover"]; ?>" alt="cover" width="100" class="h-full w-full rounded-xl">
      </div>
      <div class="p-4 w-fit">
        <?php if ($datas["status"] === "tersedia") : ?>
          <p class="text-green-500"><?= $datas["status"] ?></p>
        <?php else : ?>
          <p class="text-red-500"><?= $datas["status"] ?></p>
        <?php endif; ?>
        <h1 class="font-bold text-xl mb-4"><?= $datas["title"]; ?></h1>
        <p class="my-2"><span class="font-semibold">Penerbit:</span> <?= $datas["publisher"]; ?></p>
        <p class="my-2"><span class="font-semibold">Pengarang:</span> <?= $datas["author"]; ?></p>
        <p class="my-2"><span class="font-semibold">Tahun Terbit:</span> <?= $datas["release_year"]; ?></p>
        <p class="my-2"><span class="font-semibold">Kategori:</span> <?= $datas["category"]; ?></p>
        <p class="mt-2"><span class="font-semibold">Deskripsi:</span> </p>
        <p><?= $datas["description"]; ?></p>
        <p class="my-2">- <?= $upload_by["username"]; ?></p>
        <div class="flex w-full gap-2">
          <?php if ($datas["status"] === "tersedia" && $_SESSION["role"] !== "admin") : ?>
            <form method="post" action="../controller/pinjamBukuController.php" class="w-full">
              <input type="hidden" name="id_buku" id="id_buku" value="<?= $id_buku ?>">
              <button type="submit" name="pinjam_buku" value="pinjam_buku" class="bg-blue-500 text-white py-2 px-4 w-full my-6 rounded-lg transition-all duration-300 hover:bg-blue-800">Pinjam</button>
            </form>
            <a href="./daftar-buku.php" class="w-full">
              <button class="bg-zinc-500 text-white py-2 px-4 w-full my-6 rounded-lg transition-all duration-300 hover:bg-zinc-800">Batal</button>
            </a>
          <?php else : ?>
            <a href="./daftar-buku.php" class="w-full">
              <button class="bg-zinc-500 text-white py-2 px-4 w-full my-6 rounded-lg transition-all duration-300 hover:bg-zinc-800">Batal</button>
            </a>
          <?php endif; ?>
        </div>
      </div>
    </div>
  </section>
</body>

</html>