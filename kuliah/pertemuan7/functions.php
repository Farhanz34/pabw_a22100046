<?php 

function koneksi() {
  return mysqli_connect('localhost', 'root', '', 'pabw_farhan');
}

function query($query) {
  $conn = koneksi();

  $result = mysqli_query($conn, $query);

  // Jika mengambil data nya hanya 1 gunakan ini
  if(mysqli_num_rows($result) ==1) {
    return mysqli_fetch_assoc($result);
  }

  // Jika mengambil banyak data gunakan ini
  $rows = [];
  while ($row = mysqli_fetch_assoc($result)) {
    $rows[] = $row;
  }

  return $rows;
}

function tambah($data){

  $conn = koneksi();

  $nama = htmlspecialchars($data['nama']); //htmlspecialchars berfungsi agar semua data yang dikirim user di periksa (untuk menghindari hacking source code)
  $nim = htmlspecialchars($data['nim']);
  $email = htmlspecialchars($data['email']);
  $jurusan = htmlspecialchars($data['jurusan']);
  $gambar = htmlspecialchars($data['gambar']);

  $query = "INSERT INTO mahasiswa VALUES (null, '$nama', '$nim', '$email', '$jurusan', '$gambar');"; // Insert into dipecah / bisa disatukan dengan $koneksi
  mysqli_query($conn, $query);
  echo mysqli_error($conn); // Untuk mengetahui letak kesalahan pada saat menambahkan data
  return mysqli_affected_rows($conn); // Untuk memberitahu data pada database apakah ada baris yang bertambah, hilang, dihapus atau di edit
}


?>