<?php
$mysqli = new mysqli("localhost", "testuser", "password", "mydb");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["username"];
    $password = password_hash($_POST["password"], PASSWORD_DEFAULT);

    $stmt = $mysqli->prepare("INSERT INTO users (username, password) VALUES (?, ?)");
    $stmt->bind_param("ss", $username, $password);

    if ($stmt->execute()) {
        echo "회원가입 성공!";
    } else {
        echo "회원가입 실패: 사용자명 중복일 수 있습니다.";
    }
}
?>
<form method="POST">
  아이디: <input type="text" name="username"><br>
  비밀번호: <input type="password" name="password"><br>
  <input type="submit" value="회원가입">
</form>
