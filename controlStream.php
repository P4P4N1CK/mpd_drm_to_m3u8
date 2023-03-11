<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ingreso de stream</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/tailwindcss@2.1.4/dist/tailwind.min.css">
</head>
<body>
<?php

  session_start();
// check if user is already logged in
if (isset($_SESSION['user_id'])) {
  $username = $_SESSION['username'];
} else {
  // redirect to login page
  header('Location: login.php');
  exit;
}
include 'menu.php';
?>
<?php
include 'db.php';
$sql = "SELECT * FROM stream";
$result = mysqli_query($conn, $sql);
?>
<div class="container mx-auto mt-16 px-4">
  <div class="flex justify-center">
    <div class="w-full lg:w-2/4">
      <table class="table rounded-t-lg overflow-hidden">
        <thead class="bg-gray-800 text-white">
          <tr>
            <th class="px-4 py-2">ID</th>
            <th class="px-4 py-2">Nombre</th>
            <th class="px-4 py-2">Disco Usado</th>
            <th class="px-4 py-2">Actions</th>
          </tr>
        </thead>
        <tbody>
        <?php while ($row = mysqli_fetch_assoc($result)): ?>
        <tr>
          <td class="border px-2 py-2"><?php echo $row['id']; ?></td>
          <td class="border px-2 py-2"><?php echo $row['nombre']; ?></td>
          <td class="border px-2 py-2">
          <?php
          $filename = $row['nombre']. ".ts";
          $filepath = $_SERVER['DOCUMENT_ROOT'] . '/stream/' . $filename;

          if (file_exists($filepath)) {
            $filesize = filesize($filepath);
            $filesize_mb = round($filesize / (1024 * 1024), 2);
            echo $filesize_mb . ' MB';
          } else {
            echo  'no existe.';
          }

          ?>
          </td>
          <td class="border px-2 py-2">
          <a href="del.php?name=<?php echo $row['nombre']; ?>" class="bg-red-300 hover:bg-gray-400 text-gray-800 font-bold py-2 px-4 rounded">Del TS</a>
            <a href="edit.php?id=<?php echo $row['id']; ?>" class="bg-green-300 hover:bg-gray-400 text-gray-800 font-bold py-2 px-4 rounded">Edit</a>
            <a href="remove.php?id=<?php echo $row['id']; ?>" class="bg-red-300 hover:bg-gray-400 text-gray-800 font-bold py-2 px-4 rounded">Remove</a>
            <a href="run.php?id=<?php echo $row['id']; ?>" class="bg-blue-300 hover:bg-gray-400 text-gray-800 font-bold py-2 px-4 rounded" onclick="var popup = window.open(this.href, '_blank', 'width=300,height=200,toolbar=no,location=no,status=no,menubar=no,scrollbars=no,resizable=no'); setTimeout(function() { popup.close(); }, 500); return false;">DRM</a>
            <a href="runffmpeg.php?id=<?php echo $row['id']; ?>" class="bg-blue-300 hover:bg-gray-400 text-gray-800 font-bold py-2 px-4 rounded" onclick="var popup = window.open(this.href, '_blank', 'width=300,height=200,toolbar=no,location=no,status=no,menubar=no,scrollbars=no,resizable=no'); setTimeout(function() { popup.close(); }, 5000); return false;">FFMPG</a>
          </td>
        </tr>
        <?php endwhile; ?>
      </tbody>
    </table>
  </div>
</div>
<?php
mysqli_close($conn);
?>
<div class="bg-dark text-white py-4 fixed bottom-0 w-full">
  <div class="container mx-auto">
    <div class="flex flex-wrap justify-between">
      <div class="w-full md:w-1/2">
        <p>Some footer content here</p>
      </div>
      <div class="w-full md:w-1/2">
        <p>More footer content here</p>
      </div>
    </div>
  </div>
</div>
</body>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
</html>