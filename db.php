<?php
session_start();

$conn = mysqli_connect(
  'localhost',
  'root',
  '',
  'produksi_pangan'
) or die(mysqli_error($conn));



$rows = [];
$query = $conn->query('select * from produk_makanan order by created_at desc');

if($query->num_rows > 0) {
    while ($row = $query->fetch_assoc()) {
        $rows[] = [
            'id' => $row['id'],
            'nama' => $row['nama'],
            'stok' => $row['stok'],
            'description' => $row['description'],
            'asal' => $row['asal'],
            'created_at' => $row['created_at'],
        ];
    }
}




?>
