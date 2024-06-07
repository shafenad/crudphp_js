<?php
include("db.php");
?>


<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Produksi Pangan Provinsi</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://code.highcharts.com/highcharts.js"></script>
</head>
  <body>
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-xl-8 col-md-12 mb-5">
                <div class="card">
                    <div class="card-header">
                        <h4 class="mb-0 d-flex justify-content-between align-items-center">
                            Produksi Pangan Provinsi
                            <a href="tambah.php" class="btn btn-primary">Tambah</a>
                        </h4>
                    </div>
                    <div class="card-body">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama Makanan</th>
                                    <th>Stok</th>
                                    <th>Deskripsi</th>
                                    <th>Asal Makanan</th>
                                    <th>Tanggal Upload</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $counter = 0; ?>
                                <?php foreach($rows as $row): ?>
                                    <?php $counter++; ?> 
                                    <tr>
                                        <td><?= $counter ?></td>
                                        <td><?= $row['nama'] ?></td>
                                        <td><?= $row['stok'] ?></td>
                                        <td><?= $row['description'] ?></td>
                                        <td><?= $row['asal'] ?></td>
                                        <td><?= $row['created_at'] ?></td>
                                        <td>
                                            <a href="edit.php?id=<?php echo $row['id']?>" class="btn btn-secondary">Edit</a>
                                            <a href="delete.php?id=<?php echo $row['id']?>"class="btn btn-danger">Hapus</a>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="col-xl-8 col-md-12 mb-5">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Diagram</h4>
                    </div>
                    <div class="card-body">
                        <div id="chart-container" style="height: 400px;"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div id="chart-container" style="height: 400px;"></div>

    <script>
    var mydata = <?= json_encode($rows) ?>;
    
    // Transform data to group by month/year and sum up stock for each name and origin
    var groupedData = {};
    mydata.forEach((item) => {
        var monthYear = item.created_at.slice(0, 7); // Get month/year
        if (!groupedData[monthYear]) {
            groupedData[monthYear] = {};
        }
        if (!groupedData[monthYear][item.nama]) {
            groupedData[monthYear][item.nama] = {};
        }
        if (!groupedData[monthYear][item.nama][item.asal]) {
            groupedData[monthYear][item.nama][item.asal] = 0;
        }
        groupedData[monthYear][item.nama][item.asal] += parseInt(item.stok); // Sum up stock
    });

    // Prepare data for chart
    var chartData = [];
    for (var monthYear in groupedData) {
        var seriesData = [];
        for (var name in groupedData[monthYear]) {
            for (var origin in groupedData[monthYear][name]) {
                seriesData.push({
                    name: name + ' (' + origin + ')',
                    y: groupedData[monthYear][name][origin]
                });
            }
        }
        chartData.push({
            name: monthYear,
            data: seriesData
        });
    }
    
    Highcharts.chart('chart-container', {
        chart: {
            type: 'area'
        },
        title: {
            text: 'Produksi Pangan Provinsi'
        },
        xAxis: {
            type: 'category',
            title: {
                text: 'Bulan/Tahun'
            }
        },
        yAxis: {
            title: {
                text: 'Stok'
            }
        },
        plotOptions: {
            area: {
                stacking: 'normal'
            }
        },
        series: chartData
    });
</script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

  </body>
  
</html>