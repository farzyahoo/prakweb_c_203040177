<?php

function koneksi()

{
  return mysqli_connect('localhost', 'root', '', 'prakweb_c_203040177_pw');
}

function query($query)


{
  $conn = koneksi();

  $result = mysqli_query($conn, $query);

  // jika hasilnya hanya 1 data
  if (mysqli_num_rows($result) == 1) {
    return mysqli_fetch_assoc($result);
  }

  $rows = [];
  while ($row = mysqli_fetch_assoc($result)) {
    $rows[] = $row;
  }

  return $rows;
}

function upload()
{
  $nama_file = $_FILES['gambar']['name'];
  $tipe_file = $_FILES['gambar']['type'];
  $ukuran_file = $_FILES['gambar']['size'];
  $error = $_FILES['gambar']['error'];
  $tmp_file = $_FILES['gambar']['tmp_name'];

  // ketika tidak ada gambar yang dipilih
  if ($error == 4) {
    // echo "<script>
    //         alert('pilih gambar terlebih dahulu');

    //         </script>";
    return 'non.png';
  }

  // cek ekstensi file 

  $daftar_gambar = ['jpg', 'jpeg', 'png'];
  $ekstensi_file = explode('.', $nama_file);
  $ekstensi_file = strtolower(end($ekstensi_file));
  if (!in_array($ekstensi_file, $daftar_gambar)) {
    echo "<script>
            alert('yang anda pilih bukan gambar');
            </script>";
    return false;
  }

  // cek tipe file
  if ($tipe_file != 'image/jpeg' && $tipe_file != 'image/png') {
    echo "<script>
      alert('yang anda pilih bukan gambar');
      </script>";
    return false;
  }

  // ukuran file 
  // maksimal 5mb == 5000000
  if ($ukuran_file > 5000000) {
    echo "<script>
    alert('ukuran gambar terlalu besar');
    </script>";
    return false;
  }

  // lolos dan siap upload file
  // generate nama file baru
  $nama_file_baru = uniqid();
  $nama_file_baru .= '.';
  $nama_file_baru .= $ekstensi_file;


  move_uploaded_file($tmp_file, 'img/' . $nama_file_baru);

  return $nama_file_baru;
}


function tambah($data)

{
  $conn = koneksi();

  $judul = htmlspecialchars($data['judul_buku']);
  $pengarang = htmlspecialchars($data['pengarang']);
  $tahun = htmlspecialchars($data['tahun_terbit']);
  $jumlah = htmlspecialchars($data['jumlah_halaman']);
  // $gambar = htmlspecialchars($data['gambar']);
  // upload gambar
  $gambar = upload();
  if (!$gambar) {
    return false;
  }

  $query = "INSERT INTO
              buku
            VALUES
            (null, '$judul', '$pengarang', '$tahun', '$gambar', '$jumlah');
          ";
  mysqli_query($conn, $query) or die(mysqli_error($conn));
  return mysqli_affected_rows($conn);
}

function hapus($id)
{
  $conn = koneksi();

  // menghapus gambar di folder img 
  $b = query("SELECT * FROM buku WHERE id = $id");
  if ($b['gambar'] != 'nons.png') {
    unlink('img/' . $b['gambar']);
  }

  mysqli_query($conn, "DELETE FROM buku WHERE id = $id") or die(mysqli_error($conn));
  return mysqli_affected_rows($conn);
}

function ubah($data)
{
  $conn = koneksi();

  $id = $data['id'];
  $judul = htmlspecialchars($data['judul_buku']);
  $pengarang = htmlspecialchars($data['pengarang']);
  $tahun = htmlspecialchars($data['tahun_terbit']);
  $gambar_lama = htmlspecialchars($data['gambar_lama']);
  $jumlah = htmlspecialchars($data['jumlah_halaman']);

  $gambar = upload();
  if (!$gambar) {
    return false;
  }


  if ($gambar == 'non.png') {
    $gambar = $gambar_lama;
  }



  $query = "UPDATE buku SET
              judul_buku = '$judul',
              pengarang = '$pengarang',
              tahun_terbit = '$tahun',
              gambar = '$gambar',
              jumlah_halaman = '$jumlah'
            WHERE id = $id";
  mysqli_query($conn, $query) or die(mysqli_error($conn));
  return mysqli_affected_rows($conn);
}
function cari($keyword)
{
  $conn = koneksi();

  $query = "SELECT * FROM buku
              WHERE 
            judul_buku LIKE '%$keyword%' OR
            pengarang LIKE '%$keyword%'
          ";

  $result = mysqli_query($conn, $query);

  $rows = [];
  while ($row = mysqli_fetch_assoc($result)) {
    $rows[] = $row;
  }

  return $rows;
}
