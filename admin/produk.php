<?php
session_start();

require "../function.php";
require "admin-function.php";

$queryProduk = mysqli_query($conn, "SELECT a.*, b.nama AS nama_kategori FROM produk a JOIN kategori b ON a.kategori_id=b.id");
$jumlahProduk = mysqli_num_rows($queryProduk);


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Produk</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script defer src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="../proyek2_web/fontawesome/fontawesome-free-6.4.2-web/css/all.css">
    <script src="script.js"></script>
    <link rel="stylesheet" href="../fontawesome/fontawesome-free-6.4.2-web/css/all.css">
    <link href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css" rel="stylesheet" crossorigin="anonymous" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/js/all.min.js" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
    <script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js" crossorigin="anonymous"></script>
    <script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js" crossorigin="anonymous"></script>
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
                <li class="breadcrumb-item active" aria-current="page">
                    Produk
                </li>
            </ol>
        </nav>
</body>

<body>
    <div id="layoutSidenav_content">
        <main>
            <div class="container-fluid">
                <h1 class="mt-4">Kategori</h1>
                <div class="card mb-4">
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                <thead>
                                    <tr>
                                        <th class="text-center">Nama Produk</th>
                                        <th class="text-center">Kategori</th>
                                        <th class="text-center">Foto</th>
                                        <th class="text-center">Detail</th>
                                        <th class="text-center">Action</th>
                                    </tr>
                                </thead>
                                <tbody>

                                    <?php
                                    // $ambildatastok = mysqli_query($conn, "select * from stok UNION select * from barang_masuk");
                                    $ambildataproduk = mysqli_query($conn, "select * from produk");
                                    while ($data = mysqli_fetch_array($queryProduk)) {
                                        $id_produk = $data["id"];
                                        $nama_kategori = $data["nama_kategori"];
                                        $nama_produk = $data["nama"];
                                        $nama_file = $data["foto"];
                                        $detail_produk =$data["detail"];

                                    ?>
                                        <tr>
                                            <td class="text-center"><?= $nama_produk; ?></td>
                                            <td class="text-center"><?= $nama_kategori; ?></td>
                                            <td class="text-center"><?= $nama_file; ?></td>
                                            <td class="text-center"><?= $detail_produk; ?></td>
                                            <td class="text-center">
                                                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#tambah-data-produk<?= $id_produk; ?>">
                                                    Tambah
                                                </button>
                                                <?php if ($id_produk !== null) : ?>
                                                    <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#edit-data-produk<?= $id_produk; ?>">
                                                        Edit
                                                    </button>
                                                    <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#delete-data-produk<?= $id_produk; ?>">
                                                        Delete
                                                    </button>
                                                <?php endif ?>
                                            </td>
                                        </tr>
                                        <!-- The Modal -->
                                        <div class="modal fade" id="tambah-data-produk<?= $id_produk; ?>">
                                            <div class="modal-dialog">
                                                <div class="modal-content">

                                                    <!-- Modal Header -->
                                                    <div class="modal-header">
                                                        <h4 class="modal-title">Tambah Produk</h4>
                                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                    </div>

                                                    <!-- Modal body -->
                                                    <form method="post" enctype="multipart/form-data">
                                                        <div class="modal-body">
                                                            <input type="text" name="nama" placeholder="nama" class="form-control" autocomplete=off required>
                                                            <br />
                                                            <input type="hidden" name="id" value="<?= $id_produk; ?>" />
                                                            <select name="kategori" id="kategori" class="form-control" required>
                                                                <option value="">...</option>
                                                                <?php
                                                                $queryKategori = mysqli_query($conn, "SELECT * FROM kategori");
                                                                while ($data = mysqli_fetch_array($queryKategori)) {


                                                                ?>
                                                                    <option value="<?php echo $data['id']; ?>"><?php echo $data['nama']; ?></option>
                                                                <?php
                                                                }
                                                                ?>
                                                            </select>
                                                            <br />
                                                            <input type="file" name="gambar" id="gambar" class="form-control"></input>
                                                            <br />
                                                            <textarea name="detail" id="detail" cols="30" rows="10" class="form-control"></textarea>
                                                            <button type="submit" class="btn btn-primary" name="addnewproduk">Submit</button>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- The Modal -->
                                        <div class="modal fade" id="edit-data-produk<?= $id_produk; ?>">
                                            <div class="modal-dialog">
                                                <div class="modal-content">

                                                    <!-- Modal Header -->
                                                    <div class="modal-header">
                                                        <h4 class="modal-title">Edit Produk</h4>
                                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                    </div>

                                                    <!-- Modal body -->
                                                    <form method="post" enctype="multipart/form-data">
                                                        <div class="modal-body">
                                                        <input type="text" name="nama" placeholder="nama" class="form-control" autocomplete=off required>
                                                            <br />
                                                            <input type="hidden" name="id" value="<?= $id_produk; ?>" />
                                                            <select name="kategori" id="kategori" class="form-control" required>
                                                                <option value="">...</option>
                                                                <?php
                                                                $queryKategori = mysqli_query($conn, "SELECT * FROM kategori");
                                                                while ($data = mysqli_fetch_array($queryKategori)) {


                                                                ?>
                                                                    <option value="<?php echo $data['id']; ?>"><?php echo $data['nama']; ?></option>
                                                                <?php
                                                                }
                                                                ?>
                                                            </select>
                                                            <br />
                                                            <input type="file" name="gambar" id="gambar" class="form-control"></input>
                                                            <br />
                                                            <textarea name="detail" id="detail" cols="30" rows="10" class="form-control"></textarea>
                                                            <button type="submit" class="btn btn-primary" name="editnewproduk">Submit</button>
                                                        </div>
                                                    </form>

                                                </div>
                                            </div>
                                        </div>
                                        <!-- The Modal -->
                                        <div class="modal fade" id="delete-data-produk<?= $id_produk; ?>">
                                            <div class="modal-dialog">
                                                <div class="modal-content">

                                                    <!-- Modal Header -->
                                                    <div class="modal-header">
                                                        <h4 class="modal-title">Delete Produk?</h4>
                                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                    </div>

                                                    <!-- Modal body -->
                                                    <form method="post" enctype="multipart/form-data">
                                                        <div class="modal-body">
                                                            Apakah anda yakin ingin menghapus data produk <?= $nama_produk; ?>?
                                                            <input type="hidden" name="id" value="<?= $id_produk; ?>" />
                                                            <br />
                                                            <br />
                                                            <button type="submit" class="btn btn-danger" name="hapusproduk">Hapus</button>
                                                        </div>
                                                    </form>

                                                </div>
                                            </div>
                                        </div>
                                    <?php
                                    };

                                    ?>

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </main>
    </div>
</body>

</html>