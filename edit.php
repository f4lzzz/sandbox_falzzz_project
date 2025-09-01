<?php
$host = "localhost";
$user = "root";
$pass = "";
$db   = "sandbox_falzzz";

$conn = mysqli_connect($host, $user, $pass, $db);

if (isset($_GET['id'])) {
  $id = $_GET['id'];
  $result = mysqli_query($conn, "SELECT * FROM users WHERE id=$id");
  $row = mysqli_fetch_assoc($result);
}

if (isset($_POST['update'])) {
  $username = $_POST['username'];
  $email    = $_POST['email'];

  mysqli_query($conn, "UPDATE users SET username='$username', email='$email' WHERE id=$id");
  header("Location: view.php");
}
?>

<h2>Edit Data</h2>
<form method="POST">
  <label>Username:</label><br>
  <input type="text" name="username" value="<?php echo $row['username']; ?>" required><br><br>

  <label>Email:</label><br>
  <input type="email" name="email" value="<?php echo $row['email']; ?>" required><br><br>

  <input type="submit" name="update" value="Update">
</form>