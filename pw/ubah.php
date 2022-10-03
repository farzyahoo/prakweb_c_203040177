<?php

require 'functions.php';

// jika tidak ada id di url
if (!isset($_GET['id'])) {
  header("Location: index.php");
  exit;
}

// ambil id dari url
$id = $_GET['id'];

// query mahasiswa berdasarkan id
$m = query("SELECT * FROM buku WHERE id = $id");

// cek apakah tombol ubah sudah ditekan
if (isset($_POST['ubah'])) {
  if (ubah($_POST) > 0) {
    echo "<script>
            alert('data berhasil diubah');
            document.location.href = 'index.php';
         </script>";
  } else {
    echo "data gagal diubah!";
  }
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <title>Ubah Data Buku</title>
</head>

<body>
  <h3 align="center">Form Ubah Data Buku</h3>
  <br>
  <form action="" method="POST" enctype="multipart/form-data">
    <input type="hidden" name="id" value="<?= $m['id']; ?>">


    <div class="container">
      <div class="form-row">
        <div class="col">
          <input type="text" name="judul_buku" class="form-control" placeholder="Judul Buku" autofocus required value="<?= $m['judul_buku']; ?>">
        </div>
        <br>
        <div class="col">
          <input type="text" name="pengarang" class="form-control" placeholder="Pengarang" required value="<?= $m['pengarang']; ?>">
        </div>
        <br>
        <div class="col">
          <input type="text" name="tahun_terbit" class="form-control" placeholder="Tahun Terbit" required value="<?= $m['tahun_terbit']; ?>">
        </div>
        <br>
        <div class="col">
          <input type="text" name="jumlah_halaman" class="form-control" placeholder="Jumlah Halaman" required required value="<?= $m['jumlah_halaman']; ?>">
        </div>
        <br>
      </div>

      <div class="card" style="width:12rem;">
        <input type="hidden" name="gambar_lama" value="<?= $m['gambar']; ?>">
        <img src="img/<?= $m['gambar']; ?>" style="display: block;" class="img-preview" class="card-img" alt="...">
        <div class="card-body">
          <input type="file" name="gambar" class="gambar" onchange="previewImage()">
        </div>
      </div>
      <div class="d-flex flex-row-reverse">
        <input class="btn btn-dark float-right" type="submit" value="Ubah" name="ubah">
      </div>

  </form>

  <script src="script.js"></script>

</body>

</html>