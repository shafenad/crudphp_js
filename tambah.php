

<html>
    <head>
        <title>Tambah Data</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    </head>
    <body>
        <div class="container mt-5">
            <div class="row justify-content-center">
                <div class="col-xl-8 col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="mb-0 d-flex justify-content-between align-items-center">
                                Tambah Data Produk Makanan 
                            </h4>
                        </div>
                        <div class="card-body">
                            <form class="form" method="post" action="simpan.php">
                                <div class="form-group row mb-2">
                                    <label class="col-xl-3">Nama Makanan</label>
                                    <div class="col-xl-6">
                                        <input name="nama" class="form-control" type="text" />
                                    </div>
                                </div>
                                <div class="form-group row mb-2">
                                    <label class="col-xl-3">Stok Makanan</label>
                                    <div class="col-xl-6">
                                        <input name="stok" class="form-control" type="number" />
                                    </div>
                                </div>
                                <div class="form-group row mb-2">
                                    <label class="col-xl-3">Deskripsi</label>
                                    <div class="col-xl-6">
                                    <textarea name="description" class="form-control" id="floatingTextarea2" style="height: 100px"></textarea>
                                    </div>
                                </div>
                                <div class="form-group row mb-2">
                                    <label class="col-xl-3">Asal Makanan</label>
                                    <div class="col-xl-6">
                                        <input name="asal" class="form-control" type="text"  />
                                    </div>
                                </div>
                                <div class="form-group row mb-2">
                                    <label class="col-xl-3">Tanggal Upload</label>
                                    <div class="col-xl-6">
                                        <input name="created_at" class="form-control" type="datetime-local"  />
                                    </div>
                                </div>
                                <button type="submit" name="simpan" class="btn btn-primary">Simpan</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </body>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</html>