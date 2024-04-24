<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="./styles/output.css">
  <title>Litera Hub</title>
</head>

<body>


  <section class="h-screen">

    <!-- Navigation Bar Section -->

    <nav class="md:px-10 px-4 py-4 fixed w-full flex justify-between">
      <a href="./index.php" title="LiteraHub">
        <h1 class="text-blue-500 font-semibold text-2xl tracking-wider -z-10">LiteraHub</h1>
      </a>
      <div class="md:flex items-center justify-end w-3/4">
        <form action="post" class="md:block hidden mr-4 w-2/5">
          <input type="text" name="title" placeholder="Search LiteraHub" class="rounded-3xl py-2 px-4 w-full bg-gray-300">
        </form>
        <ul class="md:flex block gap-6 mr-12">
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

    <!-- Navigation Bar -->

    <div class="absolute right-0 top-32 md:h-80 h-40 md:w-80 w-40 bg-blue-500 rounded-full blur-3xl mr-10"></div>
    <div class="absolute top-64 md:h-80 h-40 md:w-80 w-40 bg-blue-500 rounded-full blur-3xl ml-10"></div>

    <main class="h-screen flex justify-center items-center">
    </main>

  </section>

  <!-- <section class="h-screen">

  </section> -->

</body>

</html>