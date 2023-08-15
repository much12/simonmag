<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <style>
        table.table {
            border-collapse: collapse;
            width: 100%;
            margin: auto;
        }

        table.table,
        table.table th,
        table.table td {
            border: 1px solid black;
        }

        table.table th,
        table.table td {
            padding: 5px;
        }
    </style>
</head>

<body>
    <p style="text-align: center;">Sistem Monitoring Magang</p>

    <table style="text-align: center; margin: auto;">
        <tr>
            <td>
                <img src="../../img/pemprov.png" alt="" width="130">
            </td>

            <td>
                <h1 style="font-size: 22px; text-align: center; margin-bottom: 0;">
                    PEMERINTAH PROVINSI KALIMANTAN SELATAN <br>
                    DINAS KOMUNIKASI DAN INFORMATIKA
                </h1>

                <p>Jalan Dharma Praja II, Kawasan Perkantoran Pemerintah Provinsi Kalimantan Selatan</p>
            </td>
        </tr>
    </table>
    <br>
    <hr>

    <?php
    $tanggalawal = isset($_GET['tanggalawal']) ? $_GET['tanggalawal'] : null;
    $tanggalakhir = isset($_GET['tanggalakhir']) ? $_GET['tanggalakhir'] : null;
    ?>

    <h2 style="text-align: center; font-weight: 500; margin-bottom: 0;">Laporan Peserta Per Periode</h2>
    <?php if ($tanggalawal != null && $tanggalakhir != null) : ?>
        <p style="text-align: center; margin-bottom: 30px;">Periode: <?= date('d F Y', strtotime($tanggalawal)) ?> s/d <?= date('d F Y', strtotime($tanggalakhir)) ?></p>
    <?php endif; ?>

    <table cellspacing="0" class="table">
        <tr>
            <th>No</th>
            <th>Nama</th>
            <th>NIM</th>
            <th>Prodi</th>
            <th>Kampus</th>
            <th>Alamat</th>
            <th>Nomor Handphone</th>
            <th>Surat Pengantar</th>
            <th>Rata Rata Nilai</th>
        </tr>

        <?php
        include '../../koneksi.php';
        if (empty($tanggalawal) or empty($tanggalakhir)) {
            $data = mysqli_query($koneksi, "select a.peserta_nama, a.peserta_nim, a.peserta_prodi, a.peserta_kampus, a.peserta_alamat, a.peserta_notelp, a.surat_pengantar, b.average_alphabet from t_peserta a join (SELECT peserta_id, CHAR(AVG(ASCII(nilai))) AS average_alphabet FROM t_laporan group by peserta_id) b on b.peserta_id = a.peserta_id where a.peserta_status = 1");
        } else if (!empty($tanggalawal) && !empty($tanggalakhir)) {
            $data = mysqli_query($koneksi, "select a.peserta_nama, a.peserta_nim, a.peserta_prodi, a.peserta_kampus, a.peserta_alamat, a.peserta_notelp, a.surat_pengantar, b.average_alphabet from t_peserta a join (SELECT peserta_id, CHAR(AVG(ASCII(nilai))) AS average_alphabet FROM t_laporan where laporan_tanggal >= '" . $tanggalawal . "' and laporan_tanggal <= '" . $tanggalakhir . "' group by peserta_id) b on b.peserta_id = a.peserta_id where a.peserta_status = 1");
        }

        $no = 1;
        while ($d = mysqli_fetch_array($data)) {
        ?>
            <tr height="30px">
                <td style="text-align:center;"><?php echo $no++; ?></td>
                <td><?php echo $d['peserta_nama']; ?></td>
                <td><?php echo $d['peserta_nim']; ?></td>
                <td><?php echo $d['peserta_prodi']; ?></td>
                <td><?php echo $d['peserta_kampus']; ?></td>
                <td><?php echo $d['peserta_alamat']; ?></td>
                <td><?php echo $d['peserta_notelp']; ?></td>
                <td><?php echo $d['surat_pengantar']; ?></td>
                <td><?php echo $d['average_alphabet']; ?></td>
            </tr>
        <?php } ?>
    </table>
</body>

</html>