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
							<li><i class="fa fa-users"></i><a href="#">&nbsp;Peserta</a></li>
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
						<div class="card">
							<div class="card-header">
								<strong class="card-title">Peserta</strong>
							</div>
							<div class="card-body">
								<a href="" class="btn btn-primary" style="float:left;" data-toggle="modal" data-target="#tambah1"><span class="fa fa-plus-square" /> Tambah Data</a><br><br>
								<div class="modal fade" id="tambah1" tabindex="-1" role="dialog" aria-labelledby="modalSayaLabel" aria-hidden="true">
									<div class="modal-dialog modal-dialog-scrollable" role="document">
										<div class="modal-content">
											<div class="modal-header">
												<h5 class="modal-title" id="modalSayaLabel">Tambah Data</h5>
												<button type="button" class="close" data-dismiss="modal" aria-label="Close">
													<span aria-hidden="true">&times;</span>
												</button>
											</div>
											<div class="modal-body">
												<form method="POST" action="add.php">
													<div class="form-group-sm">
														<label for="user">Nama :</label>
														<input type="text" name="nama" class="form-control" placeholder="Nama" required="required"><br>
													</div>
													<div class="form_group-sm">
														<label for="nim">NIM :</label>
														<input type="text" name="nim" class="form-control" placeholder="NIM" required="required"><br>
													</div>
													<div class="form-group-sm">
														<label for="prodi">Program Studi :</label>
														<input type="text" name="prodi" class="form-control" placeholder="Program Studi" required="required"><br>
													</div>
													<div class="form-group-sm">
														<label for="kampus">Kampus :</label>
														<input type="text" name="kampus" class="form-control" placeholder="Kampus" required="required"><br>
													</div>
													<div class="form_group-sm">
														<label for="alamat">Alamat :</label>
														<input type="text" name="alamat" class="form-control" placeholder="Alamat" required="required"><br>
													</div>
													<div class="form-group-sm">
														<label for="notelp">No Telp :</label>
														<input type="number" name="notelp" class="form-control" placeholder="No Telpon" required="required"><br>
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
													<div class="modal-footer">
														<button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
														<input type="submit" name="btnlogin" value="Simpan" class="btn btn-primary">
													</div>
												</form>
											</div>
										</div>
									</div>
								</div>
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
											<th>Aksi</th>
										</tr>
									</thead>
									<tbody>
										<?php
										$no = 1;
										$data = mysqli_query($koneksi, "select * from t_peserta join t_user on t_peserta.peserta_nim=t_user.user_username where peserta_status='0' or peserta_status='1' order by peserta_id asc");
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
												<td style="text-align:center;"><?php
																				if ($d['peserta_status'] == "1") { ?>
														<span class="badge badge-success">Aktif</span>
													<?php } else { ?>
														<span class="badge badge-info">Selesai</span>
													<?php } ?>
												</td>
												<td style="text-align:center;">
													<div class="btn-group">
														<button type="button" class="btn btn-sm btn-secondary dropdown-toggle" data-toggle="dropdown">Aksi</button>
														<div class="dropdown-menu">
															<a href="cetak/cetak_serti.php?nim=<?php echo $d['peserta_nim']; ?>" target="_blank" class="dropdown-item"><span class="fa fa-print" /> Cetak Sertifikat</a>
															<div class="dropdown-divider"></div>
															<a href="lihat.php?nim=<?php echo $d['peserta_nim']; ?>" class="dropdown-item"><span class="fa fa-eye" /> Lihat Laporan</a>
															<div class="dropdown-divider"></div>
															<a href="" class="dropdown-item" data-toggle="modal" data-target="#edit<?php echo $d['peserta_nim']; ?>"><span class="fa fa-edit" /> Edit</a>
															<div class="dropdown-divider"></div>
															<a href="" class="dropdown-item" data-toggle="modal" data-target="#delete<?php echo $d['peserta_nim']; ?>"><span class="fa fa-trash" /> Delete</a>
														</div>
													</div>
												</td>
												<div class="modal fade" id="delete<?php echo $d['peserta_nim']; ?>" tabindex="-1" role="dialog" aria-labelledby="modalSayaLabel" aria-hidden="true">
													<div class="modal-dialog" role="document">
														<div class="modal-content">
															<div class="modal-header">
																<h5 class="modal-title" id="modalSayaLabel">Sistem Monitoring Magang</h5>
																<button type="button" class="close" data-dismiss="modal" aria-label="Close">
																	<span aria-hidden="true">&times;</span>
																</button>
															</div>
															<div class="modal-body">
																Data peserta yang anda pilih akan dihapus.<br>Apakah anda yakin ingin hapus data?
															</div>
															<div class="modal-footer">
																<button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
																<a href="delete.php?nim=<?php echo $d['peserta_nim']; ?>" class="btn btn-primary">Oke</a>
															</div>
														</div>
													</div>
												</div>

												<div class="modal fade" id="edit<?php echo $d['peserta_nim']; ?>" tabindex="-1" role="dialog" aria-labelledby="modalSayaLabel" aria-hidden="true">
													<div class="modal-dialog modal-dialog-scrollable" role="document">
														<div class="modal-content">
															<div class="modal-header">
																<h5 class="modal-title" id="modalSayaLabel">Edit Data</h5>
																<button type="button" class="close" data-dismiss="modal" aria-label="Close">
																	<span aria-hidden="true">&times;</span>
																</button>
															</div>
															<div class="modal-body">
																<form method="POST" action="edit.php" enctype="multipart/form-data">
																	<?php
																	$nim = $d['peserta_nim'];
																	$data_edit = mysqli_query($koneksi, "select * from t_peserta join t_kategori_p on t_peserta.peserta_status=t_kategori_p.peserta_status where peserta_nim='$nim'");
																	while ($row = mysqli_fetch_array($data_edit)) { ?>
																		<div class="form-group-sm">
																			<label for="display">Nama :</label>
																			<input type="text" name="nama" class="form-control" value="<?php echo $row['peserta_nama']; ?>" required="required"><br>
																		</div>
																		<div class="form-group-sm">
																			<label for="display">NIM :</label>
																			<input type="text" name="nim" class="form-control" value="<?php echo $row['peserta_nim']; ?>" required="required" readonly><br>
																		</div>
																		<div class="form-group-sm">
																			<label for="display">Program Studi :</label>
																			<input type="text" name="prodi" class="form-control" value="<?php echo $row['peserta_prodi']; ?>" required="required"><br>
																		</div>
																		<div class="form-group-sm">
																			<label for="display">Kampus :</label>
																			<input type="text" name="kampus" class="form-control" value="<?php echo $row['peserta_kampus']; ?>" required="required"><br>
																		</div>
																		<div class="form-group-sm">
																			<label for="display">Alamat :</label>
																			<input type="text" name="alamat" class="form-control" value="<?php echo $row['peserta_alamat']; ?>" required="required"><br>
																		</div>
																		<div class="form-group-sm">
																			<label for="display">No Telpon :</label>
																			<input type="number" name="notelp" class="form-control" value="<?php echo $row['peserta_notelp']; ?>" required="required"><br>
																		</div>
																		<div class="form-group-sm">
																			<label for="status">Status :</label>
																			<select name="status" class="form-control" id="status" onchange="changeStatus(this)" required="required">
																				<option value="<?php echo $row['peserta_status']; ?>" selected readonly><?php echo $row['kategori_peserta']; ?></option>
																				<?php
																				$idpiljwbn = mysqli_query($koneksi, "select * from t_kategori_p order by peserta_status asc LIMIT 2");
																				while ($ipil = mysqli_fetch_array($idpiljwbn)) {
																					$label = $ipil['kategori_peserta'];
																					$id2 = $ipil['peserta_status'];   ?>
																					<option value="<?php echo $id2; ?>"><?php echo $label; ?></option>
																				<?php
																				} ?>
																			</select><br>
																		</div>

																		<div class="form-group-sm" id="headersertifikat" style="<?= $row['peserta_status'] != 0 ? 'display:none;' : null ?>">
																			<label for="">Sertifikat Peserta Magang :</label><br>
																			<p>Kosongkan jika tidak ingin diubah</p>
																			<input type="file" name="sertifikat" class="form-control" id="sertifikat"><br>
																		</div>
																		<div class="form-group-sm" id="headernilai" style="<?= $row['peserta_status'] != 0 ? 'display:none;' : null ?>" <?= $row['peserta_status'] == 0 && isset($row['peserta_status']) ? 'required' : null ?>>
																			<label for="">Nilai Peserta Magang :</label>
																			<?php if (!isset($row['nilai'])) : ?>
																				<p>Kosongkan jika tidak ingin diubah</p>
																			<?php endif; ?>
																			<input type="file" name="nilai" class="form-control" id="nilai"><br>
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

		function changeStatus(these) {
			if ($(these).val() == 0) {
				$(these).parent().parent().find('#sertifikat').val(null);
				$(these).parent().parent().find('#nilai').val(null);
				$(these).parent().parent().find('#headersertifikat').show();
				$(these).parent().parent().find('#headernilai').show();
			} else {
				$(these).parent().parent().find('#sertifikat').val(null);
				$(these).parent().parent().find('#nilai').val(null);
				$(these).parent().parent().find('#headersertifikat').hide();
				$(these).parent().parent().find('#headernilai').hide();
			}
		}
	</script>


</body>

</html>