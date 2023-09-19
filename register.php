<?php session_start();
include 'koneksi.php'; ?>
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

    <link rel="apple-touch-icon" href="img/logo.png">
    <link rel="shortcut icon" href="img/logo.png">
    <link rel="icon" type="image/png" href="img/logo.png">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/normalize.css@8.0.0/normalize.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/font-awesome@4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/lykmapipo/themify-icons@0.1.2/css/themify-icons.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/pixeden-stroke-7-icon@1.2.3/pe-icon-7-stroke/dist/pe-icon-7-stroke.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/flag-icon-css/3.2.0/css/flag-icon.min.css">
    <link rel="stylesheet" href="assets/css/cs-skin-elastic.css">
    <link rel="stylesheet" href="assets/css/lib/datatable/dataTables.bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/style.css">

    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,600,700,800' rel='stylesheet' type='text/css'>

    <!-- <script type="text/javascript" src="https://cdn.jsdelivr.net/html5shiv/3.7.3/html5shiv.min.js"></script> -->

</head>

<body class="bg-dark">

    <div class="sufee-login d-flex align-content-center flex-wrap">
        <div class="container">
            <div class="login-content">
                <div class="login-logo">
                </div>
                <div class="login-form">
                    <center>
                        <h3>Register</h3>
                    </center><br><br>
                    <form method="POST" action="reg.php" enctype="multipart/form-data">
                        <div class="form-group">
                            <label>Nama Lengkap</label>
                            <input type="text" name="nama" class="form-control" placeholder="Nama Lengkap" required>
                        </div>
                        <div class="form-group">
                            <label>Nomor Induk Mahasiswa</label>
                            <input type="text" name="nim" class="form-control" placeholder="Nomor Induk Mahasiswa" required>
                        </div>
                        <div class="form-group">
                            <label>Program Studi</label>
                            <input type="text" name="prodi" class="form-control" placeholder="Program Studi" required>
                        </div>
                        <div class="form-group">
                            <label>Kampus</label>
                            <input type="text" name="kampus" class="form-control" placeholder="Kampus" required>
                        </div>
                        <div class="form-group">
                            <label>Alamat</label>
                            <input type="textbox" name="alamat" class="form-control" placeholder="Alamat" required>
                        </div>
                        <div class="form-group">
                            <label>No Telpon</label>
                            <input type="text" name="notelp" class="form-control" placeholder="No Telpon" required>
                        </div>
                        <div class="form-group">
                            <label for="bidang">Bidang :</label>
                            <select name="bidang" class="form-control" required="required">
                                <option value="0" selected disabled>Pilih Bidang</option>
                                <?php
                                $pilbid = mysqli_query($koneksi, "select * from t_bidang order by bidang_id asc");
                                while ($pil = mysqli_fetch_array($pilbid)) {
                                    $label = $pil['bidang_nama'];
                                    $id = $pil['bidang_id']; ?>
                                    <option value="<?php echo $id; ?>"><?php echo $label; ?></option>
                                <?php } ?>
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="suratpengantar">Surat Pengantar</label>
                            <input type="file" name="surat_pengantar" class="form-control" accept=".pdf,.doc" required>
                        </div>

                        <div class="checkbox">
                            <label>
                                <input type="checkbox" required> Agree the terms and policy
                            </label>
                        </div>
                        <button type="submit" class="btn btn-primary btn-flat m-b-30 m-t-30">Register</button>
                        <div class="register-link m-t-15 text-center"><br>
                            <p>Already have account ? <a href="login.php"> Login</a></p>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Scripts -->
    <script src="https://cdn.jsdelivr.net/npm/jquery@2.2.4/dist/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.4/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/js/bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/jquery-match-height@0.7.2/dist/jquery.matchHeight.min.js"></script>
    <script src="assets/js/main.js"></script>


    <script src="assets/js/lib/data-table/datatables.min.js"></script>
    <script src="assets/js/lib/data-table/dataTables.bootstrap.min.js"></script>
    <script src="assets/js/lib/data-table/dataTables.buttons.min.js"></script>
    <script src="assets/js/lib/data-table/buttons.bootstrap.min.js"></script>
    <script src="assets/js/lib/data-table/jszip.min.js"></script>
    <script src="assets/js/lib/data-table/vfs_fonts.js"></script>
    <script src="assets/js/lib/data-table/buttons.html5.min.js"></script>
    <script src="assets/js/lib/data-table/buttons.print.min.js"></script>
    <script src="assets/js/lib/data-table/buttons.colVis.min.js"></script>
    <script src="assets/js/init/datatables-init.js"></script>

</body>

</html>