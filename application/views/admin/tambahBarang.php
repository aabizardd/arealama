<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <?php include "sidebar.php";?>


        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <?php include "topbar.php";?>

                <!-- Begin Page Content -->
                <div class="container-fluid mb-5">

                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">Tambah Data Barang
                            <strong class="text-primary"></strong>
                        </h1>


                    </div>

                    <div class="flash-data" data-flashdata="<?=$this->session->flashdata('flash');?>"></div>
                    <div class="flash-data-error" data-flashdata="<?=$this->session->flashdata('flash-error');?>"></div>

                    <!-- Content Row -->

                    <div class="row">

                        <!-- Area Chart -->
                        <div class="col-xl-12">
                            <div class="card shadow mb-4">
                                <!-- Card Header - Dropdown -->
                                <div
                                    class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                    <h6 class="m-0 font-weight-bold text-primary">Tambah Data Barang</h6>

                                </div>
                                <!-- Card Body -->
                                <div class="card-body">

                                    <ul class="nav nav-tabs" id="myTab" role="tablist">
                                        <li class="nav-item" role="presentation">
                                            <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home"
                                                role="tab" aria-controls="home" aria-selected="true">Data
                                                Barang</a>
                                        </li>


                                    </ul>
                                    <div class="tab-content" id="myTabContent">
                                        <div class="tab-pane fade show active" id="home" role="tabpanel"
                                            aria-labelledby="home-tab">

                                            <div class="row mt-2">
                                                <div class="col-sm-4 mt-3">

                                                    <img src="<?=base_url('assets_praktikum/')?>img_barang_def/default.png"
                                                        alt="" class="rounded mx-auto d-block img-preview" width="100%"
                                                        height="400" id="gambar">

                                                </div>

                                                <div class="col-sm-6 mt-2">

                                                    <?=form_error('nama_barang', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
													<strong>Sorry!</strong> ', '<button type="button" class="close" data-dismiss="alert" aria-label="Close">
													<span aria-hidden="true">&times;</span>
													</button></div>');?>

                                                    <?=form_error('harga', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
													<strong>Sorry!</strong> ', '<button type="button" class="close" data-dismiss="alert" aria-label="Close">
													<span aria-hidden="true">&times;</span>
													</button></div>');?>

                                                    <?=form_error('deskripsi_lainnya', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
													<strong>Sorry!</strong> ', '<button type="button" class="close" data-dismiss="alert" aria-label="Close">
													<span aria-hidden="true">&times;</span>
													</button></div>');?>

                                                    <?=form_error('link', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
													<strong>Sorry!</strong> ', '<button type="button" class="close" data-dismiss="alert" aria-label="Close">
													<span aria-hidden="true">&times;</span>
													</button></div>');?>

                                                    <form method="POST" action="<?=base_url('admin_tambahbarang/')?>"
                                                        enctype="multipart/form-data">
                                                        <div class="form-group">
                                                            <label for="exampleInputEmail1">Nama Barang</label>
                                                            <input type="text" class="form-control" id="nama_barang"
                                                                name="nama_barang" autocomplete="off" value="">

                                                        </div>
                                                        <div class="form-group">
                                                            <label for="exampleInputEmail1">Harga</label>
                                                            <input type="text" class="form-control" id="rupiah"
                                                                aria-describedby="emailHelp" name="harga"
                                                                autocomplete="off" value="">
                                                            <small class="text-info"><i>Contoh penulisan:
                                                                    Rp. 290.000</i></small>
                                                        </div>


                                                        <div class="form-group">
                                                            <label for="exampleInputEmail1">Deskripsi Lainnya</label>
                                                            <textarea class="form-control" id="deskripsi_lainnya"
                                                                name="deskripsi_lainnya" rows="3"></textarea>
                                                            <!-- <input type="text" class="form-control" id="email"
                                                                aria-describedby="emailHelp" name="email"
                                                                autocomplete="off" value=""> -->

                                                        </div>

                                                        <div class="form-group">
                                                            <label for="exampleInputEmail1">Tautan Online Store</label>
                                                            <input type="text" class="form-control" id="link"
                                                                aria-describedby="emailHelp" name="link"
                                                                autocomplete="off" value="">
                                                            <small class="text-info"><i>Contoh tautan:
                                                                    blablabna</i></small>
                                                        </div>




                                                        <input type="hidden" id="foto_old" name="foto_bahan" value="">




                                                        <div class="form-group">

                                                            <label for="exampleInputEmail1">Foto Barang</label>

                                                            <div class="custom-file">
                                                                <input type="file" class="custom-file-input" name="file"
                                                                    id="sampul" aria-describedby="inputGroupFileAddon01"
                                                                    onchange="preview_img()">
                                                                <label class="custom-file-label" for="inputGroupFile01">
                                                                    Choose file</label>
                                                            </div>
                                                        </div>

                                                        <button class="btn btn-primary mt-2" type="submit"
                                                            name="submit">Simpan
                                                            Perubahan</button>



                                                    </form>

                                                </div>
                                            </div>

                                        </div>



                                    </div>




                                </div>
                            </div>
                        </div>


                    </div>






                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->


            <!-- Logout Modal-->
            <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">×</span>
                            </button>
                        </div>
                        <div class="modal-body">Select "Logout" below if you are ready to end your current session.
                        </div>
                        <div class="modal-footer">
                            <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                            <a class="btn btn-primary" href="<?=base_url('admin_home/logout')?>">Logout</a>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Modal -->
            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                aria-hidden="true">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Edit Bahan Praktikum</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body" id="modal-view">

                            <div class="row">
                                <div class="col-sm-5">

                                    <img src="<?=base_url('assets_praktikum/img_lain/no_file.png')?>" alt=""
                                        class="rounded mx-auto d-block img-preview" width="300" height="300"
                                        id="gambar">

                                </div>

                                <div class="col-sm-7 mt-2">

                                    <form method="POST" action="<?=base_url('admin_listmodul/update_bahan/')?>"
                                        enctype="multipart/form-data">
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Judul Bahan</label>
                                            <input type="text" class="form-control" id="judul"
                                                aria-describedby="emailHelp" name="judul_bahan" autocomplete="off">
                                            <!-- <small id="emailHelp" class="form-text text-muted">We'll never share your
                                                email with anyone else.</small> -->
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Keteranan Bahan</label>
                                            <input type="text" class="form-control" id="keterangan"
                                                aria-describedby="emailHelp" name="keterangan_bahan" autocomplete="off">
                                            <!-- <small id="emailHelp" class="form-text text-muted">We'll never share your
                                                email with anyone else.</small> -->
                                        </div>

                                        <input type="hidden" value="asdsa" id="id_bahan" name="id_bahan">
                                        <input type="hidden" id="foto_old" name="foto_bahan">
                                        <input type="hidden" name="id_praktikum" value="<?=$this->uri->segment(3)?>">



                                        <div class="form-group">

                                            <label for="exampleInputEmail1">Foto Barang</label>

                                            <div class="custom-file">
                                                <input type="file" class="custom-file-input" name="file" id="sampul"
                                                    aria-describedby="inputGroupFileAddon01" onchange="preview_img()">
                                                <label class="custom-file-label" for="inputGroupFile01">
                                                    Choose file</label>
                                            </div>
                                        </div>

                                        <button class="btn btn-primary float-right" type="submit" name="submit">Simpan
                                            Perubahan</button>



                                    </form>

                                </div>
                            </div>


                        </div>
                    </div>
                </div>
            </div>


            <!-- Footer -->
            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Copyright &copy; Your Website 2020</span>
                    </div>
                </div>
            </footer>

            <script>
            function preview_img() {

                const sampul = document.querySelector('#sampul');
                const sampulLabel = document.querySelector('.custom-file-label');
                const imgPreview = document.querySelector('.img-preview');

                sampulLabel.textContent = sampul.files[0].name;

                const fileSampul = new FileReader();
                fileSampul.readAsDataURL(sampul.files[0]);

                fileSampul.onload = function(e) {
                    imgPreview.src = e.target.result;
                }

            }
            </script>


            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>


</body>

<script type="text/javascript">
var rupiah = document.getElementById('rupiah');
rupiah.addEventListener('keyup', function(e) {
    // tambahkan 'Rp.' pada saat form di ketik
    // gunakan fungsi formatRupiah() untuk mengubah angka yang di ketik menjadi format angka
    rupiah.value = formatRupiah(this.value, 'Rp. ');
});

/* Fungsi formatRupiah */
function formatRupiah(angka, prefix) {
    var number_string = angka.replace(/[^,\d]/g, '').toString(),
        split = number_string.split(','),
        sisa = split[0].length % 3,
        rupiah = split[0].substr(0, sisa),
        ribuan = split[0].substr(sisa).match(/\d{3}/gi);

    // tambahkan titik jika yang di input sudah menjadi angka ribuan
    if (ribuan) {
        separator = sisa ? '.' : '';
        rupiah += separator + ribuan.join('.');
    }

    rupiah = split[1] != undefined ? rupiah + ',' + split[1] : rupiah;
    return prefix == undefined ? rupiah : (rupiah ? 'Rp. ' + rupiah : '');
}
</script>