<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header('Location: login.php');
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Organisasi</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <h2>List Organisasi</h2>
    <ul>
        <li>OSIS</li>
        <li>PMR</li>
        <li>KKR</li>
        <li>Pramuka</li>
    </ul>
    <a href="dashboard.php">Kembali ke Dashboard</a>
</body>
</html>
