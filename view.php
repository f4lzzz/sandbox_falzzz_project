<?php
$host = "localhost";
$user = "root";
$pass = "";
$db   = "sandbox_falzzz";

$conn = mysqli_connect($host, $user, $pass, $db);

if (!$conn) {
    die("Koneksi gagal: " . mysqli_connect_error());
}

$sql = "SELECT * FROM users"; // Ganti 'users' kalau nama tabel kamu beda
$result = mysqli_query($conn, $sql);

echo "<h2>Data Pengguna</h2>";
echo "<table border='1' cellpadding='10'>";
echo "<tr><th>ID</th><th>Username</th><th>Email</th><th>Created At</th><th>Aksi</th></tr>";

while ($row = mysqli_fetch_assoc($result)) {
    echo "<td>
  <a href='edit.php?id=" . $row['id'] . "'>Edit</a> |
  <a href='delete.php?id=" . $row['id'] . "' onclick=\"return confirm('Yakin mau hapus?');\">Hapus</a>
</td>";
    echo "<tr>";
    echo "<td>" . $row['id'] . "</td>";
    echo "<td>" . $row['username'] . "</td>";
    echo "<td>" . $row['email'] . "</td>";
    echo "<td>" . $row['created_at'] . "</td>";
    echo "</tr>";
}

echo "</table>";

mysqli_close($conn);
?>