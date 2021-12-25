<?php include "../env.php";include "../auth/cek_session.php";

$year = $_GET['year'];
$query = "SELECT * FROM pegawai JOIN pensiun ON pegawai.id=pensiun.id_pegawai WHERE YEAR(pensiun.tanggal_pensiun)=$year AND pensiun.status=2";
$result = mysqli_query($koneksi, $query);

$data = mysqli_fetch_all($result, MYSQLI_ASSOC);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cetak Pensiun</title>
    <style>
        @page {
            size: 35.7cm 25cm;
            margin: 5mm 5mm 5mm 5mm; /* change the margins as you want them to be. */
        }

        * {
            font-family: sans-serif;
        }

        table {
            border-collapse: collapse;
            width: 100%;

        }

        th {
            font-weight: bold;
        }

        td, th {
            border: 1px solid black;
            padding: 10px 5px;
        }

        h1 {
            text-transform: uppercase;
            padding-right, padding-left: 10%;
            /* padding-bo */
            text-align: center;
            margin-bottom: 30px;
        }
    </style>
</head>
<body>
    <h1>Laporan Penjagaan Pegawai Pensiun Dinas Perindustrian dan tenaga kerja tahun <?=$_GET['year'];?></h1>

    <table>
        <thead>
            <tr>
                <th style="text-align: center; width: 10px">No.</th>
                <th>NIP</th>
                <th>Nama</th>
                <th>Tanggal Lahir</th>
                <th>Eselon</th>
                <th>Golongan</th>
                <th>Jabatan</th>
                <th>SKPD</th>
                <th>Pendidikan</th>
                <th>Telepon</th>
            </tr>
        </thead>
        <tbody>
            <?php if (count($data) > 0): ?>
            <?php foreach ($data as $key => $item): ?>
                <tr>
                    <td style="text-align: center; width: 10px"><?=++$key;?></td>
                    <td><?=$item['nip'];?></td>
                    <td><?=$item['nama_lengkap'];?></td>
                    <td><?=date('d F Y', strtotime($item['tanggal_lahir']));?></td>
                    <td><?=$item['eselon'];?></td>
                    <td><?=$item['golongan'];?></td>
                    <td><?=$item['jabatan'];?></td>
                    <td><?=$item['tempat_tugas'];?></td>
                    <td><?=$item['pendidikan'];?></td>
                    <td><?=$item['telepon'];?></td>
                </tr>
            <?php endforeach;?>
            <?php else: ?>
                <tr>
                    <td colspan="10">Data tidak ada</td>
                </tr>
            <?php endif;?>
        </tbody>
    </table>
    <script>
        window.print();
    </script>
</body>
</html>