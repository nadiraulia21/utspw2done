<?php
  require "../functions.php";
  $idProduk = $_GET["idProduk"];
  $produk = query("SELECT * FROM `produk` WHERE id = $idProduk")[0];

  if(isset($_POST["tambah"])){

    $id = sprintf("%006d", rand(0, 999999));
    $tanggal = date("Y-m-d");
    $nama_pemesan = htmlspecialchars($_POST["nama_pemesan"]);
    $alamat_pemesan = htmlspecialchars($_POST["alamat_pemesan"]);
    $no_hp = htmlspecialchars($_POST["no_hp"]);
    $email = htmlspecialchars($_POST["email"]);
    $jumlah_pesanan = htmlspecialchars($_POST["jumlah_pesanan"]);
    $deskripsi = htmlspecialchars($_POST["deskripsi"]);
    $produk_id = htmlspecialchars($_POST["produk_id"]);

    $query =  "INSERT INTO `pesanan` VALUES ('$id', 
              '$tanggal',
              '$nama_pemesan',
              '$alamat_pemesan',
              '$no_hp',
              '$email',
              '$jumlah_pesanan',
              '$deskripsi',
              '$produk_id'
              )";
    $result = mysqli_query($conn, $query);

    if($result){
      header("Location: index.php");
      exit;
    }
  }

?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Pesan Produk</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous" />
    <!-- css -->
    <link rel="stylesheet" href="css/pemesanan.css" />
    <!-- icon -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.4/font/bootstrap-icons.css" />
  </head>
  <body>
    <!-- Navbar -->
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
                        <a class="nav-link active" aria-current="page" href="etalase.html"><i class="bi bi-house-door"></i> Beranda</a>
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

    <section id="header-pemesanan">
      <div class="container-fluid card shadow-lg">
        <div class="row mt-3">
          <div class="col-2">
            <a href="etalase.php"
              ><button type="button" class="btn btn-primary"><i class="bi bi-arrow-left-circle"></i></button
            ></a>
          </div>
          <div class="col-12 text-center">
            <h3>Tambah Pesanan</h3>
            <p><?= $produk['nama']; ?></p>
          </div>
        </div>
      </div>
    </section>

    <section id="pemesanan">
      <div class="container-fluid">
        <div class="row m-4 justify-content-center">
          <div class="col-md-6 mb-3">
            <div class="card">
              <div class="login-box">
                <form action="" method="post">
                  <input type="hidden" name="produk_id" value="<?= $produk['id'];?>">
                  <h4 class="mb-3 text-center">Pesanan</h4>
                  <div class="text-center">
                    <p style="font-size: 15px;" class="my-0"><?= $produk['nama']; ?></p>
                    <p id="tanggal" class="my-0"></p>
                  </div>
                  <div class="user-box">
                    <input type="text" name="nama_pemesan" required="" />
                    <label class="text-black">Nama</label>
                  </div>
                  <div class="user-box">
                    <input type="text" name="alamat_pemesan" required="" />
                    <label class="text-black">Alamat</label>
                  </div>
                  <div class="user-box">
                    <input type="text" name="no_hp" required="" />
                    <label class="text-black">No.Hp</label>
                  </div>
                  <div class="user-box">
                    <input type="email" name="email" required="" />
                    <label class="text-black">Email</label>
                  </div>
                  <div class="row">
                    <div class="col-md-5">
                      <div>
                        <label for="text-black">Jumlah Pesanan</label>
                        <input type="number" name="jumlah_pesanan" id="" min="1" required>
                      </div>
                    </div>
                  </div>
                  <div class="mb-3 mt-3">
                    <label for="exampleFormControlTextarea1" class="form-label">Deskripsi</label>
                    <textarea class="form-control" name="deskripsi" id="exampleFormControlTextarea1" rows="3" required></textarea>
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
    </section>

    <script>
      // Waktu Sekarang
      var today = new Date();
      var tanggal = today.toLocaleDateString();

      // Menampilkan tanggal pada elemen dengan id 'tanggal'
      document.getElementById("tanggal").innerHTML = "Tanggal: " + tanggal
    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
  </body>
</html>
