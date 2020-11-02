<!DOCTYPE html>
<html>
<head>
  <title>Marturia | Cetak Laporan Bulanan</title>

  <link rel="stylesheet" href="<?= base_url(); ?>assets/asset/bootstrap/dist/css/bootstrap.min.css">
  <style type="text/css">
    *{
      margin: 0px;
      padding: 1px;
    }
    body{
      width: auto;
      height: 290px;
      margin: 1px;
    }
    table{
      margin: 0px;
      padding: 0px;
    }
    td{
      margin: 15px;
      padding: 15px;
    }
    .table table{
      width: 100%;
    }
    .col1{
      width: 5%;
      text-align: center;
    }

    .col2{
      width: 15%;
      text-align: center;
    }
    .col3{
      width: 40%;
      text-align: center;
    }
    .col4{
      width: 20%;
      text-align: center;
    }
    .col5{
      width: 20%;
      text-align: center;
    }
    .col6{
      width: 60%;
      text-align: center;
    }
    .col7{
      width: 20%;
      text-align: right;
    }
    .table th, tr, td{
      /*border: 1px solid black;*/
    }
    .table td{
      padding: 0 2px;
    }
    .table .datar td{
      text-align: center;
    }
    .no{
      text-align: center;
    }
    .no table{
      width: 100%;
    }
  </style>

