<?php
session_start();
require 'database.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = trim($_POST['username']);
    $password = trim($_POST['password']);

    // Проверяем, существует ли пользователь
    $stmt = $pdo->prepare("SELECT * FROM users WHERE username = :username");
    $stmt->execute(['username' => $username]);

    if ($stmt->rowCount() > 0) {
        echo "<p>Пользователь с таким именем уже существует.</p>";
    } else {
        // Хэшируем пароль
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);
        
        // Вставляем нового пользователя в базу данных
        $stmt = $pdo->prepare("INSERT INTO users (username, password) VALUES (:username, :password)");
        $stmt->execute(['username' => $username, 'password' => $hashed_password]);

        echo "<p>Регистрация успешна! Теперь вы можете <a href='login.php'>войти</a>.</p>";
    }
}
?>
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Регистрация</title>
</head>
<body>
    <h1>Регистрация</h1>
    <form action="" method="post">
        <input type="text" name="username" required placeholder="Ваше имя"><br>
        <input type="password" name="password" required placeholder="Пароль"><br>
        <button type="submit">Зарегистрироваться</button>
    </form>
    <p><a href="login.php">Уже зарегистрированы? Войдите.</a></p>
</body>
</html>
