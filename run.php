<?php
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
    $url = $row['url'];
    $key = $row['key_s'];
    $keyid = $row['keyid_s'];
    $useragent = $row['useragent'];

    $commandPath = $_SERVER['DOCUMENT_ROOT'] . '/bin/N_m3u8DL-RE';
    $saveDir = $_SERVER['DOCUMENT_ROOT'] . '/stream';
    $tempDir = $_SERVER['DOCUMENT_ROOT'] . '/temp';
    $leng = "es";
    $qt = "1280*";

    $command = "$commandPath --save-dir $saveDir --del-after-done true --save-name $nombre --tmp-dir $tempDir \"$url\" --live-real-time-merge true --live-wait-time 5 --mp4-real-time-decryption true --live-pipe-mux -sv best -sa all --use-shaka-packager true --key $keyid:$key -H \"User-Agent: $useragent\"";

    exec($command);

    header("Location: success.php");
    exit();
} else {
    echo "No data found for stream ID $id";
}
?>
