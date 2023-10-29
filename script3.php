<?php
$servername = "localhost"; 
$username = "root"; 
$password = ""; 
$dbname = "sample";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Ошибка подключения к базе данных: " . $conn->connect_error);
}

if (isset($_POST['column'])) {
    $selectedColumn = $_POST['column'];
    
    $sql = "SELECT $selectedColumn FROM T3"; 
    $result = $conn->query($sql);
    
    if ($result->num_rows > 0) {
        echo "<h2>Содержимое столбца '$selectedColumn':</h2>";
        echo "<ul>";
        while ($row = $result->fetch_assoc()) {
            echo "<li>" . $row[$selectedColumn] . "</li>";
        }
        echo "</ul>";
    } else {
        echo "Нет данных в выбранном столбце.";
    }
} else {
    echo "Столбец не выбран.";
}
$conn->close();
?>
