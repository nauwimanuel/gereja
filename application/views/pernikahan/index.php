<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!-- ==============================================
Konten (isi)
=============================================== -->
<div class="content-wrapper">
  <section class="content-header">
    <h1>
      Halaman <?= $judul ?>
    </h1>
  </section>

  <a href="" style="font-size: 18"></a>

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
            <h3 class="box-title">Tabel <?= $judul ?></h3>
            <a href="#" class="btn btn-primary pull-right" data-toggle="modal" data-target="#modal-tambah">Tambah Data Baru</a>
          </div>
          <!-- /.box-header -->
          <div class="box-body">
            <table id="example1" class="table table-bordered table-striped">
              <thead>
              <tr>
                <th>No Surat</th>
                <th>Tanggal</th>
                <th>Nama Pria</th>
                <th>Nama Wanita</th>
                <th>File Scaand</th>
                <th>Opsi</th>
              </tr>
              </thead>
              <tbody>
              <?php foreach($pernikahan as $data){ ?>
              <tr>
                <td><?= $data['per_nos'] ?></td>
                <td><?= $data['per_tgl'] ?></td>
                <td><?= $data['per_namap'] ?></td>
                <td><?= $data['per_namaw'] ?></td>
                <td><a target="_blank" href="<?=base_url('assets/img/upload/'.$data['per_file'])?>"><?=$data['per_file']?></a></td>
                <td>
                  <a class="btn btn-default" href="#" data-toggle="modal" data-target="#modal-lihat-<?= $data['per_id'] ?>"><i class="fa fa-eye"></i></a>
                  <a class="btn btn-primary" href="#" data-toggle="modal" data-target="#modal-edit-<?= $data['per_id'] ?>"><i class="fa fa-edit"></i></a>
                  <a class="btn btn-danger hapus" href="#" data-link="<?= base_url('pernikahan/hapus/'.$data['per_id']); ?>"><i class="fa fa-trash"></i></a>
                </td>
              </tr>
              <?php } ?>
              </tbody>
              <tfoot>
              <tr>
                <th>No Surat</th>
                <th>Tanggal</th>
                <th>Nama Pria</th>
                <th>Nama Wanita</th>
                <th>File Scannd</th>
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
        <form action="<?= base_url('pernikahan/tambah'); ?>" method="post" enctype="multipart/form-data" role="form">
          <div class="box-body">
            <div class="form-group">
              <label for="nos">No Surat Pernikahan</label>
              <input type="text" name="nos" class="form-control" id="nos" placeholder="Masukan No Surat..." required>
            </div>
            <div class="form-group">
              <label for="tgl">Tanggal Pernikahan</label>
              <input type="date" name="tgl" class="form-control" id="tgl" required>
            </div>
            <div class="form-group">
              <label for="namap">Nama Lengkap Pria</label>
              <input type="text" name="namap" class="form-control" id="namap" placeholder="Masukan Nama Pria..." required>
            </div>
            <div class="form-group">
              <label for="namaw">Nama Lengkap Wanita</label>
              <input type="text" name="namaw" class="form-control" id="namaw" placeholder="Masukan Nama Wanita..." required>
            </div>
            <div class="form-group">
              <label for="pdt">Nama Pendeta</label>
              <input type="text" name="pdt" class="form-control" id="pdt" placeholder="Masukan Nama Pendeta..." required>
            </div>
            <div class="form-group">
              <label for="lks">Lokasi Pernikahan</label>
              <input type="text" name="lks" class="form-control" id="lks" placeholder="Masukan Lokasi Pernikahan..." required>
            </div>
            <div class="form-group">
              <label for="file">Pilih File</label>
              <input type="file" name="file" id="file" required>
              <p class="help-block"><small class="text-danger">Ekstensi file yang disetujui (.pdf).</small></p>
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
<?php foreach ($pernikahan as $data) { ?>
<div class="modal fade" id="modal-edit-<?= $data['per_id'] ?>">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header bg-gray">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Form Tambah Data <?= $judul ?></h4>
      </div>
      <div class="modal-body">
        <!-- form start -->
        <form action="<?= base_url('pernikahan/edit/'.$data['per_id']); ?>" method="post" enctype="multipart/form-data" role="form">
          <div class="box-body">
            <div class="form-group">
              <label for="nos">No Surat Pernikahan</label>
              <input type="text" name="nos" class="form-control" id="nos" value="<?=$data['per_nos']?>" required>
            </div>
            <div class="form-group">
              <label for="tgl">Tanggal Pernikahan</label>
              <input type="date" name="tgl" class="form-control" id="tgl" value="<?=$data['per_tgl']?>" required>
            </div>
            <div class="form-group">
              <label for="namap">Nama Lengkap Pria</label>
              <input type="text" name="namap" class="form-control" id="namap" value="<?=$data['per_namap']?>" required>
            </div>
            <div class="form-group">
              <label for="namaw">Nama Lengkap Wanita</label>
              <input type="text" name="namaw" class="form-control" id="namaw" value="<?=$data['per_namaw']?>" required>
            </div>
            <div class="form-group">
              <label for="pdt">Nama Pendeta</label>
              <input type="text" name="pdt" class="form-control" id="pdt" value="<?=$data['per_pdt']?>" required>
            </div>
            <div class="form-group">
              <label for="lks">Lokasi Pernikahan</label>
              <input type="text" name="lks" class="form-control" id="lks" value="<?=$data['per_lks']?>" required>
            </div>
            <div class="form-group">
              <label for="file">Pilih File</label>
              <input type="file" name="file" id="file" required>
              <p class="help-block"><small class="text-danger">Ekstensi file yang disetujui (.pdf).</small></p>
            </div>
            <button type="submit" class="btn btn-primary btn-block">Simpan Data</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
<?php } ?>

<!-- Modal Lihat Data -->
<?php foreach ($pernikahan as $wst) { ?>
<div class="modal fade" id="modal-lihat-<?= $wst['per_id']; ?>">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header bg-gray">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Lihat Detail <?= $judul ?></h4>
      </div>
      <div class="modal-body">
        <table class="table">
        <tr>
          <td class="h5">Nomor Surat Nikah</td>
          <td class="h4"><?= $wst['per_nos']; ?></td>
        </tr>
        <tr>
          <td class="h5">Nama Pengangan Wanita</td>
          <td class="h4"><?= $wst['per_namaw']; ?></td>
        </tr>
        <tr>
          <td class="h5">Nama Pengangan Pria</td>
          <td class="h4"><?= $wst['per_namap']; ?></td>
        </tr>
        <tr>
          <td class="h5">Tanggal Nikah</td>
          <td class="h4"><?= $wst['per_tgl']; ?></td>
        </tr>
        <tr>
          <td class="h5">Lokasih Pernikahan</td>
          <td class="h4"><?= $wst['per_lks']; ?></td>
        </tr>
        <tr>
          <td class="h5">Nama Pendeta</td>
          <td class="h4"><?= $wst['per_pdt']; ?></td>
        </tr>
      </table>
      <iframe width="100%" height="500px" src="<?=base_url('assets/img/upload/'.$wst['per_file'])?>"></iframe>
      </div>
    </div>
  </div>
</div>
<?php } ?>
<!-- /.modal lihat data -->