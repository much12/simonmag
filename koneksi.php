<?php
$koneksi = mysqli_connect("192.168.50.247", "karpeldevtech", "owr216he890", "db_magang");

if (mysqli_connect_errno()) {
	echo "Koneksi database gagal : " . mysqli_connect_error();
}
