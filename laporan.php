<?php
session_start();
require 'config.php';

if (!isset($_SESSION['user_id'])) {
    header('Location: login.php');
    exit;
}

function get_laporan($organisasi) {
    global $conn;
    $result = $conn->query("SELECT * FROM kas WHERE organisasi='$organisasi' AND MONTH(tanggal) = MONTH(CURRENT_DATE())");
    return $result->fetch_all(MYSQLI_ASSOC);
}

$osis = get_laporan('osis');
$pmr = get_laporan('pmr');
$kkr = get_laporan('kkr');
$pramuka = get_laporan('pramuka');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Laporan Bulanan</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <h2>Laporan Bulanan</h2>
    <h3>OSIS</h3>
    <table>
        <tr>
            <th>Tanggal</th>
            <th>Jumlah</th>
            <th>Jenis</th>
        </tr>
        <?php foreach ($osis as $kas) { ?>
        <tr>
            <td><?php echo $kas['tanggal']; ?></td>
            <td><?php echo $kas['jumlah']; ?></td>
            <td><?php echo $kas['jenis']; ?></td>
        </tr>
        <?php } ?>
    </table>
    <h3>PMR</h3>
    <table>
        <tr>
            <th>Tanggal</th>
            <th>Jumlah</th>
            <th>Jenis</th>
        </tr>
        <?php foreach ($pmr as $kas) { ?>
        <tr>
            <td><?php echo $kas['tanggal']; ?></td>
            <td><?php echo $kas['jumlah']; ?></td>
            <td><?php echo $kas['jenis']; ?></td>
        </tr>
        <?php } ?>
    </table>
    <h3>KKR</h3>
    <table>
        <tr>
            <th>Tanggal</th>
            <th>Jumlah</th>
            <th>Jenis</th>
        </tr>
        <?php foreach ($kkr as $kas) { ?>
        <tr>
            <td><?php echo $kas['tanggal']; ?></td>
            <td><?php echo $kas['jumlah']; ?></td>
            <td><?php echo $kas['jenis']; ?></td>
        </tr>
        <?php } ?>
    </table>
    <h3>Pramuka</h3>
    <table>
        <tr>
            <th>Tanggal</th>
            <th>Jumlah</th>
            <th>Jenis</th>
        </tr>
        <?php foreach ($pramuka as $kas) { ?>
        <tr>
            <td><?php echo $kas['tanggal']; ?></td>
            <td><?php echo $kas['jumlah']; ?></td>
            <td><?php echo $kas['jenis']; ?></td>
        </tr>
        <?php } ?>
    </table>
    <a href="dashboard.php">Kembali ke Dashboard</a>
</body>
</html>
