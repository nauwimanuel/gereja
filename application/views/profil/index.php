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
      <div class="col-md-6">
        <div class="box box-solid">
          <div class="box-header with-border">
            <h3 class="box-title">Visi</h3>
          </div>

          <?php if(isset($_GET['visi'])){ ?>

          <form method="post" action="<?= base_url('Profil/v_edit') ?>" class="box-footer">
            <div class="">
              <textarea name="editor1" required> <?= $vimi[0]['vm_visi'] ?> </textarea>
              <input type="hidden" name="id" value="<?= $vimi[0]['vm_id'] ?>">
            </div>
            <button class="btn btn-primary pull-right" name="submit">Simpan</button>
            <a href="<?= base_url('profil/index') ?>"> kembali</a>
          </form>

          <?php } else { ?>

          <div class="box-body">
            <?= $vimi[0]['vm_visi'] ?>
          </div>

          <form method="get" action="" class="box-footer">
            <button class="btn btn-primary" name="visi">Edit</button>
          </form>
          <?php } ?>
        </div>
      </div>

      <div class="col-md-6">
        <div class="box box-solid">
          <div class="box-header with-border">
            <h3 class="box-title">Misi</h3>
          </div>

          <?php if(isset($_GET['misi'])){ ?>

          <form method="post" action="<?= base_url('Profil/m_edit') ?>" class="box-footer">
            <div class="box-body1">
              <textarea name="editor1" required> <?= $vimi[0]['vm_misi'] ?> </textarea>
              <input type="hidden" name="id" value="<?= $vimi[0]['vm_id'] ?>">
            </div>
            <button class="btn btn-primary pull-right" name="submit">Simpan</button>
            <a href="<?= base_url('profil/index') ?>"> kembali</a>
          </form>

          <?php } else { ?>

          <div class="box-body">
            <?= $vimi[0]['vm_misi'] ?>
          </div>

          <form method="get" action="" class="box-footer">
            <button class="btn btn-primary" name="misi">Edit</button>
          </form>
          <?php } ?>

        </div>
      </div>
    </div>
  </section>
</div>