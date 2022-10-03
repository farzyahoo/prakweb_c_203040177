<?php
require 'functions.php';

// cek apakah tomboh tambah sudah ditekan 
if (isset($_POST['tambah'])) {
  if (tambah($_POST) > 0) {
    echo "<script>
            alert('data berhasil ditambahkan');
            document.location.href = 'index.php';
         </script>";
  } else {
    echo "data gagal ditambahkan!";
  }
}




?>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

  <title>Tambah Buku</title>
</head>

<body>

  <h3 align="center">Form Tambah Data Buku</h3>
  <br>


  <form action="" method="POST" enctype="multipart/form-data">

    <div class="container">
      <div class="form-row">
        <div class="col">
          <input type="text" name="judul_buku" class="form-control" placeholder="Judul Buku" autofocus required>
        </div>
        <br>
        <div class="col">
          <input type="text" name="pengarang" class="form-control" placeholder="Pengarang" required>
        </div>
        <br>
        <div class="col">
          <input type="text" name="tahun_terbit" class="form-control" placeholder="Tahun Terbit" required>
        </div>
        <br>
        <div class="col">
          <input type="text" name="jumlah_halaman" class="form-control" placeholder="Jumlah Halaman" required>
        </div>
        <br>
      </div>

      <div class="card" style="width:12rem;">
        <img src="img/non.png" style="display: block;" class="img-preview" class="card-img" alt="...">
        <div class="card-body">
          <input type="file" name="gambar" class="gambar" onchange="previewImage()">
        </div>
      </div>

      <div class="d-flex flex-row-reverse">
        <input class="btn btn-dark float-right" type="submit" value="Tambah" name="tambah">
      </div>


    </div>
    </div>
    </div>
  </form>





  <script src="script.js"></script>

</body>

</html>