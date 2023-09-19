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

    <h2 style="text-align: center; font-weight: 500;">Laporan Peserta Diterima</h2>

    <table cellspacing="0" class="table">
        <tr>
            <th>No</th>
            <th>Nama</th>
            <th>NIM</th>
            <th>Prodi</th>
            <th>Kampus</th>
            <th>Alamat</th>
            <th>Nomor Handphone</th>
        </tr>

        <?php
        include '../../koneksi.php';
        $no = 1;
        $data = mysqli_query($koneksi, "select peserta_nama, peserta_nim, peserta_prodi, peserta_kampus, peserta_alamat, peserta_notelp from t_peserta where peserta_status = 1 order by t_peserta.peserta_id asc");
        while ($d = mysqli_fetch_array($data)) {
        ?>
            <tr height=" 30px">
                <td style="text-align:center;"><?php echo $no++; ?></td>
                <td><?php echo $d['peserta_nama']; ?></td>
                <td><?php echo $d['peserta_nim']; ?></td>
                <td><?php echo $d['peserta_prodi']; ?></td>
                <td><?php echo $d['peserta_kampus']; ?></td>
                <td><?php echo $d['peserta_alamat']; ?></td>
                <td><?php echo $d['peserta_notelp']; ?></td>
            </tr>
        <?php } ?>
    </table>
</body>

</html>