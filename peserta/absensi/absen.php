<?php
include '../../koneksi.php';
session_start();
// show all error reporting
error_reporting(E_ALL);
ini_set('display_errors', 1);
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

    <link rel="apple-touch-icon" href="../../img/logo.png">
    <link rel="shortcut icon" href="../../img/logo.png">
    <link rel="icon" type="image/png" href="../../img/logo.png">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/normalize.css@8.0.0/normalize.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/font-awesome@4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/lykmapipo/themify-icons@0.1.2/css/themify-icons.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/pixeden-stroke-7-icon@1.2.3/pe-icon-7-stroke/dist/pe-icon-7-stroke.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/flag-icon-css/3.2.0/css/flag-icon.min.css">
    <link rel="stylesheet" href="../../assets/css/cs-skin-elastic.css">
    <link rel="stylesheet" href="../../assets/css/lib/datatable/dataTables.bootstrap.min.css">
    <link rel="stylesheet" href="../../assets/css/style.css">

    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,600,700,800' rel='stylesheet' type='text/css'>

    <!-- <script type="text/javascript" src="https://cdn.jsdelivr.net/html5shiv/3.7.3/html5shiv.min.js"></script> -->

</head>

<body>
    <?php
    $username = $_SESSION['username'];

    $get = mysqli_query($koneksi, "select * from t_peserta where peserta_nim='$username'");
    $data = mysqli_fetch_array($get);

    // if data found
    if (mysqli_num_rows($get) > 0) {
        // check t_absensi
        $date = date('Y-m-d H:i:s');
        $currdate = date('Y-m-d');
        $get_absensi = mysqli_query($koneksi, "select * from t_absensi where peserta_id='$username' and DATE(tanggal_absensi)='$currdate'");
        $data_absensi = mysqli_fetch_array($get_absensi);

        // if data found
        if (mysqli_num_rows($get_absensi) > 0) {
            // check status
            echo '<div class="alert alert-danger" role="alert">
                <strong>Gagal!</strong> Anda sudah absen.
            </div>

            <br>

            <div class="row justify-content-center">
                <div class="spinner-border" role="status">
                    <div class="spinner-border" role="status" style="margin:18% auto; width: 5rem;height: 5rem"></div>
                </div>
            </div>';

            echo '
            <meta http-equiv="refresh" content="1;url=../absensi/">';
        } else {
            // insert data
            $insert = mysqli_query($koneksi, "insert into t_absensi values(null, '$username', '$date')");
            if ($insert) {
                echo '<div class="alert alert-success" role="alert">
                    <strong>Sukses!</strong> Absensi berhasil.
                </div>';

                echo '
                <meta http-equiv="refresh" content="1;url=../absensi/">';
            } else {
                echo '<div class="alert alert-danger" role="alert">
                    <strong>Gagal!</strong> Absensi gagal.
                </div>';

                echo '
                <meta http-equiv="refresh" content="1;url=../absensi/">';
            }
        }
    } else {
        echo '<div class="alert alert-danger" role="alert">
        <strong>Gagal!</strong> Data tidak ditemukan.
    </div>

    <br>

    <div class="row justify-content-center">
        <div class="spinner-border" role="status">
            <div class="spinner-border" role="status" style="margin:18% auto; width: 5rem;height: 5rem"></div>
        </div>
    </div>';

        echo '
    <meta http-equiv="refresh" content="1;url=../absensi/">';
    } ?>

    <!-- Scripts -->
    <script src="https://cdn.jsdelivr.net/npm/jquery@2.2.4/dist/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.4/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/js/bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/jquery-match-height@0.7.2/dist/jquery.matchHeight.min.js"></script>
    <script src="../../assets/js/main.js"></script>


    <script src="../../assets/js/lib/data-table/datatables.min.js"></script>
    <script src="../../assets/js/lib/data-table/dataTables.bootstrap.min.js"></script>
    <script src="../../assets/js/lib/data-table/dataTables.buttons.min.js"></script>
    <script src="../../assets/js/lib/data-table/buttons.bootstrap.min.js"></script>
    <script src="../../assets/js/lib/data-table/jszip.min.js"></script>
    <script src="../../assets/js/lib/data-table/vfs_fonts.js"></script>
    <script src="../../assets/js/lib/data-table/buttons.html5.min.js"></script>
    <script src="../../assets/js/lib/data-table/buttons.print.min.js"></script>
    <script src="../../assets/js/lib/data-table/buttons.colVis.min.js"></script>
    <script src="../../assets/js/init/datatables-init.js"></script>
</body>

</html>