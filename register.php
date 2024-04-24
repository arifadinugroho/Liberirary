<?php session_start(); ?>
<?php require("./controller/registerController.php") ?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="./styles/output.css">
  <title>Login | LiteraHub</title>
</head>

<body>
  <?php

  if (isset($_SESSION["logged_in"]) && $_SESSION["logged_in"] === true) {
    header("Location:index.php");
    exit;
  }

  ?>
  <section class="h-screen">

    <main class="h-screen w-full flex items-center justify-between">
      <div class="flex flex-col h-screen w-1/2 md:px-10 px-4 py-4">
        <a href="./index.php" title="LiteraHub" class="fixed">
          <h1 class="text-blue-500 font-semibold text-2xl tracking-wider  ">LiteraHub</h1>
        </a>
        <div class="flex items-center w-full h-screen">
          <!-- <div></div> -->
          <form method="post" class="w-full">
            <div class="mb-8">
              <h3 class="font-semibold text-2xl">Register</h3>
              <p>Create Your Account, Find The Perfect One.</p>
            </div>
            <label for="username" class="font-semibold mb-2">Username</label> <br>
            <input type="text" name="username" id="username" placeholder="Enter your username" class="border-b-[1px] outline-none active:border-b-[1px] focus:border-blue-500 px-4 py-3 w-full mb-2.5"> <br>
            <label for="register_email" class="font-semibold mb-2">Email</label> <br>
            <input type="email" name="register_email" id="register_email" placeholder="Enter your email" class="border-b-[1px] outline-none active:border-b-[1px] focus:border-blue-500 px-4 py-3 w-full mb-2.5"> <br>
            <label for="register_password" class="font-semibold mb-2">Password</label> <br>
            <input type="password" name="register_password" id="register_password" placeholder="Enter your password" class="border-b-[1px] outline-none active:border-b-[1px] focus:border-blue-500 px-4 py-3 w-full mb-2.5"> <br>
            <label for="confirm_password" class="font-semibold mb-2">Confirm Password</label> <br>
            <input type="password" name="confirm_password" id="confirm_password" placeholder="Confirm your password" class="border-b-[1px] outline-none active:border-b-[1px] focus:border-blue-500 px-4 py-3 w-full"> <br>
            <button type="submit" name="register" value="register" class="bg-blue-500 text-white font-semibold py-2 px-4 w-full my-6 rounded-lg transition-all duration-300 hover:bg-blue-800">Register</button>
            <p class="text-center">Already have an account? <a href="./login.php" class="text-blue-500">Log In</a></p>
          </form>
        </div>
      </div>
      <img src="./images/wallpaper.jpg" alt="wallpaper" class="w-1/2 h-screen object-cover">
    </main>

  </section>

</body>

</html>