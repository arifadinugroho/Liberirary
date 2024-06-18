<?php session_start(); ?>

<div class="flex justify-between mb-6">
  <form action="dashboard.php?page=daftar-buku" method="post">
    <input type="text" name="judul" id="judul" placeholder="search title" class="border-2 p-2.5 outline-none rounded-md border-zinc-500 focus:border-blue-500">
  </form>
  <a href="dashboard.php?page=tambah-buku">
    <button class="px-4 py-3 rounded-lg text-white bg-blue-500 font-bold transition-all duration-500 hover:bg-blue-800">Tambah buku</button>
  </a>
</div>
<table class="w-full">
  <thead class="text-[18px] border-b-[1px] border-slate-600">
    <tr>
      <th class="pr-2 py-3 text-left">No</th>
      <th class="px-2 py-3 text-left">Judul</th>
      <th class="px-2 py-3 text-left">Cover</th>
      <th class="px-2 py-3 text-left">Penerbit</th>
      <th class="px-2 py-3 text-left">Pengarang</th>
      <th class="px-2 py-3 text-left">Tanggal Rilis</th>
      <th class="px-2 py-3 text-left">Kategori</th>
      <th class="px-2 py-3 text-left">Status</th>
      <th class="px-2 py-3 text-left">Action</thc>
    </tr>
  </thead>
  <tbody class="text-[15px]">
    <?php
    require("../config/connection.php");

    $username = $_SESSION["username"];
    $user = mysqli_fetch_assoc(mysqli_query($connect, "SELECT user_id FROM tbl_users WHERE username = '$username'"));
    $user_id = $user["user_id"];

    $query;

    if (isset($_POST["judul"])) {
      $judul = htmlspecialchars(strtolower(trim($_POST["judul"])));
      $query = mysqli_query($connect, "SELECT * FROM tbl_buku WHERE upload_by = '$user_id' AND title LIKE '%$judul%'");
    } else {
      $query = mysqli_query($connect, "SELECT * FROM tbl_buku WHERE upload_by = '$user_id'");
    }

    $datas = mysqli_fetch_all($query, MYSQLI_ASSOC);
    $i = 1;

    if (mysqli_num_rows($query) > 0) {
      foreach ($datas as $data) { ?>
        <tr class="border-b-[1px] border-slate-300" id="<?= $data["book_id"] ?>">
          <td class="font-semibold"><?= $i++; ?></td>
          <?php if (strlen($data["title"]) > 15) : ?>
            <td class="px-2 py-3" title="<?= $data["title"] ?>"><?= substr($data["title"], 0, 15) . "..." ?></td>
          <?php else : ?>
            <td class="px-2 py-3" title="<?= $data["title"] ?>"><?= $data["title"] ?></td>
          <?php endif; ?>
          <td class="px-2 py-3"><img src="../uploads/<?= $data["cover"] ?>" alt="cover" class="h-10 w-10 rounded-full"></td>
          <?php if (strlen($data["publisher"]) > 15) : ?>
            <td class="px-2 py-3" title="<?= $data["publisher"] ?>"><?= substr($data["publisher"], 0, 15) . "..." ?></td>
          <?php else : ?>
            <td class="px-2 py-3" title="<?= $data["publisher"] ?>"><?= $data["publisher"] ?></td>
          <?php endif; ?>
          <?php if (strlen($data["author"]) > 15) : ?>
            <td class="px-2 py-3" title="<?= $data["author"] ?>"><?= substr($data["author"], 0, 15) . "..." ?></td>
          <?php else : ?>
            <td class="px-2 py-3" title="<?= $data["author"] ?>"><?= $data["author"] ?></td>
          <?php endif; ?>
          <td class="px-2 py-3"><?= $data["release_year"] ?></td>
          <td class="px-2 py-3"><?= $data["category"] ?></td>
          <?php if ($data["status"] === "tersedia") : ?>
            <td class="px-2 py-3 text-green-500"><?= $data["status"] ?></td>
          <?php else : ?>
            <td class="px-2 py-3 text-red-500"><?= $data["status"] ?></td>
          <?php endif; ?>
          <div>
            <td class="px-2 py-3">
              <a href="?page=edit-buku&id_buku=<?= $data["book_id"] ?>">
                <button class="bg-green-500 text-white px-4 py-2 font-bold rounded-lg transition-all duration-500 hover:bg-green-800">Edit</button>
              </a>
              <a href="?page=hapus-buku&id_buku=<?= $data["book_id"] ?>">
                <button class="bg-red-500 text-white px-4 py-2 font-bold rounded-lg transition-all duration-500 hover:bg-red-800">Hapus</button>
              </a>
            </td>
          </div>
        </tr>
      <?php } ?>
    <?php } else { ?>
      <h1>Tidak ada buku yang tersedia</h1>
    <?php } ?>
  </tbody>
</table>