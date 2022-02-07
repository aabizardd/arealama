<section class="breadcrumb-option">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="breadcrumb__text">
                    <h4>Check Out</h4>
                    <div class="breadcrumb__links">
                        <a href="index-2.html">Home</a>
                        <a href="shop.html">Shop</a>
                        <span>Check Out</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="checkout spad">
    <div class="container">
        <div class="checkout__form">
            <?= $this->session->flashdata('message')  ?>
            <form action="<?= base_url('shop/kirim_pembayaran') ?>" enctype="multipart/form-data" method="POST">
                <div class="row">

                    <div class="col-lg-8 col-md-6">



                        <h6 class="checkout__title">Billing Details</h6>
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="checkout__input">
                                    <p>Nama Depan<span>*</span></p>
                                    <input type="text" name="nama_depan" required />
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="checkout__input">
                                    <p>Nama Belakang<span>*</span></p>
                                    <input type="text" name="nama_belakang" required />
                                </div>
                            </div>
                        </div>

                        <div class="checkout__input">
                            <p>Alamat Lengkap</p>
                            <input type="text" placeholder="Street Address" class="checkout__input__add" name="alamat"
                                required />

                        </div>

                        <div class="row">
                            <div class="col-lg-12">
                                <div class="checkout__input">
                                    <p>Nomor HP</p>
                                    <input type="number" name="no_hp" required />
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-lg-12">
                                <div class="checkout__input">
                                    <p>Bukti Bayar</p>
                                    <input type="file" name="bukti_bayar" required />
                                </div>
                            </div>
                        </div>




                    </div>
                    <div class="col-lg-4 col-md-6">
                        <div class="checkout__order">
                            <h4 class="order__title">Your order</h4>
                            <div class="checkout__order__products">
                                Product <span>Total</span>
                            </div>
                            <ul class="checkout__total__products">
                                <?php $no = 1 ?>
                                <?php foreach ($carts as $c) : ?>
                                <li>0<?= $no++ ?>. <?= $c['nama_barang'] ?>
                                    <span><?= 'Rp ' . number_format($c['harga'], 2, ",", ".") ?>

                                    </span>
                                </li>
                                <?php endforeach ?>

                            </ul>
                            <ul class="checkout__total__all">

                                <input type="hidden" name="total" value="<?= $total_cart['total'] ?>">
                                <li>Total <span><?= 'Rp ' . number_format($total_cart['total'], 2, ",", ".") ?></span>
                                </li>
                            </ul>


                            <button type="submit" class="site-btn">KIRIM</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</section>