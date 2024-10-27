<?php
// Настройки подключения к базе данных
$host = 'localhost';
$dbname = 'lesson_2';
$user = 'root';
$password = 'root';

// Создаем подключение к базе данных
try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $user, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Ошибка подключения: " . $e->getMessage());
}
?>
