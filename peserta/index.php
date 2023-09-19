<?php
session_start();
include '../koneksi.php';
if ($_SESSION['status'] == "") {
    header("location:../index.php?pesan=belum_login");
} else if ($_SESSION['status'] != "peserta") {
    header("location:../index.php?pesan=belum_login");
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
    <!-- Left Panel -->
    <aside id="left-panel" class="left-panel">
        <nav class="navbar navbar-expand-sm navbar-default">
            <div id="main-menu" class="main-menu collapse navbar-collapse">
                <ul class="nav navbar-nav">
                    <li class="active">
                        <a href="index.php"><i class="menu-icon fa fa-laptop"></i>Dashboard </a>
                    </li>
                    <li class="menu-title">Monitoring</li><!-- /.menu-title -->
                    <li class="menu-item-has-children dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-table"></i>Monitoring</a>
                        <ul class="sub-menu children dropdown-menu">
                            <li><i class="fa fa-table"></i><a href="absensi/">Absensi</a></li>
                            <li><i class="fa fa-table"></i><a href="./kegiatan/">Kegiatan</a></li>
                            <li><i class="fa fa-table"></i><a href="mon_laporan/">Laporan</a></li>
                        </ul>
                    </li>
                    <li class="menu-title">Rekap</li><!-- /.menu-title -->
                    <li class="menu-item-has-children dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-th"></i>Rekap</a>
                        <ul class="sub-menu children dropdown-menu">
                            <li><i class="menu-icon fa fa-folder-open-o"></i><a href="rekap/">&nbsp;Laporan Disetujui</a></li>
                            <li><i class="menu-icon fa fa-folder-open-o"></i><a href="rekap/index2.php">&nbsp;Laporan Ditolak</a></li>
                        </ul>
                    </li>
                </ul>
            </div><!-- /.navbar-collapse -->
        </nav>
    </aside>
    <!-- /#left-panel -->
    <!-- Right Panel -->
    <div id="right-panel" class="right-panel bg-dark">
        <!-- Header-->
        <header id="header" class="header">
            <div class="top-left">
                <div class="navbar-header">
                    <a class="navbar-brand" href="index.php">
                        <img src="../img/pemprov.png" alt="" width="50">
                        Monitoring Magang
                    </a>
                    <a id="menuToggle" class="menutoggle"><i class="fa fa-bars"></i></a>
                </div>
            </div>
            <div class="top-right">
                <div class="header-menu">
                    <div class="header-left">
                    </div>

                    <div class="user-area dropdown float-right">
                        <a href="#" class="dropdown-toggle active" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <img class="user-avatar rounded-circle" src="../img/user.png" alt="User Avatar">
                        </a>

                        <div class="user-menu dropdown-menu">
                            <a class="nav-link" href="../logout.php"><i class="fa fa-sign-out"></i>Logout</a>
                        </div>
                    </div>

                </div>
            </div>
        </header>
        <!-- /#header -->
        <!-- Content -->
        <br>
        <div class="content">
            <!-- Animated -->
            <div class="animated fadeIn">
                <!-- Widgets  -->
                <div class="row">
                    <div class="col-lg-4 col-md-6">
                        <div class="card">
                            <div class="card-body">
                                <div class="stat-widget-five">
                                    <div class="stat-icon dib flat-color-1">
                                        <i class="fa fa-file"></i>
                                    </div>
                                    <div class="stat-content">
                                        <div class="text-left dib">
                                            <?php
                                            $no = 1;
                                            $username = $_SESSION['username'];
                                            $data = mysqli_query($koneksi, "select * from t_laporan join t_peserta on t_laporan.peserta_id = t_peserta.peserta_id where t_peserta.peserta_nim = '$username' order by t_laporan.laporan_id asc");
                                            $cek = mysqli_num_rows($data);
                                            ?>
                                            <div class="stat-text"><span class="count"><?php echo $cek; ?></span></div>
                                            <div class="stat-heading">Laporan</div>
                                            <br>
                                            <div class="stat-heading"><a href="rekap/">More Details</a></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6">
                        <div class="card">
                            <div class="card-body">
                                <div class="stat-widget-five">
                                    <div class="stat-icon dib flat-color-2">
                                        <i class="fa fa-check-circle-o"></i>
                                    </div>
                                    <div class="stat-content">
                                        <div class="text-left dib">
                                            <?php
                                            $no = 1;
                                            $username = $_SESSION['username'];
                                            $data2 = mysqli_query($koneksi, "select * from t_laporan join t_peserta on t_laporan.peserta_id = t_peserta.peserta_id where t_laporan.laporan_status = '1' and t_peserta.peserta_nim = '$username' order by t_laporan.laporan_id asc");
                                            $cek2 = mysqli_num_rows($data2);
                                            ?>
                                            <div class="stat-text"><span class="count"><?php echo $cek2; ?></span></div>
                                            <div class="stat-heading">Laporan Desetujui</div>
                                            <br>
                                            <div class="stat-heading"><a href="rekap/">More Details</a></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6">
                        <div class="card">
                            <div class="card-body">
                                <div class="stat-widget-five">
                                    <div class="stat-icon dib flat-color-3">
                                        <i class="fa fa-times-circle"></i>
                                    </div>
                                    <div class="stat-content">
                                        <div class="text-left dib">
                                            <?php
                                            $no = 1;
                                            $username = $_SESSION['username'];
                                            $data2 = mysqli_query($koneksi, "select * from t_laporan join t_peserta on t_laporan.peserta_id = t_peserta.peserta_id where t_laporan.laporan_status = '2' and t_peserta.peserta_nim = '$username' order by t_laporan.laporan_id asc");
                                            $cek2 = mysqli_num_rows($data2);
                                            ?>
                                            <div class="stat-text"><span class="count"><?php echo $cek2; ?></span></div>
                                            <div class="stat-heading">Laporan Ditolak</div>
                                            <br>
                                            <div class="stat-heading"><a href="rekap/index2.php">More Details</a></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6">
                        <div class="card">
                            <div class="card-body">
                                <div class="stat-widget-five">
                                    <div class="stat-icon dib flat-color-4">
                                        <i class="fa fa-envelope-o"></i>
                                    </div>
                                    <div class="stat-content">
                                        <div class="text-left dib">
                                            <?php
                                            $no = 1;
                                            $username = $_SESSION['username'];
                                            $data2 = mysqli_query($koneksi, "select * from t_laporan join t_peserta on t_laporan.peserta_id = t_peserta.peserta_id where t_laporan.laporan_status = '0' and t_peserta.peserta_nim = '$username' order by t_laporan.laporan_id asc");
                                            $cek2 = mysqli_num_rows($data2);
                                            ?>
                                            <div class="stat-text"><span class="count"><?php echo $cek2; ?></span></div>
                                            <div class="stat-heading">Laporan Diproses</div>
                                            <br>
                                            <div class="stat-heading"><a href="mon_laporan/">More Details</a></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6">
                        <div class="card">
                            <div class="card-body">
                                <div class="stat-widget-five">
                                    <div class="stat-icon dib flat-color-4">
                                        <i class="fa fa-file-o"></i>
                                    </div>
                                    <div class="stat-content">
                                        <div class="text-left dib">
                                            <?php
                                            $no = 1;
                                            $username = $_SESSION['username'];
                                            $data2 = mysqli_query($koneksi, "select * from t_peserta where t_peserta.peserta_nim = '$username'");
                                            $cek2 = mysqli_fetch_object($data2);
                                            ?>
                                            <div class="stat-text">Dokumen</div>
                                            <div class="stat-heading">Surat Pengantar</div>
                                            <br>
                                            <div class="stat-heading"><a href="../uploads/<?= $cek2->surat_pengantar ?? '' ?>" target="_blank">More Details</a></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-4 col-md-6">
                        <div class="card">
                            <div class="card-body">
                                <div class="stat-widget-five">
                                    <div class="stat-icon dib flat-color-4">
                                        <i class="fa fa-file-o"></i>
                                    </div>
                                    <div class="stat-content">
                                        <div class="text-left dib">
                                            <?php
                                            $no = 1;
                                            $username = $_SESSION['username'];
                                            $data2 = mysqli_query($koneksi, "select * from t_peserta where t_peserta.peserta_nim = '$username'");
                                            $cek2 = mysqli_fetch_object($data2);
                                            ?>
                                            <div class="stat-text">Dokumen</div>
                                            <div class="stat-heading">Surat Balasan</div>
                                            <br>
                                            <div class="stat-heading"><a href="../uploads/<?= $cek2->surat_balasan ?? '' ?>" target="_blank">More Details</a></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <?php
                    $no = 1;
                    $username = $_SESSION['username'];
                    $data2 = mysqli_query($koneksi, "select * from t_peserta where t_peserta.peserta_nim = '$username'");
                    $cek2 = mysqli_fetch_object($data2);
                    ?>

                    <?php if ($cek2->sertifikat != null) : ?>
                        <div class="col-lg-4 col-md-6">
                            <div class="card">
                                <div class="card-body">
                                    <div class="stat-widget-five">
                                        <div class="stat-icon dib flat-color-4">
                                            <i class="fa fa-file-o"></i>
                                        </div>
                                        <div class="stat-content">
                                            <div class="text-left dib">

                                                <div class="stat-text">Download</div>
                                                <div class="stat-heading">Sertifikat</div>
                                                <br>
                                                <div class="stat-heading"><a href="../uploads/<?= $cek2->sertifikat ?? '' ?>" download="">download</a></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php endif; ?>

                    <?php if ($cek2->sertifikat != null) : ?>
                        <div class="col-lg-4 col-md-6">
                            <div class="card">
                                <div class="card-body">
                                    <div class="stat-widget-five">
                                        <div class="stat-icon dib flat-color-4">
                                            <i class="fa fa-file-o"></i>
                                        </div>
                                        <div class="stat-content">
                                            <div class="text-left dib">

                                                <div class="stat-text">Download</div>
                                                <div class="stat-heading">Nilai</div>
                                                <br>
                                                <div class="stat-heading"><a href="../uploads/<?= $cek2->nilai ?? '' ?>" download="">download</a></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php endif; ?>
                </div>
                <!-- /Widgets -->
                <div class="clearfix"></div><br><br><br><br><br><br><br><br><br><br><br><br>
            </div>
            <!-- .animated -->
        </div>
        <!-- /.content -->
        <div class="clearfix"></div><br><br><br><br><br><br><br><br><br><br><br><br>
        <!-- Footer -->
        <footer class="site-footer">
            <div class="footer-inner bg-white">
                <div class="row">
                    <div class="col-sm-6">
                        Copyright &copy; 2023 Ahmad Zikri Zega
                    </div>
                </div>
            </div>
        </footer>
        <!-- /.site-footer -->
    </div>
    <!-- /#right-panel -->
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

</html>