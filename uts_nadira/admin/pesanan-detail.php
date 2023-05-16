<?php
  include "../functions.php";

  $idPesanan = $_GET["idPesanan"];
  $pesanan = query("SELECT pesanan.*, pesanan.deskripsi AS deskripsi_pesanan, produk.*, kategori_produk.nama AS nama_kategori_produk
                    FROM pesanan
                    JOIN produk ON pesanan.produk_id = produk.id
                    JOIN kategori_produk ON produk.kategori_produk_id = kategori_produk.id
                    WHERE pesanan.id = $idPesanan
                  ")[0];  
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Detail Pesanan</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous" />
    <!-- css -->
    <link rel="stylesheet" href="css/informasiPesanan.css" />
    <!-- icon -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.4/font/bootstrap-icons.css" />
  </head>
  <body>
    <!-- Navbar -->
    <?php require 'navbar.php' ?>

    <section id="header-informasi">
      <div class="container">
        <div class="row shadow p-5 justify-content-center">
          <div class="col-4 col-md-1">
            <div><img src="../img/<?= $pesanan['gambar'];?>" alt="<?= $pesanan['nama'];?>" class="rounded-circle img-fluid" /></div>
          </div>
          <div class="col-md-11 text-center">
            <h3>Informasi Pesanan</h3>
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
              <div class="col-6 col-md-6">
                <table class="table table-borderless table-responsive">
                    <p><strong>Pembeli :</strong></p>
                  <tbody>
                    <tr>
                      <td>Tanggal</td>
                      <td>:</td>
                      <td><?= $pesanan['tanggal']; ?></td>
                    </tr>
                    <tr>
                      <td>Nama Pemesan</td>
                      <td>:</td>
                      <td><?= $pesanan['nama_pemesan']; ?></td>
                    </tr>
                    <tr>
                      <td>Alamat Pemesan</td>
                      <td>:</td>
                      <td><?= $pesanan['alamat_pemesan']; ?></td>
                    </tr>
                    <tr>
                      <td>No.Hp</td>
                      <td>:</td>
                      <td><?= $pesanan['no_hp']; ?></td>
                    </tr>
                    <tr>
                      <td>Email</td>
                      <td>:</td>
                      <td><?= $pesanan['email']; ?></td>
                    </tr>
                    <tr>
                      <td>Jumlah Pesanan</td>
                      <td>:</td>
                      <td><?= $pesanan['jumlah_pesanan']; ?></td>
                    </tr>
                    <tr>
                      <td>Deskripsi Pemesan</td>
                      <td>:</td>
                      <td><?= $pesanan['deskripsi_pesanan']; ?></td>
                    </tr>
                  </tbody>
                </table>
                <table class="table table-borderless table-responsive">
                  <p><strong>Produk :</strong></p>
                  <tbody>
                    <tr>
                      <td>Kode Produk</td>
                      <td>:</td>
                      <td><?= $pesanan['kode']; ?></td>
                    </tr>
                    <tr>
                      <td>Nama Produk</td>
                      <td>:</td>
                      <td><?= $pesanan['nama']; ?></td>
                    </tr>
                    <tr>
                      <td>Harga jual Produk</td>
                      <td>:</td>
                      <td>Rp.<?= number_format($pesanan['harga_jual'], 0, ',', '.'); ?></td>
                    </tr>
                    <tr>
                      <td>Harga beli Produk</td>
                      <td>:</td>
                      <td><?= $pesanan['harga_beli']; ?></td>
                    </tr>
                    <tr>
                      <td>Stok</td>
                      <td>:</td>
                      <td><?= $pesanan['stok']; ?></td>
                    </tr>
                    <tr>
                      <td>Minimal Stok</td>
                      <td>:</td>
                      <td><?= $pesanan['min_stok']; ?></td>
                    </tr>
                    <tr>
                      <td>Kategori</td>
                      <td>:</td>
                      <td><?= $pesanan['nama_kategori_produk']; ?></td>
                    </tr>
                    <tr>
                      <td>Deskripsi Produk</td>
                      <td>:</td>
                      <td><?= $pesanan['deskripsi']; ?></td>
                    </tr>
                  </tbody>
                </table>
              </div>
            </div>
            <div>
              <button type="button" class="btn btn-primary" style="--bs-btn-padding-y: 0.25rem; --bs-btn-padding-x: 0.5rem; --bs-btn-font-size: 0.75rem"><a href="pesanan.php">Back</a></button>
            </div>
          </div>
        </div>
      </div>
    </section>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
  </body>
</html>
