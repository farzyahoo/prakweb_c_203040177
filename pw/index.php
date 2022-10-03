<?php
/*
Farriz Brilliant Wichaksana
203040177
Pertemuan 2
*/
?>

<?php

require 'functions.php';


// $row = mysqli_fecth_row($result); array numerik
// $row = mysqli_fecth_assoc($result); array associative
// $row = mysqli_fecth_array($result); array keduanya
// tampung ke variabel mahasiswa
$bk = query("SELECT * FROM buku");

// ketika tombol cari dikembalikan
if (isset($_POST['cari'])) {
  $bk = cari($_POST['keyword']);
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel ="stylesheet" type="text/css" href="style.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <script src="https://unpkg.com/feather-icons"></script>
  <title>Daftar Koleksi Buku</title>
</head>

<body>

  <h3 align="center">DAFTAR KOLEKSI BUKU BUKU</h3>

  <div class="container">
    <form action="" method="POST">
      <div class="row mb-4">
        <div class="col">
          <div class="form-outline">
            <br><br>
            <input type="text" name="keyword" id="form3Example1" class="form-control float-end" placeholder="Cari....."></input><br><br>
            <button type="submit" class="btn btn-primary btn-block" name="cari">Cari
              <i data-feather="search" me-2></i>
            </button>
            <br>
            <a type="button" class="btn btn-primary btn-floating float-end" href="tambah.php">Tambah
              <i data-feather="plus-square" me-2></i>
            </a>
          </div>
        </div>
    </form>
  </div>




  <div class="container">
    <table border="1" cellpadding="10" cellspacing="0" class="table table-hover">

      <tr>
        <th>No</th>
        <th>Gambar</th>
        <th>Judukl Buku</th>
        <th>Pengarang</th>
        <th>Tahun Terbit</th>
        <th>Jumlah Halaman</th>
        <th>Aksi</th>
      </tr>


      <?php if (empty($bk)) : ?>
        <tr>
          <td colspan="4">
            <p style="color: red; font-style: italic;">data buku tidak ditemukan!</p>
          </td>
        </tr>
      <?php endif; ?>

      <?php $i = 1;
      foreach ($bk as $b) : ?>
        <tr>
          <td class="align-middle"><?= $i++; ?></td>
          <td class="align-middle"><img src="img/<?= $b['gambar']; ?>" width="120"></td>
          <td class="align-middle"><?= $b['judul_buku']; ?></td>
          <td class="align-middle"><?= $b['pengarang']; ?></td>
          <td class="align-middle"><?= $b['tahun_terbit']; ?></td>
          <td class="align-middle"><?= $b['jumlah_halaman']; ?></td>

          <td class="align-middle">
            <a type="button" class="btn btn-primary btn-floating" href="ubah.php?id=<?= $b['id']; ?>">Ubah
              <i data-feather="edit" me-2></i>
            </a>

            <a type="button" class="btn btn-danger btn-floating" href="hapus.php?id=<?= $b['id']; ?>">Hapus
              <i data-feather="trash" me-2></i>
            </a>


          </td>
        </tr>
      <?php endforeach; ?>
    </table>
  </div>

  <script>
    feather.replace()
  </script>
</body>

</html>