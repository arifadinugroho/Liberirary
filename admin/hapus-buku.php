<?php

require("../config/connection.php");

$id_buku = $_GET["id_buku"];
$query = mysqli_query($connect, "SELECT * FROM tbl_buku WHERE book_id = '$id_buku'");
$datas = mysqli_fetch_assoc($query);

?>

<div class="w-full h-fit flex p-6">
  <div>
    <img src="../uploads/<?= $datas["cover"]; ?>" alt="cover" class="rounded-xl h-full w-full object-cover">
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
    <div class="flex w-full gap-2">
      <form action="../controller/hapusBukuController.php" method="post" class="w-full">
        <input type="hidden" name="id_buku" id="id_buku" value="<?= $id_buku ?>">
        <button type="submit" name="hapus_buku" value="hapus_buku" class="bg-red-500 text-white py-2 px-4 w-full my-6 rounded-lg transition-all duration-300 hover:bg-red-800">Hapus</button>
      </form>
      <a href="dashboard.php?page=daftar-buku" class="w-full">
        <button class="bg-zinc-500 text-white py-2 px-4 w-full my-6 rounded-lg transition-all duration-300 hover:bg-zinc-800">Batal</button>
      </a>
    </div>
  </div>
</div>