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
                <th>Nama</th>
                <th>No Surat</th>
                <th>Tanggal</th>
                <th>Foto</th>
                <th>Opsi</th>
              </tr>
              </thead>
              <tbody>
              <?php foreach($baptisan as $bab){ ?>
              <tr>
                <td><?= $bab['bab_nama']; ?></td>
                <td><?= $bab['bab_nos'] ?></td>
                <td><?= $bab['bab_tgl'] ?></td>
                <td><a target="_blank" href="<?=base_url('assets/img/upload/'.$bab['bab_file'])?>"><?=$bab['bab_file']?></a></td>
                <td>
                  <a class="btn btn-default" href="#" data-toggle="modal" data-target="#modal-lihat-<?= $bab['bab_id'] ?>"><i class="fa fa-eye"></i></a>
                  <a class="btn btn-primary" href="#" data-toggle="modal" data-target="#modal-edit-<?= $bab['bab_id'] ?>"><i class="fa fa-edit"></i></a>
                  <a class="btn btn-danger hapus" href="#" data-link="<?= base_url('baptisan/hapus/'.$bab['bab_id']); ?>"><i class="fa fa-trash"></i></a>
                </td>
              </tr>
              <?php } ?>
              </tbody>
              <tfoot>
              <tr>
                <th>Nama</th>
                <th>No Surat</th>
                <th>Tanggal</th>
                <th>Foto</th>
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
        <form action="<?= base_url('baptisan/tambah'); ?>" method="post" enctype="multipart/form-data" role="form">
          <div class="box-body">
            <div class="form-group">
              <label for="nama">Nama Lengkap</label>
              <input type="text" name="nama" class="form-control" id="nama" placeholder="Masukan Nama..." required>
            </div>
            <div class="form-group">
              <label for="tgl">Tanggal Baptisan</label>
              <input type="date" name="tgl" class="form-control" id="tgl" required>
            </div>
            <div class="form-group">
              <label for="nos">No Surat Baptisan</label>
              <input type="text" name="nos" class="form-control" id="nos" placeholder="Masukan No Surat..." required>
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
<?php foreach ($baptisan as $bab) { ?>
<div class="modal fade" id="modal-edit-<?= $bab['bab_id'] ?>">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header bg-gray">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Form Edit Data <?= $judul ?></h4>
      </div>
      <div class="modal-body">
        <!-- form start -->
        <form action="<?= base_url('baptisan/edit/'.$bab['bab_id']); ?>" method="post" enctype="multipart/form-data" role="form">
          <div class="box-body">
            <div class="form-group">
              <label for="nama">Nama Lengkap</label>
              <input type="text" name="nama" class="form-control" id="nama" value="<?=$bab['bab_nama']?>" required>
            </div>
            <div class="form-group">
              <label for="tgl">Tanggal Baptisan</label>
              <input type="date" name="tgl" class="form-control" id="tgl" value="<?=$bab['bab_tgl']?>" required>
            </div>
            <div class="form-group">
              <label for="nos">No Surat Baptisan</label>
              <input type="text" name="nos" class="form-control" id="nos" value="<?=$bab['bab_nos']?>" required>
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
<!-- /.modal edit data -->
<?php } ?>

<!-- Modal Lihat Data -->
<?php foreach ($baptisan as $wst) { ?>
<div class="modal fade" id="modal-lihat-<?= $wst['bab_id']; ?>">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header bg-gray">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Detail Data <?= $judul ?></h4>
      </div>
      <div class="modal-body">
        <table class="table">
          <tr>
            <td class="h5">Surat</td>
            <td class="h4"><?= $wst['bab_nama']; ?></td>
          </tr>
          <tr>
            <td class="h5">Nomor Surat</td>
            <td class="h4"><?= $wst['bab_nos']; ?></td>
          </tr>
          <tr>
            <td class="h5">Tanggal Surat</td>
            <td class="h4"><?= $wst['bab_tgl']; ?></td>
          </tr>
        </table>
        <iframe width="100%" height="500px" src="<?=base_url('assets/img/upload/'.$wst['bab_file'])?>"></iframe>
      </div>
    </div>
  </div>
</div>
<?php } ?>
<!-- /.modal lihat data -->