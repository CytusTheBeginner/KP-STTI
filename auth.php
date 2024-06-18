<?php
session_start();
require 'config.php';

if (isset($_POST['login'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $jabatan = $_POST['jabatan'];

    $query = "SELECT * FROM users WHERE username='$username' AND jabatan='$jabatan'";
    $result = $conn->query($query);
    
    if ($result->num_rows > 0) {
        $user = $result->fetch_assoc();
        if (password_verify($password, $user['password'])) {
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['jabatan'] = $user['jabatan'];
            header('Location: dashboard.php');
        } else {
            echo "Password salah.";
        }
    } else {
        echo "Username atau jabatan salah.";
    }
}
?>
