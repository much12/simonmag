<?php
session_start();
include '../../koneksi.php';
if ($_SESSION['status'] == "") {
    header("location:../../index.php?pesan=belum_login");
} else if ($_SESSION['status'] != "admin") {
    header("location:../../index.php?pesan=belum_admin");
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
    <!-- Left Panel -->

    <aside id="left-panel" class="left-panel">
        <nav class="navbar navbar-expand-sm navbar-default">
            <div id="main-menu" class="main-menu collapse navbar-collapse">
                <ul class="nav navbar-nav">
                    <li class="active">
                        <a href="../"><i class="menu-icon fa fa-laptop"></i>Dashboard </a>
                    </li>
                    <li class="menu-title">Master Data</li><!-- /.menu-title -->
                    <li class="menu-item-has-children dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-sitemap"></i>Master Data</a>
                        <ul class="sub-menu children dropdown-menu">
                            <li><i class="fa fa-users"></i><a href="#">&nbsp;Pendaftar</a></li>
                            <li><i class="fa fa-users"></i><a href="../peserta/">&nbsp;Peserta</a></li>
                            <li><i class="fa fa-user"></i><a href="../bidang/">&nbsp;Bidang</a></li>
                            <li><i class="fa fa-user"></i><a href="../kategori_p/">&nbsp;Kategori Peserta</a></li>
                            <li><i class="fa fa-user"></i><a href="../kategori_l/">&nbsp;Kategori Laporan</a></li>
                        </ul>
                    </li>
                    <li class="menu-title">Monitoring</li><!-- /.menu-title -->
                    <li class="menu-item-has-children dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-tasks"></i>Monitoring</a>
                        <ul class="sub-menu children dropdown-menu">
                            <li><i class="fa fa-users"></i><a href="../mon_pendaftar/">&nbsp;Pendaftar</a></li>
                            <li><i class="fa fa-users"></i><a href="../mon_peserta/">&nbsp;Peserta</a></li>
                            <li><i class="fa fa-tag"></i><a href="../mon_laporan/">&nbsp;Laporan</a></li>
                        </ul>
                    </li>
                    <li class="menu-title">Rekap</li><!-- /.menu-title -->
                    <li class="menu-item-has-children dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-book"></i>Rekap</a>
                        <ul class="sub-menu children dropdown-menu">
                            <li><i class="menu-icon fa fa-folder-open-o"></i><a href="../rekap/">&nbsp;Laporan Disetujui</a></li>
                            <li><i class="menu-icon fa fa-folder-open-o"></i><a href="../rekap/index2.php">&nbsp;Laporan Ditolak</a></li>
                        </ul>
                    </li>
                    <li class="menu-title">Laporan</li><!-- /.menu-title -->
                    <li class="menu-item-has-children dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-th"></i>Laporan</a>
                        <ul class="sub-menu children dropdown-menu">
                            <li><i class="menu-icon fa fa-folder-open-o"></i><a href="../laporan/laporanpesertaditerima.php">&nbsp;Laporan Pendaftara Peserta Magang Diterima</a></li>
                            <li><i class="menu-icon fa fa-folder-open-o"></i><a href="../laporan/laporanpesertaditolak.php">&nbsp;Laporan Peserta Magang Ditolak</a></li>
                            <li><i class="menu-icon fa fa-folder-open-o"></i><a href="../laporan/laporanpesertaperperiode.php">&nbsp;Laporan Peserta Magang Perperiode</a></li>
                            <li><i class="menu-icon fa fa-folder-open-o"></i><a href="../laporan/laporanpesertanilai.php">&nbsp;Laporan Rata Rata Nilai Peserta Magang</a></li>
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
                        <img src="../../img/pemprov.png" alt="" width="50">
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
                            <img class="user-avatar rounded-circle" src="../../img/user.png" alt="User Avatar">
                        </a>

                        <div class="user-menu dropdown-menu">
                            <a class="nav-link" href="../../logout.php"><i class="fa fa-sign-out"></i>Logout</a>
                        </div>
                    </div>

                </div>
            </div>
        </header><!-- /header -->
        <!-- Header-->
        <br>
        <div class="breadcrumbs">
            <div class="breadcrumbs-inner">
                <div class="row m-0">
                    <div class="col-sm-4">
                        <div class="page-header float-left">
                            <div class="page-title">
                                <h1>Master Data</h1>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-8">
                        <div class="page-header float-right">
                            <div class="page-title">
                                <ol class="breadcrumb text-right">
                                    <li><a href="#">Dashboard</a></li>
                                    <li><a href="#">Master Data</a></li>
                                    <li class="active">Pendaftar</li>
                                </ol>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="content">
            <div class="animated fadeIn">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <strong class="card-title">Pendaftar</strong>
                                <div class="btn-group" style="float:right;">
                                    <a href="" class="btn btn-info dropdown-toggle" data-toggle="dropdown"><span class="fa fa-print" /> Cetak</a>
                                    <div class="dropdown-menu">
                                        <a href="cetak_aksi.php" target="_blank" class="dropdown-item"><span class="fa fa-print" /> Pendaftar</a>
                                        <div class="dropdown-divider"></div>
                                        <a href="cetak_aksi2.php" target="_blank" class="dropdown-item"><span class="fa fa-print" /> Pendaftar Ditolak</a>
                                    </div>
                                </div>
                            </div>
                            <div class="card-body">
                                <br>
                                <table id="bootstrap-data-table" class="table table-striped table-bordered">
                                    <thead>
                                        <tr>
                                            <th style="text-align:center;">No</th>
                                            <th>Nama</th>
                                            <th>NIM</th>
                                            <th>Prodi</th>
                                            <th>Kampus</th>
                                            <th>Alamat</th>
                                            <th>No Telp</th>
                                            <th>Status</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $no = 1;
                                        $data = mysqli_query($koneksi, "select * from t_peserta join t_user on t_peserta.peserta_nim=t_user.user_username where peserta_status='2' or peserta_status = '3' order by peserta_id asc");
                                        while ($d = mysqli_fetch_array($data)) {
                                        ?>
                                            <tr>
                                                <td style="text-align:center;"><?php echo $no++; ?></td>
                                                <td><?php echo $d['peserta_nama']; ?></td>
                                                <td><?php echo $d['peserta_nim']; ?></td>
                                                <td><?php echo $d['peserta_prodi']; ?></td>
                                                <td><?php echo $d['peserta_kampus']; ?></td>
                                                <td><?php echo $d['peserta_alamat']; ?></td>
                                                <td><?php echo $d['peserta_notelp']; ?></td>
                                                <td style="text-align:center;">
                                                    <?php if ($d['peserta_status'] == '2') {
                                                        echo '<span class="badge badge-warning">Menunggu persetujuan</span>';
                                                    } elseif ($d['peserta_status'] == '3') {
                                                        echo '<span class="badge badge-danger">Ditolak</span>';
                                                    } else {
                                                        echo '<span class="badge badge-success">Peserta</span>';
                                                    } ?>
                                                </td>
                                            </tr>
                                        <?php }
                                        ?>
                                    </tbody>
                                </table>
                            </div>
                            <br>
                        </div>
                        <br>
                    </div>
                </div>
            </div><!-- .animated -->
        </div><!-- .content -->


        <div class="clearfix"></div>

        <footer class="site-footer">
            <div class="footer-inner bg-white">
                <div class="row">
                    <div class="col-sm-6">
                        Copyright &copy; 2023 Ahmad Zikri Zega
                    </div>
                </div>
            </div>
        </footer>

    </div><!-- /#right-panel -->

    <!-- Right Panel -->

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


    <script type="text/javascript">
        $(document).ready(function() {
            $('#bootstrap-data-table-export').DataTable();
        });
    </script>


</body>

</html>