</head>
<body onload="window.print();">
  <?php $bulan = ['', 'Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember']; $tgl = ltrim($this->input->post('tgl'), 0) ?>
  <h4>
  	<center>
  		GEREJA BAPTIS ANUGERAH INDONESIA <br>
  		JEMAAT MARTURIA <br>
  		WILAYAH V MANOKWARI PAPUA BARAT <br>
  		Bulan <?= $bulan[$tgl].' '.date('Y') ?> <br>
  		Buku Kas Umum 
   	</center>
  </h4>


  <div class="table">
    <table class="table-bordered">
      <thead>
        <tr>
          <th class="col1">NO</th>
          <th class="col2">TANGGAL</th>
          <th class="col3">Uraian</th>
          <th class="col4">Penerimaan (Rp)</th>
          <th class="col5">Pengeluaran (Rp)</th>
        </tr>
      </thead>

       <tbody>
        <tr class="datar">
          <td>I</td>
          <td></td>
          <td>PERSEMBAHAN</td>
          <td></td>
          <td></td>
        </tr>
        <?php $i1=1; $totalm1=0; $totalk1=0; foreach ($laporan1 as $lprn ): ?>
          <tr>
            <td style="text-align: center;"><?= $i1; $i1++ ?></td>
            <td style="text-align: center;"><?= $lprn['kas_tanggal'] ?></td>
            <td style="text-align: left;"><?= $lprn['kas_keterangan'] ?></td>
            <td style="text-align: right;"><?= number_format($lprn['kas_masuk']) ?></td>
            <td style="text-align: right;"><?= number_format($lprn['kas_keluar']) ?></td>
          </tr>
        <?php 
          $totalm1 += $lprn['kas_masuk'];
          $totalk1 += $lprn['kas_keluar'];
          endforeach; 
        ?>
      </tbody>
    </table>
    <table class="table-bordered">
    	<tr>
    		<td class="col6">Jumlah Bulan <?= $bulan[$tgl] ?></td>
    		<td class="col7">Rp <?=number_format($totalm1);?></td>
        <td class="col7">Rp <?=number_format($totalk1);?></td>
    	</tr>
      <tr>
        <td class="col6">Saldo Sebelumnya</td>
        <td class="col7">Rp <?= number_format( $saldom1[0]['kas_masuk'] ) ?></td>
        <td class="col7">Rp <?= number_format( $saldok1[0]['kas_keluar'] ) ?></td>
      </tr>
      <?php $tm1 = $totalm1 + $saldom1[0]['kas_masuk']; $tk1 = $totalk1 + $saldok1[0]['kas_keluar']?>
      <tr>
        <td class="col6">Total</td>
        <td class="col7">Rp <?= number_format( $tm1 ) ?></td>
        <td class="col7">Rp <?= number_format( $tk1 ) ?></td>
      </tr>
      <?php $sk1 = $tm1 - $tk1 ?>
      <tr>
        <td class="col6">Sisa Kas</td>
        <td class="col7">Rp <?= number_format( $sk1 ) ?></td>
        <td class="col7"></td>
      </tr>
    </table>

    <br>

    <table class="table-bordered">
      <thead>
        <tr>
          <th class="col1">NO</th>
          <th class="col2">TANGGAL</th>
          <th class="col3">Uraian</th>
          <th class="col4">Penerimaan (Rp)</th>
          <th class="col5">Pengeluaran (Rp)</th>
        </tr>
      </thead>
        <tbody>
        <tr class="datar">
          <td>II</td>
          <td></td>
          <td>PERSEPULUHAN</td>
          <td></td>
          <td></td>
        </tr>
        <?php $i2=1; $totalm2=0; $totalk2=0; foreach ($laporan2 as $lprn ): ?>
          <tr>
            <td style="text-align: center;"><?= $i2; $i2++ ?></td>
            <td style="text-align: center;"><?= $lprn['kas_tanggal'] ?></td>
            <td style="text-align: left;"><?= $lprn['kas_keterangan'] ?></td>
            <td style="text-align: right;"><?= number_format($lprn['kas_masuk']) ?></td>
            <td style="text-align: right;"><?= number_format($lprn['kas_keluar']) ?></td>
          </tr>
        <?php 
          $totalm2 += $lprn['kas_masuk'];
          $totalk2 += $lprn['kas_keluar'];
          endforeach; 
        ?>
      </tbody>
    </table>
    <table class="table-bordered">
      <tr>
        <td class="col6">Jumlah Bulan <?= $bulan[$tgl] ?></td>
        <td class="col7">Rp <?=number_format($totalm2);?></td>
        <td class="col7">Rp <?=number_format($totalk2);?></td>
      </tr>
      <tr>
        <td class="col6">Saldo Sebelumnya</td>
        <td class="col7">Rp <?= number_format( $saldom2[0]['kas_masuk'] ) ?></td>
        <td class="col7">Rp <?= number_format( $saldok2[0]['kas_keluar'] ) ?></td>
      </tr>
      <?php $tm2 = $totalm2 + $saldom2[0]['kas_masuk']; $tk2 = $totalk2 + $saldok2[0]['kas_keluar']?>
      <tr>
        <td class="col6">Total</td>
        <td class="col7">Rp <?= number_format( $tm2 ) ?></td>
        <td class="col7">Rp <?= number_format( $tk2 ) ?></td>
      </tr>
      <?php $sk2 = $tm2 - $tk2 ?>
      <tr>
        <td class="col6">Sisa Kas</td>
        <td class="col7">Rp <?= number_format( $sk2 ) ?></td>
        <td class="col7"></td>
      </tr>
    </table>

    <br>

    <table class="table-bordered">
      <thead>
        <tr>
          <th class="col1">NO</th>
          <th class="col2">TANGGAL</th>
          <th class="col3">Uraian</th>
          <th class="col4">Penerimaan (Rp)</th>
          <th class="col5">Pengeluaran (Rp)</th>
        </tr>
      </thead>
      <tbody>
        <tr class="datar">
          <td>III</td>
          <td></td>
          <td>PENGINJILAN</td>
          <td></td>
          <td></td>
        </tr>
        <?php $i3=1; $totalm3=0; $totalk3=0; foreach ($laporan3 as $lprn ): ?>
          <tr>
            <td style="text-align: center;"><?= $i3; $i3++ ?></td>
            <td style="text-align: center;"><?= $lprn['kas_tanggal'] ?></td>
            <td style="text-align: left;"><?= $lprn['kas_keterangan'] ?></td>
            <td style="text-align: right;"><?= number_format($lprn['kas_masuk']) ?></td>
            <td style="text-align: right;"><?= number_format($lprn['kas_keluar']) ?></td>
          </tr>
        <?php 
          $totalm3 += $lprn['kas_masuk'];
          $totalk3 += $lprn['kas_keluar'];
          endforeach; 
        ?>
      </tbody>
    </table>
    <table class="table-bordered">
      <tr>
        <td class="col6">Jumlah Bulan <?= $bulan[$tgl] ?></td>
        <td class="col7">Rp <?=number_format($totalm3);?></td>
        <td class="col7">Rp <?=number_format($totalk3);?></td>
      </tr>
      <tr>
        <td class="col6">Saldo Sebelumnya</td>
        <td class="col7">Rp <?= number_format( $saldom3[0]['kas_masuk'] ) ?></td>
        <td class="col7">Rp <?= number_format( $saldok3[0]['kas_keluar'] ) ?></td>
      </tr>
      <?php $tm3 = $totalm3 + $saldom3[0]['kas_masuk']; $tk3 = $totalk3 + $saldok3[0]['kas_keluar']?>
      <tr>
        <td class="col6">Total</td>
        <td class="col7">Rp <?= number_format( $tm3 ) ?></td>
        <td class="col7">Rp <?= number_format( $tk3 ) ?></td>
      </tr>
      <?php $sk3 = $tm3 - $tk3 ?>
      <tr>
        <td class="col6">Sisa Kas</td>
        <td class="col7">Rp <?= number_format( $sk3 ) ?></td>
        <td class="col7"></td>
      </tr>
    </table>

    <br>

    <table class="table-bordered">
      <thead>
        <tr>
          <th class="col1">NO</th>
          <th class="col2">TANGGAL</th>
          <th class="col3">Uraian</th>
          <th class="col4">Penerimaan (Rp)</th>
          <th class="col5">Pengeluaran (Rp)</th>
        </tr>
      </thead>
      <tbody>
        <tr class="datar">
          <td>V</td>
          <td></td>
          <td>DIAKONIA</td>
          <td></td>
          <td></td>
        </tr>
        <?php $i4=1; $totalm4=0; $totalk4=0; foreach ($laporan4 as $lprn ): ?>
          <tr>
            <td style="text-align: center;"><?= $i4; $i4++ ?></td>
            <td style="text-align: center;"><?= $lprn['kas_tanggal'] ?></td>
            <td style="text-align: left;"><?= $lprn['kas_keterangan'] ?></td>
            <td style="text-align: right;"><?= number_format($lprn['kas_masuk']) ?></td>
            <td style="text-align: right;"><?= number_format($lprn['kas_keluar']) ?></td>
          </tr>
        <?php 
          $totalm4 += $lprn['kas_masuk'];
          $totalk4 += $lprn['kas_keluar'];
          endforeach; 
        ?>
      </tbody>
    </table>
    <table class="table-bordered">
      <tr>
        <td class="col6">Jumlah Bulan <?= $bulan[$tgl] ?></td>
        <td class="col7">Rp <?=number_format($totalm4);?></td>
        <td class="col7">Rp <?=number_format($totalk4);?></td>
      </tr>
      <tr>
        <td class="col6">Saldo Sebelumnya</td>
        <td class="col7">Rp <?= number_format( $saldom4[0]['kas_masuk'] ) ?></td>
        <td class="col7">Rp <?= number_format( $saldok4[0]['kas_keluar'] ) ?></td>
      </tr>
      <?php $tm4 = $totalm4 + $saldom4[0]['kas_masuk']; $tk4 = $totalk4 + $saldok4[0]['kas_keluar']?>
      <tr>
        <td class="col6">Total</td>
        <td class="col7">Rp <?= number_format( $tm4 ) ?></td>
        <td class="col7">Rp <?= number_format( $tk4 ) ?></td>
      </tr>
      <?php $sk4 = $tm4 - $tk4 ?>
      <tr>
        <td class="col6">Sisa Kas</td>
        <td class="col7">Rp <?= number_format( $sk4 ) ?></td>
        <td class="col7"></td>
      </tr>
    </table>

    <br>

    <table class="table-bordered">
      <thead>
        <tr>
          <th class="col1">NO</th>
          <th class="col2">TANGGAL</th>
          <th class="col3">Uraian</th>
          <th class="col4">Penerimaan (Rp)</th>
          <th class="col5">Pengeluaran (Rp)</th>
        </tr>
      </thead>
      <tbody>
        <tr class="datar">
          <td>V</td>
          <td></td>
          <td>PEMBANGUNAN</td>
          <td></td>
          <td></td>
        </tr>
        <?php $i5=1; $totalm5=0; $totalk5=0; foreach ($laporan5 as $lprn ): ?>
          <tr>
            <td style="text-align: center;"><?= $i5; $i5++ ?></td>
            <td style="text-align: center;"><?= $lprn['kas_tanggal'] ?></td>
            <td style="text-align: left;"><?= $lprn['kas_keterangan'] ?></td>
            <td style="text-align: right;"><?= number_format($lprn['kas_masuk']) ?></td>
            <td style="text-align: right;"><?= number_format($lprn['kas_keluar']) ?></td>
          </tr>
        <?php 
          $totalm5 += $lprn['kas_masuk'];
          $totalk5 += $lprn['kas_keluar'];
          endforeach; 
        ?>
      </tbody>
    </table>
    <table class="table-bordered">
      <tr>
        <td class="col6">Jumlah Bulan <?= $bulan[$tgl] ?></td>
        <td class="col7">Rp <?=number_format($totalm5);?></td>
        <td class="col7">Rp <?=number_format($totalk5);?></td>
      </tr>
      <tr>
        <td class="col6">Saldo Sebelumnya</td>
        <td class="col7">Rp <?= number_format( $saldom5[0]['kas_masuk'] ) ?></td>
        <td class="col7">Rp <?= number_format( $saldok5[0]['kas_keluar'] ) ?></td>
      </tr>
      <?php $tm5 = $totalm5 + $saldom5[0]['kas_masuk']; $tk5 = $totalk5 + $saldok5[0]['kas_keluar']?>
      <tr>
        <td class="col6">Total</td>
        <td class="col7">Rp <?= number_format( $tm5 ) ?></td>
        <td class="col7">Rp <?= number_format( $tk5 ) ?></td>
      </tr>
      <?php $sk5 = $tm5 - $tk5 ?>
      <tr>
        <td class="col6">Sisa Kas</td>
        <td class="col7">Rp <?= number_format( $sk5 ) ?></td>
        <td class="col7"></td>
      </tr>
    </table>

    <br>

    <table class="table-bordered">
      <thead>
        <tr>
          <th class="col1">NO</th>
          <th class="col2">TANGGAL</th>
          <th class="col3">Uraian</th>
          <th class="col4">Penerimaan (Rp)</th>
          <th class="col5">Pengeluaran (Rp)</th>
        </tr>
      </thead>
      <tbody>
        <tr class="datar">
          <td>VI</td>
          <td></td>
          <td>IURAN WAJIB</td>
          <td></td>
          <td></td>
        </tr>
        <?php $i6=1; $totalm6=0; $totalk6=0; foreach ($laporan6 as $lprn ): ?>
          <tr>
            <td style="text-align: center;"><?= $i6; $i6++ ?></td>
            <td style="text-align: center;"><?= $lprn['kas_tanggal'] ?></td>
            <td style="text-align: left;"><?= $lprn['kas_keterangan'] ?></td>
            <td style="text-align: right;"><?= number_format($lprn['kas_masuk']) ?></td>
            <td style="text-align: right;"><?= number_format($lprn['kas_keluar']) ?></td>
          </tr>
        <?php 
          $totalm6 += $lprn['kas_masuk'];
          $totalk6 += $lprn['kas_keluar'];
          endforeach; 
        ?>
      </tbody>
    </table>
    <table class="table-bordered">
      <tr>
        <td class="col6">Jumlah Bulan <?= $bulan[$tgl] ?></td>
        <td class="col7">Rp <?=number_format($totalm6);?></td>
        <td class="col7">Rp <?=number_format($totalk6);?></td>
      </tr>
      <tr>
        <td class="col6">Saldo Sebelumnya</td>
        <td class="col7">Rp <?= number_format( $saldom6[0]['kas_masuk'] ) ?></td>
        <td class="col7">Rp <?= number_format( $saldok6[0]['kas_keluar'] ) ?></td>
      </tr>
      <?php $tm6 = $totalm6 + $saldom6[0]['kas_masuk']; $tk6 = $totalk6 + $saldok6[0]['kas_keluar']?>
      <tr>
        <td class="col6">Total</td>
        <td class="col7">Rp <?= number_format( $tm6 ) ?></td>
        <td class="col7">Rp <?= number_format( $tk6 ) ?></td>
      </tr>
      <?php $sk6 = $tm6 - $tk6 ?>
      <tr>
        <td class="col6">Sisa Kas</td>
        <td class="col7">Rp <?= number_format( $sk6 ) ?></td>
        <td class="col7"></td>
      </tr>
    </table>

    <br>

    <table class="table-bordered">
      <thead>
        <tr>
          <th class="col1">NO</th>
          <th class="col2">TANGGAL</th>
          <th class="col3">Uraian</th>
          <th class="col4">Penerimaan (Rp)</th>
          <th class="col5">Pengeluaran (Rp)</th>
        </tr>
      </thead>
      <tbody>
        <tr class="datar">
          <td>VI</td>
          <td>ii</td>
          <td>KEYBOARD</td>
          <td>iv</td>
          <td>v</td>
        </tr>
        <?php $i7=1; $totalm7=0; $totalk7=0; foreach ($laporan7 as $lprn ): ?>
          <tr>
            <td style="text-align: center;"><?= $i7; $i7++ ?></td>
            <td style="text-align: center;"><?= $lprn['kas_tanggal'] ?></td>
            <td style="text-align: left;"><?= $lprn['kas_keterangan'] ?></td>
            <td style="text-align: right;"><?= number_format($lprn['kas_masuk']) ?></td>
            <td style="text-align: right;"><?= number_format($lprn['kas_keluar']) ?></td>
          </tr>
        <?php 
          $totalm7 += $lprn['kas_masuk'];
          $totalk7 += $lprn['kas_keluar'];
          endforeach; 
        ?>
      </tbody>
    </table>
    <table class="table-bordered">
      <tr>
        <td class="col6">Jumlah Bulan <?= $bulan[$tgl] ?></td>
        <td class="col7">Rp <?=number_format($totalm7);?></td>
        <td class="col7">Rp <?=number_format($totalk7);?></td>
      </tr>
      <tr>
        <td class="col6">Saldo Sebelumnya</td>
        <td class="col7">Rp <?= number_format( $saldom7[0]['kas_masuk'] ) ?></td>
        <td class="col7">Rp <?= number_format( $saldok7[0]['kas_keluar'] ) ?></td>
      </tr>
      <?php $tm7 = $totalm7 + $saldom7[0]['kas_masuk']; $tk7 = $totalk7 + $saldok7[0]['kas_keluar']?>
      <tr>
        <td class="col6">Total</td>
        <td class="col7">Rp <?= number_format( $tm7 ) ?></td>
        <td class="col7">Rp <?= number_format( $tk7 ) ?></td>
      </tr>
      <?php $sk7 = $tm7 - $tk7 ?>
      <tr>
        <td class="col6">Sisa Kas</td>
        <td class="col7">Rp <?= number_format( $sk7 ) ?></td>
        <td class="col7"></td>
      </tr>
    </table>


    <?php 
      $sumtotalm =  $totalm1 + $totalm2 + $totalm3 + $totalm4 + $totalm5 + $totalm6 + $totalm7;
      $sumtotalk =  $totalk1 + $totalk2 + $totalk3 + $totalk4 + $totalk5 + $totalk6 + $totalk7;
      $sumsaldom =  $saldom1 + $saldom2 + $saldom3 + $saldom4 + $saldom5 + $saldom6 + $saldom7;
      $sumsaldok =  $saldok1 + $saldok2 + $saldok3 + $saldok4 + $saldok5 + $saldok6 + $saldok7;
      $sumtm =  $tm1 + $tm2 + $tm3 + $tm4 + $tm5 + $tm6 + $tm7;
      $sumtk =  $tk1 + $tk2 + $tk3 + $tk4 + $tk5 + $tk6 + $tk7;
      $sisakas = $sumtm - $sumtk;
    ?>
    <table class="table-bordered">
      <tr>
        <td class="col6">Jumlah Total Bulan <?= $bulan[$tgl].' '.date('Y')?></td>
        <td class="col7">Rp <?=number_format($sumtotalm);?></td>
        <td class="col7">Rp <?=number_format($sumtotalk);?></td>
      </tr>
      <tr>
        <td class="col6">Jumlah Total Saldo Awal</td>
        <td class="col7">Rp <?= number_format( $sumsaldom[0]['kas_masuk'] ) ?></td>
        <td class="col7">Rp <?= number_format( $sumsaldok[0]['kas_keluar'] ) ?></td>
      </tr>
      <?php $tm7 = $totalm7 + $saldom7[0]['kas_masuk']; $tk7 = $totalk7 + $saldok7[0]['kas_keluar']?>
      <tr>
        <td class="col6">Jumlah Total Saldo</td>
        <td class="col7">Rp <?= number_format( $sumtm ) ?></td>
        <td class="col7">Rp <?= number_format( $sumtk ) ?></td>
      </tr>
      <?php $sk7 = $tm7 - $tk7 ?>
      <tr>
        <td class="col6">Sisa Kas</td>
        <td class="col7">Rp <?= number_format( $sisakas ) ?></td>
        <td class="col7"></td>
      </tr>
    </table>
  </div>

  <div class="no">
    <p style="text-align: center;">Mengetahui Wakil Badan Pelayan I GBAI</p>
    <p style="text-align: right;">Manokwari, <?= date('d F Y') ?></p>
    <table>
      <tr>
        <td style="width: 35%;text-align: center;">Jemaat Marturia</td>
        <td style="width:30%"></td>
        <td style="width: 35%;text-align: center;">Bendahara I</td>
      </tr>
      <tr><td></td><td></td><td></td></tr>
      <tr><td></td><td></td><td></td></tr>
      <tr>
        <td>MATIUS ASMURUF</td>
        <td></td>
        <td>YULIANA ISI</td>
      </tr>

      <tr>
        <td></td>
        <td style="text-align: center;">GEMBALA SIDANG dan KETUA BADAN PELAYAN GBAI JEMAAT MARTURIA</td>
        <td></td>
      </tr>
      <tr><td></td><td></td><td></td></tr>
      <tr><td></td><td></td><td></td></tr>
      <tr>
        <td></td>
        <td style="text-align: center;">PdT. JOMES ISTIA, B.Th</td>
        <td></td>
      </tr>
    </table>
  </div>
</body>
</html>
