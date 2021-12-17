<?php include '../env.php';include '../auth/cek_session.php'; include 'cek_level.php';?>

<?php

if (isset($_GET['pesan'])) {
    if ($_GET['pesan'] == "gagal") {
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
			/* text-align: center; */
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

		if (isset($_GET['alert'])) {
			if ($_GET['alert'] == 'gagal_ekstensi') {
				?>
			<div class="alert alert-warning alert-dismissible">
				<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
				<h4><i class="icon fa fa-warning"></i> Peringatan !</h4>
				Ekstensi Tidak Diperbolehkan
			</div>
			<?php
		} elseif ($_GET['alert'] == "gagal_ukuran") {
				?>
			<div class="alert alert-warning alert-dismissible">
				<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
				<h4><i class="icon fa fa-check"></i> Peringatan !</h4>
				Ukuran File terlalu Besar
			</div>
			<?php
		} elseif ($_GET['alert'] == "berhasil") {
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
						<h3 class="">Tambah Data Pegawai</h3>
					</div>
					<div class="row">
						<div class="col-sm-1 text-end">
							<a href="index_admin.php">
								<font color="black">Beranda</font>
							</a>
						</div>
						>
						<div class="col text-start">
							<p>
								<a href="view_pegawai.php">
									<font color="black">Pegawai</font>
								</a>
								 &nbsp > &nbsp Tambah Data Pegawai</p>
						</div>
					</div>
				</div>
			</div>

			<div class="container">
            <?php 
                $id = $_GET['id'];
                $query = "SELECT * FROM pegawai WHERE id = '$id' LIMIT 1";

                $result_query = mysqli_query($koneksi, $query);

                if(mysqli_num_rows($result_query) > 0) {
                    $data = mysqli_fetch_assoc($result_query);
                } else {
                    header("location: view_pegawai.php");
                }
            ?>
		<h2 style="text-align: center;">Edit Data Pegawai</h2>
		<form action="aksi_update.php" method="post" enctype="multipart/form-data">
			<div class="form-group">
				<label>Foto :</label>
				<input type="file" name="foto" required="required">
				<p style="color: red">Ekstensi yang diperbolehkan .png | .jpg | .jpeg | .gif</p>
			</div>
			<input type="hidden" name="foto" id="" required="required" value="<?= $data['foto'] ?>">
			<div class="form-group">
				<label for="">Nama Lengkap :</label>
				<input type="text" class="form-control" name="nama_lengkap" id="" required="required" value="<?= $data['nama_lengkap'] ?>">
				<input type="hidden" class="form-control" name="id" id="" required="required" value="<?= $data['id'] ?>">
			</div>
			<div class="form-group">
				<label>NIP :</label>
				<input type="text" class="form-control" name="nip" required="required" value="<?= $data['nip'] ?>">
			</div>
			<div class="form-group">
				<label>Tempat Lahir :</label>
				<input type="text" class="form-control" name="tempat_lahir" required="required" value="<?= $data['tempat_lahir'] ?>">
			</div>
			<div class="form-group">
				<label>Tanggal Lahir :</label>
				<input type="date" class="form-control" name="tanggal_lahir" required="required" value="<?= $data['tanggal_lahir'] ?>">
			</div>
			<div class="form-group">
				<label>Jenis Kelamin :</label>
				<select name="jenis_kelamin" required class="form-control">
					<option value="" disabled selected>-Pilih Jenis Kelamin-</option>
					<option value="Perempuan" <?= $data['jenis_kelamin'] == 'Perempuan' ? 'selected' : '' ?>>Perempuan</option>
					<option value="Laki - laki" <?= $data['jenis_kelamin'] == 'Laki - laku' ? 'selected' : '' ?>>Laki - laki</option>
				</select>
			</div>
			<div class="form-group">
				<label>Status :</label>
				<input type="text" class="form-control" name="status" required="required" value="<?= $data['status'] ?>">
			</div>
			<div class="form-group">
				<label>Agama :</label>
				<select name="agama" required class="form-control">
					<option value="" disabled selected>-Select Agama-</option>
					<option value="Hindu" <?= $data['agama'] == 'Hindu' ? 'selected' : '' ?>>Hindu</option>
					<option value="Islam" <?= $data['agama'] == 'Islam' ? 'selected' : '' ?>>Islam</option>
					<option value="Katolik" <?= $data['agama'] == 'Katolik' ? 'selected' : '' ?>>Katolik</option>
					<option value="Protestan" <?= $data['agama'] == 'Protestan' ? 'selected' : '' ?>>Protestan</option>
					<option value="Budha" <?= $data['agama'] == 'Budha' ? 'selected' : '' ?>>Budha</option>
					<option value="Konghucu" <?= $data['agama'] == 'Konghucu' ? 'selected' : '' ?>>Konghucu</option>
				</select>
			</div>
			<div class="form-group">
				<label>Masa Jabatan :</label>
				<input type="date" class="form-control" name="masa_jabatan" required="required" value="<?= $data['masa_jabatan'] ?>">
			</div>
			<div class="form-group">
				<label>Tempat Tugas :</label>
				<input type="text" class="form-control" name="tempat_tugas" required="required" value="<?= $data['tempat_tugas'] ?>">
			</div>
			<div class="form-group">
				<label>No.SK.Pensiun :</label>
				<input type="text" class="form-control" name="no_sk_pensiun" required="required" value="<?= $data['no_sk_pensiun'] ?>">
			</div>
			<div class="form-group">
				<label>Golongan :</label>
				<input type="text" class="form-control" name="golongan" required="required" value="<?= $data['golongan'] ?>">
			</div>
			<div class="form-group">
				<label>Gaji Pokok :</label>
				<input type="number" class="form-control" name="gaji_pokok" required="required" value="<?= $data['gaji_pokok'] ?>">
			</div>
			<!-- <input type="submit" name="" value="Hapus" formaction="aksi_delete.php" class="btn btn-danger mr-2"> -->
			<input type="submit" name="" value="Simpan" class="btn btn-primary">
		</form>
	</div>

		</main>

	</div>

	<!-- Bootstrap Bundle with Popper -->
	<script src="./dist/js/bootstrap.bundle.min.js"></script>
</body>