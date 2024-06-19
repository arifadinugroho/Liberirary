<?php session_start(); ?>
<?php require("./controller/loginController.php") ?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="./styles/output.css">
  <title>Login | Liberirary</title>
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
          <form method="post" class="w-full">
            <div class="mb-10">
              <h3 class="font-semibold text-2xl">Log In</h3>
            </div>
            <label for="email" class="font-semibold mb-2">Email</label> <br>
            <input type="email" name="email" id="email" placeholder="Enter your email" class="px-4 py-3 w-full outline-none border-b-[1px] focus:border-blue-500"> <br>
            <p class="text-red-500">
              <?php

              if (isset($errInput["email"])) {
                echo $errInput["email"];
              } else {
                echo "";
              }

              ?>
            </p>
            <label for="password" class="font-semibold mb-2">Password</label> <br>
            <input type="password" name="password" id="password" placeholder="Enter your password" class="px-4 py-3 w-full outline-none border-b-[1px] focus:border-blue-500"> <br>
            <p class="text-red-500">
              <?php

              if (isset($errInput["password"])) {
                echo $errInput["password"];
              } else {
                echo "";
              }

              ?>
            </p>
            <button type="submit" name="login" value="login" class="bg-blue-500 text-white py-2 px-4 w-full my-6 rounded-lg transition-all duration-300 hover:bg-blue-800">Log In</button>
            <p class="text-center">Don't have an account? <a href="./register.php" class="text-blue-500">Register</a></p>
          </form>
        </div>
      </div>
    </main>

  </section>

</body>

</html>