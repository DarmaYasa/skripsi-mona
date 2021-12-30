<?php
include '../env.php';
include '../auth/cek_session.php';

$id = $_POST['id'];

$nama_lengkap = $_POST['nama_lengkap'];
$nip = $_POST['nip'];
$tempat_lahir = $_POST['tempat_lahir'];
$tanggal_lahir = $_POST['tanggal_lahir'];
$jenis_kelamin = $_POST['jenis_kelamin'];
$foto = $_POST['foto'];
$status = $_POST['status'];
$agama = $_POST['agama'];
$tempat_tugas = $_POST['tempat_tugas'];
$no_sk_pensiun = $_POST['no_sk_pensiun'];
$golongan = $_POST['golongan'];
$jabatan = $_POST['jabatan'];
$eselon = $_POST['eselon'];
$pendidikan = $_POST['pendidikan'];
$telepon = $_POST['telepon'];
$alamat = $_POST['alamat'];

$rand = rand();
$ekstensi = array('png', 'jpg', 'jpeg', 'gif');
$filename = $_FILES['foto']['name'];
$ukuran = $_FILES['foto']['size'];
$ext = pathinfo($filename, PATHINFO_EXTENSION);

if ($_FILES['foto']['name'] != '') {

    if (!in_array($ext, $ekstensi)) {
        header("location:view_pegawai.php?alert=gagal_ekstensi");
    } else if ($ukuran >= 1044070) {
        header("location:view_pegawai.php?alert=gagal_ukuran");
    }

    $foto = $rand . '_' . $filename;
    move_uploaded_file($_FILES['foto']['tmp_name'], '../gambar/' . $rand . '_' . $filename);
}

// echo "UPDATE pegawai SET nama_lengkap='$nama_lengkap', nip='$nip', tempat_lahir='$tempat_lahir', tanggal_lahir='$tanggal_lahir', jenis_kelamin='$jenis_kelamin', foto='$foto', `status`='$status', masa_jabatan='$masa_jabatan', tempat_tugas='$tempat_tugas', no_sk_pensiun='$no_sk_pensiun', golongan='$golongan', gaji_pokok='$gaji_pokok' WHERE id=$id";

// die;
mysqli_query($koneksi, "UPDATE pegawai SET nama_lengkap='$nama_lengkap', nip='$nip', tempat_lahir='$tempat_lahir', tanggal_lahir='$tanggal_lahir', jenis_kelamin='$jenis_kelamin', nama_gambar='$foto', `status`='$status', tempat_tugas='$tempat_tugas', no_sk_pensiun='$no_sk_pensiun', golongan='$golongan', jabatan='$jabatan', eselon='$eselon', pendidikan='$pendidikan', telepon='$telepon', alamat='$alamat' WHERE id=$id");
header("location:view_pegawai.php?alert=berhasil");
