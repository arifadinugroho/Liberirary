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
          <h1 class="text-blue-500 font-semibold text-2xl tracking-wider">LiteraHub</h1>
        </a>
        <div class="flex items-center w-full h-screen">
          <form method="post" class="w-full">
            <div class="mb-10">
              <h3 class="font-semibold text-2xl">Log In</h3>
              <p>Welcome Back! Please Enter Your Details</p>
            </div>
            <label for="email" class="font-semibold mb-2">Email</label> <br>
            <input type="email" name="email" id="email" placeholder="Enter your email" class="px-4 py-3 w-full mb-2.5 outline-none border-b-[1px] focus:border-blue-500"> <br>
            <label for="password" class="font-semibold mb-2">Password</label> <br>
            <input type="password" name="password" id="password" placeholder="Enter your password" class="px-4 py-3 w-full outline-none border-b-[1px] focus:border-blue-500"> <br>
            <button type="submit" name="login" value="login" class="bg-blue-500 text-white font-semibold py-2 px-4 w-full my-6 rounded-lg transition-all duration-300 hover:bg-blue-800">Log In</button>
            <p class="text-center">Don't have an account? <a href="./register.php" class="text-blue-500">Register</a></p>
          </form>
        </div>
      </div>
      <img src="./images/wallpaper.jpg" alt="wallpaper" class="w-1/2 h-screen object-cover">
    </main>

  </section>

</body>

</html>