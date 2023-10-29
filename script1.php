<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "sample";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Ошибка подключения к базе данных: " . $conn->connect_error);
}

$sql = "CREATE TABLE T3 (
    N INT AUTO_INCREMENT PRIMARY KEY,
    Название VARCHAR(20) NOT NULL,
    Тип VARCHAR(20) NOT NULL,
    Фирма VARCHAR(20) NOT NULL
)";

if ($conn->query($sql) === TRUE) {
    echo "Таблица T3 успешно создана";
} else {
    echo "Ошибка при создании таблицы: " . $conn->error;
}

$data = [
    ['Pascal', 'Процедурный', 'Borland'],
    ['C', 'Процедурный', 'Borland'],
    ['Java', 'Процедурный', 'Java inc'],
    ['C++', 'Объектно-ориентированный', 'Java inc'],
    ['Visual C', 'Объектно-ориентированный', 'Microsoft'],
    ['Visual Basic', 'Объектно-ориентированный', 'Microsoft'],
    ['Delphi', 'Объектно-ориентированный', 'Borland'],
    ['Lisp', 'Сценарный', 'IBM'],
    ['Prolog', 'Сценарный', 'IBM'],
    ['XML', 'Сценарный', 'Borland']
];

foreach ($data as $row) {
    $sql = "INSERT INTO T3 (Название, Тип, Фирма) VALUES ('{$row[0]}', '{$row[1]}', '{$row[2]}')";
    if ($conn->query($sql) !== TRUE) {
        echo "Ошибка при заполнении таблицы: " . $conn->error;
    }
}
$conn->close();
?>
