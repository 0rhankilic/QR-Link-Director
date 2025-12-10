<?php
$servername = "localhost";
$username = "u147250695_linkdirection";
$password = "OqH76Tj21m";
$dbname = "u147250695_linkdirection";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("❌ Veritabanı bağlantı hatası: " . $conn->connect_error);
}
?>
