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
require_once('db.php');

// check if user is already logged in
if (isset($_SESSION['username'])) {
    // redirect to home page
    header('Location: index.php');
    exit;
  }
  

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $errors = [];

    if (empty($username)) {
        $errors[] = 'Username is required';
    }

    if (empty($password)) {
        $errors[] = 'Password is required';
    }

    if (!empty($errors)) {
        echo '<div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">';
        echo '<ul>';
        foreach ($errors as $error) {
            echo '<li>' . $error . '</li>';
        }
        echo '</ul>';
        echo '</div>';
    } else {
        $stmt = $conn->prepare("SELECT * FROM `user` WHERE username = ?");
        $stmt->bind_param('s', $username);
        $stmt->execute();
        $result = $stmt->get_result();
          if ($result->num_rows === 1) {
            $row = $result->fetch_assoc();
            if ($password === $row['password']) {
                $_SESSION['user_id'] = $row['id'];
                $_SESSION['username'] = $row['username'];
                header('Location: index.php');
                exit;
            } else {
                echo '<div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">';
                echo 'Invalid username or password LVL 1 /// ';
                echo '</div>';
            }
        } else {
            
            echo '<div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">';
            echo 'Invalid username or password LVL 1 /// ';
            echo '</div>';
        }
    }
}
?>

<!-- login form HTML -->
<div class="flex flex-col justify-center items-center h-screen bg-gray-100">
  <h1 class="text-2xl font-bold mb-4">Login</h1>
  <form action="login.php" method="POST" class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4">
    <div class="mb-4">
      <label class="block text-gray-700 font-bold mb-2" for="username">
        Username
      </label>
      <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="username" name="username" type="text" placeholder="Username">
    </div>
    <div class="mb-6">
      <label class="block text-gray-700 font-bold mb-2" for="password">
        Password
      </label>
      <input class="shadow appearance-none border border-red-500 rounded w-full py-2 px-3 text-gray-700 mb-3 leading-tight focus:outline-none focus:shadow-outline" id="password" name="password" type="password" placeholder="********">
      <p class="text-red-500 text-xs italic">Please choose a password.</p>
    </div>
    <div class="flex items-center justify-between">
      <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline" type="submit">
        Sign In
      </button>
      <a class="inline-block align-baseline font-bold text-sm text-blue-500 hover:text-blue-800" href="#">
        Forgot Password?
      </a>
    </div>
  </form>
  <p class="text-center text-gray-500 text-xs">
    &copy;2023 Intec Inc. All rights reserved.
  </p>
</div>
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