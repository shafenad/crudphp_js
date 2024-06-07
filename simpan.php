<?php

include('db.php');


if (isset($_POST['simpan'])) {
  $nama = $_POST['nama'];
  $stok = $_POST['stok'];
  $description = $_POST['description'];
  $asal = $_POST['asal'];
  $created_at = $_POST['created_at'];
  $query = "INSERT INTO produk_makanan(nama, stok, description, asal, created_at) VALUES ('$nama', '$stok', '$description', '$asal', '$created_at')";
  $result = mysqli_query($conn, $query);
  if(!$result) {
    die("Query Failed." . mysqli_error($conn));
  }

  $_SESSION['message'] = 'Task Saved Successfully';
  $_SESSION['message_type'] = 'success';
  header('Location: index.php');
  exit();
}

mysqli_close($conn);

?>

