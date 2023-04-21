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




?>