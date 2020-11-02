<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!-- ==============================================
Konten (isi)
=============================================== -->
<div class="content-wrapper">
  <section class="content-header">
    <h1>
      Halaman Jadwal <?= $judul ?>
    </h1>
  </section>

  <section class="content">
    <div class="row">
      <div class="col-lg-12">
        <!-- Pesan Singkat -->
        <?= $this->session->flashdata('pesan')?>
      </div>
    </div>

    <div class="row">
      <div class="col-md-12">
        <div class="box  box-primary">
          <div class="box-header with-border1 bg-gray">
            <h3 class="box-title">Tabel Jadwal <?= $judul ?></h3>
            <a href="#" class="btn btn-primary pull-right" data-toggle="modal" data-target="#modal-tambah">Tambah Data Baru</a>
          </div>
          <!-- /.box-header -->
          <div class="box-body">
            <table id="example1" class="table table-bordered table-striped">
              <thead>
              <tr>
                <th>Jenis Ibadah</th>
                <th>Tanggal</th>
                <th>Jam</th>
                <th>Tempat Ibada</th>
                <th>Opsi</th>
              </tr>
              </thead>
              <tbody>
              <?php foreach($ibadah as $data){ ?>
              <tr>
                <td><?= $data['ibd_kategori'] ?></td>
                <td><?= $data['ibd_tgl'] ?></td>
                <td><?= $data['ibd_jam'] ?> - Selesai</td>
                <td><?= $data['ibd_tempat'] ?></td>
                <?php
                  $metod = "";
                  if($data['ibd_kategori'] == "Ibadah Minggu"){
                    $metod = "ibadah";
                  } elseif($data['ibd_kategori'] == "Kaum Bapak"){
                    $metod = "K_Bapak";
                  } elseif($data['ibd_kategori'] == "Kaum Ibu"){
                    $metod = "K_Ibu";
                  } elseif($data['ibd_kategori'] == "Kaum Muda"){
                    $metod = "K_Muda";
                  } else {
                    $metod = "S_Minggu";
                  }
                ?>
                <td>
                  <a class="btn btn-default" href="#" data-toggle="modal" data-target="#modal-lihat-<?= $data['ibd_id'] ?>"><i class="fa fa-eye"></i></a>
                  <a class="btn btn-primary" href="#" data-toggle="modal" data-target="#modal-edit-<?= $data['ibd_id'] ?>"><i class="fa fa-edit"></i></a>
                  <a class="btn btn-danger hapus" href="#" data-link="<?= base_url($metod.'/hapus/'.$data['ibd_id']); ?>"><i class="fa fa-trash"></i></a>
                </td>
              </tr>
              <?php } ?>
              </tbody>
              <tfoot>
              <tr>
                <th>Jenis Ibadah</th>
                <th>Tanggal</th>
                <th>Jam</th>
                <th>Tempat Ibada</th>
                <th>Opsi</th>
              </tr>
              </tfoot>
            </table>
          </div>
        </div>
      </div>
    </div>
  </section>
</div>



<!-- Modal Tambah Data -->
<div class="modal fade" id="modal-tambah">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header bg-gray">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Form Tambah Data <?= $judul ?></h4>
      </div>
      <div class="modal-body">
        <!-- form start -->
        <?php 
          $metod = "";
          if($judul == "Ibadah Minggu"){
            $metod = "Ibadah";
          } elseif($judul == "Kaum Bapak"){
            $metod = "K_Bapak";
          } elseif($judul == "Kaum Ibu"){
            $metod = "K_Ibu";
          } elseif($judul == "Kaum Muda"){
            $metod = "K_Muda";
          } else {
            $metod = "S_Minggu";
          }
        ?>
        <form action="<?= base_url($metod.'/tambah'); ?>" method="post">
          <div class="box-body">
            <div class="form-group">
              <label for="kat">Jenis Ibadah</label>
              <input class="form-control" type="text" name="kategori" id="kat" value="<?= $judul ?>" readonly>
            </div>
            <div class="form-group row">
              <div class="col-md-7">
                <label for="tgl">Tanggal Ibadah</label>
                <input type="date" name="tgl" class="form-control" id="tgl" required>
              </div>
              <div class="col-md-5">
                <label for="jam">Jam Ibadah</label>
                <input type="time" name="jam" class="form-control" id="jam" required>
              </div>
            </div>
            <div class="form-group">
              <label for="tempat">Tempat Ibadah</label>
              <input type="text" name="tempat" class="form-control" id="tempat" placeholder="Masukan Tempat Ibadah..." required>
            </div>
            <div class="form-group">
              <label for="firman">Pelayan Firman</label>
              <input type="text" name="firman" class="form-control" id="firman" placeholder="Masukan Pelayan Firman..." required>
            </div>
            <div class="form-group">
              <label for="pujian">Pelayan Puji-pujian</label>
              <input type="text" name="pujian" class="form-control" id="pujian" placeholder="Masukan Pelayan Pujian..." required>
            </div>
            <button type="submit" class="btn btn-primary btn-block">Simpan Data</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
