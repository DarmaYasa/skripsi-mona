<?php
    $current_page = str_replace(('/' . explode('/', $_SERVER['PHP_SELF'])[1] . '/admin/'), '', $_SERVER['PHP_SELF']);

    // echo $current_page;

    $mapping = [
        'beranda' => [
           'index_admin.php',
        ],
        'pegawai' => [
           'view_pegawai.php',
           'input_pegawai.php',
           'edit_pegawai.php',
           'detail_pegawai.php',
           'form_pangkat.php',
           'form_masa_kerja.php',
        ],
        'pensiun' => [
            'view_pensiun.php',
            'print_pensiun.php',
            'detail_pensiun.php',
            'form_berkas_pensiun.php',
        ]
    ];

?>

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
                    <a class="nav-link text-dark <?= in_array($current_page, $mapping['beranda']) ? 'fw-bold' : '' ?>" href="index_admin.php">Beranda</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-dark <?= in_array($current_page, $mapping['pegawai']) ? 'fw-bold' : '' ?>" href="view_pegawai.php">Pegawai</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-dark <?= in_array($current_page, $mapping['pensiun']) ? 'fw-bold' : '' ?>" href="view_pensiun.php">Pensiun</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-danger" href="../auth/logout.php">Logout</a>
                </li>
            </ul>
        </div>
    </div>
</nav>