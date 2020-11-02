<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>


<!-- PROFIL GEREJA -->
<div class="wrapper row3">
  <main class="hoc container clear"> 
    <div class="one_third first">
      <img src="<?=base_url('assets/img/02.jpg')?>" height="" width="" alt="">
      <hr>
      <a target="_blank" class="btn" href="https://goo.gl/maps/uYBYok3tGShUbRna9">GBAI Marturia - Google Maps &raquo;</a>
    </div>
    <div class="two_third">
      <h6 class="three_third1 heading font-x2">Gereja Baptis Anugerah Indonesia (GBAI) <br>Jemaat <b>Marturia</b> Manokwari</h6>
      <p class="btmspace-50">Sebagai gereja-Nya kita dihimpun dan dipersatukan dengan oleh-Nya didalam dan melalui gereja-Nya dalam pengertian organisasi, yaitu dedominasi Baptis atas persamaan asas dan pandangan serta prinsip-prinsip dasar alkitabiah dalam bergereja/berjemaat, lebih khusus melalui Gereja Baptis Anugerah Indonesia (GBAI) Jemaat Marturia Manokwari, maka kita dituntut dapat mewujudkan Visi dan Misi Tuhan Yesus melalui Amanat Agung-Nya dan perintah Agung-Nya dalam Tri panggilan gereja demi kemajuan pelayanan kemajuan gereja-Nya dan kemulian-Nya. 
      <br>Gereja Baptis Anugerah Indonesia (GBAI) Jemaat Marturia Manokwari berlokasi di Jl. Reremi Palapa Manokwari Provinsi Papua Barat.</p>
    </div>
    <div class="clear"></div>
  </main>
</div>
<!-- /PROFIL GEREJA -->


<!-- VISI & MISI -->
<?php $bg2 = base_url('assets/img/07.jpg'); ?>
<div class="wrapper bgded overlay" style="background-image:url('<?=$bg2?>');" id="profil">
  <article class="hoc cta clear">
    <div class="ford_quarter first1">
      <h6 class="heading font-x2">Visi dan Misi Gereja</h6>
      <ul class="nospace group">
        <li class="one_half1 first1">
          <h6 class="heading font-x2">VISI</h6>
          <p><?= $vimi[0]['vm_visi'] ?></p>
        </li>
        <li class="two_half1">
          <h6 class="heading font-x2">MISI</h6>
          <p><?= $vimi[0]['vm_misi'] ?></p>
        </li>
      </ul>
    <div class="clear"></div>
    </div>
    <!-- <footer class="one_quarter"><a class="btn" href="#">Tincidunt praesent &raquo;</a></footer> -->
  </article>
</div>
<!-- /VISI & MISI -->


<!-- STRUKTUR GEREJA -->
<div class="wrapper row3">
  <section class="hoc container clear">
    <div class="sectiontitle center">
      <h6 class="heading font-x2">Sruktur Gereja</h6>
      <p>Struktur Organisasi Gereja Kristen Injili di Tanah Papua Jemaat Marturia</p>
    </div>
    <div class="group team element btmspace-80">
      <article class="one_third first"><img height="150px" width="50px" src="<?=base_url('assets/img/gembala.jpg')?>" alt="">
        <div class="txtwrap">
          <h6 class="heading">Gembala Jemaat</h6>
          <em>Gembala Jemaat</em>
          <footer><a href="#">Lihat Profil</a></footer>
        </div>
      </article>
      <article class="one_third"><img height="150px" width="50px" src="<?=base_url('assets/img/sekertaris.jpg')?>" alt="">
        <div class="txtwrap">
          <h6 class="heading">Sekertaris Jemaat</h6>
          <em>Wakil Gembala</em>
          <footer><a href="#">Lihat Profil</a></footer>
        </div>
      </article>
      <article class="one_third"><img height="150px" width="50px" src="<?=base_url('assets/img/bendahara.jpg')?>" alt="">
        <div class="txtwrap">
          <h6 class="heading">Bendahara Jemaat</h6>
          <em>Sekertaris Jemaat</em>
          <footer><a href="#">Lihat Profil</a></footer>
        </div>
      </article>
    </div>
    <footer class="center"><img src="<?=base_url('assets/img/upload/'.$so[0]['so_nama'])?>"><!-- <a class="btn" href="#">Lihat Struktur Organisasi</a> --></footer>
  </section>
</div>
<!-- /STRUKTUR GEREJA -->


