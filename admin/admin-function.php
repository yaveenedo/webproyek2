<?php
// Untuk mengakses database phpmyadmin
$conn = mysqli_connect("localhost", "root", "", "recipe");

if (isset($_POST["addnewkategori"])) {
  $id_kategori = $_POST["id"];
  $nama_kategori = $_POST["nama"];

  // Tambahkan item masuk baru ke dalam tabel barang_masuk
  $addtotablekategori = mysqli_query($conn, "INSERT INTO kategori (nama) VALUES ('$nama_kategori')");

  // Jika penambahan berhasil, arahkan ke halaman index.php
  // Jika penambahan gagal, tampilkan pesan "GAGAL"
  if ($addtotablekategori) {
    header("location:kategori.php");
  } else {
    echo "GAGAL: " . mysqli_error($conn);
  }
}


// Logika untuk mengedit item masuk dalam inventaris
if (isset($_POST["editkategori"])) {
  $id_kategori = $_POST["id"];
  $nama_kategori = $_POST["nama"];

  // Edit item masuk dalam tabel barang_masuk berdasarkan ID barang masuk
  $edittotablekategori = mysqli_query($conn, "update kategori set nama='$nama_kategori' where id='$id_kategori'");
  header("location:kategori.php");
  // Jika update berhasil, arahkan ke halaman barang-masuk.php
  // Jika update gagal, tampilkan pesan "Gagal" dan arahkan ke halaman barang-masuk.php
  if (!$edittotablekategori) {
    echo "GAGAL";
  }
};

// Logika untuk menghapus item barang dari inventaris
if (isset($_POST['hapuskategori'])) {
  $id_kategori = $_POST['id'];

  // Hapus item barang dari tabel stok berdasarkan ID barang
  $hapus = mysqli_query($conn, "delete from kategori where id='$id_kategori'");
  // Jika penghapusan berhasil, arahkan ke halaman delete-barang.php
  // Jika penghapusan gagal, tampilkan pesan "Gagal" dan arahkan ke halaman delete-barang.php
  if ($hapus) {
    header("location:kategori.php");
  } else {
    echo "Gagal";
    header("location:kategori.php");
  }
};

if (isset($_POST["addnewproduk"])) {
  $kategori = $_POST["kategori"];
  $nama_produk = $_POST["nama"];
  $id_produk = $_POST["id"];
  $detail_produk = $_POST["detail"];
  $target_dir = "../assets/img/";
  $nama_file = basename($_FILES["gambar"]["name"]);
  $target_file = $target_dir . $nama_file;
  $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
  $image_size = $_FILES["gambar"]["size"];
  $random_name = generateRandomString(20);
  $new_name = $random_name . "." . $imageFileType;

  if ($nama_file != '') {
    if ($image_size > 500000) {
?>
      <div class="alert alert-warning mt-3" role="alert">
        File tidak boleh lebih dari 500 kb
      </div>
      <?php
    } else {
      if ($imageFileType != 'jpg' && $imageFileType != 'png' && $imageFileType != "gif" && $imageFileType != "jpeg") {
      ?>
        <div class="alert alert-warning mt-3" role="alert">
          File harus bertipe jpeg atau jpg atau png atau gif.
        </div>
      <?php
      } else {
        move_uploaded_file($_FILES["gambar"]["tmp_name"], $target_dir . $new_name);
      }
    }
  }
  // query insert to produk table
  $addtotableproduk = mysqli_query($conn, "INSERT INTO produk (nama,  kategori_id, foto, detail) VALUES ('$nama_produk', '$kategori','$new_name','$detail_produk')");
  // Jika penambahan berhasil, arahkan ke halaman index.php
  // Jika penambahan gagal, tampilkan pesan "GAGAL"
  if ($addtotableproduk) {
    header("location:produk.php");
  } else {
    echo "GAGAL: " . mysqli_error($conn);
  }
}




if (isset($_POST["editnewproduk"])) {
  $kategori = $_POST["kategori"];
  $nama_produk = $_POST["nama"];
  $id_produk = $_POST["id"];
  $detail_produk = $_POST["detail"];
  $target_dir = "../assets/img/";
  $nama_file = basename($_FILES["gambar"]["name"]);
  $target_file = $target_dir . $nama_file;
  $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
  $image_size = $_FILES["gambar"]["size"];
  $random_name = generateRandomString(20);
  $new_name = $random_name . "." . $imageFileType;

  if ($nama_file != '') {
    if ($image_size > 500000) {
      ?>
      <div class="alert alert-warning mt-3" role="alert">
        File tidak boleh lebih dari 500 kb
      </div>
      <?php
    } else {
      if ($imageFileType != 'jpg' && $imageFileType != 'png' && $imageFileType != "gif" && $imageFileType != "jpeg") {
      ?>
        <div class="alert alert-warning mt-3" role="alert">
          File harus bertipe jpeg atau jpg atau png atau gif.
        </div>
      <?php
      } else {
        move_uploaded_file($_FILES["gambar"]["tmp_name"], $target_dir . $new_name);
      }
    }
  }
  // query insert to produk table
  $edittableproduk = mysqli_query($conn, "UPDATE produk set kategori_id='$kategori', nama='$nama_produk', detail='$detail_produk' WHERE id=$id_produk ");
  // Jika penambahan berhasil, arahkan ke halaman index.php
  // Jika penambahan gagal, tampilkan pesan "GAGAL"
  if ($nama_file != '') {
    if ($image_size > 500000) {
      ?>
      <div class="alert alert-warning mt-3" role="alert">
        File tidak boleh lebih dari 500 kb
      </div>
      <?php
    } else {
      if ($imageFileType != 'jpg' && $imageFileType != 'png' && $imageFileType != "gif" && $imageFileType != "jpeg") {
      ?>
        <div class="alert alert-warning mt-3" role="alert">
          File harus bertipe jpeg atau jpg atau png atau gif.
        </div>
<?php
      }else{
        move_uploaded_file($_FILES["gambar"]["tmp_name"], $target_dir . $new_name);
        
        $edittableproduk = mysqli_query($conn, "UPDATE produk SET foto='$new_name' WHERE id='$id_produk'");
      }
    }
  }
}

// Logika untuk menghapus item barang dari inventaris
if (isset($_POST['hapusproduk'])) {
  $id_produk = $_POST["id"];
  // Hapus item barang dari tabel stok berdasarkan ID barang
  $hapus = mysqli_query($conn, "DELETE FROM produk WHERE id='$id_produk'");
  // Jika penghapusan berhasil, arahkan ke halaman delete-barang.php
  // Jika penghapusan gagal, tampilkan pesan "Gagal" dan arahkan ke halaman delete-barang.php
  if ($hapus) {
    header("location:produk.php");
  } else {
    echo "Gagal";
    header("location:produk.php");
  }
};

?>