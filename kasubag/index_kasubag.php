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

<body style="background-image: url('../dist/img/bg.jpeg'); background-size: cover; background-position: center; background-repeat: no-repeat; min-height: 100vh; margin: 0; padding: 0">


    <div id="app" style="z-index: 100 !important; position: relative">

        <nav class="navbar-light bg-light" style="border-bottom: 3px solid #eaeaea">
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
							<!-- <?php include '../admin/notif.php';?> -->
						</div>
                    </div>
                </div>
            </div>
        </nav>

        <!-- <hr class="hr-line" style="border-top: 2px solid #eaeaea"> -->

		<?php include "nav.php" ?>

        <main class="" >
            <div class="container">
                <div class="text-center mt-5">
                    <img src="../dist/img//logo-1.png" width="30%" class="rounded" alt="...">
                </div>
                <div class="text-center mt-3" >
                    <h1>Dinas Perindustrian dan Tenaga Kerja Kabupaten badung</h1>
                    <br>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Officiis blanditiis hic laudantium nihil sunt quos ad rerum aspernatur mollitia quod temporibus repudiandae rem voluptate reiciendis, ab harum aperiam, consequatur nostrum deserunt inventore? Voluptas reprehenderit necessitatibus ex corrupti blanditiis adipisci nam id repellat ut totam! Iusto recusandae ea doloribus cum exercitationem aliquam corrupti dolore accusantium et repellat sunt illo voluptas quam, dicta nisi quasi adipisci pariatur necessitatibus earum! Unde aliquid quos quasi voluptatum, in explicabo laboriosam at est minus molestias ea! Voluptatum molestias fugit corporis culpa blanditiis optio. Reprehenderit deleniti accusantium iure, dignissimos vitae mollitia ad, vero reiciendis, asperiores animi autem!</p>
                </div>
            </div>
        </main>

    </div>

    <div style="background: rgba(255,255,255, .8); min-height: 100vh; min-width: 100%; position: fixed; top: 0"></div>

    <!-- Bootstrap Bundle with Popper -->
    <script src="../dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>