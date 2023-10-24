<?php
require 'function.php';

if (isset($_POST["register"])) {

    if (register($_POST) > 0) {
        echo "<script>
                alert('user baru berhasil ditambahkan');
            </script>";
    } else {
        echo mysqli_error($conn);
    }
}

?>

<!DOCTYPE html>
<html>

<head>
    <title>Halaman Registrasi</title>

    <link rel="stylesheet" type="text/css" href="css/registrasi.css">

</head>

<body>


    <form action="" method="post">
        <h2>Halaman Registrasi</h2>
        <ul>
            <li>
                <label for="name">Username</label>
                <input type="text" name="username" id="username" placeholder="Username" />
            </li>
            <li>
                <label for="email">Email</label>
                <input type="email" name="email" id="email" placeholder="Email" />
            </li>
            <li>
                <label for="password">Password</label>
                <input type="password" name="password" id="password" placeholder="Password" />
            </li>
            <li>
                <label for="password_confirmation">Password Confirmation</label>
                <input type="password" name="password_confirmation" id="password_confirmation" placeholder="Password Confirmation" />
            </li>
            <li>
                <button type="submit" name="register">Register</button>

            </li>
            <p>Sudah Daftar? <a href="login.php">Login</a></p>
        </ul>


    </form>

</body>

</html>