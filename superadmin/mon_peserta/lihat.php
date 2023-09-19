<?php
session_start();
include '../../koneksi.php';
if ($_SESSION['status'] != "admin") {
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
                            <li><i class="fa fa-users"></i><a href="../pendaftar/">&nbsp;Pendaftar</a></li>
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
                                <h1>Monitoring</h1>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-8">
                        <div class="page-header float-right">
                            <div class="page-title">
                                <ol class="breadcrumb text-right">
                                    <li><a href="#">Dashboard</a></li>
                                    <li><a href="#">Monitoring</a></li>
                                    <li class="active">Peserta</li>
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
                        <br>
                        <div class="card">
                            <div class="card-header">
                                <strong class="card-title">Laporan Kegiatan</strong>
                                <?php
                                $nim = $_GET['nim'];
                                ?>
                                <div class="btn-group" style="float:right;">
                                    <a href="" class="btn btn-info dropdown-toggle" data-toggle="dropdown"><span class="fa fa-print" /> Cetak</a>
                                    <div class="dropdown-menu">
                                        <a href="cetak_aksi.php?nim=<?php echo $nim; ?>" target="_blank" class="dropdown-item"><span class="fa fa-print" /> Laporan Disetujui</a>
                                        <div class="dropdown-divider"></div>
                                        <a href="cetak_aksi2.php?nim=<?php echo $nim; ?>" target="_blank" class="dropdown-item"><span class="fa fa-print" /> Laporan Ditolak</a>
                                    </div>
                                </div>
                            </div>
                            <div class="card-body">
                                <table id="bootstrap-data-table" class="table table-striped table-bordered">
                                    <thead>
                                        <tr>
                                            <th style="text-align:center;">No</th>
                                            <th>Tanggal</th>
                                            <th>Nama</th>
                                            <th>Kegiatan</th>
                                            <th>Status</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $no = 1;
                                        $data = mysqli_query($koneksi, "select * from t_laporan join t_peserta on t_laporan.peserta_id = t_peserta.peserta_id where t_peserta.peserta_nim = '$nim' order by t_laporan.laporan_id asc");
                                        while ($d = mysqli_fetch_array($data)) {
                                        ?>
                                            <tr>
                                                <td style="text-align:center;"><?php echo $no++; ?></td>
                                                <td><?php echo $d['laporan_tanggal']; ?></td>
                                                <td><?php echo $d['peserta_nama']; ?></td>
                                                <td><?php echo $d['laporan_kegiatan']; ?></td>
                                                <td style="text-align:center;">
                                                    <?php if ($d['laporan_status'] == '0') {
                                                        echo '<span class="badge badge-warning">Menunggu persetujuan</span>';
                                                    } elseif ($d['laporan_status'] == '1') {
                                                        echo '<span class="badge badge-success">Disetujui</span>';
                                                    } elseif ($d['laporan_status'] == '2') {
                                                        echo '<span class="badge badge-danger">Ditolak</span>';
                                                    } ?>
                                                </td>
                                                <td style="text-align:center;">
                                                    <?php
                                                    if ($d['laporan_status'] == "0") { ?>
                                                        <div class="btn-group">
                                                            <button type="button" class="btn btn-sm btn-secondary dropdown-toggle" data-toggle="dropdown">Aksi</button>
                                                            <div class="dropdown-menu">
                                                                <a href="" class="dropdown-item" data-toggle="modal" data-target="#edit<?php echo $d['laporan_id']; ?>"><span class="fa fa-edit" /> Edit Data</a>
                                                                <div class="dropdown-divider"></div>
                                                                <a href="" class="dropdown-item" data-toggle="modal" data-target="#delete<?php echo $d['laporan_id']; ?>"><span class="fa fa-trash" /> Delete Data</a>
                                                            </div>
                                                        </div>
                                                    <?php } else {
                                                        echo "No Action Needed";
                                                    }
                                                    ?>
                                                </td>
                                                <div class="modal fade" id="delete<?php echo $d['laporan_id']; ?>" tabindex="-1" role="dialog" aria-labelledby="modalSayaLabel" aria-hidden="true">
                                                    <div class="modal-dialog" role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title" id="modalSayaLabel">Sistem Monitoring Magang</h5>
                                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                    <span aria-hidden="true">&times;</span>
                                                                </button>
                                                            </div>
                                                            <div class="modal-body">
                                                                Data yang anda pilih akan dihapus.<br>Apakah anda yakin ingin hapus data?
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                                                                <a href="delete2.php?laporan_id=<?php echo $d['laporan_id']; ?>" class="btn btn-primary">Oke</a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="modal fade" id="edit<?php echo $d['laporan_id']; ?>" tabindex="-1" role="dialog" aria-labelledby="modalSayaLabel" aria-hidden="true">
                                                    <div class="modal-dialog modal-dialog-scrollable" role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title" id="modalSayaLabel">Edit Data</h5>
                                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                    <span aria-hidden="true">&times;</span>
                                                                </button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <form method="POST" action="edit2.php?laporan_id=<?php echo $d['laporan_id']; ?>">
                                                                    <?php
                                                                    $id = $d['laporan_id'];
                                                                    $data_edit = mysqli_query($koneksi, "select * from t_laporan join t_peserta on t_laporan.peserta_id = t_peserta.peserta_id where t_laporan.laporan_id = '$id' order by t_laporan.laporan_id asc");
                                                                    while ($row = mysqli_fetch_array($data_edit)) { ?>
                                                                        <div class="form-group-sm">
                                                                            <label for="display">Tanggal :</label>
                                                                            <input type="date" name="tanggal" class="form-control" value="<?php echo $row['laporan_tanggal']; ?>" required="required"><br>
                                                                        </div>
                                                                        <div class="form-group-sm">
                                                                            <label for="display">Peserta :</label>
                                                                            <input type="text" name="peserta" class="form-control" value="<?php echo $row['peserta_nama']; ?>" required="required" readonly><br>
                                                                        </div>
                                                                        <div class="form-group-sm">
                                                                            <label for="display">Kegiatan :</label>
                                                                            <input type="text" name="kegiatan" class="form-control" value="<?php echo $row['laporan_kegiatan']; ?>" required="required"><br>
                                                                        </div>
                                                                        <div class="modal-footer">
                                                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                                                                            <input type="submit" name="btnlogin" value="Simpan" class="btn btn-primary">
                                                                        </div>
                                                                    <?php } ?>
                                                                </form>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
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