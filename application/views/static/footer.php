<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!-- ==============================================
Footer
=============================================== -->
<footer class="main-footer">
  <div class="pull-right hidden-xs">
    <b>Sistem Informasi</b> Marturia
  </div>
  <strong> Copyright &copy; 2020 - <?php echo date('F Y'); ?> <a href="#"> INFORMATIKA UNIPA</a>.</strong>
</footer>
</div>

<!-- jQuery 3 -->
<script src="<?= base_url(); ?>assets/asset/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="<?= base_url(); ?>assets/asset/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- FastClick -->
<script src="<?= base_url(); ?>assets/asset/fastclick/lib/fastclick.js"></script>
<!-- My JavaScript -->
<script src="<?= base_url(); ?>assets/dist/js/adminlte.min.js"></script>
<script src="<?= base_url(); ?>assets/dist/js/demo.js"></script>
<script src="<?= base_url(); ?>assets/js/jquery.dataTables.min.js"></script>
<script src="<?= base_url(); ?>assets/js/dataTables.bootstrap.min.js"></script>
<script src="<?= base_url(); ?>assets/js/sweetalert2.all.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
<!-- CK Editor -->
<script src="<?= base_url(); ?>assets/js/ckeditor/ckeditor.js"></script>
<!-- page script -->
<script>
  $(function () {
    $('#example1').DataTable()
  });
  CKEDITOR.replace( 'editor' );

  $(function () {
    $('#example2').DataTable()
  });
  CKEDITOR.replace( 'editor0' );
  CKEDITOR.replace( 'editor1' );
  CKEDITOR.replace( 'editor2' );
  CKEDITOR.replace( 'editor3' );
  CKEDITOR.replace( 'editor4' );
  CKEDITOR.replace( 'editor5' );
  CKEDITOR.replace( 'editor6' );
  CKEDITOR.replace( 'editor7' );
  CKEDITOR.replace( 'editor8' );
  CKEDITOR.replace( 'editor9' );
  CKEDITOR.replace( 'editor10' );

  // alert
  $('.hapus').on('click', function (e) {
    const link = $(this).attr('data-link');
    console.log(link);
    Swal.fire({
      icon: 'warning',
      title: 'Apakah anda yakin ?',
      text: "hal ini akan menghapus Data secara permanen!",
      showCancelButton: true,
      confirmButtonColor: '#3085d6',
      cancelButtonColor: '#d33',
      confirmButtonText: 'Ya, Hapus',
      cancelButtonText: 'Batalkan',
    }).then( function (result) {
      if (result.value) {
        window.location.href = link;
      }      
    });
  });


  // Fungsi Rupiah
  var rupiah = document.getElementById("rupiah");
  rupiah.addEventListener("keyup", function(e) {
    // tambahkan 'Rp.' pada saat form di ketik
    // gunakan fungsi formatRupiah() untuk mengubah angka yang di ketik menjadi format angka
    rupiah.value = formatRupiah(this.value, "Rp. ");
  });

  /* Fungsi formatRupiah */
  function formatRupiah(angka, prefix) {
    var number_string = angka.replace(/[^,\d]/g, "").toString(),
      split = number_string.split(","),
      sisa = split[0].length % 3,
      rupiah = split[0].substr(0, sisa),
      ribuan = split[0].substr(sisa).match(/\d{3}/gi);

    // tambahkan titik jika yang di input sudah menjadi angka ribuan
    if (ribuan) {
      separator = sisa ? "." : "";
      rupiah += separator + ribuan.join(".");
    }

    rupiah = split[1] != undefined ? rupiah + "," + split[1] : rupiah;
    return prefix == undefined ? rupiah : rupiah ? "Rp. " + rupiah : "";
  }


  // Tanggal Ganda
    $(function () {
    //Initialize Select2 Elements
    $('.select2').select2()

    //Datemask dd/mm/yyyy
    $('#datemask').inputmask('dd/mm/yyyy', { 'placeholder': 'dd/mm/yyyy' })
    //Datemask2 mm/dd/yyyy
    $('#datemask2').inputmask('mm/dd/yyyy', { 'placeholder': 'mm/dd/yyyy' })
    //Money Euro
    $('[data-mask]').inputmask()

    //Date range picker
    $('#reservation').daterangepicker()
    //Date range picker with time picker
    $('#reservationtime').daterangepicker({ timePicker: true, timePickerIncrement: 30, format: 'MM/DD/YYYY h:mm A' })
    //Date range as a button
    $('#daterange-btn').daterangepicker(
      {
        ranges   : {
          'Today'       : [moment(), moment()],
          'Yesterday'   : [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
          'Last 7 Days' : [moment().subtract(6, 'days'), moment()],
          'Last 30 Days': [moment().subtract(29, 'days'), moment()],
          'This Month'  : [moment().startOf('month'), moment().endOf('month')],
          'Last Month'  : [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
        },
        startDate: moment().subtract(29, 'days'),
        endDate  : moment()
      },
      function (start, end) {
        $('#daterange-btn span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'))
      }
    )

    //Date picker
    $('#datepicker').datepicker({
      autoclose: true
    })

    //iCheck for checkbox and radio inputs
    $('input[type="checkbox"].minimal, input[type="radio"].minimal').iCheck({
      checkboxClass: 'icheckbox_minimal-blue',
      radioClass   : 'iradio_minimal-blue'
    })
    //Red color scheme for iCheck
    $('input[type="checkbox"].minimal-red, input[type="radio"].minimal-red').iCheck({
      checkboxClass: 'icheckbox_minimal-red',
      radioClass   : 'iradio_minimal-red'
    })
    //Flat red color scheme for iCheck
    $('input[type="checkbox"].flat-red, input[type="radio"].flat-red').iCheck({
      checkboxClass: 'icheckbox_flat-green',
      radioClass   : 'iradio_flat-green'
    })

    //Colorpicker
    $('.my-colorpicker1').colorpicker()
    //color picker with addon
    $('.my-colorpicker2').colorpicker()

    //Timepicker
    $('.timepicker').timepicker({
      showInputs: false
    })
  })
</script>
</body>
</html>