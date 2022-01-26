<!DOCTYPE html>
<html lang="zxx">

<!-- Mirrored from preview.colorlib.com/theme/malefashion/ by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 29 May 2021 06:38:10 GMT -->

<head>
    <meta charset="UTF-8">
    <meta name="description" content="Male_Fashion Template">
    <meta name="keywords" content="Male_Fashion, unica, creative, html">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Arealama</title>

    <link href="https://fonts.googleapis.com/css2?family=Nunito+Sans:wght@300;400;600;700;800;900&amp;display=swap"
        rel="stylesheet">

    <link rel="stylesheet" href="<?= base_url('assets_arealama/') ?>css/style.css" type="text/css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css"
        integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>


    <link rel="icon" href="<?= base_url('assets_arealama/') ?>img/logo-arealama.png">
</head>

<body>


    <?php

    $get_item = 0;



    if ($this->session->userdata('id_konsumen')) {

        $get_item = $this->db->get_where('cart', ['id_konsumen' => $this->session->userdata('id_konsumen')])->num_rows();
    } else {
        $get_item = 0;
    }

    ?>



    <div class="offcanvas-menu-overlay"></div>
    <div class="offcanvas-menu-wrapper">

        <div class="offcanvas__nav__option">
            <a href="#" class="search-switch"><img src="img/icon/xsearch.png" alt=""></a>
            <a href="#"><img src="<?= base_url('assets_arealama/') ?>img/icon/xheart.png" alt=""></a>
            <a href="#"><img src="<?= base_url('assets_arealama/') ?>img/icon/xcart.png" alt="">
                <span>0</span></a>
            <div class="price">Rp. 0</div>
        </div>
        <div id="mobile-menu-wrap"></div>

    </div>



    <header class="header">

        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-3">
                    <div class="header__logo" style="margin-top: -20px;">
                        <a href="<?= base_url() ?>"><img src="<?= base_url('assets_arealama/') ?>logo.png" alt=""
                                width="200"></a>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6">
                    <nav class="header__menu mobile-menu">
                        <ul>
                            <li class="<?= ($this->uri->segment(1) == '' ? 'active' : '') ?>"><a
                                    href="<?= base_url() ?>" style="text-decoration: none;">Home</a></li>
                            <li class="<?= ($this->uri->segment(1) == 'shop' ? 'active' : '') ?>"><a
                                    href="<?= base_url('shop') ?>" style="text-decoration: none;">Shop</a></li>
                            <!-- <li><a href="#">Pages</a>
                                    <ul class="dropdown">
                                        <li><a href="about.html">About Us</a></li>
                                        <li><a href="shop-details.html">Shop Details</a></li>
                                        <li><a href="shopping-cart.html">Shopping Cart</a></li>
                                        <li><a href="checkout.html">Check Out</a></li>
                                        <li><a href="blog-details.html">Blog Details</a></li>
                                    </ul>
                                </li> -->
                            <!-- <li><a href="blog.html">Blog</a></li> -->
                            <li class="<?= ($this->uri->segment(1) == 'resi' ? 'active' : '') ?>"><a
                                    href="<?= base_url('resi') ?>" style="text-decoration: none;">Lacak Resi</a></li>
                            <li class="<?= ($this->uri->segment(1) == 'order' ? 'active' : '') ?>"><a
                                    href="<?= base_url('order') ?>" style="text-decoration: none;">Order</a></li>
                        </ul>
                    </nav>
                </div>
                <div class="col-lg-3 col-md-3">
                    <div class="header__nav__option">






                        <a href="<?= base_url('basket') ?>"><img
                                src="<?= base_url('assets_arealama/') ?>img/icon/xcart.png" alt="">
                            <span><?= $get_item ?></span></a>
                        <div class="price">Rp. 0</div>


                        <img class="ml-3" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown"
                            aria-haspopup="true" aria-expanded="false"
                            src="<?= base_url('assets_arealama/user_default.png')  ?>" width="30" height="30" alt="">

                        <?php if (!$this->session->userdata('id_konsumen')) : ?>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                            <a class="dropdown-item" data-toggle="modal" data-target="#modalLogin" href="#">Login</a>
                            <a class="dropdown-item" data-toggle="modal" data-target="#modalRegist"
                                href="#">Registrasi</a>
                            <a class="dropdown-item" data-toggle="modal" data-target="#modalLupaPw" href="#">Lupa
                                Password</a>
                        </div>
                        <?php else : ?>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                            <a class="dropdown-item" data-toggle="modal" data-target="#modalLogin" href="#">Profil</a>
                            <a class="dropdown-item" data-toggle="modal" data-target="#modalRegist" href="#">Pesanan
                                Saya</a>
                            <a class="dropdown-item" href="<?= base_url('auth_user/logout') ?>">Logout</a>
                        </div>
                        <?php endif ?>









                    </div>
                </div>
            </div>

            <div class="canvas__open"><i class="fa fa-bars"></i></div>
        </div>

        <?= $this->session->flashdata('alert_auth') ?>

    </header>

    <?php if (!$this->session->userdata('id_konsumen')) : ?>

    <?php $this->load->view('arealama_template/head_modal') ?>

    <?php endif ?>