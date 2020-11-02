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
          <div class="nav-tabs-custom">
            <ul class="nav nav-tabs">
              <li class="active"><a href="#masuk" data-toggle="tab">Data Surat Masuk</a></li>
              <li><a href="#keluar" data-toggle="tab">Data Surat Keluar</a></li>
            <a href="#" class="btn btn-primary pull-right" data-toggle="modal" data-target="#modal-tambah">Tambah Data Baru</a>
            </ul>
            <div class="tab-content">
              <div class="active tab-pane" id="masuk">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>Tanggal Penerimaan</th>
                    <th>Asal Surat</th>
                    <th>Nomor Surat</th>
                    <th>Tanggal Surat</th>
                    <th>Perihal</th>
                    <th>file</th>
                    <th>Opsi</th>
                  </tr>
                  </thead>
                  <tbody>
                  <?php foreach($suratm as $data){ ?>
                  <tr>
                    <td><?=$data['s_tgl_mk']?></td>
                    <td><?=$data['s_at']?></td>
                    <td><?=$data['s_no']?></td>
                    <td><?=$data['s_tgl']?></td>
                    <td><?=$data['s_perihal']?></td>
                    <?php if(!empty($data['s_file'])){ ?>
                      <td><a target="_blank" href="<?=base_url('assets/doc/upload/'.$data['s_file'])?>"><?=$data['s_file']?></a></td>
                    <?php } ?>
                    <td>
                      <a class="btn btn-default" href="#" data-toggle="modal" data-target="#modal-lihat-<?=$data['s_id']?>"><i class="fa fa-eye"></i></a>
                      <a class="btn btn-primary" href="#" data-toggle="modal" data-target="#modal-edit-<?=$data['s_id']?>"><i class="fa fa-edit"></i></a>
                      <a class="btn btn-danger hapus" href="#" data-link="<?=base_url('surat/hapus/'.$data['s_id'])?>"><i class="fa fa-trash"></i></a>
                    </td>
                  </tr>
                  <?php } ?>
                  </tbody>
                  <tfoot>
                  <tr>
                    <th>Tanggal Penerimaan</th>
                    <th>Asal Surat</th>
                    <th>Nomor Surat</th>
                    <th>Tanggal Surat</th>
                    <th>Perihal</th>
                    <th>file</th>
                    <th>Opsi</th>
                  </tr>
                  </tfoot>
                </table>
              </div>

              <div class="tab-pane" id="keluar">
                <table id="example2" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>Tanggal Penerimaan</th>
                    <th>Asal Surat</th>
                    <th>Nomor Surat</th>
                    <th>Tanggal Surat</th>
                    <th>Perihal</th>
                    <th>file</th>
                    <th>Opsi</th>
                  </tr>
                  </thead>
                  <tbody>
                  <?php foreach($suratk as $data){ ?>
                  <tr>
                    <td><?=$data['s_tgl_mk']?></td>
                    <td><?=$data['s_at']?></td>
                    <td><?=$data['s_no']?></td>
                    <td><?=$data['s_tgl']?></td>
                    <td><?=$data['s_perihal']?></td>
                    <?php if(!empty($data['s_file'])){ ?>
                      <td><a target="_blank" href="<?=base_url('assets/doc/upload/'.$data['s_file'])?>"><?=$data['s_file']?></a></td>
                    <?php } ?>
                    <td>
                      <a class="btn btn-default" href="#" data-toggle="modal" data-target="#modal-lihat-<?=$data['s_id']?>"><i class="fa fa-eye"></i></a>
                      <a class="btn btn-primary" href="#" data-toggle="modal" data-target="#modal-edit-<?=$data['s_id']?>"><i class="fa fa-edit"></i></a>
                      <a class="btn btn-danger hapus" href="#" data-link="<?=base_url('surat/hapus/'.$data['s_id'])?>"><i class="fa fa-trash"></i></a>
                    </td>
                  </tr>
                  <?php } ?>
                  </tbody>
                  <tfoot>
                  <tr>
                    <th>Tanggal Penerimaan</th>
                    <th>Asal Surat</th>
                    <th>Nomor Surat</th>
                    <th>Tanggal Surat</th>
                    <th>Perihal</th>
                    <th>file</th>
                    <th>Opsi</th>
                  </tr>
                  </tfoot>
                </table>
              </div>
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
        <form action="<?= base_url('surat/tambah'); ?>" method="post" enctype="multipart/form-data" role="form">
          <div class="box-body">
            <div class="form-group">
              <label for="tgl_mk">Tanggal Terima atau Tanggal Keluar Surat</label>
              <input type="date" name="tgl_mk" class="form-control" id="tgl_mk" required>
            </div>
            <div class="form-group">
              <label for="jenis">Kategori Surat</label>
              <select class="form-control" name="jenis" id="jenis">
                <option value=""> - Pilih Kategori Surat - </option>
                <option value="Masuk">Masuk</option>
                <option value="Keluar">Keluar</option>
              </select>
            </div>
            <div class="form-group">
              <label for="no">No Surat</label>
              <input type="text" name="no" class="form-control" id="no" placeholder="Masukan No Surat..." required>
            </div>
            <div class="form-group">
              <label for="tgl">Tanggal Surat</label>
              <input type="date" name="tgl" class="form-control" id="tgl" required>
            </div>
            <div class="form-group">
              <label for="at">Asal atau Tujuan Surat</label>
              <input type="text" name="at" class="form-control" id="at" placeholder="Masukan Asal atau Tujuan dari Surat..." required>
            </div>
            <div class="form-group">
              <label for="perihal">Perihal Surat</label>
              <input type="text" name="perihal" class="form-control" id="perihal" placeholder="Masukan Perihal Surat..." required>
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
<?php foreach ($surat as $data) { ?>
<div class="modal fade" id="modal-edit-<?= $data['s_id'] ?>">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header bg-gray">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Form Ubah Data <?= $judul ?></h4>
      </div>
      <div class="modal-body">
        <!-- form start -->
        <form action="<?= base_url('surat/edit/'.$data['s_id']); ?>" method="post" enctype="multipart/form-data" role="form">
          <div class="box-body">
            <div class="form-group">
              <label for="tgl_mk">Tanggal Terima atau Tanggal Keluar Surat</label>
              <input type="date" name="tgl_mk" class="form-control" id="tgl_mk" value="<?=$data['s_tgl_mk']?>" required>
            </div>
            <div class="form-group">
              <label for="jenis">Kategori Surat</label>
              <select class="form-control" name="jenis" id="jenis">
                <option value="<?=$data['s_jenis']?>"><?=$data['s_jenis']?></option>
                <option value="Masuk">Masuk</option>
                <option value="Keluar">Keluar</option>
              </select>
            </div>
            <div class="form-group">
              <label for="no">No Surat</label>
              <input type="text" name="no" class="form-control" id="no" value="<?=$data['s_no']?>" required>
            </div>
            <div class="form-group">
              <label for="tgl">Tanggal Surat</label>
              <input type="date" name="tgl" class="form-control" id="tgl" value="<?=$data['s_tgl']?>" required>
            </div>
            <div class="form-group">
              <label for="at">Asal atau Tujuan Surat</label>
              <input type="text" name="at" class="form-control" id="at" value="<?=$data['s_at']?>" required>
            </div>
            <div class="form-group">
              <label for="perihal">Perihal Surat</label>
              <input type="text" name="perihal" class="form-control" id="perihal" value="<?=$data['s_perihal']?>" required>
            </div>
            <div class="form-group">
              <p class="help-block"><?=$data['s_file']?></p>
              <label for="file">Pilih File</label>
              <input type="file" name="file" id="file" required>
              <p class="help-block"><small class="text-danger">Ekstensi file yang disetujui (.pdf).</small> .</p>
            </div>
            <button type="submit" class="btn btn-primary btn-block">Simpan Perubahan</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
<!-- /.modal edit data -->
<?php } ?>

