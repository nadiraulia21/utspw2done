<?php
  require "../functions.php";

  $pesanan = query("SELECT pesanan.*, pesanan.id AS id_pesanan ,produk.*, kategori_produk.nama AS nama_kategori_produk
                    FROM pesanan
                    JOIN produk ON pesanan.produk_id = produk.id
                    JOIN kategori_produk ON produk.kategori_produk_id = kategori_produk.id
                    ORDER BY pesanan.tanggal DESC;
                  ");

  // var_dump($pesanan);

  if(isset($_POST["hapus"])){
    $id = $_POST["id"];
    $result = mysqli_query($conn, "DELETE FROM `pesanan` WHERE id=$id");
    if($result){
      header("Location: pesanan.php");
      exit;
    }
  }

?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Pesanan</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous" />
    <!-- css -->
    <link rel="stylesheet" href="css/pesanan.css" />
    <!-- icon -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.4/font/bootstrap-icons.css" />
  </head>
  <body>
    <?php require 'navbar.php' ?>
    
    <!-- produk -->
    <section id="headerPesanan">
      <div class="container-fluid card shadow">
        <div class="row p-3">
          <div class="col-md-12">
            <h3>Pesanan</h3>
            <p>Informasi Pesanan Pembelian Produk</p>
          </div>
        </div>
      </div>
    </section>

    <!-- alerts -->
    <div id="liveAlertPlaceholder"></div>

    <!-- End Alerts -->

    <section class="produk">
      <div class="container-fluid card shadow my-3">
        <div class="row">
          <div class="col-md-12 p-4">
            <div class="table-responsive">
              <table class="table table-bordered text-center">
                <thead>
                  <tr>
                    <th class="col-md-0">No</th>
                    <th class="col-md-4">Tanggal</th>
                    <th class="col-md-4">Nama</th>
                    <th class="col-md-4">Produk</th>
                    <th class="col-md-4">Action</th>
                  </tr>
                </thead>
                <tbody>
                  <?php foreach ($pesanan as $index => $p): ?>
                    <tr>
                      <th scope="row"><?= $index+1; ?></th>
                      <td><?= $p['tanggal']; ?></td>
                      <td><?= $p['nama_pemesan']; ?></td>
                      <td><?= $p['nama']; ?></td>
                      <td class="d-flex">
                        <a href="pesanan-detail.php?idPesanan=<?=$p['id_pesanan'];?>" class="me-1"><span class="badge text-bg-info">Informasi</span></a>
                        <form action="" method="post" class="d-inline">
                          <input type="hidden" name="id" value="<?= $p['id_pesanan'] ?>">
                          <button type="submit" name="hapus" class="border-0 bg-transparent" onclick="return confirm('Yakin Ingin Menghapus?')">
                            <span class="badge text-bg-danger">Delete</span>
                          </button>
                        </form>
                      </td>
                    </tr>
                  <?php endforeach; ?>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </section>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
  </body>
</html>
