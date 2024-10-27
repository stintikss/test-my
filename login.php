<?php
session_start();
require 'database.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = trim($_POST['username']);
    $password = trim($_POST['password']);

    // Проверка пользователя
    $stmt = $pdo->prepare("SELECT * FROM users WHERE username = :username");
    $stmt->execute(['username' => $username]);
    $user = $stmt->fetch();

    if ($user && password_verify($password, $user['password'])) {
        $_SESSION['username'] = $user['username']; // Сохраняем пользователя в сессии
        header("Location: index.php");
        exit;
    } else {
        echo "<p>Неверное имя пользователя или пароль.</p>";
    }
}
?>
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Вход</title>
</head>
<body>
    <h1>Вход</h1>
    <form action="" method="post">
        <input type="text" name="username" required placeholder="Ваше имя"><br>
        <input type="password" name="password" required placeholder="Пароль"><br>
        <button type="submit">Войти</button>
    </form>
    <p><a href="register.php">Еще нет аккаунта? Зарегистрируйтесь.</a></p>
</body>
</html>
