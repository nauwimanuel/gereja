<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html>
<head>
<title>Marturia <?= $judul ?></title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
<link href="<?= base_url() ?>assets/styles/layout.css" rel="stylesheet" type="text/css" media="all">
</head>
<body id="top">
<!-- Top Background Image Wrapper -->
<div class="bgded overlay" style="background-image:url('<?= base_url() ?>assets/img/Hari-Paskah.jpg');">
  <?php if(empty($judul)){ ?>
  <div id="pageintro" class="hoc clear">
    <div class="flexslider basicslider">
      <ul class="slides">
        <li>
          <article>
            <h3 class="heading">Marturia</h3>
            <p class="font-x1 bold">Motto</p>
            <p class="font-x2 uppercase">Aku ada untuk Bersekutu, Bersaksi dan Melayani</p>
            <footer>
              <ul class="nospace inline pushright">
                <li><a class="btn" href="#profil">Profil Gereja</a></li>
                <li><a class="btn inverse" href="#warta">Warta Jemaat</a></li>
              </ul>
            </footer>
          </article>
        </li>
      </ul>
    </div>
  </div>
  <?php } else { ?>
    <article class="hoc clear">
    </article>
  <?php } ?>

  <div class="wrapper row0">
    <div id="topbar" class="hoc clear">
      <div class="fl_left">
        <ul>
          <li><i class="fa fa-phone"></i> +00 (123) 456 7890</li>
          <li><i class="fa fa-envelope-o"></i> admin@marturia.com</li>
        </ul>
      </div>
      <div class="fl_right">
        <ul>
          <li><a href="<?= base_url() ?>"><i class="fa fa-lg fa-home"></i></a></li>
          <?php if(!$this->session->has_userdata('user')){ ?>
            <li><a href="<?= base_url('autentikasi/index') ?>">Login</a></li>
          <?php } else { ?>
            <li><a href="<?= base_url('admin/index') ?>">halaman Admin</a></li>
          <?php } ?>
        </ul>
      </div>
    </div>
  </div>
</div>

<!-- End Top Background Image Wrapper -->
<div class="wrapper row1">
  <header id="header" class="hoc clear">
    <div id="logo" class="fl_left">
      <h1><a href="<?= base_url() ?>">Marturia</a></h1>
    </div>
    <nav id="mainav" class="fl_right">
      <ul class="clear">
        <li class="active"><a href="<?= base_url('home/index') ?>">Home</a></li>
        <li class=""><a href="<?= base_url('home/foto') ?>">Foto-foto</a></li>
        <li class=""><a class="drop" href="#">Program Kerja</a>
          <ul>
            <li class=""><a href="<?= base_url('home/program/unsur') ?>">Unsur</a></li>
            <li class=""><a href="<?= base_url('home/program/komisi') ?>">Komisi</a></li>
          </ul>
        </li>
        <li class=""><a href="<?= base_url('home/jadwal') ?>">Jadwal Ibadah</a></li>
      </ul>
    </nav>
  </header>
</div>