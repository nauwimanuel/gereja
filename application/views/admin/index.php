<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!-- ==============================================
Konten (isi)
=============================================== -->
<div class="content-wrapper">
  <section class="content-header">
    <h1>
      Kelolah Pengguna
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
        <div class="box box-primary">
          <div class="box-header with-border1 bg-gray">
            <h3 class="box-title">Tabel Data Pengguna</h3>
            <a href="#" class="btn btn-primary pull-right" data-toggle="modal" data-target="#modal-tambah">Tambah Pengguna Baru</a>
          </div>
          <!-- /.box-header -->
          <div class="box-body">
            <table id="example1" class="table table-bordered table-striped">
              <thead>
              <tr>
                <th>Nama Pengguna</th>
                <th>Username</th>
                <th>No HP</th>
                <th>Email</th>
                <th>Opsi</th>
              </tr>
              </thead>
              <tbody>
              <?php foreach ($users as $ds) { ?>
              <tr>
                <td><?= $ds['user_nama'] ?></td>
                <td><?= $ds['user_name'] ?></td>
                <td><?= $ds['user_nohp'] ?></td>
                <td><?= $ds['user_email'] ?></td>
                <td>
                  <a class="btn btn-danger hapus" href="#" data-link="<?= base_url('superadmin/hapus/'.$ds['user_id']) ?>"><i class="fa fa-trash"></i></a>
                </td>
              </tr>
              <?php } ?>
              </tbody>
              <tfoot>
              <tr>
                <th>Nama Pengguna</th>
                <th>Username</th>
                <th>No HP</th>
                <th>Email</th>
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
        <h4 class="modal-title">Form Tambah Pengguna</h4>
      </div>
      <div class="modal-body">
        <!-- form start -->
        <form action="<?= base_url('superadmin/tambah') ?>" method="post" role="form">
          <div class="box-body">
            <div class="form-group">
              <label for="nama">Nama Lengkap</label>
              <input type="text" name="nama" class="form-control" id="nama" placeholder="Nama Lengkap.." required>
            </div>
            <div class="form-group">
              <label for="name">Username</label>
              <input type="text" name="name" class="form-control" id="name" placeholder="Username.." required>
            </div>
            <div class="form-group">
              <label for="nohp">No HP</label>
              <input type="number" name="nohp" class="form-control" id="nohp" placeholder="No HP.." required>
            </div>
            <div class="form-group">
              <label for="email">Email</label>
              <input type="email" name="email" class="form-control" id="email" placeholder="Email.." required>
            </div>
            <div class="form-group">
              <label>Status Pengguna</label>
              <select name="status" class="form-control" required>
                <option value="">Pilih Status</option>
                <option value="a">Admin</option>
                <option value="s">Sekertaris</option>
                <option value="b">Bendahara</option>
              </select>
            </div>
            <div class="form-group">
              <label for="pass">Password</label>
              <input type="text" name="pass" class="form-control" id="pass" value="pass123" required>
            </div>
            <button type="subbmit" class="btn btn-primary btn-block">Simpan Data</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
<!-- /.modal tambah data -->