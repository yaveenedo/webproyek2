    <body>
        <link rel="stylesheet" href="css/styles.css">

        <div class="container-fluid banner d-flex align-items-center">
            <div class="container text-center text-white">
                <h1>Masakan Resep Online</h1>
                <h3>Mau Cari apa?</h3>
                <div class="col-md-8 offset-md-2">
                    <form method="get" action="produk.php">
                        <div class="input-group input-group-lg my-4">
                            <input type="text" class="form-control" placeholder="Nama Makanan" aria-label="Recipient's username" aria-describedby="basic=addon2" name="keyword">
                            <button type="submit" class="btn warna">Search</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <div class="container-fluid py-5">
            <div id="kategori" class="container text-center">
                <h3>Kategori </h3>
                <div class="row mt-5">
                    <div class="col-md-4 mb-5">
                        <div class="highlighted-kategori kategori-nasi d-flex justify-content-center align-items-center">
                            <h4 class="text-white"><a class="no-decoration" href="produk.php?kategori=nasi">Nasi</a></h4>
                        </div>
                    </div>
                    <div class="col-md-4 mb-5">
                        <div class="highlighted-kategori kategori-sotosup d-flex justify-content-center align-items-center">
                            <h4 class="text-white"><a class="no-decoration" href="produk.php?kategori=sotosup">Soto / Sup</a></h4>
                        </div>
                    </div>
                    <div class="col-md-4 mb-5">
                        <div class="highlighted-kategori kategori-padang d-flex justify-content-center align-items-center">
                            <h4 class="text-white"><a class="no-decoration" href="produk.php?kategori=padang">Padang</a></h4>
                        </div>
                    </div>
                    <div class="col-md-4 mb-2">
                        <div class="highlighted-kategori kategori-betawi d-flex justify-content-center align-items-center">
                            <h4 class="text-white"><a class="no-decoration" href="produk.php?kategori=betawi">Betawi</a></h4>
                        </div>
                    </div>
                    <div class="col-md-4 mb-2">
                        <div class="highlighted-kategori kategori-jawa d-flex justify-content-center align-items-center">
                            <h4 class="text-white"><a class="no-decoration" href="produk.php?kategori=jawa">Jawa</a></h4>
                        </div>
                    </div>
                    <div class="col-md-4 mb-2">
                        <div class="highlighted-kategori kategori-bali d-flex justify-content-center align-items-center">
                            <h4 class="text-white"><a class="no-decoration" href="produk.php?kategori=bali">Bali</a></h4>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="container-fluid py-5">
            <div id="produk" class="container text-center">
                <h3>Produk</h3>
                <div class="row mt-5">
                    <?php while ($data = mysqli_fetch_array($queryProduk)) { ?>
                        <div class="col-sm-6 col-md-4 mb-3">
                            <div class="card h-100">
                                <div class="image-box">
                                    <img src="assets/img/<?php echo $data['foto']; ?>" class="card-img-top" alt="...">
                                </div>
                                <div class="card-body">
                                    <h5 class="card-title"><?php echo $data['nama']; ?></h5>
                                    <p class="card-text text-truncate"><?php echo $data['detail']; ?></p>
                                    <a>Lihat Resep</a>
                                </div>
                            </div>
                        </div>
                    <?php } ?>
                </div>

            </div>
        </div>

        <script src="bootstrap/js/bootstrap.bundle.min.js"></script>
        <script src="fontawesome/fontawesome-free-6.4.2-web/js/all.min.js"></script>
        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js"></script>