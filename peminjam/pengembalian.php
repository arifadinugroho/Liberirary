<?php session_start(); ?>

<table class="w-full">
  <thead class="text-[18px] border-b-[1px] border-slate-600">
    <tr>
      <th class="pr-2 py-3 text-left">No</th>
      <th class="px-2 py-3 text-left">Judul</th>
      <th class="px-2 py-3 text-left">Cover</th>
      <th class="px-2 py-3 text-left">Tanggal Peminjaman</th>
      <th class="px-2 py-3 text-left">Tanggal Pengembalian</th>
      <th class="px-2 py-3 text-left">Action</th>
    </tr>
  </thead>
  <tbody class="text-[15px]">
    <?php

    require("../config/connection.php");

    $username = $_SESSION["username"];
    $user = mysqli_fetch_assoc(mysqli_query($connect, "SELECT user_id FROM tbl_users WHERE role = 'peminjam' AND username = '$username'"));
    $user_id = $user["user_id"];

    $datas = mysqli_fetch_all(mysqli_query($connect, "SELECT tbl_buku.title, tbl_buku.cover, tbl_peminjaman.book_id, tbl_peminjaman.borrowed_at, tbl_pengembalian.id, tbl_pengembalian.returned_at FROM tbl_pengembalian JOIN tbl_peminjaman ON (tbl_peminjaman.user_id = tbl_pengembalian.user_id) JOIN tbl_users ON (tbl_users.user_id = tbl_pengembalian.user_id) JOIN tbl_buku ON (tbl_buku.book_id = tbl_pengembalian.book_id)"), MYSQLI_ASSOC);
    // print_r($datas);
    $i = 1;

    ?>
    <?php foreach ($datas as $data) { ?>
      <tr class="border-b-[1px] border-slate-300" id="<?= $data["id"] ?>">
        <td class="pr-2 py-3 font-semibold"><?= $i++; ?></td>
        <td class="px-2 py-3"><?= $data["title"] ?></td>
        <td class="px-2 py-3"><img src="../uploads/<?= $data["cover"] ?>" alt="cover" class="h-10 w-10 rounded-full"></td>
        <td class="px-2 py-3"><?php echo date("F d, Y", strtotime($data["borrowed_at"])); ?></td>
        <td class="px-2 py-3"><?php echo date("F d, Y", strtotime($data["returned_at"])); ?></td>
        <td class="px-2 py-3">
          <?php

          $id_buku = $_POST["id_buku"];

          if (isset($_POST["hapus"])) {
            $query = mysqli_query($connect, "DELETE FROM tbl_pengembalian WHERE id = '$id_buku'");

            if ($query) {
              header("Location:../peminjam/dashboard.php?page=pengembalian");
            }
          }

          ?>
          <form action="./pengembalian.php" method="post">
            <input type="hidden" name="id_buku" id="id_buku" value="<?= $data["id"] ?>">
            <button type="submit" name="hapus" value="hapus" class="px-4 py-3 rounded-lg text-white bg-red-500 font-bold transition-all duration-500 hover:bg-red-800">Hapus</button>
          </form>
        </td>
      </tr>
    <?php } ?>
  </tbody>
</table>