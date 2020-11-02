<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>SIM | Login</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="<?= base_url(); ?>assets/asset/bootstrap/dist/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?= base_url(); ?>assets/asset/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="<?= base_url(); ?>assets/asset/Ionicons/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?= base_url(); ?>assets/dist/css/AdminLTE.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="<?= base_url(); ?>assets/plugins/iCheck/square/blue.css">

  <!-- Google Font -->
  <!-- <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic"> -->

  <style type="text/css">
    html{
      height: 100%;
    }
  </style>
</head>
<body class="hold-transition login-page">
<div class="login-box">
  <div class="login-logo">
    <a href="<?= base_url(); ?>">SI <b>Marturia</b></a>
  </div>
  <!-- /.login-logo -->
  <div class="login-box-body">
    <p class="login-box-msg">Login Sistem Informasi Marturia</p>

    <?= $this->session->flashdata('pesan')?>

    <form action="<?= base_url() ?>autentikasi/index" method="post">
      <div class="form-group has-feedback">
        <input name="nip" type="text" class="form-control" placeholder="Masukan Nama Pengguna" value="<?= set_value('nip') ?>" required autofocus>
        <small class="glyphicon glyphicon-user form-control-feedback"></small>
        <?= form_error('nip', '<small class="text-danger">', '</small>') ?>
      </div>
      <div class="form-group has-feedback">
        <input name="sandi" type="password" class="form-control" placeholder="Masukan Kata Sandi" required>
        <small class="glyphicon glyphicon-lock form-control-feedback"></small>
        <?= form_error('sandi', '<small class="text-danger">', '</small>') ?>
      </div>

      <div class="row">
        <div class="col-xs-6">
          <a href="<?= base_url()?>" class="btn btn-info btn-block btn-flat">Kembali</a>
        </div>

        <div class="col-xs-6">
          <button type="submit" class="btn btn-primary btn-block btn-flat">Masuk</button>
        </div>
      </div>
    </form>
    <!-- Belum punya Akun? <a href="#" class="text-center">Daftar disini..</a> -->
  </div>
</div>
<!-- /.login-box -->

<!-- jQuery 3 -->
<script src="<?= base_url(); ?>assets/asset/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="<?= base_url(); ?>assets/asset/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- iCheck -->
<script src="<?= base_url(); ?>assets/plugins/iCheck/icheck.min.js"></script>
</body>
</html>
