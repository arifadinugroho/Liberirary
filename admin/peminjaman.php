
<table class="w-full">
  <thead class="text-[18px] border-b-[1px] border-slate-600">
    <tr>
      <th class="pr-2 py-3 text-left">No</th>
      <th class="px-2 py-3 text-left">Username</th>
      <th class="px-2 py-3 text-left">Email</th>
      <th class="px-2 py-3 text-left">Judul</th>
      <th class="px-2 py-3 text-left">Tanggal</th>
      <th class="px-2 py-3 text-left">Action</th>
    </tr>
  </thead>
  <tbody class="text-[15px]">
    <?php

    require("../config/connection.php");

    $username = $_SESSION["username"];
    $admin = mysqli_fetch_assoc(mysqli_query($connect, "SELECT user_id AS admin_id FROM tbl_users WHERE role = 'admin' AND username = '$username'"));
    $id_admin = $admin["admin_id"];

    $datas = mysqli_fetch_all(mysqli_query($connect, "SELECT tbl_users.username, tbl_users.email, tbl_buku.title, tbl_buku.status, tbl_peminjaman.id, tbl_peminjaman.borrowed_at FROM tbl_peminjaman JOIN tbl_users ON (tbl_users.user_id = tbl_peminjaman.user_id) JOIN tbl_buku ON (tbl_buku.book_id = tbl_peminjaman.book_id) WHERE tbl_peminjaman.admin_id = '$id_admin'"), MYSQLI_ASSOC);
    $i = 1;

    ?>
    <?php foreach ($datas as $data) { ?>
      <tr class="border-b-[1px] border-slate-300" id="<?= $data["id"] ?>">
        <td class="pr-2 py-3 font-semibold"><?= $i++; ?></td>
        <td class="px-2 py-3"><?= $data["username"] ?></td>
        <td class="px-2 py-3"><?= $data["email"] ?></td>
        <td class="px-2 py-3"><?= $data["title"] ?></td>
        <td class="px-2 py-3"><?php echo date("F d, Y", strtotime($data["borrowed_at"])); ?></td>
        <?php if ($data["status"] === "dipinjam") : ?>
          <td class="px-2 py-3">
            <form action="../controller/pengembalianBukuController.php" method="post">
              <input type="hidden" name="id_buku" id="id_buku" value="<?= $data["id"] ?>">
              <button type="submit" name="kembalikan" value="kembalikan" class="px-4 py-3 rounded-lg text-white bg-blue-500 font-bold transition-all duration-500 hover:bg-blue-800">Paksa Kembalikan</button>
            </form>
          </td>
        <?php else : ?>
          <td class="px-2 py-3 flex gap-2">
            <button class="px-4 py-3 rounded-lg text-white bg-zinc-500 font-bold transition-all duration-500 hover:bg-zinc-800" disabled>Sudah Dikembalikan</button>
            <form action="dashboard.php?page=peminjaman" method="post">
              <input type="hidden" name="id_buku" id="id_buku" value="<?= $data["id"] ?>">
              <button type="submit" name="hapus" value="hapus" class="px-4 py-3 rounded-lg text-white bg-red-500 font-bold transition-all duration-500 hover:bg-red-800">Hapus</button>
            </form>
            <?php

            $id_buku = isset($_POST["id_buku"]) ? htmlspecialchars(trim($_POST["id_buku"])) : null;

            if (isset($_POST["hapus"])) {
              $query = mysqli_query($connect, "DELETE FROM tbl_peminjaman WHERE id = '$id_buku'");

              if ($query) {
                header("Location:../admin/dashboard.php?page=peminjaman");
              }
            }

            ?>
          </td>
        <?php endif; ?>
      </tr>
    <?php } ?>
  </tbody>
</table>