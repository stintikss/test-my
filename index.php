<?php
session_start(); // Запускаем сессию
?>
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Главная страница</title>
</head>
<body>
    <h1>Добро пожаловать на сайт!</h1>

    <?php if (isset($_SESSION['username'])): ?>
        <p>Привет, <?php echo htmlspecialchars($_SESSION['username']); ?>!</p>
        <a href="profile.php">Перейти в профиль</a> | <a href="logout.php">Выйти</a>
    <?php else: ?>
        <p>Пожалуйста, <a href="login.php">войдите</a> или <a href="register.php">зарегистрируйтесь</a>.</p>
    <?php endif; ?>
</body>
</html>
