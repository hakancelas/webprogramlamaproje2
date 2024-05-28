<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "yemek_tarifleri";

// Veritabanı bağlantısı oluşturuluyor
$conn = new mysqli($servername, $username, $password, $dbname);

// Bağlantı kontrolü
if ($conn->connect_error) {
    die("Bağlantı hatası: " . $conn->connect_error);
}
?>
