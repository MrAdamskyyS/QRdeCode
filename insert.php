<?php
// Połączenie z bazą danych MySQL
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "qrcodedb";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Odebranie wartości z żądania AJAX
$result = $_POST['result'];

$date = date("Y-m-d"); // Pobierz dzisiejszą datę
// Zapisanie wartości w bazie danych
$sql = "INSERT INTO qrcodes (QRText, Date) VALUES ('$result', '$date')";
if ($conn->query($sql) === TRUE) {
    echo "Zmienna result została zapisana w bazie danych.";
} else {
    echo "Błąd podczas zapisywania zmiennej result: " . $conn->error;
}

$conn->close();
?>