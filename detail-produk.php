<?php include "head.php" ?>
<?php include "user/navbar-user.php" ?>


<?php
    $nama = htmlspecialchars($_GET['nama']);
    $queryProduk = mysqli_query($conn,"SELECT * FROM produk WHERE nama='$nama'");
    $produk = mysqli_fetch_array($queryProduk);
?>

<body>

<div class="container-fluid py-5">
    <div class="container">
        <div class="row">
            <div class="col-md-5">
                <img src="assets/img/<?php echo $produk['foto']; ?>" class="w-100" alt="">
            </div>
            <div class="col-md-6 offset-md-1">
                <h1><?php echo $produk['nama']; ?></h1>
                <p class="card-text"><?php echo $produk['detail']; ?></p>
            </div>
        </div>
    </div>
</div>
</body>