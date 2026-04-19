<?php
session_start();
$mysqli = new mysqli("localhost", "testuser", "password", "mydb");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["username"];
    $password = $_POST["password"];

    $stmt = $mysqli->prepare("SELECT password FROM users WHERE username = ?");
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $stmt->bind_result($hashed_password);

    if ($stmt->fetch() && password_verify($password, $hashed_password)) {
        $_SESSION["username"] = $username;
        
        if ($username === "admin") {
            header("Location: admin.php");
        } else {
            header("Location: welcome.php");
        }
        exit;
    } else {
        echo "로그인 실패!";
    }
}
?>
<form method="POST">
  아이디: <input type="text" name="username"><br>
  비밀번호: <input type="password" name="password"><br>
  <input type="submit" value="로그인">
</form>
