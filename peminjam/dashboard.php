<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="../styles/output.css">
  <title>Dashboard | Peminjam</title>
</head>

<body>
  <?php

  if (isset($_SESSION["role"]) && $_SESSION["role"] !== "peminjam") {
    header("Location:../index.php");
  }

  ?>

  <section class="h-screen w-full flex flex-row justify-between">
    <div>
      <aside class="h-screen bg-slate-100 fixed w-1/5">
        <div class="h-16 flex justify-center items-center">
          <a href="./dashboard.php" title="Dashboard | Peminjam">
            <h1 class="text-3xl font-bold">Dashboard</h1>
          </a>
        </div>
        <div class="h-full">
          <ul class="font-semibold">
            <li><a href="dashboard.php?page=peminjaman" class="w-full block p-4 text-lg transition-all duration-300 hover:text-blue-500">Peminjaman</a></li>
            <li><a href="dashboard.php?page=pengembalian" class="w-full block p-4 text-lg transition-all duration-300 hover:text-blue-500">Riwayat Pengembalian</a></li>
          </ul>
          <form action="../logout.php" class="absolute left-4 bottom-4 ">
            <button type="submit" class="flex justify-center items-center gap-2 transition-all duration-300 font-bold hover:text-red-500">
              <img src="../images/logout.png" alt="logout" width="20">
              <p>Logout</p>
            </button>
          </form>
        </div>
      </aside>
    </div>
    <div class="w-[80%] h-fit relative">
      <div class="h-20 px-6 mb-4 flex justify-between items-center">
        <div class="flex justify-center items-center gap-2">
          <img src="../images/profile.jpg" alt="profile" width="50" class="rounded-full">
          <p><span class="font-bold"><?= $_SESSION["username"] ?></span> - <?= $_SESSION["role"] ?></p>
        </div>
        <a href="../../index.php" title="Home Page" class="flex justify-center items-center gap-2">
          <img src="../images/home.png" alt="home" width="20">
          <p class="font-bold transition-all duration-300 hover:text-blue-500"> Home</p>
        </a>
      </div>
      <div class="h-fit px-6">
        <?php

        require("../config/connection.php");

        $allowed = array("peminjaman", "pengembalian");
        $page = isset($_GET["page"]) ? htmlspecialchars(trim($_GET["page"])) : null;

        $username = $_SESSION["username"];
        $user = mysqli_fetch_assoc(mysqli_query($connect, "SELECT user_id FROM tbl_users WHERE username = '$username' AND role = 'peminjam'"));
        $user_id = $user["user_id"];

        $peminjaman = mysqli_fetch_assoc(mysqli_query($connect, "SELECT COUNT(id) AS jumlah FROM tbl_peminjaman WHERE user_id = '$user_id'"));
        $pengembalian = mysqli_fetch_assoc(mysqli_query($connect, "SELECT COUNT(id) AS jumlah FROM tbl_pengembalian WHERE user_id = '$user_id'"));
        ?>
        <?php if (!isset($page)) { ?>
          <div class="flex flex-wrap justify-center gap-4">
            <a href="dashboard.php?page=peminjaman" class="w-[45%] flex gap-4 bg-blue-500 text-white p-2 rounded-lg h-fit transition-all duration-300 hover:bg-blue-800">
              <img src="../images/borrow.png" alt="book" width="100">
              <div>
                <h1 class="font-bold text-3xl">Buku yang Dipinjam</h1>
                <h3 class="font-semibold text-3xl"><?= $peminjaman["jumlah"]; ?></h3>
              </div>
            </a>
            <a href="dashboard.php?page=pengembalian" class="w-[45%] flex gap-4 bg-blue-500 text-white p-2 rounded-lg h-fit transition-all duration-300 hover:bg-blue-800">
              <img src="../images/undo.png" alt="book" width="100">
              <div>
                <h1 class="font-bold text-3xl">Pengembalian</h1>
                <h3 class="font-semibold text-3xl"><?= $pengembalian["jumlah"]; ?></h3>
              </div>
            </a>
          </div>
        <?php } else if (isset($page) && !in_array($page, $allowed)) {
          echo "<h1>HALAMAN TIDAK DITEMUKAN</h1>";
        } else {
          include "./" . $page . ".php";
        }

        ?>
      </div>
    </div>
    <h1 class="absolute bottom-2 right-2">Made With Love By Darrell, Arif Adi, Faghrul</h1>
  </section>
</body>

</html>