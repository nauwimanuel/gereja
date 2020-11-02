<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!-- ==============================================
Konten (isi)
=============================================== -->
<div class="content-wrapper">
  <section class="content-header">
    <h1>
      Halaman <?= $judul ?>
    </h1>
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
      <div class="col-md-12">
        <div class="box  box-primary">
          <div class="box-header with-border1 bg-gray">
            <h3 class="box-title">Tabel <?= $judul ?></h3>
            <a href="#" class="btn btn-primary pull-right" data-toggle="modal" data-target="#modal-tambah">Tambah Data Baru</a>
          </div>
          <!-- /.box-header -->
          <div class="box-body">
            <table id="example1" class="table table-bordered table-striped">
              <thead>
              <tr>
                <th>Nama Anak</th>
                <th>No Surat</th>
                <th>Tanggal</th>
                <th>File Scaand</th>
                <th>Opsi</th>
              </tr>
              </thead>
              <tbody>
              <?php foreach($panak as $data){ ?>
              <tr>
                <td><?= $data['panak_nama']; ?></td>
                <td><?= $data['panak_nos'] ?></td>
                <td><?= $data['panak_tgl'] ?></td>
                <td><a target="_blank" href="<?=base_url('assets/img/upload/'.$data['panak_file'])?>"><?=$data['panak_file']?></a></td>
                <td>
                  <a class="btn btn-default" href="#" data-toggle="modal" data-target="#modal-lihat-<?= $data['panak_id'] ?>"><i class="fa fa-eye"></i></a>
                  <a class="btn btn-primary" href="#" data-toggle="modal" data-target="#modal-edit-<?= $data['panak_id'] ?>"><i class="fa fa-edit"></i></a>
                  <a class="btn btn-danger hapus" href="#" data-link="<?= base_url('p_anak/hapus/'.$data['panak_id']); ?>"><i class="fa fa-trash"></i></a>
                </td>
              </tr>
              <?php } ?>
              </tbody>
              <tfoot>
              <tr>
                <th>Nama Anak</th>
                <th>No Surat</th>
                <th>Tanggal</th>
                <th>File Scannd</th>
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
        <h4 class="modal-title">Form Tambah Data <?= $judul ?></h4>
      </div>
      <div class="modal-body">
        <!-- form start -->
        <form action="<?= base_url('p_anak/tambah'); ?>" method="post" enctype="multipart/form-data" role="form">
          <div class="box-body">
            <div class="form-group">
              <label for="nama">Nama Lengkap</label>
              <input type="text" name="nama" class="form-control" id="nama" placeholder="Masukan Nama..." required>
            </div>
            <div class="form-group">
              <label for="tgl">Tanggal Penyerahan</label>
              <input type="date" name="tgl" class="form-control" id="tgl" required>
            </div>
            <div class="form-group">
              <label for="nos">No Surat Penyerahan</label>
              <input type="text" name="nos" class="form-control" id="nos" placeholder="Masukan No Surat..." required>
            </div>
            <div class="form-group">
              <label for="bp">Nama Ayah</label>
              <input type="text" name="bp" class="form-control" id="bp" placeholder="Masukan Nama Ayah..." required>
            </div>
            <div class="form-group">
              <label for="mm">Nama Ibu</label>
              <input type="text" name="mm" class="form-control" id="mm" placeholder="Masukan Nama Ibu..." required>
            </div>
            <div class="form-group">
              <label for="ptd">Pendeta</label>
              <input type="text" name="ptd" class="form-control" id="ptd" placeholder="Masukan Nama Pendeta..." required>
            </div>
            <div class="form-group">
              <label for="file">Pilih File</label>
              <input type="file" name="file" id="file" required>
              <p class="help-block"><small class="text-danger">Ekstensi file yang disetujui (.pdf).</small></p>
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
<?php foreach ($panak as $bab) { ?>
<div class="modal fade" id="modal-edit-<?= $bab['panak_id'] ?>">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header bg-gray">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Form Edit Data <?= $judul ?></h4>
      </div>
      <div class="modal-body">
        <!-- form start -->
        <form action="<?= base_url('p_anak/edit/'.$bab['panak_id']); ?>" method="post" enctype="multipart/form-data" role="form">
          <div class="box-body">
            <div class="form-group">
              <label for="nama">Nama Lengkap</label>
              <input type="text" name="nama" class="form-control" id="nama" value="<?=$bab['panak_nama']?>" required>
            </div>
            <div class="form-group">
              <label for="tgl">Tanggal Penyerahan</label>
              <input type="date" name="tgl" class="form-control" id="tgl" value="<?=$bab['panak_tgl']?>" required>
            </div>
            <div class="form-group">
              <label for="nos">No Surat Penyerahan</label>
              <input type="text" name="nos" class="form-control" id="nos" value="<?=$bab['panak_nos']?>" required>
            </div>
            <div class="form-group">
              <label for="bp">Nama Ayah</label>
              <input type="text" name="bp" class="form-control" id="bp" value="<?=$bab['panak_bp']?>" required>
            </div>
            <div class="form-group">
              <label for="mm">Nama Ibu</label>
              <input type="text" name="mm" class="form-control" id="mm" value="<?=$bab['panak_mm']?>" required>
            </div>
            <div class="form-group">
              <label for="ptd">Pendeta</label>
              <input type="text" name="ptd" class="form-control" id="ptd" value="<?=$bab['panak_pdt']?>" required>
            </div>
            <div class="form-group">
              <label for="file">Pilih File</label>
              <input type="file" name="file" id="file" required>
              <p class="help-block"><small class="text-danger">Ekstensi file yang disetujui (.pdf).</small></p>
            </div>
            <button type="submit" class="btn btn-primary btn-block">Simpan Data</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
<!-- /.modal edit data -->
<?php } ?>

<!-- Modal Lihat Data -->
<?php foreach ($panak as $wst) { ?>
<div class="modal fade" id="modal-lihat-<?= $wst['panak_id']; ?>">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header bg-gray">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Detail Data <?= $judul ?></h4>
      </div>
      <div class="modal-body">
        <table class="table">
        <tr>
          <td class="h5">Nama Lengkap</td>
          <td class="h4"><?= $wst['panak_nama']; ?></td>
        </tr>
        <tr>
          <td class="h5">No.Surat Penyerahan</td>
          <td class="h4"><?= $wst['panak_nos']; ?></td>
        </tr>
        <tr>
          <td class="h5">Tanggal Penyerahan</td>
          <td class="h4"><?= $wst['panak_tgl']; ?></td>
        </tr>
        <tr>
          <td class="h5">Nama Ibu</td>
          <td class="h4"><?= $wst['panak_mm']; ?></td>
        </tr>
        <tr>
          <td class="h5">Nama Ayah</td>
          <td class="h4"><?= $wst['panak_bp']; ?></td>
        </tr>
        <tr>
          <td class="h5">Nama Pendeta</td>
          <td class="h4"><?= $wst['panak_pdt']; ?></td>
        </tr>
      </table>
      <iframe width="100%" height="500px" src="<?=base_url('assets/img/upload/'.$wst['panak_file'])?>"></iframe>
      </div>
    </div>
  </div>
</div>
<?php } ?>
<!-- /.modal lihat data -->