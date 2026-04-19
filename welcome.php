<?php
session_start();

if (!isset($_SESSION["username"])) {
    header("Location: login.php");
    exit;
}
?>
<!DOCTYPE html>
<html>
<head><meta charset="UTF-8"><title>환영합니다</title></head>
<body>
<h2>환영합니다, <?php echo htmlspecialchars($_SESSION["username"]); ?>님!</h2>
<a href="logout.php">로그아웃</a>
</body>
</html>
