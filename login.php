<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <h2>Login</h2>
    <form action="auth.php" method="POST">
        <label for="username">Username:</label>
        <input type="text" name="username" required><br>
        <label for="password">Password:</label>
        <input type="password" name="password" required><br>
        <label for="jabatan">Jabatan:</label>
        <select name="jabatan" required>
            <option value="------">------</option>
            <option value="bendahara_osis">Bendahara OSIS</option>
            <option value="bendahara_pmr">Bendahara PMR</option>
            <option value="bendahara_kkr">Bendahara KKR</option>
            <option value="bendahara_pramuka">Bendahara Pramuka</option>
            <option value="prodi">PRODI</option>
        </select><br>
        <button type="submit" name="login">Login</button>
    </form>
</body>
</html>