<!-- /.modal tambah data -->


<!-- Modal edit Data -->
<?php foreach($ibadah as $i){ ?>
<div class="modal fade" id="modal-edit-<?= $i['ibd_id'] ?>">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header bg-gray">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Form Edit Data <?= $judul ?></h4>
      </div>
      <div class="modal-body">
        <!-- form start -->
        <?php
          $metod = "";
          if($i['ibd_kategori'] == "Ibadah Minggu"){
            $metod = "ibadah";
          } elseif($i['ibd_kategori'] == "Kaum Bapak"){
            $metod = "K_Bapak";
          } elseif($i['ibd_kategori'] == "Kaum Ibu"){
            $metod = "K_Ibu";
          } elseif($i['ibd_kategori'] == "Kaum Muda"){
            $metod = "K_Muda";
          } else {
            $metod = "S_Minggu";
          }
        ?>
        <form action="<?= base_url($metod.'/edit/'.$i['ibd_id']); ?>" method="post">
          <div class="box-body">
            <div class="form-group">
              <label for="kat">Jenis Ibadah</label>
              <input class="form-control" type="text" name="kategori" id="kat" value="<?= $i['ibd_kategori'] ?>" readonly>
            </div>
            <div class="form-group row">
              <div class="col-md-7">
                <label for="tgl">Tanggal Ibada</label>
                <input type="date" name="tgl" class="form-control" id="tgl" value="<?= $i['ibd_tgl'] ?>" required>
              </div>
              <div class="col-md-5">
                <label for="jam">Jam Ibadah</label>
                <input type="time" name="jam" class="form-control" id="jam" value="<?= $i['ibd_jam'] ?>" required>
              </div>
            </div>
            <div class="form-group">
              <label for="tempat">Tempat Ibadah</label>
              <input type="text" name="tempat" class="form-control" id="tempat" value="<?= $i['ibd_tempat'] ?>" required>
            </div>
            <div class="form-group">
              <label for="firman">Pelayan Firman</label>
              <input type="text" name="firman" class="form-control" id="firman" value="<?= $i['ibd_firman'] ?>" required>
            </div>
            <div class="form-group">
              <label for="pujian">Pelayan Puji-pujian</label>
              <input type="text" name="pujian" class="form-control" id="pujian" value="<?= $i['ibd_pujian']?>" required>
            </div>
            <button type="submit" class="btn btn-primary btn-block">Simpan Data</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
<?php } ?>
<!-- /.modal edit data -->


<!-- Modal View Data -->
<?php foreach($ibadah as $i){ ?>
<div class="modal fade" id="modal-lihat-<?= $i['ibd_id'] ?>">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header bg-gray">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Detail Jadwal <?= $judul ?></h4>
      </div>
      <table class="modal-body table">
        <tr>
          <td class="h5" width="130">Jenis Ibadah</td>
          <td class="h3"><?= $i['ibd_kategori'] ?></td>
        </tr>
        <tr>
          <td class="h5">Tanggal</td>
          <td class="h3"><?= $i['ibd_tgl'] ?></td>
        </tr>
        <tr>
          <td class="h5">Jam</td>
          <td class="h3"><?= $i['ibd_jam'] ?> - Selesai</td>
        </tr>
        <tr>
          <td class="h5">Tempat</td>
          <td class="h3"><?= $i['ibd_tempat'] ?></td>
        </tr>
        <tr>
          <td class="h5">Pelayan Firman</td>
          <td class="h3"><?= $i['ibd_firman'] ?></td>
        </tr>
        <tr>
          <td class="h5">Pelayan Pujian</td>
          <td class="h3"><?= $i['ibd_pujian'] ?></td>
        </tr>
      </table>
    </div>
  </div>
</div>
<?php } ?>
<!-- /.modal View data -->