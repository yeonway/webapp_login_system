<?php
session_start();
if (!isset($_SESSION["username"]) || $_SESSION["username"] !== "admin") {
    echo "접근 불가";
    exit;
}

$mysqli = new mysqli("localhost", "testuser", "password", "mydb");
$result = $mysqli->query("SELECT id, username FROM users");
?>

<h2>관리자 페이지</h2>
<table border="1">
  <tr><th>ID</th><th>Username</th></tr>
  <?php while($row = $result->fetch_assoc()): ?>
  <tr>
    <td><?php echo $row["id"]; ?></td>
    <td><?php echo htmlspecialchars($row["username"]); ?></td>
  </tr>
  <?php endwhile; ?>
</table>
<a href="logout.php">로그아웃</a>
