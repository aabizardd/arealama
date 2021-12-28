<!-- Bootstrap core JavaScript-->
<script src="<?=base_url('assets_template/')?>vendor/jquery/jquery.min.js"></script>
<script src="<?=base_url('assets_template/')?>vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

<!-- Core plugin JavaScript-->
<script src="<?=base_url('assets_template/')?>vendor/jquery-easing/jquery.easing.min.js"></script>

<!-- Custom scripts for all pages-->
<script src="<?=base_url('assets_template/')?>js/sb-admin-2.min.js"></script>


<!-- Page level plugins -->
<!-- <script src="<?=base_url('assets_template/')?>vendor/chart.js/Chart.min.js"></script> -->

<!-- Page level custom scripts -->
<!-- <script src="<?=base_url('assets_template/')?>js/demo/chart-area-demo.js"></script>
<script src="<?=base_url('assets_template/')?>js/demo/chart-pie-demo.js"></script> -->

<!-- jquery -->
<script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk="
    crossorigin="anonymous"></script>

<script type="text/javascript">
$(document).ready(function() {

    var html =
        '<tr><td><input class="form-control" type="text" name="judul_bahan[]" required=""></td><td><input class="form-control" type="text" name="keterangan_bahan[]" required=""></td><td><input class="form-control-file" type="file" name="foto_bahan[]" required=""></td><td><input type="button" name="remove" id="remove" value="Hapus" class="btn btn-danger"></td></tr>';

    var max = 19;
    var x = 1;

    $("#add").click(function() {
        if (x <= max) {
            $("#table_field").append(html);
            x++;
        }
    });

    $("#table_field").on('click', '#remove', function() {
        $(this).closest('tr').remove();
        x--;
    });

})

$('.editbahan').on('click', function(e) {
    var id_bahan = $(this).data('idbahan');
    var judul_bahan = $(this).data('judul');
    var keterangan_bahan = $(this).data('keterangan');
    var foto_bahan = $(this).data('gambar');

    $("#modal-view #judul").val(judul_bahan);
    $("#modal-view #keterangan").val(keterangan_bahan);
    $("#modal-view #id_bahan").val(id_bahan);
    $("#modal-view #foto_old").val(foto_bahan);
    $("#modal-view #gambar").attr('src', '<?=base_url('assets_praktikum/img_bahan_modul/')?>' + foto_bahan);


});

$('.edit-kelas').on('click', function(e) {
    var id_kelas = $(this).data('idkelas');
    var nama_kelas = $(this).data('namakelas');


    $("#modal-view #id_kelas").val(id_kelas);
    $("#modal-view #nama_kelas").val(nama_kelas);



});
</script>






<script src="<?=base_url('assets_template/js/sweetalert/sweetalert2.all.min.js')?>">
</script>
<script type="text/javascript" src="<?=base_url('assets_template/js/sweetalert/myscript.js')?>">
</script>

<script>
$('.tombol-nonaktif').on('click', function(e) {

    e.preventDefault();
    const href = $(this).attr('href');

    const swalWithBootstrapButtons = Swal.mixin({
        customClass: {
            confirmButton: 'btn btn-success',
            cancelButton: 'btn btn-danger mr-2'
        },
        buttonsStyling: false
    })

    swalWithBootstrapButtons.fire({
        title: 'Apakah kamu yakin?',
        text: "Nonaktifkan data mahasiswa",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonText: 'Ya, nonaktifkan data!',
        cancelButtonText: 'Jangan, batalkan!',
        reverseButtons: true
    }).then((result) => {
        if (result.isConfirmed) {

            document.location.href = href;

        } else if (
            /* Read more about handling dismissals below */
            result.dismiss === Swal.DismissReason.cancel
        ) {
            swalWithBootstrapButtons.fire(
                'Dibatalkan',
                'Nonaktivasi Dibatalkan!',
                'error'
            )
        }
    });

});

$('.tombol-aktif').on('click', function(e) {

    e.preventDefault();
    const href = $(this).attr('href');

    const swalWithBootstrapButtons = Swal.mixin({
        customClass: {
            confirmButton: 'btn btn-success',
            cancelButton: 'btn btn-danger mr-2'
        },
        buttonsStyling: false
    })

    swalWithBootstrapButtons.fire({
        title: 'Apakah kamu yakin?',
        text: "Aktifkan data mahasiswa",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonText: 'Ya, aktifkan data!',
        cancelButtonText: 'Jangan, batalkan!',
        reverseButtons: true
    }).then((result) => {
        if (result.isConfirmed) {

            document.location.href = href;

        } else if (
            /* Read more about handling dismissals below */
            result.dismiss === Swal.DismissReason.cancel
        ) {
            swalWithBootstrapButtons.fire(
                'Dibatalkan',
                'Aktivasi Dibatalkan!',
                'error'
            )
        }
    });

});
</script>

<!-- Page level plugins -->
<script src="<?=base_url('assets_template/')?>vendor/datatables/jquery.dataTables.min.js"></script>
<script src="<?=base_url('assets_template/')?>vendor/datatables/dataTables.bootstrap4.min.js"></script>

<!-- Page level custom scripts -->
<script src="<?=base_url('assets_template/')?>js/demo/datatables-demo.js"></script>



</html>