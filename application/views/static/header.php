<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>SI Gereja | <?= $judul; ?> </title>
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="<?= base_url(); ?>assets/asset/bootstrap/dist/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?= base_url(); ?>assets/asset/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="<?= base_url(); ?>assets/asset/Ionicons/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?= base_url(); ?>assets/dist/css/AdminLTE.min.css">
  <link rel="stylesheet" href="<?= base_url(); ?>assets/dist/css/skins/_all-skins.min.css">
  <!-- DataTables -->
  <link rel="stylesheet" href="<?= base_url(); ?>assets/css/dataTables.bootstrap.min.css">
  <!-- Google Font -->
  <!-- <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic"> -->
  <script src="<?= base_url(); ?>assets/js/ckeditor/ckeditor.js"></script>
</head>

<body class="hold-transition skin-blue fixed sidebar-mini">
<div class="wrapper">
  <!-- ==============================================
  Header
  =============================================== -->
  <header class="main-header">
    <a href="<?= base_url(); ?>admin" class="logo">
      <span class="logo-mini"><b>SI</b>M</span>
      <span class="logo-lg"><b> SI </b>Marturia </span>
    </a>
    <nav class="navbar navbar-static-top">
      <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </a>
      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
          <li class="dropdown user user-menu">
            <a href="<?= base_url(); ?>autentikasi/keluar"><i class="fa fa-sign-out fa-lg"></i>Logout</a>
          </li>
        </ul>
      </div>
    </nav>
  </header>

  <!-- ==============================================
  SideBar
  =============================================== -->
  <aside class="main-sidebar">
    <section class="sidebar">
      <div class="user-panel">
        <div class="pull-left image">
          <img src="<?= base_url(); ?>assets/img/default.jpg" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p class="info-box-text">
            <?= $user[0]['user_nama'] ?> <br>
            <i><small><?= $user[0]['user_name'] ?></small></i>
          </p>
        </div>
      </div>
      <ul class="sidebar-menu" data-widget="tree">
        <li class="header text-center">MENU UTAMA</li>
        <li <?= $menu0; ?> >
          <a href="<?= base_url(); ?>admin/index">
            <i class="fa fa-dashboard"></i> <span>Halaman Utama</span>
          </a>
        </li>

        <?php 
          $a = '';$b = '';$c = '';$d = '';
          if(!empty($menu1) || !empty($menu2) || !empty($menu3)){
            $a = 'active'; 
          } elseif(!empty($menu4) || !empty($menu5) || !empty($menu6)){
            $b = 'active';
          } elseif(!empty($menu7) || !empty($menu8) || !empty($menu9) || !empty($menu10) || !empty($menu11)){
            $c = 'active';
          }elseif(!empty($menu12) || !empty($menu13) || !empty($menu14)){
            $d = 'active';
          }
        ?>

        <?php if($this->session->status == 'a'){ ?>
        <li class="treeview <?= $a ?>">
          <a href="#">
            <i class="fa fa-book"></i>
            <span>Kelola Profil Jemaat</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li <?= $menu1; ?>><a href="<?= base_url('Profil/index'); ?>"><i class="fa fa-circle-o"></i> Visi & Misi</a></li>
            <li <?= $menu2; ?>><a href="<?= base_url('Profil/proker'); ?>"><i class="fa fa-circle-o"></i> Program Kerja Jemaat</a></li>
            <li <?= $menu3; ?>><a href="<?= base_url('Profil/struktur'); ?>"><i class="fa fa-circle-o"></i> Struktur Organisasi Gereja</a></li>
          </ul>
        </li>

        <li class="treeview <?= $b ?>">
          <a href="#">
            <i class="fa fa-folder-open"></i>
            <span>Kelola Data Jemaat</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li <?= $menu4; ?>><a href="<?= base_url('Baptisan/index'); ?>"><i class="fa fa-circle-o"></i> Data Baptisan</a></li>
            <li <?= $menu5; ?>><a href="<?= base_url('P_Anak/index'); ?>"><i class="fa fa-circle-o"></i> Data Penyerahan Anak</a></li>
            <li <?= $menu6; ?>><a href="<?= base_url('Pernikahan/index'); ?>"><i class="fa fa-circle-o"></i> Data Pernikahan</a></li>
          </ul>
        </li>

        <li class="treeview <?= $c ?>">
          <a href="#">
            <i class="fa fa-clock-o"></i>
            <span>Kelola Kegiatan Ibadah</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li <?= $menu7; ?>><a href="<?= base_url('Ibadah/index'); ?>"><i class="fa fa-circle-o"></i> Ibadah Minggu Raya</a></li>
            <li <?= $menu8; ?>><a href="<?= base_url('K_Bapak/index'); ?>"><i class="fa fa-circle-o"></i> Persekutuan Kaum Pria</a></li>
            <li <?= $menu9; ?>><a href="<?= base_url('K_Ibu/index'); ?>"><i class="fa fa-circle-o"></i> Persekutuan Wanita</a></li>
            <li <?= $menu10; ?>><a href="<?= base_url('K_Muda/index'); ?>"><i class="fa fa-circle-o"></i> Persekutuan Kaum Muda</a></li>
            <li <?= $menu11; ?>><a href="<?= base_url('S_Minggu/index'); ?>"><i class="fa fa-circle-o"></i> Sekolah Minggu</a></li>
          </ul>
        </li>

        <?php } ?>

        <li class="treeview <?= $d ?>">
          <a href="#">
            <i class="fa fa-file"></i>
            <span>Kelola Administrasi</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <?php if($this->session->status != 'b'){ ?>
            <li <?= $menu12; ?>><a href="<?= base_url('Surat/index'); ?>"><i class="fa fa-circle-o"></i> Surat Masuk/Keluar</a></li>
            <li <?= $menu13; ?>><a href="<?= base_url('Surat_sk/index'); ?>"><i class="fa fa-circle-o"></i> Surat SK</a></li>
            <?php
              }

              if($this->session->status != 's'){
            ?>
            <li <?= $menu14; ?>><a href="<?= base_url('Laporan/index'); ?>"><i class="fa fa-circle-o"></i> Laporan Bulanan</a></li>
            <?php } ?>
          </ul>
        </li>

        <?php if($this->session->status == 'a'){ ?>
          <li <?= $menu15; ?> >
            <a href="<?= base_url(); ?>superadmin/index">
              <i class="fa fa-cogs"></i>
              <span>Kelola Pengguna</span>
            </a>
          </li>
        <?php } ?>
        
        <li>
          <a href="<?= base_url() ?>">
            <i class="fa fa-arrow-left"></i> <span>Website Utama</span>
          </a>
        </li>
      </ul>
    </section>
  </aside>