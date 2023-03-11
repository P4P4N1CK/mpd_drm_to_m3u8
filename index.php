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
  $username = $_SESSION['username'] ;
} else {
  // redirect to login page
  header('Location: login.php');
  exit;
}
include 'menu.php';
?>
<div class="container mx-auto">
  <div class="flex justify-center">
    <div class="w-full md:w-8/12">
      <h1 class="text-center text-3xl font-bold my-8">INGRESO NUEVO URL</h1>
      <div class="my-4 max-w-md mx-auto">
        <form action="ingreso.php" method="POST">
          <div class="mb-4">
            <label class="block text-gray-700 font-bold mb-2" for="name">Nombre</label>
            <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="name" name="name" type="text" required>
          </div>
          <div class="mb-4">
            <label class="block text-gray-700 font-bold mb-2" for="url">URL</label>
            <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="url" name="url" type="url" required>
          </div>
          <div class="mb-4">
            <label class="block text-gray-700 font-bold mb-2" for="key">Key</label>
            <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="key" name="key" type="text" required>
          </div>
          <div class="mb-4">
            <label class="block text-gray-700 font-bold mb-2" for="keyid">Key ID</label>
            <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="keyid" name="keyid" type="text" required>
          </div>
          <div class="mb-4">
            <label class="block text-gray-700 font-bold mb-2" for="useragent">User Agent</label>
            <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="useragent" name="useragent" type="text" required>
          </div>
          <div class="mb-4">
            <label class="block text-gray-700 font-bold mb-2" for="atob">ATOB Keys</label>
            <div class="flex items-center">
              <input class="mr-2 leading-tight" type="checkbox" id="atob" name="atob" value="yes">
              <label class="text-sm" for="atob">Yes</label>
            </div>
          </div>
          <div class="flex justify-center">
            <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">Ingresar</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>

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