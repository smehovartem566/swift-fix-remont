<?php
$host = 'localhost';
$user = 'root';
$password = '';
$database = 'swift_fix';

$conn = new mysqli($host, $user, $password);

if ($conn->connect_error) {
    die("Ошибка подключения к MySQL: " . $conn->connect_error);
}

$sql_create_db = "CREATE DATABASE IF NOT EXISTS $database CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci";
if (!$conn->query($sql_create_db)) {
    die("Ошибка создания базы данных: " . $conn->error);
}

$conn->select_db($database);

$sql_create_table = "
CREATE TABLE IF NOT EXISTS swiftorder (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100) NOT NULL,
    num VARCHAR(25) NOT NULL,
    model VARCHAR(100) NOT NULL,
    description TEXT,
    status INT DEFAULT 0 COMMENT '0 - в процессе, 1 - готово'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
";

if (!$conn->query($sql_create_table)) {
    die("Ошибка создания таблицы: " . $conn->error);
}

$conn->set_charset("utf8mb4");

?>