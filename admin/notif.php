
<?php
    $query = "SELECT pegawai.id, pegawai.nama_lengkap, pegawai.tanggal_lahir, pensiun.tanggal_pensiun FROM pegawai LEFT JOIN pensiun ON pegawai.id=pensiun.id_pegawai LEFT JOIN berkas_pensiun ON pensiun.id=berkas_pensiun.id_pensiun WHERE (DATEDIFF(CURDATE(), pegawai.tanggal_lahir) > 21079 OR DATEDIFF(pensiun.tanggal_pensiun, CURDATE()) < 91) AND berkas_pensiun.id IS null";
    $result = mysqli_query($koneksi, $query);
    $data = mysqli_fetch_all($result, MYSQLI_ASSOC);
?>
<div class="dropdown">
  <button class="btn dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
    <i class="fa fa-bell" aria-hidden="true"></i>
  </button>
  <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="dropdownMenuButton1" style="max-height: 500px; overflow-y: auto;">
      <?php foreach($data as $item): ?>
        <?php 
            $tanggal_lahir_timestamp = strtotime($item['tanggal_lahir']);
            $tanggal_pensiun_timestamp = strtotime($item['tanggal_pensiun']);
            $tanggal_lahir = new DateTime($item['tanggal_lahir']);    
            $tanggal_pensiun = new DateTime($item['tanggal_pensiun']);
            $now = new DateTime();
            $used_date = $tanggal_pensiun;
            
            if($tanggal_lahir_timestamp > $tanggal_pensiun_timestamp) {
                $used_date = (clone $tanggal_lahir)->modify("+58 years");
            }

            $month = intval(($used_date->getTimeStamp() - $now->getTimeStamp()) / (24 * 60 * 60 * 30));
            $remain = ($used_date->getTimeStamp() - $now->getTimeStamp())%(24 * 60 * 60 * 30);
            $day = intval($remain / (24 * 60 * 60));
            $remain = $remain%(24 * 60 * 60);
            $hour = intval($remain / (60 * 60));

        ?>
        <li><a class="dropdown-item"  style="width: 300px; white-space: normal !important; border-bottom: 1px solid #eaeaea" href="input_pensiun.php?id=<?= $item['id'] ?>">pegawai atas <?= $item['nama_lengkap'] ?> ini akan pensiun dalam jangka waktu <?= $month ?> bulan <?= $day ?> hari <?= $hour ?> jam</a></li>
    <?php endforeach; ?>
  </ul>
</div>
