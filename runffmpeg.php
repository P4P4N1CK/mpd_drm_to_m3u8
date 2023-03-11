<?php
ob_start();
include 'db.php';
session_start();
// check if user is already logged in
if (isset($_SESSION['username'])) {
  // redirect to home page

} else {
  // redirect to login page
  header('Location: login.php');
  exit;
}


$id = $_GET['id'];

$sql = "SELECT * FROM stream WHERE id = $id";
$result = mysqli_query($conn, $sql);

if ($row = mysqli_fetch_assoc($result)) {
    $nombre = $row['nombre'];
    $dir = $_SERVER['DOCUMENT_ROOT'] . '/m3u8/' . $nombre;

    if (!is_dir($dir)) {
        mkdir($dir, 0755, true);
    }

    $commandPath = $_SERVER['DOCUMENT_ROOT'] . '/bin/ffmpeg.exe';
    $pathTS = $_SERVER['DOCUMENT_ROOT'] . '/stream/' . $nombre . '.ts';
    $m3u8Folder = $dir . '/' . $nombre . '.m3u8';
    $command = "$commandPath -re -i $pathTS -c copy -f hls -hls_time 5 -hls_list_size 4 -hls_flags delete_segments $m3u8Folder";

    exec($command);
    header("Location: success.php");
    exit();
} else {
    echo "No data found for stream ID $id";
}

ob_end_flush();
?>
