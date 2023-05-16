<?php
include "../functions.php";

$idProduk = $_GET["idProduk"];
$produk = query("SELECT produk.*, kategori_produk.nama AS nama_kategori
                FROM produk
                JOIN kategori_produk ON produk.kategori_produk_id = kategori_produk.id
                WHERE produk.id = $idProduk
                ")[0];

?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Detail Produk</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous" />
    <!-- css -->
    <link rel="stylesheet" href="css/informasiProduk.css" />
    <!-- icon -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.4/font/bootstrap-icons.css" />
  </head>
  <body>
    <!-- Navbar -->
    <?php require "navbar.php" ?>

    <section id="header-informasi">
      <div class="container">
        <div class="row shadow p-5 justify-content-center">
          <div class="col-4 col-md-1">
            <div><img src="../img/<?= $produk['gambar']?>" alt="produk" class="rounded-circle img-fluid" /></div>
          </div>
          <div class="col-md-11 text-center">
            <h3>Informasi Produk</h3>
          </div>
        </div>
      </div>
    </section>

    <section id="informasi">
      <div class="container">
        <div class="row card shadow p-4 mt-3">
          <div class="col-md-12">
            <h4 class="card-header">Informasi</h4>
            <div class="card-body">
              <div class="col-2 col-md-6">
                <table class="table table-borderless table-responsive">
                  <tbody>
                    <tr>
                      <td>Kode Produk</td>
                      <td>:</td>
                      <td><?= $produk["kode"] ?></td>
                    </tr>
                    <tr>
                      <td>Nama Produk</td>
                      <td>:</td>
                      <td><?= $produk["nama"] ?></td>
                    </tr>
                    <tr>
                      <td>Harga jual Produk</td>
                      <td>:</td>
                      <td>Rp.<?= number_format($produk['harga_jual'], 0, ',', '.'); ?></td>
                    </tr>
                    <tr>
                      <td>Harga beli Produk</td>
                      <td>:</td>
                      <td>Rp.<?= number_format($produk['harga_beli'], 0, ',', '.'); ?></td>
                    </tr>
                    <tr>
                      <td>Stok</td>
                      <td>:</td>
                      <td><?= $produk["stok"] ?></td>
                    </tr>
                    <tr>
                      <td>Minimal Stok</td>
                      <td>:</td>
                      <td><?= $produk["min_stok"] ?></td>
                    </tr>
                    <tr>
                      <td>Kategori</td>
                      <td>:</td>
                      <td><?= $produk["nama_kategori"] ?></td>
                    </tr>
                    <tr>
                      <td>Deskripsi</td>
                      <td>:</td>
                      <td><?= $produk["deskripsi"] ?></td>
                    </tr>
                  </tbody>
                </table>
              </div>
            </div>
            <div>
              <button type="button" class="btn btn-primary" style="--bs-btn-padding-y: 0.25rem; --bs-btn-padding-x: 0.5rem; --bs-btn-font-size: 0.75rem"><a href="produk.php">Back</a></button>
            </div>
          </div>
        </div>
      </div>
    </section>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
  </body>
</html>
