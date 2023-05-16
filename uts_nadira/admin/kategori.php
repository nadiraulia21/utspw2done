<?php
  require '../functions.php';

  $kategori = query("SELECT * FROM `kategori_produk` ORDER BY id DESC");

  if(isset($_POST["hapus"])){
    $id = $_POST["id"];
    $result = mysqli_query($conn, "DELETE FROM `kategori_produk` WHERE id=$id");
    if($result){
      header("Location: kategori.php");
      exit;
    }
  }

?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Kategori</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous" />
    <!-- css -->
    <link rel="stylesheet" href="css/kategori.css" />
    <!-- icon -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.4/font/bootstrap-icons.css" />
  </head>
  <body>
    <!-- Navbar -->
    <?php require "navbar.php" ?>

    <!-- kategori -->
    <section id="headerKategori">
      <div class="container-fluid card shadow">
        <div class="row p-3">
          <div class="col-md-12">
            <h3>Kategori</h3>
            <p>Tambah, Edit atau hapus Kategori</p>
          </div>
          <div class="col-md-4">
            <a href="kategori-tambah.php"><button type="button" class="btn btn-primary">Tambah Kategori</button></a>
          </div>
        </div>
      </div>
    </section>

    <!-- alerts -->
    <div id="liveAlertPlaceholder"></div>

    <!-- End Alerts -->

    <section class="kategori">
      <div class="container-fluid card shadow my-3">
        <div class="row">
          <div class="col-md-12 p-4">
            <div class="table-responsive">
              <table class="table table-bordered text-center">
                <thead>
                  <tr>
                    <th class="col-md-0">No</th>
                    <th class="col-md-6">Seri / Kategori</th>
                    <th class="col-md-6">Action</th>
                  </tr>
                </thead>
                <tbody>
                  <?php foreach($kategori as $index => $k) : ?>
                    <tr>
                      <th scope="row"><?= $index+1 ?></th>
                      <td><?= $k["nama"] ?></td>
                      <td>
                        <a href="kategori-edit.php?idKategori=<?= $k['id'] ?>"><span class="badge text-bg-warning">Edit Kategori</span></a>
                        <form action="" method="post" class="d-inline">
                          <input type="hidden" name="id" value="<?= $k['id'] ?>">
                          <button type="submit" name="hapus" class="border-0 bg-transparent" onclick="return confirm('Yakin Ingin Menghapus?')">
                            <a href="#"><span class="badge text-bg-danger">Delete</span></a>
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
