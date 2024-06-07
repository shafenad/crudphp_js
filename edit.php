<?php
include("db.php");
$nama = '';
$stok = '';
$description= '';
$asal= '';
$created_at= '';

if  (isset($_GET['id'])) {
  $id = $_GET['id'];
  $query = "SELECT * FROM produk_makanan WHERE id=$id";
  $result = mysqli_query($conn, $query);
  if (mysqli_num_rows($result) == 1) {
    $row = mysqli_fetch_array($result);
    $nama = $row['nama'];
    $stok = $row['stok'];
    $description = $row['description'];
    $asal = $row['asal'];
    $created_at = $row['created_at'];
  }
}

if (isset($_POST['update'])) {
  $id = $_GET['id'];
  $nama= $_POST['nama'];
  $stok= $_POST['stok'];
  $description = $_POST['description'];
  $asal = $_POST['asal'];
  $created_at = $_POST['created_at'];

  $query = "UPDATE produk_makanan set nama = '$nama', stok = '$stok', description = '$description', asal = '$asal', created_at = '$created_at' WHERE id=$id";
  mysqli_query($conn, $query);
  $_SESSION['message'] = 'Task Updated Successfully';
  $_SESSION['message_type'] = 'warning';
  header('Location: index.php');
}

?>

<html>
<head>
    <title>Ubah Data</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
        <div class="container mt-5">
            <div class="row justify-content-center">
                <div class="col-xl-8 col-md-12">
                    <div class="card">
<div class="card-body">
    <form class="form" method="post" action="edit.php?id=<?php echo $_GET['id']; ?>">
        <div class="form-group row mb-2">
            <label class="col-xl-3">Nama Makanan</label>
            <div class="col-xl-6">
                <input name="nama" class="form-control" type="text" value="<?php echo $nama; ?>"/>
            </div>
        </div>
        <div class="form-group row mb-2">
            <label class="col-xl-3">Stok Makanan</label>
            <div class="col-xl-6">
                <input name="stok" class="form-control" type="text" value="<?php echo $stok; ?>"/>
            </div>
        </div>
        <div class="form-group row mb-2">
            <label class="col-xl-3">Deskripsi</label>
            <div class="col-xl-6">
            <textarea name="description" class="form-control" id="floatingTextarea2" style="height: 100px"><?php echo $description;?></textarea>
            </div>
        </div>
        <div class="form-group row mb-2">
            <label class="col-xl-3">Asal Makanan</label>
            <div class="col-xl-6">
                <input name="asal" class="form-control" type="text" value="<?php echo $asal; ?>" />
            </div>
        </div>
        <div class="form-group row mb-2">
            <label class="col-xl-3">Tanggal Upload</label>
            <div class="col-xl-6">
                <input name="created_at" class="form-control" type="datetime-local"  value="<?php echo $created_at; ?>"/>
            </div>
        </div>
        <button name="update" class="btn btn-primary">Update</button>
    </form>
</div>
</div>
                </div>
            </div>
        </div>
    </body>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</html>
