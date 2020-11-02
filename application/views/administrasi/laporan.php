<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?> 
<!--============================================== Konten (isi)=============================================== --> 
<div class="content-wrapper">
  <section class="content-header row">
    <h1 class="col-lg-9"> Halaman <?= $judul ?> </h1> 
    <!-- Date range --> 
    <form method="post" target="_blank" action="<?= base_url('laporan/cetak/') ?>" class="col-lg-3 form-group pull-right"> <div class="form-group row"> 
      <div class="col-md-8">
        <select class="form-control" name="tgl" id="jenis" required> 
          <option value=""> - Pilih Bulan - </option> 
          <option value="01">Januari</option> 
          <option value="02">Februari</option> 
          <option value="03">Maret</option> 
          <option value="04">April</option> 
          <option value="05">Mei</option> 
          <option value="06">Juni</option> 
          <option value="07">Juli</option> 
          <option value="08">Agustus</option> 
          <option value="09">September</option> 
          <option value="10">Oktober</option> 
          <option value="11">November</option> 
          <option value="12">Desember</option> 
        </select> 
      </div> 
      <div class="col-md-4"><button type="submit" class="btn btn-primary btn-block">Cetak</button></div> </div>
    </form> 
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
      <div class="col-lg-12">
        <div class="box box-primary">
          <div class="box-header with-border">
            <h3 class="box-title">Data <?= $judul ?></h3>
            <a href="#" class="btn btn-primary pull-right" data-toggle="modal" data-target="#modal-tambah">Tambah Data Baru</a>
          </div>
          <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>Tanggal</th>
                  <th>Uraian</th>
                  <th>Penerimaan (Rp)</th>
                  <th>Pengeluaran (Rp)</th>
                  <th>Kategori</th>
                  <th>Opsi</th>
                </tr>
                </thead>
                <tbody>
                <?php foreach($kas as $data){ ?>
                <tr>
                  <td><?=$data['kas_tanggal']?></td>
                  <td><?=$data['kas_keterangan']?></td>
                  <td class="text-right"><?=number_format($data['kas_masuk'])?></td>
                  <td class="text-right"><?=number_format($data['kas_keluar']);?></td>
                  <td><?=$data['kas_jenis']?></td>
                  <?php if(!empty($data['kas_file'])){ ?>
                    <td><a target="_blank" href="<?=base_url('assets/doc/upload/'.$data['kas_id'])?>"><?=$data['kas_file']?></a></td>
                  <?php } ?>
                  <td>
                    <a class="btn btn-default" href="#" data-toggle="modal" data-target="#modal-lihat-<?=$data['kas_id']?>"><i class="fa fa-eye"></i></a>
                    <a class="btn btn-primary" href="#" data-toggle="modal" data-target="#modal-edit-<?=$data['kas_id']?>"><i class="fa fa-edit"></i></a>
                    <a class="btn btn-danger hapus" href="#" data-link="<?=base_url('laporan/hapus/'.$data['kas_id'])?>"><i class="fa fa-trash"></i></a>
                  </td>
                </tr>
                <?php } ?>
                </tbody>
                <tfoot>
                <tr>
                  <th>Tanggal</th>
                  <th>Uraian</th>
                  <th>Penerimaan (Rp)</th>
                  <th>Pengeluaran (Rp)</th>
                  <th>Kategori</th>
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
    <!-- </div> -->
      <div class="modal-body">
        <!-- form start -->
        <form action="<?= base_url('laporan/tambah'); ?>" method="post"><!--  enctype="multipart/form-data" role="form"> -->
          <div class="box-body">
            <div class="form-group">
              <label for="tgl">Tanggal Transaksi</label>
              <input type="date" name="tgl" class="form-control" id="tgl" required>
            </div>
            <div class="form-group">
              <label for="jenis">Jenis Transaksi</label>
              <div class="radio">
                <label>
                  <input type="radio" name="jenis" value="Pemasukan">
                  Penerimaan
                </label> 
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <label>
                  <input type="radio" name="jenis" value="Pengeluaran">
                  Pengeluaran
                </label>
              </div>
              <select class="form-control" name="ktgr" id="jenis" required>
                <option value=""> - Pilih Jenis Transaksi - </option>
                <option value="Persembahan">Persembahan</option>
                <option value="Persepuluhan">Persepuluhan</option>
                <option value="Penginjilan">Penginjilan</option>
                <option value="Diakonia">Diakonia</option>
                <option value="Pembangunan">Pembangunan</option>
                <option value="Iuran Wajib">Iuran Wajib</option>
                <option value="Keyboard">Keyboard</option>
                <option value="Persepuluhan">Persepuluhan</option>
              </select>
            </div>
            <div class="form-group">
              <label for="ket">Keterangan Transaksi</label>
              <input type="text" name="ket" class="form-control" id="ket" placeholder="Masukan Keterangan Transaksi..." required>
            </div>
            <div class="form-group">
              <label for="rupiah">Masukan Jumlah Uang</label>
              <input type="text" name="rupiah" class="form-control" id="rupiah" placeholder="Masukan Jumlah Uang Rp..." required>
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
<?php foreach ($kas as $data) { ?>
<div class="modal fade" id="modal-edit-<?= $data['kas_id'] ?>">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header bg-gray">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Form Edit Data <?= $judul ?></h4>
      </div>
      <div class="modal-body">
        <!-- form start -->
        <form action="<?= base_url('laporan/edit/'.$data['kas_id'])?>" method="post">
          <div class="box-body">
            <div class="form-group">
              <label for="tgl">Tanggal Transaksi</label>
              <input type="date" name="tgl" class="form-control" id="tgl" value="<?=$data['kas_tanggal'] ?>" required>
            </div>
            <div class="form-group">
              <label for="jenis">Jenis Transaksi</label>
              <div class="radio">
                <label>
                  <input type="radio" name="jenis" value="Pemasukan" <?php if(!empty($data['kas_masuk'])) echo "checked"; ?>>
                  Penerimaan
                </label> 
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <label>
                  <input type="radio" name="jenis" value="Pengeluaran" <?php if(!empty($data['kas_keluar'])) echo "checked"; ?>>
                  Pengeluaran
                </label>
              </div>
              <select class="form-control" name="ktgr" id="jenis" required>
                <option value="<?= $data['kas_jenis'] ?>"> -<?= $data['kas_jenis'] ?>- </option>
                <option value="Persembahan">Persembahan</option>
                <option value="Persepuluhan">Persepuluhan</option>
                <option value="Penginjilan">Penginjilan</option>
                <option value="Diakonia">Diakonia</option>
                <option value="Pembangunan">Pembangunan</option>
                <option value="Iuran Wajib">Iuran Wajib</option>
                <option value="Keyboard">Keyboard</option>
                <option value="Persepuluhan">Persepuluhan</option>
              </select>
            </div>
            <div class="form-group">
              <label for="ket">Keterangan Transaksi</label>
              <input type="text" name="ket" class="form-control" id="ket" value="<?=$data['kas_keterangan'] ?>" required>
            </div>
            <div class="form-group">
              <label for="rupiah">Masukan Jumlah Uang</label>
              <?php if(!empty($data['kas_masuk'])){ ?>
                <input type="text" name="rupiah" class="form-control" id="rupiah" value="<?=$data['kas_masuk'] ?>" required>
              <?php } elseif(!empty($data['kas_keluar'])){ ?>
                <input type="text" name="rupiah" class="form-control" id="rupiah" value="<?=$data['kas_keluar'] ?>" required>
              <?php } ?>
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
<?php foreach ($kas as $data) { ?>
<div class="modal fade" id="modal-lihat-<?=$data['kas_id']?>">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header bg-gray">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Lihat Detail Data <?= $judul ?></h4>
      </div>
      <div class="modal-body">
        <table class="table">
          <tr>
            <td class="h5">Tanggal Transaksi</td>
            <td class="h4"><?= $data['kas_tanggal']; ?></td>
          </tr>
          <tr>
            <td class="h5">Uraian Transaksi</td>
            <td class="h4"><?= $data['kas_jenis']; ?> <br> <?= $data['kas_keterangan']; ?></td>
          </tr>
          <tr>
            <td class="h5">Jumlah Pemasukan</td>
            <td class="h4"><?= $data['kas_masuk']; ?></td>
          </tr>
          <tr>
            <td class="h5">Jumlah Pengeluaran</td>
            <td class="h4"><?= $data['kas_keluar']; ?></td>
          </tr>
        </table>
      </div>
    </div>
  </div>
</div>
<?php } ?>
<!-- /.modal lihat data -->