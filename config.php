<?php
$host = 'localhost';
$db = 'kas_organisasi';
$user = 'root';  // Sesuaikan dengan username MySQL Anda
$pass = '';      // Sesuaikan dengan password MySQL Anda

$conn = new mysqli($host, $user, $pass, $db);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
