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
                <th>Jenis SK</th>
                <th>No SK</th>
                <th>Tanggal SK</th>
                <th>Nama SK</th>
                <th>File Scannd</th>
                <th>Opsi</th>
              </tr>
              </thead>
              <tbody>
              <?php foreach($sk as $data){ ?>
              <tr>
                <td><?= $data['sk_jenis'] ?></td>
                <td><?= $data['sk_no'] ?></td>
                <td><?= $data['sk_tgl'] ?></td>
                <td><?= $data['sk_nama'] ?></td>
                <td><a target="_blank" href="<?=base_url('assets/img/upload/'.$data['sk_file'])?>"><?=$data['sk_file']?></a></td>
                <td>
                  <a class="btn btn-default" href="#" data-toggle="modal" data-target="#modal-lihat-<?= $data['sk_id'] ?>"><i class="fa fa-eye"></i></a>
                  <a class="btn btn-primary" href="#" data-toggle="modal" data-target="#modal-edit-<?= $data['sk_id'] ?>"><i class="fa fa-edit"></i></a>
                  <a class="btn btn-danger hapus" href="#" data-link="<?= base_url('surat_sk/hapus/'.$data['sk_id']); ?>"><i class="fa fa-trash"></i></a>
                </td>
              </tr>
              <?php } ?>
              </tbody>
              <tfoot>
              <tr>
                <th>Jenis SK</th>
                <th>No SK</th>
                <th>Tanggal SK</th>
                <th>Nama SK</th>
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
        <form action="<?= base_url('Surat_sk/tambah'); ?>" method="post" enctype="multipart/form-data" role="form">
          <div class="box-body">
            <div class="form-group">
              <label for="jenis">Jenis SK</label>
              <input type="text" name="jenis" class="form-control" id="jenis" placeholder="Masukan Jenis SK..." required>
            </div>
            <div class="form-group">
              <label for="no">Nomor SK</label>
              <input type="text" name="no" class="form-control" id="no" placeholder="Masukan Nomor SK..." required>
            </div>
            <div class="form-group">
              <label for="tgl">Tanggal SK</label>
              <input type="date" name="tgl" class="form-control" id="tgl" required>
            </div>
            <div class="form-group">
              <label for="nama">Nama SK</label>
              <input type="text" name="nama" class="form-control" id="nama" placeholder="Masukan Nama SK..."  required>
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
<?php foreach ($sk as $data) { ?>
<div class="modal fade" id="modal-edit-<?= $data['sk_id'] ?>">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header bg-gray">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Form Ubah Data <?= $judul ?></h4>
      </div>
      <div class="modal-body">
        <!-- form start -->
        <form action="<?= base_url('surat_sk/edit/'.$data['sk_id']); ?>" method="post" enctype="multipart/form-data" role="form">
          <div class="box-body">
            <div class="form-group">
              <label for="jenis">Jenis SK</label>
              <input type="text" name="jenis" class="form-control" id="jenis" value="<?=$data['sk_jenis']?>" required>
            </div>
            <div class="form-group">
              <label for="no">Nomor SK</label>
              <input type="text" name="no" class="form-control" id="no" value="<?=$data['sk_no']?>" required>
            </div>
            <div class="form-group">
              <label for="tgl">Tanggal SK</label>
              <input type="date" name="tgl" class="form-control" id="tgl" value="<?=$data['sk_tgl']?>" required>
            </div>
            <div class="form-group">
              <label for="nama">Nama SK</label>
              <input type="text" name="nama" class="form-control" id="nama" value="<?=$data['sk_nama']?>"  required>
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
<?php foreach ($sk as $wst) { ?>
<div class="modal fade" id="modal-lihat-<?= $wst['sk_id']; ?>">
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
            <td class="h5">Nomor SK</td>
            <td class="h4"><?= $wst['sk_nama']; ?></td>
          </tr>
          <tr>
            <td class="h5">Jenis SK</td>
            <td class="h4"><?= $wst['sk_jenis']; ?></td>
          </tr>
          <tr>
            <td class="h5">Nomor SK</td>
            <td class="h4"><?= $wst['sk_no']; ?></td>
          </tr>
          <tr>
            <td class="h5">Tanggal SK</td>
            <td class="h4"><?= $wst['sk_tgl']; ?></td>
          </tr>
        </table>
        <iframe width="100%" height="500px" src="<?=base_url('assets/img/upload/'.$wst['sk_file'])?>"></iframe>
      </div>
    </div>
  </div>
</div>
<?php } ?>
<!-- /.modal lihat data -->