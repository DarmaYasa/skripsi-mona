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
                        <div class="col-sm-7"></div>
						<div class="col-sm-1">
							<?php include 'notif.php'; ?>
						</div>
                    </div>
                </div>
            </div>
        </nav>

        <hr class="hr-line">

        <?php include "nav.php" ?>

        <main class="">
            <div class="jumbotron text-dark" style="background-color: #63ccc5;color: #63ccc5; height: 10px;">
            </div>

            <div class="jumbotron text-dark"
                style="background-color: #63ccc5;color: #63ccc5; height: 80px; margin-bottom: 20px;">
                <div class="container">
                    <div class="">
                        <h3 class="">Berkas Pensiun</h3>
                    </div>
                    <div class="row">
                        <div class="col-sm-1 text-end">
                            <a href="">
                                <font color="black">Beranda</font>
                            </a>
                        </div>
                        >
                        <div class="col text-start">
                            <p>Berkas Pensiun</p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="container">

                <div class="row">
                    <div class="col"></div>
                    <div class="col-lg-7">
                        <p>**File yang diperbolehkan hanya file pdf</p>
                        
                        <?php
                    $id = $_GET["id"];
					$data = "SELECT pensiun.*, berkas_pensiun.* FROM pensiun LEFT JOIN berkas_pensiun ON pensiun.id=berkas_pensiun.id_pensiun WHERE pensiun.id='$id' LIMIT 1";
					$sql_d = mysqli_query($koneksi, $data);
					$row_d = mysqli_num_rows($sql_d);

					if($row_d > 0){
						while($d = mysqli_fetch_assoc($sql_d)){ 
                            // print_r($d);
                            if($d['terverifikasi'] == 2) {
                                echo ' <div class="alert alert-danger" role="alert">';
                                    echo "<strong>Revisi</strong> <br>";
                                    echo "Keterangan : " . $d['keterangan'];
                                echo '</div>';
                            } elseif($d['terverifikasi'] == 1) {
                                echo ' <div class="alert alert-success" role="alert">';
                                    echo "<strong>Berkas terverifikasi!</strong> <br>";
                                    echo "Keteragan : " . $d['keterangan'];
                                echo '</div>';
                            }
                            echo "<form action='aksi_input_pensiun.php' method='post' enctype='multipart/form-data'>";
                            echo "<input type='hidden' name='id' value=".$id.">";
                                echo "<table class='table table-secondary'>";
                                echo "<thead>";
                                    echo "<tr>";
                                        echo "<th scope='col'>Nama File</th>";
                                        echo "<th scope='col'>Opsi</th>";
                                    echo "</tr>";
                                echo "</thead>";
                                echo "<tbody>";
                                    echo "<tr>";
                                        echo "<td>Berkas SK PNS</td>";
                                        echo "<td style='width:300px;'>";
                                            echo "<input class='form-control' type='file' accept='.pdf' id='formFile' accept='application/pdf' name='berkas_sk_pns' value=".$d['berkas_sk_pns'].">";
                                            if($d['berkas_sk_pns']) {
                                                echo "<a href='" . $d['berkas_sk_pns'] . "'>Lihat File</a>";
                                            }
                                        echo "</td>";
                                    echo "</tr>";
                                    echo "<tr>";
                                        echo "<td>Berkas Kenaikan Pangkat Terakhir</td>";
                                        echo "<td style='width:300px;'>";
                                            echo "<input class='form-control' type='file' accept='.pdf' id='formFile' accept='application/pdf' name='berkas_kenaikan_pangkat' value=".$d['berkas_kenaikan_pangkat'].">";
                                            if($d['berkas_kenaikan_pangkat']) {
                                                echo "<a href='" . $d['berkas_kenaikan_pangkat'] . "'>Lihat File</a>";
                                            }
                                        echo "</td>";
                                    echo "</tr>";
                                    echo "<tr>";
                                        echo "<td>Kartu Pegawai</td>";
                                        echo "<td style='width:300px;'>";
                                            echo "<input class='form-control' type='file' accept='.pdf' id='formFile' accept='application/pdf' name='kartu_pegawai' value=".$d['kartu_pegawai'].">";
                                            if($d['kartu_pegawai']) {
                                                echo "<a href='" . $d['kartu_pegawai'] . "'>Lihat File</a>";
                                            }
                                        echo "</td>";
                                    echo "</tr>";
                                    echo "<tr>";
                                        echo "<td>Berkas Karsi / Karsu</td>";
                                        echo "<td style='width:300px;'>";
                                            echo "<input class='form-control' type='file' accept='.pdf' id='formFile' accept='application/pdf' name='berkas_karsi_karsu' value=".$d['berkas_karsi_karsu'].">";
                                            if($d['berkas_karsi_karsu']) {
                                                echo "<a href='" . $d['berkas_karsi_karsu'] . "'>Lihat File</a>";
                                            }
                                        echo "</td>";
                                    echo "</tr>";
                                    echo "<tr>";
                                        echo "<td>Kartu Keluarga</td>";
                                        echo "<td style='width:300px;'>";
                                            echo "<input class='form-control' type='file' accept='.pdf' id='formFile' accept='application/pdf' name='kartu_keluarga' value=".$d['kartu_keluarga'].">";
                                            if($d['kartu_keluarga']) {
                                                echo "<a href='" . $d['kartu_keluarga'] . "'>Lihat File</a>";
                                            }
                                        echo "</td>";
                                    echo "</tr>";
                                    echo "<tr>";
                                        echo "<td>Surat Ket. Alamat Pensiun</td>";
                                        echo "<td style='width:300px;'>";
                                            echo "<input class='form-control' type='file' accept='.pdf' id='formFile' accept='application/pdf' name='alamat_pensiun' value=".$d['surat_ket_alamat_pensiun'].">";
                                            if($d['surat_ket_alamat_pensiun']) {
                                                echo "<a href='" . $d['surat_ket_alamat_pensiun'] . "'>Lihat File</a>";
                                            }
                                        echo "</td>";
                                    echo "</tr>";
                                echo "</tbody>";
                                echo "</table>";

                                echo "</div>";
                                echo "<div class='col'></div>";
                            echo "</div>";

                            echo "<div class='row'>";
                                echo "<div class='col'></div>";
                                echo "<div class='col-lg-7'>";
                                 echo "<div class='text-end'>";
                                    if($d['id'] && $d['terverifikasi'] != 1) {
                                        echo "<input class='btn btn-danger mr-2 rounded-0' type='submit' formaction='aksi_delete_pensiun.php' value='Hapus' style='margin-right: 2px'>";
                                    }
                                    if($d['terverifikasi'] != 1) {
                                        echo "<input class='btn btn-primary rounded-0' type='submit' value='Simpan'>";
                                    }
                                echo "</div>";
                                echo "</div>";
                                echo "<div class='col'></div>";
                            echo "</div>";

                            echo "</form>";
                            }
                        }else{ 
                            echo "<tr><td colspan='4'>Data tidak ada</td></tr>";
                        }

                    ?>

            </div>
        </main>

    </div>

    <!-- Bootstrap Bundle with Popper -->
    <script src="../dist/js/bootstrap.bundle.min.js"></script>
</body>