<!-- WARTA JEMAAT -->
<?php $bg3 = base_url('assets/img/11.jpg'); ?>
<div class="wrapper bgded overlay" style="background-image:url('<?=$bg3?>')" id="warta">
  <div class="hoc container clear">
    <div class="sectiontitle center">
      <h6 class="heading font-x2">Warta Jemaat</h6>
      <p>Jadwal Ibadah Bulanan (<?=date('F')?>), Pengumuman dan juga informasi lebih lengkap dapat dilihat pada halaman <a href="<?=base_url('home/jadwal')?>">Jadwal Ibadah</a>.</p>
    </div>

    <div class="group topnews element">
      <article class="one_third first">
        <div class="txtwrap">
          <h6 class="heading">Ibadah Hari Minggu</h6>
          <?php 
            if(!empty($jadwal1)){
              foreach($jadwal1 as $data){ 
          ?>
          <p>
            Tanggal : <?=$data['ibd_tgl']?> - <?=$data['ibd_jam']?> <br>
            Tempat Ibadah : <?=$data['ibd_tempat']?><br>
            Pelayan Pujian : <?=$data['ibd_pujian']?><br>
            Pelayan Firman : <?=$data['ibd_firman']?><br>
          </p>
          <hr>
        <?php }} else { echo("<p><center style='color: red;'>Jadwal belum dibuat!</center></p>");} ?>
        </div>
      </article>

      <article class="one_third">
        <div class="txtwrap">
          <h6 class="heading">Persekutuan Kaum Pria</h6>
          <?php 
            if(!empty($jadwal2)){
              foreach($jadwal2 as $data){ 
          ?>
          <p>
            Tanggal : <?=$data['ibd_tgl']?> - <?=$data['ibd_jam']?> <br>
            Tempat Ibadah : <?=$data['ibd_tempat']?><br>
            Pelayan Pujian : <?=$data['ibd_pujian']?><br>
            Pelayan Firman : <?=$data['ibd_firman']?><br>
          </p>
          <hr>
          <?php }} else { echo("<p><center style='color: red;'>Jadwal belum dibuat!</center></p>");} ?>
        </div>
      </article>

      <article class="one_third">
        <div class="txtwrap">
          <h6 class="heading">Persekutuan Wanita</h6>
          <?php 
            if(!empty($jadwal3)){
              foreach($jadwal3 as $data){ 
          ?>
          <p>
            Tanggal : <?=$data['ibd_tgl']?> - <?=$data['ibd_jam']?> <br>
            Tempat Ibadah : <?=$data['ibd_tempat']?><br>
            Pelayan Pujian : <?=$data['ibd_pujian']?><br>
            Pelayan Firman : <?=$data['ibd_firman']?><br>
          </p>
          <hr>
          <?php }} else { echo("<p><center style='color: red;'>Jadwal belum dibuat!</center></p>");} ?>
        </div>
      </article>
    </div>

    <br>
    
    <div class="group topnews element">
      <article class="one_third first">
        <div class="txtwrap">
          <h6 class="heading">Persekutuan Pemuda Baptis</h6>
          <?php 
            if(!empty($jadwal4)){
              foreach($jadwal4 as $data){ 
          ?>
          <p>
            Tanggal : <?=$data['ibd_tgl']?> - <?=$data['ibd_jam']?> <br>
            Tempat Ibadah : <?=$data['ibd_tempat']?><br>
            Pelayan Pujian : <?=$data['ibd_pujian']?><br>
            Pelayan Firman : <?=$data['ibd_firman']?><br>
          </p>
          <hr>
          <?php }} else { echo("<p><center style='color: red;'>Jadwal belum dibuat!</center></p>");} ?>
        </div>
      </article>
      
      <article class="one_third">
        <div class="txtwrap">
          <h6 class="heading">Sekolah Minggu</h6>
          <?php 
            if(!empty($jadwal5)){
              foreach($jadwal5 as $data){
          ?>
          <p>
            Tanggal : <?=$data['ibd_tgl']?> - <?=$data['ibd_jam']?> <br>
            Tempat Ibadah : <?=$data['ibd_tempat']?><br>
            Pelayan Pujian : <?=$data['ibd_pujian']?><br>
            Pelayan Firman : <?=$data['ibd_firman']?><br>
          </p>
          <hr>
          <?php }} else { echo("<p><center style='color: red;'>Jadwal belum dibuat!</center></p>");} ?>
        </div>
      </article>
    </div>

    <div class="clear"></div>
  </div>
</div>
<!-- /WARTA JEMAAT -->