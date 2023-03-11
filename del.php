<?php
session_start();
// check if user is already logged in
if (isset($_SESSION['username'])) {
    // redirect to home page
  } else {
    // redirect to login page
    header('Location: login.php');
    exit;
  }
  
$name = $_GET['name'];
$filepath = $_SERVER['DOCUMENT_ROOT'] . '/stream/' . $name . '.ts';
unlink($filepath);

header("Location: controlStream.php");

?>