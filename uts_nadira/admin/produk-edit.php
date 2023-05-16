<?php
include "../functions.php";

$idProduk = $_GET["idProduk"];
$produk = query("SELECT produk.*, kategori_produk.nama AS nama_kategori
                FROM produk
                JOIN kategori_produk ON produk.kategori_produk_id = kategori_produk.id
                WHERE produk.id = $idProduk
                ")[0];
$kategori = query("SELECT * FROM `kategori_produk`");

if(isset($_POST["edit"])){

  $id = $_POST["id"];
  $kode = htmlspecialchars($_POST["kode"]);
  $nama = htmlspecialchars($_POST["nama"]);
  $harga_jual = htmlspecialchars($_POST["harga_jual"]);
  $harga_beli = htmlspecialchars($_POST["harga_beli"]);
  $stok = htmlspecialchars($_POST["stok"]);
  $min_stok = htmlspecialchars($_POST["min_stok"]);
  $deskripsi = htmlspecialchars($_POST["deskripsi"]);
  $kategori_produk_id = htmlspecialchars($_POST["kategori_produk_id"]);
  $gambarLama = htmlspecialchars($_POST["gambarLama"]);

  // cek apakah user pilih gambar baru atau tidak
  if( $_FILES['gambar']['error'] === 4){
    $gambar = $gambarLama;
  }else{
    unlink("../img/$gambarLama");
    $namaFile = $_FILES['gambar']['name'];
    $ukuranFile = $_FILES['gambar']['size'];
    $error = $_FILES['gambar']['error'];
    $tmpName = $_FILES['gambar']['tmp_name'];

    // cek apakah yg di upload adalah gambar
    $ekstensiGambarValid = ['jpg', 'jpeg', 'png'];
    $ekstensiGambar = explode('.', $namaFile);
    $ekstensiGambar = strtolower(end($ekstensiGambar));
    if (!in_array($ekstensiGambar, $ekstensiGambarValid)){
        echo    "<script>
                    alert('yg di upload bukan gambar!');
                </script>";
    }

    // lolos pegecekan, gambar siap di upload
    // generate nama gambar baru
    $namaFileBaru = uniqid();
    $namaFileBaru .='.';
    $namaFileBaru .=$ekstensiGambar;
    move_uploaded_file($tmpName, '../img/' . $namaFileBaru);
    $gambar = $namaFileBaru;
  }

  $query = "UPDATE `produk` SET 
            kode = '$kode',
            nama = '$nama',
            harga_jual = '$harga_jual',
            harga_beli = '$harga_beli',
            stok = '$stok',
            min_stok = '$min_stok',
            deskripsi = '$deskripsi',
            kategori_produk_id = '$kategori_produk_id',
            gambar = '$gambar'
            WHERE id = $id";

  $result = mysqli_query($conn, $query);

  if($result){
    header("Location: produk.php");
    exit;
  }
}

?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Edit Produk</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous" />
    <!-- css -->
    <link rel="stylesheet" href="css/editProduk.css" />
    <!-- icon -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.4/font/bootstrap-icons.css" />
  </head>
  <body>
    <!-- Navbar -->
    <?php require "navbar.php" ?>

    <section id="header-tambahProduk">
      <div class="container-fluid card shadow-lg">
        <div class="row mt-3">
          <div class="col-2">
            <a href="produk.php"
              ><button type="button" class="btn btn-primary"><i class="bi bi-arrow-left-circle"></i></button
            ></a>
          </div>
          <div class="col-12 text-center">
            <h3>Edit Produk</h3>
            <p>Ubah/edit Produk pada colom dibawah</p>
          </div>
        </div>
      </div>
    </section>

    <section id="editProduk">
    <div class="container-fluid">
      <div class="row m-4 justify-content-center">
        <div class="col-md-6 mb-3">
          <div class="card">
            <div class="login-box">
              <form action="" method="post" enctype="multipart/form-data">
                <input type="hidden" name="id" value="<?= $produk['id']; ?>">
                <input type="hidden" name="gambarLama" value="<?= $produk['gambar']; ?>">
                <h4 class="mb-4 text-center">Produk</h4>
                <div class="user-box">
                  <input type="text" name="kode" value="<?= $produk['kode']; ?>" required="" />
                  <label class="text-black">Kode Produk</label>
                </div>
                <div class="user-box">
                  <input type="text" name="nama" value="<?= $produk['nama']; ?>" required="" />
                  <label class="text-black">Nama Produk</label>
                </div>
                <div class="user-box">
                  <input type="text" name="harga_jual" value="<?= $produk['harga_jual']; ?>" required="" />
                  <label class="text-black">Harga jual Produk</label>
                </div>
                <div class="user-box">
                  <input type="text" name="harga_beli" value="<?= $produk['harga_beli']; ?>" required="" />
                  <label class="text-black">Harga beli Produk</label>
                </div>
                <div class="row">
                  <div class="col-md-4">
                    <div class="user-box">
                      <input type="number" name="stok" min="0" value="<?= $produk['stok']; ?>" required="" />
                      <label class="text-black">Stok</label>
                    </div>
                  </div>
                  <div class="col-md-4">
                    <div class="user-box">
                      <input type="number" name="min_stok" min="0" value="<?= $produk['min_stok']; ?>" required="" />
                      <label class="text-black">Minimal stok</label>
                    </div>
                  </div>
                </div>
                <div class="user-box">
                  <input type="text" name="deskripsi" value="<?= $produk['deskripsi']; ?>" required="" />
                  <label class="text-black">Deskripsi</label>
                </div>
                <div class="mb-3">
                  <label for="formFile" class="form-label">Masukkan foto produk</label>
                  <input class="form-control" type="file" name="gambar" id="formFile" />
                </div>
                <div class="row">
                  <div class="col-md-5">
                    <div>
                      <label for="text-black">Pilih kategori</label>
                      <select class="form-select" name="kategori_produk_id" required>
                        <option hidden>Kategori Produk</option>
                        <?php foreach ($kategori as $index => $k) : ?>
                          <option value="<?= $k['id']; ?>" <?php if ($k['id'] == $produk["kategori_produk_id"]): ?> selected <?php endif; ?>>
                          <?= $k['nama']; ?>
                          </option>
                        <?php endforeach; ?>
                      </select>
                    </div>
                  </div>
                </div>
                <div class="row text-center my-4">
                  <div class="col-md-12">
                    <div class="login-box">
                      <button type="submit" name="edit" class="card">
                        Edit Produk
                        <span></span>
                      </button>
                    </div>
                  </div>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
    </section>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
  </body>
</html>
