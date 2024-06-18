<form method="post" action="../controller/tambahBukuController.php" enctype="multipart/form-data" class="h-fit">
  <label for="judul">Judul</label> <br>
  <input type="text" name="judul" id="judul" class="border-2 p-2.5 mb-2 outline-none rounded-md border-zinc-500 w-full py-2 focus:border-blue-500" required> <br>
  <label for="cover">Cover</label> <br>
  <input type="file" name="cover" id="cover" class="p-2.5 mb-2 border-none" required> <br>
  <p class="text-red-500"><?= $errMessage; ?></p> <br>
  <label for="penerbit">Penerbit</label> <br>
  <input type="text" name="penerbit" id="penerbit" class="border-2 p-2.5 mb-2 outline-none rounded-md border-zinc-500 w-full py-2 focus:border-blue-500" required> <br>
  <label for="pengarang">Pengarang</label> <br>
  <input type="text" name="pengarang" id="pengarang" class="border-2 p-2.5 mb-2 outline-none rounded-md border-zinc-500 w-full py-2 focus:border-blue-500" required> <br>
  <label for="tahun_rilis">Tahun Rilis</label> <br>
  <input type="number" min="1950" max="2100" name="tahun_rilis" id="tahun_rilis" class="border-2 p-2.5 mb-2 outline-none rounded-md border-zinc-500 w-full py-2 focus:border-blue-500" required> <br>
  <label for="kategori">Kategori</label> <br>
  <select name="kategori" id="kategori" class="px-4 py-3 w-full outline-none" required>
    <?php
    require("../config/connection.php");

    $kategori = mysqli_query($connect, "SELECT * FROM tbl_kategori");
    foreach ($kategori as $k) { ?>
      <option value="<?= $k["name"] ?>"><?= $k["name"] ?></option>
    <?php } ?>
  </select>
  <label for="deskripsi">Deskripsi</label> <br>
  <input type="text" name="deskripsi" id="deskripsi" class="border-2 p-2.5 mb-2 outline-none w-full rounded-md border-zinc-500 focus:border-blue-500" required> <br>
  <button type="submit" name="tambah_buku" value="tambah_buku" class="px-4 py-3 rounded-lg text-white w-full mb-2 bg-blue-500 font-bold transition-all duration-500 hover:bg-blue-800">Submit</button>
</form>
