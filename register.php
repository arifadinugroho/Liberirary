<?php session_start(); ?>
<?php require("./controller/registerController.php") ?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="./styles/output.css">
  <title>Register | Liberirary</title>
</head>

<body>
  <?php

  if (isset($_SESSION["logged_in"]) && $_SESSION["logged_in"] === true) {
    header("Location:index.php");
    exit;
  }

  ?>
  <section class="h-screen">

    <a href="./index.php" title="Liberirary" class="fixed md:px-10 px-4 py-4">
      <h1 class="text-blue-500 font-semibold text-2xl tracking-wider">Liberirary</h1>
    </a>
    <main class="h-screen w-full flex items-center justify-center">
      <div class="flex flex-col h-screen w-1/3 md:px-10 px-4 py-4">
        <div class="flex items-center w-full h-screen">
          <!-- <div></div> -->
          <form method="post" class="w-full">
            <div class="mb-8">
              <h3 class="font-semibold text-2xl">Register</h3>
            </div>
            <label for="username" class="font-semibold mb-2">Username</label> <br>
            <input type="text" name="username" id="username" placeholder="Enter your username" class="border-b-[1px] outline-none active:border-b-[1px] focus:border-blue-500 px-4 py-3 w-full mb-2.5"> <br>
            <p class="text-red-500"><?= $errInput; ?></p>
            <label for="register_email" class="font-semibold mb-2">Email</label> <br>
            <input type="email" name="register_email" id="register_email" placeholder="Enter your email" class="border-b-[1px] outline-none active:border-b-[1px] focus:border-blue-500 px-4 py-3 w-full mb-2.5"> <br>
            <p class="text-red-500"><?= $errInput; ?></p>
            <label for="register_password" class="font-semibold mb-2">Password</label> <br>
            <input type="password" name="register_password" id="register_password" placeholder="Enter your password" class="border-b-[1px] outline-none active:border-b-[1px] focus:border-blue-500 px-4 py-3 w-full mb-2.5"> <br>
            <label for="role" class="font-semibold mb-2">Role</label> <br>
            <select name="role" id="role" class="px-4 py-3 w-full outline-none">
              <option value="admin">Admin</option>
              <option value="peminjam">Peminjam</option>
            </select>
            <button type="submit" name="register" value="register" class="bg-blue-500 text-white py-2 px-4 w-full my-6 rounded-lg transition-all duration-300 hover:bg-blue-800">Register</button>
            <p class="text-center">Already have an account? <a href="./login.php" class="text-blue-500">Log In</a></p>
          </form>
        </div>
      </div>
    </main>

  </section>

</body>

</html>