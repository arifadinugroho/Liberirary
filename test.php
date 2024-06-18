<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>
<body>
  <form action="./test.php" method="post">
    <input type="text" name="judul" id="judul">
  </form>
  <?php
  
  if (isset($_POST["judul"])) {
    $judul = $_POST["judul"];
    echo $judul;
  }
  
  ?>
</body>
</html>