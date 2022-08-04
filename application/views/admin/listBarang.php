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
                        <h1 class="h3 mb-0 text-gray-800">List Barang Arealama</h1>


                        <form action="<?=base_url('Admin_listbarang');?>" method="post">
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


                    <div class="card">

                        <div class="card-body">

                            <div class="row">

                                <?php if (empty($moduls)): ?>
                                <img src="<?=base_url('assets_praktikum/img_lain/no_file.png')?>" alt="" width="500"
                                    class="rounded mx-auto d-block">
                                <?php endif;?>

                                <?php foreach ($moduls as $modul): ?>

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
                                            <?=++$start;?></span>
                                        <a href="<?=base_url('kelola_link/index/') . $linkk?>" target="_blank"><img
                                                class=" card-img-top"
                                                src="<?=base_url('assets_praktikum/img_bahan_modul/') . $modul['foto_barang']?>"
                                                alt="Card image cap" height="250">
                                        </a>
                                        <div class="card-body">
                                            <p class="card-title">
                                                <strong class="text-justify"><?=$modul['nama_barang']?></strong>
                                            </p>


                                            <a href="<?=base_url('detail_barang/') . $modul['id_barang']?>"
                                                class="btn btn-primary mt-2"><i class="fas fa-info-circle"></i>
                                                Lihat</a>

                                            <a class="btn btn-danger tombol-hapus mt-2" id="tombol-hapus" type="button"
                                                href="<?=base_url('admin_listbarang/hapus_barang/') . $modul['id_barang']?>">
                                                <i class="fas fa-trash"></i>
                                                Hapus
                                            </a>

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



























































</body>