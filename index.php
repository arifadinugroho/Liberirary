<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="./styles/output.css">
  <title>Liberirary</title>
</head>

<body>

  <section class="h-screen">

    <header>
      <nav class="md:px-10 px-4 md:py-2 py-2 fixed w-full flex justify-between items-center">
        <a href="#home" title="Liberirary">
          <h1 class="text-blue-500 font-semibold text-2xl tracking-wider">Liberirary</h1>
        </a>
        <div class="relative">
          <?php if (isset($_SESSION["logged_in"])) : ?>
            <div class="flex items-center gap-2 cursor-pointer" id="profile" onclick="showMenu()">
              <p class="font-semibold md:block hidden"><?= $_SESSION["username"] ?></p>
              <img src="./images/profile.jpg" alt="profile" width="50" class="rounded-full">
            </div>
            <div class="rounded-lg bg-white shadow-sm shadow-black w-full absolute top-16 hidden p-2" id="menu">
              <a href="./dashboard/">
                <p>dashboard</p>
              </a>
              <form action="./logout.php"><button type="submit">logout</button></form>
            </div>
          <?php else : ?>
            <button onclick="window.location.href = './login.php'" class="py-2 px-3 bg-blue-500 rounded-lg text-white transition-all duration-300 hover:bg-blue-800">Login</button>
          <?php endif; ?>
        </div>
      </nav>
    </header>

    <div class="absolute z-[-1] right-0 md:top-32 top-16 md:h-80 h-24 md:w-80 w-40 bg-blue-500 rounded-full blur-[100px] mr-10"></div>
    <div class="absolute z-[-1] md:top-64 top-96 md:h-80 h-24 md:w-80 w-40 bg-blue-500 rounded-full blur-[100px] ml-10"></div>

    <main class="h-screen flex items-center justify-center z-50 md:px-10 px-4">
      <div class="flex flex-col items-center">
        <h1 class="font-bold text-6xl text-center tracking-wider">WELCOME <br> TO <br> <span class="text-blue-500">LIBERIRARY</span></h1>
        <a href="./daftar-buku.php">
          <button class="p-3 mt-2 rounded-md bg-blue-500 transition-all duration-500 hover:bg-blue-800 text-white">See Catalogue</button>
        </a>
      </div>
    </main>

  </section>

  <script src="./script.js"></script>
</body>

</html>