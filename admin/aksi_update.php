<?php
include '../env.php';
include '../auth/cek_session.php';

require '../vendor/autoload.php';

use Rakit\Validation\Validator;

$id = $_POST['id'];

$_SESSION['form_update_pegawai'] = $_POST;

$validator = new Validator;

$validator->setTranslations([
    'and' => 'dan',
    'or' => 'atau',
]);

$validation = $validator->make($_POST + $_FILES, [
    'nama_lengkap' => 'required',
    'nip' => 'required|digits:18',
    'tempat_lahir' => 'required',
    'jenis_kelamin' => 'required|in:Perempuan,Laki - laki',
    // 'status' => 'required',
    'status_perkawinan' => 'required',
    'agama' => 'required',
    'tempat_tugas' => 'required',
    'no_sk_pensiun' => 'nullable',
    'golongan' => 'required',
    'jabatan' => 'required',
    'eselon' => 'required',
    'pendidikan' => 'required',
    'telepon' => 'required',
    'alamat' => 'required',
    'foto' => 'nullable|uploaded_file|max:2M|mimes:png,jpeg,jpg,gif',
], [
    'required' => ':attribute harus diisi',
    'in' => ':attribute hanya boleh :allowed_values',
    'digits' => ':attribute harus angka dan panjangnya :length',
    'uploaded_file' => ':attribute harus berekstensi image dan maksimal 2MB'
]);

$validation->setAliases([
    'nama_lengkap' => 'Nama lengkap',
    'nip' => 'NIP',
    'tempat_lahir' => 'Tempar lahir',
    'tanggal_lahir' => 'Tanggal lahir',
    'jenis_kelamin' => 'Jenis kelamin',
    // 'status' => 'status',
    'status_perkawinan' => 'Status perkawinan',
    'agama' => 'Agama',
    'tempat_tugas' => 'Tempat tugas',
    'no_sk_pensiun' => 'No. SK Pensiun',
    'golongan' => 'Golongan',
    'jabatan' => 'Jabatan',
    'eselon' => 'Eselon',
    'pendidikan' => 'Pendidikan',
    'telepon' => 'Telepon',
    'alamat' => 'Alamat',
    'foto' => 'Foto'
]);

$validation->validate();

if ($validation->fails()) {
    // handling errors
    $errors = $validation->errors()->all();
    $_SESSION['error_form_update_pegawai'] = $errors;
    header("location:edit_pegawai.php?alert=Data belum benar&id=$id");
    exit;
}

$nama_lengkap = $_POST['nama_lengkap'];
$nip = $_POST['nip'];
$tempat_lahir = $_POST['tempat_lahir'];
$tanggal_lahir = $_POST['tanggal_lahir'];
$jenis_kelamin = $_POST['jenis_kelamin'];
$foto = $_POST['foto'];
// $status = $_POST['status'];
$status_perkawinan = $_POST['status_perkawinan'];
$agama = $_POST['agama'];
$tempat_tugas = $_POST['tempat_tugas'];
$no_sk_pensiun = $_POST['no_sk_pensiun'];
$golongan = $_POST['golongan'];
$jabatan = $_POST['jabatan'];
$eselon = $_POST['eselon'];
$pendidikan = $_POST['pendidikan'];
$telepon = $_POST['telepon'];
$alamat = $_POST['alamat'];

$query = "SELECT id FROM pegawai WHERE nip='$nip' AND id!=$id";
$result = mysqli_query($koneksi, $query);

if (mysqli_num_rows($result) > 0) {
    header("location:edit_pegawai.php?alert=data_sudah_ada");
    return;
}

$rand = rand();
$ekstensi = array('png', 'jpg', 'jpeg', 'gif');
$filename = $_FILES['foto']['name'];
$ukuran = $_FILES['foto']['size'];
$ext = pathinfo($filename, PATHINFO_EXTENSION);

if ($_FILES['foto']['name'] != '') {
    $foto = $rand . '_' . $filename;
    move_uploaded_file($_FILES['foto']['tmp_name'], '../gambar/' . $rand . '_' . $filename);
}

// echo "UPDATE pegawai SET nama_lengkap='$nama_lengkap', nip='$nip', tempat_lahir='$tempat_lahir', tanggal_lahir='$tanggal_lahir', jenis_kelamin='$jenis_kelamin', foto='$foto', `status`='$status', masa_jabatan='$masa_jabatan', tempat_tugas='$tempat_tugas', no_sk_pensiun='$no_sk_pensiun', golongan='$golongan', gaji_pokok='$gaji_pokok' WHERE id=$id";

// die;
mysqli_query($koneksi, "UPDATE pegawai SET nama_lengkap='$nama_lengkap', nip='$nip', tempat_lahir='$tempat_lahir', tanggal_lahir='$tanggal_lahir', jenis_kelamin='$jenis_kelamin', nama_gambar='$foto', `status`='$status_perkawinan', `status_perkawinan`='$status_perkawinan', tempat_tugas='$tempat_tugas', no_sk_pensiun='$no_sk_pensiun', golongan='$golongan', jabatan='$jabatan', eselon='$eselon', pendidikan='$pendidikan', telepon='$telepon', alamat='$alamat' WHERE id=$id");
header("location:view_pegawai.php?alert=berhasil");
