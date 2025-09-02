<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['username']) && isset($_POST['email'])) {
        $username = $_POST['username'];
        $email    = $_POST['email'];
        $created  = date("Y-m-d H:i:s");

        // Koneksi ke database
        $host = "localhost";
        $user = "root";
        $pass = "";
        $db   = "sandbox_falzzz";

        $conn = mysqli_connect($host, $user, $pass, $db);

        if (!$conn) {
            die("Koneksi gagal: " . mysqli_connect_error());
        }

        // Simpan data ke database
        $sql = "INSERT INTO users (username, email, created_at) VALUES ('$username', '$email', '$created')";

        if (mysqli_query($conn, $sql)) {
            echo "✅ Data berhasil disimpan!<br>";
            echo "Username: " . $username . "<br>";
            echo "Email: " . $email;
        } else {
            echo "❌ Error: " . mysqli_error($conn);
        }

        mysqli_close($conn);
    } else {
        echo "⚠️ Data tidak lengkap.";
    }
} else {
    echo "⛔ Akses langsung tidak diperbolehkan.";
}
?>