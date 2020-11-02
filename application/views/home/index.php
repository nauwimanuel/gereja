<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!-- ==============================================
Konten (isi)
=============================================== -->
<div class="content-wrapper">
  <section class="content-header">
    <h1>
      Halaman Utama
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
      <div class="col-lg-8">
        <div class="row">
          <?php if($user[0]['user_status'] == 'a'){ ?>
          <div class="col-lg-4">
            <div class="info-box">
              <span class="info-box-icon bg-aqua"><i class="fa fa-group"></i></span>
              <div class="info-box-content">
                <span class="info-box-text">Pengguna</span>
                <span class="info-box-number"><?=$this->db->get('users')->num_rows();?> <small>Pengguna</small></span>
                <a href="<?=base_url('superadmin')?>">Lihat..</a>
              </div>
            </div>
          </div>

          <div class="col-lg-4">
            <div class="info-box">
              <span class="info-box-icon bg-aqua"><i class="fa fa-book"></i></span>
              <div class="info-box-content">
                <span class="info-box-text">Progam Kerja</span>
                <span class="info-box-number"><?=$this->db->get('proker')->num_rows();?> <small>Program</small></span>
                <a href="<?=base_url('profil/proker')?>">Lihat..</a>
              </div>
            </div>
          </div>

          <div class="col-lg-4">
            <div class="info-box">
              <span class="info-box-icon bg-aqua"><i class="fa fa-file-text-o"></i></span>
              <div class="info-box-content">
                <span class="info-box-text">Baptisan</span>
                <span class="info-box-number"><?=$this->db->get('baptisan')->num_rows();?> <small>Data</small></span>
                <a href="<?=base_url('baptisan')?>">Lihat..</a>
              </div>
            </div>
          </div>

          <div class="col-lg-4">
            <div class="info-box">
              <span class="info-box-icon bg-aqua"><i class="fa fa-file-text-o"></i></span>
              <div class="info-box-content">
                <span class="info-box-text">P. Anak</span>
                <span class="info-box-number"><?=$this->db->get('panak')->num_rows();?> <small>Data</small></span>
                <a href="<?=base_url('p_anak')?>">Lihat..</a>
              </div>
            </div>
          </div>

          <div class="col-lg-4">
            <div class="info-box">
              <span class="info-box-icon bg-aqua"><i class="fa fa-file-text-o"></i></span>
              <div class="info-box-content">
                <span class="info-box-text">Pernikahan</span>
                <span class="info-box-number"><?=$this->db->get('pernikahan')->num_rows();?> <small>Data</small></span>
                <a href="<?=base_url('pernikahan')?>">Lihat..</a>
              </div>
            </div>
          </div>

          <div class="col-lg-4">
            <div class="info-box">
              <span class="info-box-icon bg-aqua"><i class="fa fa-clock-o"></i></span>
              <div class="info-box-content">
                <span class="info-box-text">Jadwal Ibadah</span>
                <span class="info-box-number"><?=$this->db->get('ibadah')->num_rows();?> <small>Data</small></span>
                <a href="<?=base_url('ibadah')?>">Lihat..</a>
              </div>
            </div>
          </div>

          <?php } if($user[0]['user_status'] != 'b'){ ?>

          <div class="col-lg-4">
            <div class="info-box">
              <span class="info-box-icon bg-aqua"><i class="fa fa-envelope-o"></i></span>
              <div class="info-box-content">
                <span class="info-box-text">Surat Masuk</span>
                <span class="info-box-number"><?=$this->db->get_where('surat', array('s_jenis' => 'masuk'))->num_rows();?> <small>Data</small></span>
                <a href="<?=base_url('surat')?>">Lihat..</a>
              </div>
            </div>
          </div>

          <div class="col-lg-4">
            <div class="info-box">
              <span class="info-box-icon bg-aqua"><i class="fa fa-envelope-o"></i></span>
              <div class="info-box-content">
                <span class="info-box-text">Surat Keluar</span>
                <span class="info-box-number"><?=$this->db->get_where('surat', array('s_jenis' => 'keluar'))->num_rows();?> <small>Data</small></span>
                <a href="<?=base_url('surat/index#keluar')?>">Lihat..</a>
              </div>
            </div>
          </div>

          <div class="col-lg-4">
            <div class="info-box">
              <span class="info-box-icon bg-aqua"><i class="fa fa-file-o"></i></span>
              <div class="info-box-content">
                <span class="info-box-text">Surat SK</span>
                <span class="info-box-number"><?=$this->db->get('sk')->num_rows();?> <small>Data</small></span>
                <a href="<?=base_url('surat_sk')?>">Lihat..</a>
              </div>
            </div>
          </div>

          <?php } if($user[0]['user_status'] != 's'){ ?>

          <div class="col-lg-4">
            <div class="info-box">
              <span class="info-box-icon bg-aqua"><i class="fa fa-files-o"></i></span>
              <div class="info-box-content">
                <span class="info-box-text">L. Keuangan</span>
                <span class="info-box-number"><?=$this->db->get('kas')->num_rows();?> <small>Data</small></span>
                <a href="<?=base_url('laporan')?>">Lihat..</a>
              </div>
            </div>
          </div>
          <?php } ?>
        </div>
      </div>

      <div class="col-md-4">
        <div class="box box-primary box-body box-profile">
          <img class="profile-user-img img-responsive img-circle" src="<?= base_url() ?>assets/img/default.jpg" alt="User profile picture">

          <h3 class="profile-username text-center"><?= $user[0]['user_nama'] ?></h3>

          <p class="text-muted text-center"><?= $user[0]['user_name'] ?></p>

          <b><?= $user[0]['user_email'] ?></b><b class="pull-right"><?= $user[0]['user_nohp'] ?></b>

          <div class="panel box box-primary">
            <div class="box-header with-border">
              <h4 class="box-title">
                <a data-toggle="collapse" data-parent="#accordion" href="#up">
                  Ubah Profil
                </a>
              </h4>
            </div>
            <div id="up" class="panel-collapse collapse">
              <div class="box-body">
                <form class="form-horizontal" action="<?= base_url(); ?>admin/editProfil" method="post">
                  <div class="form-group">
                    <label for="name" class="col-sm-12">Username</label>
                    <div class="col-sm-12">
                      <input name="name" type="text" class="form-control" id="nama" value="<?= $user[0]['user_name'] ?>" readonly>
                    </div>
                  </div>

                  <div class="form-group">
                    <label for="nama" class="col-sm-12">Nama Lengkap</label>
                    <div class="col-sm-12">
                      <input name="nama" type="text" class="form-control" id="nama" value="<?= $user[0]['user_nama'] ?>" required>
                    </div>
                  </div>

                  <div class="form-group">
                    <label for="nohp" class="col-sm-12">No HP</label>
                    <div class="col-sm-12">
                      <input name="nohp" type="text" class="form-control" id="nohp" value="<?= $user[0]['user_nohp'] ?>" required>
                    </div>
                  </div>

                  <div class="form-group">
                    <label for="email" class="col-sm-12">Email</label>
                    <div class="col-sm-12">
                      <input name="email" type="text" class="form-control" id="email" value="<?= $user[0]['user_email'] ?>" required>
                    </div>
                  </div>

                  <div class="form-group">
                    <div class="col-sm-12">
                      <button type="submit" class="btn btn-block btn-primary">Simpan Perubahan</button>
                    </div>
                  </div>
                </form>
              </div>
            </div>
          </div>

          <div class="panel box box-primary">
            <div class="box-header with-border">
              <h4 class="box-title">
                <a data-toggle="collapse" data-parent="#accordion" href="#us">
                  Ubah Kata Sandi
                </a>
              </h4>
            </div>
            <div id="us" class="panel-collapse collapse">
              <div class="box-body">
                <form action="<?= base_url() ?>admin/gantisandi" method="post" class="form-horizontal">
                  <div class="form-group">
                    <label for="sandilama" class="col-lg-12">Kata Sandi Lama</label>
                    <div class="col-lg-12">
                      <input name="sandilama" type="password" class="form-control" id="sandilama" required>
                    </div>
                  </div>

                  <div class="form-group">
                    <label for="sandibaru" class="col-lg-12">Kata Sandi Baru</label>
                    <div class="col-lg-12">
                      <input name="sandibaru" type="password" class="form-control" id="sandibaru" required>
                    </div>
                  </div>

                  <div class="form-group">
                    <label for="ceksandibaru" class="col-lg-12">Cek Sandi Baru</label>
                    <div class="col-lg-12">
                      <input name="ceksandibaru" type="password" class="form-control" id="ceksandibaru" required>
                    </div>
                  </div>

                  <div class="form-group">
                    <div class="col-lg-12">
                      <button type="submit" class="btn btn-block btn-primary">Simpan Perubahan</button>
                    </div>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
</div>
