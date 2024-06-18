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
    <title>Dashboard</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <h2>Dashboard</h2>
    <p>Selamat datang, <?php echo $_SESSION['jabatan']; ?></p>
    <a href="organisasi.php">Lihat Organisasi</a><br>
    <a href="input_kas.php">Input Kas</a><br>
    <?php if ($_SESSION['jabatan'] == 'prodi') { ?>
        <a href="buat_user.php">Buat User</a><br>
    <?php } ?>
    <a href="laporan.php">Laporan</a><br>
    <a href="logout.php">Logout</a>
</body>
</html>
