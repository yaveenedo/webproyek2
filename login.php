<?php
session_start();

require "function.php";

if (isset($_POST["login"])) {
    $username = $_POST["username"];
    $password = $_POST["password"];

    if($username == 'admin' && $password == 'admin') {
        header("location: admin/index.php");
        $_SESSION['username'] = $username; 
        exit;
    }

    if (login($username, $password)) {
        header("location: user/index.php");
        $_SESSION['username'] = $username; 
        exit;
    }
    $error = false;
}


?>

<!DOCTYPE html>
<html> 
<head>
    <title>Halaman Login</title>

    <link rel="stylesheet" type="text/css" href="css/login.css">

</head>
<body>





<form action="" method="post">

    <ul>
        <li>
            <label for="name">Username</label>
            <input type="text" name="username" id="username"/>
        </li>
        <li>
            <label for="password">Password</label>
            <input type="password" name="password" id="password"/>
        </li>
        <li>
        <button type="submit" name="login">Login</button>
        </li>
        <li>
        <p>Belum punya akun? <a href="registrasi.php">Daftar</a></p>
        </li>
        <li>
        <?php if (isset($error)) : ?>
        <p style="color: red; font-style: italic;">Username atau password belum terdaftar</p>
    <?php endif; ?>
        </li>
    </ul>
    
</form>

</body>
</html>