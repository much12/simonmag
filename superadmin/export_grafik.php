<?php
session_start();
include '../koneksi.php';
if ($_SESSION['status'] == "") {
    header("location:../index.php?pesan=belum_login");
} else if ($_SESSION['status'] != "admin") {
    header("location:../index.php?pesan=belum_admin");
}
?>

<!doctype html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang=""> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8" lang=""> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9" lang=""> <![endif]-->
<!--[if gt IE 8]><!-->
<html class="no-js" lang=""> <!--<![endif]-->

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Sistem Monitoring Magang</title>
    <meta name="description" content="Sistem Monitoring Magang">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="apple-touch-icon" href="../img/logo.png">
    <link rel="shortcut icon" href="../img/logo.png">
    <link rel="icon" type="image/png" href="../img/logo.png">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/normalize.css@8.0.0/normalize.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/font-awesome@4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/lykmapipo/themify-icons@0.1.2/css/themify-icons.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/pixeden-stroke-7-icon@1.2.3/pe-icon-7-stroke/dist/pe-icon-7-stroke.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/flag-icon-css/3.2.0/css/flag-icon.min.css">
    <link rel="stylesheet" href="../assets/css/cs-skin-elastic.css">
    <link rel="stylesheet" href="../assets/css/style.css">
    <!-- <script type="text/javascript" src="https://cdn.jsdelivr.net/html5shiv/3.7.3/html5shiv.min.js"></script> -->
    <link href="https://cdn.jsdelivr.net/npm/chartist@0.11.0/dist/chartist.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/jqvmap@1.5.1/dist/jqvmap.min.css" rel="stylesheet">

    <link href="https://cdn.jsdelivr.net/npm/weathericons@2.1.0/css/weather-icons.css" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/fullcalendar@3.9.0/dist/fullcalendar.min.css" rel="stylesheet" />
</head>

<body>
    <center>
        <table>
            <tr>
                <td rowspan="3"><img src="../img/pemprov.png" width="150" height="100"></td>
                <td height="5px" style="text-align:center; font-size:20px; font-family:timesnewroman"><b>PEMERINTAH PROVINSI KALIMANTAN SELATAN</b></td>
            </tr>
            <tr>
                <td height="5px" style="text-align:center; font-size:19px; font-family:timesnewroman"><b>DINAS KOMUNIKASI DAN INFORMATIKA</b></td>
            </tr>
            <tr>
                <td height="5px" style="text-align:center; font-size:14px; font-family:timesnewroman">Jalan Dharma Praja II, Kawasan Perkantoran Pemerintah Provinsi Kalimantan Selatan</td>
            </tr>
        </table>
    </center>

    <hr>

    <center>
        <h4>Grafik Laporan Kegiatan Mahasiswa</h4>
    </center>

    <div class="content">
        <!-- Animated -->
        <div class="animated fadeIn">
            <!-- Widgets  -->
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-body">
                            <canvas id="myChart"></canvas>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /Widgets -->
            <div class="clearfix"></div><br><br><br><br><br><br><br><br><br><br><br><br>
        </div>
        <!-- .animated -->
    </div>
</body>
<!-- Scripts -->
<script src="https://cdn.jsdelivr.net/npm/jquery@2.2.4/dist/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.4/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/js/bootstrap.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/jquery-match-height@0.7.2/dist/jquery.matchHeight.min.js"></script>
<script src="../assets/js/main.js"></script>

<!--  Chart js -->
<script src="https://cdn.jsdelivr.net/npm/chart.js@2.7.3/dist/Chart.bundle.min.js"></script>

<!--Chartist Chart-->
<script src="https://cdn.jsdelivr.net/npm/chartist@0.11.0/dist/chartist.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/chartist-plugin-legend@0.6.2/chartist-plugin-legend.min.js"></script>

<script src="https://cdn.jsdelivr.net/npm/jquery.flot@0.8.3/jquery.flot.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/flot-pie@1.0.0/src/jquery.flot.pie.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/flot-spline@0.0.1/js/jquery.flot.spline.min.js"></script>

<script src="https://cdn.jsdelivr.net/npm/simpleweather@3.1.0/jquery.simpleWeather.min.js"></script>
<script src="../assets/js/init/weather-init.js"></script>

<script src="https://cdn.jsdelivr.net/npm/moment@2.22.2/moment.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/fullcalendar@3.9.0/dist/fullcalendar.min.js"></script>
<script src="../assets/js/init/fullcalendar-init.js"></script>

<?php
$nama = array();
$total = array();
$peserta = mysqli_query($koneksi, "select peserta_id, peserta_nama from t_peserta where peserta_status = 1");
while ($row = mysqli_fetch_array($peserta)) {
    // select * from t_laporan where laporan_status = 1 and peserta_id = 1
    $laporan = mysqli_query($koneksi, "select * from t_laporan where laporan_status = 1 and peserta_id = " . $row['peserta_id']);
    $cek = mysqli_num_rows($laporan);

    $nama[] = $row['peserta_nama'];
    $total[] = $cek;
}
?>
<script>
    const ctx = document.getElementById('myChart');

    new Chart(ctx, {
        type: 'bar',
        data: {
            labels: <?= json_encode($nama) ?>,
            datasets: [{
                label: 'Laporan',
                data: <?= json_encode($total) ?>,
                borderWidth: 1
            }]
        },
        options: {
            scales: {
                y: {
                    beginAtZero: true
                }
            }
        }
    });
</script>

<script>
    setTimeout(function() {
        window.print();

        window.onmousemove = function() {
            window.close();
        }
    }, 400);
</script>

</html>