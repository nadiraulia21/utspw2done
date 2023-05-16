<?php
  require "../functions.php";

  $produk = query("SELECT produk.*, kategori_produk.nama AS nama_kategori
                  FROM produk
                  JOIN kategori_produk ON produk.kategori_produk_id = kategori_produk.id
                  ORDER BY id DESC
                  ");

  if(isset($_POST["hapus"])){
    $id = $_POST["id"];
    $gambar = query("SELECT gambar FROM produk WHERE id=$id")[0];
    $gambar = $gambar['gambar'];
    unlink("../img/$gambar");
    $result = mysqli_query($conn, "DELETE FROM `produk` WHERE id=$id");
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
    <title>Produk</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous" />
    <!-- css -->
    <link rel="stylesheet" href="css/produk.css" />
    <!-- icon -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.4/font/bootstrap-icons.css" />
  </head>
  <body>
    <!-- Navbar -->
    <?php require "navbar.php" ?>

    <!-- produk -->
    <section id="headerProduk">
      <div class="container-fluid card shadow">
        <div class="row p-3">
          <div class="col-md-12">
            <h3>Produk</h3>
            <p>menambah, mengedit, atau menghapus produk</p>
          </div>
          <div class="col-md-4">
            <a href="produk-tambah.php"><button type="button" class="btn btn-primary">Buat Produk</button></a>
          </div>
        </div>
      </div>
    </section>

    <section class="produk">
      <div class="container-fluid card shadow my-3">
        <div class="row">
          <div class="col-md-12 p-4">
            <div class="table-responsive">
              <table class="table table-bordered text-center">
                <thead>
                  <tr>
                    <th class="col-md-0">No</th>
                    <th class="col-md-4">Kategori</th>
                    <th class="col-md-4">Nama Produk</th>
                    <th class="col-md-4">Action</th>
                  </tr>
                </thead>
                <tbody>
                  <?php foreach($produk as $index => $p) : ?>
                  <tr>
                    <th scope="row"><?= $index + 1; ?></th>
                    <td><?= $p["nama_kategori"]; ?></td>
                    <td><?= $p["nama"]; ?></td>
                    <td>
                      <a href="produk-detail.php?idProduk=<?= $p['id'] ?>"><span class="badge text-bg-info" id="liveAlertBtn">Informasi</span></a>
                      <a href="produk-edit.php?idProduk=<?= $p['id'] ?>"><span class="badge text-bg-warning">Edit Produk</span></a>
                      <form action="" method="post" class="d-inline">
                          <input type="hidden" name="id" value="<?= $p['id'] ?>">
                          <button type="submit" name="hapus" class="border-0 bg-transparent" onclick="return confirm('Yakin Ingin Menghapus?')">
                            <a href="#"><span class="badge text-bg-danger">Hapus</span></a>
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
