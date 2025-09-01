<?php
$host = "localhost";
$user = "root";
$pass = "";
$db   = "sandbox_falzzz";

$conn = mysqli_connect($host, $user, $pass, $db);

$id = $_GET['id'];
mysqli_query($conn, "DELETE FROM users WHERE id=$id");

header("Location: view.php");
?>