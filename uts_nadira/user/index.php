<?php
  require "../functions.php";

  $kategori = query("SELECT * FROM `kategori_produk`");
  $produk = query("SELECT * FROM `produk`");
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Menu DapurZahwa</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous" />
    <!-- css -->
    <link rel="stylesheet" href="css/etalase.css" />
    <!-- icon -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.4/font/bootstrap-icons.css" />
  </head>
  <body>
    <section id="navbar">
      <div class="container-fluid mb-5">
        <nav class="navbar fixed-top">
          <div class="container-fluid">
            <button class="navbar-toggler navbar-dark" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar" aria-controls="offcanvasNavbar">
              <span class="navbar-toggler-icon"></span>
            </button>
            <div class="offcanvas offcanvas-start" tabindex="-1" id="offcanvasNavbar" aria-labelledby="offcanvasNavbarLabel" data-bs-display="push">
              <div class="offcanvas-header">
                <h5 class="offcanvas-title" id="offcanvasNavbarLabel">User</h5>
                <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
              </div>
              <div class="offcanvas-body">
                <ul class="navbar-nav justify-content-end flex-grow-1 pe-3">
                  <div class="card">
                    <div class="container">
                      <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="index.php"><i class="bi bi-house-door"></i> Beranda</a>
                      </li>
                    </div>
                  </div>
                </ul>
              </div>
            </div>
            <div class="btn-group">
              <button type="button" class="btn dropdown-toggle d-flex align-items-center" data-bs-toggle="dropdown" data-bs-display="static" aria-expanded="false">
                <div class="bg-primary rounded-circle me-2 d-flex align-items-center justify-content-center icn-akun text-white fw-semibold">U</div>
              </button>
              <ul class="dropdown-menu dropdown-menu-end">
                <li>
                  <button class="dropdown-item logout" type="button">User</button>
                </li>
                <li>
                  <a href="../index.php" class="dropdown-item logout" type="button">Home</a>
                </li>
              </ul>
            </div>
          </div>
        </nav>
      </div>
    </section>

    <!-- Kategor -->
    <?php foreach ($kategori as $key => $k) : ?>
      <section id="headerEtalase">
        <div class="container-fluid card shadow">
          <div class="row p-3">
            <div class="col-md-12 text-center">
              <h3>Menu <?= $k['nama']; ?></h3>
            </div>
          </div>
        </div>
      </section>
      <!-- Produk Kategori -->
      <section id="redmi">
        <div class="xiaomi container-fluid my-4 text-center">
          <div class="row">
            <?php foreach($produk as $p): ?>
              <?php if($p["kategori_produk_id"] == $k['id']) :?>
            <div class="col-4 col-sm-2 px-3 pb-3">
              <img src="../img/<?= $p['gambar'];?>" alt="<?= $p['nama'];?>" class="img-fluid img-thumbnail rounded-4" data-bs-toggle="modal" data-bs-target="#detailProduk<?=$p['id'];?>" style="cursor: pointer;"/>
              <p class="fw-medium mb-1"><?= $p['nama'] ?></p>
              <p class="fw-bold">Rp.<?= number_format($p['harga_jual'], 0, ',', '.'); ?></p>
            </div>
            <!-- Detail -->
            <div class="modal fade" id="detailProduk<?=$p['id'];?>" tabindex="-1" aria-labelledby="detailProduk<?=$p['id'];?>Label" aria-hidden="true">
              <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                  <div class="modal-header">
                    <h1 class="modal-title fs-5" id="detailProduk<?=$p['id'];?>Label">Seri <?= $k['nama']; ?></h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                  </div>
                  <div class="modal-body text-start">
                    <div class="row">
                      <div class="col-md-6">
                        <img src="../img/<?= $p['gambar'];?>" alt="<?= $p['nama'];?>" class="img-fluid" />
                      </div>
                      <div class="col-md-6">
                        <h4><?= $p['nama'] ?></h4>
                        <p></p>
                        <strong>Rp.<?= number_format($p['harga_jual'], 0, ',', '.'); ?></strong>
                        <p>Stok <?= $p['stok'] ?></p>
                        <p></p>
                        <p class="pe-5"><?= $p['deskripsi'] ?></p>
                      </div>
                    </div>
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <a href="pemesanan.php?idProduk=<?=$p['id'];?>"><button type="button" class="btn btn-primary">Pesan Sekarang</button></a>
                  </div>
                </div>
              </div>
            </div>
              <?php endif; ?>
            <?php endforeach; ?>
          </div>
        </div>
      </section>
    <?php endforeach; ?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
  </body>
</html>
