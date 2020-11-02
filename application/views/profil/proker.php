<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!-- ==============================================
Konten (isi)
=============================================== -->
<div class="content-wrapper">
  <section class="content-header">
    <h1>
      Halaman <?=$judul?>
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
      <div class="col-lg-12">
        <div class="box box-primary">
          <div class="box-header with-border">
            <h3 class="box-title">Program Kerja Jemaat</h3>
            <a href="#" class="btn btn-primary pull-right" data-toggle="modal" data-target="#modal-tambah">Tambah Data Baru</a>
          </div>
          <div class="box-body">
            <table id="example1" class="table table-bordered table-striped">
              <thead>
              <tr>
                <th>Tanggal</th>
                <th>Jenis</th>
                <th>Kategori</th>
                <th>Opsi</th>
              </tr>
              </thead>
              <?php foreach($proker as $pro){ ?>
                <tr>
                  <td><?=$pro['pro_tgl']?></td>
                  <td><?=$pro['pro_jdl']?></td>
                  <td><?=$pro['pro_ktgr']?></td>
                  <td>
                    <a class="btn btn-default" href="#" data-toggle="modal" data-target="#modal-lihat-<?= $pro['pro_id'] ?>"><i class="fa fa-eye"></i></a>
                    <a class="btn btn-primary" href="#" data-toggle="modal" data-target="#modal-edit-<?=$pro['pro_id']?>"><i class="fa fa-edit"></i></a>
                    <a class="btn btn-danger hapus" href="#" data-link="<?= base_url('profil/hapus/'.$pro['pro_id']); ?>"><i class="fa fa-trash"></i></a>
                  </td>
                </tr>
              <?php } ?>
              <tbody>
              </tbody>

              <tfoot>
              <tr>
                <th>Tanggal</th>
                <th>Jenis</th>
                <th>Kategori</th>
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
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header bg-gray">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Form Tambah Data <?= $judul ?></h4>
      </div>
      <div class="modal-body">
        <!-- form start -->
        <form action="<?= base_url('Profil/tambah'); ?>" method="post" enctype="multipart/form-data" role="form">
          <div class="box-body">
            <div class="form-group">
              <label for="jdl">Bidang</label>
              <select name="jdl" class="form-control" required>
                <option>Pilih Bidang Program</option>
                <optgroup label="Unsur">
                  <option value="Persekutuan Kaum Pria">Persekutuan Kaum Pria</option>
                  <option value="Persekutuan Wanita">Persekutuan Wanita</option>
                  <option value="Persekutuan Kaum Muda Babtis">Persekutuan Kaum Muda Babtis</option>
                  <option value="Sekolah Minggu">Sekolah Minggu</option>
                </optgroup>
                <optgroup label="Komisi">
                  <option value="Penginjilan">Penginjilan</option>
                  <option value="Minat-bakat">Minat-bakat</option>
                  <option value="Diakonia">Diakonia</option>
                  <option value="Pembangunan">Pembangunan</option>
                  <option value="Pendidikan">Pendidikan</option>
                  <option value="infentaris / Pemeliharaan">infentaris / Pemeliharaan</option>
                </optgroup>
              </select>
            </div>
            <div class="form-group">
              <label for="editor">Program Kerja</label>
              <textarea name="isi" class="form-control" id="editor" required></textarea>
            </div>
            <button type="submit" class="btn btn-primary btn-block">Simpan Data</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
<!-- /.modal tambah data -->

<!-- Modal Lihat Data -->
<?php foreach($proker as $data){ ?>
<div class="modal fade" id="modal-lihat-<?= $data['pro_id']; ?>">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header bg-gray">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Lihat Detail Data <?= $judul ?></h4>
      </div>
      <div class="modal-body">
        <h1><?=$data['pro_jdl']?></h1>
        <p><?=$data['pro_isi']?></p>
      </div>
    </div>
  </div>
</div>
<?php } ?>
<!-- /.modal lihat data -->

<!-- Modal Ubah Data -->
<?php $ck = 0; foreach($proker as $prokerbyid){ ?>
<div class="modal fade" id="modal-edit-<?=$prokerbyid['pro_id']?>">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header bg-gray">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Form Ubah Data <?= $judul ?></h4>
      </div>
      <div class="modal-body">
        <!-- form start -->
        <form action="<?= base_url('Profil/edit/'.$prokerbyid['pro_id']); ?>" method="post" enctype="multipart/form-data" role="form">
          <div class="box-body">
            <div class="form-group">
              <label for="jdl">Bidang</label>
              <select name="jdl" class="form-control" required>
                <option value="<?= $prokerbyid['pro_jdl'] ?>"><?= $prokerbyid['pro_jdl'] ?></option>

                <optgroup label="Unsur">
                  <option value="Persekutuan Kaum Pria">Persekutuan Kaum Pria</option>
                  <option value="Persekutuan Wanita">Persekutuan Wanita</option>
                  <option value="Persekutuan Kaum Muda Babtis">Persekutuan Kaum Muda Babtis</option>
                  <option value="Sekolah Minggu">Sekolah Minggu</option>
                </optgroup>
                <optgroup label="Komisi">
                  <option value="Penginjilan">Penginjilan</option>
                  <option value="Minat-bakat">Minat-bakat</option>
                  <option value="Diakonia">Diakonia</option>
                  <option value="Pembangunan">Pembangunan</option>
                  <option value="Pendidikan">Pendidikan</option>
                  <option value="infentaris/Pemeliharaan">infentaris / Pemeliharaan</option>
                </optgroup>
              </select>
            </div>
            <div class="form-group">
              <label for="">Program Kerja</label>
              <textarea name="isi" class="form-control" id="editor<?=$ck++?>" required> <?= $prokerbyid['pro_isi'] ?> </textarea>
            </div>
            <button type="submit" class="btn btn-primary btn-block">Simpan Data</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
<?php } ?>
<!-- /.modal ubah data -->  
