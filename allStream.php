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
    <div class="w-full lg:w-4/4">
    <table class="table rounded-t-lg overflow-hidden">
      <thead class="bg-gray-800 text-white">
        <tr>
          <th class="px-8 py-2">ID</th>
          <th class="px-8 py-2">Nombre</th>
          <th class="px-8 py-2">URL</th>
          <th class="px-8 py-2">Key</th>
          <th class="px-8 py-2">Key ID</th>
          <th class="px-8 py-2">Actions</th>
        </tr>
      </thead>
      <tbody>
<?php while ($row = mysqli_fetch_assoc($result)): ?>
  <tr class="txtEdit">
    <td class="border px-2 py-2 "><?php echo $row['id']; ?></td>
    <td class="border px-2 py-2 "><?php echo $row['nombre']; ?></td>
    <td class="border px-6 py-2 "><?php echo $row['url']; ?></td>
    <td class="border px-4 py-2 "><?php echo $row['key_s']; ?></td>
    <td class="border px-4 py-2 "><?php echo $row['keyid_s']; ?></td>
    <td class="border px-2 py-2 ">   
        <div class="inline-flex">
        <a href="edit.php?id=<?php echo $row['id']; ?>"> 
        <button class="bg-gray-300 hover:bg-gray-400 text-gray-800 font-bold py-2 px-4 rounded-l">
          Edit
          </button>
        </a>
          <a href="remove.php?id=<?php echo $row['id']; ?> ">
          <button class="bg-red-300 hover:bg-red-400 text-red-800 font-bold py-2 px-4 rounded-r">
          Remove
          </button>
        </a>
        </div>
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
<footer class="bg-dark text-white py-4 fixed-bottom">
  <div class="container">
    <div class="row">
      <div class="col-md-6">
        <p>Some footer content here</p>
      </div>
      <div class="col-md-6">
        <p>More footer content here</p>
      </div>
    </div>
  </div>
</footer>
</body>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
</html>