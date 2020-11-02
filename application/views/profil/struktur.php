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
        <div class="box  box-primary">
          <div class="box-header with-border1 bg-gray">
            <h3 class="box-title"><?= $judul ?></h3>
            <a href="#" class="btn btn-primary pull-right" data-toggle="modal" data-target="#modal-ubah-">Ganti Struktur Organisasi</a>
          </div>
          <!-- /.box-header -->
          <div class="box-body">
            <img src="<?=base_url('assets/img/upload/'.$struktur[0]['so_nama'])?>" width="100%">
          </div>
        </div>
      </div>
    </div>        
  </section>
</div>






<!-- Modal Tambah Data -->
<div class="modal fade" id="modal-ubah-">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header bg-gray">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">From Ganti <?= $judul ?></h4>
      </div>
      <div class="modal-body">
        <!-- form start -->
        <form action="<?= base_url('Profil/ubahSo/'.$struktur[0]['so_id']); ?>" method="post" enctype="multipart/form-data" role="form">
          <div class="box-body">
            <div class="form-group">
              <label for="gbr">Struktur Oraganisasi Lama</label>
              <img src="<?=base_url('assets/img/upload/'.$struktur[0]['so_nama'])?>" width="100%" id="gbr">
            </div>
            <div class="form-group">
              <label for="file">Pilih File Baru</label>
              <input type="file" name="file" id="file" required>
              <p class="help-block"><small class="text-danger">maksimal file 10MG dengan ekstensi .jpeg / .png / .jpg</small> .</p>
            </div>
            <button type="submit" class="btn btn-primary btn-block">Simpan Data</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
<!-- /.modal tambah data -->