<?php
session_start(); // Memulai sesi
session_unset(); // Mengosongkan semua variabel sesi
session_destroy(); // Menghancurkan sesi
header("Location: ../index.php"); // Mengarahkan pengguna ke halaman utama setelah logout
exit(); // Memastikan bahwa tidak ada kode ekstra yang dijalankan
?>
