<?php
$host = "localhost";
$user = "root";
$pass = "";
$db = "sandbox_falzzz";

$conn = mysqli_connect($host, $user, $pass, $db);

if (!$conn) {
    die("Koneksi gagal: " . mysqli_connect_error());
}
$username   = $_POST['username'];
$email      = $_POST['email'];
$created    = date("Y-m-d H:i:s");

$sql = "INSERT INTO users (username, email, created_at) VALUES ('$username', '$email', '$created')";

if (mysqli_query($conn, $sql)) {
    echo "Data berhasil disimpan!";
} else {
    echo "Error: " . mysqli_error($conn);
}

mysqli_close($conn);
?>