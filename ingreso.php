<?php
require_once 'db.php';
session_start();
// check if user is already logged in
if (isset($_SESSION['username'])) {
} else {
  // redirect to login page
  header('Location: login.php');
  exit;
}


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $nombre = mysqli_real_escape_string($conn, $_POST['name']);
  $url = filter_var($_POST['url'], FILTER_VALIDATE_URL);
  $key = mysqli_real_escape_string($conn, $_POST['key']);
  $keyid = mysqli_real_escape_string($conn, $_POST['keyid']);
  $useragent = mysqli_real_escape_string($conn, $_POST['useragent']);

  if (isset($_POST['atob']) && $_POST['atob'] == 'yes') {
    $key = base64_decode($key);
    $keyid = base64_decode($keyid);
  }

  try {
    $stmt = $conn->prepare("INSERT INTO stream (nombre, url, key_s, keyid_s, useragent) VALUES (?, ?, ?, ?, ?)");
    $stmt->bind_param("sssss", $nombre, $url, $key, $keyid, $useragent);
    $stmt->execute();

    echo "Data inserted successfully";
  } catch (Exception $e) {
    echo "Error: " . $e->getMessage();
  }

  $stmt->close();
  $conn->close();
}
?>
