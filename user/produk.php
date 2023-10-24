<?php include "../head.php" ?>
<?php include "navbar-user.php" ?>
<link rel="stylesheet" href="../css/styles.css">


<?php
$queryKategori = mysqli_query($conn, "SELECT * FROM kategori");

// get produk by nama produk/keyword
if (isset($_GET["keyword"])) {
    $queryProduk = mysqli_query($conn, "SELECT * FROM produk WHERE nama LIKE '%$_GET[keyword]%'");
}
// get produk by kategori
else if (isset($_GET["kategori"])) {
    $queryGetKategoryById = mysqli_query($conn, "SELECT id FROM kategori WHERE nama='$_GET[kategori]'");
    $kategoriId = mysqli_fetch_array($queryGetKategoryById);
    $queryProduk = mysqli_query($conn, "SELECT * FROM produk WHERE kategori_id='$kategoriId[id]'");
}
// get produk default
else {
    $queryProduk = mysqli_query($conn, "SELECT * FROM produk");
}

$countData = mysqli_num_rows($queryProduk);
?>



<body>
    <link rel="stylesheet" href="styles.css">

    <div class="container-fluid banner-produk d-flex align-items-center">
        <div class="container">
            <h1 class="text-white text-center">Produk</h1>
        </div>
    </div>

    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-3 mb-5">
                <h4>Kategori</h4>
                <ul class="list-group list-group-flush">
                    <?php while ($kategori = mysqli_fetch_array($queryKategori)) { ?>
                        <a class="no-decoration" href="produk.php?kategori=<?php echo $kategori['nama']; ?>">
                            <li class="list-group-item"><?php echo $kategori['nama']; ?></li>
                        </a>
                    <?php } ?>
                </ul>
            </div>
            <div class="col-lg-9">
                <div class="row">

                    <?php
                    if ($countData < 1) {
                    ?>
                        <h4 class="text-center my-5">resep tidak ada.</h4>
                    <?php
                    }
                    ?>
                    <?php while ($produk = mysqli_fetch_array($queryProduk)) { ?>
                        <div class="col-md-4 mb-4 mt-2">
                            <div class="card h-100">
                                <div class="image-box">
                                    <img src="../assets/img/<?php echo $produk['foto']; ?>" class="card-img-top" alt="...">
                                </div>
                                <div class="card-body">
                                    <h5 class="card-title"><?php echo $produk['nama']; ?></h5>
                                    <p class="card-text text-truncate"><?php echo $produk['detail']; ?></p>
                                    <a href="detail-produk.php?nama=<?php echo $produk['nama']; ?>" class="btn">Lihat Resep</a>
                                </div>
                            </div>
                        </div>
                    <?php } ?>
                </div>
            </div>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js"></script>
</body>

<?php include "../foot.php" ?>