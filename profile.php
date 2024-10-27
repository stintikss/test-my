<?php
session_start();

if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit;
}
?>
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Профиль</title>
</head>
<body>
    <h1>Профиль пользователя</h1>
    <p>Привет, <?php echo htmlspecialchars($_SESSION['username']); ?>!</p>
    <p><a href="index.php">На главную страницу</a> | <a href="logout.php">Выйти</a></p>
</body>
</html>
