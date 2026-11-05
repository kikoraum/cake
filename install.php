<?php
// install.php — запустите этот файл ОДИН РАЗ в браузере (example.local/install.php), чтобы создать таблицу
require __DIR__ . '/config.php';

try {
    // Подключаемся к серверу MySQL без указания базы, чтобы создать её
    $pdo = new PDO('mysql:host=' . DB_HOST . ';charset=utf8mb4', DB_USER, DB_PASS, [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
    ]);

    // Создаем базу данных, если её нет
    $pdo->exec("CREATE DATABASE IF NOT EXISTS `" . DB_NAME . "` CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci");
    
    // Переключаемся на неё
    $pdo->exec("USE `" . DB_NAME . "`");

    // Создаем таблицу заявок
    $pdo->exec("
        CREATE TABLE IF NOT EXISTS `requests` (
            `id` INT AUTO_INCREMENT PRIMARY KEY,
            `event_type` VARCHAR(100) NOT NULL,
            `products` VARCHAR(255) NOT NULL,
            `wishes` TEXT,
            `name` VARCHAR(100) NOT NULL,
            `phone` VARCHAR(20) NOT NULL,
            `consent` TINYINT(1) NOT NULL DEFAULT 1,
            `created_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP
        ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
    ");

    echo "<h1 style='color: green;'>Успех! База данных и таблица 'requests' созданы.</h1>";
    echo "<p>Теперь можно отправлять заявки через форму на сайте.</p>";
    echo "<p><a href='index.html'>Перейти на сайт</a> | <a href='admin.php'>Перейти в админку</a></p>";

} catch (PDOException $e) {
    echo "<h1 style='color: red;'>Ошибка: " . htmlspecialchars($e->getMessage()) . "</h1>";
    echo "<p>Проверьте, запущен ли MySQL в Open Server.</p>";
}
?>