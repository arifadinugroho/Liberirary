<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="./styles/output.css">
  <title>Litera Hub</title>
</head>

<body>

  
  <section class="md:px-10 px-4 h-screen">

    <!-- Navigation Bar Section -->

    <nav class="py-4 flex justify-between">
      <a href="./index.php">
        <h1 class="text-blue-500 font-semibold text-2xl tracking-wider">LiteraHub</h1>
      </a>
      <div class="flex items-center justify-end w-3/4">
        <form action="post" class="md:block hidden mr-4 w-2/5">
          <input type="text" name="title" placeholder="Search LiteraHub" class="rounded-3xl py-2 px-4 w-full bg-gray-300">
        </form>
        <ul class="md:flex block text-center gap-6 mr-12">
          <li>
            <a href="./index.php" class="font-semibold">Home</a>
          </li>
          <li>
            <a href="*" class="font-semibold hover:text-blue-500">About</a>
          </li>
          <li>
            <a href="*" class="font-semibold hover:text-blue-500">Library Catalog</a>
          </li>
          <li>
            <a href="*" class="font-semibold hover:text-blue-500">Contact</a>
          </li>
        </ul>
        <button onclick="window.location.href = './login.php'" class="bg-blue-500 text-white font-semibold py-2 px-4 rounded-lg transition-all duration-300 hover:bg-blue-800">Login</button>
      </div>
    </nav>
  
    <!-- Navigation Bar Section -->

  </section>

</body>

</html>