<?php
require 'config.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $password = password_hash($_POST['password'], PASSWORD_BCRYPT); // Hash password
    $jabatan = $_POST['jabatan'];

    // Query untuk memasukkan user baru
    $query = "INSERT INTO users (username, password, jabatan) VALUES ('$username', '$password', '$jabatan')";
    
    if ($conn->query($query) === TRUE) {
        echo "User berhasil dibuat.";
    } else {
        echo "Error: " . $query . "<br>" . $conn->error;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Tambah User</title>
</head>
<body>
    <h2>Tambah User Baru</h2>
    <form action="" method="POST">
        <label for="username">Username:</label>
        <input type="text" name="username" required><br>
        <label for="password">Password:</label>
        <input type="password" name="password" required><br>
        <label for="jabatan">Jabatan:</label>
        <select name="jabatan" required>
            <option value="bendahara_osis">Bendahara OSIS</option>
            <option value="bendahara_pmr">Bendahara PMR</option>
            <option value="bendahara_kkr">Bendahara KKR</option>
            <option value="bendahara_pramuka">Bendahara Pramuka</option>
            <option value="prodi">PRODI</option>
        </select><br>
        <button type="submit">Tambah User</button>
    </form>
</body>
</html>
