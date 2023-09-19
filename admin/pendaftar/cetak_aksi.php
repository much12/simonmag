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
<centeR>
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
<center><h4>PENDAFTAR MAGANG</h4></center>
<br><br>
<center>
    <table class="table table-bordered" style="width:90%;">
        <thead>
            <tr>
				<th style="text-align:center;">No</th>
				<th>Nama</th>
				<th>NIM</th>
				<th>Prodi</th>
				<th>Kampus</th>
				<th>Alamat</th>
				<th>No Telp</th>
            </tr>
        </thead>
        <tbody>
		<?php
		include '../../koneksi.php';
		$no = 1;
		$bidang = $_SESSION['bidang'];
		$data = mysqli_query($koneksi,"select * from t_peserta join t_user on t_peserta.peserta_nim=t_user.user_username where bidang_id='$bidang' and peserta_status = '2' order by peserta_id asc");   
		while($d = mysqli_fetch_array($data)){ ?>
            <tr>
				<td style="text-align:center;"><?php echo $no++; ?></td>
				<td><?php echo $d['peserta_nama']; ?></td>
				<td><?php echo $d['peserta_nim']; ?></td>
				<td><?php echo $d['peserta_prodi']; ?></td>
				<td><?php echo $d['peserta_kampus']; ?></td>
				<td><?php echo $d['peserta_alamat']; ?></td>
				<td><?php echo $d['peserta_notelp']; ?></td>
            </tr>
			<?php } ?>
        </tbody>
    </table>
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