<?php
// Untuk mengakses database phpmyadmin
$conn = mysqli_connect("localhost","root","","recipe");

// Fungsi untuk melakukan registrasi pengguna
function register($data){
    global $conn;

    $username = strtolower(stripslashes($data["username"]));
    $email = ($data["email"]);
    $password = mysqli_real_escape_string($conn, $data["password"]);
    $password_confirmation = mysqli_real_escape_string($conn, $data["password_confirmation"]);

    // Cek apakah username sudah terdaftar
    $result = mysqli_query($conn, "SELECT username FROM user WHERE username = '$username'");

    if(mysqli_fetch_assoc($result)){
        echo "<script>
                alert('Username sudah terdaftar!');
            </script>";
        return false;
    }

    // Cek kesesuaian password dan konfirmasi password
    if( $password !== $password_confirmation){
        echo "<script>
            alert('konfirmasi password tidak sesuai!');
        </script>";
        return false;
    }

    // Enkripsi password
    $password = password_hash($password, PASSWORD_DEFAULT);
    
    // Masukkan data pengguna ke dalam database
    mysqli_query($conn, "INSERT INTO user VALUES('','$username','$password','$email')");

    return mysqli_affected_rows($conn);
}

// Fungsi untuk melakukan login pengguna
function login($username, $password) {
    global $conn;

    $result = mysqli_query($conn, "SELECT * FROM user WHERE username = '$username'");

    // Cek apakah username ada di database
    if (mysqli_num_rows($result) === 1) {
        $row = mysqli_fetch_assoc($result);

        // Jika password cocok, return true
        if (password_verify($password, $row["password"])) {
            return true;
        }
    }

    // Jika username atau password tidak cocok, return false
    return false;
}

// Fungsi untuk mendapatkan username pengguna yang sedang login
function getLoggedInUsername() {
    if (isset($_SESSION['username'])) {
        return $_SESSION['username'];
    }

    return null;
}

// Mendapatkan username pengguna yang sedang login
$usernameFromDatabase = getLoggedInUsername();

$username = $usernameFromDatabase;

// Fungsi untuk menyapa pengguna berdasarkan waktu
function sapa() {
    global $username;
    date_default_timezone_set('Asia/Jakarta'); // Sesuaikan dengan timezone yang diinginkan
    $waktu = date('H'); // Ambil jam saat ini

    if ($waktu < 10) {
        echo "Selamat pagi, ", $username;
    } elseif ($waktu < 15) {
        echo "Selamat siang, ", $username;
    } elseif ($waktu < 19) {
        echo "Selamat sore, ", $username;
    } else {
        echo "Selamat malam, ",$username;
    }
}

function generateRandomString($length = 10){
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $charactersLength = strlen($characters);
    $randomString= '';
    for($i = 0; $i < $length; $i++) {
        $randomString.=$characters[rand(0   , $charactersLength -1)];
    }
    return $randomString;
}
function user() {
    global $username;

    $username = $_SESSION["username"];
    echo $username;
}