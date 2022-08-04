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
                        <h1 class="h3 mb-0 text-gray-800">List Data Ongkir</h1>



                        <!-- Button trigger modal -->
                        <button type="button" class="btn btn-primary mb-2" data-toggle="modal"
                            data-target="#exampleModal"><i class="fas fa-plus"></i>
                            Tambah Data Ongkir
                        </button>


                    </div>

                    <div class="flash-data" data-flashdata="<?=$this->session->flashdata('flash');?>"></div>
                    <div class="flash-data-error" data-flashdata="<?=$this->session->flashdata('flash-error');?>">
                    </div>

                    <div class="card">

                        <div class="card-body">



                            <div class="row">


                                <div class="table-responsive">
                                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Provinsi</th>
                                                <th>Ongkir</th>
                                                <th>Aksi</th>

                                            </tr>
                                        </thead>

                                        <tbody>

                                            <?php $no = 0?>
                                            <?php foreach ($ongkirs as $o): ?>
                                            <tr>
                                                <td><?=++$no?></td>
                                                <td><?=$o->provinsi?></td>
                                                <td><?=$o->ongkir?></td>
                                                <td width=200>
                                                    <a href="<?=base_url('admin_kelolaongkir/hapus/' . $o->id)?>"
                                                        class="btn btn-danger mt-2">Hapus</a>

                                                    <button type="button" class="btn btn-warning mt-2 editOngkir"
                                                        data-toggle="modal" data-target=".editModal"
                                                        data-idongkir="<?=$o->id?>" data-provinsi="<?=$o->provinsi?>"
                                                        data-ongkir="<?=$o->ongkir?>">
                                                        Edit
                                                    </button>
                                                </td>
                                            </tr>
                                            <?php endforeach?>

                                        </tbody>
                                    </table>
                                </div>




                            </div>





                        </div>

                    </div>











                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Copyright &copy; Your Website 2020</span>
                    </div>
                </div>
            </footer>
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>



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
                <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <a class="btn btn-primary" href="<?=base_url('admin_home/logout')?>">Logout</a>
                </div>
            </div>
        </div>
    </div>


    <!-- Modal Tambah -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Tambah Data Ongkir</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="<?=base_url('admin_kelolaongkir/tambah_ongkir')?>" method="POST">
                    <div class="modal-body">



                        <div class="form-group">
                            <label for="exampleInputEmail1">Provinsi</label>
                            <input type="text" class="form-control" name="provinsi" id="provinsi"
                                placeholder="Masukkan Provinsi">

                        </div>


                        <div class="form-group">
                            <label for="exampleInputEmail1">Ongkir</label>
                            <input type="number" class="form-control" name="ongkir" id="ongkir"
                                placeholder="Masukkan Ongkir">

                        </div>





                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save changes</button>
                    </div>
                </form>

            </div>
        </div>
    </div>


    <!-- Modal Edit -->
    <div class="modal fade editModal" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Update Data Ongkir</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="<?=base_url('admin_kelolaongkir/update')?>" method="POST">
                    <div class="modal-body">


                        <input type="hidden" name="id_ongkir" id="id_ongkir">

                        <div class="form-group">
                            <label for="exampleInputEmail1">Provinsi</label>
                            <input type="text" class="form-control" name="provinsi" id="provinsi"
                                placeholder="Masukkan Provinsi">

                        </div>


                        <div class="form-group">
                            <label for="exampleInputEmail1">Ongkir</label>
                            <input type="number" class="form-control" name="ongkir" id="ongkir"
                                placeholder="Masukkan Ongkir">

                        </div>





                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save changes</button>
                    </div>
                </form>

            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.js"
        integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>

    <script>
    $(document).on("click", ".editOngkir", function() {
        // alert('hai')

        var idongkir = $(this).data('idongkir');
        var provinsi = $(this).data('provinsi');
        var ongkir = $(this).data('ongkir');


        $(".modal-body #id_ongkir").val(idongkir);
        $(".modal-body #provinsi").val(provinsi);
        $(".modal-body #ongkir").val(ongkir);
        // As pointed out in comments,
        // it is unnecessary to have to manually call the modal.
        // $('#addBookDialog').modal('show');
    });
    </script>






</body>