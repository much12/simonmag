<?php 
session_start();
if($_SESSION['status']==""){
	header("location:../../index.php?pesan=belum_login");
}
else if($_SESSION['status']!="peserta"){
	header("location:../../index.php?pesan=belum_login");
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
<center>
<table>
	<tr>
		<td rowspan="3"><img src="../../img/pemprov.png" width="150" height="100"></td>
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
<hr/>
<br>
<center><h4>Laporan Kegiatan</h4></center><br><br>
<?php 
	include '../../koneksi.php';
	$username = $_SESSION['username'];
	$data = mysqli_query($koneksi,"select * from t_laporan join t_peserta on t_laporan.peserta_id = t_peserta.peserta_id where t_peserta.peserta_nim = '$username' order by t_laporan.laporan_id asc");
	$cek = mysqli_fetch_array($data);
?>
<p style="margin-left:60px;">Nama : <?php echo $cek['peserta_nama']; ?> </p>
<p style="margin-left:60px;">NIM	: <?php echo $cek['peserta_nim']; ?></p>
<br>
<center>
    <table class="table table-bordered" style="width:90%;">
        <thead>
            <tr>
				<th style="text-align:center;">No</th>
				<th>Tanggal</th>
				<th>Nama</th>
				<th>Kegiatan</th>
				<th style="text-align:center;">TTD</th>
            </tr>
        </thead>
        <tbody>
		<?php
		$no = 1;
		$data2 = mysqli_query($koneksi,"select * from t_laporan join t_peserta on t_laporan.peserta_id = t_peserta.peserta_id where t_peserta.peserta_nim = '$username' and laporan_status ='1' order by t_laporan.laporan_id asc");
		while($d = mysqli_fetch_array($data2)){
		?>
            <tr>
				<td style="text-align:center;"><?php echo $no++; ?></td>
				<td><?php echo $d['laporan_tanggal']; ?></td>
				<td><?php echo $d['peserta_nama']; ?></td>
				<td><?php echo $d['laporan_kegiatan']; ?></td>
				<td></td>
                </tr>
				<?php } ?>
        </tbody>
	</table>
</center>
<br>
<?php 
	include '../../koneksi.php';
	$bidang = $_SESSION['bidang'];
	$data = mysqli_query($koneksi,"select * from t_user join t_bidang on t_user.bidang_id=t_bidang.bidang_id where t_bidang.bidang_id='$bidang' order by t_bidang.bidang_id asc");
	$cek = mysqli_fetch_array($data);
?>
<center>
<p style="float:right; margin-right:60px;"><?php echo $cek['bidang_nama']; ?> </p><br><br><br><br><br>
<p style="float:right; margin-right:60px;"><?php echo $cek['bidang_ketua']; ?></p>
</center> 

<script>
window.print();
window.onmousemove = function() {
  window.close();
}
</script>
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