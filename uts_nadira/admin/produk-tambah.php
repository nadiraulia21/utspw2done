<?php
  include "../functions.php";

  $kategori = query("SELECT * FROM `kategori_produk`");

  if(isset($_POST["tambah"])){

    $id = sprintf("%006d", rand(0, 999999));
    $kode = htmlspecialchars($_POST["kode"]);
    $nama = htmlspecialchars($_POST["nama"]);
    $harga_jual = htmlspecialchars($_POST["harga_jual"]);
    $harga_beli = htmlspecialchars($_POST["harga_beli"]);
    $stok = htmlspecialchars($_POST["stok"]);
    $min_stok = htmlspecialchars($_POST["min_stok"]);
    $deskripsi = htmlspecialchars($_POST["deskripsi"]);
    $kategori_produk_id = htmlspecialchars($_POST["kategori_produk_id"]);

    $namaFile = $_FILES['gambar']['name'];
    $ukuranFile = $_FILES['gambar']['size'];
    $error = $_FILES['gambar']['error'];
    $tmpName = $_FILES['gambar']['tmp_name'];

    //  upload gambar
    $ekstensiGambarValid = ['jpg', 'jpeg', 'png'];
    $ekstensiGambar = explode('.', $namaFile);
    $ekstensiGambar = strtolower(end($ekstensiGambar));
    if (!in_array($ekstensiGambar, $ekstensiGambarValid)){
        echo    "<script>
                    alert('yg di upload bukan gambar!');
                </script>";
        return false;
    }

    // lolos pegecekan, gambar siap di upload
    // generate nama gambar baru
    $namaFileBaru = uniqid();
    $namaFileBaru .='.';
    $namaFileBaru .=$ekstensiGambar;
    move_uploaded_file($tmpName, '../img/' . $namaFileBaru);
    $gambar = $namaFileBaru;

    $query =  "INSERT INTO `produk` VALUES ('$id', 
              '$kode',
              '$nama',
              '$harga_jual',
              '$harga_beli',
              '$stok',
              '$min_stok',
              '$deskripsi',
              '$kategori_produk_id',
              '$gambar'
              )";
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
    <title>Tambah Produk</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous" />
    <!-- css -->
    <link rel="stylesheet" href="css/tambahProduk.css" />
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
            <h3>Tambah Produk</h3>
            <p>Tambahkan Produk pada kolom dibawah</p>
          </div>
        </div>
      </div>
    </section>

    <div id="section">
      <div class="container-fluid">
        <div class="row m-4 justify-content-center">
          <div class="col-md-6 mb-3">
            <div class="card">
              <div class="login-box">
                <form action="" method="post" enctype="multipart/form-data">
                  <h4 class="mb-4 text-center">Produk</h4>
                  <div class="user-box">
                    <input type="text" name="kode" required="" />
                    <label class="text-black">Kode Produk</label>
                  </div>
                  <div class="user-box">
                    <input type="text" name="nama" required="" />
                    <label class="text-black">Nama Produk</label>
                  </div>
                  <div class="user-box">
                    <input type="text" name="harga_jual" required="" />
                    <label class="text-black">Harga jual Produk</label>
                  </div>
                  <div class="user-box">
                    <input type="text" name="harga_beli" required="" />
                    <label class="text-black">Harga beli Produk</label>
                  </div>
                  <div class="row">
                    <div class="col-md-4">
                      <div class="user-box">
                        <input type="number" name="stok" min="0" required="" />
                        <label class="text-black">Stok</label>
                      </div>
                    </div>
                    <div class="col-md-4">
                      <div class="user-box">
                        <input type="number" name="min_stok" min="0" required="" />
                        <label class="text-black">Minimal stok</label>
                      </div>
                    </div>
                  </div>
                  <div class="user-box">
                    <input type="text" name="deskripsi" required="" />
                    <label class="text-black">Deskripsi</label>
                  </div>
                  <div class="mb-3">
                    <label for="formFile" class="form-label">Masukkan foto produk</label>
                    <input class="form-control" type="file" name="gambar" id="formFile" required/>
                  </div>
                  <div class="row">
                    <div class="col-md-5">
                      <div>
                        <label for="text-black">Pilih kategori</label>
                        <select class="form-select" name="kategori_produk_id" required>
                          <option hidden>Kategori Produk</option>
                          <?php foreach ($kategori as $index => $k) : ?>
                            <option value="<?= $k['id']; ?>"><?= $k['nama']; ?></option>
                          <?php endforeach; ?>
                        </select>
                      </div>
                    </div>
                  </div>
                  <div class="row text-center my-4">
                    <div class="col-md-12">
                      <div class="login-box">
                        <button type="submit" name="tambah" class="card">
                          Tambah
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
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
  </body>
</html>
