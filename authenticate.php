<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Proses autentikasi (sederhana)
    if ($username === 'admin' && $password === 'password') {
        echo "Login successful!";
    } else {
        echo "Invalid username or password.";
    }
} else {
    header("Location: index.php");
    exit();
}
?>
