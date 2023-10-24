<?php
session_start();

require "../function.php";

$queryKategori = mysqli_query($conn, "SELECT * FROM kategori");
$jumlahKategori = mysqli_num_rows($queryKategori);

$queryProduk = mysqli_query($conn, "SELECT * FROM produk");
$jumlahProduk = mysqli_num_rows($queryProduk);
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Admin Page</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
  <script defer src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="../proyek2_web/fontawesome/fontawesome-free-6.4.2-web/css/all.css">
  <script src="script.js"></script>
  <link rel="stylesheet" href="../fontawesome/fontawesome-free-6.4.2-web/css/all.css">
  <link rel="stylesheet" href="styleadmin.css">

</head>

<style>
  .kotak {
    border: solid;
  }

  .summary-kategori {
    background-color: green;
    border-radius: 15px;
  }

  .summary-produk {
    background-color: darkblue;
    border-radius: 15px;
  }

  .no-decoration {
    text-decoration: none;
  }
</style>

<nav class="navbar navbar-expand-lg navbar-dark bg-dark sticky-top">
  <div class="container">
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarTogglerDemo02">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item me-4">
          <a class="nav-link" href="index.php">Home</a>
        </li>
        <li class="nav-item me-4">
          <a class="nav-link" href="kategori.php">Kategori</a>
        </li>
        <li class="nav-item me-4">
          <a class="nav-link" href="produk.php">Produk</a>
        </li>
        <li class="nav-item me-4">
          <a class="nav-link" href="../index.php">Logout</a>
        </li>
      </ul>
    </div>
  </div>
</nav>

<body>
  <div class="container mt-5">
    <nav aria-label="breadcrumb">
      <ol class="breadcrumb">
        <li class="breadcrumb-item active" aria-current="page">
          <i class="fas fa-home"></i> Home
        </li>
      </ol>
    </nav>

    <main>
      <div class="container mt-5">
        <div class="row">
          <div class="col-lg-6 col-md-6 col-12 mb-3">
            <div class="summary-kategori p-3">
              <div class="row">
                <div class="col-6">
                  <i class="fas fa-align-justify fa-7x text-black-50"></i>
                </div>
                <div class="col-6 text-white">
                  <p>Kategori</p>
                  <p><?php echo $jumlahKategori; ?> Kategori</p>
                  <p><a href="kategori.php" class="text-white no-decoration">Lihat Detail</a></p>
                </div>
              </div>
            </div>
          </div>
          <div class="col-lg-6 col-md-6 col-12 mb-3">
            <div class="summary-produk p-3">
              <div class="row">
                <div class="col-6">
                  <i class="fas fa-box fa-7x text-black-50"></i>
                </div>
                <div class="col-6 text-white">
                  <p>Kategori</p>
                  <p><?php echo $jumlahProduk; ?> Produk</p>
                  <p><a href="produk.php" class="text-white no-decoration">Lihat Detail</a></p>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </main>

</body>

</html>