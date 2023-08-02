<?php 
session_start();
if($_SESSION['status']!="admin"){
	header("location:../../index.php?pesan=belum_admin");
}
?>
<!doctype html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang=""> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8" lang=""> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9" lang=""> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" lang=""> <!--<![endif]-->
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
include '../../koneksi.php';

$nama = $_POST['nama'];
$nim = $_POST['nim'];
$prodi = $_POST['prodi'];
$kampus = $_POST['kampus'];
$alamat = $_POST['alamat'];
$notelp = $_POST['notelp'];
$status = $_POST['status'];

if (empty($nama) OR empty($nim) OR empty($prodi) OR empty($kampus) OR empty($alamat) OR empty($notelp)) {
	echo '<div class="alert alert-danger" role="alert">
	<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
	<strong>Gagal!</strong> Invalid Data.</div><br>
	<div class="row justify-content-center">
	<div class="spinner-border" role="status" style="position: absolute;left: 50%;top: 50%;; width: 5rem;height: 5rem"></div></div>';
	echo '<meta http-equiv="refresh" content="1;url=index.php">';
} else {
	$edit = mysqli_query($koneksi,"update t_peserta set peserta_nama='$nama', peserta_nim='$nim', peserta_prodi='$prodi', peserta_kampus='$kampus', peserta_alamat='$alamat', peserta_notelp='$notelp', peserta_status='$status' where peserta_nim='$nim'");
	if ($edit){
		$edit2 = mysqli_query($koneksi,"update t_user set user_nama='$nama', user_notelp='$notelp' where user_username='$nim'");
		if ($edit2) {
		echo '<div class="alert alert-success" role="alert">
		<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
		<strong>Berhasil!</strong> Data telah berhasil diedit.</div><br>
		<div class="row justify-content-center">
		<div class="spinner-border" role="status" style="position: absolute;left: 50%;top: 50%;; width: 5rem;height: 5rem"></div></div>';
		echo '<meta http-equiv="refresh" content="1;url=index.php">';
		} else {
		echo '<div class="alert alert-danger" role="alert">
		<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
		<strong>Gagal!</strong> Data tidak berhasil diedit</div><br>
		<div class="row justify-content-center">
		<div class="spinner-border" role="status" style="position: absolute;left: 50%;top: 50%;; width: 5rem;height: 5rem"></div></div>';
		echo '<meta http-equiv="refresh" content="1;url=index.php">';
		}
	} else {
		echo '<div class="alert alert-danger" role="alert">
		<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
		<strong>Gagal!</strong> Data tidak berhasil diedit</div><br>
		<div class="row justify-content-center">
		<div class="spinner-border" role="status" style="position: absolute;left: 50%;top: 50%;; width: 5rem;height: 5rem"></div></div>';
		echo '<meta http-equiv="refresh" content="1;url=index.php">';
	}
}
?>

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