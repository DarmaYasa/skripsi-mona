<?php
include '../env.php';
include '../auth/cek_session.php';

$id = $_POST['id'];

$rand = rand();
$ekstensi = array('pdf');
$files = [
    'berkas_sk_pns' => $_FILES['berkas_sk_pns'],
    'berkas_kenaikan_pangkat' => $_FILES['berkas_kenaikan_pangkat'],
    'kartu_pegawai' => $_FILES['kartu_pegawai'],
    'berkas_karsi_karsu' => $_FILES['berkas_karsi_karsu'],
    'kartu_keluarga' => $_FILES['kartu_keluarga'],
    'alamat_pensiun' => $_FILES['alamat_pensiun'],
];

$check = mysqli_query($koneksi, "SELECT * FROM berkas_pensiun WHERE id_pegawai=$id");

$hasData = false;
if (mysqli_num_rows($check) > 0) {
    $hasData = true;
    $data = mysqli_fetch_assoc($check);

    $berkas_sk_pns = $data['berkas_sk_pns'];
    $berkas_kenaikan_pangkat = $data['berkas_kenaikan_pangkat'];
    $kartu_pegawai = $data['kartu_pegawai'];
    $berkas_karsi_karsu = $data['berkas_karsi_karsu'];
    $kartu_keluarga = $data['kartu_keluarga'];
    $alamat_pensiun = $data['surat_ket_alamat_pensiun'];
}

foreach ($files as $key => $file) {
    if ($file || !isset($$key)) {
        $filename = $file['name'];
        $ukuran = $file['size'];
        $ext = pathinfo($filename, PATHINFO_EXTENSION);
        if (!in_array($ext, $ekstensi)) {
            header("location:form_berkas_pensiun.php?id='$id'&alert=gagal_ekstensi");
        }

        if ($ukuran > (5 * 1024 * 1024)) {
            header("location:form_berkas_pensiun.php?id='$id'&alert=gagal_ukuran");
        }
    }
}

foreach ($files as $key => $file) {
    if (!file_exists('../upload/' . $key)) {
        mkdir('../upload/' . $key, 0777, true);
    }
    $$key = '../upload/' . $key . '/' . time() . '_' . $key . '.pdf';
    move_uploaded_file($file['tmp_name'], $$key);
}

if ($hasData) {
    $query = "UPDATE berkas_pensiun SET berkas_sk_pns='$berkas_sk_pns', berkas_kenaikan_pangkat='$berkas_kenaikan_pangkat', kartu_pegawai='$kartu_pegawai', berkas_karsi_karsu='$berkas_karsi_karsu', kartu_keluarga='$kartu_keluarga', surat_ket_alamat_pensiun='$alamat_pensiun' WHERE id_pegawai='$id'";
    echo $query;
} else {
    $query = "INSERT INTO berkas_pensiun (id_pegawai, berkas_sk_pns, berkas_kenaikan_pangkat, kartu_pegawai, berkas_karsi_karsu, kartu_keluarga, surat_ket_alamat_pensiun, terverifikasi) VALUES ('$id', '$berkas_sk_pns', '$berkas_kenaikan_pangkat', '$kartu_pegawai', '$berkas_karsi_karsu', '$kartu_keluarga', '$alamat_pensiun', '0')";
}
if (mysqli_query($koneksi, $query)) {
    header("location:view_pensiun.php?alert=berhasil");
} else {
    header("location:view_pensiun.php?alert=gagal");
}
