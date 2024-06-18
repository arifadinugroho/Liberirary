<?php session_start(); ?>

<form action="dashboard.php?page=daftar-peminjam" method="post" class="mb-6">
  <input type="text" name="username" id="username" placeholder="search username" class="border-2 p-2.5 outline-none rounded-md border-zinc-500 focus:border-blue-500">
</form>
<table class="w-full">
  <thead class="text-[18px] border-b-[1px] border-slate-600">
    <tr>
      <th class="pr-2 py-3 text-left">No</th>
      <th class="px-2 py-3 text-left">Username</th>
      <th class="px-2 py-3 text-left">Email</th>
      <th class="px-2 py-3 text-left">Role</th>
    </tr>
  </thead>
  <tbody class="text-[15px]">
    <?php

    require("../config/connection.php");

    $query;

    if (isset($_POST["username"])) {
      $username = htmlspecialchars(trim($_POST["username"]));
      $query = mysqli_query($connect, "SELECT * FROM tbl_users WHERE role = 'peminjam' AND username LIKE '%$username%'");
    } else {
      $query = mysqli_query($connect, "SELECT * FROM tbl_users WHERE role = 'peminjam'");
    }

    $users = mysqli_fetch_all($query, MYSQLI_ASSOC);
    $i = 1;

    if (mysqli_num_rows($query) > 0) {
      foreach ($users as $user) { ?>
        <tr>
          <td class="pr-2 py-3 font-semibold"><?= $i++; ?></td>
          <td class="px-2 py-3"><?= $user["username"]; ?></td>
          <td class="px-2 py-3"><?= $user["email"]; ?></td>
          <td class="px-2 py-3"><?= $user["role"]; ?></td>
        </tr>
      <?php } ?>
    <?php } else { ?>
      <h1>Username tidak ditemukan</h1>
    <?php } ?>
  </tbody>
</table>