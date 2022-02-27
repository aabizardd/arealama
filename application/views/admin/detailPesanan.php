<?php

function rupiah($angka)
{

    $hasil_rupiah = "Rp " . number_format($angka, 2, ',', '.');
    return $hasil_rupiah;
}



?>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <?php include "sidebar.php"; ?>


        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <?php include "topbar.php"; ?>

                <!-- Begin Page Content -->
                <div class="container-fluid mb-5">

                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center mb-4">
                        <a class="btn btn-danger" href="<?= base_url('Admin_kelolapesanan') ?>">Back</a>
                        <h1 class="h3 mb-0 text-gray-800 ml-3">List Data Barang Pesanan</h1>
                    </div>

                    <!-- <div class="flash-data" data-flashdata="<?= $this->session->flashdata('flash'); ?>"></div>
                    <div class="flash-data-error" data-flashdata="<?= $this->session->flashdata('flash-error'); ?>">
                    </div> -->

                    <div class="card">

                        <div class="card-body">

                            <!-- Button trigger modal -->

                            <div class="row">


                                <?php $start = 0; ?>

                                <?php foreach ($barangs as $modul) : ?>

                                <?php
                                    $linkk = substr($modul['link'], 21);

                                    $linkk = explode(".", $linkk);

                                    $linkk = substr($linkk[0], 0, -2);

                                    // var_dump($linkk);die();

                                    ?>




                                <div class="col-xl-3 col-lg-6 mb-3">
                                    <div class="card">
                                        <span class="ml-3 mt-3 text-white"
                                            style="position: absolute;background-color: #004080;border-radius: 50%;width: 35px;height: 35px;text-align: center;font-size: 15px;padding-top: 7px;">
                                            <?= ++$start; ?></span>
                                        <a href="<?= base_url('kelola_link/index/') . $linkk ?>" target="_blank"><img
                                                class=" card-img-top"
                                                src="<?= base_url('assets_praktikum/img_bahan_modul/') . $modul['foto_barang'] ?>"
                                                alt="Card image cap" height="250">
                                        </a>
                                        <div class="card-body">
                                            <p class="card-title">
                                                <strong class="text-justify"><?= $modul['nama_barang'] ?></strong>
                                            </p>

                                            <h5><?= rupiah($modul['harga']) ?></h5>

                                            <a class="badge badge-info">Jumlah pesanan: <?= $modul['qty'] ?></a> <br>

                                            <a href="<?= base_url('detail_barang/') . $modul['id_barang'] ?>"
                                                class="btn btn-primary mt-2"><i class="fas fa-info-circle"></i>
                                                Lihat</a>



                                        </div>
                                    </div>
                                </div>


                                <?php endforeach; ?>



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
                    <a class="btn btn-primary" href="<?= base_url('admin_home/logout') ?>">Logout</a>
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
                <form action="<?= base_url('admin_kelolapembeli/tambah_pembeli') ?>" method="POST">
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