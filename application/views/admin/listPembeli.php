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
                        <h1 class="h3 mb-0 text-gray-800">List Data Pembeli</h1>


                        <form action="<?=base_url('Admin_kelolapembeli');?>" method="POST">
                            <div class="row mt-2">
                                <div class="col-9">
                                    <input type="text" class="form-control" placeholder="Keyword..." autocomplete="off"
                                        autofocus name="keyword" value="">
                                </div>
                                <div class="col-1">
                                    <button class="btn btn-primary" name="submit" type="submit" value="Cari">
                                        <i class="fas fa-search"></i>
                                    </button>
                                </div>
                            </div>
                        </form>



                    </div>

                    <div class="flash-data" data-flashdata="<?=$this->session->flashdata('flash');?>"></div>
                    <div class="flash-data-error" data-flashdata="<?=$this->session->flashdata('flash-error');?>">
                    </div>

                    <div class="card">

                        <div class="card-body">

                            <!-- Button trigger modal -->
                            <button type="button" class="btn btn-primary mb-2" data-toggle="modal"
                                data-target="#exampleModal"><i class="fas fa-plus"></i>
                                Tambah Data Pembeli
                            </button>

                            <div class="row">

                                <?php if (empty($classes)): ?>
                                <img src="<?=base_url('assets_praktikum/img_lain/no_file.png')?>" alt="" width="500"
                                    class="rounded mx-auto d-block">
                                <?php endif;?>

                                <?php foreach ($classes as $class): ?>




                                <div class="col-xl-3 col-lg-6 mb-3">
                                    <div class="card">
                                        <span class="ml-3 mt-3 text-white"
                                            style="position: absolute;background-color: #004080;border-radius: 50%;width: 35px;height: 35px;text-align: center;font-size: 15px;padding-top: 7px;">
                                            <?=++$start;?></span>

                                        <div class="dropdown no-arrow position-absolute mt-3 mr-3"
                                            style="background-color:#eaeaea;border-radius:50%;width: 35px;height: 35px;text-align: center;font-size: 15px;padding-top: 7px; margin-right: 0;right: 0;">
                                            <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink"
                                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                <i class="fas fa-ellipsis-v fa-sm fa-fw text-white-400"></i>
                                            </a>

                                            <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in"
                                                aria-labelledby="dropdownMenuLink">
                                                <div class="dropdown-header">Dropdown Header:</div>


                                                <a class="btn btn-danger dropdown-item tombol-hapus mt-2"
                                                    id="tombol-hapus" type="button"
                                                    href="<?=base_url('admin_kelolapembeli/hapus_pembeli/') . $class['id']?>"><span
                                                        style="color: red;"><i class="fas fa-trash"></i></span>
                                                    Hapus
                                                </a>

                                                <a class="btn btn-success dropdown-item mt-2" type="button"
                                                    href="<?=base_url('admin_kelolapembeli/edit/') . $class['id']?>"><span
                                                        style="color: green;"><i class="fas fa-edit"></i></span>
                                                    Edit
                                                </a>





                                            </div>

                                        </div>

                                        <img class=" card-img-top"
                                            src="<?=base_url('assets_arealama/img_profile/') . $class['foto']?>"
                                            alt="Card image cap" style="height: 250px;">
                                        <div class="card-body">
                                            <p class="card-title">
                                                <strong class="text-justify">

                                                    <?=$class['nama']?>


                                                </strong>
                                            </p>





                                        </div>
                                    </div>
                                </div>


                                <?php endforeach;?>



                            </div>

                            <?=$this->pagination->create_links()?>



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
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Tambah Data Admin</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="<?=base_url('admin_kelolapembeli/tambah_pembeli')?>" method="POST">
                    <div class="modal-body">

                        <div class="alert alert-warning alert-dismissible fade show" role="alert">
                            <strong>Perhatian!</strong> Isi bidang ini dengan benar!
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>

                        <div class="form-group">
                            <label for="exampleInputEmail1">Nama Lengkap</label>
                            <input type="text" class="form-control" name="nama_lengkap" id="nama_lengkap"
                                placeholder="Masukkan Nama Lengkap">

                        </div>


                        <div class="form-group">
                            <label for="exampleInputEmail1">Username</label>
                            <input type="text" class="form-control" name="username" id="username"
                                placeholder="Masukkan Username">
                            <small><i class="text-danger">* Data Username tidak boleh sama dengan yang sudah
                                    ada</i></small>
                        </div>

                        <div class="form-group">
                            <label for="exampleInputEmail1">Email</label>
                            <input type="email" class="form-control" name="email" id="email"
                                placeholder="Masukkan Email">
                            <small><i class="text-danger">* Data Email tidak boleh sama dengan yang sudah
                                    ada</i></small>
                        </div>

                        <div class="form-group">
                            <label for="exampleInputEmail1">No Hp</label>
                            <input type="number" class="form-control" name="no_hp" id="no_hp"
                                placeholder="Masukkan Nomor Handphone">

                        </div>

                        <div class="form-group">
                            <label for="exampleInputEmail1">Password</label>
                            <input type="password" class="form-control" name="password" id="password"
                                placeholder="Masukkan Password">
                            <small><i class="text-danger">* Data Password minimal 8 karakter</i></small>
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







































































</body>