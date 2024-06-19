<?php
require("../config/connection.php");

$id_buku = isset($_GET["id_buku"]) ? htmlspecialchars(trim($_GET["id_buku"])) : null; 

$buku = mysqli_fetch_assoc(mysqli_query($connect, "SELECT * FROM tbl_buku WHERE book_id = '$id_buku'"));

?>
<form method="post" action="../controller/editBukuController.php" enctype="multipart/form-data" class="h-fit">
  <input type="hidden" name="id_buku" value="<?= $id_buku ?>">
  <label for="judul">Judul</label> <br>
  <input type="text" value="<?= $buku["title"] ?>" name="edit_judul" id="edit_judul" class="border-2 p-2.5 mb-2 outline-none rounded-md border-zinc-500 w-full py-2 focus:border-blue-500" required> <br>
  <label for="cover">Cover</label> <br>
  <input type="file" name="edit_cover" id="edit_cover" class="p-2.5 mb-2 border-none" required> <br>
  <p class="text-red-500">
    <?php
    
    if (isset($errMessage)) {
      echo $errMessage;
    } else {
      echo "";
    }
    
    ?>
  </p> <br>
  <label for="penerbit">Penerbit</label> <br>
  <input type="text" value="<?= $buku["publisher"] ?>" name="edit_penerbit" id="edit_penerbit" class="border-2 p-2.5 mb-2 outline-none rounded-md border-zinc-500 w-full py-2 focus:border-blue-500" required> <br>
  <label for="pengarang">Pengarang</label> <br>
  <input type="text" value="<?= $buku["author"] ?>" name="edit_pengarang" id="edit_pengarang" class="border-2 p-2.5 mb-2 outline-none rounded-md border-zinc-500 w-full py-2 focus:border-blue-500" required> <br>
  <label for="tahun_rilis">Tahun Rilis</label> <br>
  <input type="number" value="<?= $buku["release_year"] ?>" min="1950" max="2100" name="edit_tahun_rilis" id="tahun_rilis" class="border-2 p-2.5 mb-2 outline-none rounded-md border-zinc-500 w-full py-2 focus:border-blue-500" required> <br>
  <label for="kategori">Kategori</label> <br>
  <select name="edit_kategori" id="edit_kategori" class="px-4 py-3 w-full outline-none" required>
    <?php

    $kategori = mysqli_query($connect, "SELECT * FROM tbl_kategori");
    foreach ($kategori as $k) { ?>
      <option value="<?= $k["name"] ?>"><?= $k["name"] ?></option>
    <?php } ?>
  </select>
  <label for="deskripsi">Deskripsi</label> <br>
  <input type="text" value="<?= $buku["description"] ?>" name="edit_deskripsi" id="edit_deskripsi" class="border-2 p-2.5 mb-2 outline-none w-full rounded-md border-zinc-500 focus:border-blue-500" required> <br>
  <div class="flex gap-2">
    <button type="submit" name="edit_buku" value="edit_buku" class="px-4 py-3 rounded-lg text-white w-full mb-2 bg-blue-500 font-bold transition-all duration-500 hover:bg-blue-800">Submit</button>
    <a href="dashboard.php?page=daftar-buku" class="w-full">
      <button type="button" class="bg-zinc-500 text-white py-3 px-4 w-full rounded-lg transition-all duration-300 hover:bg-zinc-800">Batal</button>
    </a>
  </div>
</form>