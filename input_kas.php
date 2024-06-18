<?php
session_start();
require 'config.php';

if (!isset($_SESSION['user_id'])) {
    header('Location: login.php');
    exit;
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $tanggal = $_POST['tanggal'];
    $jumlah = $_POST['jumlah'];
    $jenis = $_POST['jenis'];
    $organisasi = $_POST['organisasi'];
    $user_id = $_SESSION['user_id'];

    $query = "INSERT INTO kas (tanggal, jumlah, jenis, organisasi, user_id) VALUES ('$tanggal', '$jumlah', '$jenis', '$organisasi', '$user_id')";
    if ($conn->query($query) === TRUE) {
        echo "Kas berhasil diinput.";
    } else {
        echo "Error: " . $query . "<br>" . $conn->error;
    }

    // Distribusi kas masuk ke organisasi
    if ($jenis == 'masuk') {
        $osis = $jumlah * 0.50;
        $pmr = $jumlah * 0.20;
        $kkr = $jumlah * 0.15;
        $pramuka = $jumlah * 0.15;

        $conn->query("UPDATE kas_total SET total = total + $osis WHERE organisasi='osis'");
        $conn->query("UPDATE kas_total SET total = total + $pmr WHERE organisasi='pmr'");
        $conn->query("UPDATE kas_total SET total = total + $kkr WHERE organisasi='kkr'");
        $conn->query("UPDATE kas_total SET total = total + $pramuka WHERE organisasi='pramuka'");

        echo "Distribusi kas berhasil.";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Input Kas</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <h2>Input Kas</h2>
    <form action="" method="POST">
        <label for="tanggal">Tanggal:</label>
        <input type="date" name="tanggal" required><br>
        <label for="jumlah">Jumlah:</label>
        <input type="number" name="jumlah" required><br>
        <label for="jenis">Jenis:</label>
        <select name="jenis" required>
            <option value="masuk">Masuk</option>
            <option value="keluar">Keluar</option>
        </select><br>
        <label for="organisasi">Organisasi:</label>
        <select name="organisasi" required>
            <option value="osis">OSIS</option>
            <option value="pmr">PMR</option>
            <option value="kkr">KKR</option>
            <option value="pramuka">Pramuka</option>
        </select><br>
        <button type="submit">Submit</button>
    </form>
    <a href="dashboard.php">Kembali ke Dashboard</a>
</body>
</html>
