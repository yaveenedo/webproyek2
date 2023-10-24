<?php include "../head.php" ?>
<?php include "navbar-user.php" ?>
<link rel="stylesheet" href="../css/styles.css">

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
                <img src="../assets/img/<?php echo $produk['foto']; ?>" class="w-100" alt="">
            </div>
            <div class="col-md-6 offset-md-1">
                <h1><?php echo $produk['nama']; ?></h1>
                <p class="card-text"><?php echo $produk['detail']; ?></p>
            </div>
        </div>
    </div>
</div>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js"></script>
</body>