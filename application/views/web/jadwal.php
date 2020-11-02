<div class="wrapper row3">
  <main class="hoc container clear"> 
    <!-- main body -->
    <div class="content">
      <h1>Jadwal Ibadah Jemaat Marturia</h1>
      <p>Tabel Jadwal Ibadah Minggu Raya, Ibadah Kaum Bapak, Ibadah Kaum Wanita, Ibadah Kaum Mudah Baptis dan dan Sekolah Minggu Jemaat GBAI Marturia Manokwari.</p>
        <table>
          <thead>
            <tr>
              <th>Jenis Ibada</th>
              <th>Tanggal</th>
              <th>Jam Mulai</th>
              <th>Tempat</th>
              <th>Pelayan Firman</th>
              <th>Pelayan Pujian</th>
            </tr>
          </thead>
          <tbody>
            <?php foreach($jadwal as $data){ ?>
              <tr>
                <td><?=$data['ibd_kategori']?></td>
                <td><?=$data['ibd_tgl']?></td>
                <td><?=$data['ibd_jam']?></td>
                <td><?=$data['ibd_tempat']?></td>
                <td><?=$data['ibd_firman']?></td>
                <td><?=$data['ibd_pujian']?></td>
              </tr>
            <?php } ?>
          </tbody>
        </table>
      </div>
    </div>
  </main>
</div>