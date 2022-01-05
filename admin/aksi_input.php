<?php 

include '../env.php';
include '../auth/cek_session.php';

$nama_lengkap = $_POST['nama_lengkap'];
$nip = $_POST['nip'];
$tempat_lahir = $_POST['tempat_lahir'];
$tanggal_lahir = $_POST['tanggal_lahir'];
$jenis_kelamin = $_POST['jenis_kelamin'];
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


$query = "SELECT id FROM pegawai WHERE nip='$nip'";
$result = mysqli_query($koneksi, $query);
if(mysqli_num_rows($result) > 0) {
	header("location:view_pegawai.php?alert=data_sudah_ada");
	return;
}


$rand = rand();
$ekstensi =  array('png','jpg','jpeg','gif');
$filename = $_FILES['foto']['name'];
$ukuran = $_FILES['foto']['size'];
$ext = pathinfo($filename, PATHINFO_EXTENSION);

if(!in_array($ext,$ekstensi) ) {
	header("location:view_pegawai.php?alert=gagal_ekstensi");
}else{
	if($ukuran < 1044070){		
		$xx = $rand.'_'.$filename;
		move_uploaded_file($_FILES['foto']['tmp_name'], '../gambar/'.$rand.'_'.$filename);
		mysqli_query($koneksi, "INSERT INTO pegawai (`nama_gambar`, `nama_lengkap`, `nip`, `tempat_lahir`, `tanggal_lahir`, `jenis_kelamin`, `status`, `agama`, `tempat_tugas`, `no_sk_pensiun`, `golongan`, `jabatan`, `eselon`, `alamat`, `telepon`, `pendidikan`) VALUES('$xx','$nama_lengkap','$nip','$tempat_lahir','$tanggal_lahir','$jenis_kelamin','$status','$agama','$tempat_tugas','$no_sk_pensiun','$golongan','$jabatan', '$eselon', '$pendidikan', '$telepon', '$alamat')");
		header("location:view_pegawai.php?alert=berhasil");
	}else{
		header("location:view_pegawai.php?alert=gagal_ukuran");
	}
}

?>