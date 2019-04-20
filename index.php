<?php session_start(); ?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>PINJOLKuh</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/4.0/examples/floating-labels/">

    <!-- Bootstrap core CSS -->
    <link href="asset/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="asset/floating-labels.css" rel="stylesheet">
  </head>

  <body>
    <!-- Menu Navigasi -->
    <nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
      <a class="navbar-brand" href="#">Modulku Fintech</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarCollapse">
        <ul class="navbar-nav mr-auto">
          <li class="nav-item">
            <a class="nav-link" href="index.php">Ajukan Peminjaman</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="show.php">Daftar Pengaju</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="cek-blacklist.php">Cek Daftar Hitam</a>
          </li>
        </ul>
      </div>
    </nav>

    <form class="form-signin" action="proses.php" method="POST">
      <div class="text-center mb-4">
            <img src="https://pressrelease.kontan.co.id/timthumb.php?src=./uploads/release/logo_modalku_bir3.png&w=1024&h=640" alt="" width="256" height="160">
            <p>Pinjam aja jamin cair uangnya bray. Santaayy.</p>
      </div>
    <?php if(isset($_SESSION['status'])) { ?>
        <div class="alert alert-danger" role="alert">
          <strong><?php echo $_SESSION['status'] ?></strong>
        </div>
    <?php 
        session_destroy();
        } 
    ?>

      <div class="form-label-group">
            <input type="email" id="inputEmail" name="inputEmail" class="form-control" placeholder="Alamat Email" required autofocus>
            <label for="inputEmail">Alamat Email</label>
      </div>

      <div class="form-label-group">
            <input type="text" id="inputName" name="inputName" class="form-control" placeholder="Nama Lengkap" required autofocus>
            <label for="inputName">Nama Lengkap</label>
      </div>

      <div class="form-label-group">
            <input type="number" id="inputNIK" name="inputNIK" class="form-control" placeholder="NIK" required autofocus>
            <label for="inputNIK">Nomor NIK</label>
      </div>

      <div class="form-label-group">
            <select class="form-control" id="selectPinjaman" name="selectPinjaman" required>
                <option value="">Pilih Jenis Pinjaman</option>
                <option value="1000000">Paket Ceria Rp. 1jt</option>
                <option value="2500000">Paket Gembira Rp. 2,5jt</option>
                <option value="5000000">Paket Girang Rp. 5jt</option>
                <option value="10000000">Paket Terkedjoet Rp. 10jt</option>
            </select>
        </div>

      <button class="btn btn-lg btn-success btn-block" type="submit">Pinjam Uang</button>
      <p class="mt-5 mb-3 text-muted text-center">&copy; Pinjol Fauzi Wonka Inc</p>
    </form>
  </body>
</html>