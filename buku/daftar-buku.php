<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../styles/output.css">
    <title>Daftar Buku</title>
</head>

<body>

    <section class="h-screen">
        <nav class="px-10 py-2 w-full flex justify-between items-center mb-4">
            <a href="../index.php" title="Liberirary">
                <h1 class="text-blue-500 font-semibold text-2xl tracking-wider">Liberirary</h1>
            </a>
            <form action="./daftar-buku.php" method="post">
                <input type="text" name="judul" id="judul" placeholder="search" class="border-2 p-2.5 outline-none rounded-md focus:border-blue-500">
            </form>
        </nav>
        <div class="p-4 flex flex-wrap justify-start gap-4">
            <?php

            require("../config/connection.php");

            $query;

            if (isset($_POST["judul"])) {
                $judul = isset($_POST["judul"]) ? htmlspecialchars(trim($_POST["judul"])) : null;
                
                $query = mysqli_query($connect, "SELECT * FROM tbl_buku WHERE title LIKE '%$judul%'");
            } else {
                $query = mysqli_query($connect, "SELECT * FROM tbl_buku ORDER BY id ASC");
            }

            $datas = mysqli_fetch_all($query, MYSQLI_ASSOC);

            if (mysqli_num_rows($query) > 0) {
                foreach ($datas as $data) { ?>
                    <a href="./detail-buku.php?id_buku=<?= $data["book_id"] ?>" id="<?= $data["book_id"] ?>" title="<?= $data["title"] ?>">
                        <div class="w-44 h-fit">
                            <img src="../uploads/<?= $data["cover"] ?>" alt="cover" class="w-full h-48 rounded-md object-cover">
                            <?php if (strlen($data["title"]) > 15) : ?>
                                <h1 class="font-semibold"><?= substr($data["title"], 0, 15) . "..." ?></h1>
                            <?php else : ?>
                                <h1 class="font-semibold"><?= $data["title"] ?></h1>
                            <?php endif; ?>
                        </div>
                    </a>
                <?php } ?>
            <?php } else { ?>
                <h1>Tidak ada buku yang tersedia</h1>
            <?php } ?>
        </div>
        <h1 class="absolute bottom-2 right-2">Made With Love By Darrell, Arif Adi, Faghrul</h1>
    </section>

</body>

</html>