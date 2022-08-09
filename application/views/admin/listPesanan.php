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
                        <h1 class="h3 mb-0 text-gray-800">List Data Pesanan</h1>






                    </div>

                    <!-- <div class="flash-data" data-flashdata="<?=$this->session->flashdata('flash');?>"></div>
                    <div class="flash-data-error" data-flashdata="<?=$this->session->flashdata('flash-error');?>">
                    </div> -->

                    <div class="card">

                        <div class="card-body">

                            <!-- Button trigger modal -->

                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Nama Konsumen</th>
                                            <th>Nama Pemesan</th>
                                            <th>Alamat</th>
                                            <th>No Hp</th>
                                            <th>Total</th>
                                            <th>Resi</th>
                                            <th>Status</th>
                                            <th>Aksi</th>

                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>No</th>
                                            <th>Nama Konsumen</th>
                                            <th>Nama Pemesan</th>
                                            <th>Alamat</th>
                                            <th>No Hp</th>
                                            <th>Total</th>
                                            <th>Resi</th>
                                            <th>Status</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>

                                        <?php $no = 1?>
                                        <?php foreach ($transaksi as $tr): ?>

                                        <tr>
                                            <td><?=$no++?></td>
                                            <td><?=$tr->nama?></td>
                                            <td><?=$tr->nama_depan . " " . $tr->nama_belakang?></td>
                                            <td><?=$tr->alamat?></td>
                                            <td><?=$tr->no_hp?></td>
                                            <td><?=rupiah($tr->total)?></td>
                                            <td><?=$tr->jasa_pengiriman . "-" . $tr->nomor_resi?></td>
                                            <td>
                                                <?=$tr->nama_status?>
                                            </td>
                                            <td>
                                                <div class="dropdown">
                                                    <a class="btn btn-primary dropdown-toggle col-12" href="#"
                                                        role="button" id="dropdownMenuLink" data-toggle="dropdown"
                                                        aria-expanded="false">
                                                        Aksi Pesanan
                                                    </a>

                                                    <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                                        <a class="dropdown-item bg-info text-white"
                                                            href="<?=base_url('Admin_kelolapesanan/detail_barang_pesanan/' . $tr->id_transaksi)?>">Detail
                                                            Barang Pesanan</a>
                                                        <a class="dropdown-item bg-success text-white mt-1"
                                                            href="<?=base_url('assets_arealama/img/bukti_bayar/' . $tr->bukti_bayar)?>"
                                                            target="_blank">Lihat
                                                            Bukti Bayar</a>

                                                        <?php if ($tr->status == 0): ?>

                                                        <a class="dropdown-item bg-primary text-white mt-1"
                                                            href="<?=base_url('Admin_kelolapesanan/update_status_pesanan/' . $tr->id_transaksi . '/1')?>">Terima
                                                            Pesanan</a>

                                                        <a class="dropdown-item bg-danger text-white mt-1"
                                                            href="<?=base_url('Admin_kelolapesanan/update_status_pesanan/' . $tr->id_transaksi . '/4')?>">Tolak
                                                            Pesanan</a>

                                                        <?php elseif ($tr->status == 1): ?>

                                                        <a class="dropdown-item bg-primary text-white mt-1"
                                                            href="<?=base_url('Admin_kelolapesanan/update_status_pesanan/' . $tr->id_transaksi . '/2')?>">Kirim
                                                            Pesanan</a>

                                                        <a class="dropdown-item bg-danger text-white mt-1"
                                                            href="<?=base_url('Admin_kelolapesanan/update_status_pesanan/' . $tr->id_transaksi . '/0')?>">Batalkan
                                                            Persetujuan</a>

                                                        <?php elseif ($tr->status == 2): ?>

                                                        <a class="dropdown-item bg-primary text-white mt-1"
                                                            href="<?=base_url('Admin_kelolapesanan/update_status_pesanan/' . $tr->id_transaksi . '/3')?>">Pesanan
                                                            Diterima</a>



                                                        <?php endif?>

                                                    </div>
                                                </div>
                                            </td>
                                        </tr>

                                        <?php endforeach?>

                                    </tbody>
                                </table>
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