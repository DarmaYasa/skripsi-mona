<?php include '../env.php'; include '../auth/cek_session.php'; include 'cek_level.php'; ?>

<?php 
	if(isset($_GET['pesan'])){
		if($_GET['pesan']=="gagal"){
			echo "<div class='alert'>Username dan Password tidak sesuai !</div>";
		}
	}
?>

<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<title></title>


	<!-- Fonts -->
	<link rel="dns-prefetch" href="//fonts.gstatic.com">
	<link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

	<!-- Bootstrap CSS -->
	<link rel="stylesheet" href="../dist/css/bootstrap.min.css">

	<!-- icon -->
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

	<style>
		input {
			text-align: center;
			color: #000000;
		}

		::-webkit-input-placeholder {
			text-align: center;
			color: #000000;
		}

		:-moz-placeholder {
			text-align: center;
			color: #000000;
		}

		.hr-line {
            margin: 0px;
        }
	</style>
</head>

<body>

	<?php 
		if(isset($_GET['alert'])){
			if($_GET['alert']=='gagal_ekstensi'){
				?>
	<div class="alert alert-warning alert-dismissible">
		<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
		<h4><i class="icon fa fa-warning"></i> Peringatan !</h4>
		Ekstensi Tidak Diperbolehkan
	</div>
	<?php
			}elseif($_GET['alert']=="gagal_ukuran"){
				?>
	<div class="alert alert-warning alert-dismissible">
		<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
		<h4><i class="icon fa fa-check"></i> Peringatan !</h4>
		Ukuran File terlalu Besar
	</div>
	<?php
			}elseif($_GET['alert']=="berhasil"){
				?>
	<div class="alert alert-success alert-dismissible">
		<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
		<h4><i class="icon fa fa-check"></i> Success</h4>
		Berhasil Disimpan
	</div>
	<?php
			}
		}
		?>

	<div id="app">

		<nav class="navbar-light bg-light">
			<div class="container">
				<div class="mt-2">
					<div class="row">
						<div class="col-sm-1">
							<a class="navbar-brand" href="/">
								<img src="../dist/img//logo-1.png" alt="" width="70">
							</a>
						</div>

						<div class="col-sm-3">
							<div class="mt-2">
								<p class="text-dark">Dinas Perindustrian dan Tenaga Kerja Kabupaten badung</p>
							</div>
						</div>
					</div>
				</div>
			</div>
		</nav>

		<hr class="hr-line">

		<nav class="navbar navbar-expand-sm navbar-light bg-light">
			<div class="container">
				<button class="navbar-toggler" type="button" data-toggle="collapse"
					data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
					aria-label="Toggle navigation">
					<span class="navbar-toggler-icon"></span>
				</button>

				<div class="collapse navbar-collapse"></div>

				<div class="collapse navbar-collapse" id="navbarSupportedContent">
					<ul class="navbar-nav mr-auto">
						<li class="nav-item active">
							<a class="nav-link text-dark" href="index_admin.php">Beranda</a>
						</li>
						<li class="nav-item">
							<a class="nav-link text-dark active" href="view_pegawai.php">Pegawai</a>
						</li>
						<li class="nav-item">
							<a class="nav-link text-dark" href="view_pensiun.php">Pensiun</a>
						</li>
						<li class="nav-item">
							<a class="nav-link text-dark" href="#">Tentang</a>
						</li>
						<li class="nav-item">
                            <a class="nav-link text-danger" href="../auth/logout.php">Logout</a>
                        </li>
					</ul>
				</div>
			</div>
		</nav>

		<main class="">
			<div class="jumbotron text-dark" style="background-color: #63ccc5;color: #63ccc5; height: 10px;">
			</div>

			<div class="jumbotron text-dark"
				style="background-color: #63ccc5;color: #63ccc5; height: 80px; margin-bottom: 20px;">
				<div class="container">
					<div class="">
						<h3 class="">Detail Data Pegawai Pensiun</h3>
					</div>
					<div class="row">
						<div class="col-sm-1 text-end">
							<a href="">
								<font color="black">Beranda</font>
							</a>
						</div>
						>
						<div class="col text-start">
							<p>
								<a href="view_pegawai.php">
									<font color="black">Pegawai</font>
								</a>
								 &nbsp > &nbsp Detail Data Pegawai Pensiun</p>
						</div>
					</div>
				</div>
			</div>

			<div class="container">
				<?php
					$id = $_GET["id"];
					$query = "SELECT pensiun.*, pegawai.nama_gambar FROM pensiun JOIN pegawai ON pegawai.id=pensiun.id_pegawai WHERE pensiun.id_pegawai=$id LIMIT 1";
					$result = mysqli_query($koneksi, $query);

                    if(mysqli_num_rows($result) > 0	) {
                        $data = mysqli_fetch_assoc($result);
                    } else {
                        $data = null;
                    }
				?>

                <?php if($data == null): ?>
                    Data tidak ada
                <?php else: ?>
                <div class="row mx-auto">
					<div class="col-sm-2"></div>
					<div class="col-sm-2">
						<img src="../gambar/<?= $data['nama_gambar'] ?>" width="150px">
					</div>
					<div class="col-sm-5">
						<table class="table">
							<tr>
								<th scope="row">Nama</th>
								<td><?= $data['nama'] ?></td>
							</tr>
							<tr>
								<th scope="row">NIP</th>
								<td><?= $data['nip'] ?></td>
							</tr>
							<tr>
								<th scope="row">Unit Kerja</th>
								<td><?= $data['unit_kerja'] ?></td>
							</tr>
							<tr>
								<th scope="row">Status</th>
								<td><?= $data['status'] == 1 ? 'Aktif' : 'Pensiun' ?></td>
							</tr>
							<tr>
								<th scope="row">Alamat Pensiun</th>
								<td><?= $data['alamat_pensiun'] ?></td>
							</tr>
							<tr>
								<th scope="row">Berhenti Akhir Bulan</th>
								<td><?= $data['berhenti_akhir_bulan'] ?></td>
							</tr>
							<tr>
								<th scope="row">Tanggal Pensiun</th>
								<td><?= $data['tanggal_pensiun'] ?></td>
							</tr>
							<tr>
								<th scope="row">Masa Kerja Pensiun</th>
								<td><?= $data['masa_kerja_pensiun'] . ' tahun' ?></td>
							</tr>
							<tr>
								<th scope="row">Gaji Pokok</th>
								<td><?= $data['gaji_pokok'] ?></td>
							</tr>
							<tr>
								<th scope="row">Keterangan</th>
								<td><?= $data['keterangan'] ?></td>
							</tr>
						</table>
						<div class="text-end">
							<a href="form_berkas_pensiun.php?id=<?= $data['id_pegawai'] ?>" class="btn btn-warning rounded-0 mr-2">Berkas Pensiun</a>
							<a href="input_pensiun.php?id=<?= $data['id_pegawai'] ?>" class="btn btn-success rounded-0">Ubah Data</a>
						</div>
					</div>
				</div>
                <?php endif; ?>
			</div>
		</main>

	</div>

	<!-- Bootstrap Bundle with Popper -->
	<script src="./dist/js/bootstrap.bundle.min.js"></script>
	<script>
		deleteData() {
			return confirm('Yaki?');
		}
	</script>
</body>