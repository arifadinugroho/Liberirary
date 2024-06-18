<?php session_start(); ?>

<table class="w-full">
  <thead class="text-[18px] border-b-[1px] border-slate-600">
    <tr>
      <th class="pr-2 py-3 text-left">No</th>
      <th class="px-2 py-3 text-left">Judul</th>
      <th class="px-2 py-3 text-left">Cover</th>
      <th class="px-2 py-3 text-left">Tanggal</th>
      <th class="px-2 py-3 text-left">Action</th>
    </tr>
  </thead>
  <tbody class="text-[15px]">
    <?php

    require("../config/connection.php");

    $username = $_SESSION["username"];
    $user = mysqli_fetch_assoc(mysqli_query($connect, "SELECT user_id FROM tbl_users WHERE role = 'peminjam' AND username = '$username'"));
    $id_user = $user["user_id"];

    $query = mysqli_query($connect, "SELECT tbl_buku.title, tbl_buku.cover, tbl_buku.status, tbl_peminjaman.borrowed_at, tbl_peminjaman.book_id FROM tbl_peminjaman JOIN tbl_buku ON (tbl_buku.book_id = tbl_peminjaman.book_id) WHERE tbl_peminjaman.user_id = '$id_user'");
    $datas = mysqli_fetch_all($query, MYSQLI_ASSOC);
    $i = 1;

    if (mysqli_num_rows($query) > 0) {
      foreach ($datas as $data) { ?>
        <tr class="border-b-[1px] border-slate-300" id="<?= $data["book_id"] ?>">
          <td class="pr-2 py-3 font-semibold"><?= $i++; ?></td>
          <td class="px-2 py-3"><?= $data["title"] ?></td>
          <td class="px-2 py-3"><img src="../uploads/<?= $data["cover"] ?>" alt="cover" class="h-10 w-10 rounded-full"></td>
          <td class="px-2 py-3"><?= $data["borrowed_at"] ?></td>
          <?php if ($data["status"] === "dipinjam") : ?>
            <td class="px-2 py-3">
              <form action="dashboard.php?page=peminjaman" method="post">
                <input type="hidden" name="id_buku" id="id_buku" value="<?= $data["book_id"] ?>">
                <button type="submit" name="kembalikan" value="kembalikan" class="px-4 py-3 rounded-lg text-white bg-blue-500 font-bold transition-all duration-500 hover:bg-blue-800">Kembalikan</button>
              </form>
            </td>
          <?php else : ?>
            <td class="px-2 py-3 flex gap-2">
              <?php

              $id_buku = $_POST["id_buku_hapus"];

              if (isset($_POST["hapus"])) {
                $query = mysqli_query($connect, "DELETE FROM tbl_peminjaman WHERE book_id = '$id_buku'");

                if ($query) {
                  echo "<script>alert('success')</script>";
                  header("Location:../peminjam/dashboard.php?page=peminjaman");
                }
              }

              ?>
              <button class="px-4 py-3 rounded-lg text-white bg-zinc-500 font-bold transition-all duration-500 hover:bg-zinc-800" disabled>Sudah Dikembalikan</button>
              <form action="./peminjaman.php" method="post">
                <input type="hidden" name="id_buku_hapus" id="id_buku_hapus" value="<?= $data["book_id"] ?>">
                <button type="submit" name="hapus" value="hapus" class="px-4 py-3 rounded-lg text-white bg-red-500 font-bold transition-all duration-500 hover:bg-red-800">Hapus</button>
              </form>
            </td>
          <?php endif; ?>
        </tr>
      <?php } ?>
    <?php } else { ?>
      <h1>Kosong</h1>
    <?php }  ?>

  </tbody>
  <?php

  $id_buku = htmlspecialchars(trim($_POST["id_buku"]));
  $data = mysqli_fetch_assoc(mysqli_query($connect, "SELECT * FROM tbl_peminjaman WHERE book_id = '$id_buku'"));
  $id_admin = $data["admin_id"];
  $id_user = $data["user_id"];
  print_r($data);

  if (isset($_POST["kembalikan"])) {
    mysqli_query($connect, "INSERT INTO tbl_pengembalian (user_id, admin_id, book_id) VALUES ('$id_user', '$id_admin', '$id_buku')");
    $status = mysqli_query($connect, "UPDATE tbl_buku SET status = 'tersedia' WHERE book_id = '$id_buku'");

    if ($status) {
      echo "<script>alert('success')</script>";
      header("Location:../peminjam/dashboard.php?page=peminjaman");
    }
  }

  ?>
</table>