<!-- Modal Lihat Data -->
<?php foreach ($surat as $data) { ?>
<div class="modal fade" id="modal-lihat-<?= $data['s_id']; ?>">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header bg-gray">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Lihat Detail Data <?= $judul ?></h4>
      </div>
      <div class="modal-body">
        <?php if($data['s_jenis'] == "Keluar"){
          $mk = "Keluar";
          $at = "Tujuan";
        } else {
          $mk = "Terima";
          $at = "Asal";
        }
        ?>
        <table class="table">
          <tr>
            <td class="h5">Tanggal</td>
            <td class="h4"><?=$mk.' : '.$data['s_tgl_mk']?></td>
          </tr>
          <tr>
            <td class="h5">Jenis Surat</td>
            <td class="h4"><?=$data['s_jenis']?></td>
          </tr>
          <tr>
            <td class="h5">Nomor Surat</td>
            <td class="h4"><?=$data['s_no']?></td>
          </tr>
          <tr>
            <td class="h5">Tanggal Surat</td>
            <td class="h4"><?=$data['s_tgl']?></td>
          </tr>
          <tr>
            <td class="h5"><?=$at?> Surat</td>
            <td class="h4"><?=$data['s_at']?></td>
          </tr>
          <tr>
            <td class="h5">Perihal</td>
            <td class="h4"><?=$data['s_perihal']?></td>
          </tr>
        </table>
        <iframe width="100%" height="500px" src="<?=base_url('assets/doc/upload/'.$data['s_file'])?>"></iframe>
      </div>
    </div>
  </div>
</div>
<?php } ?>
<!-- /.modal lihat data -->